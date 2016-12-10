<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

<?php
	$TEMPLATE_ID=$temp_value['TEMPLATE_ID'];
?>
 
<h1>Container-Template Mapping</h1>
<form>

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

<table>
<tr>
<td>
<b>CONTAINER <br />NAME</b>
 </td>
 <td>
       <?php echo $form->dropDownList($model,'CONTAINER_ID', CHtml::listData($container,'CONTAINER_ID','CONTAINER_NAME'), array('prompt'=>'select Container','ajax' => array(
                      'type' => 'POST', //request type
                      'url' => CController::createUrl('TblContainerMaster/ajaxmap'), //url to call.
                      //Style: CController::createUrl('currentController/methodToCall')
                      'update' => '#TblTemplate_TEMPLATE_ID', //selector to update
                  //'data'=>'js:javascript statement'
                  //leave out the data key to pass all form values through
                  )
                      )
              );?>	
        <?php echo $form->error($model,'CONTAINER_NAME') ?>
 </td>
	<td>       
    Template<br />Name  
 	</td>
        <td>
       <?php echo $form->dropDownList($model1,'TEMPLATE_ID', CHtml::listData($template,'TEMPLATE_ID','TEMPLATE_NAME'), array('prompt'=>'select Template','options'=>array($TEMPLATE_ID=>array('selected'=>'selected')))); ?>
        <?php echo $form->error($model1,'TEMPLATE_NAME') ?>
	</td>
    </tr>
    <tr>
    <td colspan="4">
    </tr>
    <tr>
    <td colspan="4" align="center"><?php echo CHtml::button('update', array('submit' => array('TblContainerMaster/updatemap'))); ?>
    </td>
    </tr>
    </table>
</form>
<?php $this->endWidget(); ?>