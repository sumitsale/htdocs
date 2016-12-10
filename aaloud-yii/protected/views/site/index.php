<?php $this->pageTitle=Yii::app()->name; ?>

<script type="text/javascript">

function ok()
{

var radioButtons = document.getElementsByName('search');
  
for(var i = 0; i < radioButtons.length; i++) 
		{
					if(radioButtons[i].checked)
					{
					var name=radioButtons[i].value;
					
					}
		}
		
		if(name=="Artist")
		{
		document.getElementById('box-single1').style.display = "inline";
		document.getElementById('box-married1').style.display = "none";
		document.getElementById('box-widowed1').style.display = "none";
		}
			else if(name=="Genre")
			{
			document.getElementById('box-married1').style.display = "inline";
			document.getElementById('box-single1').style.display = "none";
			document.getElementById('box-widowed1').style.display = "none";
			}
				else
				{
				document.getElementById('box-widowed1').style.display = "inline";
				document.getElementById('box-single1').style.display = "none";
				document.getElementById('box-married1').style.display = "none";
				}
	
}
 
</script>



<div class="home-fixed">
	

    <div class="w300 fl"> 
        	<h2 class="title-block">New Releases</h2>
			<div class="block">
			<?php
			for($i=0;$i<count($newreleasesxml->album);$i++)
			{
			//echo $result[$i]['image'];
			?>
            	<div class="n-list mt5">
					<div class="n-thumb fl mr5">
					
					<?php if(isset($newreleasesxml->album[$i]))  { ?>
					
					<a href="<?php echo $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$newreleasesxml->album[$i]->artistName),'id' => $newreleasesxml->album[$i]->artistId)); ?>">
						<img src="<?php echo ($newreleasesxml->album[$i]->albumArtwork != "")?$newreleasesxml->album[$i]->albumArtwork : Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/80x80.jpg"; ?>" alt="thumb" style="width:80px; height:80px;" />
					</a>
					
					<?php } ?>
					
					
					</div>
                    <div class="n-desc fl">
					<?php 
								if(isset($newreleasesxml->album[$i]->artistName) && !(empty ($newreleasesxml->album[$i]->artistName)))
								{
								$artistname = $newreleasesxml->album[$i]->artistName;
													if(strlen($artistname)>22)
													{
													$artistname = substr($newreleasesxml->album[$i]->artistName,0,22);
													$artistname.="....";
													}
													else
													{
													$artistname = $newreleasesxml->album[$i]->artistName;
													}
								echo $artistname;
								}
					//echo  $newreleasesxml->album[$i]->artistName; ?><span class="grey99 fnt11"><br />
					Song :		<?php 
										if(isset($newreleasesxml->album[$i]->track) && !(empty ($newreleasesxml->album[$i]->track)))
										{
												$track = $newreleasesxml->album[$i]->track;
													if(strlen($track)>40)
													{
													$track = substr($newreleasesxml->album[$i]->track,0,40);
													$track.="....";
													}
													else
													{
													$track = $newreleasesxml->album[$i]->track;
													}
										echo $track;
										}
					//echo $newreleasesxml->album[$i]->track; ?><br />
					Genre :		<?php 
					if(isset($newreleasesxml->album[$i]->genre) && !(empty ($newreleasesxml->album[$i]->genre)))
					{
					echo $newreleasesxml->album[$i]->genre; 
					}
					?><br />
					
					Language :  <?php 
					if(isset($newreleasesxml->album[$i]->language) && !(empty ($newreleasesxml->album[$i]->language)))
					{
					echo $newreleasesxml->album[$i]->language; 
					}
					?></span></div>
                    <div class="clr"></div>
				</div>
            
        
			<?php
			if($i==2){
			break;
			}
			}
			?>
		</div>
		
		
    </div>
   		<div class="w300 fl ml25"> 
        	<h2 class="title-block">Upcoming Events</h2>
        	<div class="block">
          <div class="scroll-pane">
				
			
					
					<?php   
					for($i=0;$i<count($events);$i++)
					{
					$date=strtotime($events[$i]['event_date']);
					//$Today_timestamp = strtotime(date('d-M-Y'));
					//$time=strtotime(date());
					?>
						<div class="upc-list mt2">
							<div class="upc-thumb fl mr10 ml10 mt10">
								<span class="fnt14">
									<strong><?php echo date('d',$date); ?></strong>
								</span>
							<div class="clr"></div>
								<span class="fnt11"><?php echo date('M',$date); ?></span>
							</div>
							<div class="upc-desc fl">
								<?php 
										$eventname = $events[$i]['event_name'];
												if(strlen($eventname)>22)
												{
												$eventname = substr($events[$i]['event_name'],0,20);
												$eventname.="...";
												}
												else
												{
												$eventname = $events[$i]['event_name'];
												}
					
								//echo $eventname;
								if(isset($events[$i]['url']) && strlen($events[$i]['url'])>0)
								{
									echo "<a href='". $events[$i]['url']."' target='_blank' class='white'>".$eventname."<a>";
								}
								else
								{
									echo $eventname;
								}
								//echo $events[$i]['event_name']; ?>
								
								
								
								<?php //echo $eventxml->event[$i]->eventname; ?>
								<br>
								<?php 
										$location = $events[$i]['location'];
												if(strlen($location)>22)
												{
												$location = substr($events[$i]['location'],0,20);
												$location.="...";
												}
												else
												{
												$location = $events[$i]['location'];
												}
					
								echo $location;
								//echo $events[$i]['location']; ?>
								<?php //echo $eventxml->event[$i]->location; ?>
								<span class="grey99">
									<br>
									<?php  echo $events[$i]['event_time']; ?> |
									<?php echo $events[$i]['city']; ?>
								</span>
							</div>
							<div class="clr"></div>
						</div>
						<?php
						/*
					if($i==6){
					break;
					}
					
					*/
					}
						?>
						
					</div>
								
			</div>
	    
		</div>
            
        
      

        <div class="w300 fl ml25"> 
        	<h2 class="title-block">ArtistAloud Blog</h2>
			
			
			<?php   
					for($i=0;$i<count($blog);$i++)
					{
					?>
        	<div class="block">
			
            	<div class="b-title">
				<?php $time=strtotime($blog[$i]['date']); ?>
				
				<?php 
							$title = $blog[$i]['blog_title'];
												if(strlen($title)>40)
												{
												$title = substr($blog[$i]['blog_title'],0,40);
												$title.="....";
												}
												else
												{
												$title = $blog[$i]['blog_title'];
												}
					
								echo $title;
				 ?></div>
                <div class="b-date fnt11 grey99 mt5">
				<?php echo date('d',$time)." ".date('M',$time)." ".date('y',$time); ?></div>
                <div class="b-desc mt5 grey99">
                <div class="n-thumb fl mr10 mb10">
				<img src="<?php echo Yii::app()->baseUrl;  ?>/images/blogs/<?php echo $blog[$i]['blog_image']; ?>" alt="thumb" /></div>
               <?php 
							 
									$description = $blog[$i]['blog_desc'];
												if(strlen($description)>530)
												{
												$description = substr($blog[$i]['blog_desc'],0,530);
												$description.="....";
												}
												else
												{
												$description = $blog[$i]['blog_desc'];
												}
					
								echo $description;
							 ?>
			   </div>
                
            </div>
			
					<?php
					if($i==0){
					break;
					}					
					
					}
					?>
					
					<!--<a href="artistaloud.wordpress.com " target="_blank" class="readmore mt5">Read More</a>-->
					<a href="http://artistaloud.wordpress.com" class="readmore mt5" target="_blank">Read More</a>
					
				<?php //echo CHtml::link('Read More','artistaloud.wordpress.com ', array('class'=>'readmore mt5')); ?>
			
			
        </div>
		
		
		

	
	
        
         <div class="clr pt15"></div>
        <!--
        <div class="w300 fl"> 
        	<h2 class="title-block">Facebook</h2>
        	<div class="block"><!--<img src="images/temp/fbtemp.gif" alt="fb" />-->
            <!--
           <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fartistaloud&amp;width=292&amp;height=265&amp;colorscheme=dark&amp;show_faces=false&amp;border_color=000000&amp;stream=true&amp;header=false&amp;appId=128037837274893" scrolling="no" frameborder="0" style="border:0px; overflow:hidden; width:292px; height:265px;" allowTransparency="true"></iframe>
            
            </div>
        </div>
        -->
		
		<div class="w300 fl"> 
        	<h2 class="title-block">Facebook</h2>
        	<div class="block bg-white"><!--<img src="images/temp/fbtemp.gif" alt="fb" />-->

            
         <div class="fb-like-box" data-href="http://www.facebook.com/artistaloud" data-width="292" data-height="310" data-show-faces="false" data-border-color="#FFFFFF" data-stream="true" data-header="false"></div>
            
            </div>
        </div>
		
        <div class="w300 fl ml25"> 
        	<h2 class="title-block">In the news</h2>
        
		
			<?php
			for($i=0;$i<count($news);$i++)
			{
			$date=strtotime($news[$i]['Press_News_Date']);
			?>

        	 <div class="block">

                <ul id="newslist">
				
                    <li><?php 
														$newstitle = $news[$i]['Press_News_Title'];
															if(strlen($newstitle)>45)
															{
															$newstitle = substr($news[$i]['Press_News_Title'],0,42);
															$newstitle.="....";
															}
															else
															{
															$newstitle = $news[$i]['Press_News_Title'];
															}
									
										echo CHtml::link(''.$newstitle, CController::createUrl("news/details/id/".$news[$i]['Press_id']), array('class'=>'block')); ?>
					
                    <div class="clr"></div>
                    <span class="grey99 mt5 block"><?php echo date('dS',$date)." ".date('F',$date)." ".date('y',$date); ?> | 
					<?php 
							$source = $news[$i]['Press_News_Source'];
															if(strlen($source)>18)
															{
															$source = substr($news[$i]['Press_News_Source'],0,15);
															$source.="....";
															}
															else
															{
															$source = $news[$i]['Press_News_Source'];
															}
					
										echo $source; ?></span>
                    </li> 

                </ul>
            </div>
			
			
			<?php
				if($i==4){
					break;
					}		
			}
			
			?>
			
				<?php echo CHtml::link('All News', CController::createUrl("news/allnews"),array('class'=>'readmore mt5')); ?>
		
        </div>
        
        <div class="w300 fl ml25"> 
        	
            <div class="search-block mb10">
             <h2 class="title-block" style="margin-bottom:5px;">Search</h2>
        	
			<div class="radio" id="box-single">
			<input type="radio" id="single" name="search"  value="Artist"> 
			</div>
                <label for="single" class="radios font-mole">Artist</label>
				
			<div class="radio" id="box-married">	
			<input type="radio" id="married" name="search" value="Genre" >
			</div>
                <label for="married" class="radios font-mole">Genre</label>
				
			<div class="radio" id="box-widowed">		
			<input type="radio" id="widowed" name="search" value="Language" >  
			</div>
                <label for="widowed" class="radios font-mole">Language</label>
					

			<div class="clr"></div>
					
			<div id="box-single1" style="display:Style;">
            <div id="letters" class="mt10">
				<ul>
								<li><?php echo CHtml::link('A', array('artist/directory', 'char' => 'A' )); ?></li>	
                <li><?php echo CHtml::link('B', array('artist/directory', 'char' => 'B' )); ?></li>
                <li><?php echo CHtml::link('C', array('artist/directory', 'char' => 'C' )); ?></li>
                <li><?php echo CHtml::link('D', array('artist/directory', 'char' => 'D' )); ?></li>
                <li><?php echo CHtml::link('E', array('artist/directory', 'char' => 'E' )); ?></li>
                <li><?php echo CHtml::link('F', array('artist/directory', 'char' => 'F' )); ?></li>
                <li><?php echo CHtml::link('G', array('artist/directory', 'char' => 'G' )); ?></li>
                <li><?php echo CHtml::link('H', array('artist/directory', 'char' => 'H' )); ?></li>
                <li><?php echo CHtml::link('I', array('artist/directory', 'char' => 'I' )); ?></li>
                <li><?php echo CHtml::link('J', array('artist/directory', 'char' => 'J' )); ?></li>
                <li><?php echo CHtml::link('K', array('artist/directory', 'char' => 'K' )); ?></li>
                <li><?php echo CHtml::link('L', array('artist/directory', 'char' => 'L' )); ?></li>
                <li><?php echo CHtml::link('M', array('artist/directory', 'char' => 'M' )); ?></li>
                <li><?php echo CHtml::link('N', array('artist/directory', 'char' => 'N' )); ?></li>
                <li><?php echo CHtml::link('O', array('artist/directory', 'char' => 'O' )); ?></li>
                <li><?php echo CHtml::link('P', array('artist/directory', 'char' => 'P' )); ?></li>
                <li><?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q' )); ?></li>
                <li><?php echo CHtml::link('R', array('artist/directory', 'char' => 'R' )); ?></li>
                <li><?php echo CHtml::link('S', array('artist/directory', 'char' => 'S' )); ?></li>
                <li><?php echo CHtml::link('T', array('artist/directory', 'char' => 'T' )); ?></li>
                <li><?php echo CHtml::link('U', array('artist/directory', 'char' => 'U' )); ?></li>
                <li><?php echo CHtml::link('V', array('artist/directory', 'char' => 'V' )); ?></li>
                <li><?php echo CHtml::link('W', array('artist/directory', 'char' => 'W' )); ?></li>
                <li><?php echo CHtml::link('X', array('artist/directory', 'char' => 'X' )); ?></li>
                <li><?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y' )); ?></li>
                <li><?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z' )); ?></li>

				</ul>
			</div>
			</div>
			
			
			
			<div id="box-married1" style="display:none;">
            <div id="letters" class="mt10">
				<ul>
								<li><?php echo CHtml::link('A', array('genre/search', 'char' => 'A' )); ?></li>	
                <li><?php echo CHtml::link('B', array('genre/search', 'char' => 'B' )); ?></li>
                <li><?php echo CHtml::link('C', array('genre/search', 'char' => 'C' )); ?></li>
                <li><?php echo CHtml::link('D', array('genre/search', 'char' => 'D' )); ?></li>
                <li><?php echo CHtml::link('E', array('genre/search', 'char' => 'E' )); ?></li>
                <li><?php echo CHtml::link('F', array('genre/search', 'char' => 'F' )); ?></li>
                <li><?php echo CHtml::link('G', array('genre/search', 'char' => 'G' )); ?></li>
                <li><?php echo CHtml::link('H', array('genre/search', 'char' => 'H' )); ?></li>
                <li><?php echo CHtml::link('I', array('genre/search', 'char' => 'I' )); ?></li>
                <li><?php echo CHtml::link('J', array('genre/search', 'char' => 'J' )); ?></li>
                <li><?php echo CHtml::link('K', array('genre/search', 'char' => 'K' )); ?></li>
                <li><?php echo CHtml::link('L', array('genre/search', 'char' => 'L' )); ?></li>
                <li><?php echo CHtml::link('M', array('genre/search', 'char' => 'M' )); ?></li>
                <li><?php echo CHtml::link('N', array('genre/search', 'char' => 'N' )); ?></li>
                <li><?php echo CHtml::link('O', array('genre/search', 'char' => 'O' )); ?></li>
                <li><?php echo CHtml::link('P', array('genre/search', 'char' => 'P' )); ?></li>
                <li><?php echo CHtml::link('Q', array('genre/search', 'char' => 'Q' )); ?></li>
                <li><?php echo CHtml::link('R', array('genre/search', 'char' => 'R' )); ?></li>
                <li><?php echo CHtml::link('S', array('genre/search', 'char' => 'S' )); ?></li>
                <li><?php echo CHtml::link('T', array('genre/search', 'char' => 'T' )); ?></li>
                <li><?php echo CHtml::link('U', array('genre/search', 'char' => 'U' )); ?></li>
                <li><?php echo CHtml::link('V', array('genre/search', 'char' => 'V' )); ?></li>
                <li><?php echo CHtml::link('W', array('genre/search', 'char' => 'W' )); ?></li>
                <li><?php echo CHtml::link('X', array('genre/search', 'char' => 'X' )); ?></li>
                <li><?php echo CHtml::link('Y', array('genre/search', 'char' => 'Y' )); ?></li>
                <li><?php echo CHtml::link('Z', array('genre/search', 'char' => 'Z' )); ?></li>

				</ul>
			</div>
			</div>
			
			
			<div id="box-widowed1" style="display:none;">
            <div id="letters" class="mt10">
				<ul>
								<li><?php echo CHtml::link('A', array('languages/search', 'char' => 'A' )); ?></li>	
                <li><?php echo CHtml::link('B', array('languages/search', 'char' => 'B' )); ?></li>
                <li><?php echo CHtml::link('C', array('languages/search', 'char' => 'C' )); ?></li>
                <li><?php echo CHtml::link('D', array('languages/search', 'char' => 'D' )); ?></li>
                <li><?php echo CHtml::link('E', array('languages/search', 'char' => 'E' )); ?></li>
                <li><?php echo CHtml::link('F', array('languages/search', 'char' => 'F' )); ?></li>
                <li><?php echo CHtml::link('G', array('languages/search', 'char' => 'G' )); ?></li>
                <li><?php echo CHtml::link('H', array('languages/search', 'char' => 'H' )); ?></li>
                <li><?php echo CHtml::link('I', array('languages/search', 'char' => 'I' )); ?></li>
                <li><?php echo CHtml::link('J', array('languages/search', 'char' => 'J' )); ?></li>
                <li><?php echo CHtml::link('K', array('languages/search', 'char' => 'K' )); ?></li>
                <li><?php echo CHtml::link('L', array('languages/search', 'char' => 'L' )); ?></li>
                <li><?php echo CHtml::link('M', array('languages/search', 'char' => 'M' )); ?></li>
                <li><?php echo CHtml::link('N', array('languages/search', 'char' => 'N' )); ?></li>
                <li><?php echo CHtml::link('O', array('languages/search', 'char' => 'O' )); ?></li>
                <li><?php echo CHtml::link('P', array('languages/search', 'char' => 'P' )); ?></li>
                <li><?php echo CHtml::link('Q', array('languages/search', 'char' => 'Q' )); ?></li>
                <li><?php echo CHtml::link('R', array('languages/search', 'char' => 'R' )); ?></li>
                <li><?php echo CHtml::link('S', array('languages/search', 'char' => 'S' )); ?></li>
                <li><?php echo CHtml::link('T', array('languages/search', 'char' => 'T' )); ?></li>
                <li><?php echo CHtml::link('U', array('languages/search', 'char' => 'U' )); ?></li>
                <li><?php echo CHtml::link('V', array('languages/search', 'char' => 'V' )); ?></li>
                <li><?php echo CHtml::link('W', array('languages/search', 'char' => 'W' )); ?></li>
                <li><?php echo CHtml::link('X', array('languages/search', 'char' => 'X' )); ?></li>
                <li><?php echo CHtml::link('Y', array('languages/search', 'char' => 'Y' )); ?></li>
                <li><?php echo CHtml::link('Z', array('languages/search', 'char' => 'Z' )); ?></li>

				</ul>
			</div>
			</div>
			
        
        	</div>
            
           <h2 class="title-block" style="margin-bottom:5px;">New this week</h2>
        	<div class="block">
            	<div class="n-list">
				
                	<div class="a-name"><?php 
																				$artistname = $newthisweekxml->artistName;
																					if(strlen($artistname)>22)
																					{
																					$artistname = substr($newthisweekxml->artistName,0,22);
																					$artistname.="....";
																					}
																					else
																					{
																					$artistname = $newthisweekxml->artistName;
																					}
																echo $artistname;
									//echo $newthisweekxml->artistName; ?> <br /> 
					Song : <?php 
											$track = $newthisweekxml->track;
													if(strlen($track)>40)
													{
													$track = substr($newthisweekxml->track,0,40);
													$track.="....";
													}
													else
													{
													$track = $newthisweekxml->track;
													}
								echo $track;
					//echo $newthisweekxml->track; ?></div>
                	<div class="clr mt10"></div>
					<div class="n-thumb fl mr10">
					<?php if(strlen($newthisweekxml->albumArtwork)!=0){?>
					
					<a href="<?php echo $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$newthisweekxml->artistName),'id' => $newthisweekxml->artistId)); ?>">
						<img src="<?php echo $newthisweekxml->albumArtwork; ?>" alt="thumb" />
					</a>
					
					<?php } else { ?>
					
					<a href="<?php echo $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$newthisweekxml->artistName),'id' => $newthisweekxml->artistId)); ?>">
						<img src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/80x80.jpg"; ?>" alt="thumb" />
					</a>
					
					<?php } ?>
					</div>
                    <div class="n-desc fl"><span class="grey99 fnt11">
					Genre : <?php echo $newthisweekxml->genre; ?> <br />
					Language : <?php echo $newthisweekxml->language; ?><br />
					Description : <?php 
													$description = $newthisweekxml->description;
														if(strlen($description)>173)
														{
														$description = substr($newthisweekxml->description,0,170);
														$description.="....";
														}
														else
														{
														$description = $newthisweekxml->description;
														}
									echo $description;

					//echo substr($newthisweekxml->description,0,120); ?> </span></div>
                    <div class="clr"></div>
							</div>
            </div>
				<?php /*echo CHtml::link('Read More', CController::createUrl("artist/artistdetail/id/".$newthisweekxml->artistId)
				,array('class'=>'readmore mt5')); */?>
				
				<?php echo CHtml::link('Read More', $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$newthisweekxml->artistName),'id' => $newthisweekxml->artistId)), array('class' => 'readmore mt5')); ?>
        
        </div>
        <div class="clr"></div>
</div>	
		<?php //print_r($_SESSION); ?>