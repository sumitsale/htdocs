<?php 
//session_start();
/*
$pageid=12;
$query_id	=	trim($_GET['locationid']);
$page_id	=	trim($_GET['page_id']);	
if(empty($query_id) || !is_numeric($query_id)){
	echo "<meta http-equiv='Refresh' content=\"0;url=movie_query_listing.php\">";
    exit();
}
$querysql  = "select * from TBL_LOCATION_MASTER Where location_id='".$query_id."'";
$resultsql = mysql_query($querysql);
$rowssql   = mysql_num_rows($resultsql);
if($rowssql){
	$rowsql	=	mysql_fetch_array($resultsql);
	$QUERY_NAME	=	$rowsql["location_current_title"];
}
$sqlQuery=mysql_query("Select * from TBL_STORE_QUERY_MOVIE where QUERY_ID='".$query_id."' and STORE_FRONT_ID='".$_SESSION['storefront_id']."'")or die(mysql_error());
$nrS	=	mysql_num_rows($sqlQuery);
if($nrS){
	$rsQuery=mysql_fetch_array($sqlQuery);
}
*/
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script language="Javascript" type="text/javascript" src="js/common.js"></script>
<script language="Javascript" type="text/javascript">
function openSearchPopup()
{
	var qt = document.getElementById('hidQueryType').value;
	var ct = document.getElementById('hidContentType').value;
	var mybars='directories=no,location=no,menubar=no,status=no,toolbar=no';
	var myoptions='scrollbars,width=700,height=500,resizable=no,top=100,left=100';
	var myfeatures=mybars+','+myoptions;
	var ctv = document.getElementById('hidContentTypeVariation').value;
	var params = "?qt="+qt+"&ct="+ct+"&ctv="+ctv;
	window.open('store_movie_manual_popup.php'+params,'Search',myfeatures);
}

function setHiddenValue(key,val)
{
	if(key=='qt'){
		document.getElementById('hidQueryType').value = val;
	}
	if(key=='ct'){
		document.getElementById('hidContentType').value = val;
	}
	if(key=='ctv'){
		document.getElementById('hidContentTypeVariation').value = val;
	}
}
function getCategory(val) {
 var req = Inint_AJAX();
 req.onreadystatechange = function () {
      if (req.readyState==4) {
           if (req.status==200) {
                document.getElementById("category_div").innerHTML=req.responseText; 
           }
      }
 };
 req.open("GET", "AjaxCategoryMovie.php?content_type="+val+"&query_id="+ document.getElementById("query_id").value); 
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
 req.send(null); 
}
function chkQuery(){
	chker =/\W/;
	if(trimAll(document.form.query_name.value)==""){
		alert("Please enter the query name");
		document.form.query_name.focus();
		return false;
	}
	var iChars = "!@#$%^&*+=-[]\\\';,{}|\":<>?"; 
	for (var i = 0; i < document.form.query_name.value.length; i++) { 
		if (iChars.indexOf(document.form.query_name.value.charAt(i)) != -1) { 
			alert ("The box has special characters. \nThese are not allowed.\n"); 
			document.form.query_name.focus();
            return false; 
		} 
    } 

	
	if(trimAll(document.form.cron_frequency.value)=="" || isNaN(document.form.cron_frequency.value) || document.form.cron_frequency.value<6){
		alert("Please enter the cron frequency(Numericals) greater than 6 hours");
		document.form.cron_frequency.focus();
		return false;
	}
	/*
	if(trimAll(document.form.out_records.value)=="" || isNaN(document.form.out_records.value) || document.form.out_records.value<0){
		alert("Please enter the Records to be Outputted");
		document.form.query_name.focus();
		return false;
	}
	*/
	
	if(document.form.query_variant.value==2 && document.form.query_type[1].checked)
	{
		alert("Can not create xml for Generic Manual records.");
		return false;
	}
	
	if(document.form.content_type.value=="0")
	{
		if(document.form.specification[0].checked==false && document.form.specification[1].checked==false)
		{
			alert("Please specify about records by Artist ID or Name");
			return false;
		}
	}
}
function select_all(b,a)
	{
		var x = document.form;
		var y = eval("x."+b+".checked");
		if( y == true)
		{

			var nos = eval("x."+ a +".length");
			for(var j=0; j<nos; j++)
			{
				var s = eval("x."+ a + ".options["+j+"]");
				s.selected = true;
			}
		}
		else
		{
			var nos = eval("x."+ a +".length");
			for(var j=0; j<nos; j++)
			{
				var s = eval("x."+ a + ".options["+j+"]");
				s.selected = false;
			}
		}
	}
	function catShowOrHide(divValue) {
		if(divValue==1){
			document.getElementById('DivCategory').style.display = 'block';
			document.getElementById('DivGenCategory').style.display = 'none';
		}else{
			document.getElementById('DivCategory').style.display = 'none';	
			document.getElementById('DivGenCategory').style.display = 'block';
		}	
	}
	function Qtype() {
		
		if(document.form.query_type[0].checked==true){
			
			document.getElementById('content_div').style.display = 'none';
			document.getElementById('btnSearch').style.visibility = 'hidden';
		}else if(document.form.query_type[1].checked==true){
			document.getElementById('content_div').style.display = 'block';
			document.getElementById('btnSearch').style.visibility = 'visible';
		}
	}
	
	
	function showHideChange(val)
	{
		if(val=="0")
		{
			//hide the rows for Artist
			document.getElementById("tr_language").style.display = 'none';
			document.getElementById("tr_artist").style.display 	 = 'none';
			document.getElementById("tr_mood").style.display 	 = 'none';
			document.getElementById("tr_genre").style.display 	 = 'none';
			document.getElementById("tr_category").style.display = 'none';
			document.getElementById("tr_content_variation").style.display = 'none';
			document.getElementById("tr_recordsin").style.display = 'none';
			
			document.getElementById("tr_user_specific").style.display = '';//Show this row
		}
		else
		{
			document.getElementById("tr_language").style.display = '';
			document.getElementById("tr_artist").style.display 	 = '';
			document.getElementById("tr_mood").style.display 	 = '';
			document.getElementById("tr_genre").style.display 	 = '';
			document.getElementById("tr_category").style.display = '';
			document.getElementById("tr_content_variation").style.display = '';
			document.getElementById("tr_recordsin").style.display = '';
			
			document.getElementById("tr_user_specific").style.display = 'none';//Hide this row
		}
	}
function is_prmotional(obj){
	if(obj.checked){
		document.getElementById("tr_plan_id").style.visibility = 'visible';//Hide this row
	}else{
		document.getElementById("tr_plan_id").style.visibility = 'hidden';//Hide this row
	}
}
</script>

</head>

<body>
	<div id="container">
    	
        
        <div id="wrapper">
            <div id="content">
                <h3>Query Manager</h3>
                <form id="form" name="form" action="query_movie_result.php" method="post" onSubmit="return chkQuery();">
				<input type="hidden" name="query_id" id="query_id" value="<?php echo $query_id;?>">
				<input type="hidden" name="page_id" id="page_id" value="<?php echo $page_id;?>">
				<input type="hidden" name="query_file" value="<?php echo $rsQuery["XML_FILE_NAME"];?>">
                <input type="hidden" name="query_variant" id="query_variant" value="1">
				<input type="hidden" name="content_type" id="content_type" value="4">
				<input type="hidden" name="content_type_var" id="content_type_var" value="1">
				<table width="100%">
            	        <tr>
                            <td colspan="3"><b>QUERY MANAGER</b></td>
                        </tr>
                        <tr>
                            <td colspan="3">Note : <br/>
								* indicates all compulsary fields<br/>							</td>
                        </tr>
						<tr>
                            	<td width="120px" align="right">Location Name :</td>
                            	<td width="350px">
									<input type="text" name="query_name" value="<?php echo stripslashes($QUERY_NAME);?>" size="50" maxlength="100">								</td>
                            	<td>*</td>
                        </tr>
                        <tr>
                            	<td width="120px" align="right">Query Type :</td>
                            	<td width="350px">
                                   <input type="radio" name="query_type" id="query_type" value="1" <?php if($rsQuery["QUERY_TYPE"]==1 || $rsQuery["QUERY_TYPE"]==0){?>checked<?php }?> onClick="return Qtype();setHiddenValue('qt',this.value);">Automatic
								   <input type="radio" name="query_type" id="query_type" value="2" <?php if($rsQuery["QUERY_TYPE"]==2){?>checked<?php }?> onClick="return Qtype();setHiddenValue('qt',this.value);">Manual</td>
                            	<td>*</td>
                        </tr>
						<tr id="tr_category">
                            	<td width="120px" align="right" valign="top">Category :</td>
                            	<td width="350px">
									<div id="DivCategory">
									<input type="Checkbox" name="sel_all_chk1" onclick="select_all('sel_all_chk1','category');"> Select All<br> 
									<div id="category_div">
										<select name="category[]" multiple size="5" id="category">
										</select>
									</div>
									</div>
								</td>
                            	<td></td>
                        </tr>
						<tr id="tr_mood">
                            	<td width="120px" align="right">Censor :</td>
                            	<td width="350px" >
									<select name="censor" id="censor">
										<option value="">Select Censor</option>	
										<?php
											$query = "SELECT censor_certificate From TBL_MOVIE_MASTER Where censor_certificate!='' Group by censor_certificate Order by censor_certificate";
											$result = mysql_query($query);
											$numRows = mysql_num_rows($result);
											if($numRows > 0){
												while($row=mysql_fetch_array($result)){
													$selected='';
													if($rsQuery["CENSOR"]==$row["censor_certificate"]){$selected='selected';}
													echo "<option value='".$row["censor_certificate"]."' ".$selected.">".$row["censor_certificate"]."</option>";
												}
											}
										?>
                                    </select>
								</td> 
                            	<td></td>
                        </tr>
						<tr id="tr_artist" <?php echo $hideRow;?>>
                            	<td width="120px" align="right" valign="top">Artist :</td>
                            	<td width="350px">
									<input type="Checkbox" name="sel_all_chk4" onclick="select_all('sel_all_chk4','artist');"> Select All<br> 
									<select name="artist[]" multiple size="5" id="artist">
									<?php
										$query = "SELECT id,title From TBL_ARTIST_MASTER  Order by title";
										$result = mysql_query($query);
										$numRows = mysql_num_rows($result);
										if($numRows > 0){
											while($row=mysql_fetch_array($result)){
												$selected		=	"";
												if(strstr(trim($rsQuery["ARTIST"]),$row["id"])){
													$selected	=	"selected";	
												}
												echo "<option value='".$row["id"]."' ".$selected.">".stripslashes($row["title"])."</option>";
											}
										}
									?>
									</select>								
								</td>
                            	<td></td>
                        </tr>
						<tr id="tr_language" <?php echo $hideRow;?>>
                            	<td width="120px" align="right">Language :</td>
                            	<td width="350px" >
									<select name="language" id="language">
										<option value="">Select Language</option>	
										<?php
											$query = "SELECT language From TBL_MOVIE_MASTER Group by language Order by language";
											$result = mysql_query($query);
											$numRows = mysql_num_rows($result);
											if($numRows > 0){
												while($row=mysql_fetch_array($result)){
													$selected='';
													if(trim($rsQuery["LANGUAGE"])==trim($row["language"])){$selected='selected';}
													echo "<option value='".$row["language"]."' ".$selected.">".$row["language"]."</option>";
												}
											}
										?>
                                    </select>
								</td> 
                            	<td></td>
                        </tr>
						<tr id="tr_recordsin" <?php echo $hideRow;?>>
                            	<td width="120px" align="right">Records in:</td>
                            	<td width="350px">
									<select name="duration" id="duration">
                                    	<option value="">No Restriction</option>
										<option value="7" <?php if($rsQuery["DURATION"]){?>selected<?php }?>>Last 7 Days</option>
										<option value="15" <?php if($rsQuery["DURATION"]==15){?>selected<?php }?>>Last 15 Days</option>
										<option value="30" <?php if($rsQuery["DURATION"]==30){?>selected<?php }?>>Last 30 Days</option>
										<option value="60" <?php if($rsQuery["DURATION"]==60){?>selected<?php }?>>Last 60 Days</option>
										<option value="90" <?php if($rsQuery["DURATION"]==90){?>selected<?php }?>>Last 90 Days</option>
										<option value="120" <?php if($rsQuery["DURATION"]==120){?>selected<?php }?>>Last 120 Days</option>
										<option value="365" <?php if($rsQuery["DURATION"]==365){?>selected<?php }?>>Last 365 Days</option>
										<option value="500" <?php if($rsQuery["DURATION"]==500 || $rsQuery["DURATION"]==""){?>selected<?php }?>>Last 500 Days</option>
									</select>
								</td>
                            	<td>*</td>
                        </tr>
						<tr>
                            	<td width="120px" align="right">Cron Frequency :</td>
                            	<td width="350px">
									<input type="text" id="cron_frequency" name="cron_frequency" value="<?php if($rsQuery["CRON_FREQUENCY"]==""){ echo "6"; }else{ echo $rsQuery["CRON_FREQUENCY"];}?>" maxlength="2"> hours								</td>
                            	<td>*</td>
                        </tr>
						<tr>
                            	<td width="120px" align="right">Ouput Records :</td>
                            	<td width="350px">
									<input type="text" id="out_records" name="out_records" maxlength="2" value="<?php if($rsQuery["MAX_RECORDS"]){echo $rsQuery["MAX_RECORDS"];}else{ echo "1";}?>">								</td>
                            	<td>*</td>
                        </tr>
						<tr>
                            <td width="120px" align="right">Selected Records :</td>
                            <td width="350px">
                                <div id="content_div"  <?php if($rsQuery["QUERY_TYPE"]==1 || $rsQuery["QUERY_TYPE"]==0){?>style="display: none;"<?php }?>>
                                <input type="text" id="select_records" name="select_records" value="<?php echo stripslashes($rsQuery["MANUAL_RECORDS"]);?>" size="60">
                                </div>
                            </td>
                            <td>
                            <input type="hidden" id="hidQueryType" name="hidQueryType" value="<?php echo $rsQuery["QUERY_TYPE"] ?>" />
                            <input type="hidden" id="hidContentType" name="hidContentType" value="<?php echo $rsQuery["CONTENT_TYPE_ID"]; ?>" />																													 							<input type="hidden" id="hidContentTypeVariation" name="hidContentTypeVariation" value="<?php echo $rsQuery["ALBUM_TRACK"]; ?>"  />
                            <input id="btnSearch" name="btnSearch" type="button" value="Search" <?php if($rsQuery["QUERY_TYPE"]==1){?>style="visibility:hidden"<?php }?> onclick="openSearchPopup()"/>
                            </td>
                        </tr>
						<tr>
                            	<td colspan="3">
                            		<div align="center">
                      					<input id="button1" type="submit" value="Publish Query" /> 
                      					<input id="button2" type="reset" />
                      				</div>                            	</td>
                        </tr>
						<script language="javascript">
							getCategory(document.form.content_type.value);
						</script>
				</table>
			  </form>
            </div>
            
      </div>
   
</div>
</body>
</html>
