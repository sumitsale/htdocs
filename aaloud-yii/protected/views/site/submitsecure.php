<?php echo "processing . . ."; ?><form name="frm_checkout" action="<?php  echo Yii :: app()->params['STORE_WEBSITE_SECURE_URL']; ?>/checkout_artistaloud.php" method="post" onSubmit="chkCart();"><span id="display_checkout"><input type="hidden" name="checkout" value="<?php echo $checkout;?>"><span><div align="center" id='checkout_btn'><input type="image" src="images/spacer.gif" value="" title="" border="0" style="border:0"/></div><input type="hidden" name="H_STORE_SESSIONID" value="<?php echo $H_STORE_SESSIONID;?>"><input type="hidden" name="STORE" value="<?php echo $STORE;?>"></form><script language="javascript">	document.frm_checkout.submit();</script>