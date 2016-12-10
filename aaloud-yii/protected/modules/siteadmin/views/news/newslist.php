
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


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	
)); ?>




<h1>News List</h1>
<div>

 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
            <th align="left"><h3>Title</h3></th>
            <th align="center"><h3>Date</h3></th>
						<th align="center"><h3>Status</h3></th>
						<th align="center"><h3>Edit | Delete</h3></th>
          </tr>


						<?php 
						$k=0;
						$j=($sample[0]-1)+15;
						if($j>$item_count)
						{
							$j=$item_count;
						}
						for($i=($sample[0]-1);$i<$j;$i++){ 

						$time=strtotime($result[$i]['Press_News_Date']);
						?>   

				
				<tr>
				    <td align='center'><?php echo ++$k; ?></td>
					<td align='left'><?php echo $result[$i]['Press_News_Title']; ?></td>     <td align='center'><?php echo date("M d, Y",$time);?></td>
					<td align="center">
					<?php if($result[$i]['Press_News_Status']=='P') 
					 { 
					  echo Chtml::link('Hide','', array('submit'=>array('news/statuschange'), 'params'=>array('id'=>$result[$i]['Press_id'],'status'=>$result[$i]['Press_News_Status']), 'style'=>'cursor: pointer; text-decoration: none;',));
					  } 
					  else
					  { ?> <?php echo Chtml::link('Show','', array('submit'=>array('news/statuschange'), 'params'=>array('id'=>$result[$i]['Press_id'],'status'=>$result[$i]['Press_News_Status']), 'style'=>'cursor: pointer; text-decoration: none;',)); 
					  }?>	
					</td>	
					
					<td align="center">
										<?php echo Chtml::link('Edit','', array('submit'=>array('news/update'), 'params'=>array('id'=>$result[$i]['Press_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> |
										<?php echo Chtml::link('Delete','', array('submit'=>array('news/newslist'), 'params'=>array('id'=>$result[$i]['Press_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
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
						'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
 

</div>       
                
                     
<?php $this->endWidget(); ?>
			    
</div><!-- form -->
			
			