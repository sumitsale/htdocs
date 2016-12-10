 <script type="text/javascript">
function formSubmit(){
	if(document.getElementById("genere").value=='')
	{
		alert("Please select the Genere");
		document.getElementById("genere").focus();
		return false;
	}else if(document.getElementById("nomination_for").value=='')
	{
		alert("Please select the Nomination");
		document.getElementById("nomination_for").focus();
		return false;
	}else if(document.getElementById("count").value=='')
	{
		alert("Please enter the number of count.");
		document.getElementById("count").focus();
		return false;
	}else if(document.getElementById("count").value==0)
	{
		alert("Number of count should be grater than 0.");
		document.getElementById("count").focus();
		return false;
	}else if(isNaN(document.getElementById("count").value))
	{
		alert("Number of count should be valid Numeric value.");
		document.getElementById("count").focus();
		return false;
	}else if(document.getElementById("count").value!=0 && document.getElementById("count").value!='')
	{
		var totalcount = document.getElementById("count").value;
		for(var j=1;j <= totalcount;j++ ){
			var is_num = document.getElementById("contentId_"+j).value;
			if(isNaN(is_num)){
				alert("Please enter valid Numeric value.");
				document.getElementById("contentId_"+j).focus();
				return false;
			}
			
		}
	}
	
	return true;
}
//function getdatalist(val_genere=null,val_nomination=null)
function getdatalist()
{
		
		/*if(val_genere!=null && val_nomination!=null)
		{
			var genere = val_genere;
			var nomination_for = val_nomination;
		}else
		{*/
			var genere = document.getElementById("genere").value;
			var nomination_for =document.getElementById("nomination_for").value;
		//}
		var param = "genere=" + genere+"&nomination_for="+nomination_for;
		
		if(genere!='' && nomination_for!=''){
			var req = Inint_AJAX();
			req.onreadystatechange = function () {
					if (req.readyState==4) {
						if (req.status==200) {
							//alert(req.responseText);
							document.getElementById('datalist').innerHTML = req.responseText;
						}
					}
				 };
			req.open("GET", "artist_nomination_ajax.php?"+ param);
			req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
			req.send(null);
		}	
}
function showdata()
{
	document.getElementById("rowcount").style.visibility='visible';
	getdatalist();
}

function showmoretext(value)
{
	if(isNaN(document.getElementById("count").value))
	{
		alert("Number of count should be valid Numeric value.");
		document.getElementById("count").focus();
	}else{
		var loop = value;
		var html='';
		document.getElementById("valuecount").style.visibility='visible';
		for(i=1;i <= loop ;i++){
		 html += '<table><tr><input type="text" name="contentId_'+i+'" id="contentId_'+i+'" size="35" value=""></tr></table>';
		}
		document.getElementById("moretext").innerHTML= html;
	}
}
function deleteData(nominationId)
{
		var genere = document.getElementById("genere").value;
		var nomination_for =document.getElementById("nomination_for").value;
		var param = "genere=" + genere+"&nomination_for="+nomination_for+"&nominationId="+nominationId;
		
		if(genere!='' && nomination_for!='' && nominationId!=''){
			var req = Inint_AJAX();
			req.onreadystatechange = function () {
					if (req.readyState==4) {
						if (req.status==200) {
							//alert(req.responseText);
							document.getElementById('datalist').innerHTML = req.responseText;
						}
					}
				 };
			req.open("GET", "artist_nomination_ajax/artist_nomination_ajax?"+ param);
			req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
			req.send(null);
		}	
}
							
</script>

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

 
 <div class="form">
 
 <h1><strong>Add Nomination</strong></h1>
 
 <div id="content">
               <!-- <form method="post" name="frm" action="artist_nomination.php" onsubmit="return formSubmit();">-->
								<?php $form=$this->beginWidget('CActiveForm', array(
															'id'=>'tbl-artist-nomination-form',
															'enableAjaxValidation'=>false,
														)); ?>
                  <table cellpadding="0" cellspacing="0" width="100%" border="0">
                 <tr>
                 <td width="20%">Genre</td>
                 <td>
				 <?php echo $form->dropDownList($model,'GENERE',array('Pop'=>'Pop','Rock'=>'Rock','Alternative'=>'Alternative','Global '=>'Global','Final'=>'Final'),array('prompt' => 'Select One')); ?>
               <!--  <select name="genere" id="genere">
                     <option value="">Select Genre</option>
                    <option value="alternative rock">Alternative Rock</option>
                     <option value="fusion">Fusion</option>
                     <option value="global">Global</option>
                     <option value="pop">Pop</option>
                      <option value="rock">Rock</option>
                      <option value="phase2">Phase2</option>
								 </select>-->
                 </td></tr>
                 <tr>
                 <td width="20%">Nomination For</td>
                 <td>
				 <?php echo $form->dropDownList($model,'NOMINATION_FOR',array('BS'=>'Best Song','BF'=>'Best Female','BM'=>'Best Male','BG'=>'Best Group'),
				 array(  'prompt' => 'Select One',
							  'onChange' => 'javascript:showdata()' ,
								'ajax' => array(
                                'type' => 'POST',
                              // 'dataType'=>'json',
                                'url' => CController::createUrl('Nomination/dataFromThis'),
								'update'=>'#datalist',
							)));
				?>
                 <!--<select name="nomination_for" id="nomination_for" onchange="showdata();">
                     <option value="">Select Nomination</option>
                     <option value="BS">Best Song</option>
                     <option value="BF">Best Female</option>
                     <option value="BM">Best Male</option>
                     <option value="BG">Best Group</option>
                     <option value="BGNR">Best Genere</option>
                 </select>-->
                 </td></tr>
                  <tr id="rowcount" style="visibility:hidden;">
                  	<td width="20%">Number of content</td>
                    <td>
                        <input type="text" name="count" id="count" size="35" value="" maxlength="2" onblur="showmoretext(this.value);">
                    </td>
                  </tr>
                  <tr id="valuecount" style="visibility:hidden;">
                  	<td width="20%">Enter content value</td>
                 	<td id="moretext">
                	</td>
                   </tr>
                 <tr>
									 <td width="20%" align="center"></td>
									 <td>
									 <input type="submit" name="artistvote" value="Save" onclick=" formSubmit();">&nbsp;<input type="reset" name="reset" value="Reset Options">
									 
									 </td>
								 </tr>
                 </table>
                <!--</form>-->
								<?php $this->endWidget(); ?>
            </div>
						
						<div id="datalist" style="float:left;margin:10px 0;padding:10px;width:740px;background:none repeat scroll 0 0 #FFFFFF;"></div>
      <div id="genereofweek" style="float:left;margin:10px 0;padding:10px;width:740px;background:none repeat scroll 0 0 #FFFFFF;">
      	<!--<form method="post" name="frm_genere" action="artist_nomination.php">-->
				<?php $form=$this->beginWidget('CActiveForm', array(
															'id'=>'tbl-artist-nomination-form',
															'enableAjaxValidation'=>false,
														)); ?>
                  <table cellpadding="0" cellspacing="0" width="100%" border="0">
                   <tr>
                  		<th></th>
                    <th>Please select Genre for the week</th>
                  </tr>
                    <tr>
                  		<td width="20%">Genre</td>
                    <td>
					<?php if($G_result){ ?>
					<?php echo CHtml::radioButtonList('GENERE',$G_result[0]['GENERE'],array('Pop'=>'Pop','Rock'=>'Rock','Alternative'=>'Alternative',
								'Global'=>'Global','Final'=>'Final'), // add this code
								array('separator'=>'<br/>')
							); }?>
                    <?php
					   /*$G_query  = "select GENERE from tbl_artist_genere_week";
                       $G_sql    = mysql_query($G_query) or die(mysql_error());
                       $G_nr	 = mysql_num_rows($G_sql);
                       $G_result = mysql_fetch_array($G_sql);*/
											 
						?>		 
															
													
											 
					   
                    </td>
                  </tr>
                 <tr><td width="20%" align="center"></td><td><input type="submit" name="genere_week" value="Update">&nbsp;<input type="reset" name="reset" value="Reset Options"></td></tr>
                 </table>
                <!--</form>-->
								<?php $this->endWidget(); ?>
      </div>
			
</div><!-- form -->