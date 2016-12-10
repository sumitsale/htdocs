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

//Get the reviews from the database
$artist_id = mysql_escape_string(trim($_REQUEST['artist_id']));
/*
$pge_no = (double) $_REQUEST['pge_no'];
if($pge_no  <=0) $pge_no = 1;

$pge_no = floor($pge_no);

if(empty($pge_no)){
   $pge_no = 1;
}//if(empty($pge_no))

$content_display_count = 10; // Number of contents to display
$paging_display_count = 10; // Paging numbers to display

$start = (($pge_no-1)*$content_display_count);
$end = $content_display_count;

$sqlc = 'SELECT REVIEW_ID,CONTENT_ID,CONTENT_TYPE_ID,STORE_FRONT_ID,USER_ID,FULL_NAME,EMAIL,USER_TYPE,REVIEW_TITLE,SUBSTRING(REVIEW_TEXT,1,300) REVIEW_TEXT,REVIEW_ADDEDON FROM TBL_USER_REVIEWS WHERE STATUS != 3 AND ABUSE = 0 AND CONTENT_ID = '.$content_id.' AND STORE_FRONT_ID = '.$STORE_FRONT_ID.' ORDER BY REVIEW_ID DESC LIMIT '.$start.','.$end .' ';
*/
$sqlc = 'SELECT COMMENT_ID,USER_ID,ARTIST_ID, SUBSTRING(COMMENT_TEXT,1,300) COMMENT_TEXT,COMMENT_ADDEDON FROM tbl_aa_apps_comments WHERE ARTIST_ID = '.$artist_id.' ORDER BY COMMENT_ID DESC';
$rsc = mysql_query($sqlc) or die(mysql_error());
$nr = mysql_num_rows($rsc);
//$rs = new MySQLPagedResultSet($sqlc,$RecordsPerPage,$conn);

$sXMLSTR = "<Comments>";
if($nr != 0)
{
	while(list($CommentID,$UsertID,$ArtistID,$CommentText,$CommentAddedOn)= mysql_fetch_array($rsc))
			{
				$ReviewDateArray = explode('-',$CommentAddedOn);
				$ReviewDate = date("d M Y", mktime(0, 0, 0, $ReviewDateArray[1], $ReviewDateArray[2], $ReviewDateArray[0]));
				//$CommentText = wordwrap(stripslashes($CommentText), 15, "\n", 1);
				if(strlen($CommentText)==300){
					$CommentText = $CommentText."...";

				}
				if($UsertID!=0)
				{
					$sqlu = 'SELECT NICK_NAME FROM tbl_user_profile WHERE USER_ID = '.$UsertID.'';
					$rsu = mysql_query($sqlu) or die(mysql_error());
					$nru = mysql_num_rows($rsu);
					if($nru){
						while(list($NICK_NAME)= mysql_fetch_array($rsu))
						{
							$User = $NICK_NAME;
						}
					}
				}else
				{
					$User = 'Anonymous';
				}
				$ReviewsData[] = array('ReviewID'=>$ReviewID,'ContentID'=>$ContentID,'ContentTypeID'=>$ContentTypeID,'StoreFrontID'=>$StoreFrontID,'UserID'=>$UserID,'FullName'=>$FullName,'Email'=>$Email,'UserType'=>$UserType,'ReviewTitle'=>$ReviewTitle,'ReviewText'=>$ReviewText,'ReviewAddedOn'=>$ReviewDate);
				$sXMLSTR .= "<Comment>";
				$sXMLSTR .= "<CommentID>".$CommentID."</CommentID>";
				$sXMLSTR .= "<User>".$User."</User>";
				$sXMLSTR .= "<ArtistID>".$ArtistID."</ArtistID>";
				$sXMLSTR .= "<CommentText><![CDATA[".$CommentText."]]></CommentText>";
				$sXMLSTR .= "<CommentAddedOn>".$ReviewDate."</CommentAddedOn>";
				$sXMLSTR .= "</Comment>";
			}
}
$sXMLSTR .= "</Comments>";
echo $sXMLSTR;
$db->mysqlclose();
?>
