<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List of Hotel', 'url'=>array('index')),
	array('label'=>'Add new Hotel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hotel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotels</h1>

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
	'id'=>'hotel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'hotel_name',
		'city',
		// 'thumbnail',
		
		'address',
		'start_price',
		'price_with_offer',
		'description',
		
		'rating',
		array(
        'class'=>'CLinkColumn',
         'labelExpression'=>'$data->thumbnail',
		// '"users/view&id=".$data->thumbnail',
        'urlExpression'=>'Yii::app()->request->baseUrl."/../images/hotel/".$data->thumbnail',
        'header'=>'thumbnail',
		'linkHtmlOptions'=>array('target'=>'_blank')
      ),
	  
	  	array(
        'class'=>'CLinkColumn',
        'label'=>'Detail',
		// '"users/view&id=".$data->package_thumbnail',
        'urlExpression'=>'Yii::app()->createUrl("HotelDetail/create",array("id"=>$data->id))',
        'header'=>'Detail'
      ),
	  
		/*'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
