<?php  $this->pageTitle = $news[0]['Press_News_Title'] ." | " . " ArtistAloud.com";?>

<?php
$error='';
$minval = min($id_array);
$maxval = max($id_array);
$index = array_search($id, $id_array);
$prev_index = $index-1;
$prev_id = $id_array[$prev_index];
$next_index = $index;
$next_id = $id_array[$next_index]+1;
?>
					<div class="content-left fl">
					
						<div class="breadcrumb grey99 fnt11">
						<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
						<?php echo CHtml::link('News Listing', CController::createUrl("news/allnews"), array('class' => 'breadcrumb grey99 fnt11'));?> &#x21d2;
						<?php echo $news[0]['Press_News_Title']; ?>	
						</div>

                     <div class="page-title mt10 bdrbtm">
                        <h2 class="page-title-block fl">All News</h2>
                        <div class="share-elements fr">
                         <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                        </div>
                    <div class="clr"></div>
                    </div>
                    
                    <div class="page-title pt10 pb10 bdrbtm">
                      	<div class="news-nav"><?php echo CHtml::link('Back to News', CController::createUrl("news/allnews"),array('class'=>'back orange fl')); ?> <img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/sep.gif" alt="" class="fl ml10 mr10" />
												<?php
												if($id>$minval)
												{
											echo CHtml::link(''.'Previous', CController::createUrl("news/details/id/".$prev_id), array('class'=>'orange fl'));
												?>
											<span class="grey99 ml10 mr10 fl">|</span> 
												<?php

												}
												
												if($id<$maxval)
												{
echo CHtml::link(''.'Next', CController::createUrl("news/details/id/".$next_id), array('class'=>'orange fl'));
												}
												?>
					  <?php //echo CHtml::link('Previous', CController::createUrl("news/details?id=".$news[$i]['Press_id']), array('class'=>'orange fl')); ?>
					  
                        </div>  <div class="clr"></div>
                    </div>
                    
					<?php
						foreach($news as $row)
					{
					$time=strtotime($row['Press_News_Date']);
					?>
					
                    <div class="artist-title mt10">
                        <h2 class="news-title-block font-mole fl"><?php echo $row['Press_News_Title']; ?></h2>
                        <div class="clr"></div>
                         <div class="info font-mole fnt16"><?php echo date('dS',$time)." ".date('F',$time)." ".date('y',$time); ?> | <?php echo $row['Press_News_Source']; ?></div>
                    <div class="clr"></div>
                    </div>
                   
                    <div class="news-content grey99">
                    
                   <!-- <img src="<?php //echo Yii::app()->theme->baseUrl;  ?>/images/temp/pic.gif" alt="" align="left" />-->
                    
                    <p><?php echo $row['Press_News_Content']; ?></p>
                    </div>
                    
					<?php } ?>
					
		<div class="artist-comment wd628 ">
      <h2 class="comment-title">Comments</h2>
	  
	    <?php
				/* code for displaying success msg after login */
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
				?>
				 
				<?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="flash-success font-mole" style="background:#FFFFFF; font-size:15px; color:#FF0000; width:99.3%; line-height:25px; padding:5px;">
						<?php echo Yii::app()->user->getFlash('success'); ?>
					</div>
				<?php endif; 
				/* Code for Success msg ends here */
				?>
      <div class="add-comments pt10">
        <div class="fl pl5"><span>Add Comments:</span></div>
        <div class="fl pl15 pb10" style="width:510px;">

          <?php
          $form = $this->beginWidget('CActiveForm', array(
              'id' => 'comment-form',
              'enableClientValidation' => true,
              'clientOptions' => array(
              'validateOnSubmit' => true,
              'enableAjaxValidation' => true,
              ),
              ));
          ?>
          <?php //echo $form->errorSummary($model);  ?>
          <?php echo $form->textArea($model, 'comment', array('class' => "art-textbox")); ?>
          <?php echo $form->error($model, 'comment'); ?>
          <br/><br/>
          
          <div class="row fl">
			<?php echo CHtml::submitButton('Submit'); ?>
          </div>
          
		  <?php if (CCaptcha::checkRequirements()): ?>
            <div class="row fr" style="width:435px;">
              <?php //echo $form->labelEx($model, 'verifyCode'); ?>
              <div>
                <?php $this->widget('CCaptcha'); ?>
                 <div class="CL"></div>
                <div class="fl"><?php echo $form->textField($model, 'verifyCode'); ?></div>
				<div class="hint fr" style="width:280px;">Are you human?? Yes. Then type that code.</div>
				<?php echo $error; ?>
              </div>

            </div>
          <?php endif; ?>
          
          <?php $this->endWidget(); ?>
        </div>
        <div class="clr"></div>
        <div class="extra-comments fl ">
          <?php
          $i = 1;
          if (isset($commentArr) && count($commentArr) > 0) {

            foreach ($commentArr as $key => $value) {
              ?>
              <div class="artist-border1">
                <div class="commarrow  fl">
                  <div class="fl"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/FallBack_Artist_50x50.gif"></div>
                  <div class="fl pl5 ">
										<strong>
                      <?php
                      if ($value['user_id'] == 0)
                        echo "Anonymous";
                      else {
					  
					  
					  $username=Yii::app()->db->createCommand()
										->select('*')
										->from('tbl_user_profile')
										->where('USER_ID=:user_id',array(':user_id'=>$value['user_id']))
										->queryAll();
										
										echo $username[0]['NICK_NAME'];
					  
					  /*
                        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $value['user_id'] . ".xml")) {
                          $userxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $value['user_id'] . ".xml");
                          echo $userxml->artistName;
                        }
						*/
                      }
                      ?>
                    </strong></div><br/>
                  <div class="fl pl5 pt10"><?php
                  $time = $value['indate'];
                  $dt = date("jS M", $time);
                  echo $dt . " | " . date("H.i", $time);
              ?><!--25th Feb | 04.46 --></div><br/>
                </div>
                <div class="fl pt20"><?php echo $value['comment']; ?></div>
              </div>
              <div class="clr"></div>
              <?php
              $i++;
            }
          }
          ?>

        </div>

      </div>
    </div>

             
                     <?php //include 'comment.php'; ?>
            	</div>