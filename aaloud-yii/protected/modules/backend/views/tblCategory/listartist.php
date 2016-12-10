<h1>Artist of the Month</h1>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align='center'>Sr.No.</td>
                    	<td>Category</td>
                        <td>Artist Name</td>
                        <td>Action</td>
                
                    </tr>
                    <tr>
                    	<td align='center'>1</td>
                    	<td>Default</td>
                        <td><span id='txtAlbumName_0' name='txtAlbumName_0'><?php //echo getAlbumName('0',$connection);?></span></td>
                        <td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('tblCategory/listartistpopup'),        
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
							echo "<tr>";
							echo "<td align='center'>".$sr_no++."</td>";
							echo "<td>".ucwords(stripslashes($row[CATEGORY]))."</td>";
							echo "<td> </td>";
						//	echo "<td><span id='txtAlbumName_".$row[CATEGORY_DETAILS_ID]."' name='txtAlbumName_".$row[CATEGORY_DETAILS_ID]."'>".getAlbumName($row[CATEGORY_DETAILS_ID],$connection)."</span></td>";
						?><td>	<?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'change',
        'url'=>array('tblCategory/listartistpopup'),        
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
					?>
                    
				</table>
