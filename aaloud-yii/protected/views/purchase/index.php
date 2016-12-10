
<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Purchased Music
								</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Purchased Music</h2>
                    <div class="share-elements fr">
                    <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                    </div>
                <div class="clr"></div>
                </div>
                
                
            	<div class="language-list mt10">
							
							<div class="grey99 pur-head">
Here is the list of songs you have purchased on Artistaloud.com.</br>
You have bought a total of <span class="nr-songs"><?php if($content_xml->TotalRecords==0){echo "0";} else { echo $content_xml->TotalRecords;} ?></span> songs
</div>
<?php 

	$j=($sample[0]-1)+13;
if($j>$item_count){
		 $j=$item_count;
}

for($i=$sample[0]-1;$i<$j;$i++){   

//for($i=0;$i<count($content_xml->Content);$i++) {
	//print_r($content_xml);
	if(isset($content_xml->Content[$i]->ContentId))
	{
	$content_id = (string)$content_xml->Content[$i]->ContentId;
	}
	else
	{
	$content_id='';
	}
		if(isset($content_xml->Content[$i]->OrderId))
		{
			$orders_id = (string)$content_xml->Content[$i]->OrderId;
		}
		else
		{
		$orders_id='';
		}	
			if(isset($content_xml->Content[$i]->ContentTypeId))
			{
			$content_type_id = (string)$content_xml->Content[$i]->ContentTypeId;
			}
			else
			{
			$content_type_id='';
			}
				if(isset($content_xml->Content[$i]->Downloads))
				{
					$download_count = (string)$content_xml->Content[$i]->Downloads;
				}
				else
				{
				$download_count='';
				}
					if(isset($content_xml->Content[$i]->PlanId))
					{
					$plan_id = (string)$content_xml->Content[$i]->PlanId;
					}
					else
					{
					$plan_id='';
					}
						if(isset($content_xml->Content[$i]->Title))
						{
					$content_title = (string)$content_xml->Content[$i]->Title;
					}
					else
					{
					$content_title='';
					}
	
	?>
		<?php 
		if(isset($content_xml->Content[$i]->ContentId))
		{
		
		if($content_xml->Content[$i]->ContentTypeId == 1)
		{
			 if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' .$content_xml->Content[$i]->ContentId . ".xml")) {
			 
			 
			 



            $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' .$content_xml->Content[$i]->ContentId . ".xml");
//print_r($songxml);

		
		?>

		<?php 
						for($l=0;$l<count($songxml->names->artistName);$l++)
						{
						$artistId='';
							if($songxml->names->artistName[$l]->attributes()==31)
							{
							$artistId=$songxml->names->artistName[$l]->artistid;
							break;
							}
						}
		?>
		<?php 
		 if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $artistId . ".xml")) {
		 
		  $artistfile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $artistId . ".xml");
		  
		  
		 }
		?>
		<?php 
					
						for($k=0;$k<count($songxml->names->artistName);$k++)
						{
						$artistname='';
							if($songxml->names->artistName[$k]->attributes()==31)
							{
							$artistname=$songxml->names->artistName[$k]->name;
							break;
							}
						}
					?>
		

			<div class="pur-list">
					<div class="fl">
					<?php if(strlen($artistfile->profileimage50->image50->file_path)!='') { ?>
						<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistname),'id'=>$artistId)); ?>">
						<img src="<?php echo $artistfile->profileimage50->image50->file_path; ?>"/>
						</a>
						<?php } else {  ?>
						
						<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistname),'id'=>$artistId)); ?>">
						<img src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/50x50.jpg"; ?>"/>
						</a>
						<?php } ?>
					</div>
					<div class="pur-desc fl">
					

						<div>
							<div class="next-img-puchase fl pl5"><div class="song-name font-mole fl pl10"><?php echo $songxml->songName; ?></div>
                            <div class="font-mole grey99 fl fnt16 pl5">by</div>
						
                            <div class=" font-mole fl pl5">
                            <a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>$artistname,'id'=>$artistId)); ?>" class="artist-name">	
                                <?php echo substr($artistname,0,15); ?>
                            </a>
                            </div>  
                       </div>
							
							
							
						</div>
					</div>
					<div>
						<a class="pur-dwnld fr" href="<?php echo Yii::app()->params['STORE_WEBSITE_SECURE_URL']; ?>/cd_service.php?content_id=<?php echo $content_id; ?>&content_type_id=<?php echo $content_type_id; ?>&plan_id=<?php echo $plan_id; ?>&order_id=<?php echo $orders_id; ?>&redirect=<?php echo Yii::app()->params['STORE_WEB_URL']; ?>%2Fpurchase%2Findex"  title="Download">DOWNLOAD</a>
					</div>
					<div class="clr"></div>
			</div>



<?php } } 
else

			{ ?>
			<?php 
			/* SELECT arm.ARTIST_ID
            FROM TBL_CNT_ART_ROLE_MAP carm
            JOIN TBL_ARTIST_ROLE_MAP arm ON carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID
            WHERE CONTENT_ID=1026801 AND arm.ARTIST_ROLE_ID=31
			*/
			
			$sql=Yii::app()->db2->createCommand()
					->select('arm.ARTIST_ID')
					->from('TBL_CNT_ART_ROLE_MAP carm')
					->join('TBL_ARTIST_ROLE_MAP arm','carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID')
					->where('arm.ARTIST_ROLE_ID=31 and CONTENT_ID=:contentid',array(':contentid'=>$content_xml->Content[$i]->ContentId))
					->queryAll();

					if(isset($sql[0]['ARTIST_ID']))
					
					{
					
					
			 if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $sql[0]['ARTIST_ID'] . ".xml")) {
		 
		  $artistfile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $sql[0]['ARTIST_ID'] . ".xml");
		  
		  
		 }
		
		// echo $content_xml->Content[$i]->ContentId;exit;
		// echo $artistfile->wallpapers->wallpaper[2]->thumbnail;exit;
		 //echo $content_xml->Content[$i]->ContentId;
		// echo "<pre>";
		 //echo count($artistfile->wallpapers->wallpaper);exit;
		//print_r($artistfile);exit;
		$mobilewallpaper='';
		 
		 for($f=0;$f<count($artistfile->wallpapers->wallpaper);$f++)
		 {
		// echo $artistfile->wallpapers->wallpaper[$f]->contentId."   ".$content_xml->Content[$i]->ContentId."<br>";
		 
		
		 if(((integer)$artistfile->wallpapers->wallpaper[$f]->contentId) == (integer)($content_xml->Content[$i]->ContentId))
			{
			$mobilewallpaper=$artistfile->wallpapers->wallpaper[$f]->thumbnail;
			break;
			}
			
		 
		 }
		
			?>
			
			
			
			<div class="pur-list">
					<div class="fl">
					
					<?php if(strlen($mobilewallpaper)>0) { ?>
					
						<img src="images/temp/t3.gif"/>
						
						
						<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistfile->artistName),'id'=>$artistfile->artistId)); ?>">
						<img src="<?php echo $mobilewallpaper; ?>"/>
						</a>
						<?php } else { ?>
						<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistfile->artistName),'id'=>$artistfile->artistId)); ?>">
						<img src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/50x50.jpg"; ?>"/>
						</a>
						
						<?php } ?>
					</div>
							<div class="pur-desc fl">
								<div>
								
									<div class="next-img-puchase fl pl5"><div class="song-name font-mole fl pl10"><?php echo $artistfile->artistName; ?></div>
										<!--<div class="font-mole grey99 fl fnt16 pl5">by</div>
									
										<div class=" font-mole fl pl5">
										<a href="" class="artist-name">	
											<?php echo "rahu";  ?>
										</a>
										</div> --> 
                                </div>
							
							
								
								
								
								</div>
							</div>
					<div>
						<a class="pur-dwnld fr" href="<?php echo Yii::app()->params['STORE_WEBSITE_SECURE_URL']; ?>/cd_service.php?content_id=<?php echo $content_id; ?>&content_type_id=<?php echo $content_type_id; ?>&plan_id=<?php echo $plan_id; ?>&order_id=<?php echo $orders_id; ?>&redirect=<?php echo Yii::app()->params['STORE_WEB_URL']; ?>%2Fpurchase%2Findex"  title="Download">DOWNLOAD</a>
						<!--<a class="pur-dwnld fr" href="">DOWNLOAD</a>-->
					</div>
        <div class="clr"></div>
		</div>
		<?php //	echo $content_xml->Content[$i]->ContentTypeId;
			
			} }

}

} ?>




           <?php //include 'purchase-list.php'; ?>
					<div class="clr"></div>
                </div>
                     <div class="clr"></div>
           
					 &nbsp;&nbsp;&nbsp;		
			
		<?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>4,
            'nextPageLabel'=>'Next &gt;',
            'header'=>'',
						'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
				
			</div>
<?php
if(isset($_REQUEST['error'])) {
if(trim($_REQUEST['error'])=="NA1")
{
	echo "<script language='Javascript' type='text/javascript'>";
	echo "alert('Content Download Limit Reached');";
	echo "</script>";
} }
?>