<?php
/* @var $this BrandProductSpecificationController */
/* @var $model BrandProductSpecification */

$this->breadcrumbs=array(
	'Brand Product Specifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BrandProductSpecification', 'url'=>array('index')),
	array('label'=>'Create BrandProductSpecification', 'url'=>array('create')),
	array('label'=>'View BrandProductSpecification', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BrandProductSpecification', 'url'=>array('admin')),
);
?>

<h1>Update specification</h1>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>


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
		
		
		<?php echo $form->hiddenField($model,'brand_product_id',array('value'=>$model->brand_product_id)); ?>
		
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