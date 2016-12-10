<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userartist-form',
	'enableAjaxValidation'=>false,
)); ?>

<table width="100%">
		<tr>
				<td>Artist Name</td>
				<td>Email Id</td>
				<td>Contact No</td>
				<td>City</td>
			
				<?php /*
				<td>Edit</td>
				*/ ?>
				
		</tr>
		
		
		
			<!--<b>Page <?php echo $pages->getCurrentPage()+1; ?></b>-->

						<?php 
						$j=($sample[0]-1)+30;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){ ?>   
						
		
		
		
		

		
		<?php /*for($i=0;$i<count($result);$i++)
		{ 
		
		*/
		//echo "<pre>";
		//print_r($result);exit;
		
		$sql=Yii::app()->db->createCommand()
						->selectdistinct('*')
						->from('tbl_user_profile')
						->where('USER_ID=:userid',array(':userid'=>$result[$i]['USER_ID']))
						->queryAll();
						
			//echo $result[$i]['USER_ID'];exit;
			
		$userdetail=Yii::app()->db->createCommand()
						->selectdistinct('*')
						->from('a_users')
						->where('A_USER_ID=:userid',array(':userid'=>$result[$i]['USER_ID']))
						->queryAll();
		
		?>
		<tr>
				<td><?php if(isset($sql[0]['NICK_NAME'])) { echo substr($sql[0]['NICK_NAME'],0,15); } else {} ?></td>
				<td><?php if(isset($userdetail[0]['A_EMAIL_ID'])) { echo substr($userdetail[0]['A_EMAIL_ID'],0,25);} else {}  ?></td>
				<td><?php if(isset($userdetail[0]['A_MOBILE_NO']))echo substr($userdetail[0]['A_MOBILE_NO'],0,25); ?></td>
				<td><?php if(isset($userdetail[0]['A_CITY'])){echo substr($userdetail[0]['A_CITY'],0,25);} else{ } ?></td>
				
				
				
				<?php /*
				<td>
				
				
				<?php 
							echo Chtml::link(
   Edit, 
    '', 
    array(
         'submit'=>array('userartist/update'), 
         'params'=>array('id'=>$result[$i]['USER_ID']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
							?>
				
				</td>
				
				*/ ?>
				
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












<?php $this->endWidget(); ?>

</div><!-- form -->