<?php
/*
 * Created on Nov 21, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * Built By Mathew Thomas 
 * Details : Script is Developed as a API for providing Artist Details
 */
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$artist_id 	 = mysql_escape_string(trim($_GET["artist_id"]));
$artist_name = "";
$trackarray = array();
$xmldata	 = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
if($artist_id){
	$artist_query  = "select * from tbl_aa_artist Where Artist_Id='".$artist_id."' and Artist_Status='P' Limit 1";
	$artist_sql    = mysql_query($artist_query) or die(mysql_error());
	$artist_nr	   = mysql_num_rows($artist_sql);
	if($artist_nr){
   		$artist_result = mysql_fetch_array($artist_sql) or die(mysql_error());
   		$artist_name = ucwords(strtolower(stripslashes(trim($artist_result["Artist_Name"]))));
	}
	//call to procedure
	$stmt = oci_parse($connection, 'begin artistaloud.prc_artistdetail(:p_artist_id, :p_artist_image, :p_artist_language, :p_artist_long_description, :p_artist_short_description, :p_artist_genre, :p_cur); end;');
	$cur_track_details = oci_new_cursor($connection);
	oci_bind_by_name($stmt, ':p_artist_id', $artist_id);
	oci_bind_by_name($stmt, ':p_artist_image', $artist_image,1000);
	oci_bind_by_name($stmt, ':p_artist_language', $artist_lang,100);
	oci_bind_by_name($stmt, ':p_artist_long_description',$artist_desc,5000);
	oci_bind_by_name($stmt, ':p_artist_short_description',$artist_brief,5000);
	oci_bind_by_name($stmt, ':p_artist_genre',$artist_genre,100);
	
	if (!oci_bind_by_name($stmt, ':p_cur', $cur_track_details, -1, OCI_B_CURSOR)){
		$err=oci_error($stmt);
	    die ($err['message']);
	}
	oci_execute($stmt);
	oci_execute($cur_track_details);
	
	while ($trackdata = oci_fetch_row($cur_track_details)) {
		$trackarray[] = $trackdata;
	}
	$artist_img_50x50 = artist_image($artist_id,1,2);
	//var_dump($trackarray);
	$xmldata	  .='<Artist>';
		$xmldata	  .='<Details>';
			$xmldata	  .='<Artist_id>'.$artist_id.'</Artist_id>';
			$xmldata	  .='<Artist_name>'.str_replace("&", "%26",$artist_name).'</Artist_name>';
			$xmldata	  .='<Artist_image_50x50>'.str_replace("&", "%26",$artist_img_50x50).'</Artist_image_50x50>';
			$xmldata	  .='<Artist_image_200x200>'.str_replace("&", "%26",$artist_image).'</Artist_image_200x200>';
			$xmldata	  .='<Artist_language>'.str_replace("&", "%26",$artist_lang).'</Artist_language>';
			$xmldata	  .='<Artist_long_description>'.str_replace("&", "%26",$artist_desc).'</Artist_long_description>';
			$xmldata	  .='<Artist_short_description>'.str_replace("&", "%26",$artist_brief).'</Artist_short_description>';
			$xmldata	  .='<Artist_genre>'.str_replace("&", "%26",$artist_genre).'</Artist_genre>';
			if(count($trackarray)>0){
				$xmldata	  .='<Tracks>';
				for($t=0;$t<count($trackarray);$t++){
					$xmldata	  .='<Track>';
					$xmldata	  .='<Track_id>'.$trackarray[$t][0].'</Track_id>';
					$xmldata	  .='<Track_name>'.$trackarray[$t][1].'</Track_name>';
					$xmldata	  .='<Track_path>'.$trackarray[$t][2].'</Track_path>';
					$xmldata	  .='</Track>';
				}	
				$xmldata	  .='</Tracks>';
			}else{
				$xmldata	  .='<Tracks/>';
			}
		$xmldata	  .='</Details>';	
	$xmldata	  .='</Artist>';
}
$xmldata = formatXmlString($xmldata); 			
$status	 = db_disconnect($connection);
$db->mysqlclose();
echo $xmldata; 
?>
