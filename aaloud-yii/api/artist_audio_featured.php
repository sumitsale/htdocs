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
 
 $content_type 	 = mysql_escape_string(trim($_GET["content_type"]));
 if(!$content_type || $content_type=="audio"){
 	 $content_type=1;
 }else{
 	 $content_type=999;
 }
 
 $aa_featured_artist_list = featured_artist_list($content_type);
 $aa_artist_list = artist_list();
 if(!$aa_featured_artist_list){
	$aa_featured_artist_list = $aa_artist_list;
 }
 $artist_start = 0;
 $artist_end   = 8;
 $artist_track_count   = 0;
 
 $featuredarray=array();
 $stmt = oci_parse($connection, 'begin artistaloud.prc_audio_feat_onetrack(:p_artist_id, :p_start, :p_end, :p_track_count, :p_cur_featured); end;');
 $cur_track_featured = oci_new_cursor($connection);
 
 oci_bind_by_name($stmt, ':p_artist_id', $aa_featured_artist_list);
 oci_bind_by_name($stmt, ':p_start', $artist_start,9,SQLT_INT);
 oci_bind_by_name($stmt, ':p_end', $artist_end,9,SQLT_INT);
 oci_bind_by_name($stmt, ':p_track_count', $artist_track_count,9,SQLT_INT);

 if (!oci_bind_by_name($stmt, ':p_cur_featured', $cur_track_featured, -1, OCI_B_CURSOR)){
 	$err=oci_error($stmt);
 	die ($err['message']);
 }
 oci_execute($stmt);
 oci_execute($cur_track_featured);

 while ($ftrddata = oci_fetch_row($cur_track_featured)){
	$featuredarray[] = $ftrddata;
 }
 
 $xmldata	  .='<Tracks content_type="'.$content_type.'">';
	for($t=0;$t<count($featuredarray);$t++){
		if(!in_array($featuredarray[$t][0],$TrackBannedArray))
		{
			$xmldata	  .='<Track>';
			$xmldata	  .='<Track_id>'.$featuredarray[$t][0].'</Track_id>';
			$xmldata	  .='<Track_name>'.$featuredarray[$t][1].'</Track_name>';
			$xmldata	  .='<Track_path>'.$featuredarray[$t][5].'</Track_path>';
			$xmldata	  .='<Track_artistid>'.$featuredarray[$t][2].'</Track_artistid>';
			$xmldata	  .='<Track_artistname>'.$featuredarray[$t][3].'</Track_artistname>';
			$xmldata	  .='</Track>';
		}
	}	
 $xmldata	  .='</Tracks>';

 $xmldata	   =formatXmlString($xmldata);
 $status=db_disconnect($connection);
 $db->mysqlclose();
 echo $xmldata; 
?>
