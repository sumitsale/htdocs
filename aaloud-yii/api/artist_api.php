<?php
/*
 * Created on Nov 20, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * Built By Mathew Thomas 
 * Details : Script is Developed as a API for Vertical  A-Z Listing –With Genre/Language/
 *
 *
 **/
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$aa_artist_list = artist_list();
$filter_artist_alpha = "ALL";
$artist_type  = "";
$artist_lang  = "";
$artist_genre = "";
$artist_record_count = 0;
$alphafilter  = mysql_escape_string(trim($_GET["alphafilter"]));
$searchby  	  = mysql_escape_string(trim($_GET["SEARCHBY"]));
$xmldata	  ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
if($alphafilter){
    $filter_artist_alpha = $alphafilter;
}
if($searchby){
	$searchtype=explode(":",$searchby); 
	if($searchtype[0]=="AT"){
		$artist_type  = $searchtype[1];
	}
	if($searchtype[0]=="AG"){
		$artist_genre  = $searchtype[1];
	}
	if($searchtype[0]=="AL"){
		$artist_lang  = $searchtype[1];
	}
}
$artistarray = array();
$stmt = oci_parse($connection, 'begin artistaloud.prc_artistlanding(:p_artist_id, :p_search_alphabet, :p_artist_type, :p_language, :p_genre, :p_total_count, :p_artist_cursor); end;');
$cur_artist_details = oci_new_cursor($connection);

oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
oci_bind_by_name($stmt, ':p_search_alphabet', $filter_artist_alpha,100);
oci_bind_by_name($stmt, ':p_artist_type', $artist_type,100);
oci_bind_by_name($stmt, ':p_language', $artist_lang,100);
oci_bind_by_name($stmt, ':p_genre', $artist_genre,100);
oci_bind_by_name($stmt, ':p_total_count', $artist_record_count,9,SQLT_INT);

if (!oci_bind_by_name($stmt, ':p_artist_cursor', $cur_artist_details, -1, OCI_B_CURSOR)){
   $err=oci_error($stmt);
   die ($err['message']);
}
oci_execute($stmt);
oci_execute($cur_artist_details);
while ($artistdata = oci_fetch_row($cur_artist_details)){
	$artistarray[] = $artistdata;
}

$xmldata	  .='<Artists Artist_count="'.count($artistarray).'">';
//var_dump($artistarray);
for($t=0;$t<count($artistarray);$t++){
	$artist_img_50x50 = artist_image($artistarray[$t][0],1,2);
	$result=@query('select artist_description from tbl_artist_details where artist_id = '.$artistarray[$t][0],$connection);
 	@list($artist_description)=@fetch_row($result);
	$xmldata	  .='<Artist>';
	$xmldata	  .='<Artist_id>'.$artistarray[$t][0].'</Artist_id>';
	$xmldata	  .='<Artist_name>'.str_replace("&", "%26",$artistarray[$t][1]).'</Artist_name>';
	$xmldata	  .='<Artist_language>'.$artistarray[$t][2].'</Artist_language>';
	$xmldata	  .='<Artist_genre>'.$artistarray[$t][3].'</Artist_genre>';
	$xmldata	  .='<Artist_image_50x50>'.str_replace("&", "%26",$artist_img_50x50).'</Artist_image_50x50>';
	$xmldata	  .='<Artist_image_80x80>'.str_replace("&", "%26",$artistarray[$t][4]).'</Artist_image_80x80>';
	$xmldata	  .='<Artist_trackcount>'.$artistarray[$t][5].'</Artist_trackcount>';
	$xmldata	  .='<Artist_description>'.str_replace("&", "%26",strip_tags($artist_description)).'</Artist_description>';
	$xmldata	  .='</Artist>';
	
}
$xmldata	  .='</Artists>';
$xmldata	   =formatXmlString($xmldata); 			
$status=db_disconnect($connection);
$db->mysqlclose();
echo $xmldata;
?>
