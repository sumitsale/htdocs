

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


<h1>Containers</h1>


<table width="100%">
			   <tbody><tr>
											<td align="right"><?php echo CHtml::link('Add New', CController::createUrl('TblContainerMaster/create'), array('class'=>'report')); ?></td>
								   </tr>
			   </tbody></table>
			   <table cellspacing="2" cellpadding="3" border="0" width="100%">
  				<tbody><tr>
            		<th align="center">Container Location</th>
					<th>Container Name</th>
					<th>Manage</th>
  				</tr>	

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_contlist',
)); ?>

</tbody>
</table>




			   			 