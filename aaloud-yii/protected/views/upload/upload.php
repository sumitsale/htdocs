<div class="content-left fl">
  <div class="breadcrumb grey99 fnt11">
    <?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
    Upload your creations
  </div>

  <div class="page-title mt10">
    <h2 class="page-title-block fl">Upload your creations</h2>

    <div class="clr"></div>
  </div>
  <div>
    <h2 class="upload-block font-mole">You've made a song? Upload it!</h2>
    <div class="clr"></div>
  </div>

  <div class="grey99">
    <p>Maximum size of file to be uploaded should be 10 MB.</p>
    <div class="clr"></div>
  </div>
			  <?php
			  /* code for displaying success msg after login */
			  Yii::app()->clientScript->registerScript(
					  'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");', CClientScript::POS_READY
			  );
			  ?>

			  <?php if (Yii::app()->user->hasFlash('success')): ?>
				<div class="flash-success font-mole" style="background:#FFFFFF; color:#FF0000; width:99.3%; font-size:20px; line-height:25px; padding:5px;">
				  <?php echo Yii::app()->user->getFlash('success'); ?>
				</div>
				<?php
			  endif;
			  /* Code for Success msg ends here */
			  ?>

  <div class="upload-form" style="position:relative;">





    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'uplad-track-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>
    <?php // echo $form->errorSummary($model);  ?>				

    <div>

	
	
      <table cellspacing="10">
        <tr>	
          <td>						
            <div class="grey99">Track Name</div>
          </td>
          <td>
            <div>
            <!--<input type="text" name="trackname" size="50" class="log_input fnt11"/>-->
            <?php echo $form->textField($model, 'TRACK_NAME', array('size' => 60, 'maxlength' => 100, 'class'=>'grey99 log_input fnt11')); ?>
            </div>
          </td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td>
            <div>
              <!--<input type="file" id="myFile" name="track" class="filetype log_input fnt11" />-->
             <?php echo $form->fileField($model, 'TRACK_FILE', array('size' => 50, 'maxlength' => 50, 'class'=>'grey99 log_input fnt11')); ?>
            </div>
          </td>
        </tr>
      </table>
			
      <div class="clr"></div>
			
    </div>
    <div class="grey99">
      <p>www.artistaloud.com is a premium destination for music. All music on the site is handpicked by our
team. <br /> The tracks uploaded by you would NOT be shared/misused.
      </p>
    </div>
    <div class="grey99">
      <p>Please read the term and conditions below.</p>
      <div class="clr"></div>
    </div>
    <div>
      <div class="fl"> 
        <input type="checkbox" name="tc" value="tc" id="checkbox1" checked="checked"/>
      </div>
      <div class="fl pl10 grey99">
      I agree to the <a class="grey99 tc" href="#tandc" rel="t_and_c">Terms and Conditions.</a>
      </div>
    </div>
    <div class="clr"></div>
    <div class="pt10">

      <div id="pleaseWait"
           style="position: absolute; display: none; left: 75px; top: 183px; width: 140px; height: 60px; text-align: center;">
        <img src="<?php echo Yii::app()->baseUrl . "/images/ajax-loader.gif"; ?>" alt="Please Wait" /> 
      </div>


      <a href="#" id="trackUploadSubmit">
        <div class="next-img">Submit</div></a>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('style' => 'display:none')); ?>


    </div>
    <?php $this->endWidget(); ?>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#trackUploadSubmit .next-img").unbind('click', function(){});
      $("#trackUploadSubmit .next-img").click(function(){
	  
      var filename = $('#userartisttracks_TRACK_NAME').val();
      var filetrack =  $('#userartisttracks_TRACK_FILE').val();
	    var value= $('#checkbox1').val();
			
			
		
		if(!($("#checkbox1").is(':checked')))
		{
		alert('Please check Terms and Conditions');
		return false;
		}
		
		
		
        if(filename=='')
        {
          alert('Please Enter File Name.');
          return false;
        }
						
        if(filetrack=='')
        {
          alert('Please Select File to be uploaded.');
          return false;
        }
			
			
        if(filetrack!='')
        {
          if(/.*\.(mp3)$/.test(filetrack.toLowerCase()))
          {
            document.getElementById('pleaseWait').style.display='block';
            $("#uplad-track-form").submit(); 
            return false; 
          }
          else
          {
            alert('Please select Only mp3 Files for uploading');
            return false;
          }
						
        }
						
				return false;		
        document.getElementById('pleaseWait').style.display='block';
        $("#uplad-track-form").submit(); 
        return false; 
      }); 
    });
  </script>

</div>

<div id="tandc" class="hide">

	<div class="tcncont">
    <strong>PLEASE COPY THIS AGREEMENT, ADD YOUR NAME AND EMAIL TO mail@artistaloud.com</strong>
    <p>&nbsp; </p>
    <p>I acknowledge that Hungama Digital Media Entertainment Private Limited (&quot;<strong>HUNGAMA</strong>&quot;) owns a portal in the name and style as &quot;artistaloud.com&quot; and is responsible for the contents on the said website and I am the Artist, (&quot;<strong>ARTIST</strong>&quot;) having valid copyright for the contents and authority to exploit the contents for monetary gain.  I hereby authorize Hungama to sale, reproduce, distribute or market (with or without accompanying artwork) by digital &quot;on line&quot; means or via digital platform download reproductions of the audio and audio visual contents on all vectors including mobile device, Internet and DTH.</p>
    <p>1. The Term shall start on the date hereof and shall continue until the written notice of termination exchanged by any of us.  Hungama reserves the right to suspend or withdraw (permanently or temporarily) the Contents which Hungama reasonably believe are subject to or may give rise to third party claims.  The Contents are sold to customers of artistaloud.com on the Hungama's standard terms as may be from time to time.</p>
    <p>2. I hereby authorize unlimited worldwide rights to Hungama for commercial exploitation of the Contents.</p>
    <p>3. I shall provide Hungama with recordings of Contents on CD or DVD in the WAV format required for audio and in AVI DV PAL for video and Hungama shall be responsible at its cost for encoding into appropriate formats for electronic or other delivery on its website artistalound.com or any of Hungama's affiliates website.  If I provide recordings in any other formats other than CD or DVD this will be subject to mutual agreement.  I shall in addition supply to Hungama details of the authors and composers of the musical compositions and performers embodied on the Masters and details of music publishers (if any).  I shall also provide to Hungama artwork and (to the extent available) photographs and promotional material for use in promoting the Contents.</p>
    <p>4. Hungama will be entitled to use and authorize the use of sixty (60) seconds streamed clips with the name and likeness of producers etc. for promotional purposes.</p>
    <p>5. I shall receive revenue share @ 35%, from the revenue received from exploitation of the Content after deducting all expenses, taxes, duties and levies required for and arising out of the exploitation of the Artist Content on Internet, Mobile and DTH. <strong>Net Revenue = End User Price less Operator share less applicable taxes</strong>. For extract up to 60 seconds used for the purpose of promotions, no royalty payout and aggregation charges shall be paid by Hungama.</p>
    <p>6. Hungama shall provide a complete account of all downloads of the Contents on a quarterly basis and settle the accounts on a quarterly basis; Hungama shall make payments within 15 days of receipt of my Invoice.</p>
    <p>7. I warrant that I have the right to enter into this Agreement and to grant the right to the Licensed Contents and other Metadata and that the Licensed Contents do not and will not infringe the rights of any third parties and I indemnify Hungama against any costs, claims or damages from any third parties arising from the use and resale of the Licensed Contents and Metadata hereunder. </p>   
I Agree
<p>&nbsp; </p>
(Name of the Artist)
</div>
    </div>