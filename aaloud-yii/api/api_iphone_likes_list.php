<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$unique_code  = mysql_escape_string(trim($_GET["unique_code"]));
$xmldata	  = '';
if($unique_code){
	$query = "select * from tbl_aa_iphone_liked Where UNIQUE_ID ='".$unique_code."'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
	$xmldata	=	'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	$xmldata	  .='<Likes>';
	while($data= mysql_fetch_array($result)){ 
			$xmldata	  .='<Like>';
			$xmldata	  .='<Content_id>'.$data["CONTENT_ID"].'</Content_id>';
			$xmldata	  .='<Content_type_id>'.$data["CONTENT_TYPE_ID"].'</Content_type_id>';
			$result_ora=query('select a.content_display_title  from tbl_contents a where a.content_id='.$data["CONTENT_ID"].'',$connection);
			list($content_display_title)=fetch_row($result_ora);
			$xmldata	  .='<Content_Title>'.$content_display_title.'</Content_Title>';
			$xmldata	  .='</Like>';
	}
	$xmldata	  .='</Likes>';
}
$xmldata	   =formatXmlString($xmldata);
$status=db_disconnect($connection);
$db->mysqlclose(); 
echo $xmldata; 
?>