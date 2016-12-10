<?php
session_start();
include('common.php');
include('include/function.php');

//get the Nomination  list on genere and nomination_for combinations
if(trim($_REQUEST['genere'])!='' && trim($_REQUEST['nomination_for'])!='')
{
	// Delete the record from tbl_artist_nomination by the nomination id
	if(isset($_REQUEST['nominationId']) && $_REQUEST['nominationId']!=''){
		$sqlc_del = "delete from tbl_artist_nomination Where NOMINATION_ID=".$_REQUEST['nominationId'];
         $rsc_del	= mysql_query($sqlc_del) or die(mysql_error());
	}
	
	// Array for the nomination category.
	$nominationsArr = array("BS"=>"Best Song","BF"=>"Best Female","BM"=>"Best Male","BG"=>"Best Group","BGNR"=>"Best Genere");
	
	$Html = '<table width="100%" cellpadding="2" cellspacing="1">';
	$sqlc = "select * from tbl_artist_nomination Where GENERE='".$_REQUEST['genere']."' and NOMINATION_FOR='".$_REQUEST['nomination_for']."' order by NOMINATION_ID desc";
                       $rsc	= mysql_query($sqlc) or die(mysql_error());
	                   $nr	= mysql_num_rows($rsc);
                       if($nr){
						   $Html .= '<tr><th>Genere</th>
									  <th>Nomination for</th>
									  <th>Content Id</th>
									  <th>Action</th></tr>';
                            while($rs	= mysql_fetch_array($rsc)){
								$Html .= '<tr><td align="center">'.$rs['GENERE'].'</td><td align="center">'.$nominationsArr[$rs['NOMINATION_FOR']].'</td><td align="center">'.$rs['CONTENT_ID'].'</td><td align="center"><a href="Javascript:deleteData('.$rs['NOMINATION_ID'].');">Delete</a></td>';
								$Html .= '</tr>';
							}
						}else{
							$Html .= '<tr><td>Sorry! no record found.</td></tr>';
						}	
	
	$Html .= '</table>';
	echo $Html;exit;
}
?>