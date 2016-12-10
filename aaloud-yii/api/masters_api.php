<?php
/*
 * Created on Nov 20, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * Built By Mathew Thomas 
 * Details : Script is Developed as a API for Master of Genre/Language
 **/
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$genrefilter  = strtolower(mysql_escape_string(trim($_GET["genrefilter"])));
$aa_artist_list = artist_list();
//Genre/Language Master
$genrearray = array();
$languagearray = array();
$stmt = oci_parse($connection, 'begin artistaloud.prc_get_masters(:p_artist_id, :p_cur_genre, :p_cur_language); end;');
$cur_artist_genre	 = oci_new_cursor($connection);
$cur_artist_language = oci_new_cursor($connection);

oci_bind_by_name($stmt, ':p_artist_id', $aa_artist_list);
if (!oci_bind_by_name($stmt, ':p_cur_genre', $cur_artist_genre, -1, OCI_B_CURSOR)){
   $err=oci_error($stmt);
   die ($err['message']);
}
if (!oci_bind_by_name($stmt, ':p_cur_language', $cur_artist_language, -1, OCI_B_CURSOR)){
   $err=oci_error($stmt);
   die ($err['message']);
}
oci_execute($stmt);
oci_execute($cur_artist_genre);
while ($genredata = oci_fetch_row($cur_artist_genre)){
	$genrearray[] = $genredata;
}

oci_execute($cur_artist_language);
while ($langdata = oci_fetch_row($cur_artist_language)){
	$languagearray[] = $langdata;
}
$xmldata	  ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$xmldata	  .='<Masters>';
$xmldata	  .='<Genres>';
if(!$genrefilter){
	for($g=0;$g<count($genrearray);$g++){
		$xmldata	  .='<Genre>'.$genrearray[$g][1].'</Genre>';		
	}
}else{
	for($g=0;$g<count($genrearray);$g++){
		if($genrefilter==substr(strtolower($genrearray[$g][1]),0,1)){
			$xmldata	  .='<Genre>'.$genrearray[$g][1].'</Genre>';		
		}	
	}
}	
$xmldata	  .='</Genres>';
$xmldata	  .='<Languages>';
for($g=0;$g<count($languagearray);$g++){
	$xmldata	  .='<Language>'.$languagearray[$g][1].'</Language>';
}
$xmldata	  .='</Languages>';
$xmldata	  .='</Masters>';
$xmldata	   =formatXmlString($xmldata); 			
$status=db_disconnect($connection);
$db->mysqlclose();
echo $xmldata;
?>
