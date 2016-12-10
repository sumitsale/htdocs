<?php
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
include('../include/function.php'); 

$connection=db_connect();

$p_content_id          = trim($_REQUEST["cid"]);
if(!$p_content_id){
    echo 'NA';
    exit();
}

$stmt = oci_parse($connection, 'begin hungama1_cms.prc_vendor_catalog_album(:p_content_id, :p_vendor_name, :p_catalog_id, :p_album_title); end;');

oci_bind_by_name($stmt, ':p_content_id', $p_content_id);
oci_bind_by_name($stmt, ':p_vendor_name', $p_vendor_name,1000);
oci_bind_by_name($stmt, ':p_catalog_id', $p_catalog_id,1000);
oci_bind_by_name($stmt, ':p_album_title', $p_album_title,1000);
//echo $stmt;
oci_execute($stmt);
echo $p_vendor_name."|".$p_catalog_id."|".$p_album_title;
//$arrData = array();
if($p_album_title){
	echo $p_vendor_name."|".$p_catalog_id."|".$p_album_title;
}else{
	echo "NA";	
}

//echo "<pre>";
//print_r($arrData);
//echo serialize($arrData);
$status=db_disconnect($connection);
?>