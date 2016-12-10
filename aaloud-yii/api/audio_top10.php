<?php
session_start();
include_once('../common.php');
include_once("../include/db.ora.php"); 
include_once("../include/db_include.php");
$connection=db_connect();
include_once('../include/function.php');
fetchstorefrontinfo($_SESSION["STORE_ID"]);

$xml_string = '<Tracks content_type="1">';

/*  ----------Get 1 record from artist_audio_featured --------------------------------- */

$url	=  $GLOBALS['STORE_WEBSITE_URL']."/api/artist_audio_featured.php";
$fields = "";
$method = "POST";//"";GET
$content = sendDataOverPost($url, $fields, $method);

if($content)
{
	$getNumContent = 1;
	$xml = simplexml_load_string($content) or die ("Unable to load XML file!");
	
	foreach ($xml->Track as $record)
	{
		if($getNumContent == 1)
		{
			$xml_string .= "<Track>";
			$xml_string .= "<Track_id>".$record->Track_id."</Track_id>";
			$trackname = str_replace("&","%26",$record->Track_name);
			$xml_string .= "<Track_name>".$trackname."</Track_name>";
			$xml_string .= "<Track_path>".$record->Track_path."</Track_path>";
			$xml_string .= "<Track_artistid>".$record->Track_artistid."</Track_artistid>";
			$artistname = str_replace("&","%26",$record->Track_artistname);
			$xml_string .= "<Track_artistname>".$artistname."</Track_artistname>";
			$xml_string .= "</Track>";
		}
		$getNumContent++;
	}//end foreach
}//end if

/*  ----------Get 9 record from artist_audio_featured --------------------------------- */

$url	=  $GLOBALS['STORE_WEBSITE_URL']."/api/artist_listen_api.php";
$fields = "";
$method = "POST";//"";GET
$content = sendDataOverPost($url, $fields, $method);

if($content)
{
	$getNumContent = 1;
	$xml = simplexml_load_string($content) or die ("Unable to load XML file!");
	unset($arrxml);
	foreach ($xml->Track as $record)
	{
		if($getNumContent < 10)
		{
			$xml_string .= "<Track>";
			$xml_string .= "<Track_id>".$record->Track_id."</Track_id>";
			$trackname = str_replace("&","%26",$record->Track_name);
			$xml_string .= "<Track_name>".$trackname."</Track_name>";
			$xml_string .= "<Track_path>".$record->Track_path."</Track_path>";
			$xml_string .= "<Track_artistid>".$record->Track_artistid."</Track_artistid>";
			$artistname = str_replace("&","%26",$record->Track_artistname);
			$xml_string .= "<Track_artistname>".$artistname."</Track_artistname>";
			$xml_string .= "</Track>";
		}
		$getNumContent++;
	}//end foreach
}//end if
$xml_string .= "</Tracks>";

$xml_string = formatXmlString($xml_string);
echo $xml_string;
?>