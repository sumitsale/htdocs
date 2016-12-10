<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */
/* @var $form CActiveForm */
?>



	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$hotel,
	'attributes'=>array(
		//'id',
		'hotel_name',
		'thumbnail',
		'address',
		'start_price',
		'description', 	
		'rating',
		'date_added',
		'date_modified',
	),
)); ?>




<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotel-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'meta_tag'); ?>
		<?php echo $form->textArea($model,'meta_tag',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_tag'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'hotel_id'); ?>
		<?php echo $form->hiddenField($model,'hotel_id',array('value'=>$hotelid)); ?>
		<?php //echo $form->error($model,'hotel_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_1'); ?>
		<?php echo $form->fileField($model,'thumbnail_1',array('size'=>60,'maxlength'=>500)); ?>
		<?php if($model->thumbnail_1 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_1.">".$model->thumbnail_1."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_2'); ?>
		<?php echo $form->fileField($model,'thumbnail_2',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_2 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_2.">".$model->thumbnail_2."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_3'); ?>
		<?php echo $form->fileField($model,'thumbnail_3',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_3 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_3.">".$model->thumbnail_3."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_4'); ?>
		<?php echo $form->fileField($model,'thumbnail_4',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_4 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_4.">".$model->thumbnail_4."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_5'); ?>
		<?php echo $form->fileField($model,'thumbnail_5',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_5 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_5.">".$model->thumbnail_5."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overview_paragraph_1'); ?>
		<?php //echo $form->textArea($model,'overview_paragraph_1',array('rows'=>6, 'cols'=>50)); ?>
		 <?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'overview_paragraph_1',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh1',
                    'name'=>'overview_paragraph_1',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->overview_paragraph_1,
            ));
            ?>
			
		<?php echo $form->error($model,'overview_paragraph_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overview_paragraph_2'); ?>
		<?php //echo $form->textArea($model,'overview_paragraph_2',array('rows'=>6, 'cols'=>50)); ?>
		
		<?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'overview_paragraph_2',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh2',
                    'name'=>'overview_paragraph_2',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->overview_paragraph_2,
            ));
            ?>
			
		<?php echo $form->error($model,'overview_paragraph_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overview_paragraph_3'); ?>
		<?php //echo $form->textArea($model,'overview_paragraph_3',array('rows'=>6, 'cols'=>50)); ?>
		
		<?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'overview_paragraph_3',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh3',
                    'name'=>'overview_paragraph_3',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->overview_paragraph_3,
            ));
            ?>
			
		<?php echo $form->error($model,'overview_paragraph_3'); ?>
	</div>
	
	
	
	<script type="text/javascript">
	
		var hotel_room_count = "<?php echo (count($hotel_room)); ?>";
		
		
			if(hotel_room_count==0)
		{
		hotel_room_count =  parseInt(hotel_room_count)+1;
		}
		
		
		// function add_more()
		// {
		// alert(1);
		 // var input = '<div id="packages_itinerary_listing"><b>Itinerary day 1 heading</b></br><input type="text" name="itinerary_day_1_heading"></br><b>itinerary day 1 description</b></br><textarea rows="4" cols="50" name="itinerary_day_1_description"></textarea></br></div>';
		// $('#packages_itinerary_listing').append($input);
		
		
		// }
		
		$(document).ready(function(){
		
			$("#add_more").click(function(){
			
			if(hotel_room_count == 15)
			{
			return false;
			}
			
			hotel_room_count= parseInt(hotel_room_count)+1;
			
			 // var input = '<div id="room_type_listing"><b>Room '+hotel_room_count+' Type</b></br><select name="room_type_'+hotel_room_count+'"><option value="">Select room type</option><option value="STANDARD">STANDARD</option><option value="DELUX">DELUX </option><option value="SUPER DELUX">SUPER DELUX</option><option value="SEMI DELUX">SEMI DELUX</option><option value="VILLA">VILLA</option></select></br><b>Room '+hotel_room_count+' Amunities</b></br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam'+hotel_room_count+'"> Neque porro quisquam'+hotel_room_count+'</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam2"> Neque porro quisquam2</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam3"> Neque porro quisquam3</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam4"> Neque porro quisquam4</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam5"> Neque porro quisquam5</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam6"> Neque porro quisquam6</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam7"> Neque porro quisquam7</br><input type="checkbox" name="room_'+hotel_room_count+'_amunities[]" value="Neque porro quisquam8"> Neque porro quisquam8</br></br><b>Room '+hotel_room_count+' Thumbnail</b></br><input type="file" name="room_thubnail_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Inclusion</b></br><input type="text" size="70" name="room_inclusion_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' price</b></br><input type="text" size="50" name="room_charges_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' price with offer</b></br><input type="text" size="50" name="room_charges_with_offer_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' Accomodation Chargres </b></br><input type="text" size="50"  name="room_accomodation_charges_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Accomodation Chargres </b></br><table><tr><td>Extra Adult</td><td>Child with bed (CWB)</td><td>Child no bed (CNB)</td></tr><tr><td><input type="text" name="extra_adult_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_with_bed_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_no_bed_'+hotel_room_count+'" value=""></td></tr><tr><td><br></td></tr></table><table><tr><td>Notes - hint(add content "||" separated)</td></tr><tr><td><textarea name="notes_'+hotel_room_count+'"></textarea></td></tr></table></div>';
			 // var input = '<div id="room_type_listing"><b>Room '+hotel_room_count+' Type</b></br><select name="room_type_'+hotel_room_count+'"><option value="">Select room type</option><option value="STANDARD">STANDARD</option><option value="DELUX">DELUX </option><option value="SUPER DELUX">SUPER DELUX</option><option value="SEMI DELUX">SEMI DELUX</option><option value="VILLA">VILLA</option></select></br><b>Room '+hotel_room_count+' Thumbnail</b></br><input type="file" name="room_thubnail_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Inclusion</b></br><input type="text" size="70" name="room_inclusion_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' price</b></br><input type="text" size="50" name="room_charges_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' price with offer</b></br><input type="text" size="50" name="room_charges_with_offer_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' Accomodation Chargres </b></br><input type="text" size="50"  name="room_accomodation_charges_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Accomodation Chargres </b></br><table><tr><td>Extra Adult</td><td>Child with bed (CWB)</td><td>Child no bed (CNB)</td></tr><tr><td><input type="text" name="extra_adult_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_with_bed_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_no_bed_'+hotel_room_count+'" value=""></td></tr><tr><td><br></td></tr></table><table><tr><td>Notes - hint(add content "||" separated)</td></tr><tr><td><textarea name="notes_'+hotel_room_count+'"></textarea></td></tr></table></div>';
			 var input = '<div id="room_type_listing"><b>Room '+hotel_room_count+' Type</b></br><select name="room_type_'+hotel_room_count+'"><option value="">Select room type</option><option value="STANDARD">STANDARD</option><option value="DELUX">DELUX </option><option value="SUPER DELUX">SUPER DELUX</option><option value="SEMI DELUX">SEMI DELUX</option><option value="VILLA">VILLA</option></select></br><b>Room '+hotel_room_count+' Thumbnail</b></br><input type="file" name="room_thubnail_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Inclusion</b></br><input type="text" size="70" name="room_inclusion_'+hotel_room_count+'"><br/><b>Room '+hotel_room_count+' Exclusion</b></br><input type="text" size="70" name="room_exclusion_'+hotel_room_count+'"></br></br><b>Room '+hotel_room_count+' price</b></br><input type="text" size="50" name="room_charges_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' price with offer</b></br><input type="text" size="50" name="room_charges_with_offer_'+hotel_room_count+'"></br> <b>Room '+hotel_room_count+' Accomodation Chargres </b></br><input type="text" size="50"  name="room_accomodation_charges_'+hotel_room_count+'"></br><b>Room '+hotel_room_count+' Accomodation Chargres </b></br><table><tr><td>Extra Adult</td><td>Child with bed (CWB)</td><td>Child no bed (CNB)</td></tr><tr><td><input type="text" name="extra_adult_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_with_bed_'+hotel_room_count+'" value=""></td><td><input type="text" name="chiled_no_bed_'+hotel_room_count+'" value=""></td></tr><tr><td><br></td></tr></table><table><tr><td>Notes - hint(add content "||" separated)</td></tr><tr><td><textarea name="notes_'+hotel_room_count+'"></textarea></td></tr></table></div>';
			$('#room_type_listing_append').append(input);
		
			});
			
			$('.remove_hootel_remove').click(function(){
			
			var dataString = 'id='+  $(this).attr('room_id');
			
			$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("HotelDetail/deleteroom"); ?>",
			data: dataString,
			success: function(data) 
			{
		
				if(data==200)
				{

				 window.location.href =  window.location.href;

				}
				else
				{
					 window.location.href =  window.location.href;
				}
			}
        })
			
				
				
			});
			
		
		})
	
	</script>
	
	
	
	<div id="room_type">
	
	<?php if(count($hotel_room) == 0) { ?>
		<div id="room_type_listing">
			<b>Room 1 Type</b></br>
			<select name="room_type_1">
				
				<option value="">Select room type</option>
				<option value="STANDARD">STANDARD</option>
				<option value="DELUX">DELUX</option>
				<option value="SUPER DELUX">SUPER DELUX</option>
				<option value="SEMI DELUX">SEMI DELUX</option>
				<option value="VILLA">VILLA</option>
				
			</select>		</br>
			
			<!--<b>Room 1 Amunities</b></br>
			
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam1"> Neque porro quisquam1</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam2"> Neque porro quisquam2</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam3"> Neque porro quisquam3</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam4"> Neque porro quisquam4</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam5"> Neque porro quisquam5</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam6"> Neque porro quisquam6</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam7"> Neque porro quisquam7</br>
			<input type="checkbox" name="room_1_amunities[]" value="Neque porro quisquam8"> Neque porro quisquam8</br>
			
			
			</br>-->
				
			<b>Room 1 Thumbnail</b></br>
			<input type="file" name="room_thubnail_1"></br>
			
			<b>Room 1 Inclusion</b></br>
			<input type="text" size="70" name="room_inclusion_1"></br>
			
			<b>Room 1 Exclusion</b></br>
			<input type="text" size="70" name="room_exclusion_1"></br>
			
			<b>Room 1 price</b></br>
			<input type="text" size="50" name="room_charges_1"></br>
			
			<b>Room 1 price with offer</b></br>
			<input type="text" size="50" name="room_charges_with_offer_1"></br>
			
			<!--<b>Room 1 Accomodation Chargres </b></br>
			<input type="text" size="50"  name="room_accomodation_charges_1"></br>-->
			<b>Room 1 Accomodation Chargres </b></br>

			<table>
					<tr>
							<td>Extra Adult</td>
							<td>Child with bed (CWB)</td>
							<td>Child no bed (CNB)</td>
					</tr>
					
					<tr>
							<td><input type="text" name="extra_adult_1" value=""></td>
							<td><input type="text" name="chiled_with_bed_1" value=""></td>
							<td><input type="text" name="chiled_no_bed_1" value=""></td>
					</tr>
					
					<tr>
						<td><br></td>
					</tr>
			</table>		
			<table>		
			
					<tr>
					<td>Notes - hint(add content "||" separated)</td>
					</tr>
					<tr>
						<td><textarea name="notes_1"></textarea></td>
					</tr>
					
			</table>
			
		
			
		</div>
		<div id="room_type_listing_append">
		</div>
		
	<?php }

	else {

		for($i=0;$i<count($hotel_room);$i++) {
		
		?>

		<div id="room_type_listing">
			<b>Room <?php  echo ($i+1);?> Type</b></br>
			
			<select name="room_type_<?php  echo ($i+1);?>">
				
				<option value="">Select room type</option>
				<option <?php if($hotel_room[$i]['room_type'] == "STANDARD" ) { echo "selected";} ?> value="STANDARD">STANDARD</option>
				<option <?php if($hotel_room[$i]['room_type'] == "DELUX" ) { echo "selected";} ?>  value="DELUX">DELUX </option>
				<option <?php if($hotel_room[$i]['room_type'] == "SUPER DELUX" ) { echo "selected";} ?> value="SUPER DELUX">SUPER DELUX</option>
				<option <?php if($hotel_room[$i]['room_type'] == "SEMI DELUX" ) { echo "selected";} ?> value="SEMI DELUX">SEMI DELUX</option>
				<option <?php if($hotel_room[$i]['room_type'] == "VILLA" ) { echo "selected";} ?> value="VILLA">VILLA</option>
				
			</select>		</br>
			
			
			<?php $romm_amunites = explode(',',$hotel_room[$i]['room_amunities']); ?>
			
			
			
			<!--<b>Room <?php  echo ($i+1);?> Amunities</b></br>
			
			<input type="checkbox" <?php if(in_array('Neque porro quisquam1',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam1"> Neque porro quisquam1</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam2',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam2"> Neque porro quisquam2</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam3',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam3"> Neque porro quisquam3</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam4',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam4"> Neque porro quisquam4</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam5',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam5"> Neque porro quisquam5</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam6',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam6"> Neque porro quisquam6</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam7',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam7"> Neque porro quisquam7</br>
			<input type="checkbox" <?php if(in_array('Neque porro quisquam8',$romm_amunites))  { echo "checked";} ?> name="room_<?php  echo ($i+1);?>_amunities[]" value="Neque porro quisquam8"> Neque porro quisquam8</br>
			
			
			</br>-->
				
			<b>Room <?php  echo ($i+1);?> Thumbnail</b></br>
			<input type="file"  name="room_thubnail_<?php  echo ($i+1);?>"></br>
			
			<b>Room <?php  echo ($i+1);?> Inclusion</b></br>
			<input type="text" value="<?php echo $hotel_room[$i]['inclusion']; ?>" size="70" name="room_inclusion_<?php  echo ($i+1);?>"></br>
			
			<b>Room <?php  echo ($i+1);?> Exclusion</b></br>
			<input type="text" value="<?php echo $hotel_room[$i]['exclusion']; ?>" size="70" name="room_exclusion_<?php  echo ($i+1);?>"></br>
			
			<b>Room <?php  echo ($i+1);?> price</b></br>
			<input type="text" value="<?php echo $hotel_room[$i]['charges']; ?>" size="50" name="room_charges_<?php  echo ($i+1);?>"></br>
			
			
			<b>Room <?php  echo ($i+1);?> price with offer</b></br>
			<input type="text" value="<?php echo $hotel_room[$i]['price_with_offer']; ?>" size="50" name="room_charges_with_offer_<?php  echo ($i+1);?>"></br>
			
			
			<!--<b>Room <?php  echo ($i+1);?> Accomodation Chargres </b></br>
			<input type="text" value="<?php echo $hotel_room[$i]['accomodation_charges']; ?>" size="50"  name="room_accomodation_charges_<?php  echo ($i+1);?>"></br>-->
			
				<b>Room <?php  echo ($i+1);?> Accomodation Chargres </b></br>

				<?php 
						$accomodation_charges_array = array();
						$accomodation_charges_array = json_decode($hotel_room[$i]['accomodation_charges']); 
				
				// echo "<pre>";
				// print_r($accomodation_charges_array);exit;
				
				?>
				
					<table>
							<tr>
									<td>Extra Adult</td>
									<td>Child with bed (CWB)</td>
									<td>Child no bed (CNB)</td>
							</tr>
							
							<tr>
									<td><input type="text" name="extra_adult_<?php  echo ($i+1);?>" value="<?php if(isset($accomodation_charges_array->extra_adult)) { echo $accomodation_charges_array->extra_adult; } ?>"></td>
									<td><input type="text" name="chiled_with_bed_<?php  echo ($i+1);?>" value="<?php if(isset($accomodation_charges_array->chiled_with_bed)) {echo $accomodation_charges_array->chiled_with_bed; } ?>"></td>
									<td><input type="text" name="chiled_no_bed_<?php  echo ($i+1);?>" value="<?php if(isset($accomodation_charges_array->chiled_no_bed)) { echo $accomodation_charges_array->chiled_no_bed; } ?>"></td>
							</tr>
							
							<tr>
								<td><br></td>
							</tr>
					</table>		
					<table>		
					
							<tr>
							<td>Notes - hint(add content "||" separated)</td>
							</tr>
							<tr>
								<td><textarea name="notes_<?php  echo ($i+1);?>"><?php if(isset($accomodation_charges_array->notes)) { echo $accomodation_charges_array->notes; }  ?></textarea></td>
							</tr>
							
					</table>
					
			
			<input type="button" name="Remove" class="remove_hootel_remove" room_id="<?php echo $hotel_room[$i]['id']; ?>" value="Remove Room <?php echo ($i+1);?>">
		</div>
	
	
	
	<?php } ?>
	<div id="room_type_listing_append">
		</div>
	<?php } ?>
		<input type="button" id="add_more" value="Add more">
	</div>
	
	
	
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'room_1_type'); ?>
		<?php echo $form->dropDownList($model,'room_1_type',array('STANDARD'=>'STANDARD',
																'DELUX'=>'DELUX	',
																// 'Hotel Amunities3'=>'Hotel Amunities3',
																)); ?>
		<?php echo $form->error($model,'room_1_type'); ?>
	</div>-->

	
		<?php 
	
		$room_1_amunites_option = array();
		
		if($model->room_1_amunities !='')
		{
			$romm_1_amunites = explode(',',$model->room_1_amunities);
			
			// echo "<pre>";
			// print_r($hotel_id);exit;
			
			for($i=0;$i<count($romm_1_amunites);$i++)
			{
				$room_1_amunites_option[$romm_1_amunites[$i]] = array('selected'=>'selected');
			}
		}
	
	?>
	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'room_1_amunities'); ?>
		<?php echo $form->dropDownList($model,'room_1_amunities',array('Neque porro quisquam1'=>'Neque porro quisquam1',
																'Neque porro quisquam2'=>'Neque porro quisquam2',
																'Neque porro quisquam3'=>'Neque porro quisquam3',
																'Neque porro quisquam4'=>'Neque porro quisquam4',
																'Neque porro quisquam5'=>'Neque porro quisquam5',
																'Neque porro quisquam6'=>'Neque porro quisquam6',
																'Neque porro quisquam7'=>'Neque porro quisquam7',
																'Neque porro quisquam8'=>'Neque porro quisquam8')
																,array('multiple'=>'multiple','options'=>$room_1_amunites_option)); ?>
		<?php echo $form->error($model,'room_1_amunities'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_1_thumbnail'); ?>
		<?php echo $form->fileField($model,'room_1_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_1_thumbnail'); ?>
	</div>

	
		<div class="row">
		<?php echo $form->labelEx($model,'room_1_inclusion'); ?>
		<?php echo $form->textField($model,'room_1_inclusion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_1_inclusion'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_1_charges'); ?>
		<?php echo $form->textField($model,'room_1_charges',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_1_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_1_accomodation_chargres'); ?>
		<?php echo $form->textField($model,'room_1_accomodation_chargres',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_1_accomodation_chargres'); ?>
	</div>
	
	


	<div class="row">
		<?php echo $form->labelEx($model,'room_2_type'); ?>
		<?php echo $form->dropDownList($model,'room_2_type',array('STANDARD'=>'STANDARD',
																'DELUX'=>'DELUX	',
																// 'Hotel Amunities3'=>'Hotel Amunities3',
																)); ?>
		<?php echo $form->error($model,'room_2_type'); ?>
	</div>

	
	<?php 
	
		$room_2_amunites_option = array();
		
		if($model->room_2_amunities !='')
		{
			$room_2_amunites = explode(',',$model->room_2_amunities);
			
			// echo "<pre>";
			// print_r($hotel_id);exit;
			
			for($i=0;$i<count($room_2_amunites);$i++)
			{
				$room_2_amunites_option[$room_2_amunites[$i]] = array('selected'=>'selected');
			}
		}
	
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_2_amunities'); ?>
		<?php echo $form->dropDownList($model,'room_2_amunities',array('Neque porro quisquam1'=>'Neque porro quisquam1',
																'Neque porro quisquam2'=>'Neque porro quisquam2',
																'Neque porro quisquam3'=>'Neque porro quisquam3',
																'Neque porro quisquam4'=>'Neque porro quisquam4',
																'Neque porro quisquam5'=>'Neque porro quisquam5',
																'Neque porro quisquam6'=>'Neque porro quisquam6',
																'Neque porro quisquam7'=>'Neque porro quisquam7',
																'Neque porro quisquam8'=>'Neque porro quisquam8')
																,array('multiple'=>'multiple','options'=>$room_2_amunites_option)); ?>
		<?php echo $form->error($model,'room_2_amunities'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_2_thumbnail'); ?>
		<?php echo $form->fileField($model,'room_2_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_2_thumbnail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_2_inclusion'); ?>
		<?php echo $form->textField($model,'room_2_inclusion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_2_inclusion'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_2_charges'); ?>
		<?php echo $form->textField($model,'room_2_charges',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_2_charges'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_2_accomodation_chargres'); ?>
		<?php echo $form->textField($model,'room_2_accomodation_chargres',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_2_accomodation_chargres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_3_type'); ?>
		<?php echo $form->dropDownList($model,'room_3_type',array('STANDARD'=>'STANDARD',
																'DELUX'=>'DELUX	',
																// 'Hotel Amunities3'=>'Hotel Amunities3',
																)); ?>
		<?php echo $form->error($model,'room_3_type'); ?>
	</div>

	
	<?php 
	
		$room_3_amunites_option = array();
		
		if($model->room_3_amunities !='')
		{
			$room_3_amunites = explode(',',$model->room_3_amunities);
			
			// echo "<pre>";
			// print_r($hotel_id);exit;
			
			for($i=0;$i<count($room_2_amunites);$i++)
			{
				$room_3_amunites_option[$room_3_amunites[$i]] = array('selected'=>'selected');
			}
		}
	
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_3_amunities'); ?>
		<?php echo $form->dropDownList($model,'room_3_amunities',array('Neque porro quisquam1'=>'Neque porro quisquam1',
																'Neque porro quisquam2'=>'Neque porro quisquam2',
																'Neque porro quisquam3'=>'Neque porro quisquam3',
																'Neque porro quisquam4'=>'Neque porro quisquam4',
																'Neque porro quisquam5'=>'Neque porro quisquam5',
																'Neque porro quisquam6'=>'Neque porro quisquam6',
																'Neque porro quisquam7'=>'Neque porro quisquam7',
																'Neque porro quisquam8'=>'Neque porro quisquam8')
																,array('multiple'=>'multiple','options'=>$room_3_amunites_option)); ?>
		<?php echo $form->error($model,'room_3_amunities'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_3_thumbnail'); ?>
		<?php echo $form->fileField($model,'room_3_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_3_thumbnail'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'room_3_charges'); ?>
		<?php echo $form->textField($model,'room_3_charges',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_3_charges'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'room_3_inclusion'); ?>
		<?php echo $form->textField($model,'room_3_inclusion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_3_inclusion'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'room_3_accomodation_chargres'); ?>
		<?php echo $form->textField($model,'room_3_accomodation_chargres',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'room_3_accomodation_chargres'); ?>
	</div>-->	
	
	
	
	
	<?php 
	
		$hotel_amunites_option = array();
		
		if($model->hotel_amunities !='')
		{
			$hodel_amunites = explode(',',$model->hotel_amunities);
			
			// echo "<pre>";
			// print_r($hotel_id);exit;
			
			for($i=0;$i<count($hodel_amunites);$i++)
			{
				$hotel_amunites_option[$hodel_amunites[$i]] = array('selected'=>'selected');
			}
		}
		else
		{
			$hodel_amunites = array();
		}
	
	?>
	
		<?php echo $form->labelEx($model,'hotel_amunities'); ?>
		
		<input type="checkbox" <?php if(in_array("Travel Desk",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Travel Desk">	Travel Desk &nbsp;&nbsp;
		<input type="checkbox"  <?php if(in_array("Restaurant",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Restaurant">		Restaurant &nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Laundry",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Laundry">	Laundry&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("24 Hours Security",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="24 Hours Security">	24 Hours Security&nbsp;&nbsp;
		<input type="checkbox"  <?php if(in_array("Doctor On Call",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Doctor On Call">		Doctor On Call&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Wi Fi",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Wi Fi">		Wi Fi&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("Gym",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Gym">	Gym&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("24 Hour Front Desk",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="24 Hour Front Desk">	24 Hour Front Desk&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Conference Facilitie",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Conference Facilities">		Conference Facilities&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("Parking",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Parking">	Parking&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Catering Services",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Catering Services">	Catering Services&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Bar",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Bar">		Bar&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("Internet",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Internet">		Internet&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Coffee Shop",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Coffee Shop">	Coffee Shop&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Air Conditioner",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Air Conditioner">	Air Conditioner&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("Elevators",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Elevators">	Elevators&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Wheel Chair Access",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Wheel Chair Access">	 Wheel Chair Access&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("Benqute Facilities",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Benqute Facilities">	 Benqute Facilities&nbsp;&nbsp;<br><br>
		<input type="checkbox" <?php if(in_array("Room Service",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Room Service">		Room Service&nbsp;&nbsp;
		<input type="checkbox" <?php if(in_array("24 Hour Check in",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="24 Hour Check in">		24 Hour Check in&nbsp;&nbsp;
		<input type="checkbox"  <?php if(in_array("Pool",$hodel_amunites)) { echo "checked"; }?> name="hotel_amunities[]" value="Pool">		Pool&nbsp;&nbsp;<br><br>
		
		
		<br>
			<?php 
	
		$room_amunites_option = array();
		
		if($model->hotel_amunities !='')
		{
			$room_amunitie = explode(',',$model->room_amunitie);
			
			// echo "<pre>";
			// print_r($hotel_id);exit;
			
			for($i=0;$i<count($room_amunitie);$i++)
			{
				$room_amunites_option[$room_amunitie[$i]] = array('selected'=>'selected');
			}
		}
		else
		{
			$room_amunitie = array();
		}
	
	?>
		<?php echo $form->labelEx($model,'room_amunitie'); ?>
		
		<input type="checkbox"  <?php if(in_array("Air Conditioner",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Air Conditioning" name="">Air Conditioner
		<input type="checkbox"  <?php if(in_array("Electronic Safe",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Electronic Safe" name=""> Electronic Safe
		<input type="checkbox"  <?php if(in_array("Bath Tub",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Bath Tub" name=""> Bath Tub <br><br>
		<input type="checkbox"  <?php if(in_array("Tea/Coffee Maker",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Tea/Coffee Maker" name=""> Tea/Coffee Maker 
		<input type="checkbox"  <?php if(in_array("Hot & Cold Running Water",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Hot & Cold Running Water" name=""> Hot & Cold Running Water
		<input type="checkbox"  <?php if(in_array("Balcony / Sit Out",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Balcony / Sit Out" name=""> Balcony / Sit Out<br><br>
		<input type="checkbox"  <?php if(in_array("Telephone",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Telephone" name=""> Telephone	
		<input type="checkbox"  <?php if(in_array("Intercom",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Intercom" name=""> Intercom
		<input type="checkbox"   <?php if(in_array("Hot/cold Water Hair Dryer",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Hot/cold Water Hair Dryer" name=""> Hot/cold Water Hair Dryer<br><br>
		<input type="checkbox"  <?php if(in_array("Mineral Water",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Mineral Water" name=""> Mineral Water
		<input type="checkbox"  <?php if(in_array("IntercMini bar",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="IntercMini bar" name=""> IntercMini bar
		<input type="checkbox"  <?php if(in_array("Trouser Press",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Trouser Press" name=""> Trouser Press<br><br>
		<input type="checkbox"  <?php if(in_array("Room Service",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Room Service" name=""> Room Service
		<input type="checkbox"  <?php if(in_array("Satellite television",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Satellite television" name=""> Satellite television
		<input type="checkbox"  <?php if(in_array("Attached Bath",$room_amunitie)) { echo "checked"; }?> name="room_amunitie[]" value="Attached Bath" name=""> Attached Bath<br><br>

		
		
	<!--	<div class="row">
		<?php echo $form->labelEx($model,'no_of_floor'); ?>
		<?php echo $form->textField($model,'no_of_floor'); ?>
		<?php echo $form->error($model,'no_of_floor'); ?>
	</div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'no_of_room'); ?>
		<?php echo $form->textField($model,'no_of_room'); ?>
		<?php echo $form->error($model,'no_of_room'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'check_in_time'); ?>
		<?php echo $form->textField($model,'check_in_time'); ?>
		<?php echo $form->error($model,'check_in_time'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'check_out_time'); ?>
		<?php echo $form->textField($model,'check_out_time'); ?>
		<?php echo $form->error($model,'check_out_time'); ?>
	</div>-->
	
	<div class="row">
		<?php echo $form->labelEx($model,'notes_data'); ?>
		<?php echo $form->textarea($model,'notes_data', array('rows'=>6, 'cols'=>50)); ?>
		<?php echo " Hint - add content with '||' separated." ; ?>
		<?php echo $form->error($model,'notes_data'); ?>
	</div>
		
	<!--<div class="row">
		<?php echo $form->labelEx($model,'hotel_amunities'); ?>
		<?php echo $form->dropDownList($model,'hotel_amunities',array('Travel Desk'=>'Travel Desk',
																'Restaurant'=>'Restaurant',
																'Laundry'=>'Laundry',
																'24 Hours Security'=>'24 Hours Security',
																'Doctor On Call '=>'Doctor On Call ',
																'Wi Fi '=>'Wi Fi ',
																'Gym'=>'Gym',
																'24 Hour Front Desk'=>'24 Hour Front Desk',
																'Conference Facilities '=>'Conference Facilities',
																'Parking'=>'Parking',
																'Catering Services'=>'Catering Services',
																'Bar'=>'Bar',
																'Internet'=>'Internet',
																'Internet'=>'Internet',
																'Coffee Shop'=>'Coffee Shop',+
																'Air Conditioner '=>'Air Conditioner ',
																'Elevators'=>'Elevators',
																'Wheel Chair Access'=>'Wheel Chair Access',
																'Benqute Facilities'=>'Benqute Facilities',
																'Room Service'=>'Room Service',
																'24 Hour Check in'=>'24 Hour Check in',
																'Pool'=>'Pool',
																
																
																),array('multiple'=>'multiple','options'=>$hotel_amunites_option)); ?>
		<?php echo $form->error($model,'hotel_amunities'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->