<?php
/* @var $this PackagesController */
/* @var $model Packages */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Packages', 'url'=>array('index')),
	array('label'=>'Add new Packages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#packages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 50000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>
 
 

<h1>Manage Packages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'packages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'package_name',
		// 'category_id',
		  // array(
                                        // 'name' => 'category_id',
                                        // 'value' => 'Category::Model()->FindByPk($data->category_id)->category_name',
										
                                        // ),
		
		'category_name',
		'package_day',
		'package_night',
		'pricing',
		// 'show_on_site',
		
		array(
        'class'=>'CLinkColumn',
      'labelExpression'=>'$data->show_on_site',
		// '"users/view&id=".$data->package_thumbnail',
        'urlExpression'=>'Yii::app()->request->baseUrl."/index.php/Packages/show_on_site?id=".$data->id."&value=".$data->show_on_site',
        'header'=>'show_on_site'
      ),
	  
		// 'package_thumbnail',
		

/*		array(
        'class'=>'CLinkColumn',
         'labelExpression'=>'$data->package_thumbnail',
		// '"users/view&id=".$data->package_thumbnail',
        'urlExpression'=>'Yii::app()->request->baseUrl."/../images/package/".$data->package_thumbnail',
        'header'=>'package_thumbnail',
		'linkHtmlOptions'=>array('target'=>'_blank')
      ),
	  
	  */
	  
	   	// array(
        // 'class'=>'CLinkColumn',
        // 'label'=>'($data->category_id==4) ? Rate : ""',
		// // '"users/view&id=".$data->package_thumbnail',
        // 'urlExpression'=>'($data->category_id==4) ?  Yii::app()->createUrl("packageDetail/rate_and_fair",array("id"=>$data->id)) : ""',
        // 'header'=>'Rate'
      // ),
	  
	  array(
		'type'=>'raw',
		//'value'=>'CHtml::link("Preview", array("contestantDetails/preview"));',
		//'value'=>'CHtml::link("Preview", array("contestantDetails/preview", "id"=>$data->uid));',
		'value'=>'($data->category_id!=3)?  CHtml::link("Rate", array("packageDetail/rate_list", "id"=>$data->id)) : "" ',
		'name'=>'category_id', 
		'htmlOptions' => array('style'=>'width:50px;'), 
		),
		
		array(
		'type'=>'raw',
		//'value'=>'CHtml::link("Preview", array("contestantDetails/preview"));',
		//'value'=>'CHtml::link("Preview", array("contestantDetails/preview", "id"=>$data->uid));',
		'value'=>'CHtml::link("Hotel info", array("packageDetail/new_rate_list", "id"=>$data->id))',
		'name'=>'category_id', 
		'htmlOptions' => array('style'=>'width:50px;'), 
		),
	  
	  	array(
        'class'=>'CLinkColumn',
        'label'=>'Detail',
		// '"users/view&id=".$data->package_thumbnail',
        'urlExpression'=>'Yii::app()->createUrl("packageDetail/create",array("id"=>$data->id))',
        'header'=>'Detail'
      ),
	  	     
		/*
		'destination',
		'key_feature',
		
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
