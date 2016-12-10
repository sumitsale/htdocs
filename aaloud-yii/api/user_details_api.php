<?php
include('../common.php');
//include("../include/db.ora.php");
//include("../include/db_include.php");
//$connection=db_connect();
include('../include/function.php');

$type = $nickName = "";
$user_id 	 = mysql_escape_string(trim($_GET["user_id"]));

$qryGetArtistDetails = "SELECT ua.USER_TYPE,up.NICK_NAME FROM tbl_user_profile up,tbl_user_artist ua where ua.USER_ID=up.USER_ID
						AND ua.USER_ID='".$user_id."'";
$resGetArtistDetails = mysql_query($qryGetArtistDetails);
list($type,$nickName) = mysql_fetch_row($resGetArtistDetails);
if($type && $nickName)
{
	echo $type ."::". $nickName;
}

?>