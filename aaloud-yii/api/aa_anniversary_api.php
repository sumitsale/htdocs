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
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1'); 
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$aa_artist_list	= mysql_escape_string(trim($_GET["artist_id"]));	
if(!is_numeric($aa_artist_list)){
	$aa_artist_list = '102,3483,16242,7267,3292,995,28238,17148,16153,2738,2760,3041,16167,6981,16168,16239,16216,8172,44218,16181';
}
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
	$xmldata	  .='<Artist_name>'.$artistarray[$t][1].'</Artist_name>';
	$xmldata	  .='<Artist_language>'.$artistarray[$t][2].'</Artist_language>';
	$xmldata	  .='<Artist_genre>'.$artistarray[$t][3].'</Artist_genre>';
	//$xmldata	  .='<Artist_image_50x50>'.str_replace("&", "%26",$artist_img_50x50).'</Artist_image_50x50>';
	//$xmldata	  .='<Artist_image_80x80>'.str_replace("&", "%26",$artistarray[$t][4]).'</Artist_image_80x80>';
	$xmldata	  .='<Artist_trackcount>'.$artistarray[$t][5].'</Artist_trackcount>';
	$xmldata	  .='<Artist_description><![CDATA['.strip_tags($artist_description).']]></Artist_description>';
	$xmldata	  .='<Artist_Tracks>';
	if($artistarray[$t][7] || $artistarray[$t][7]!="NULL"){
		$artist_track_listing = explode(",",$artistarray[$t][7]);
		$artist_track_count=count($artist_track_listing);
		/* if($artist_track_count>1){
			$artist_track_count=1;
		} */
		$j=0;
		$track_list	= "";
		for($i=0;$i<$artist_track_count;$i++){
			$track_list = $artist_track_details[2];
			$artist_track_details = explode("|",$artist_track_listing[$i]);
			if($artist_track_details[0]){
				$xmldata	  .='<Artist_Track>'.$artist_track_details[1].'</Artist_Track>';
				$xmldata	  .='<Artist_Track_Id>'.$artist_track_details[0].'</Artist_Track_Id>';
				$xmldata	  .='<Artist_Track_Path>'.$artist_track_details[2].'</Artist_Track_Path>';
			}
		}
	}
	$xmldata	  .='</Artist_Tracks>';
	//call Procedure to get all Gallery Images
	$wall50array = array();
	$wall100array = array();

	$artist_start = 0;
	$artist_end = 16;
	$artist_track_count = 0;
	$artist_id	=	$artistarray[$t][0];
	$stmt = oci_parse($connection, 'begin artistaloud.prc_artistdetail_wallpaper(:p_artist_id, :p_start, :p_end, :p_track_count, :p_cur50x50, :p_cur100x100); end;');
	$artist_cur50x50 = oci_new_cursor($connection);
	$artist_cur100x100 = oci_new_cursor($connection);

	oci_bind_by_name($stmt, ':p_artist_id', $artist_id,9);
	oci_bind_by_name($stmt, ':p_start', $artist_start,9,SQLT_INT);
	oci_bind_by_name($stmt, ':p_end', $artist_end,9,SQLT_INT);
	oci_bind_by_name($stmt, ':p_track_count', $artist_track_count,9,SQLT_INT);

	if (!oci_bind_by_name($stmt, ':p_cur50x50', $artist_cur50x50, -1, OCI_B_CURSOR)){
	   $err=oci_error($stmt);
	   die ($err['message']);
	}
	if (!oci_bind_by_name($stmt, ':p_cur100x100', $artist_cur100x100, -1, OCI_B_CURSOR)){
	   $err=oci_error($stmt);
	   die ($err['message']);
	}
	
	oci_execute($stmt);
	oci_execute($artist_cur50x50);
	oci_execute($artist_cur100x100);
	
	while ($wall100 = oci_fetch_row($artist_cur100x100)){
		$wall100array[] = $wall100;
	}

	$Num_Rows = count($wall100array);
	if($Num_Rows>0){
		$xmldata	  .='<Artist_Galleries>';
		for($i=0;$i<$Num_Rows;$i++){
			$xmldata	  .='<Artist_Gallery>';
			$xmldata	  .='<Artist_Gallery_100x100>'.$wall100array[$i][2].'</Artist_Gallery_100x100>';
			$xmldata	  .='<Artist_Gallery_500x320>'.artist_gallery($wall100array[$i][0]).'</Artist_Gallery_500x320>';
			$xmldata	  .='</Artist_Gallery>';
		} 
		$xmldata	  .='</Artist_Galleries>';
	}
	//call Procedure to get all Gallery Images
	$videoarray = array();

	$artist_track_count = 0;
	$stmt = oci_parse($connection, 'begin artistaloud.prc_artistdetail_video(:p_artist_id, :p_track_count, :p_cur); end;');
	$artist_cur_video = oci_new_cursor($connection);

	oci_bind_by_name($stmt, ':p_artist_id', $artist_id,9);
	oci_bind_by_name($stmt, ':p_track_count', $artist_track_count,9,SQLT_INT);

	if (!oci_bind_by_name($stmt, ':p_cur', $artist_cur_video, -1, OCI_B_CURSOR)){
	   $err=oci_error($stmt);
	   die ($err['message']);
	}
	
	oci_execute($stmt);
	oci_execute($artist_cur_video);
	
	while ($videodata = oci_fetch_row($artist_cur_video)){
		$videoarray[] = $videodata;
	}
	//var_dump($videoarray);
	if($artist_track_count>0){
		$xmldata	  .='<Artist_Videos>';
		for($i=0;$i<$artist_track_count;$i++){
			$xmldata	  .='<Artist_Video>';
			$xmldata	  .='<Artist_Video_Id>'.$videoarray[$i][0].'</Artist_Video_Id>';
			$xmldata	  .='<Artist_Video_Title><![CDATA['.$videoarray[$i][1].']]></Artist_Video_Title>';
			$xmldata	  .='<Artist_Video_50x50>'.artist_gallery($videoarray[$i][0],362,1).'</Artist_Video_50x50>';
			$xmldata	  .='<Artist_Video_Path>'.artist_gallery($videoarray[$i][0],361,3).'</Artist_Video_Path>';
			$xmldata	  .='<Artist_Video_Desc><![CDATA['.strip_tags($videoarray[$i][4]).']]></Artist_Video_Desc>';
			$xmldata	  .='</Artist_Video>';
		} 
		$xmldata	  .='</Artist_Videos>';
	}
	$xmldata	  .='</Artist>';
	
}
$xmldata	  .='</Artists>';
$xmldata	   =formatXmlString($xmldata); 			
$status=db_disconnect($connection);
$db->mysqlclose();
echo $xmldata;
?>
