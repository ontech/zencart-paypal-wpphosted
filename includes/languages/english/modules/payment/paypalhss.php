<?php
/**
 * @package languageDefines
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

  define('MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE', 'PayPal Website Payments Pro - Hosted');
  define('MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE', 'PayPal');
  if (IS_ADMIN_FLAG === true) {
    define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal Website Payments Pro - Hosted</strong> <br /><a href="http://www.paypal.com/" target="_blank">Manage your PayPal account.</a><br /><br /><font color="green">Configuration Instructions:</font><br /> <a href="http://www.paypal.com/" target="_blank">Sign up for your PayPal account - click here.</a><br /> <ul>' . (defined('MODULE_PAYMENT_PAYPALHSS_STATUS') ? '' : '<li>... and click "install" above to enable PayPal Pro Hosted support... and "edit" to tell Zen Cart your PayPal settings.</li>') . '</ul><font color="green"><hr /><strong>Requirements:</strong></font><br /><hr />*<strong>PayPal Account</strong> (<a href="http://www.paypal.com" target="_blank">click to signup</a>)<br />*<strong>*<strong>Port 80</strong> is used for bidirectional communication with the gateway, so must be open on your host\'s router/firewall<br />*<strong>Settings</strong> must be configured as described above.');

 } else {
    define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal</strong>');
  }

  define('MODULE_PAYMENT_PAYPALHSS_SANDBOXACTIVE', 'sandbox active');
  define('MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE', 'Pay by Card');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS', 'Enable PayPal Module');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS_TEXT', 'Do you want to accept PayPal payments?');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME', 'PayPal API Username');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME_TEXT', 'Your PayPal API Username can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Username value.');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD', 'PayPal API Password');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD_TEXT', 'Your PayPal API Password can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Password value.');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE', 'PayPal API Signature');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE_TEXT', 'Your PayPal API Signature can be found in Profile > API Access > Request API Credentials in your PayPal account. Choose the Request API Signature option.<br />NOTE: This must match <strong>EXACTLY </strong>the API Signature value.');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Payment Action');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE_TEXT', 'How do you want to obtain payment?<br /><strong>Default: Final Sale</strong>');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY', 'Transaction Currency');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY_TEXT', 'Which currency should the order be sent to PayPal as? <br />NOTE: if an unsupported currency is sent to PayPal, it will be auto-converted to USD.');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE', 'Payment Zone');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE_TEXT', 'If a zone is selected, only enable this payment method for that zone.');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', 'Set Pending Notification Status');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID_TEXT', 'Set the status of orders made with this payment module that are not yet completed to this value<br />(\'Pending\' recommended)');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', 'Set Order Status');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID_TEXT', 'Set the status of orders made with this payment module that have completed payment to this value<br />(\'Processing\' recommended)');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', 'Sort order of display.');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER_TEXT', 'Sort order of display. Lowest is displayed first.');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER', 'Live or Sandbox');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER_TEXT', '<strong>Live: </strong>  Used to process Live transactions<br/><strong>Sandbox: </strong>For developers and testing');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_FIRST_NAME', 'First Name:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_LAST_NAME', 'Last Name:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_BUSINESS_NAME', 'Business Name:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_NAME', 'Address Name:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STREET', 'Address Street:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_CITY', 'Address City:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATE', 'Address State:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_ZIP', 'Address Zip:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_COUNTRY', 'Address Country:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EMAIL_ADDRESS', 'Payer Email:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EBAY_ID', 'Ebay ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_ID', 'Payer ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_STATUS', 'Payer Status:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATUS', 'Address Status:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_TYPE', 'Payment Type:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_STATUS', 'Payment Status:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PENDING_REASON', 'Pending Reason:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_INVOICE', 'Invoice:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_DATE', 'Payment Date:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CURRENCY', 'Currency:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_GROSS_AMOUNT', 'Gross Amount:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_FEE', 'Payment Fee:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EXCHANGE_RATE', 'Exchange Rate:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CART_ITEMS', 'Cart items:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_TYPE', 'Trans. Type:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_ID', 'Trans. ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PARENT_TXN_ID', 'Parent Trans. ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_COMMENTS', 'System Comments:');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_TITLE', STORE_NAME . ' Purchase');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_ITEMNUM', 'Store Receipt');
