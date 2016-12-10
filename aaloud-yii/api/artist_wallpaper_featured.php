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
 
 $aa_featured_artist_list = featured_artist_list(3);
 $aa_artist_list = artist_list();
 if(!$aa_featured_artist_list){
	$aa_featured_artist_list = $aa_artist_list;
 }
 $artist_start = 0;
 $artist_end   = 8;
 $wall_count   = 0;
 $featuredarray=array();
 $stmt = oci_parse($connection, 'begin artistaloud.prc_wallpaper_feat_onetrack(:p_artist_id, :p_start, :p_end, :p_track_count_feat, :p_cur_featured); end;');
 $cur_wall_featured = oci_new_cursor($connection);
 
 oci_bind_by_name($stmt, ':p_artist_id', $aa_featured_artist_list);
 oci_bind_by_name($stmt, ':p_start', $artist_start,9,SQLT_INT);
 oci_bind_by_name($stmt, ':p_end', $artist_end,9,SQLT_INT);
 oci_bind_by_name($stmt, ':p_track_count_feat', $wall_count,9,SQLT_INT);
 if (!oci_bind_by_name($stmt, ':p_cur_featured', $cur_wall_featured, -1, OCI_B_CURSOR)){
 	$err=oci_error($stmt);
 	die ($err['message']);
 }

 oci_execute($stmt);
 oci_execute($cur_wall_featured);
 
 while ($ftrddata = oci_fetch_row($cur_wall_featured)){
	$featuredarray[] = $ftrddata;
 }
 
 $xmldata	  .='<Wallpapers>';
	for($t=0;$t<count($featuredarray);$t++){
		$xmldata	  .='<Wallpaper>';
		$xmldata	  .='<Wallpaper_id>'.$featuredarray[$t][0].'</Wallpaper_id>';
		$xmldata	  .='<Wallpaper_name>'.$featuredarray[$t][1].'</Wallpaper_name>';
		$xmldata	  .='<Wallpaper_path>'.$featuredarray[$t][2].'</Wallpaper_path>';
		$xmldata	  .='<Wallpaper_artistid>'.$featuredarray[$t][4].'</Wallpaper_artistid>';
		$xmldata	  .='<Wallpaper_artistname>'.$featuredarray[$t][5].'</Wallpaper_artistname>';
		$xmldata	  .='<Wallpaper_artistimg>'.$featuredarray[$t][6].'</Wallpaper_artistimg>';
		$xmldata	  .='</Wallpaper>';
	}	
 $xmldata	  .='</Wallpapers>';
 while ($ftrddata = oci_fetch_row($cur_wall_featured)){
	$featuredarray[] = $ftrddata;
 }
 $xmldata	   =formatXmlString($xmldata);
 $status=db_disconnect($connection);
 $db->mysqlclose();
 echo $xmldata; 
?>
