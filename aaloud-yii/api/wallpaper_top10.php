<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');
include_once('../common.php');
include_once("../include/db.ora.php"); 
include_once("../include/db_include.php");
$connection=db_connect();
include_once('../include/function.php');
fetchstorefrontinfo($_SESSION["STORE_ID"]);

$xml_string = "<Wallpapers>";

/*  ----------Get 1 record from artist_audio_featured --------------------------------- */

$url	=  $GLOBALS['STORE_WEBSITE_URL']."/api/artist_wallpaper_featured.php";
$fields = "";
$method = "POST";//"";GET
$content = sendDataOverPost($url, $fields, $method);

if($content)
{
	$getNumContent = 1;
	$xml = simplexml_load_string($content) or die ("Unable to load XML(artist_wallpaper_featured) file!");
	
	foreach ($xml->Wallpaper as $record)
	{
		if($getNumContent == 1)
		{
			$xml_string .= "<Wallpaper>";
			$xml_string .= "<Wallpaper_id>".$record->Wallpaper_id."</Wallpaper_id>";
			$name = str_replace("&","%26",$record->Wallpaper_name);
			$xml_string .= "<Wallpaper_name>".$name."</Wallpaper_name>";
			$xml_string .= "<Wallpaper_path>".$record->Wallpaper_path."</Wallpaper_path>";
			$xml_string .= "<Wallpaper_artistid>".$record->Wallpaper_artistid."</Wallpaper_artistid>";
			$artistname = str_replace("&","%26",$record->Wallpaper_artistname);
			$xml_string .= "<Wallpaper_artistname>".$artistname."</Wallpaper_artistname>";
			$xml_string .= "<Wallpaper_artistimg>".$record->Wallpaper_artistimg."</Wallpaper_artistimg>";
			$xml_string .= "</Wallpaper>";
		}
		$getNumContent++;
	}//end foreach
}//end if

/*  ----------Get 9 record from artist_audio_featured --------------------------------- */

$url	=  $GLOBALS['STORE_WEBSITE_URL']."/api/artist_wallpaper_api.php";
$fields = "";
$method = "POST";//"";GET
$content = sendDataOverPost($url, $fields, $method);

if($content)
{
	$getNumContent = 1;
	$xml = simplexml_load_string($content) or die ("Unable to load XML(artist_wallpaper_api) file!");
	unset($arrxml);
	foreach ($xml->Wallpaper as $record)
	{
		if($getNumContent < 10)
		{
			$xml_string .= "<Wallpaper>";
			$xml_string .= "<Wallpaper_id>".$record->Wallpaper_id."</Wallpaper_id>";
			$name = str_replace("&","%26",$record->Wallpaper_name);
			$xml_string .= "<Wallpaper_name>".$name."</Wallpaper_name>";
			$xml_string .= "<Wallpaper_path>".$record->Wallpaper_path."</Wallpaper_path>";
			$xml_string .= "<Wallpaper_artistid>".$record->Wallpaper_artistid."</Wallpaper_artistid>";
			$artistname = str_replace("&","%26",$record->Wallpaper_artistname);
			$xml_string .= "<Wallpaper_artistname>".$artistname."</Wallpaper_artistname>";
			$xml_string .= "<Wallpaper_artistimg>".$record->Wallpaper_artistimg."</Wallpaper_artistimg>";
			$xml_string .= "</Wallpaper>";
		}
		$getNumContent++;
	}//end foreach
}//end if
$xml_string .= "</Wallpapers>";

$xml_string = formatXmlString($xml_string);
echo $xml_string;
?>