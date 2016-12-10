<?php
error_reporting(E_ALL^E_NOTICE);
ini_set('display_errors', '1');

$arrTopTen = array();
$arrxml = array();

ob_start();
include("artist_audio_featured.php");
$file_content = ob_get_contents();



$content = simplexml_load_string($xmldata) or die ("Unable to load XML DATA!");
echo $content;
ob_end_clean();
die();

//echo "<pre>";
//var_dump($xml);
if($content)
{
	$getNumContent = 1;
	$xml = simplexml_load_string($content) or die ("Unable to load XML file!");
	
	foreach ($xml->Track as $record)
	{
		if($getNumContent == 1)
		{
			unset($arrxml);
			$arrxml["Track_id"] = $record->Track_id;
			$arrxml["Track_name"] = $record->Track_name;
			$arrxml["Track_path"] = $record->Track_path;
			$arrxml["Track_artistid"] = $record->Track_artistid;
			$arrxml["Track_artistname"] = $record->Track_artistname;
			$arrTopTen[] = $arrxml;
		}
		
	}//end foreach

echo "<pre>";
print_r($arrTopTen);




}//end if












?>