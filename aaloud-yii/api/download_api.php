<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include('../include/function.php');
fetchstorefrontinfo($STORE_ID);

$content_id				=	mysql_escape_string(trim($_GET["content_id"]));
$content_type_id		=	mysql_escape_string(trim($_GET["content_type_id"]));
$is_ringtone			=	mysql_escape_string(trim($_GET["isRingtone"]));
$email					=	mysql_escape_string(trim($_GET["email"]));
$refer_var 				=   $refer_var = urlencode($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']); 
$redirect				= 	$refer_var;
$is_drm					=	0;
$notify					=	mysql_escape_string(trim($_GET["notify"]));

if(!$content_id || !$content_type_id ){
	echo "Invalid Download Request";
	exit();
}else{
	fetchstorefrontinfo($STORE_ID);
	if(!$map_id){
		$map_id		 =  0;	
	}
	if(!$notify){
		$notify="M";
	}
	if(!$is_ringtone){
		$is_ringtone=0;
	}	
	$flvcopyurl		= $GLOBALS['STORE_DELIVERY_URL']."/direct_generate";
	//$data1		= "content_id=".$content_id."&content_type_id=".$content_type_id."&plan_id=".$plan_id;				

	$data1		=	'<?xml version="1.0" encoding="utf-8" ?>';
	$data1		.=	'<request>';
	$data1		.=	'<content>';
		$data1		.=	'<contentID>'.$content_id.'</contentID>';
		$data1		.=	'<contentTypeID>'.$content_type_id.'</contentTypeID>';
		$data1		.=	'<contentSubTypeID>'.$map_id.'</contentSubTypeID>';
		$data1		.=	'<isRingtone>'.$is_ringtone.'</isRingtone>';
		$data1		.=	'<isDRM>'.$is_drm.'</isDRM>';
	$data1		.=	'</content>';
	$data1		.=	'<notifyURL>'.$notify.'</notifyURL>';
	$data1		.=	'<storeID>'.$_SESSION[STORE_ID].'</storeID>';	
	$data1		.=	'<downloadType>D</downloadType>';
	$data1		.=	'</request>';

	$file_result = sendXmlOverPost($flvcopyurl, $data1);
	if($file_result=="NA"){
		echo "Invalid Download Request";
	}elseif($file_result=="NA4"){
		echo "File Does not Exist";
	}else{
		if($_SESSION[STORE_ID]!=$STORE_ID){
			$file_result = "/3".$file_result;
			//header("Location: redirect.php?URI=".$file_result."&domain=STORE_DELIVERY_URL");
		}else{
			$file_result = "/4".$file_result;
			//header("Location: redirect.php?URI=".$file_result."&domain=STORE_DELIVERY_URL");	
		}
		if($is_ringtone==1){
			if($email){
				$EMAILHTML = '';
				$EMAILHTML  = 'Dear Customer<br><br>'; 
				$EMAILHTML .= 'Congratulations! on your download through the ArtistAloud Application.<br><br>';
				$EMAILHTML .= 'Details of your download is:<br><br>';
				$EMAILHTML .= 'Total items: 1<br>';
				$EMAILHTML .= 'Download URL: <a href="'.$GLOBALS["STORE_DELIVERY_URL"].$file_result.'" target=_blank>'.$GLOBALS["STORE_DELIVERY_URL"].$file_result.'</a><br>';
				$EMAILHTML .= 'Hope you have a great time browsing and downloading our unlimited library of entertainment on ArtistAloud.com!<br><br>';
				$EMAILHTML .= 'Warm Regards,<br>';
				$EMAILHTML .= '<a href="http://www.ArtistAloud.com">ArtistAloud Team</a><br><br>';
				$EMAILHTML .= 'P.S. This is an automated email. Please do not reply to this mail, as you will not receive a response.<br><br>';
				$sendmail_status = sendemail($email,"","Ringtone Download",$EMAILHTML,$EMAILHTML);
				echo 'done=1';
			}
		}else{
			echo "<meta http-equiv='Refresh' content=\"0;url=redirect.php?URI=".$file_result."&domain=STORE_DELIVERY_URL\">";	
		}
	}
}

$db->mysqlclose();
?>