<?php
/*
 * Created on Nov 25, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
session_start();
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
 
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$aa_artist_list = artist_list();
$filter_artist_alpha = "LATEST";
$mainlist_header	 = "";
$artist_type  = mysql_escape_string(trim($_GET["artist_type"]));
$artist_lang  = mysql_escape_string(trim($_GET["artist_lang"]));
$artist_genre = mysql_escape_string(trim($_GET["artist_genre"]));
$artist_record_count = 0;
$artist_id	  = mysql_escape_string(trim($_GET["artist_id"]));
$alphafilter  = mysql_escape_string(trim($_GET["alphafilter"]));
$searchby  	  = mysql_escape_string(trim($_GET["SEARCHBY"]));
$strPage	  = mysql_escape_string(trim($_REQUEST[Page]));
if($artist_id){
	$aa_artist_list = $artist_id;
}
if($alphafilter){
    $filter_artist_alpha = $alphafilter;
}

if(!$artist_type && !$artist_genre && !$artist_lang){
	$stmt = oci_parse($connection, 'begin artistaloud.prc_listen(:p_artist_id, :p_search_alphabet, :p_total_count, :p_cur); end;');
	$cur_track_details = oci_new_cursor($connection);

	oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
	oci_bind_by_name($stmt, ':p_search_alphabet', $filter_artist_alpha,100);
	oci_bind_by_name($stmt, ':p_total_count', $artist_record_count,9,SQLT_INT);

	if (!oci_bind_by_name($stmt, ':p_cur', $cur_track_details, -1, OCI_B_CURSOR)){
	   $err=oci_error($stmt);
	   die ($err['message']);
	}
	oci_execute($stmt);
	oci_execute($cur_track_details);

	$trackarray = array();
	while ($trackdata = oci_fetch_row($cur_track_details)){
		$trackarray[] =$trackdata; 
	}
	if($artist_id){
		$mainlist_header	 =	$trackarray[0][9];
	}
}else{
	$stmt = oci_parse($connection, 'begin artistaloud.prc_listen_playlist(:p_artist_id, :p_artist_type, :p_genre, :p_language, :p_total_count, :p_cur); end;');
	$cur_track_details = oci_new_cursor($connection);

	oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
	oci_bind_by_name($stmt, ':p_artist_type', $artist_type,100);
	oci_bind_by_name($stmt, ':p_genre', $artist_genre,100);
	oci_bind_by_name($stmt, ':p_language', $artist_lang,100);
	oci_bind_by_name($stmt, ':p_total_count', $artist_record_count,9,SQLT_INT);

	if (!oci_bind_by_name($stmt, ':p_cur', $cur_track_details, -1, OCI_B_CURSOR)){
	   $err=oci_error($stmt);
	   die ($err['message']);
	}
	oci_execute($stmt);
	oci_execute($cur_track_details);

	$trackarray = array();
	while ($trackdata = oci_fetch_row($cur_track_details)){
		$trackarray[] =$trackdata; 
	}
	$mainlist_header	 =	"Browse By";
}
//var_dump($trackarray);
$xmldata	  ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$xmldata	  .='<Tracks>';
for($i=0;$i<count($trackarray);$i++){
	if(!in_array($trackarray[$i][2],$TrackBannedArray))
	{
		$artist_img_50x50 = artist_image($trackarray[$i][8],1,2);
		$result=@query('select artist_description,artist_detail from tbl_artist_details where artist_id = '.$trackarray[$i][8],$connection);
		@list($artist_description,$artist_detail)=@fetch_row($result);
		$xmldata	  .='<Track>';
		$xmldata	  .='<Track_id>'.$trackarray[$i][2].'</Track_id>';
		$result_ora=query('select package_content_id from tbl_package_content_map where content_id ='.$trackarray[$i][2].'',$connection);
		list($album_id)=fetch_row($result_ora); 
		$query = "select ITUNE_URL from tbl_aa_itunes Where ALBUM_ID ='".$album_id."'";
		$result_itune = mysql_query($query);
		$rows = mysql_num_rows($result_itune);
		if($rows){
			$data= mysql_fetch_array($result_itune);
			$xmldata	  .='<Track_itune>'.str_replace("&", "%26",$data["ITUNE_URL"]).'</Track_itune>';
		}else{
			$xmldata	  .='<Track_itune/>';
		}
		$xmldata	  .='<Track_name>'.str_replace("&", "%26",$trackarray[$i][3]).'</Track_name>';
		$xmldata	  .='<Track_path>'.str_replace("&", "%26",$trackarray[$i][4]).'</Track_path>';
		$xmldata	  .='<Track_albumimg>'.str_replace("&", "%26",$trackarray[$i][5]).'</Track_albumimg>';
		$xmldata	  .='<Track_artistid>'.$trackarray[$i][8].'</Track_artistid>';
		$xmldata	  .='<Track_artistname>'.str_replace("&", "%26",$trackarray[$i][9]).'</Track_artistname>';
		$xmldata	  .='<Track_artistimg>'.str_replace("&", "%26",$artist_img_50x50).'</Track_artistimg>';
		//$xmldata	  .='<Track_artistdesc>'.str_replace("&", "%26",strip_tags($artist_description)).'</Track_artistdesc>';
		$xmldata	  .='</Track>';	
	}
}
$xmldata	  .='</Tracks>';
$xmldata = formatXmlString($xmldata);
$status	 = db_disconnect($connection);
$db->mysqlclose();
echo $xmldata;  
?>
