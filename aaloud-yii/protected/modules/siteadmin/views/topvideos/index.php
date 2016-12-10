<script type="text/javascript">

$(document).ready(function() {

	
	$("a.report").live("click", function(){
				var aid = this.id;
				sorting(aid);
				  });

		function sorting(dir) { 
	var dataString = 'dir='+ dir;

												$.ajax({  
															type: "POST",  
															url: "<?php echo CController::createUrl("Topvideos/sort");  ?>	",  
															data: dataString,
															success: function(data) {
																$("#data").html(data);
																}
													
														});

	
	}


});
</script>
<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 15000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topvideo-form',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>
<div>

<?php echo $form->hiddenField($model, 'content_id'); 
echo $form->labelEx($model,'video_name'); ?>
<?php //echo $form->error($model,'student_name');
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'ContentDetails[content_title]',
			//'attribute'=>'CONTENT_TITLE',
			'model'=>$model1,
			//'value' => $model1->isNewRecord ? '': $model1->CONTENT_TITLE,
			'source'=>$this->createUrl('Topvideos/autocompleteTest'),
	
			'options'=>array(
				'showAnim'=>'fold',
			        'select'=>"js:function( event, ui ) {
           $('#label').val(ui.item.label);
            $('#code').val(ui.item.code);
            $('#call_code').val(ui.item.call_code);
						 $('#Topvideos_content_id').val(ui.item.id);
						
        }"
		),
	)		);
	
 ?><?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>

<?php $this->endWidget(); ?>
</div>
<h1>Top Videos List</h1>
	<div id="data">
	
 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Video Title</h3></th>
                        <th align="center"><h3>Indate</h3></th>
						<th align="center"><h3>Priority</h3></th>
						<th align="center"><h3>Delete</h3></th>
                    </tr>

												
							
						

						<?php 
						$z=1;
						$j=($sample[0]-1)+100;
if($j>$item_count)
{
	$j=$item_count;
	$k=0;
}
for($i=$sample[0]-1;$i<$j;$i++){


 ?>   			
				
				<tr>
				    <td align='center'><?php echo ++$k; ?></td>
					<td align='left'><?php echo $result[$i]['video_name']; ?></td> 			
					<td align='center'><?php echo date("M d, Y",$result[$i]['indate']);?></td>
					<td align="center">				
						<?php echo CHtml::link('UP', '#', array('class'=>'report','id'=>'up-'.$result[$i]['content_id']."-".($z-1))); ?> &nbsp;
					<?php echo CHtml::link('DOWN', '#', array('class'=>'report','id'=>'down-'.$result[$i]['content_id']."-".($z+1))); ?> 
					</td> 
					
				
			
					<td align="center">				
					<?php echo Chtml::link('Delete','', array('submit'=>array('delete'), 'params'=>array('id'=>$result[$i]['content_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
					</td> 
					
				</tr>
				
                <?php  
				   $z++;
				   
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
						'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
 
 
 
</div> 
			

</div><!-- form -->