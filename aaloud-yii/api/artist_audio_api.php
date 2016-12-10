<?php
/*
 * Created on Nov 25, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$aa_artist_list = artist_list();
$searchby  	  =  mysql_escape_string(trim($_GET["SEARCHBY"]));
$audiocount	  =  mysql_escape_string(trim($_GET["audiocount"]));
$endcount	  = mysql_escape_string(trim($_GET["endcount"]));
$startcount	  = mysql_escape_string(trim($_GET["startcount"]));
$artist_type  = "";
$artist_lang  = "";
$artist_genre = "";


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

$xmldata	  ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

//call to procedure
$trackarray = array();
$stmt = oci_parse($connection, 'begin artistaloud.prc_audio_tracks_for_artist(:p_artist_id, :p_artist_type, :p_language, :p_genre, :p_cursor); end;');
$cur_track_details = oci_new_cursor($connection);

oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
oci_bind_by_name($stmt, ':p_artist_type', $artist_type);
oci_bind_by_name($stmt, ':p_language', $artist_lang);
oci_bind_by_name($stmt, ':p_genre', $artist_genre);
if (!oci_bind_by_name($stmt, ':p_cursor', $cur_track_details, -1, OCI_B_CURSOR)){
  $err=oci_error($stmt);
  die ($err['message']);
}
oci_execute($stmt);
oci_execute($cur_track_details);
while ($trackdata = oci_fetch_row($cur_track_details)){
	$trackarray[] = $trackdata;
}
if(!$audiocount){
	$audiocount=count($trackarray);
}

if(!$startcount)
{
	$startcount = 0;
}
if(!$endcount)
{
	$endcount = count($trackarray);
}

$xmldata	  .='<Tracks count="'.$audiocount.'">';
	for($t=$startcount;$t<$endcount;$t++){
		if(!in_array($trackarray[$t][0],$TrackBannedArray))
		{
			$xmldata	  .='<Track>';
			$xmldata	  .='<Track_id>'.$trackarray[$t][0].'</Track_id>';
			$xmldata	  .='<Track_name>'.$trackarray[$t][1].'</Track_name>';
			$xmldata	  .='<Track_path>'.$trackarray[$t][2].'</Track_path>';
			$xmldata	  .='<Track_albumimg>'.$trackarray[$t][3].'</Track_albumimg>';
			$xmldata	  .='<Track_artistid>'.$trackarray[$t][4].'</Track_artistid>';
			$xmldata	  .='<Track_artistname>'.$trackarray[$t][5].'</Track_artistname>';
			$xmldata	  .='<Track_artistimg>'.$trackarray[$t][6].'</Track_artistimg>';
			$xmldata	  .='</Track>';
		}
	}	
$xmldata	  .='</Tracks>';
$xmldata	   =formatXmlString($xmldata);
$status=db_disconnect($connection);
$db->mysqlclose();
echo $xmldata; 
?>