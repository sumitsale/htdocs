

<?php /* $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('/tblCategory/listalbumpopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    )); */
?>
<h1>Music album of the Month</h1>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align='center'>Sr.No.</td>
                    	<td>Category</td>
                        <td>Album Name</td>
                        <td>Action</td>
                
                    </tr>
                    <tr>
                    	<td align='center'>1</td>
                    	<td>Default</td>
                        <td><span id='txtAlbumName_0' name='txtAlbumName_0'><?php //echo getAlbumName('0',$connection);?></span></td>
                        <td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('tblCategory/listalbumpopup'),        
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
					->from('tbl_album_of_the_month')
					->where('CATEGORY_ID=:id and STORE_FRONT_ID=:id1',array(':id'=>$row['CATEGORY_DETAILS_ID'],':id1'=>STORE_FRONT_ID))
					->queryAll();
			
						foreach($result1 as $row1)
						{
			
							$result2 = Yii::app()->db->createCommand()
							->select('album')
							->from('tbl_contents')
							->where('CONTENT_ID=:id',array(':id'=>$row1['CONTENT_ID']))
							->queryAll();
								foreach($result2 as $row2)	
									{	
							echo "<tr>";
							echo "<td align='center'>".$sr_no++."</td>";
							echo "<td>".ucwords(stripslashes($row[CATEGORY]))."</td>";
							echo "<td>".$row2[album]."</td>";
						?>	<td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
		'url'=>array('tblCategory/listalbumpopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    ));
?> </td>
							<?php
							
							echo "</tr>";
							
							//List Subcategories
							
							$result3 = Yii::app()->db->createCommand()
    						->select('a.CATEGORY,b.*')
    						->from('tbl_category a')
    						->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
    						->where('b.STORE_FRONT_ID=:id1 and b.CONTENT_TYPE_ID=:id2 and b.PARENT_ID=:id3 and b.STATUS=:id4', array(':id1'=>1,':id2'=>2,':id3'=>$row['CATEGORY_ID'],':id4'=>1))
							->order('a.CATEGORY,b.CONTENT_TYPE_ID')
    						->queryAll();
							
						foreach($result3 as $row3)
						
					{
						$result4 = Yii::app()->db->createCommand()
						->select('CONTENT_ID')
						->from('tbl_album_of_the_month')
						->where('CATEGORY_ID=:id and STORE_FRONT_ID=:id1',array(':id'=>$row3['CATEGORY_DETAILS_ID'],':id1'=>STORE_FRONT_ID))
						->queryAll();
			
							foreach($result4 as $row4)
							{
								$result5 = Yii::app()->db->createCommand()
								->select('album')
								->from('tbl_contents')
								->where('CONTENT_ID=:id',array(':id'=>$row4['CONTENT_ID']))
								->queryAll();
								
								foreach($result5 as $row5)	
								{	
									echo "<tr>";
									echo "<td align='center'>".$sr_no++."</td>";
									echo "<td>".ucwords(stripslashes($row3[CATEGORY]))."</td>";
									echo "<td>".$row5[album]."</td>";
									?>		
                                    <td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
		'url'=>array('tblCategory/listalbumpopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    ));
?> </td>
							<?php
							
							echo "</tr>";
							
							}
							}
							}
							
							
							
							}
						}	
						
					}
					?>
                    
				</table>
