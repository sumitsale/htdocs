<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-nomination-vote',
	'enableAjaxValidation'=>false,
)); ?>
<table>
	<tr>
		<td>Genre</td>
		<td><?php echo $form->dropDownList($model,'GENERE',array('Pop'=>'Pop','Rock'=>'Rock','Alternative'=>'Alternative','Global '=>'Global','Final'=>'Final'),array('prompt' => 'Select One')); ?>
		
		</td>
	</tr>

	<tr>
		<td>
		 <?php echo CHtml::button('Submit', array('submit' => array('Artist_nomination_vote/search'))); ?>  
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
		</td>
		<td>
		<?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>



</table>
<?php $this->endWidget(); ?>



<?php 
		$genereArr[0]='BS';
		$genereArr[1]='BF';
		$genereArr[2]='BM';
		$genereArr[3]='BG';




				for($i=0;$i<count($genereArr);$i++)
				{
						
							$result=Yii::app()->db->createCommand()
								->select('CONTENT_ID,count(CONTENT_ID) AS total')
								->from('tbl_artist_nomination_vote')
								->where('GENERE=:genrename and NOMINATION_FOR=:nominationfor',array(':genrename'=>$genrename,':nominationfor'=>$genereArr[$i]))
								->group('CONTENT_ID')
								->order('total DESC')
								//->limit('5')
								->queryAll();
						
							
								
								if($genereArr[$i]=='BS')
								{
								echo "<h1>Best songs</h1>";
								}
									if($genereArr[$i]=='BF')
								{
								echo "<h1>Best Female</h1>";
								}
						
								if($genereArr[$i]=='BM')
									{
									echo "<h1>Best Male</h1>";
									}
							
								if($genereArr[$i]=='BG')
									{
									echo "<h1>Best Group</h1>";
									}
							
									
									?> 
									<table width="100%">
										<tr>
											<td><h3>content id</h3></td>
											<td><h3>artist id</h3></td>
											<td><h3>artist name</h3></td>
											<td><h3>song name</h3></td>
											<td><h3>votes</h3></td>
											<td><h3>View Detail</h3></td>
										</tr>
									<?php
											for($j=0;$j<count($result);$j++)
											{ ?>
											<tr>
											<td><?php echo $result[$j]['CONTENT_ID']; ?></td>
											<td>
											
											<?php
											$artistid=Yii::app()->db2->createCommand()
														->select('arm.ARTIST_ID')
														->from('TBL_CNT_ART_ROLE_MAP carm')
														->join('TBL_ARTIST_ROLE_MAP arm','carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID')
														->where('arm.ARTIST_ROLE_ID=31 and CONTENT_ID=:contentid',array(':contentid'=>$result[$j]['CONTENT_ID']))
														->queryAll();
														
														if(isset($artistid[0]['ARTIST_ID']))
														{
														$artistname=Yii::app()->db2->createCommand()
																->select('*')
																->from('TBL_ARTISTS')
																->where('ARTIST_ID=:artistid',array(':artistid'=>$artistid[0]['ARTIST_ID']))
																->queryAll();
															}	
														$songname=Yii::app()->db2->createCommand()
																		->select('*')
																		->from('TBL_CONTENT_DETAILS')
																		->where('CONTENT_ID=:CONTENT_ID',array(':CONTENT_ID'=>$result[$j]['CONTENT_ID']))
																		->queryAll();
																
											?>
											
											<?php 
											
											if(isset($artistid[0]['ARTIST_ID']))
											{
											echo $artistid[0]['ARTIST_ID']; 
											} ?>
											
											</td>
											<td><?php 
											if(isset($artistname[0]['ARTIST_NAME'])) {
											echo $artistname[0]['ARTIST_NAME']; 
											}
											
											?></td>
											<td><?php if(isset($songname[0]['CONTENT_TITLE'])) { echo  $songname[0]['CONTENT_TITLE'];} ?></td>
											<td>
											<?php 
											$vote=Yii::app()->db->createCommand()
														->select('count(CONTENT_ID) as totalvote')
														->from('tbl_artist_nomination_vote')
														->where('GENERE=:GENERE and NOMINATION_FOR=:NOMINATION_FOR and CONTENT_ID=:CONTENT_ID',array(':GENERE'=>$genrename,':NOMINATION_FOR'=>$genereArr[$i],':CONTENT_ID'=>$result[$j]['CONTENT_ID']))
														->queryAll();
											
											if(isset($vote[0]['totalvote']))
											{
											echo $vote[0]['totalvote'];
											}
											?>
											
											</td>
											
											
											
											<td>
											<?php 
											/* Code for fancybox starts here*/

											echo CHtml::link("View details","#data_".$j."".$genereArr[$i], array('id'=>'inline')); ?>
											<div style="display:none"><div id="data_<?php echo $j."".$genereArr[$i]; ?>">
											<?php $form=$this->beginWidget('CActiveForm', array(
												'id'=>'invoice-form-invoicestatus-form',
												'enableAjaxValidation'=>false,
												
											)); 
											?>	
											
											<?php
											$artistuser='';
											$facebookuser='';
											
											
											$artistuser=Yii::app()->db->createCommand()
														->selectdistinct('IP_ADDRESS')
														->from('tbl_artist_nomination_vote')
														->where('CONTENT_ID=:contentid and LOGIN_FROM ="A" and GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':contentid'=>$result[$j]['CONTENT_ID'],':genre'=>$genrename,':nominationfor'=>$genereArr[$i]))
														->queryAll();
														
													
											$facebookuser=Yii::app()->db->createCommand()
														->selectdistinct('IP_ADDRESS')
														->from('tbl_artist_nomination_vote')
														->where('CONTENT_ID=:contentid and LOGIN_FROM ="F" and GENERE=:genre and NOMINATION_FOR=:nominationfor',array(':contentid'=>$result[$j]['CONTENT_ID'],':genre'=>$genrename,':nominationfor'=>$genereArr[$i]))
														->queryAll();	

															/*	
																echo "<pre>";
																print_r($artistuser);
																
																echo "</br></br>";
																print_r($facebookuser);
																
																*/
											?>
											
											<?php if(count($artistuser)>0) { ?>
											<table width="100%" border="1">
												<tr>
													<td colspan="2"><h1> Artistaloud User </h1></td>
												</tr>
												
												<tr>
													<td>user name</td>
													<td>Email id</td>
												</tr>
												<?php for($x=0;$x<count($artistuser);$x++){
												
												$auserdetail=Yii::app()->db->createCommand()
															->select('*')
															->from('a_users')
															->where('A_USER_ID=:userid',array(':userid'=>$artistuser[$x]['IP_ADDRESS']))
															->queryAll();	
															
														//	echo "<pre>";
															//print_r($auserdetail);
												?>
												<tr>
													<td><?php if(isset($auserdetail[0]['A_FIRST_NAME'])) { echo $auserdetail[0]['A_FIRST_NAME']; } ?></td>
													<td><?php if(isset($auserdetail[0]['A_EMAIL_ID'])) { echo $auserdetail[0]['A_EMAIL_ID']; } ?></td>
												</tr>
												
												
												<?php } ?>
												
											</table>
												<?php } ?>
											
												</br></br>
												<?php if(count($facebookuser)) { ?>
											<table width="100%" border="1">
												<tr>
													<td colspan="2"> <h1>Facebook User</h1></td>
												</tr>
												
												<tr>
													<td>user name</td>
													<td>Email id</td>
												</tr>
												<?php for($t=0;$t<count($facebookuser);$t++){
												
												$facebookuserdetail=Yii::app()->db->createCommand()
															->select('*')
															->from('tbl_artist_nomination_vote_fb')
															->where('FB_USER_ID =:userid',array(':userid'=>$facebookuser[$t]['IP_ADDRESS']))
															->queryAll();
												
												?>
												<tr>
													<td><?php if(isset($facebookuserdetail[0]['FB_FNAME'])) {echo $facebookuserdetail[0]['FB_FNAME'];} ?></td>
													<td><?php if(isset($facebookuserdetail[0]['FB_EMAIL'])) { echo $facebookuserdetail[0]['FB_EMAIL'];}?></td>
												</tr>
												<?php } ?>
											</table>
											<?php } ?>
											
											
											<?php $this->endWidget(); ?></div></div>
											<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
													'target'=>'a#inline',
													'config'=>array(
														    //'scrolling'             => 'yes',
															'titleShow'             => true,
													),
													)
											);
											/* Code for fancybox ends here */
											?>
											</td>
																			
											
											</tr>
											<?php }
											
											echo "</table></br>";

				}


?>