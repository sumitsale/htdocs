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


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aa-itunes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table>

	<tr>
		<td><?php echo $form->labelEx($model,'ALBUM_ID'); ?></td>
		<td><?php echo $form->textField($model,'ALBUM_ID',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'ALBUM_ID'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'ALBUM'); ?></td>
		<td><?php echo $form->textField($model,'ALBUM',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'ALBUM'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'ITUNE_URL'); ?></td>
		<td><?php echo $form->textField($model,'ITUNE_URL',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'ITUNE_URL'); ?>
		</td>
	</tr>

	

	<tr align="center">
		<td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add to List' : 'Save'); ?></td>
	</tr>

</table>

&nbsp;&nbsp;

<div>
	
 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Album Title</h3></th>
                        <th align="center"><h3>Indate</h3></th>
						<th align="center"><h3>Delete</h3></th>
                    </tr>

							


						<?php 
						$j=($sample[0]-1)+15;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){ ?>   




							
							
					<?php /*
					
				foreach($result as $row)
						{  */	
					?>
				
				<tr>
				    <td align='center'><?php echo ++$k; ?></td>
					<td align='left'><?php echo $result[$i]['ALBUM']; ?></td>
					<td align='center'><?php echo date("M d, Y",$result[$i]['INDATE']);?></td>
					
					<td align="center">				
					<?php echo Chtml::link('Delete','', array('submit'=>array('itunes/del'), 'params'=>array('id'=>$result[$i]['ALBUM_ID']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
					</td> 
					
				</tr>
				
                <?php  
				}
				?>
					</tbody>
 </table>
 
  <?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>10,
            'nextPageLabel'=>'Next &gt;',
            'header'=>'',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
</div>  





<?php $this->endWidget(); ?>

</div><!-- form -->