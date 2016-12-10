
				
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
	

	
<form action="<?php echo $this->createUrl('/PackageDetail/submit_honeymoon_rate_list'); ?>" method="post">
<h6>
<table>
<input type="hidden" value="<?php echo $id; ?>" name="package_id">
	
	
	
	
	<TR>
	<td><br/></td>
	</TR>
	
	<tr>
		<td>
			<table border="1" BORDERCOLOR=RED>
					
					<?php 
					$rate_data ='';
					if(isset($rate_list[0]['rate']) && $rate_list[0]['rate']!='') 
					{
					$rate_data = json_decode($rate_list[0]['rate'],true);
					// echo "<pre>";
					// print_r($rate_data);exit;
					
					}
					?>
					<tr>
							<td>Package category</td>
							<td>Cost per person couple</td>
							
					</tr>
					
					<tr>
							<td>Delux</td>
							<td><input type="text" name="rate[delux_cost_per_couple]" value="<?php if(isset($rate_data['delux_cost_per_couple'])) { echo $rate_data['delux_cost_per_couple']; }  ?>"></td>
							
							
					</tr>
					
					<tr>
							<td>Standard</td>
							<td><input type="text" name="rate[standard_cost_per_couple]" value="<?php if(isset($rate_data['standard_cost_per_couple'])) { echo $rate_data['standard_cost_per_couple']; }  ?>"></td>
							
					</tr>
					
					<tr>
							<td>Cost saver</td>
							<td><input type="text" name="rate[cost_saver_cost_per_couple]" value="<?php if(isset($rate_data['cost_saver_cost_per_couple'])) { echo $rate_data['cost_saver_cost_per_couple']; }  ?>"></td>
							
					</tr>
					
					<tr>
				<td><h2>Notes (hints - add/update conetnt with "||" separated)<h2></td>
				
			</tr>
	<tr>
				<td><textarea rows="8" cols="50" name="rate_and_fair_notes"><?php if(isset($rate_list[0]['rate_and_fair_notes'])) { echo $rate_list[0]['rate_and_fair_notes']; }  ?></textarea></td>
	</tr>
			</table>
		
		</td>
	</tr>
	
	
	
	
<tr>
	<td><input type="submit" name="submit" value="submit"></td>
</tr>


</table>

</h6>

</form>



