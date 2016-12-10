		<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feature-form',
	'enableAjaxValidation'=>false,
)); ?>
		
		<?php
/* code for displaying success msg after login */
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; 
/* Code for Success msg ends here */
?>
		
		<table width="100%">
	
		<tr>
			<td>Select Content Type</td>
			<td>
			<?php 
			$contentarray = array(
			0=>array('Id'=>1,'content'=>'Full Songs'),
			1=>array('Id'=>999,'content'=>'Ringtones'),
			2=>array('Id'=>3,'content'=>'Wallpapers')
			);
			echo $form->dropDownList($model,'CONTENT_TYPE_ID',CHtml::listData($contentarray,'Id','content')); ?>
			</td>
			<td> <?php echo CHtml::button('Go ', array('submit' => array('Feature/searchcont'))); ?></td>
		</tr>
	
	
		</table>
	
		<?php $this->endWidget(); ?>
	<br>
	<br>
	

	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feature1-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	
	<table width="100%">
	
			<?php for($i=0;$i<count($model_artist);$i++)
			{
			?>
			<tr>
				
			
					
					<td class="vivpadlr">
					<?php if(in_array($model_artist[$i]['Artist_Id'],$featurearray))
					{ ?>
					<input type="checkbox" name="artistid[]" checked='checked' value="<?php echo $model_artist[$i]['Artist_Id']; ?>">
					<?php } else { ?>
					<input type="checkbox" name="artistid[]" value="<?php echo $model_artist[$i]['Artist_Id']; ?>"></td>
					<?php } ?>
					
					
					
					
					
					
					<?php
					
					/*
if(in_array($model_artist[$i]['Artist_Id'],$featurearray))
{
echo $form->checkBox($wap,'artistid[]',  array('value'=>$model_artist[$i]['Artist_Id'],'checked'=>'checked','uncheckValue' => null,));
}
else
{
echo $form->checkBox($wap,'artistid[]',  array('value'=>$model_artist[$i]['Artist_Id'],'uncheckValue' => null,));
}
*/
 ?>
					
					
					
					
					
					
				
					<td><?php echo $model_artist[$i]['Artist_Name']; ?>
					
					</td>
			<tr>
			
			
			<?php } ?>
	
	
			
	</table>
	
	<table>
	<tr>  <?php echo CHtml::button('Update ', array('submit' => array('Feature/Searchcont'))); ?>
	<input type="hidden" name="cont" id="cont" value="<?php echo $contentid;?>">
	</tr>
	</table>
	
	
	
	<?php $this->endWidget(); ?>

</div><!-- form -->
	