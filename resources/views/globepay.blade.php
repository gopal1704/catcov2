<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>test payment</title>
</head>

<body>
<form name="pay_with_globepay" id="pay_with_globepay" action="https://www.globepayinc.com/make_payment.php" target="_blank" method="post">
<input type="hidden" name="cancel_url" id="cancel_url" value="https://catcotrade.info/gperror" />
<input type="hidden" name="success_url" id="success_url" value="https://catcotrade.info/gpsuccess">
<input type="hidden" name="custom" id="custom" value="soapar_111"  />
<input type="hidden" name="button_type" id="button_type" value="buy_now" />
<input type="hidden" name="item_name" id="item_name" value="test"  />
<input type="hidden" name="item_id" id="item_id" value="456"  />
<input type="hidden" name="price" id="price" value="1"  />
<input type="hidden" name="quantity" id="quantity" value="1"  />
<input type="hidden" name="postage" id="postage" value=""  />
<input type="hidden" name="tax_rate" id="tax_rate" value=""  />
<input type="hidden" name="currency" id="currency" value="USD"  />
<input type="hidden" name="callback_url" id="callback_url" value="https://catcotrade.info/gpcallback"  />
<input type="hidden" name="email_address" id="email_address" value="catcotradeinfo@gmail.com"  />



<a href="#" ><img src="https://www.globepayinc.com/images/pay_with_globepay.PNG" style="border:2px solid #020"  onClick="javascript:document.getElementById('pay_with_globepay').submit();" style="border:none" /></a>
</form>




</body>
</html>