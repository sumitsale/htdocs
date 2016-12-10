<div class="form">


<script language="Javascript" type="text/javascript">
	function toggleCodeUpload(val)
	{
		if(val=='Code')
		{
			document.getElementById('banner_text').disabled = '';
			document.getElementById('flImage').disabled = 'disabled';
		}
		else if(val=='Upload')
		{
			document.getElementById('banner_text').disabled = 'disabled';
			document.getElementById('flImage').disabled = '';
		}
	}
		
		</script>





<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
		<?php    
                  for($i=0;$i<count($row1);$i++)
                  {
                
                      if($i == 0)
                                    {
                                        $banner_id = $row1[$i]['BANNER_ID'];
									    $banner_text = $row1[$i]['BANNER_TEXT'];
                                        $redirect_url = $row1[$i]['BANNER_REDIRECT_URL'];
                                        $banner_status = $row1[$i]['BANNER_STATUS'];
                                    }
                                    if($i == 1)
                                    {
                                        $banner_id1 = $row1[$i]['BANNER_ID'];
                                        $banner_text1 = $row1[$i]['BANNER_TEXT'];
                                        $redirect_url1 = $row1[$i]['BANNER_REDIRECT_URL'];
                                        $banner_status1 = $row1[$i]['BANNER_STATUS'];
                                    }
                                    if($i == 2)
                                    {
                                        $banner_id2 = $row1[$i]['BANNER_ID'];
                                        $banner_text2 = $row1[$i]['BANNER_TEXT'];
                                        $redirect_url2 = $row1[$i]['BANNER_REDIRECT_URL'];
                                        $banner_status2 = $row1[$i]['BANNER_STATUS'];
                                    }
               
                  }
				  
				 
         ?>
         
         <?php 
		 		 for($i=0;$i<count($row);$i++)
				 {
						$module= $row[$i]['LOCATION'];
						$title= $row[$i]['BANNER_MODULE'];
						$width_height = $row[$i]['BANNER_TITLE'].' * '.$row[$i]['BANNER_WIDTH'];
				 }
				
		 ?>
         
         
     
				<input type="hidden" name="banner_id" value="<?php echo $banner_id; ?>">
               
  				<input type="hidden" name="banner_id1" value="<?php echo $banner_id1; ?>">
                
                 <input type="hidden" name="banner_id2" value="<?php echo $banner_id2; ?>">
         

         
         
         
<table with="100%">


		<tr>
        
				<td><?php echo "Module :"; ?></td>
                <td><?php echo $form->textField($model1,'LOCATION',array('size'=>50,'maxlength'=>50,'value'=>$module));?>
                </td>
        </tr>
        
        <tr>
        		<td> <?php echo "Title :"; ?> </td>
                  <td><?php echo $form->textField($model1,'BANNER_MODULE',array('size'=>50,'maxlength'=>50,'value'=>$title));?>
                </td>
        </tr>
        
        
          <tr>
        		<td> <?php echo "Title :"; ?> </td>
                  <td><?php echo $form->textField($model1,'BANNER_TITLE',array('size'=>50,'maxlength'=>50,'value'=>$width_height));?>
                </td>
        </tr>
        
        <tr colspan="3">
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
						echo $form->textField($model2,'BANNER_TEXT',array('size'=>50,'maxlength'=>50,'value'=>$banner_text));
				  ?>
                </td>
        </tr>
    
        
      
         
<tr id="flImage">
         <td>  Upload Image:</td>
         <td> <?php echo CHtml::fileField('User[image]', '', array('size'=>25,'maxlength'=>50)); ?> </td>

</tr

        
        
        
         ><tr>
        		<td> <?php echo "Redirecting URL:"; ?> </td>
                  <td><?php echo $form->textField($model2,'BANNER_REDIRECT_URL',array('size'=>50,'maxlength'=>50,'value'=>$redirect_url));?>
                </td>
        </tr>
        
        
         <tr>
        		<td> <?php echo "Status:"; ?> </td>
                  <td><?php echo $form->dropDownList($model2,'BANNER_STATUS',array('1'=>'show','0'=>'hide'));?>
                </td>
        </tr>
        
                   
        				<tr colspan="3" align="center">
                        <td><h3>SECOND BANNER</h3></td>
                        </tr>
        					
                            
                             
                            
                                    <tr colspan="3">
                                            <td>Select :</td>     
                                            <td>        
                                             <?php /*
                                            $accountStatus1 = array('1'=>'Insert Code ', '2'=>'Upload Image');
                                            echo $form->radioButtonList($model2,'BANNER_STATUS',$accountStatus1,array('separator'=>' ','onchange'=>																	                                             'javascript:yourExternalJsFunction();'));
                                            */?>
                                            
                                            <input type="radio" name="rd_select1" value="Code" id="rd_Code" checked="checked" onchange=              									"toggleCodeUpload1(this.value)" />Insert Code &nbsp;
                                             <input type="radio" name="rd_select1" value="Upload" id="rd_Upload" onchange=		 	    			                                                 "toggleCodeUpload2(this.value)" />Upload Image
                                            
                                            
                                            
                                            
                                            </td>
                                    </tr>
                                    
                                    
                                    
                                    <tr id="bannercode">
                                            <td> <?php echo "Banner Code:"; ?> </td>
                                            
                                              <td>
                                              <?php 
                                                    echo CHtml::textField('User[bannercode1]','',array('size'=>50,'maxlength'=>50,'value'=>$banner_text1));
                                              ?>
                                            </td>
                                    </tr>
                                    
                            	      <tr>
     									    <td>  Upload Image:</td>
        									 <td> <?php echo CHtml::fileField('User[image1]', '', array('size'=>25,'maxlength'=>50)); ?> </td>

                                 	   </tr>

                                    
                                    
                                    
                                    
                                    
                                     <tr>
                                            <td> <?php echo "Redirecting URL:"; ?> </td>
                                              <td><?php echo CHtml::textField('User[redurl1]','',array('size'=>50,'maxlength'=>50));?>
                                            </td>
                                    </tr>
                                    
                                    
                                     <tr>
                                            <td> <?php echo "Status:"; ?> </td>
                                              <td><?php echo  CHtml::dropDownList('User[status1]','',array('0'=>'hide','1'=>'show',));?>
                                            </td>
                                    </tr>
                                    						
                                                            
                                                            
                                                            <tr colspan="3" align="center">
                        									<td><h3>THIRD BANNER</h3></td>
                       										</tr>
        														
                                                            
                                                                
                                                                
                                                            <tr colspan="3">
                                                                <td>Select :</td>     
                                                                <td>        
                                                                 <?php /*
                                                                $accountStatus2 = array('1'=>'Insert Code ', '2'=>'Upload Image');
                                                                echo $form->radioButtonList($model2,'BANNER_STATUS',$accountStatus2,array('separator'=>' '
																));
                                                                */ ?>
                                                                
                                                                
                                                                
                                                                
                                                                <input type="radio" name="rd_select2" value="Code" id="rd_Code" checked="checked" onchange="toggleCodeUpload3(this.value)" />Insert Code &nbsp; <input type="radio" name="rd_select2" value="Upload" id="rd_Upload" onchange="toggleCodeUpload3(this.value)" />Upload Image
                                                                </td>
                                                        </tr>
                                                        
                                                        
                                                        
                                                        <tr id="bannercode">
                                                                <td> <?php echo "Banner Code:"; ?> </td>
                                                                
                                                                  <td>
                                                                  <?php 
                                                                        echo CHtml::textField('User[bannercode2]','',array('size'=>50,'maxlength'=>50,'value'=>$banner_text2));
                                                                  ?>
                                                                </td>
                                                        </tr>
                                                        
                                                       <tr>
     									    <td>  Upload Image:</td>
        									 <td> <?php echo CHtml::fileField('User[image2]', '', array('size'=>25,'maxlength'=>50)); ?> </td>

                                 	   </tr>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                         <tr>
                                                                <td> <?php echo "Redirecting URL:"; ?> </td>
                                                                  <td><?php echo CHtml::textField('User[redurl2]','',array('size'=>50,'maxlength'=>50));?>
                                                                </td>
                                                        </tr>
                                                        
                                                        
                                                         <tr>
                                                                <td> <?php echo "Status:"; ?> </td>
                                                                  <td><?php echo  CHtml::dropDownList('User[status2]','',array('0'=>'hide','1'=>'show',));?>
                                                                </td>
                                                        </tr>
                                                                              
                                                                                    
                                                                
        
        			<tr>
					<td><?php echo CHtml::submitButton($model2->isNewRecord ? 'submit' : 'Save'); ?><td>	
		        	</tr>
			
                
                
        
</table>	
	
	
	
	  <?php $this->endWidget(); ?>
 </div><!-- form -->
	
	
	
	
	
	<?php /*


<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	<?php echo $form->errorSummary($model); ?>
<table>

	<tr>
		<td colspan="3"><b>Update Banner</b></td>
	</tr>

	

	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td>  </td>
	</tr> 
	

	

	<tr>  		
		<td><?php echo $form->labelEx($model,'Module :'); ?></td>
		<td><?php echo $form->textField($model,'LOCATION',array('size'=>30,'maxlength'=>100)); ?>
		 <?php echo $form->error($model,'LOCATION'); ?>
		</td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Title :'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_TITLE',array('size'=>30,'maxlength'=>100)); ?>
		 <?php echo $form->error($model,'BANNER_TITLE'); ?>
		</td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Select :'); ?></td>
		<td>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'1')) . 'Insert Code'; ?>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'2')) . 'Upload Image'; ?>
		</td>
			<?php echo $form->error($model,'QUERY_TYPE'); ?>
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Banner Code :'); ?></td>
		<td><?php echo $form->textarea($model,'BANNER_TEXT',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_TEXT'); ?>
		</td>
		
		
    </tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Upload Image :'); ?></td>
		<td><?php echo $form->fileField($model,'THEME_IMAGE',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'THEME_IMAGE'); ?>
		</td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Redirecting URL :'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_REDIRECT_URL',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_REDIRECT_URL'); ?>
		</td> 
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Status :'); ?></td>
		<td><?php echo $form->dropDownList($model,'BANNER_STATUS', array('1'=>'Show','0'=>'Hide')); ?> </td>
    </tr>
	
	
	<tr>
		<td align="center"><strong>SECOND BANNER</strong></td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Select :'); ?></td>
		<td>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'1')) . 'Insert Code'; ?>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'2')) . 'Upload Image'; ?>
		</td>
			<?php echo $form->error($model,'QUERY_TYPE'); ?>
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Banner Code :'); ?></td>
		<td><?php echo $form->textarea($model,'BANNER_TEXT',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_TEXT'); ?>
		</td>
		
		
    </tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Upload Image :'); ?></td>
		<td><?php echo $form->fileField($model,'THEME_IMAGE',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'THEME_IMAGE'); ?>
		</td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Redirecting URL :'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_REDIRECT_URL',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_REDIRECT_URL'); ?>
		</td> 
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Status :'); ?></td>
		<td><?php echo $form->dropDownList($model,'BANNER_STATUS', array('1'=>'Show','0'=>'Hide')); ?> </td>
    </tr>
	
	<tr>
		<td align="center"><strong>THIRD BANNER</strong></td>
	</tr>
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Select :'); ?></td>
		<td>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'1')) . 'Insert Code'; ?>
			<?php echo $form->radioButton($model,'QUERY_TYPE',array('value'=>'2')) . 'Upload Image'; ?>
		</td>
			<?php echo $form->error($model,'QUERY_TYPE'); ?>
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Banner Code :'); ?></td>
		<td><?php echo $form->textarea($model,'BANNER_TEXT',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_TEXT'); ?>
		</td>
		
		
    </tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Upload Image :'); ?></td>
		<td><?php echo $form->fileField($model,'THEME_IMAGE',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'THEME_IMAGE'); ?>
		</td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Redirecting URL :'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_REDIRECT_URL',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_REDIRECT_URL'); ?>
		</td> 
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Status :'); ?></td>
		<td><?php echo $form->dropDownList($model,'BANNER_STATUS', array('1'=>'Show','0'=>'Hide')); ?> </td>
    </tr>
	
	
	

    <tr><td colspan=3>&nbsp;</td>
		
	</tr> 


    <tr>
		<td>
		<td> </td>  		
		<?php echo CHtml::submitButton($model->isNewRecord ? ' Submit ' : 'Proceed'); ?> 
		</td>
	</tr>
		

	
		
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->
 
 */	?>