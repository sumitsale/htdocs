<h1>Track of the Week</h1>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align='center'>Sr.No.</td>
                    	<td>Category</td>
                        <td>Track Name</td>
                        <td>Action</td>
                
                    </tr>
                    <tr>
                    	<td align='center'>1</td>
                    	<td>Default</td>
                        <td><span id='txtAlbumName_0' name='txtAlbumName_0'><?php //echo getAlbumName('0',$connection);?></span></td>
                        <td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('tblCategory/listtrackpopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    ));
?></td>
                        
                    </tr>
				<?php //	print_r($result);exit; ?>
                    <?php
					$sr_no=2;
						foreach($result as $row)
					{	
						
						$result1 = Yii::app()->db->createCommand()
						->select('CONTENT_ID')
						->from('tbl_track_of_the_week')
						->where('CATEGORY_ID=:id and STORE_FRONT_ID=:id1',array(':id'=>$row['CATEGORY_DETAILS_ID'],':id1'=>STORE_FRONT_ID))
						->queryAll();
							
							foreach($result1 as $row1)
							{
								$result2 = Yii::app()->db->createCommand()
								->select('track')
								->from('tbl_contents')
								->where('CONTENT_ID=:id',array(':id'=>$row1['CONTENT_ID']))
								->queryAll();
							
							foreach($result2 as $row2)
							{
							
							echo "<tr>";
							echo "<td align='center'>".$sr_no++."</td>";
							echo "<td>".ucwords(stripslashes($row[CATEGORY]))."</td>";
							echo "<td>".$row2[track]."</td>";
						?><td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('tblCategory/listtrackpopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    ));
?></td>
                        <?php
							
							echo "</tr>";
							
							//List Subcategories
							
						}
						}	
						
					}
					?>
                    
				</table>
