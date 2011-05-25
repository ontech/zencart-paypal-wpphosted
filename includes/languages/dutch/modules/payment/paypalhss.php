<?php
/**
 * @package languageDefines
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

  define('MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE', 'PayPal Website Payments Pro - Hosted');
  define('MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE', 'PayPal');
  if (IS_ADMIN_FLAG === true) {
	define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal Website Payments Pro - Hosted</strong> <br /><a href="http://www.paypal.com/" target="_blank">Beheer je PayPal account.</a><br /><br /><font color="green">Configuratie gegevens:</font><br /> <a href="http://www.paypal.com/" target="_blank">Klik hier om je in te schrijven op een Paypal account.</a><br /> <ul>' . (defined('MODULE_PAYMENT_PAYPALHSS_STATUS') ? '' : '<li>... en klik "install" om de  PayPal Pro Hosted te activeren... en "configureer" om je Paypal gegevens in te vullen.</li>') . '</ul><font color="green"><hr /><strong>Requirements:</strong></font><br /><hr />*<strong>PayPal Account</strong> (<a href="http://www.paypal.com" target="_blank">klik om in te schrijven</a>)<br />*<strong>*<strong>Poort 80</strong>wordt gebruikt voor bidirectionele communicatie en moet geopend zijn op uw router/firewall<br />*<strong>Settings</strong> Moet geconfigureerd zijn als vermeld hierboven.');
  } else {
    define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal</strong>');
  }

  define('MODULE_PAYMENT_PAYPALHSS_SANDBOXACTIVE', 'Sandbox actief');
  define('MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE', 'Betalen via bankkaart');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS', 'Paypal module inschakelen');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS_TEXT', 'Wilt u Paypal betalingen accepteren?');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME', 'PayPal gebruikersnaam');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME_TEXT', 'Uw PayPal API gebruikersnaam kan niet gevonden worden voor uw profiel > API Access > aanvraag API Credentials in uw PayPal account. Kies voor de optie aanvraag API ondertekening.<br />NOTE: Deze moet <strong>exact </strong>overeenkomen met uw API gebruikersnaam.');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD', 'PAYPAL API wachtwoord');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD_TEXT', 'U kan uw Paypal API wachtwoord terugvinden in Profiel>API toegang> Aanvraag API gegevens voor uw PAYPAL rekening. Kies voor aanvraag API gegevens.<br />NOTE:Deze moet strong>exact </strong>overeenkomen met uw API wachtwoord.');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE', 'PayPal API handtekening');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE_TEXT', 'Uw Paypal API handtekening kan u terugvinden in uw profiel onder > API toegang >Aanvraag API gegevens voor uw PAYPAL rekening. Kies voor aanvraag API gegevens.<br />NOTE:Deze moet strong>exact </strong>overeenkomen met uw API handtekening.');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Betalingsactie');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE_TEXT', 'Hoe wilt u de betaling onvangen?<br /><strong>Standaard:Sale</strong>');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY', 'Devies transactie');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY_TEXT', 'In welk devies moet de betaling plaatsvinden?<br/> Opgelet: indien een ander devies gebruikt wordt zal deze automatisch worden omgezet in USD.');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE', 'Betalingszone');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE_TEXT', 'Indien u een zone selecteert, activeer dan enkel een betalingsmethode voor deze zone.');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', 'Configureer waarschuwingsberichten');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID_TEXT', 'Configureer de status van de bestellingen uitgevoerd met deze betalingsmodule, indien deze nog niet afgerond zijn.<br />(\'Pending\' recommended)');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', 'Configureer de bestellingsstatus');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID_TEXT', 'Configureer de bestellingsstatus uitgevoerd met deze betalingsmodule na afronding transactie.(\'Processing\' recommended)');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', 'Sorteervolgorde van de betalingsmethodes');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER_TEXT', 'Sorteervolgorde van de betalingsmethodes. Laagste wordt als eerste getoond.');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER', 'Live of Sandbox');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER_TEXT', '<strong>Live: </strong> Test live transacties<br/><strong>Sandbox: </strong>Voor ontwikkelaars en testen');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_FIRST_NAME', 'Voornaam');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_LAST_NAME', 'Achternaam');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_BUSINESS_NAME', 'Bedrijfsnaam');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_NAME', 'Adres');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STREET', 'Straat');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_CITY', 'Stad');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATE', 'Provincie');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_ZIP', 'Postcode');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_COUNTRY', 'Land');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EMAIL_ADDRESS', 'Payer email');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EBAY_ID', 'Ebay ID');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_ID', 'Payer Id');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_STATUS', 'Payer Status');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATUS', 'Adres status');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_TYPE', 'Type betaling');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_STATUS', 'Betaling status');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PENDING_REASON', 'Pending status');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_INVOICE', 'Factuur');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_DATE', 'Datum Betaling');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CURRENCY', 'Devies');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_GROSS_AMOUNT', 'Bruto bedrag');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_FEE', 'Betaling tax');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EXCHANGE_RATE', 'wisselkoers');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CART_ITEMS', 'Inhoud mand');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_TYPE', 'Type transactie');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_ID', 'Transactie ID');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PARENT_TXN_ID', 'Parent transactie ID');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_COMMENTS', 'Systeem opmerkingen');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_TITLE', 'STORE_NAME. 'Aankoop'');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_ITEMNUM', 'Kwijting');
