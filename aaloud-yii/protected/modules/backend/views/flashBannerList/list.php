<?php
$this->breadcrumbs=array(
	'Banners',
);


?>

<h1>Flash Banners</h1>

 <table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				    <td width="30%"><strong>FLASH TITLE</strong></td>
				    <td width="20%"><p><strong>FLASH SECTION</strong></p>    </td>
				    <td width="35%"><strong>XML Path</strong></td>  
					<td width="15%"><strong>EDIT</strong></td>
					<td width="15%"><strong></strong></td>
					<td width="25%"><strong>Updated On</strong></td> 
				</tr>
				<?php 
				$oldmodule = "";
				foreach($result as $row){ 
				
				
				?>
				<tr>
				    <td><a href="#"><?php if($oldmodule != $row['FLASH_TITLE']) echo ucwords(strtolower($row['FLASH_TITLE'])); ?></a></td>
				    <td><?php echo $row['FLASH_SECTION']; ?></td>
				    <td><?php echo $row['XML_PATH']; ?></td>
					<td><a href="#">Manage</a></td>
					<td><a href="#">Create Xml</a></td>
					<?php
					 $datetime = strtotime($row['modified']);
					 $date_format = date('d M Y',$datetime); ?>
					<td><?php echo $date_format; ?></td>  						
				</tr>  
				<?php
					$oldmodule = $row['flash_title'];
				}//while
				
				?>
				</table>
