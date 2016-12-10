<script>

	function show_detail(a)
	{
		//alert(a);
		
		//$("#"+a).show("slow" );
		$( "#"+a ).toggle("slow");
		//$("#show_button_"+a).prop('value', 'Hide Detail'); 
		
		  // $( "#"+a ).slideDown( "slow", function() {
    // // Animation complete.
  // });
	}
	
	
	function hide_detail(a)
	{
		$("#"+a).hide("slow" );
	}
	
	function delete_data(a)
	{
	
	var dataString = 'id='+ a;
	
		$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("packageDetail/delete_data"); ?>",
			data: dataString,
			success: function(data) 
			{
		
				if(data==200)
				{

				 window.location.href =  window.location.href;

				}
				else
				{
					alert("something went wrong.please try again.");
				}
			}
        })
		
		
	}
	

</script>


		<h6>		
<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>
				
<?php if(count($rate_list) >0) { ?>

	<?php for($a=0;$a<count($rate_list);$a++) { ?>
		
		<table>
		
		<tr>
			<td>
					<h1>City - <?php echo $rate_list[$a]['city'];?></h1>
					<input type="button" value="Show / Hide Detail" id="show_button_<?php echo $a;?>" onclick="show_detail('tr_<?php echo $a; ?>')">
					<input type="button" value="Delete" onclick="delete_data('<?php echo $rate_list[$a]['id']; ?>');">
					<a href="<?php echo CController::createUrl("packageDetail/update_rate/".$rate_list[$a]['id']); ?>"><input type="button" value="Update"></a>
					Default city :- <?php echo $rate_list[$a]['default_list'];  ?>
			</td>
			
		</tr>
		
		
		
		<table id="tr_<?php echo $a; ?>" style="display:none">
		
		
	<tr>
	<td><br/></td>
	</tr>
	<?php $rate = json_decode($rate_list[$a]['rate']); 
	
	// echo "<pre>";
	// print_r($rate->delux_cost_per_person);
	?>
	<tr>
		<td>
			<table border="1" BORDERCOLOR=RED>
					
					
					<tr>
							<td>Package category</td>
							<td>Cost per person or twin sharing</td>
							<td>Extra adult sharing same room</td>
							<td>Chiled with extra bed/mattress</td>
							<td>Chiled withOUT BED</td>
					</tr>
					
					<tr>
							<td>Delux</td>
							<td><input type="text" name="rate[delux_cost_per_person]" value="<?php  echo $rate->delux_cost_per_person; ?>" readonly></td>
							<td><input type="text" name="rate[delux_extra_adult]" value="<?php  echo $rate->delux_extra_adult; ?>" readonly></td>
							<td><input type="text" name="rate[delux_chiled_extra_bed]" value="<?php  echo $rate->delux_chiled_extra_bed; ?>" readonly></td>
							<td><input type="text" name="rate[delux_chiled_without_bed]" value="<?php  echo $rate->delux_chiled_without_bed; ?>" readonly></td>
							
					</tr>
					
					<tr>
							<td>Standard</td>
							<td><input type="text" name="rate[standard_cost_per_person]" value="<?php  echo $rate->standard_cost_per_person; ?>" readonly></td>
							<td><input type="text" name="rate[standard_extra_adult]" value="<?php  echo $rate->standard_extra_adult; ?>" readonly></td>
							<td><input type="text" name="rate[standard_chiled_extra_bed]" value="<?php  echo $rate->standard_chiled_extra_bed; ?>" readonly></td>
							<td><input type="text" name="rate[standard_chiled_without_bed]" value="<?php  echo $rate->standard_chiled_without_bed; ?>" readonly></td>
					</tr>
					
					<tr>
							<td>Cost saver</td>
							<td><input type="text" name="rate[cost_saver_cost_per_person]" value="<?php  echo $rate->cost_saver_cost_per_person; ?>" readonly></td>
							<td><input type="text" name="rate[cost_saver_extra_adult]" value="<?php  echo $rate->cost_saver_extra_adult; ?>" readonly></td>
							<td><input type="text" name="rate[cost_saver_chiled_extra_bed]" value="<?php  echo $rate->cost_saver_chiled_extra_bed; ?>" readonly></td>
							<td><input type="text" name="rate[cost_saver_chiled_without_bed]" value="<?php  echo $rate->cost_saver_chiled_without_bed; ?>" readonly></td>
					</tr>
			</table>
		
		</td>
	</tr>
		
		<!--
		<?php 
	
	
	$avilable_date  = json_decode($rate_list[$a]['available_date']);
	
	
	
	$current_month = date("m");
	
	$month_name = date('F Y');
	
		for($i=$current_month;$i<=(12+$current_month);$i++)  { ?>
					<tr>
						
						<td><?php
								
									echo  $month_name ;  
		

								?>
						</td>
						<td></td>
					
					</tr>
					
						<tr>
	<td>
		Default month :- <input type="radio" name="default_month_<?php echo $a; ?>" <?php if($month_name==$rate_list[$a]['default_month']) { echo "checked";} ?>  value="<?php echo $month_name; ?>">Yes
		
	</td>
	</tr>
					
	
					<?php 
							$ts = strtotime($month_name);
							$no_of_days =  date('t', $ts);
							
							$aviable_date_month_data = isset($avilable_date->$month_name) ? $avilable_date->$month_name : array();
				
				
					?>
	
	<tr>
	<td>
	
	<table width="100%">
		
	
			<tr>
			
			<?php 	
		
			
			$start_date = date('Y-m-01',strtotime($month_name.' '.date("Y")));
		
				for ($j = 0; $j < $no_of_days; $j++) {  
				$date = strtotime(date("Y-m-d", strtotime($start_date)) . " +$j day");
				
				
				
				
				?>
					<td>
					<input type="checkbox" 
					
					<?php if(in_array(date('d F Y', $date),$aviable_date_month_data)) { echo "checked"; } ?>
					
					name="available[<?php echo $month_name; ?>][]" value="<?php echo date('d F Y', $date); ?>">
					<?php  
							echo date('d F Y', $date);  ?>
					</td>
					
					<?php 
							if(($j+1)%4 == 0)
							{
								echo "</tr><tr>";
							}

					?>
			
			<?php } ?>
			</tr>
	
	</table>
	
	</td>
		
	
	</tr>
	
	<?php if($i==(12+$current_month)) { ?>
	<tr>
		<td><input type="button" value="Hide detail" onclick="hide_detail('tr_<?php echo $a; ?>')"></td>
	</tr>
	
	<?php } ?>
	
	
	<tr>
	
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
	</tr>
	
	<?php


$month_name = date("F Y", strtotime("+1 month", strtotime($month_name)));

	} ?>
	
	-->
	
	<tr>
				<td><h2>Notes (hints - add/update conetnt with "||" separated)<h2></td>
				
			</tr>
	<tr>
				<td><textarea rows="8" cols="50" name="rate_and_fair_notes"><?php echo $rate_list[$a]['rate_and_fair_notes'];  ?></textarea></td>
	</tr>
		
		</table>
		
		
		
		</table>
		
		<br/>
		<br/>
		
		
	
	<?php } ?>



<?php } else { ?>

	<?php echo "<h1>No any fair rate added yet!</h1>"; ?>

<?php } ?>

<br/>
<br/>

<a href="<?php echo $this->createUrl('/PackageDetail/rate_and_fair/'.$id); ?>">Click here to add new rate and fair</a>
</h6>

<br>
<br><!--
<form action="" method="post">

	<table>
			<tr>
				<td><h2>Notes (hints - add/update conetnt with "||" separated)<h2></td>
				<td><input type="hidden" name="package_id" value="<?php //echo $id; ?>"></td>
			</tr>
			<tr>
				<td><textarea rows="8" cols="50" name="rate_and_fair_notes"><?php // echo $package_detail[0]['rate_and_fair_notes']; ?></textarea></td>
			</tr>
			
			<tr>
			
				<td><input type="submit" value="submit"></td>
			</tr>
			
	</table>

</form>-->

