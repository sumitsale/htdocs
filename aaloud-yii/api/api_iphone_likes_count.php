<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include('../include/function.php');

$content_id  = mysql_escape_string(trim($_GET["content_id"]));
$contentdata	  = 0;
if($content_id){
	$query = "select Count(*) as totalCount from tbl_aa_iphone_liked Where CONTENT_ID ='".$content_id."'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
	if($rows){
		$data= mysql_fetch_array($result);
		$contentdata=  $data["totalCount"];
	}
}
$db->mysqlclose(); 
echo $contentdata; 
?>