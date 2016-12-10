<?php $this->breadcrumbs=array('Findmusic',);?>

<?php  $this->pageTitle = " Independent Artists " ." | Music Artists India " ." | Artist Profiles " ." | Independent Music in India - "
	." Find Music "; ?>
	
	<div class="breadcrumb grey99 fnt11">
		<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
		Find Music
	</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Find Music</h2>
                <div class="clr"></div>
                </div>
               
                <div class="clr"></div>
                <!--Sample texts goes here-->
				
				ArtistAloud Artist Content also available on:
				
                <div class="spacer20">&nbsp;</div>
	
	<style>.bt_line_fff{border-bottom:1px solid #FFF;}</style>
    
			<?php
				// echo "<pre>";
				// echo count($findmusic->firstone);exit;
				// print_r($findmusic);exit;
			?>
	
	
			<?php
					
					if(count($findmusic->firstone)>0)
					{
				$total=count($findmusic->firstone);
				
			for($i=0;$i<count($findmusic->firstone);$i++) { ?>
			
                    <div class="row">
						<div class="fl">
						
						<?php if(strlen($findmusic->firstone[$i]->profileimage)>0) { ?>
						<img src="<?php echo $findmusic->firstone[$i]->profileimage ; ?>" />
						<?php } else { ?>
						<img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>" />
						<?php } ?>
						</div>
                        <div class="fl ml15 wd410">
                        	<div class="orange fnt16 bt_line pb10">Buy Online Via</div>
                            <div class="mt10">
                            	
								<?php if(isset($findmusic->firstone[$i]->hungamalink) && strlen($findmusic->firstone[$i]->hungamalink)!='') { ?>
								
								<div class="fl"><a href="<?php if(isset($findmusic->firstone[$i]->hungamalink)) {echo $findmusic->firstone[$i]->hungamalink;} ?>" target="_blank"><img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/temp/hun.gif"; ?>" /></a></div>
                                
								<?php } ?>
								
								<?php if(isset($findmusic->firstone[$i]->ovilink) && strlen($findmusic->firstone[$i]->ovilink)!='')  {?>
								
								<div class="fl"><a href="<?php if(isset($findmusic->firstone[$i]->ovilink)) {echo $findmusic->firstone[$i]->ovilink; }?>" target="_blank"><img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/temp/ovi.gif"; ?>" /></a></div>
                                
								<?php } ?>
								
								<?php if(isset($findmusic->firstone[$i]->itunelink) && strlen($findmusic->firstone[$i]->itunelink)!='')  {?>
								
								<div class="fl"><a href="<?php if(isset($findmusic->firstone[$i]->itunelink)) {echo $findmusic->firstone[$i]->itunelink;} ?>" target="_blank"><img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/temp/itunes.gif"; ?>" /></a></div>
									
								<?php } ?>	

						   <div class="clr"></div>
                            </div>
                            <div class="orange fnt16 bt_line pb10 mt10"><!--Download on -->Mobile</div>
          <div class="mt10" style="line-height:28px; padding-left:25px; height:30px; background: no-repeat left center url(<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/mobile_ico.gif"; ?>); color:#999999;">
          	<?php if(isset($findmusic->firstone[$i]->smslink)) {echo $findmusic->firstone[$i]->smslink;} ?>
          </div>
                        </div>
					</div>
                    
					
					<?php if(($total-1)==$i) { ?>


					<div class="spacer10">&nbsp;</div>
                    <div class="clr">&nbsp;</div>
                    <div class="spacer10">&nbsp;</div>
							
					<?php } else { ?>
							
                    <div class="spacer10">&nbsp;</div>
                    <div class="clr bt_line_fff">&nbsp;</div>
                    <div class="spacer10">&nbsp;</div>
					
					<?php } ?>

			<?php }//end of for loop

				} //end of if condition
			?>				
                    
                    
                   

