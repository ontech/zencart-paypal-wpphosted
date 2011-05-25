<?php
/**
 * @package languageDefines
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

  define('MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE', 'Pasarela integral de PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE', 'PayPal');
	if (IS_ADMIN_FLAG === true) {
	  define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>Pasarela integral de PayPal</strong> <br/> <a href="http://www.paypal.com/" target="_blank">Administrar cuenta PayPal.</a><br /><br /><font color="green"> Instrucciones de configuración: </font> <br/> <a href="http://www.paypal.com/" target="_blank"> Abra una cuenta PayPal: haga clic aquí. </a> <br/> <ul>'. (defined('MODULE_PAYMENT_PAYPALHSS_STATUS') ? '' : '<li>... y haga clic en "Instalar" para activar el soporte de Pasarela integral de PayPal... y "modificar" para indicar a Zen Cart su configuración de PayPal. </li>') '. </ul><font color="green"><hr /><strong>Requisitos:</strong></font><br /><hr />*<strong>Cuenta PayPal</strong> (<a href="http://www.paypal.com" target="_blank">haga clic para abrir la cuenta</a>)<br />*<strong>* Se utiliza el <strong>puerto 80</strong> para la comunicación bidireccional con la pasarela, por lo que debe estar abierto en el router o firewall de su servidor <br/> * La <strong> configuración </strong> debe ser la descrita anteriormente.');
	
	} else {
	  define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>Pasarela integral de PayPal</strong>');
	}

  define('MODULE_PAYMENT_PAYPALHSS_SANDBOXACTIVE', 'entorno de pruebas activo');
  define('MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE', 'Pagar con tarjeta');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS', 'Activar módulo de PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_STATUS_TEXT', '¿Desea aceptar pagos con PayPal?');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME', 'Nombre de usuario de API de PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME_TEXT', 'Puede ver su nombre de usuario de API de PayPal en Perfil> Acceso de API> Solicitar credenciales de API en su cuenta PayPal. Elija la opción Solicitar firma de API. <br/> NOTA: esto debe coincidir <strong> EXACTAMENTE</strong> con el valor de nombre de usuario de API.');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD', 'Contraseña de API de PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD_TEXT', 'Puede ver su contraseña de API de PayPal en Perfil> Acceso de API> Solicitar credenciales de API en su cuenta PayPal. Elija la opción Solicitar firma de API. <br/> NOTA: esto debe coincidir <strong> EXACTAMENTE</strong> con el valor de contraseña de API.');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE', 'Firma de API de PayPal');
  define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE_TEXT', 'Puede ver su firma de API de PayPal en Perfil> Acceso de API> Solicitar credenciales de API en su cuenta PayPal. Elija la opción Solicitar firma de API. <br/> NOTA: esto debe coincidir <strong> EXACTAMENTE</strong> con el valor de firma de API.');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Acción de pago');
  define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE_TEXT', '¿Cómo desea obtener el pago? <br/> <strong> Valor predeterminado: venta final </strong>');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY', 'Divisa de transacción');
  define('MODULE_PAYMENT_PAYPALHSS_CURRENCY_TEXT', '¿En qué divisa debería enviarse el pedido a PayPal? <br/> NOTA: si se envía a PayPal una divisa no admitida, se convertirá automáticamente a USD.');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE', 'Zona de pago');
  define('MODULE_PAYMENT_PAYPALHSS_ZONE_TEXT', 'Si se selecciona una zona, active esta forma de pago solo para esa zona.');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', 'Configurar estado de notificaciones pendientes');
  define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID_TEXT', 'Configure el estado de pedidos hechos con este módulo de pago que todavía no se han completado con el valor <br/> (\'Pending \' recomendado)');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', 'Configurar estado de pedidos');
  define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID_TEXT', 'Configure el estado de pedidos hechos con este módulo de pago cuyo pago se ha completado con el valor <br/> (\'Processing \' recomendado)');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', 'Orden de las formas de pago.');
  define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER_TEXT', 'Orden de las formas de pago. El más bajo se mostrará en primer lugar.');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER', 'En producción o en entorno de pruebas');
  define('MODULE_PAYMENT_PAYPALHSS_SERVER_TEXT', '<strong> En producción: </strong> utilizado para procesar transacciones reales<br/> Entorno de pruebas <strong>: </strong> para programadores y pruebas');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_FIRST_NAME', 'Nombre:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_LAST_NAME', 'Apellidos:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_BUSINESS_NAME', 'Nombre de la empresa:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_NAME', 'Nombre de dirección:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STREET', 'Calle:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_CITY', 'Ciudad:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATE', 'Provincia:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_ZIP', 'Código postal:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_COUNTRY', 'País:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EMAIL_ADDRESS', 'Correo electrónico del pagador:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EBAY_ID', 'Seudónimo de eBay:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_ID', 'Id. del pagador:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYER_STATUS', 'Estado del pagador:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_ADDRESS_STATUS', 'Estado de la dirección:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_TYPE', 'Tipo de pago:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_STATUS', 'Estado del pago:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PENDING_REASON', 'Razón pendiente:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_INVOICE', 'Factura:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_DATE', 'Fecha del pago:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CURRENCY', 'Divisa:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_GROSS_AMOUNT', 'Importe bruto:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PAYMENT_FEE', 'Tarifa del pago:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_EXCHANGE_RATE', 'Tipo de cambio:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_CART_ITEMS', 'Artículos del carro de la compra:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_TYPE', 'Tipo transacción:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_TXN_ID', 'Id. transacción:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_PARENT_TXN_ID', 'Id. de transacción principal:');
  define('MODULE_PAYMENT_PAYPALHSS_ENTRY_COMMENTS', 'Comentarios de sistema:');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_TITLE', STORE_NAME. 'Compra');
  define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_ITEMNUM', 'Recibo de tienda');
