<?php $this->pageTitle ="Music Video Artist Languages"." | Modern Artists of India"." | Music Videos Different Language -"." ArtistAloud.com";  ?>

<?php Yii::app()->clientScript->registerMetaTag('Watch all the different language music videos the artists perform in Check out the different languages artists perform only at ArtistAloud.com','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag('video language, independent music video India, artists, artists in languages, India, music, latest music, new music, exclusive, artist aloud, india, upload music free, independent music artists, artist languages, song languages, artistaloud','keywords'); ?>


<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Language Listing
								</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Video Languages</h2>
                    <div class="share-elements fr">
                    <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                    </div>
                <div class="clr"></div>
                </div>
                
                <div class="top mb10">
				
				<ul id="pagination">
				
				<?php echo CHtml::link('A', array('videos/directory', 'char' => 'A')); ?>
				<?php echo CHtml::link('B', array('videos/directory', 'char' => 'B')); ?>
				<?php echo CHtml::link('C', array('videos/directory', 'char' => 'C')); ?>
				<?php echo CHtml::link('D', array('videos/directory', 'char' => 'D')); ?>
				<?php echo CHtml::link('E', array('videos/directory', 'char' => 'E')); ?>
				<?php echo CHtml::link('F', array('videos/directory', 'char' => 'F')); ?>
				<?php echo CHtml::link('G', array('videos/directory', 'char' => 'G')); ?>
				<?php echo CHtml::link('H', array('videos/directory', 'char' => 'H')); ?>
				<?php echo CHtml::link('I', array('videos/directory', 'char' => 'I')); ?>
				<?php echo CHtml::link('J', array('videos/directory', 'char' => 'J')); ?>
				<?php echo CHtml::link('K', array('videos/directory', 'char' => 'K')); ?>
				<?php echo CHtml::link('L', array('videos/directory', 'char' => 'L')); ?>
				<?php echo CHtml::link('M', array('videos/directory', 'char' => 'M')); ?>
				<?php echo CHtml::link('N', array('videos/directory', 'char' => 'N')); ?>
				<?php echo CHtml::link('O', array('videos/directory', 'char' => 'O')); ?>
				<?php echo CHtml::link('P', array('videos/directory', 'char' => 'P')); ?>
				<?php echo CHtml::link('Q', array('videos/directory', 'char' => 'Q')); ?>
				<?php echo CHtml::link('R', array('videos/directory', 'char' => 'R')); ?>
				<?php echo CHtml::link('S', array('videos/directory', 'char' => 'S')); ?>
				<?php echo CHtml::link('T', array('videos/directory', 'char' => 'T')); ?>
				<?php echo CHtml::link('U', array('videos/directory', 'char' => 'U')); ?>
				<?php echo CHtml::link('V', array('videos/directory', 'char' => 'V')); ?>
				<?php echo CHtml::link('W', array('videos/directory', 'char' => 'W')); ?>
				<?php echo CHtml::link('X', array('videos/directory', 'char' => 'X')); ?>
				<?php echo CHtml::link('Y', array('videos/directory', 'char' => 'Y')); ?>
				<?php echo CHtml::link('Z', array('videos/directory', 'char' => 'Z')); ?>
</ul>

				
                <?php //include 'top-paginate.php'; ?>
                </div>
                <div class="clr"></div>
                <div class="top-buttons mb10">
				
				<div class="buttons">

						 <ul class="blue">
                <li><?php echo CHtml::link('<span class="font-mole">Videos</span>', CController::createUrl("videos/index")); ?></li>
								<li><?php echo CHtml::link('<span class="font-mole">Popular videos</span>', CController::createUrl("videos/popularvideos")); ?></li>
                <li><a class="current trigger-l" title="languages"><span class="font-mole">Languages</span></a></li>
								<li><a class="trigger" title="categories" ><span class="font-mole">Genres</span></a></li>
            </ul>

</div><div class="clr"></div>


				 <div class="panel mt10">
            <div class="panal-header">
                <h3 class="sub-page-title-block fl">Genres</h3>
            </div>
            <div class="clr"></div>
            <div class="panal-content">
                <div class="panal-list">
				 <ul class="each-list">
								<?php for($i=0;$i<count($genrelist);$i++) { ?>
                   
                        
						
											<li>
											<?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], $this->createUrl('videos/genredirectory',array(
				  'id' => $genrelist[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$genrelist[$i]['GENRE_NAME'])))); ?>
				  </li>
										

										<?php if(($i+1)%8==0) { ?>
								
											 </ul>
											 </div>
											 <div class="panal-list">
											<ul class="each-list">
											
											
											<?php } ?>
								<?php 
								
								if($i==31)
								{
								break;
								}
								
								} ?>
                </div>
            </div>
        </div>


				 <div class="panel-l mt10">
            <div class="panal-header">
                <h3 class="sub-page-title-block fl">Languages</h3>
            </div>
            <div class="clr"></div>
            <div class="panal-content">
                <div class="panal-list">
				 <ul class="each-list">
                <?php for($i=0;$i<count($langlist);$i++) { ?>
                   
                          <li>
						  <?php echo CHtml::link('' . $langlist[$i]['LANGUAGE_TITLE'], $this->createUrl('videos/langdirectory',array(
				  'id' =>  $langlist[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$langlist[$i]['LANGUAGE_TITLE'])))); ?>
						  </li> 
                    <?php if(($i+1)%8==0) { ?>
			
						 </ul>
						 </div>
						 <div class="panal-list">
						<ul class="each-list">
						<?php } ?>
						  <?php 
						  if($i==31)
						  {
						  break;
						  }
						  
				  } ?>
                </div>
            </div>
        </div>
			
				

				
                <?php //include 'button-nav.php'; ?>
                </div>
                <div class="clr"></div>
				
				
								<?php 
				
				$j=($sample[0]-1)+10;
			if($j>$item_count){
					 $j=$item_count;
								}

			for($i=$sample[0]-1;$i<$j;$i++){   
						$v=0;
						?>
				
            	<div class="language-list">
			
				<div class="lang-list">
				
				
		<?php echo CHtml::link(''.$lang[$i]['LANGUAGE_TITLE'], CController::createUrl("videos/langdirectory/id/".$lang[$i]['LANGUAGE_ID']), array('class'=>'lang')); ?>
		
        <div class="img-list">
        	<ul id=list-nav>
					
							<?php 
							
							if(isset($langimages[$i]) && !(empty($langimages[$i])))
							{
							
							
							$imagenumber='';
							if(count($langimages[$i])>2)
							{
							$imagenumber=count($langimages[$i])-1;
							}
							else
							{
							$imagenumber=count($langimages[$i]);
							}
							
							
							
								for($v=0;$v<$imagenumber;$v++)
									{
									 if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $langimages[$i][$v]['CONTENT_ID'] . ".xml"))
									 {
							   $videofile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $langimages[$i][$v]['CONTENT_ID'] . ".xml"); 
								 
								 
								 $image='';
								 $size=count($videofile->previews->preview);
										for($q=0;$q<$size;$q++)
											{
												foreach($videofile->previews->preview[$q]->attributes() as $a => $b)
														{
															if($a=='type' && $b=='517')
																{
																	$image = $videofile->previews->preview[$q]->videoPreview;
																	break;
																}								
														}
											}
										}
							?>
							
							<?php if (strlen($image) != 0) {?>
							
								 <li>
							 
								 
								 <a href="<?php echo CController::createUrl('videos/index', array('id'=>$langimages[$i][$v]['CONTENT_ID'],'name'=>str_replace(' ','-',$langimages[$i][$v]['CONTENT_TITLE']))); ?>" ><img src="<?php echo $image; ?>"/></a></li>
							<?php } else { ?>
								 <li><a href="<?php echo CController::createUrl('videos/index', array('id'=>$langimages[$i][$v]['CONTENT_ID'],'name'=>str_replace(' ','-',$langimages[$i][$v]['CONTENT_TITLE']))); ?>" ><img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/80x50.png"; ?>"/></a></li>
								 
											<?php } ?>  
						<?php } ?>  
				<?php } ?>  
          </ul>
        </div>
        <div class="more">
        	<!--<a href="">More</a>-->
			<?php if(isset($langimages[$i][2])) { ?>
			
			<?php echo CHtml::link('More', $this->createUrl('videos/langdirectory',array(
				  'id' =>  $lang[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$lang[$i]['LANGUAGE_TITLE']))), array('class'=>'more')); ?>
			<?php } ?>
		</div>
        <div class="clr"></div>
</div>



			
                    <?php //include 'language-list.php'; ?>
                    </div>
					<?php } ?>
                     <div class="clr"></div>
                </div>
				
					&nbsp;&nbsp;&nbsp;		
			
		<?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>2,
            'nextPageLabel'=>'Next &gt;',
            'header'=>'',
						'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>