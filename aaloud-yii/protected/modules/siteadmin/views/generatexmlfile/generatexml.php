<div class="form">

 			<?php 
			
			//echo "<pre>";
			//rint_r($tableArray);exit;
			
			
			
			Yii::app()->clientScript->registerScript(
			'myHideEffect',
			'$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
			CClientScript::POS_READY
			);
			if(Yii::app()->user->hasFlash('success')):?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
			<?php endif; ?>



<?php  $this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
));  ?>


  <table>
	<?php
	foreach($tableArray as $id=>$val)
	{
		?><tr>
			<td>
		<p class="check"><span>
		<input type="checkbox" name="pages[]" value="<?php echo $id; ?>">
		</span> 
		</td><td>
		<label><?php echo $val['display']; ?></label></p></br>
		</td></tr>
		<?php
	}
	
	?>

	<tr>
		<td>
		 <?php echo CHtml::button('submit', array('submit' => array('Generatexmlfile/generatexml'))); ?>   
		</td>
	</tr>
  </table>
<?php $this->endWidget(); ?>

</div>