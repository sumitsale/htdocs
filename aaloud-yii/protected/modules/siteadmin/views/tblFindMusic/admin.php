<?php
$this->breadcrumbs=array(
	'Tbl Find Musics'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List TblFindMusic', 'url'=>array('index')),
	//array('label'=>'Create TblFindMusic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-find-music-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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

 
 
 <form  method="post"  action="<?php echo $this->createUrl('TblFindMusic/generatxml'); ?>">




		<table>
				<tr>
					<td><input type="submit" value="Generate xml" id="submit" /></td>
				</tr>
		</table>
		
		
</form>
 
 
 
 
 
<h1>Manage Find Musics</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-find-music-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'artist_id',
		'artist_name',
		'hungama_link',
		'ovi_link',
		'itune_link',
		/*
		'sms_download_link',
		*/
		// array(
			// 'class'=>'CButtonColumn',
		// ),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'header'=>'View Details',
		),
	),
)); ?>
