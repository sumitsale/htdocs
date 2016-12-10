

<h1>Package name - <?php echo $package[0]['package_name']; ?></h1>
<form method="post" action="">

<table>


	
	<tr>
			<td>Cost Saver Packages Hotels & Details</td>	
			
	</tr>
		<?php $cost_saver_package = json_decode($package[0]['cost_saver_package'],true); ?>
	<tr>
			<td>Price - </td>	
			<td><input type="text" name="cost_saver_price" value="<?php echo $cost_saver_package['price']; ?>" disabled></td>
	</tr>
	
	<tr>
			<td>Hotel Names</td>
			<td>City</td>
			<td>Room Type</td>
			<td>No Nights</td>
			
	</tr>
	
	<?php if($package[0]['cost_saver_package']!='') { ?>
	

	
		<?php for($i=0;$i<count($cost_saver_package['list']);$i++) { ?>
	
	<tr>
			<td><?php echo $cost_saver_package['list'][$i]['hotel']; ?></td>
			<td><?php echo $cost_saver_package['list'][$i]['city']; ?></td>
			<td><?php echo $cost_saver_package['list'][$i]['room_type']; ?></td>
			<td><?php echo $cost_saver_package['list'][$i]['no_of_nights']; ?></td>
		
	</tr>
	
	<?php } ?>
	
	<?php } else { ?>
	
	<tr>
		<td colpan="5">No result found.</td>
	</tr>
	
	
	<?php } ?>
	
	
	<tr>
			<td> <a href="<?php echo $this->createUrl('PackageDetail/add_data_for_package/package_id/'.$id.'/package_name/cost_saver_package'); ?>"> <input type="button" name="add_cost_saver_package" value="Add/Edit cost saver package"></a></td>
	</tr>


</table>

<br>
<br>

<table>


	<tr>
			<td>Standard Packages Hotels & Details</td>	
			
	</tr>
		<?php $standard_package = json_decode($package[0]['standard_package'],true); ?>
	<tr>
			<td>Price - </td>	
			<td><input type="text" name="standard_package_price" value="<?php echo $standard_package['price']; ?>" disabled></td>
	</tr>
	
	<tr>
			<td>Hotel Names</td>
			<td>City</td>
			<td>Room Type</td>
			<td>No Nights</td>
		
	</tr>
	
	<?php if($package[0]['standard_package']!='') { ?>
	

	
		<?php for($i=0;$i<count($standard_package['list']);$i++) { ?>
	
	<tr>
			<td><?php echo $standard_package['list'][$i]['hotel']; ?></td>
			<td><?php echo $standard_package['list'][$i]['city']; ?></td>
			<td><?php echo $standard_package['list'][$i]['room_type']; ?></td>
			<td><?php echo $standard_package['list'][$i]['no_of_nights']; ?></td>
		
	</tr>
	
	<?php } ?>
	
	<?php } else { ?>
	
	<tr>
		<td colpan="5">No result found.</td>
	</tr>
	
	
	<?php } ?>
	
	<tr>
			<td><a href="<?php echo $this->createUrl('/PackageDetail/add_data_for_package/package_id/'.$id.'/package_name/standard_package'); ?>"><input type="button" name="add_standard_package" value="Add/Edit standard package"></a></td>
	</tr>


</table>

<br>
<br>

<table>


	<tr>
			<td>Deluxe Packages Hotels & Details</td>	
		<?php $delux_package = json_decode($package[0]['delux_package'],true); ?>
	</tr>
	
	<tr>
			<td>Price - </td>	
			<td><input type="text" name="delus_package_price"></td>
	</tr>
	
	
	<tr>
			<td>Hotel Names</td>
			<td>City</td>
			<td>Room Type</td>
			
	</tr>
	<?php if($package[0]['delux_package']!='') { ?>
	

	
		<?php for($i=0;$i<count($delux_package['list']);$i++) { ?>
	
		
	<tr>
			<td><?php echo $delux_package['list'][$i]['hotel']; ?></td>
			<td><?php echo $delux_package['list'][$i]['city']; ?></td>
			<td><?php echo $delux_package['list'][$i]['room_type']; ?></td>
			<td><?php echo $delux_package['list'][$i]['no_of_nights']; ?></td>
			
	</tr>
	
	<?php } ?>
	
	<?php } else { ?>
	
	<tr>
		<td colpan="5">No result found.</td>
	</tr>
	
	
	<?php } ?>
	
	<tr>
			<td><a href="<?php echo $this->createUrl('/PackageDetail/add_data_for_package/package_id/'.$id.'/package_name/delux_package'); ?>"><input type="button" name="add_delux_package" value="Add/Edit delux package"><a></td>
	</tr>


</table>

</form>