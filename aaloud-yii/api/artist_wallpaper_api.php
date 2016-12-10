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
$searchby  	  = mysql_escape_string(trim($_GET["SEARCHBY"]));
$artist_id	  = mysql_escape_string(trim($_GET["artist_id"]));
//$wallcount	  = mysql_escape_string(trim($_GET["wallcount"]));	

$endcount	  = mysql_escape_string(trim($_GET["endcount"]));
$startcount	  = mysql_escape_string(trim($_GET["startcount"]));

$artist_type  = "";
$artist_lang  = "";
$artist_genre = "";
if($artist_id){
	$aa_artist_list=$artist_id;
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
$wallarray = array();
$stmt = oci_parse($connection, 'begin artistaloud.prc_wallpaper_for_artist(:p_artist_id, :p_artist_type, :p_language, :p_genre, :p_cursor); end;');
$cur_wall_details = oci_new_cursor($connection);

oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
oci_bind_by_name($stmt, ':p_artist_type', $artist_type);
oci_bind_by_name($stmt, ':p_language', $artist_lang);
oci_bind_by_name($stmt, ':p_genre', $artist_genre);
if (!oci_bind_by_name($stmt, ':p_cursor', $cur_wall_details, -1, OCI_B_CURSOR)){
  $err=oci_error($stmt);
  die ($err['message']);
}
oci_execute($stmt);
oci_execute($cur_wall_details);
while ($walldata = oci_fetch_row($cur_wall_details)){
	$wallarray[]=$walldata;
}
if(!$wallcount){
	$wallcount = count($wallarray);
}

if(!$startcount)
{
	$startcount = 0;
}
if(!$endcount)
{
	$endcount = count($wallarray);
}

$xmldata	  .='<Wallpapers count="'.$wallcount.'">';
	for($t=$startcount;$t<$endcount;$t++){
		$xmldata	  .='<Wallpaper>';
		$xmldata	  .='<Wallpaper_id>'.$wallarray[$t][0].'</Wallpaper_id>';
		$xmldata	  .='<Wallpaper_name>'.$wallarray[$t][1].'</Wallpaper_name>';
		$xmldata	  .='<Wallpaper_path>'.$wallarray[$t][2].'</Wallpaper_path>';
		$xmldata	  .='<Wallpaper_artistid>'.$wallarray[$t][4].'</Wallpaper_artistid>';
		$xmldata	  .='<Wallpaper_artistname>'.$wallarray[$t][5].'</Wallpaper_artistname>';
		$xmldata	  .='<Wallpaper_artistimg>'.$wallarray[$t][6].'</Wallpaper_artistimg>';
		$xmldata	  .='</Wallpaper>';
	}	
$xmldata	  .='</Wallpapers>';
$xmldata	   =formatXmlString($xmldata);
$status=db_disconnect($connection);
$db->mysqlclose();
echo $xmldata; 
?>