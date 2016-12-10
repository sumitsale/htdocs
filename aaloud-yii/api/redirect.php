<?php
	include('../common.php');
	include('../include/function.php');
	fetchstorefrontinfo($STORE_ID);
	
	$redirect_url		= mysql_escape_string(trim($_GET['URI']));
	$redirect_domain	= mysql_escape_string(trim($_GET['domain']));
	if($redirect_url && $redirect_domain){
		header('Location: '.$GLOBALS[$redirect_domain].$redirect_url);
	}
?>
