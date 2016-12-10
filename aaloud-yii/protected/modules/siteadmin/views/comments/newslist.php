
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

<script type="text/javascript">
			 function deleteall(a)
			{
			
			param="id=" + a;
			//alert(param);return false;
			   ajaxRequest = $.ajax({
			  url: "<?php echo CController::createUrl("Comments/news"); ?>",
			  type: 'POST',
			  data: param,
			  error: function(){
				alert('error');
				//error message here
			  },
			  success: function(data){
				if(data==200)
				{
				 window.location.href=window.location.href;
				}
				else
				{
				alert('error');
				}
				//read return javascript variable here;
			  }       
			});
			
			}	
			
			
			
			function statuschange(a,b)
			{
			//alert(a);
			//alert(b);
			
			param="id=" + a+"&status="+b;
			//alert(param);return false;
			   ajaxRequest = $.ajax({
			  url: "<?php echo CController::createUrl("Comments/statuschangenews"); ?>",
			  type: 'POST',
			  data: param,
			  error: function(){
				alert('error');
				//error message here
			  },
			  success: function(data){
			  
				if(data==200)
				{
				 window.location.href=window.location.href;
				}
				else
				{
				alert('error');
				}
				//read return javascript variable here;
			  }       
			});
			
			}
			
</script>







<h1>Comments List</h1>

<table width="100%">
			<tr>
				<th align="center"><h3>#</h3></th>
				<th align="left"><h3>News Id</h3></th>
				<th align="left"><h3>User Id</h3></th>
				<th align="left"><h3>Comment</h3></th>
				<th align="left"><h3>Status</h3></th>
				<th align="left"><h3>Delete</h3></th>
				<!--<td>Edit</td> -->
			</tr>
			
					<?php 
						$k=0;
						$j=($sample[0]-1)+15;
						if($j>$item_count)
						{
							$j=$item_count;
						}
						for($i=($sample[0]-1);$i<$j;$i++){ 
					?> 
			
			<?php //for($i=0;$i<count($result);$i++) {?>
			<tr>
				<td align='center'><?php echo ++$k; ?></td>
				<td><?php echo $result[$i]['artist_id']; ?></td>
				<td><?php echo $result[$i]['user_id']; ?></td>
				<td><?php echo $result[$i]['comment']; ?></td>
				<td><?php 
				if( $result[$i]['comment_status']=='P' ) { 
				/*
				  echo Chtml::link('Approve','', array('submit'=>array('Comments/statuschangenews'),
				  'params'=>array('id'=>$result[$i]['comment_id'],'status'=>$result[$i]['comment_status']),
				  'style'=>'cursor: pointer; text-decoration: none;',));
				*/?>  
				
				<a href="javascript:void()" onClick="statuschange(<?php echo $result[$i]['comment_id']; ?>,'<?php echo $result[$i]['comment_status']; ?>');">
                                  Approve
                                </a>
				
				<?php
				} else {

						if($result[$i]['comment_status']=='H')
						{
						/* echo Chtml::link('Disapprove','', array('submit'=>array('Comments/statuschangenews'), 
						 'params'=>array('id'=>$result[$i]['comment_id'],'status'=>$result[$i]['comment_status']),
						 'style'=>'cursor: pointer; text-decoration: none;',));*/
						  ?><a href="javascript:void()" onClick="statuschange(<?php echo $result[$i]['comment_id']; ?>,'<?php echo $result[$i]['comment_status']; ?>');">
                                  Disapprove
                                </a>
						 
						 
						<?php }
						
						
				} ?></td>
				
				<td>
				<?php /* echo Chtml::link('Delete','', array('submit'=>array('Comments/news'),
				'params'=>array('id'=>$result[$i]['comment_id']), 
				'style'=>'cursor: pointer; text-decoration: none;',)); */?>

						 <a href="javascript:void()" onClick="deleteall(<?php echo $result[$i]['comment_id']; ?>);">
                                  delete
                                </a>
				</td>
			</tr>
			<?php } ?>

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
                     