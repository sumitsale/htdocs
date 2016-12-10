<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11"> Breadcrumbs here.</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Artists</h2>
                   <div class="share-elements fr"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/share.gif" alt="" /></div>
                <div class="clr"></div>
                </div>
                
                <div class="top-pagination mb10">
				
				<ul id="pagination">
				
				<?php echo CHtml::link('A', array('artist/directory', 'char' => 'A' )); ?>
				<?php echo CHtml::link('B', array('artist/directory', 'char' => 'B' )); ?>
				<?php echo CHtml::link('C', array('artist/directory', 'char' => 'C' )); ?>
				<?php echo CHtml::link('D', array('artist/directory', 'char' => 'D' )); ?>
				<?php echo CHtml::link('E', array('artist/directory', 'char' => 'E' )); ?>
				<?php echo CHtml::link('F', array('artist/directory', 'char' => 'F' )); ?>
				<?php echo CHtml::link('G', array('artist/directory', 'char' => 'G' )); ?>
				<?php echo CHtml::link('H', array('artist/directory', 'char' => 'H' )); ?>
				<?php echo CHtml::link('I', array('artist/directory', 'char' => 'I' )); ?>
			    <?php echo CHtml::link('J', array('artist/directory', 'char' => 'J' )); ?>
			    <?php echo CHtml::link('K', array('artist/directory', 'char' => 'K' )); ?>
           		<?php echo CHtml::link('L', array('artist/directory', 'char' => 'L' )); ?>
				<?php echo CHtml::link('M', array('artist/directory', 'char' => 'M' )); ?>
				<?php echo CHtml::link('N', array('artist/directory', 'char' => 'N' )); ?>
				<?php echo CHtml::link('O', array('artist/directory', 'char' => 'O' )); ?>
				<?php echo CHtml::link('P', array('artist/directory', 'char' => 'P' )); ?>
				<?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q' )); ?>
				<?php echo CHtml::link('R', array('artist/directory', 'char' => 'R' )); ?>
				<?php echo CHtml::link('S', array('artist/directory', 'char' => 'S' )); ?>
				<?php echo CHtml::link('T', array('artist/directory', 'char' => 'T' )); ?>
				<?php echo CHtml::link('U', array('artist/directory', 'char' => 'U' )); ?>
			    <?php echo CHtml::link('V', array('artist/directory', 'char' => 'V' )); ?>
			    <?php echo CHtml::link('W', array('artist/directory', 'char' => 'W' )); ?>
           		<?php echo CHtml::link('X', array('artist/directory', 'char' => 'X' )); ?>
				<?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y' )); ?>
           		<?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z' )); ?>
</ul>

				
                <?php //include 'top-paginate.php'; ?>
                </div>
                <div class="clr"></div>
                <div class="top-buttons">
				
				<div class="buttons">

<ul class="blue">
	 <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/index" title="New artists" ><span class="font-mole">New artists</span></a></li>
			<li><a href="<?php echo Yii::app()->baseUrl;  ?>/index.php/artist/popularartist" title="popular artists"><span class="font-mole">popular artists</span></a></li>
    <li><a title="languages" href="<?php echo Yii::app()->baseUrl;  ?>/index.php/languages/index"><span>languages</span></a></li>
	<li><a class="current" title="Genres" href="<?php echo Yii::app()->baseUrl;  ?>/index.php/genre/index"><span>genres</span></a></li>
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
            	<li><a href="#">Alternative Pop</a></li>
                <li><a href="#">Classic Indi Pop</a></li>
                <li><a href="#">Fusion</a></li>
                <li><a href="#">Malayalam Pop</a></li>
                <li><a href="#">English Rock</a></li>
                <li><a href="#">Urben</a></li>
                <li><a href="#">Spiritual</a></li>
                <li><a href="#">Global</a></li>
            </ul>
		</div>
		<div class="panal-list">
        	<ul class="each-list">
            	<li><a href="#">Progressive Rock</a></li>
                <li><a href="#">Electronic</a></li>
                <li><a href="#">Hindi Rap</a></li>
                <li><a href="#">Devotional Pop</a></li>
                <li><a href="#">Country</a></li>
                <li><a href="#">Light Music</a></li>
                <li><a href="#">Pop</a></li>
                <li><a href="#">Indi Pop</a></li>
            </ul>
		</div>
		<div class="panal-list">
        	<ul class="each-list">
            	<li><a href="#">Demonic Metal</a></li>
                <li><a href="#">Hindi Rock</a></li>
                <li><a href="#">Gujarati Pop</a></li>
                <li><a href="#">Alternative Rock</a></li>
                <li><a href="#">Sufi</a></li>
                <li><a href="#">Punjabi Pop</a></li>
                <li><a href="#">Metal</a></li>
                <li><a href="#">Bengali Pop</a></li>
            </ul>
		</div>
		<div class="panal-list">
        	<ul class="each-list">
            	<li><a href="#">Christian Contemporary</a></li>
                <li><a href="#">Ghazal Pop</a></li>
                <li><a href="#">Hindi Pop</a></li>
                <li><a href="#">Bollywood Pop</a></li>
                <li><a href="#">Rock</a></li>
                <li><a href="#">Punjabi Rock</a></li>
                <li><a href="#">Alternative Raga</a></li>
                <li><a href="#">Club</a></li>
            </ul>
		</div>
     </div>
</div>

				
                <?php //include 'button-nav.php'; ?>
                </div>
                <div class="clr"></div>
				
						<?php
						foreach($genre as $row)
						{
					
						?>
				
				<div class="section-title"><?php echo $row['GENRE_NAME']; ?></div>
				
					<?php } ?>
				
                <div class="clr"></div>
            	<div class="artist-list mt10 pt10">
				
				<?php 
                                if(count($result)>0){
                                for($i=0;$i<count($result);$i++) 
				{     


				
				if(file_exists(Yii::app()->basePath . '/../xml/content/artists/'."artist-".$result[$i]['ARTIST_ID'].".xml"))   {
				 $j;
				

					$artistfile =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/'."artist-".$result[$i]['ARTIST_ID'].".xml");
					
					
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
	<div class="img-block fl">
    <div>
    <a href="#" rel="web" title="Sed ut perspiciatis unde omnis.">
       <img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/<?php echo $artistfile->artistImage200X200; ?>">
    </a>
    </div>
         <!-- Begin Caption -->
    <div class="cover boxcaption">
        <div class="overlay_wrap">
        <span class="rollover">
			<h3 class="art_title"><?php echo $artistfile->artistName; ?></h3>
        	 <a href="#" class="frame_close"></a>
                <span class="fnt11 grey99">Genre: <?php echo $artistfile->artistGenre;?> <br>Language: <?php echo $artistfile->artistLanguage; ?></span>
                <div class="play_box">
                  <div><a href="#" class="pause fl mt4"></a><span class="song-title pl15"><a href="#" class="grey99"><?php echo $artistfile->songs->song[0]->songName; ?></a></span></div>
                  <div><a href="#" class="play fl mt4"></a><span class="song-title pl15"><a href="#" class="grey99"><?php echo $artistfile->songs->song[1]->songName ?></a></span></div>
                  <div><a href="#" class="pause fl mt4"></a><span class="song-title pl15"><a href="#" class="grey99"><?php echo $artistfile->songs->song[2]->songName ?></a></span></div>
                </div>
						<div class="artist_more fl">
						<?php echo CHtml::link(MORE, array('artist/artistdetail', 'name' =>str_replace(' ','-',$result[$i]['Artist_Name'])

						),array('class'=>orange)); ?>
						</div>
				 <!-- <div class="artist_more fl"><a class="orange" href="<?php //echo Yii::app()->baseUrl;  ?>/artist/artistdetail">More</a></div>
                   -->
                <div class="fr"> <img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/fblike.gif"></div>
                </span>
        </div>
        
       
    </div><!-- End Caption --> 
</div>

<?php $k=$j+1;


if($k%3==0) { ?>
  <div class="clr pt15"></div>
   <?php } ?>

<?php  $j++;} } } else echo "<h2 class=".orange.">No Result Found</h2>"; ?>
                 
                </div>
				
								  <div class="clr pt15"></div>
									 <div class="bottom-pagination mt10">
									 
									<ul id="pagination_bottom">
												<li>&lt;&lt;</li>
												<li><a href="">1</a></li>
												<li><a href="">2</a></li>
												<li><a href="">3</a></li>
												<li><a href="">4</a></li>
												<li><a href="">5</a></li>
												<li><a style="background-color:#06C" href="">&nbsp;&nbsp;&nbsp;</a></li>
												<li>of</li>
												<li><a href="">23</a></li>
												<li>&gt;&gt;</li>
									</ul>
									</div>
								
								
								</div>