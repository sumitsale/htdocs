

<div class="">
		<?php 
		$z=0;
		for($j=0;$j<count($video->responsedata->autnhit);$j++) { ?>
		
		
		<?php 
			if(file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' .$video->responsedata->autnhit[$j]->autncontent->DOCUMENT->DREREFERENCE. ".xml"))
		{
		
		$videolisting = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' .$video->responsedata->autnhit[$j]->autncontent->DOCUMENT->DREREFERENCE. ".xml");
		
		
		
		 $imgpath = '';
										$size = count($videolisting->previews->preview);
										for ($p = 0; $p < $size; $p++) {
										  foreach ($videolisting->previews->preview[$p]->attributes() as $a => $b) {

											if ($a == 'type' && $b == '520') {
											  $imgpath = $videolisting->previews->preview[$p]->videoPreview;
											}
										  }
										}
										
										
										 $name = '';
												$size = count($videolisting->names->artistName);
												for ($q = 0; $q < $size; $q++) {
												  foreach ($videolisting->names->artistName[$q]->attributes() as $a => $b) {
													if ($a == 'id' && $b == '31') {
													  $name = $videolisting->names->artistName[$q]->name;
													}
												  }
												}

												if ($name != '') {
												  if (strlen($name) > 18) {
													$artname = substr($name, 0, 16);
													$artname.="..";
												  } else {
													$artname = $name;
												  }
												 
												}
		
		?>
		
		
		
		
        <div class="vid">
			<div class="video">
				<?php if ($imgpath != '')  { ?>
									 <a href="<?php echo CController::createUrl('videos/index', array('id'=>$videolisting->videoId,'name'=>str_replace(' ','-',$videolisting->videoName))); ?>" >
									<img src="<?php echo $imgpath ;?>"  />
									 </a>
									
									
									<?php } else { ?>
									<a href="<?php echo CController::createUrl('videos/index', array('id'=>$videolisting->videoId,'name'=>str_replace(' ','-',$videolisting->videoName))); ?>" >
									 <img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/135x75.jpg"; ?>" width="130" height="75"  />
									 </a>
									<?php } ?>
			</div>
        	<div class="vid-bottom">
        	<div class="play-button">
            	<a class="block" href="<?php echo CController::createUrl('videos/index', array('id'=>$videolisting->videoId,'name'=>str_replace(' ','-',$videolisting->videoName))); ?>"></a>
        	</div>
        	<div class="name-list">
            	<div class="name fnt11">
                	<b><?php  if(isset($artname)) { echo $artname; } ?>
					</b>
                </div>
                <div class="song fnt11 grey99">
                <?php
												  $str = $videolisting->videoName;
												  if (strlen($str) > 20) {
													$str = substr($videolisting->videoName, 0, 18);
													$str.="..";
												  } else {
													$str = $videolisting->videoName;
												  }

												  echo $str;
										  ?>
                </div>
            </div>
        	</div>
        </div>
			
	
			
      
        <?php if(($z+1)%4==0) { ?>
        <div class="clr"></div>
        <?php } ?>
		
		<?php if($z==7) {break; }   ?>
		
		
       <?php $z++;} }?>
      <div class="clr"></div>
    
</div>

