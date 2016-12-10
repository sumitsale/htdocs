<?php
						$j=0;
            if($perPage>count($result))
							{
							$loop_count = count($result);
							}
							else
							{
							$loop_count = $perPage;
							}
							if (count($result) > 0) {

      for ($i = 0; $i < $loop_count; $i++) {
           
			$videolisting =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/'."video-" . $result[$i]['CONTENT_ID'] . ".xml");
											
												$videoPath = '';
										  //echo "<pre>";
										  //print_r($videolisting);exit;
										  //var_dump($videolisting->paths->path[0]['type']);echo count($videolisting->paths->path);
										  for ($h = 0; $h < count($videolisting->paths->path); $h++) {

											if ($videolisting->paths->path[$h]->attributes() == 191) {
											  $videoPath =urlencode($videolisting->paths->path[$h]->videopath);
											  break;
											}
										  }
										  $ipadpath = '';
										  $ipath='';
										  //echo count($videolisting->paths->path);exit;

										  for ($l = 0; $l < count($videolisting->paths->path); $l++) {

											if ((integer)$videolisting->paths->path[$l]->attributes() == '32') {
											
											        $ipath=str_replace('http://','',$videolisting->paths->path[$l]->videopath);
				
													$ipadpath=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
											  break;
											}
										  }
											
											for ($b = 0; $b < count($videolisting->names->artistName); $b++) {

											if ($videolisting->names->artistName[$b]->attributes() == 31) {
												$artistName =  $videolisting->names->artistName[$b]->name;
												break;
											}
										  }
            ?>

                         <div class="vid" id="video_<?php echo $i; ?>">
                           <!-- <div class="new-button">
                            </div>-->
																		<input type="hidden" id="video_name" value="<?php echo $videolisting->videoName;?>">
																		<input type="hidden" id="album_name" value="<?php echo $videolisting->videodetail->videoAlbum;?>">
																		<input type="hidden" id="video_path" value="<?php echo $videoPath; ?>">
																		 <input type="hidden" id="ipad_path" value="<?php echo $ipadpath; ?>">
																		<input type="hidden" id="artist_name" value="<?php echo $artistName; ?>">
																		<input type="hidden" id="video_genre" value="<?php echo $videolisting->genre;?>">
																		<input type="hidden" id="video_description" value="<?php echo $videolisting->videodetail->videoDescription; ?>">
																		
                           <!-- <div class="new-button">
                            </div>-->
                            <div class="video">
                                <div style="cursor:pointer;" class="block" href="">
																<?php 
																$imgpath ='';
																$size = count($videolisting->previews->preview);
																for($p=0;$p<$size;$p++)
																{
																		foreach($videolisting->previews->preview[$p]->attributes() as $a => $b)
																		{
																		 
																		 if($a=='type' && $b=='520')
																		 {
																		 $imgpath = $videolisting->previews->preview[$p]->videoPreview;
																		 }
																		}
																
																}
															
																if($imgpath != '') { ?>
                                <img src="<?php echo $imgpath;?>" width="130" height="75"  />
																<?php } else { ?>
															
																 <img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/135x75.jpg"; ?>" width="130" height="75"  />
																<?php } ?>
																</div>
                            </div>
                            <div class="vid-bottom">
                                <div class="play-button" style="cursor:pointer;" href="">
                                    <div id="<?php echo $videolisting->videoPath; ?>" style="cursor:pointer;" class="block" href=""></div>
                                </div>
                                <div class="name-list">
                                    <div class="name fnt11">
                                        <b><?php 
																				$name='';
																				$size=count($videolisting->names->artistName);
																				for($q=0;$q<$size;$q++)
																					{
																						foreach($videolisting->names->artistName[$q]->attributes() as $a => $b)
																							{
																		 
																							if($a=='id' && $b=='31')
																							{
																							$name = $videolisting->names->artistName[$q]->name;
																							}
																							}
																					}
																				
																					if($name != '')
																					{ 
																						if(strlen($name)>18)
																						{
																						$artname = substr($name,0,16);
																						$artname.="..";
																						}
																						else
																						{
																						$artname = $name;
																						}
																					echo $artname;
																					}
																				?></b>
                                    </div>
																		
                                    <div class="song fnt11 grey99" style="cursor:pointer;">
                                        <?php 	
																				$str = $videolisting->videoName;
																							if(strlen($str)>20)
																							{
																							$str = substr($videolisting->videoName,0,18);
																							$str.="..";
																							}
																							else
																							{
																							$str = $videolisting->videoName;
																							}
																				
																				echo $str;?>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php $k = $j + 1;


            if ($k % 4 == 0) { ?>
                            <div class="clr"></div>
                        <?php } ?>

                        <?php $j++;
                    }
                } else
                echo "<h2 class=" . 'orange' . ">No Result Found</h2>"; ?>

