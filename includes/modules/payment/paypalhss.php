<?php
/**
 * paypalhss.php payment module class for PayPal Website Payments Pro Hosted  method
 *
 * @package paymentMethod
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

/**
 *  ensure dependencies are loaded
 */
	include_once((IS_ADMIN_FLAG === true ? DIR_FS_CATALOG_MODULES : DIR_WS_MODULES) . 'payment/paypal/paypal_functions.php');
	require_once(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/paypal_curl.php');

/**
 * paypal.php payment module class for PayPal Website Payments Pro Hosted
 *
 */
class paypalhss extends base {
  /**
   * string representing the payment method
   *
   * @var string
   */
  var $code;
  /**
   * $title is the displayed name for this payment method
   *
   * @var string
    */
  var $title;
  /**
   * $description is a soft name for this payment method
   *
   * @var string
    */
  var $description;
  /**
   * $enabled determines whether this module shows or not... in catalog.
   *
   * @var boolean
    */
  var $enabled;
  
  var $hsslink;
  
  /**
    * constructor
    *
    * @return paypal
    */
  function paypalhss() {
    global $order, $messageStack;
    $this->code = 'paypalhss';
    $this->codeVersion = '1.0.0';
    if (IS_ADMIN_FLAG === true) {
      $this->title = MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE; // Payment Module title in Admin
      if (IS_ADMIN_FLAG === true && MODULE_PAYMENT_PAYPALHSS_SERVER != 'live') $this->title .= '<span class="alert"> (sandbox active)</span>';
    } else {
      $this->title = MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE; // Payment Module title in Catalog
    }
    $this->description = MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION;
    $this->sort_order = MODULE_PAYMENT_PAYPALHSS_SORT_ORDER;
    $this->enabled = ((MODULE_PAYMENT_PAYPALHSS_STATUS == 'True') ? true : false);
    if ((int)MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID > 0) {
      $this->order_status = MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID;
    }

    if (is_object($order)) $this->update_status();

    // verify table structure
    if (IS_ADMIN_FLAG === true) $this->tableCheckup();
    
    $this->hsslink = "";
  }
  /**
   * calculate zone matches and flag settings to determine whether this module should display to customers or not
    *
    */
  function update_status() {
    global $order, $db;

    if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYPALHSS_ZONE > 0) ) {
      $check_flag = false;
      $check_query = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYPALHSS_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
      while (!$check_query->EOF) {
        if ($check_query->fields['zone_id'] < 1) {
          $check_flag = true;
          break;
        } elseif ($check_query->fields['zone_id'] == $order->billing['zone_id']) {
          $check_flag = true;
          break;
        }
        $check_query->MoveNext();
      }

      if ($check_flag == false) {
        $this->enabled = false;
      }
    }
  }
  /**
   * JS validation which does error-checking of data-entry if this module is selected for use
   * (Number, Owner, and CVV Lengths)
   *
   * @return string
    */
  function javascript_validation() {
  
  
    return false;
  }
  /**
   * Create 2 hour long hosted button linked to HSS flow and return iframe content to caller for ultimate display on payment page
   *
   * @return array
    */
  function selection() {

	global $db, $order, $order_totals;
	
	if($this->hsslink == "")
	{
		$url = "https://api-3t.paypal.com/nvp";
		if(MODULE_PAYMENT_PAYPALHSS_SERVER != 'live')
			$url = "https://api-3t.sandbox.paypal.com/nvp";
		
		$paypalapiusername = MODULE_PAYMENT_PAYPALHSS_API_USERNAME;
		$paypalapipassword = MODULE_PAYMENT_PAYPALHSS_API_PASSWORD;
		$paypalapisignature = MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE;
		
		$paymentaction = (MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE != 'Final Sale') ? 'authorization' : 'sale';		
	
	    $paypalphone = preg_replace('/\D/', '', $order->customer['telephone']);
	    $paypalphone_a = "";
	    $paypalphone_b = "";
	    $paypalphone_c = "";
	    if ($paypalphone != '')
	    {
			if (in_array($order->delivery['country']['iso_code_2'], array('US','CA')))
			{
				$paypalphone_a = substr($paypalphone,0,3);
				$paypalphone_b = substr($paypalphone,3,3);
				$paypalphone_c = substr($paypalphone,6,4);
			} 
			else
			{
				$paypalphone_b = $paypalphone;
			}
	    }
	    
	    if(MODULE_PAYMENT_PAYPALHSS_CURRENCY == 'Selected Currency')
	    {
	    	$hsscurrency = $order->info['currency'];
	    }
	    else
	    {
	    	$hsscurrency = substr(MODULE_PAYMENT_PAYPALHSS_CURRENCY, 5);
	    }


	    if(!in_array($hsscurrency, array('AUD', 'CAD', 'EUR', 'GBP', 'JPY', 'USD')))
	    {
	    	$hsscurrency = 'USD';
	    }
	        
	        $order_amount = $this->calc_order_amount($order->info['total'], $hsscurrency, FALSE);

		$order_subtotal = 0;
		for ($i = 0, $n = sizeof($order->products); $i < $n; $i++)
		{
			$order_subtotal += $order->products[$i]['price'] * $order->products[$i]['qty'];
		}

		$order_shipping = $order->info['shipping_cost']-$order->info['shipping_tax'];
		
		$fields = array(
			'USER'=>$paypalapiusername,
			'PWD'=>$paypalapipassword,
			'VERSION'=>'65.2',
			'SIGNATURE'=>$paypalapisignature,
			'METHOD'=>'BMCreateButton',
			'BUTTONCODE'=>'TOKEN',
			'BUTTONTYPE'=>'PAYMENT',
			'L_BUTTONVAR0'=>"currency_code=".$hsscurrency,
			'L_BUTTONVAR1'=>"subtotal=".$this->calc_order_amount($order_subtotal, $hsscurrency, TRUE),
			'L_BUTTONVAR2'=>"tax=".$this->calc_order_amount($order->info['tax'], $hsscurrency, TRUE),
			'L_BUTTONVAR3'=>"shipping=".$this->calc_order_amount($order_shipping, $hsscurrency, TRUE),
			'L_BUTTONVAR4'=>"amount=".$this->calc_order_amount($order->info['total'], $hsscurrency, TRUE),
			'L_BUTTONVAR5'=>"return=".html_entity_decode(zen_href_link(FILENAME_CHECKOUT_PROCESS, 'referer=paypal', 'SSL')),
			'L_BUTTONVAR6'=>"cancel_return=".html_entity_decode(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL')),
			'L_BUTTONVAR7'=>"bn=OnTechnology_ShoppingCart_EC_AU",
			'L_BUTTONVAR8'=>"address_override=true",
			'L_BUTTONVAR9'=>"first_name=".$order->delivery['firstname'],
			'L_BUTTONVAR10'=>"last_name=".$order->delivery['lastname'],
			'L_BUTTONVAR11'=>"address1=".$order->delivery['street_address'],
			'L_BUTTONVAR12'=>"address2=",
			'L_BUTTONVAR13'=>"city=".$order->delivery['city'],
			'L_BUTTONVAR14'=>"country=".$order->delivery['country']['iso_code_2'],
			'L_BUTTONVAR15'=>"state=".$order->delivery['state'],
			'L_BUTTONVAR16'=>"zip=".$order->delivery['postcode'],
			'L_BUTTONVAR17'=>"billing_first_name=".$order->billing['firstname'],
			'L_BUTTONVAR18'=>"billing_last_name=".$order->billing['lastname'],
			'L_BUTTONVAR19'=>"billing_address1=".$order->billing['street_address'],
			'L_BUTTONVAR20'=>"billing_address2=",
			'L_BUTTONVAR21'=>"billing_city=".$order->billing['city'],
			'L_BUTTONVAR22'=>"billing_country=".$order->billing['country']['iso_code_2'],
			'L_BUTTONVAR23'=>"billing_state=".$order->billing['state'],
			'L_BUTTONVAR24'=>"billing_zip=".$order->billing['postcode'],
			'L_BUTTONVAR25'=>"buyer_email=".$order->billing['email_address'],
			'L_BUTTONVAR26'=>"notify_url=".html_entity_decode(zen_href_link('ipn_hss_handler.php', '', 'SSL',false,false,true)),
			'L_BUTTONVAR27'=>"showHostedThankyouPage=false",
			'L_BUTTONVAR28'=>"invoice=".(int)$_SESSION['customer_id'] . '-' . time() . '-[' . substr(preg_replace('/[^a-zA-Z0-9_]/', '', STORE_NAME), 0, 30) . ']',
			'L_BUTTONVAR29'=>"paymentaction=".$paymentaction,
			'L_BUTTONVAR30'=>"shopping_url=".html_entity_decode(zen_href_link(FILENAME_SHOPPING_CART, '', 'SSL')),
			'L_BUTTONVAR31'=>"upload=1",
			'L_BUTTONVAR32'=>"rm=2",
			'L_BUTTONVAR33'=>"template=TemplateD",
			'L_BUTTONVAR34'=>"night_phone_a=".$paypalphone_a,
			'L_BUTTONVAR35'=>"night_phone_b=".$paypalphone_b,
			'L_BUTTONVAR36'=>"night_phone_c=".$paypalphone_c,
			'L_BUTTONVAR37'=>"day_phone_a=".$paypalphone_a,
			'L_BUTTONVAR38'=>"day_phone_b=".$paypalphone_b,
			'L_BUTTONVAR39'=>"day_phone_c=".$paypalphone_c,
			'L_BUTTONVAR40'=>"H_PhoneNumber=".$paypalphone,
			'L_BUTTONVAR41'=>"custom=zenid=".session_id(),
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/x-www-form-urlencoded" ));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	    	curl_setopt($ch, CURLOPT_VERBOSE, true);
		
		$apiresponse = curl_exec($ch);
		$str = parse_str($apiresponse, $output);
		 
		curl_close($ch);
		
	    $_SESSION['paypal_transaction_info'] = array($order->info['subtotal'], $order->info['currency']);
	    $_SESSION['payment'] = 'paypalhss';
	    $_SESSION['ppipn_key_to_remove'] = session_id();
	    
	    $db->Execute("delete from " . TABLE_PAYPAL_SESSION . " where session_id = '" . zen_db_input($_SESSION['ppipn_key_to_remove']) . "'");
	
	    $sql = "insert into " . TABLE_PAYPAL_SESSION . " (session_id, saved_session, expiry) values (
	            '" . zen_db_input($_SESSION['ppipn_key_to_remove']) . "',
	            '" . base64_encode(serialize($_SESSION)) . "',
	            '" . (time() + (1*60*60*24*2)) . "')";
	
	    $db->Execute($sql);
	    
	    $this->hsslink = $output['EMAILLINK'];
	}
	
    return array('id' => $this->code,
                 'module' => '<b>'.MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE.'</b><iframe id="hssframe" src="'.$this->hsslink.'"style="position:relative; z-index:0;width: 560px; height: 450px;overflow: hidden; margin-left: auto; margin-right: auto; display:block;" frameborder="0" scrolling="no"></iframe>'
                 );
  }

  function pre_confirmation_check() {
    return false;
  }

  function confirmation() {
    return false;
  }
    
  function process_button() {
  	return '<!-- paypal hss -->';
  }
  /**
   * Determine the language to use when visiting the PayPal site
   */
  function getLanguageCode() {
    global $order;
    $lang_code = '';
    $orderISO = zen_get_countries($order->customer['country']['id'], true);
    $storeISO = zen_get_countries(STORE_COUNTRY, true);
    if (in_array(strtoupper($orderISO['countries_iso_code_2']), array('US', 'AU', 'DE', 'FR', 'IT', 'GB', 'ES', 'AT', 'BE', 'CA', 'CH', 'CN', 'NL', 'PL'))) {
      $lang_code = strtoupper($orderISO['countries_iso_code_2']);
    } elseif (in_array(strtoupper($storeISO['countries_iso_code_2']), array('US', 'AU', 'DE', 'FR', 'IT', 'GB', 'ES', 'AT', 'BE', 'CA', 'CH', 'CN', 'NL', 'PL'))) {
      $lang_code = strtoupper($storeISO['countries_iso_code_2']);
    } elseif (in_array(strtoupper($_SESSION['languages_code']), array('EN', 'US', 'AU', 'DE', 'FR', 'IT', 'GB', 'ES', 'AT', 'BE', 'CA', 'CH', 'CN', 'NL', 'PL'))) {
      $lang_code = $_SESSION['languages_code'];
      if (strtoupper($lang_code) == 'EN') $lang_code = 'US';
    }

    return strtoupper($lang_code);
  }

  function before_process() {

    global $order_total_modules, $db;

	$this->notify('NOTIFY_PAYMENT_PAYPAL_RETURN_TO_STORE');

	$url = "https://api-3t.paypal.com/nvp";
	if(MODULE_PAYMENT_PAYPALHSS_SERVER != 'live')
		$url = "https://api-3t.sandbox.paypal.com/nvp";
		
	$paypalapiusername = MODULE_PAYMENT_PAYPALHSS_API_USERNAME;
	$paypalapipassword = MODULE_PAYMENT_PAYPALHSS_API_PASSWORD;
	$paypalapisignature = MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE;

	$fields = array(
		'USER'=>$paypalapiusername,
		'PWD'=>$paypalapipassword,
		'VERSION'=>'65.2',
		'SIGNATURE'=>$paypalapisignature,
		'METHOD'=>'GetTransactionDetails',
		'TRANSACTIONID'=> $_POST['txn_id'] ? $_POST['txn_id'] : $_GET['tx']
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/x-www-form-urlencoded" ));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

	$apiresponse = curl_exec($ch);
	$str = parse_str($apiresponse, $output);
	curl_close($ch);

    //Check if the transaction has already been compelted
    $sql = "SELECT 1 FROM " . TABLE_PAYPAL . " WHERE txn_id = :transactionID";
    $checkTxnID = $db->bindVars($sql, ':transactionID', $output['TRANSACTIONID'], 'string');
    $result = $db->Execute($checkTxnID);

    if($result->RecordCount() > 0) 
	zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL'));
	
     if ($output['PAYMENTSTATUS'] == 'Completed' || $output['PAYMENTSTATUS'] == 'In-Progress' || $output['PAYMENTSTATUS'] == 'Pending' || $output['PAYMENTSTATUS'] == 'Processed') {
		return false;
      } else {
	// payment failed so head back to payment page
        zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
      }

  }
  /**
    * Checks referrer
    *
    * @param string $zf_domain
    * @return boolean
    */
  function check_referrer($zf_domain) {
    return true;
  }
  /**
    * Build admin-page components
    *
    * @param int $zf_order_id
    * @return string
    */
  function admin_notification($zf_order_id) {
    global $db;
    $output = '';
    $sql = "select * from " . TABLE_PAYPAL . " where order_id = '" . (int)$zf_order_id . "' order by paypal_ipn_id DESC LIMIT 1";
    $ipn = $db->Execute($sql);
    if ($ipn->RecordCount() > 0 && file_exists(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/paypalhss_admin_notification.php')) require(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/paypal_admin_notification.php');
    return $output;
  }

  function after_process() {
  	$_SESSION['order_created'] = '';
	return false;
  }

  function output_error() {
    return false;
  }
  
  /**
   * Check to see whether module is installed
   *
   * @return boolean
    */
  function check() {
    global $db;
    if (IS_ADMIN_FLAG === true) {
      global $sniffer;
      if ($sniffer->field_exists(TABLE_PAYPAL, 'zen_order_id'))  $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE COLUMN zen_order_id order_id int(11) NOT NULL default '0'");
    }
    if (!isset($this->_check)) {
      $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYPALHSS_STATUS'");
      $this->_check = $check_query->RecordCount();
    }
    return $this->_check;
  }
  /**
   * Install the payment module and its configuration settings
    *
    */
  function install() {
    global $db, $messageStack;
    if (defined('MODULE_PAYMENT_PAYPALHSS_STATUS')) {
      $messageStack->add_session('PayPal Website Payments Pro Hosted module already installed.', 'error');
      zen_redirect(zen_href_link(FILENAME_MODULES, 'set=payment&module=paypalhss', 'NONSSL'));
      return 'failed';
    }

    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayPal Module', 'MODULE_PAYMENT_PAYPALHSS_STATUS', 'True', 'Do you want to accept PayPal payments?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayPal API Username', 'MODULE_PAYMENT_PAYPALHSS_API_USERNAME','', 'Your PayPal API Username can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Username value.', '6', '1', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayPal API Password', 'MODULE_PAYMENT_PAYPALHSS_API_PASSWORD','', 'Your PayPal API Password can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Password value.', '6', '2', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayPal API Signature', 'MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE','', 'Your PayPal API Signature can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Signature value.', '6', '3', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Payment Action', 'MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Final Sale', 'How do you want to obtain payment?<br /><strong>Default: Final Sale</strong>', '6', '25', 'zen_cfg_select_option(array(\'Auth Only\', \'Final Sale\'), ',  now())");    
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Currency', 'MODULE_PAYMENT_PAYPALHSS_CURRENCY', 'Selected Currency', 'Which currency should the order be sent to PayPal as? <br />NOTE: if an unsupported currency is sent to PayPal, it will be auto-converted to USD.', '6', '3', 'zen_cfg_select_option(array(\'Selected Currency\', \'Only USD\', \'Only AUD\', \'Only CAD\', \'Only EUR\', \'Only GBP\', \'Only CHF\', \'Only CZK\', \'Only DKK\', \'Only HKD\', \'Only HUF\', \'Only JPY\', \'Only NOK\', \'Only NZD\', \'Only PLN\', \'Only SEK\', \'Only SGD\', \'Only THB\', \'Only MXN\', \'Only ILS\', \'Only PHP\', \'Only TWD\', \'Only BRL\', \'Only MYR\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_PAYPALHSS_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Pending Notification Status', 'MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', '" . DEFAULT_ORDERS_STATUS_ID .  "', 'Set the status of orders made with this payment module that are not yet completed to this value<br />(\'Pending\' recommended)', '6', '5', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', '2', 'Set the status of orders made with this payment module that have completed payment to this value<br />(\'Processing\' recommended)', '6', '6', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '8', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Live or Sandbox', 'MODULE_PAYMENT_PAYPALHSS_SERVER', 'live', '<strong>Live: </strong>  Used to process Live transactions<br/><strong>Sandbox: </strong>For developers and testing', '6', '25', 'zen_cfg_select_option(array(\'live\', \'sandbox\'), ', now())");

    $this->notify('NOTIFY_PAYMENT_PAYPALHSS_INSTALLED');
  }

  /**
   * Set the currency code -- use defaults if active currency is not a currency accepted by PayPal
   */
  function selectCurrency($val = '', $subset = 'EC') {
    $ec_currencies = array('CAD', 'EUR', 'GBP', 'JPY', 'USD', 'AUD', 'CHF', 'CZK', 'DKK', 'HKD', 'HUF', 'NOK', 'NZD', 'PLN', 'SEK', 'SGD', 'THB', 'MXN', 'ILS', 'PHP', 'TWD', 'BRL', 'MYR');
    $dp_currencies = array('CAD', 'EUR', 'GBP', 'JPY', 'USD', 'AUD');
    $paypalSupportedCurrencies = ($subset == 'EC') ? $ec_currencies : $dp_currencies;

    // if using Pro 2.0 (UK), only the 6 currencies are supported.
    $paypalSupportedCurrencies = (MODULE_PAYMENT_PAYPALWPP_MODULE_MODE == 'Payflow-UK') ? $dp_currencies : $paypalSupportedCurrencies;

    $my_currency = substr(MODULE_PAYMENT_PAYPALWPP_CURRENCY, 5);
    if (MODULE_PAYMENT_PAYPALWPP_CURRENCY == 'Selected Currency') {
      $my_currency = ($val == '') ? $_SESSION['currency'] : $val;
    }

    if (!in_array($my_currency, $paypalSupportedCurrencies)) {
      $my_currency = (MODULE_PAYMENT_PAYPALWPP_MODULE_MODE == 'Payflow-UK') ? 'GBP' : 'USD';
    }
    return $my_currency;
  }
  /**
   * Calculate the amount based on acceptable currencies
   */
  function calc_order_amount($amount, $paypalCurrency, $applyFormatting = false) {
    global $currencies;
    $amount = ($amount * $currencies->get_value($paypalCurrency));
    if ($paypalCurrency == 'JPY') {
      $amount = (int)$amount;
      $applyFormatting = FALSE;
    }
    return ($applyFormatting ? number_format($amount, $currencies->get_decimal_places($paypalCurrency)) : $amount);
  }
  /**
   * Remove the module and all its settings
    *
    */
  function remove() {
    global $db;
    $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE 'MODULE\_PAYMENT\_PAYPALHSS\_%'");
    $this->notify('NOTIFY_PAYMENT_PAYPALHSS_UNINSTALLED');
  }
  /**
   * Internal list of configuration keys used for configuration of the module
   *
   * @return array
    */
  function keys() {
  
    $keys_list = array(
                       'MODULE_PAYMENT_PAYPALHSS_STATUS',
                       'MODULE_PAYMENT_PAYPALHSS_API_USERNAME',
                       'MODULE_PAYMENT_PAYPALHSS_API_PASSWORD',
                       'MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE',
                       'MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE',
                       'MODULE_PAYMENT_PAYPALHSS_CURRENCY',
                       'MODULE_PAYMENT_PAYPALHSS_ZONE',
                       'MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID',
                       'MODULE_PAYMENT_PAYPALHSS_SORT_ORDER',
                       'MODULE_PAYMENT_PAYPALHSS_SERVER'
                        );
    
    return $keys_list;
  }

  function tableCheckup() {
    global $db, $sniffer;
    $fieldOkay1 = (method_exists($sniffer, 'field_type')) ? $sniffer->field_type(TABLE_PAYPAL, 'txn_id', 'varchar(20)', true) : -1;
    $fieldOkay2 = ($sniffer->field_exists(TABLE_PAYPAL, 'module_name')) ? true : -1;
    $fieldOkay3 = ($sniffer->field_exists(TABLE_PAYPAL, 'order_id')) ? true : -1;

    if ($fieldOkay1 == -1) {
      $sql = "show fields from " . TABLE_PAYPAL;
      $result = $db->Execute($sql);
      while (!$result->EOF) {
        if  ($result->fields['Field'] == 'txn_id') {
          if  ($result->fields['Type'] == 'varchar(20)') {
            $fieldOkay1 = true; // exists and matches required type, so skip to other checkup
          } else {
            $fieldOkay1 = $result->fields['Type']; // doesn't match, so return what it "is"
            break;
          }
        }
        $result->MoveNext();
      }
    }

    if ($fieldOkay1 !== true) {
      // temporary fix to table structure for v1.3.7.x -- may remove in later release
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE payment_type payment_type varchar(40) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE txn_type txn_type varchar(40) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE payment_status payment_status varchar(32) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE reason_code reason_code varchar(40) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE pending_reason pending_reason varchar(32) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE invoice invoice varchar(128) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE payer_business_name payer_business_name varchar(128) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE address_name address_name varchar(64) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE address_street address_street varchar(254) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE address_city address_city varchar(120) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE address_state address_state varchar(120) default NULL");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE payer_email payer_email varchar(128) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE business business varchar(128) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE receiver_email receiver_email varchar(128) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE txn_id txn_id varchar(20) NOT NULL default ''");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE parent_txn_id parent_txn_id varchar(20) default NULL");
    }
    if ($fieldOkay2 !== true) {
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " ADD COLUMN module_name varchar(40) NOT NULL default '' after txn_type");
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " ADD COLUMN module_mode varchar(40) NOT NULL default '' after module_name");
    }
    if ($fieldOkay3 !== true) {
      $db->Execute("ALTER TABLE " . TABLE_PAYPAL . " CHANGE zen_order_id order_id int(11) NOT NULL default '0'");
    }
  }

}
