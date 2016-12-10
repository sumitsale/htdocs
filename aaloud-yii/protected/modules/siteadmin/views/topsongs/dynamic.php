 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Song Title</h3></th>
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
					<td align='left'><?php echo $result[$i]['song_name']; ?></td> 			
					<td align='center'><?php echo date("M d, Y",$result[$i]['indate']);?></td>
					<td align="center">	
				
						<?php echo CHtml::link('UP','#', array('class'=>'report','id'=>'up-'.$result[$i]['content_id']."-".($z-1))); ?> &nbsp;
					<?php echo CHtml::link('DOWN','#', array('class'=>'report','id'=>'down-'.$result[$i]['content_id']."-".($z+1))); ?> 
					</td> 
					
				
			
					<td align="center">				
					<?php echo Chtml::link('Delete','#', array('submit'=>array('delete'), 'params'=>array('id'=>$result[$i]['content_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
					</td> 
					
				</tr>
				
                <?php  
				   $z++;
				   
				}
				
				?>
					</tbody>
 </table>