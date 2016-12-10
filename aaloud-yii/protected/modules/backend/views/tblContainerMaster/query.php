<h1>Query Manager</h1>		
			<table>
				<?php // print_r($result);exit; ?>
				<?php	
				$show=true;
				foreach($arrData as $cont_name=>$arrContData)
						
				{ 
				?>
                <tr>
				<!--?php print_r($user1);exit;?-->
				<table width="100%">	
                <tr>
				    <td colspan="6"> <?php echo strtoupper($cont_name); ?></td>
				</tr>
                <?php if($show){ ?>
                
	<tr><td><b>Template Name</b></td><td><b>Query</b></td><td><b>Container Name</b></td><td><b>XML Name</b></td><td><b>	Updated On</b></td><td><b>Edit</b></td></tr>
                <?php $show = false; } ?>
			<?php
			 for($i=0; $i < count($arrContData); $i++)
			 {	
			 $size=count($arrContData);	
		 for($i=0; $i < $size; $i++)
			{
					$result1 = Yii::app()->db->createCommand()
   			 		->select('p.TEMPLATE_ID')
    				->from('tbl_container_master u')
   				 	->join('tbl_container_template_map p', 'u.CONTAINER_ID=p.CONTAINER_ID')
   				 	->where('p.CONTAINER_ID=:id and p.STORE_FRONT_ID =:store_id' , array(':id'=>$arrContData[$i]['CONTAINER_ID'],':store_id'=>STORE_FRONT_ID))
					->queryRow();
				//print_r($result1);exit;
							
						foreach($result1 as $template_id)
						{
						$result2 = Yii::app()->db->createCommand()
   			 			->select('p.QUERY_ID, u.TEMPLATE_NAME, p.QUERY_NAME, p.XML_FILE_NAME, p.QUERY_VARIANT, p.UPDATED_ON, p.STATUS, p.TEMPLATE_ID') 
    					->from('tbl_template u')
   				 		->join('tbl_store_query p', 'u.TEMPLATE_ID=p.TEMPLATE_ID and u.STORE_FRONT_ID=p.STORE_FRONT_ID')
   				 		->where('p.TEMPLATE_ID=:id and p.STORE_FRONT_ID=:store_id', array(':id'=>$template_id ,':store_id'=>STORE_FRONT_ID))
						->queryAll();
						
	
				foreach($result2 as $row)
				{
				$edit='';
				$xmlfile='';
				
				$edit='<a href="store_movie_query?locationid='.$row["location_id"].'&page_id='.$row["page_id"].'">Edit</a>';
				$xmlfile = $row["XML_FILE_NAME"]."_".$row["QUERY_ID"]."_".'1'."_.xml";
				$timestamp = strtotime($row["UPDATED_ON"]);
		//		echo "<tr><td>&nbsp;".ucwords(strtolower($row['location_desc']))."</td><td>".$row['location_current_title']."</td><td>".$xmlfile."</td><td>".$edit."</td></tr>";
				?>
               
                <tr>
                                    	<td align="left"><?php echo $row['TEMPLATE_NAME'];?>
                                        </td>
                                        <td align="left"><?php echo $row["QUERY_NAME"];?>
                                        </td>
                                        <td align="left"><?php echo $arrContData[$i]['CONTAINER_NAME']; ?>
                                        </td>
										<td align="left"><?php echo $xmlfile;?>
                                        </td>
                                        <td align="left"><?php echo date('M',$timestamp)." ".date('d',$timestamp).",".date('y',$timestamp);?>
                                        </td>
                                       	<td align="center"><?php echo CHtml::link('Edit', CController::createUrl("tblContainerMaster/update?id=1"), array('class'=>'report')); ?>
                                        </td>

                                    </tr>
                                  
                          
                                 
                <?php
				}  //foreach
				?>
                <?php
				}
				?>
                <?php
				} //for
				?>
                <?php
				}
				?>
                </table>
                </table>
                <?php } //foreach 
				?> 
               
			</table>	
                