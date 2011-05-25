<?php
/**
 * @package languageDefines
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

  define('MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE', 'PayPal Pro');
  define('MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE', 'PayPal');
  if (IS_ADMIN_FLAG === true) {
  define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal Pro</strong> <br /><a href="https://www.paypal.com/it/cgi-bin/webscr?cmd=_login-run">Gestisci il tuo conto PayPal</a><br /><br /><font color="green">Configuration Instructions:</font><br /> <a href="https://www.paypal-business.it/paypalpro.asp">Vuoi saperne di più? - clicca qui</a><br /> <ul>' . (defined('MODULE_PAYMENT_PAYPALHSS_STATUS') ? '' : '<li>... clicca sopra su "install"per abilitare PayPal Pro ... e clicca "edit" per configurare il tuo conto PayPal su Zen Cart.</li>') . '</ul><font color="green"><hr /><strong>Requisiti:</strong></font><br /><hr />*<strong>Conto PayPal</strong> (<a href="https://www.paypal.com/it/cgi-bin/webscr?cmd=_registration-run">Registrati</a>)<br />*<strong>*<strong>Porta 80</strong> usata per comunucazioni bidirezionali con il gateway, pertanto deve essere lasciata aperta sul tuo router/firewall dell''host<br />*<strong>Impostazioni:</strong> devono essere configurato come descritto sopra.');

 } else {
    define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPal</strong>');
  }

  define('MODULE_PAYMENT_PAYPALHSS_SANDBOXACTIVE', 'Sandbox attiva');
  define('MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE', 'Paga con carta');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS', 'Abilita il modulo PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS_TEXT', 'Vuoi accettare pagamenti con PayPal?');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME', 'Nome utente API');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME_TEXT', 'Il tuo nome utente API si trova nel tuo conto PayPal > Profilo > Accesso API > Visualizza Firma API. Clicca su Visualizza Firma API.<br /> NOTA: Devi inserire il Nome utente API <strong>ESATTAMENTE</strong> come riportato su PayPal.');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD', 'Password API');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD_TEXT', 'La tua Passowrd API si trova nel tuo conto PayPal > Profilo > Accesso API > Visualizza Firma API. Clicca su Visualizza Firma API.<br /> NOTA: Devi inserire la Password API <strong>ESATTAMENTE</strong> come riportato su PayPal.');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE', 'Firma');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE_TEXT', 'La tua Firma si trova nel tuo conto PayPal > Profilo > Accesso API > Visualizza Firma API. Clicca su Visualizza Firma API.<br /> NOTA: Devi inserire la Firma <strong>ESATTAMENTE</strong> come riportato su PayPal.');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Modalità di pagamento');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE_TEXT', 'Come vuoi ottenere il pagamento?<br /><strong>Default: Final Sale</strong>');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY', 'Valuta della transazione');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY_TEXT', 'In che valuta vuoi che l''ordine sia inviato a PayPal?<br />NOTA: se una valuta non supportata è inviata a PayPal, sarà automaticamente convertita in USD.');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE', 'Zona pagamento');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE_TEXT', 'Se si seleziona una zona, si limiteranno i pagamenti provvenienti da quella zona. Viceversa, non selezionando nessuna zona, si accetteranno i pagamenti da tutte le zone.');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', 'Imposta lo stato della notifica Pending');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID_TEXT', 'Imposta lo stato degli ordini non completati eseguiti con questo modulo di pagamento sul valore<br />(\'Pending\' consigliato)');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', 'Imposta lo stato dell''ordine');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID_TEXT', 'Imposta lo stato degli ordini completati eseguiti con questo modulo di pagamento sul valore<br />(\'Pending\' consigliato)');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', 'Scegli l''ordine di visualizzazione.');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER_TEXT', 'Scegli l''ordine di visualizzazione. Minore il valore migliore la visibilità della modalità di pagmento per chi paga.');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER', 'Live o Sandbox');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER_TEXT', '<strong>Live: Usato per processare transazioni in produzione<br/><strong>Sandbox: </strong>Usato per sviluppatori o testing');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_FIRST_NAME', 'Nome:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_LAST_NAME', 'Cognome:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_BUSINESS_NAME', 'Ragione sociale:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_NAME', 'Nome indirizzo:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STREET', 'Indirizzo:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_CITY', 'Città:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATE', 'Provincia:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_ZIP', 'CAP:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_COUNTRY', 'Nazione:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EMAIL_ADDRESS', 'Email pagante:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EBAY_ID', 'ID eBay:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_ID', 'ID pagante:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_STATUS', 'Stato pagante:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATUS', 'Stato indirizzo:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_TYPE', 'Tipo pagamento:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_STATUS', 'Stato pagamento:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PENDING_REASON', 'Motivo Pending:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_INVOICE', 'Fattura:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_DATE', 'Data pagamento:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CURRENCY', 'Valuta:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_GROSS_AMOUNT', 'Totale lordo:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_FEE', 'Commissione di pagamento:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EXCHANGE_RATE', 'Tasso di cambio:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CART_ITEMS', 'Oggetti carrello:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_TYPE', 'Tipo transazione:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_ID', 'Trans. ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PARENT_TXN_ID', 'Parent Trans. ID:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_COMMENTS', 'Commenti di sistema:');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_TITLE', STORE_NAME . ' Acquisto');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_ITEMNUM', 'Ricevuta negozio');
