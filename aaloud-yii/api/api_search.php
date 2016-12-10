<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$aa_artist_list = artist_list();
$searchfor		= strip_tags(addslashes(trim($_GET["searchfor"])));
$trackarray		=  array();
$artistarray	=  array();
$xmldata  = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$xmldata  .='<Search>';
if($searchfor){
	$stmt = oci_parse($connection, 'begin artistaloud.prc_search(:p_search_string, :p_artist_id_str, :p_cur_contents, :p_cur_artists); end;');
	$cur_track_content = oci_new_cursor($connection);
	$cur_artist_content = oci_new_cursor($connection);


	oci_bind_by_name($stmt, ':p_search_string', $searchfor);
	oci_bind_by_name($stmt, ':p_artist_id_str', $aa_artist_list,1000);

	if (!oci_bind_by_name($stmt, ':p_cur_contents', $cur_track_content, -1, OCI_B_CURSOR)){
	  $err=oci_error($stmt);
	  die ($err['message']);
	}
	if (!oci_bind_by_name($stmt, ':p_cur_artists', $cur_artist_content, -1, OCI_B_CURSOR)){
	  $err=oci_error($stmt);
	  die ($err['message']);
	}
	oci_execute($stmt);
	oci_execute($cur_track_content);
	oci_execute($cur_artist_content);
	while ($trackdata = oci_fetch_row($cur_track_content)) {
		$trackarray[]= $trackdata;
	}
	while ($artistdata = oci_fetch_row($cur_artist_content)) {
		$artistarray[]= $artistdata;
	}
}
if(count($artistarray)>0){
	$xmldata  .='<Artists>';
	for($i=0;$i<count($artistarray);$i++){		
       	$xmldata  .='<Artist>';
		$xmldata  .='<Artist_id>'.trim($artistarray[$i][0]).'</Artist_id>';
		$xmldata  .='<Artist_name>'.str_replace("&", "%26",$artistarray[$i][1]).'</Artist_name>';
		$xmldata  .='</Artist>';
	}
	$xmldata  .='</Artists>';	
}
if(count($trackarray)>0){
	$xmldata  .='<Tracks>';
	for($i=0;$i<count($trackarray);$i++){
		$xmldata  .='<Track>';
		$xmldata  .='<Track_id>'.$trackarray[$i][0].'</Track_id>';
		$xmldata  .='<Track_name>'.$trackarray[$i][1].'</Track_name>';
		$xmldata  .='</Track>';
	}
	$xmldata  .='</Tracks>';
}
$xmldata  .='</Search>';

$db->mysqlclose();
$status=db_disconnect($connection);
echo $xmldata;
?>