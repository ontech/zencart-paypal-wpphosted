<?php
/**
 * @package languageDefines
 * @copyright Copyright 2011 OnTechnology Pty Ltd
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */


	define('MODULE_PAYMENT_PAYPALHSS_TEXT_ADMIN_TITLE', 'PayPal ウェブペイメントプラス');
	define('MODULE_PAYMENT_PAYPALHSS_TEXT_CATALOG_TITLE', 'PayPal');
	if (IS_ADMIN_FLAG === true) {
		define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPalウェブペイメントプラス</strong> <br /><a href=""http://www.paypal.com/"" target=""_blank"">PayPalアカウントの管理</a><br /><br /><font color=""green"">設定手順:</font><br /> <a href=""http://www.paypal.com/"" target=""_blank"">PayPalアカウント開設 - クリック</a><br /> <ul>' . (defined('MODULE_PAYMENT_PAYPALHSS_STATUS') ? '' : '<li>... PayPalウェブペイメントプラスサポートを有効にするには""install""をクリックし、その後""edit""でZen CartにPayPalアカウントを設定</li>') . '</ul><font color=""green""><hr /><strong>必須要件:</strong></font><br /><hr />*<strong>PayPalアカウント</strong> (<a href=""http://www.paypal.com"" target=""_blank"">クリックしてアカウント開設</a>)<br />*<strong>80番ポートが双方向通信のために使用されますのでルータやファイアウォールであけておく必要があります。</strong><br />*<strong>上記のように設定されている必要があります。</strong>');
	} else {
		define('MODULE_PAYMENT_PAYPALHSS_TEXT_DESCRIPTION', '<strong>PayPalウェブペイメントプラス</strong>');
	}
  
	define('MODULE_PAYMENT_PAYPALHSS_SANDBOXACTIVE', 'sandboxアクティブ');
	define('MODULE_PAYMENT_PAYPALHSS_CHECKOUT_TITLE', 'クレジットカード払い');
	define('MODULE_PAYMENT_PAYPALHSS_STATUS', 'PayPalモジュールの有効化');
	define('MODULE_PAYMENT_PAYPALHSS_STATUS_TEXT', 'PayPal支払いを受け付けますか？');
	define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME', 'PayPal APIユーザ名');
	define('MODULE_PAYMENT_PAYPALHSS_API_USERNAME_TEXT', 'PayPal APIユーザ名は、PayPalアカウントの 個人設定 > APIアクセス > API信用証明書の請求 にあります。API署名の請求オプションを選択してください。<br />注意:APIユーザ名の値と<strong>正確に</strong>一致している必要があります。');
	define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD', 'PayPal APIパスワード');
	define('MODULE_PAYMENT_PAYPALHSS_API_PASSWORD_TEXT', 'PayPal APIパスワードは、PayPalアカウントの 個人設定 > APIアクセス > API信用証明書の請求 にあります。API署名の請求オプションを選択してください。<br />注意:APIパスワードの値と<strong>正確に</strong>一致している必要があります。');
	define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE', 'PayPal API署名');
	define('MODULE_PAYMENT_PAYPALHSS_API_SIGNATURE_TEXT', 'PayPal API署名は、PayPalアカウントの 個人設定 > APIアクセス > API信用証明書の請求 にあります。API署名の請求オプションを選択してください。<br />注意:API署名の値と<strong>正確に</strong>一致している必要があります。');
	define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE', 'Payment Action');
	define('MODULE_PAYMENT_PAYPALHSS_TRANSACTION_MODE_TEXT', 'どのように決済を行いますか？<br /><strong>デフォルト:Final Sales</strong>');
	define('MODULE_PAYMENT_PAYPALHSS_CURRENCY', '決済通貨');
	define('MODULE_PAYMENT_PAYPALHSS_CURRENCY_TEXT', 'どの通貨でPayPalに注文を送信しますか?<br />注意:もしサポートされていない通貨を送信した場合、自動的にUSドルに変換されます。');
	define('MODULE_PAYMENT_PAYPALHSS_ZONE', '決済地域');
	define('MODULE_PAYMENT_PAYPALHSS_ZONE_TEXT', '地域を選択すると、その地域のみでこの決済方法は有効となります。');
	define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID', '保留注文状態の設定');
	define('MODULE_PAYMENT_PAYPALHSS_PROCESSING_STATUS_ID_TEXT', '決済が完了していない注文には以下の値を設定します<br />(\'Pending\' を推奨)');
	define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID', '注文状態の設定');
	define('MODULE_PAYMENT_PAYPALHSS_ORDER_STATUS_ID_TEXT', '決済が完了した注文には以下の値を設定します<br />(\'Processing\' を推奨)');
	define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER', '表示順');
	define('MODULE_PAYMENT_PAYPALHSS_SORT_ORDER_TEXT', '表示順。小さい値ほど上に表示されます。');
	define('MODULE_PAYMENT_PAYPALHSS_SERVER', 'Live or Sandbox');
	define('MODULE_PAYMENT_PAYPALHSS_SERVER_TEXT', '<strong>Live: </strong>  本番の決済を処理する場合に指定<br/><strong>Sandbox: </strong>開発及びテスト');

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
	define('MODULE_PAYMENT_PAYPALHSS_ENTRY_COMMENTS', 'System Comments: ');
	
	
	define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_TITLE', STORE_NAME . ' Purchase');
	define('MODULE_PAYMENT_PAYPALHSS_PURCHASE_DESCRIPTION_ITEMNUM', 'Store Receipt');
