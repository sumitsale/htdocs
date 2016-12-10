<?php

 function get_data($url) 
	{
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return $result;
	}

$url="http://www.artistaloud.com/generatexml/generatevideoxml";
$result=get_data($url);
echo $result."<br><br>";
$url2="http://www.artistaloud.com/generatexml/generatesongxml";
$result=get_data($url2);
echo $result."<br><br>";
$url3="http://www.artistaloud.com/generatexml/generateartistxml";
$result=get_data($url3);
echo $result."<br><br>";



$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Artistlist";
$result=get_data($url3);
echo $result."<br><br>";

$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Artistwithcharcter";
$result=get_data($url3);
echo $result."<br><br>";

$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Videowithcharcter";
$result=get_data($url3);
echo $result."<br><br>";


$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Videolist";
$result=get_data($url3);
echo $result."<br><br>";

$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Event";
$result=get_data($url3);
echo $result."<br><br>";


$url3="http://aanew.hungamatech.com/aaloud/Generatexml/Blog";
$result=get_data($url3);
echo $result."<br><br>";






?>