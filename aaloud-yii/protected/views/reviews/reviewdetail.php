<div class="content-left fl">
					<div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Review Details
					</div>
                     <div class="page-title mt10 bdrbtm">
                        <h2 class="page-title-block fl">Song Review</h2>
                        <div class="share-elements fr"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/share.gif" alt="" /></div>
                    <div class="clr"></div>
                    </div>
                
				<div>
                <div class="artist-title mt10 fl">
                        <h2 class="news-title-block font-mole fl">"Yaaro jashn manao"</h2>
                        <div class="clr"></div>
                         <div class="info font-mole fnt16">By Kailash Kher</div>
                    <div class="clr"></div>
                    </div>
				<div class="fr pt15">
					<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/bsi.jpg" /></a>
				</div>
                </div>
					<div class="clr"></div>
					
                    <div class="news-content grey99">
                    
                    <img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/rev-details.jpg" alt="" align="left" />
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec diam eu enim sodales feugiat vel in nulla. Integer commodo, </p>
                    <p>tortor sed eleifend gravida, augue massa tempus diam, eu tincidunt libero est eget lacus. Donec suscipit dui in tortor condimentum dictum. Nulla consectetur eleifend magna ut euismod.Nullam pretium lacinia dolor vitae auctor. Integer nisi leo, vestibulum in venenatis eu, lacinia eget arcu. Praesent malesuada, nulla sed dapibus sagittis, elit tortor placerat dui, ac ultricies dolor quam sollicitudin risus.</p>
                    <p>Praesent eget placerat sem. Morbi porta, est eget volutpat mattis, augue felis pellentesque nibh, vitae pellentesque augue mi non lectus. Nunc accumsan sagittis turpis, ut tempus metus tristique </p>
                    <p>Mauris gravida diam in orci accumsan imperdiet. Nulla facilisi. Cras augue urna, mattis vel venenatis eu, placerat eget elit. Quisque a sapien enim, vitae vehicula turpis. Curabitur lobortis aliquam lectus. Integer suscipit odio molestie libero cursus ultrices. Nulla facilisi. Suspendisse potenti. Maecenas et elit nisi, non vulputate dolor. Aenean mauris libero, aliquet eu sodales ac, venenatis mattis arcu.Phasellus nec quam nec velit lobortis tristique. Curabitur metus nunc, vestibulum id vulputate eget, tempus eu mi. Nullam metus turpis, dapibus vel blandit et, pharetra vitae velit. Vestibulum id quam arcu, ut dictum purus. </p>
                    <p>Curabitur lobortis aliquam lectus. Integer suscipit odio molestie libero cursus ultrices. Nulla facilisi. Suspendisse potenti. Maecenas et elit nisi, non vulputate dolor. Aenean mauris libero, aliquet eu sodales ac, venenatis mattis arcu.Phasellus nec quam nec velit lobortis tristique. Curabitur metus nunc, vestibulum id vulputate eget, tempus eu mi. Nullam metus turpis, dapibus vel blandit et, pharetra vitae velit. Vestibulum id quam arcu, ut dictum purus.Curabitur lobortis aliquam lectus. Integer suscipit odio molestie libero cursus ultrices. Nulla facilisi. Suspendisse potenti. Maecenas et elit nisi, non vulputate dolor. Aenean mauris libero, aliquet eu sodales ac, venenatis mattis arcu.Phasellus nec quam nec velit lobortis tristique. Curabitur metus nunc, vestibulum id vulputate eget, tempus eu mi. Nullam metus turpis, dapibus vel blandit et, pharetra vitae velit. Vestibulum id quam arcu, ut dictum purus.Curabitur lobortis aliquam lectus. Integer suscipit odio molestie libero cursus ultrices. Nulla facilisi. Suspendisse potenti. Maecenas et elit nisi, non vulputate dolor. Aenean mauris libero, aliquet eu sodales ac, venenatis mattis arcu.</p>
                    <p>Phasellus nec quam nec velit lobortis tristique. Curabitur metus nunc, vestibulum id vulputate eget, tempus eu mi. Nullam metus turpis, dapibus vel blandit et, pharetra vitae velit. Vestibulum id quam arcu, ut dictum purus. Curabitur lobortis aliquam lectus. Integer suscipit odio molestie libero cursus ultrices. Nulla facilisi. Suspendisse potenti. Maecenas et elit nisi, non vulputate dolor. Aenean mauris libero, aliquet eu sodales ac, venenatis mattis arcu.Phasellus nec quam nec velit lobortis tristique. Curabitur metus nunc, vestibulum id vulputate eget, tempus eu mi. Nullam metus turpis, dapibus vel blandit et, pharetra vitae velit. Vestibulum id quam arcu, ut dictum purus. </p>
                    </div>
                    
             
                     <?php //include 'comment.php'; ?>
					 
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
            	</div>