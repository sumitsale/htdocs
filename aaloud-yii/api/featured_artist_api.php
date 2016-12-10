<?php
/*
 * Created on Nov 24, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include('../common.php');
 include("../include/db.ora.php");
 include("../include/db_include.php");
 $connection=db_connect();
 include('../include/function.php');
 $xmldata	  = '';	
 $xmldata	  = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
 $xmldata	  .='<Artists>';
 $news_query  = "select b.* from tbl_aa_misc a,tbl_aa_artist b Where b.Artist_Id=a.FEATURED_ARTIST";
 $news_sql    = mysql_query($news_query) or die(mysql_error());
 $news_nr	  = mysql_num_rows($news_sql);
 if($news_nr){
 	$news_result = mysql_fetch_array($news_sql) or die(mysql_error());
 	$result=@query('select artist_description from tbl_artist_details where artist_id = '.$news_result[Artist_Id],$connection);
 	@list($artist_description)=@fetch_row($result);
 	$artist_img_50x50 = artist_image($news_result[Artist_Id],1,2);
 	$xmldata	  .='<Artist>';
	$xmldata	  .='<Artist_id>'.$news_result[Artist_Id].'</Artist_id>';
	$xmldata	  .='<Artist_name>'.stripslashes($news_result[Artist_Name]).'</Artist_name>';
	$xmldata	  .='<Artist_image_50x50>'.str_replace("&", "%26",$artist_img_50x50).'</Artist_image_50x50>';
	$xmldata	  .='<Artist_description>'.str_replace("&", "%26",$artist_description).'</Artist_description>';	
	$xmldata	  .='</Artist>';
 		
 }
 $xmldata	  .='</Artists>';	
 $xmldata	   =formatXmlString($xmldata); 			
 $status=db_disconnect($connection);
 $db->mysqlclose();
 echo $xmldata;
?>
