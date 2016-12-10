
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">

	$( document ).ready(function() {
	
	  var hotel_array= <?php echo json_encode($hotel); ?>;

	  // console.log(hotel_array);
	  
	  
    for(var i=0;i<hotel_array.length;i++){
        //alert(jArray[i]);
		 //console.log(hotel_array[i]['id']);
		 
    }

		$( "#city" ).change(function() {
		
		var selected_city = $('#city').val();
		
		$('#hotel').empty();
			  
    for(var i=0;i<hotel_array.length;i++){
        $('#hotel').append('<option city_name ="'+hotel_array[i]['city']+'" value="'+hotel_array[i]['hotel_name']+'">'+hotel_array[i]['hotel_name']+'</option>');
		// console.log(hotel_array[i]['id']);
    }
		
		$("#hotel option[city_name != '"+selected_city+"']").remove();
		});
});


</script>


<h1>Package name - <?php echo $package[0]['package_name']; ?></h1>
<form action="<?php echo $this->createUrl('/PackageDetail/submit_add_data_for_package'); ?>" method="post">

<table>
<input type="hidden" name="package_name" value="<?php echo $package_name; ?>">
<input type="hidden" name="package_id" value="<?php echo $package_id; ?>">

	<tr>
			<td>Cost Saver Packages Hotels & Details</td>	
			
	</tr>
	<?php $result = json_decode($package[0][$package_name],true); ?>
	
	<tr>
			<td>Price - </td>	
			<td><input type="text" name="price" value="<?php echo $result['price']; ?>"></td>
	</tr>
	
	<tr>
			<td>Hotel Names</td>
			<td>City</td>
			<td>Room Type</td>
			<td>No Nights</td>
			<td>Action</td>
	</tr>
	
	<?php if(count($result['list'])>0) { ?>
	
	<?php for($i=0;$i<count($result['list']);$i++) { ?>
	
	<tr>
			<td><?php echo $result['list'][$i]['hotel']; ?></td>
			<td><?php echo $result['list'][$i]['city']; ?></td>
			<td><?php echo $result['list'][$i]['room_type']; ?></td>
			<td><?php echo $result['list'][$i]['no_of_nights']; ?></td>
			<td><a href="<?php echo $this->createUrl('/PackageDetail/delete_data_for_package/package_id/'.$package_id.'/package_name/'.$package_name.'/listid/'.$i); ?>">Action</a></td>
	</tr>
	
	<?php } ?>
	
	<?php } else { ?>
	
	<tr>
		<td colpan="5">No result found.</td>
	</tr>
	

	
	
	<?php } ?>
	
	<tr>
		<TD><br><br></TD>
	</tr>
	
	<tr>
	
		<td>Select city</td>
		<td>
			<select id="city" name="city">
				<option value="">Select city</option>
				<option value="Port Blair">Port Blair</option>
				<option value="Havelock Island">Havelock Island</option>
				<option value="Neil Island">Neil Island</option>
				<option value="Diglipur">Diglipur</option>
			</select>	
				
		</td>
	</tr>
	
	<tr>
	
		<td>Select city</td>
		<td>
			<select id="hotel" name="hotel">
				<option value="">Select hotel</option>
				<?php for($i=0;$i<count($hotel);$i++) { ?>
				<option value="<?php echo $hotel[$i]['hotel_name']; ?>" city_name="<?php echo $hotel[$i]['city'];  ?>"><?php echo $hotel[$i]['hotel_name']; ?></option>
				<?php } ?>
			</select>	
				
		</td>
	</tr>
	
	<tr>
			<td>Enter room type</td>
			<td><input type="text" name="room_type"></td>
		
	</tr>
	
	
	<tr>
			<td>Enter no of nights</td>
			<td><input type="text" name="no_of_nights"></td>
		
	</tr>
	
	<tr>	
		<td><input type="submit" name="submit" value="submit"></td>
	</tr>
	
	
</table>

</form>