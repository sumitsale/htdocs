
				
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
	

	
<form action="<?php echo $this->createUrl('/PackageDetail/submit'); ?>" method="post">
<h6>
<table>
<input type="hidden" value="<?php echo $id; ?>" name="package_id">
	<tr>
		<td>Select City  :-   
		
		<select name="city" id="city">
		
			<option value="">Select City</option>
			
			<?php for($i=0;$i<count($city);$i++) { ?>
			<option value="<?php echo $city[$i]['name']; ?>"><?php echo $city[$i]['name']; ?></option>
			<?php } ?>
		</select>
		</td>
		
		<td>
		
		
		</td>
	</tr>
	
	<tr>
		<td>
		Default city :- <input type="radio" name="default_city"  value="Yes">Yes
		<input type="radio" name="default_city" checked value="No">No
		</td>
	</tr>
	
	<TR>
	<td><br/></td>
	</TR>
	
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
							<td><input type="text" name="rate[delux_cost_per_person]" value=""></td>
							<td><input type="text" name="rate[delux_extra_adult]" value=""></td>
							<td><input type="text" name="rate[delux_chiled_extra_bed]" value=""></td>
							<td><input type="text" name="rate[delux_chiled_without_bed]" value=""></td>
							
					</tr>
					
					<tr>
							<td>Standard</td>
							<td><input type="text" name="rate[standard_cost_per_person]" value=""></td>
							<td><input type="text" name="rate[standard_extra_adult]" value=""></td>
							<td><input type="text" name="rate[standard_chiled_extra_bed]" value=""></td>
							<td><input type="text" name="rate[standard_chiled_without_bed]" value=""></td>
					</tr>
					
					<tr>
							<td>Cost saver</td>
							<td><input type="text" name="rate[cost_saver_cost_per_person]" value=""></td>
							<td><input type="text" name="rate[cost_saver_extra_adult]" value=""></td>
							<td><input type="text" name="rate[cost_saver_chiled_extra_bed]" value=""></td>
							<td><input type="text" name="rate[cost_saver_chiled_without_bed]" value=""></td>
					</tr>
			</table>
		
		</td>
	</tr>
	
	
	<tr>
	
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
	</tr>
	<!--
	<?php 
	
	
	
	$current_month = date("m");
	
	$month_name = date('F Y');
	
	for($i=$current_month;$i<=(12+$current_month);$i++) { ?>
	<tr>
		
		<td><?php 
		
	
		echo  $month_name ;  
		
		
		?></td>
		<td>
		
		
		</td>
	
	</tr>
	
	<tr>
	<td>
		Default month :- <input type="radio" name="default_month" <?php if($i==$current_month) { echo "checked";} ?>  value="<?php echo $month_name; ?>">Yes
		
	</td>
	</tr>
	
	
	<?php 
			$ts = strtotime($month_name);
			$no_of_days =  date('t', $ts);
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
					<input type="checkbox" name="available[<?php echo $month_name; ?>][]" value="<?php echo date('d F Y', $date); ?>">
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
				<td><textarea rows="8" cols="50" name="rate_and_fair_notes"></textarea></td>
	</tr>
	
	
<tr>
	<td><input type="submit" name="submit" value="submit"></td>
</tr>


</table>

</h6>

</form>



