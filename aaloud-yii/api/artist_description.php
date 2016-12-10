<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
 
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');
$artist_id 	 = mysql_escape_string(trim($_GET["artist_id"]));
$xmldata	 = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
if($artist_id){
	$result=@query('select artist_description,artist_detail from tbl_artist_details where artist_id = '.$artist_id,$connection);
 	@list($artist_description,$artist_detail)=@fetch_row($result);
	$xmldata	  .='<Artist>';
		$xmldata	  .='<Details>';
			$xmldata	  .='<Artist_id>'.$artist_id.'</Artist_id>';
			$xmldata	  .='<Artist_description>'.str_replace("&", "%26",strip_tags($artist_detail)).'</Artist_description>';
		$xmldata	  .='</Details>';	
	$xmldata	  .='</Artist>';
	$xmldata = formatXmlString($xmldata); 			
}
$status	 = db_disconnect($connection);
$db->mysqlclose();
echo $xmldata; 
?>