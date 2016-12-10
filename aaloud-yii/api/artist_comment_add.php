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
include('../common.php');
include("../include/db.ora.php");
include("../include/db_include.php");
$connection=db_connect();
include('../include/function.php');

$artist_id		=	mysql_escape_string($_GET['artist_id']);
$CommentText	=	mysql_escape_string($_GET['comment_txt']);
$mobileno		=	mysql_escape_string($_GET['mobileno']);
$UserID			=	mysql_escape_string($_GET['userid']);

/*if($GLOBALS['HTTP_RAW_POST_DATA']){
	header("Content-Type: text/xml");
	$xmlobj = simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA']); 
	if($xmlobj){
		foreach ($xmlobj->Review as $content) {
			$artist_id		=	trim($content->artist_id);
			$CommentText	=	trim($content->CommentText);
			$mobileno		=	trim($content->mobileno);
		}
	}
}

$secureurl		= $GLOBALS['SECURE_URL']."/api/api_getUserId.php";
$fields	=	"email=".$mobileno."&store_id=".$store_id;
$method	=	'POST';
$response = sendDataOverPost($secureurl, $fields, $method);
*/
if($UserID != '')
{
	$UserID = $UserID;
}
else
{
	$UserID = 0;
}
$AddedOn = date("Y-m-d");

//Insert record in database
if($artist_id)
{
	$qry = 'INSERT INTO tbl_aa_apps_comments (USER_ID,ARTIST_ID,COMMENT_TEXT,COMMENT_ADDEDON) VALUES 
	('.$UserID.','.$artist_id.',\''.strip_tags($CommentText).'\',\''.$AddedOn.'\')';

	$rs=mysql_query($qry);
	if($rs)
	{
		$msg = "Yes";
	}
	else
	{
		$msg ="No";
	}
}else
{
	$msg ="No";
}
echo $msg;
//$status=db_disconnect($connection);
$db->mysqlclose();
?>
