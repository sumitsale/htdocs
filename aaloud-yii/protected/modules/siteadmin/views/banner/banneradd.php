<div class="form">


<script language="Javascript" type="text/javascript">
	function toggleCodeUpload(val)
	{
	
		if(val=='Code')
		{
			//document.getElementById('banner_text').style.display = "none";
			//document.getElementById('flImage').style.display = "block" ;
		}
		else if(val=='Upload')
		{
			//document.getElementById('banner_text').style.display = 'none';
			//document.getElementById('flImage').style.display  = 'block';
		}
	}
		
		</script>

<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>




<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php   /* 
                  for($i=0;$i<count($row1);$i++)
                  {
                
                                        $banner_id = $row1[$i]['BANNER_ID'];
																				$banner_text = $row1[$i]['BANNER_TEXT'];
                                        $redirect_url = $row1[$i]['BANNER_REDIRECT_URL'];
                                        $banner_status = $row1[$i]['BANNER_STATUS'];
                                   
               
                  }
				  
				
          echo count($row);
		 		 for($i=0;$i<count($row);$i++)
				 {
						$module= $row[$i]['LOCATION'];
						$title= $row[$i]['BANNER_MODULE'];
						$width_height = $row[$i]['BANNER_TITLE'];
				 }
				 */
		 ?>
		 
		 <script type="text/javascript">
		 function toggleCodeUpload(val)
	{
		if(val=='Code')
		{
			document.getElementById('TblBannerStorefront_BANNER_TEXT').disabled = '';
			document.getElementById('User_image').disabled = 'disabled';
		}
		else if(val=='Upload')
		{
			document.getElementById('TblBannerStorefront_BANNER_TEXT').disabled = 'disabled';
			document.getElementById('User_image').disabled = '';
		}
	}
</script>
         
         
     
         

         
     	<?php echo $form->errorSummary($model1); ?>    
         
<table with="100%">





<tr>
        
				<td><?php echo "Location :"; ?></td>
                <td><?php echo $form->textField($model1,'LOCATION',array('size'=>50,'maxlength'=>100));?>
				
                </td>
        </tr>
		<tr>
        
				<td><?php echo "Module :"; ?></td>
                <td><?php echo $form->textField($model1,'BANNER_MODULE',array('size'=>50,'maxlength'=>100));?>
                </td>
        </tr>
        
        <tr>
        		<td> <?php echo "Title :"; ?> </td>
                  <td><?php echo $form->textField($model1,'BANNER_TITLE',array('size'=>50,'maxlength'=>100));?>
                </td>
        </tr>
        
        
          <tr>
        		<td> <?php echo "Width"; ?> </td>
                  <td><?php echo $form->textField($model1,'BANNER_WIDTH',array('size'=>50,'maxlength'=>100));?>
                </td>
        </tr>
		 <tr>
        		<td> <?php echo "Height :"; ?> </td>
                  <td><?php echo $form->textField($model1,'BANNER_HEIGHT',array('size'=>50,'maxlength'=>100));?>
                </td>
        </tr>
        
        <tr>
				<td>Select :</td>     
                <td>        
            
                
                <input type="radio" name="rd_select" value="Code" id="rd_Code" checked="checked" onchange="toggleCodeUpload(this.value)" />Insert                 Code &nbsp; 
                <input type="radio" name="rd_select" value="Upload" id="rd_Upload" onchange="toggleCodeUpload(this.value)" />Upload Image
                
                </td>
        </tr>
        
        
        
        <tr id="banner_text">
        		<td> <?php echo "Banner Code:"; ?> </td>
                
                  <td>
                  <?php 
						echo $form->textArea($model2,'BANNER_TEXT',array('size'=>100,'maxlength'=>1000));
				  ?>
                </td>
        </tr>
    
        
      
         
<tr id="flImage">
         <td>  Upload Image:</td>
				
         <td> <?php echo CHtml::fileField('User[image]', '', array('size'=>25,'maxlength'=>50)); ?>
				
					
				 </td>

</tr><tr>
        		<td> <?php echo "Redirecting URL:"; ?> </td>
                  <td><?php echo $form->textField($model2,'BANNER_REDIRECT_URL',array('size'=>50,'maxlength'=>100));?>
                </td>
        </tr>
        
        
         <tr>
        		<td> <?php echo "Status:"; ?> </td>
                  <td><?php echo $form->dropDownList($model2,'BANNER_STATUS',array('1'=>'show','0'=>'hide'));?>
                </td>
        </tr>
                        
                                                                
        
        			<tr>
					<td colspan='2'>
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
					<?php echo CHtml::submitButton($model2->isNewRecord ? 'submit' : 'Save'); ?><td>	
		        	</tr>
			
                
                
        
</table>	
	
	
	
	  <?php $this->endWidget(); ?>
 </div><!-- form -->
	