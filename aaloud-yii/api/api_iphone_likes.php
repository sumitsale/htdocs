<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include('../include/function.php');

$unique_code  = mysql_escape_string(trim($_GET["unique_code"]));
$content_id   = mysql_escape_string(trim($_GET["content_id"]));
$today		  =  time();
$content_type_id      =   mysql_escape_string(trim($_GET["content_type_id"]));
if(!$content_type_id){
	$content_type_id=1;
}

if($unique_code && strlen($unique_code)>=20 && $content_id){
	$query = "select * from tbl_aa_iphone_liked Where UNIQUE_ID ='".$unique_code."'  and CONTENT_TYPE_ID='".$content_type_id."' and CONTENT_ID = '".$content_id."'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    if($rows){
		//mysql_query("Update tbl_aa_iphone_liked set LIKED_COUNTER=LIKED_COUNTER+1,INDATE='".$today."' Where UNIQUE_ID ='".$unique_code."' and CONTENT_TYPE_ID='".$content_type_id."'  and CONTENT_ID = '".$content_id."'") or die(mysql_error());
		echo "D";
	}else{
		$user_like=array(
                'UNIQUE_ID'=>"$unique_code",
                'CONTENT_ID'=>"$content_id",
                'CONTENT_TYPE_ID'=>"$content_type_id",
                'LIKED_COUNTER'=>"1",
                'INDATE'=>"$today"
        );
        $likecart=insert('tbl_aa_iphone_liked',$user_like);
	}
	echo "Y";
}else{
	echo "N";
}
$db->mysqlclose();
?>