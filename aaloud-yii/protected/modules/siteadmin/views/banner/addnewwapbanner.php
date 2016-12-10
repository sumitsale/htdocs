<?php
	
	// echo "hi";

?>

<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>

 
 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript">
	
$(document).ready(function()
{
/*
	$(function() {
		$("[name=toggler]").click(function(){
			var curr=$(this).val();
			alert(curr);
				$('.toHide').hide();
				$("#blk-"+$(this).val()).show('slow');
		});
	 });
*/
$(":radio:eq(0)").click(function(){
	$("#blk-1").show('slow');
   $("#blk-2").hide('slow');
   $("#blk-3").hide('slow');
   $("#blk-4").hide('slow');
   $("#blk-5").hide('slow');

});

$(":radio:eq(1)").click(function(){
			   $("#blk-1").hide('slow');
               $("#blk-2").show('slow');
			   $("#blk-3").show('slow');
			   $("#blk-4").show('slow');
			   $("#blk-5").show('slow');
          });

});

	$(document).ready(function()
{
 $("input#submit").click(function() 
		{	
	
		var name = $("input#location").val();
		if(name=='')
		{return false;
			alert(name);
		}
		
		});		
});
</script>

 <form method="post" id="registerForm" action="<?php echo CController::createUrl("banner/addwapbanner"); ?>" enctype="multipart/form-data" >
 
	<table width="100%">
 
	<tr>
			<td>location</td>
			<td><input type="text" name="location" id="location"></td>
	</tr>
 
	
	<tr>
			<td>module</td>
			<td><input type="text" name="module"></td>
	</tr>
	
	
	
	<tr>
			<td>title</td>
			<td><input type="text" name="title"></td>
	</tr>
	
	<tr>
			<td>select</td>
			<td>
			<input type="radio" name="toggler"  value="1" checked="checked">enter banner code
			<input type="radio" name="toggler" value="0">upload image</td>
	</tr>
	
	<!--<div id="blk-1" class="toHide"  style="display:block">-->
		<tr  id="blk-1">
		
						<td>Banner code</td>
						<td><textarea rows="2" cols="15" name="bannercode"></textarea></td>
						
		</tr>
	<!--</div>-->
	
	<!--<div id="blk-2" class="toHide" style="display:none">-->
			<tr id="blk-2" style="display:none">
					<td>upload image 230 x 23</td>
					<td><input type="file" id="image230x23" name="230x23"></td>
			</tr>
			
			<tr id="blk-3" style="display:none">
					<td>upload image 310 x 23</td>
					<td><input type="file" name="310x23"></td>
			</tr>
			
			<tr id="blk-4" style="display:none">
					<td>upload image 342 x 23</td>
					<td><input type="file" name="342x23"></td>
			</tr>
			
			<tr id="blk-5" style="display:none">
					<td>upload image 640 x 23</td>
					<td><input type="file" name="640x23"></td>
			</tr>
	<!--</div>-->
	
	<tr>
			<td>Redirecting url</td>
			<td><input type="text" name="redirectingurl" name="redirecturl"></td>
	</tr>
	
	<tr>
			<td>status</td>
			<td>
					<select id="status" name="status">
							<option value="1">Show</option>
							<option value="0">Hide</option>
					</select>
			
			
			</td>
	</tr>
	
	<tr colspan="2">
			<td rowspan="2"><input type="submit" value="Submit" id="submit"</td>
	</tr>
 
 
 
 
	</table>
 
 </form>