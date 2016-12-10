<?php
/* @var $this BrandProductSpecificationController */
/* @var $model BrandProductSpecification */
/* @var $form CActiveForm */
?>

<h2>

<table >
	
	<tr>
		<td style="width:175px;">Category name :- </td>
		<td><?php echo $product_brand[0]['master_category_name']; ?></td>
	</tr>
	
	
	<tr>
		<td  style="width:175px;">Brand name :- </td>
		<td><?php echo $product_brand[0]['master_brand_name']; ?></td>
	</tr>
	
	
	<tr>
		<td  style="width:175px;">Brand product name:- </td>
		<td><?php echo $product_brand[0]['product_name']; ?></td>
	</tr>

</table>
</h2>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-product-specification-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		
		<?php echo $form->hiddenField($model,'brand_product_id',array('value'=>$product_brand_id)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_title'); ?>
		<?php echo $form->textField($model,'main_title',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'main_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_title'); ?>
		<?php echo $form->textField($model,'sub_title',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'sub_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'specification'); ?>
		<?php echo $form->textArea($model,'specification',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'specification'); ?>
	</div>
	<div class="row">
	Hint :- For new line add || separator in specification.
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<h1>Manage Brand Product Specifications</h1>

<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'brand-product-specification-grid',
	'dataProvider'=>$model1->search($product_brand_id),
	'filter'=>$model1,
	'columns'=>array(
	//	'id',
		// 'brand_product_id',
		'main_title',
		'sub_title',
		'specification',
		'date_added',
		/*
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
