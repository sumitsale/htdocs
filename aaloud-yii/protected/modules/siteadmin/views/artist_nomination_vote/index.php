<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-nomination-vote',
	'enableAjaxValidation'=>false,
)); ?>
<table>
	<tr>
		<td>Genre</td>
		<td>
		<?php echo $form->dropDownList($model,'GENERE',array('Pop'=>'Pop','Rock'=>'Rock','Alternative'=>'Alternative','Global '=>'Global','Final'=>'Final'),array('prompt' => 'Select One')); ?>

		</td>
	</tr>

	<tr>
		<td>
		 <?php echo CHtml::button('Submit', array('submit' => array('Artist_nomination_vote/search'))); ?>  
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
		</td>
		<td>
		<?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>



</table>
<?php $this->endWidget(); ?>