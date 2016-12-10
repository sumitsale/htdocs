<?php $this->pageTitle ="Music Artist Languages"." | Modern Artists of India"." | Singers of different Language" ." - ArtistAloud.com";  ?>
<?php Yii::app()->clientScript->registerMetaTag('Get all the information of the type of languages artists sing and latest albums. Check out the different languages artists perform only at ArtistAloud.com.','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag('singers language, independent music India, artists, artists in languages, India, music, latest music, new music, exclusive, artist aloud, india, upload music free, independent music artists, artist languages, song languages, artistaloud','keywords'); ?>

		<div class="content-left fl">

								<div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Languages listing 
								</div>

    <div class="page-title mt10">
        <h2 class="page-title-block fl">Artist Languages</h2>
        <div class="share-elements fr">
         <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
        </div>
        <div class="clr"></div>
    </div>

    <div class="top mb10">

        <ul id="pagination">
            <?php echo CHtml::link('A', array('artist/directory', 'char' => 'A')); ?>
            <?php echo CHtml::link('B', array('artist/directory', 'char' => 'B')); ?>
            <?php echo CHtml::link('C', array('artist/directory', 'char' => 'C')); ?>
            <?php echo CHtml::link('D', array('artist/directory', 'char' => 'D')); ?>
            <?php echo CHtml::link('E', array('artist/directory', 'char' => 'E')); ?>
            <?php echo CHtml::link('F', array('artist/directory', 'char' => 'F')); ?>
            <?php echo CHtml::link('G', array('artist/directory', 'char' => 'G')); ?>
            <?php echo CHtml::link('H', array('artist/directory', 'char' => 'H')); ?>
            <?php echo CHtml::link('I', array('artist/directory', 'char' => 'I')); ?>
            <?php echo CHtml::link('J', array('artist/directory', 'char' => 'J')); ?>
            <?php echo CHtml::link('K', array('artist/directory', 'char' => 'K')); ?>
            <?php echo CHtml::link('L', array('artist/directory', 'char' => 'L')); ?>
            <?php echo CHtml::link('M', array('artist/directory', 'char' => 'M')); ?>
            <?php echo CHtml::link('N', array('artist/directory', 'char' => 'N')); ?>
            <?php echo CHtml::link('O', array('artist/directory', 'char' => 'O')); ?>
            <?php echo CHtml::link('P', array('artist/directory', 'char' => 'P')); ?>
            <?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q')); ?>
            <?php echo CHtml::link('R', array('artist/directory', 'char' => 'R')); ?>
            <?php echo CHtml::link('S', array('artist/directory', 'char' => 'S')); ?>
            <?php echo CHtml::link('T', array('artist/directory', 'char' => 'T')); ?>
            <?php echo CHtml::link('U', array('artist/directory', 'char' => 'U')); ?>
            <?php echo CHtml::link('V', array('artist/directory', 'char' => 'V')); ?>
            <?php echo CHtml::link('W', array('artist/directory', 'char' => 'W')); ?>
            <?php echo CHtml::link('X', array('artist/directory', 'char' => 'X')); ?>
            <?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y')); ?>
            <?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z')); ?>
        </ul>


        <?php //include 'top-paginate.php'; ?>
    </div>
    <div class="clr"></div>
    <div class="top-buttons mb10">

        <div class="buttons">

            <ul class="blue">
             <li>
			<?php echo CHtml::link('<span class="font-mole">Artists</span>', CController::createUrl("artist/index")); ?>
			</li>
		
			<li>
			<?php echo CHtml::link('<span class="font-mole">Popular artists</span>', CController::createUrl("artist/popularartist")); ?>
			</li>
			<li><a class="current trigger-l" title="languages"><span class="font-mole">languages</span></a></li>
			<li><a class="trigger" title="Generes"><span class="font-mole">genres</span></a></li>
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
          <?php
          for ($i = 0; $i < count($genrelist); $i++) {
            ?>
           

              <li><a href="#">
                 <?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], 
$this->createUrl('artist/genresdir',array(
				  'id' =>  $genrelist[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$genrelist[$i]['GENRE_NAME'])))); ?>
                </a>
              </li>
            <?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php if($i==31) { break; } } ?>
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
          <?php for ($i = 0; $i < count($langlist); $i++) { ?> 
            
              <li><a href="#">
                <?php echo CHtml::link('' . $langlist[$i]['LANGUAGE_TITLE'], $this->createUrl('artist/languagedir',array(
				  'id' =>  $langlist[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$langlist[$i]['LANGUAGE_TITLE'])))); ?>
                </a></li>   
           

			<?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php if($i==31) { break; } } ?>

        </div>

      </div>


    </div>



        <?php //include 'button-nav.php'; ?>
    </div>
    <div class="clr"></div>

	


    <?php
    $j = ($sample[0] - 1) + 10;
    if ($j > $item_count) {
        $j = $item_count;
    }

    for ($i = $sample[0] - 1; $i < $j; $i++) {
        ?>

        <div class="language-list">

            <div class="lang-list">


    <?php echo CHtml::link('' . $lang[$i]['LANGUAGE_TITLE'], CController::createUrl("artist/languagedir/id/" . $lang[$i]['LANGUAGE_ID']), array('class' => 'lang')); ?>

                <div class="img-list">
                    <ul id=list-nav>
                        <?php 
													for($a=0;$a<count($languageimage[$i]);$a++){ 	 ?>
													
												
													<?php 	$image='';
													//echo "<pre>";
													//echo count($languageimage[$i]);exit;
													//print_r($languageimage);exit;
															if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $languageimage[$i][$a]['ARTIST_ID'] . ".xml")) 
															{
														   $artistimage = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $languageimage[$i][$a]['ARTIST_ID'] . ".xml");
																
																//echo "<pre>";
																//print_r($artistimage);exit;
																
																
																$image='';
																 $size=count($artistimage->profileimage50->image50);
																		for($q=0;$q<$size;$q++)
																			{
																					foreach($artistimage->profileimage50->image50[$q]->attributes() as $y => $b)
																							{
																							if($y=='type' && $b=='33')
																								{
																								$image = $artistimage->profileimage50->image50[$q]->file_path;
																								break;
																								}
																																
																							}
																			}
																								
																								
																
																
																
																	}
													?>
													
													
															<?php if(strlen($image)!= 0) { ?>
															
															<li><a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistimage->artistName),'id'=>$languageimage[$i][$a]['ARTIST_ID'])); ?>" >
															<img src="<?php echo $image; ?>"/></a></li>
															<?php } else { ?>
															<li><a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistimage->artistName),'id'=>$languageimage[$i][$a]['ARTIST_ID'])); ?>">
															<img src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/50x50.jpg"; ?>"/></a></li>
															<?php } ?>
															
															
													<?php } ?>           
                    </ul>
                </div>
				<?php if($a==4) { ?>
                <div class="more">
                    <!--<a href="">More</a>-->
					
		
    <?php echo CHtml::link('More',			
				$this->createUrl('artist/languagedir',array('name'=>str_replace(' ','-',$lang[$i]['LANGUAGE_TITLE']),
				  'id' => $lang[$i]['LANGUAGE_ID'])), array('class' => 'more')); ?>
                </div>
				<?php } ?>
				
                <div class="clr"></div>
            </div>



    <?php //include 'language-list.php';  ?>
        </div>
        <?php } ?>
    <div class="clr"></div>
</div>

<div class="clr"></div>

<?php
$this->widget('CLinkPager', array(
    'currentPage' => $pages->getCurrentPage(),
    'itemCount' => $item_count,
    'pageSize' => $page_size,
    'maxButtonCount' => 2,
    'nextPageLabel' => 'Next &gt;',
    'header' => '',
		'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
        //'htmlOptions'=>array('class'=>'pages'),
));
?>