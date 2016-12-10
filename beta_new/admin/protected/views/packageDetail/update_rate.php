
				
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
				
<form action="<?php echo $this->createUrl('/PackageDetail/submit_udate_rate'); ?>" method="post">
<h6>
<table>
<input type="hidden" value="<?php echo $id; ?>" name="id">
	<tr>
		<td>Select City
		
		
		<select name="city" id="city">
		
			<option value="">Select City</option>
			
			<?php for($i=0;$i<count($city);$i++) { ?>
			<option <?php if($rate_list[0]['city'] == $city[$i]['name']) { echo "selected=selected";} ?> value="<?php echo $city[$i]['name']; ?>"><?php echo $city[$i]['name']; ?></option>
			<?php } ?>
		</select>
		</td>
	</tr>
	
		<tr>
		<td>
		Default city :- <input type="radio" name="default_city" <?php if($rate_list[0]['default_list'] == "Yes") { echo "checked";}?> value="Yes">Yes
		<input type="radio" name="default_city" <?php if($rate_list[0]['default_list'] == "No") { echo "checked";}?> value="No">No
		</td>
	</tr>
	
	
	<tr>
	
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
	</tr>
	
	<tr>
	<td><br/></td>
	</tr>
	
	
	<?php $rate = json_decode($rate_list[0]['rate']); 
	
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
							<td><input type="text" name="rate[delux_cost_per_person]" value="<?php  echo $rate->delux_cost_per_person; ?>"></td>
							<td><input type="text" name="rate[delux_extra_adult]" value="<?php  echo $rate->delux_extra_adult; ?>"></td>
							<td><input type="text" name="rate[delux_chiled_extra_bed]" value="<?php  echo $rate->delux_chiled_extra_bed; ?>"></td>
							<td><input type="text" name="rate[delux_chiled_without_bed]" value="<?php  echo $rate->delux_chiled_without_bed; ?>"></td>
							
					</tr>
					
					<tr>
							<td>Standard</td>
							<td><input type="text" name="rate[standard_cost_per_person]" value="<?php  echo $rate->standard_cost_per_person; ?>"></td>
							<td><input type="text" name="rate[standard_extra_adult]" value="<?php  echo $rate->standard_extra_adult; ?>"></td>
							<td><input type="text" name="rate[standard_chiled_extra_bed]" value="<?php  echo $rate->standard_chiled_extra_bed; ?>"></td>
							<td><input type="text" name="rate[standard_chiled_without_bed]" value="<?php  echo $rate->standard_chiled_without_bed; ?>"></td>
					</tr>
					
					<tr>
							<td>Cost saver</td>
							<td><input type="text" name="rate[cost_saver_cost_per_person]" value="<?php  echo $rate->cost_saver_cost_per_person; ?>"></td>
							<td><input type="text" name="rate[cost_saver_extra_adult]" value="<?php  echo $rate->cost_saver_extra_adult; ?>"></td>
							<td><input type="text" name="rate[cost_saver_chiled_extra_bed]" value="<?php  echo $rate->cost_saver_chiled_extra_bed; ?>"></td>
							<td><input type="text" name="rate[cost_saver_chiled_without_bed]" value="<?php  echo $rate->cost_saver_chiled_without_bed; ?>"></td>
					</tr>
			</table>
		
		</td>
	</tr>
		
		<!--
	
	<?php 
	
	
		$avilable_date  = json_decode($rate_list[0]['available_date']);
		
			$current_month = date("m");
	
	$month_name = date('F Y');
	
		for($i=$current_month;$i<=(12+$current_month);$i++) { 
	
	
	
	
	?>
	<tr>
		
		<td><?php 
		
		
		echo  $month_name ;  			?>
		</td>
		<td></td>
	
	</tr>
	
	<tr>
	<td>
		Default month :- <input type="radio" name="default_month" <?php if($month_name==$rate_list[0]['default_month']) { echo "checked";} ?>  value="<?php echo $month_name; ?>">Yes
		
	</td>
	</tr>
	<?php 
			$ts = strtotime($month_name. date('Y'));
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
				<td><textarea rows="8" cols="50" name="rate_and_fair_notes"><?php if(isset($rate_list[0]['rate_and_fair_notes'])) { echo $rate_list[0]['rate_and_fair_notes']; }?></textarea></td>
	</tr>
<tr>
	<td><input type="submit" name="submit" value="submit"></td>
</tr>

</table>

</h6>

</form>