<table width="100%">
		<tr>
				
				<td>ARTIST Name</td>
				<td>Email</td>
				<td>Contact_no</td>
				<td>City</td>
				
				
		</tr>
		
		
		<?php 
		//echo "<pre>";
		// print_r($sample);exit;
						$j=($sample[0]-1)+30;
						if($j>$item_count)
						{
							$j=$item_count;
						}
						for($i=$sample[0]-1;$i<$j;$i++){ ?>   

				<tr>
					<td><?php echo substr($result[$i]['A_FIRST_NAME'],0,25);?></td>
					<td><?php echo substr($result[$i]['A_EMAIL_ID'],0,50);?></td>
					<td><?php echo substr($result[$i]['A_MOBILE_NO'],0,25);?></td>
					<td><?php echo substr($result[$i]['A_CITY'],0,25);?></td>
					
					
				
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
		
		
		