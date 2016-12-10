<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userartist-form',
	'enableAjaxValidation'=>false,
)); ?>

<table width="100%">
		<tr>
				<td><h1>User Name</h1></td>
				<td>Track Name</td>
				<td>Uploaded On</td>
				<td>Download</td>
			
				<td>Edit</td>
		</tr>
		
		
		
			<?php 
						$j=($sample[0]-1)+30;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){ ?>
		
		
		
		
		<?php  /*for($i=0;$i<count($result);$i++)
		{ */
		
		
		
		$sql=Yii::app()->db->createCommand()
						->selectdistinct('*')
						->from('tbl_user_profile')
						->where('USER_ID=:userid',array(':userid'=>$result[$i]['USER_ID']))
						->queryAll();
						
						//echo "<pre>";
						//print_r($sql);exit;
		?>
		
		<tr>
				<td><?php 
				if(isset($sql[0]['NICK_NAME'])) {
				echo substr($sql[0]['NICK_NAME'],0,15); 
				}else 
				{ }
				
				?></td>
				<td><?php echo substr($result[$i]['TRACK_NAME'],0,25); ?></td>
				<td><?php  echo date("d/m/y : H:i:s",$result[$i]['TRACK_INDATE']) ?></td>
				<td>
				
				<?php 
				
				$pos = strpos($result[$i]['TRACK_FILE'],"WP");
				
				if($pos === false) { ?>
				
				
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/uploads/tracks/<?php echo $result[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
				
				<?php } else { ?>
				
				<a target="_blank" href="http://124.153.73.6/awap/uploads/tracks/<?php echo $result[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
				
				<?php } ?>
				
				
				</td>
				<td><?php //echo "edit"; ?>
				
				
				<?php 
							echo Chtml::link(
   'Edit', 
    '', 
    array(
         'submit'=>array('userartist/edit'), 
         'params'=>array('id'=>$result[$i]['USER_ID'],'id1'=>$result[$i]['USER_TRACK_ID']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
				?>
				
				
				
				
				
				
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
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>



<?php $this->endWidget(); ?>

</div><!-- form -->