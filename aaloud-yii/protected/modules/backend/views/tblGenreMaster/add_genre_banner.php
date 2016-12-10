<?php
//session_start();
$error=0;
/*
$file_name="movie_genre_banner_".$_SESSION['storefront_id'].".xml";  
if($_REQUEST['mode']=="add")
{
	$ids=implode("','",$_REQUEST['genre']);
	$qry="SELECT id,title FROM TBL_GENRE_MASTER  WHERE id in ('".$ids."') ORDER BY title ASC ";
	$res = $conn->query($qry);

	
	$xmlData='<?xml version="1.0" encoding="UTF-8"?><root>';
	$xmlData.="<content>";

	while ($row = mysql_fetch_assoc($res)) 
	{
		$id=$row['id'];
		$title=$row['title'];
	
		$xmlData.="<genre>";
			$xmlData.="<id>";
					$xmlData.=$id;
			$xmlData.="</id>";
			$xmlData.="<title>";
					$xmlData.="<![CDATA[".$title."]]>";
			$xmlData.="</title>";
		$xmlData.="</genre>";
	}
	$xmlData.="</content>";
	$xmlData.="</root>";
	//echo $xmlData;exit;

	writeUploadXML($file_name,$xmlData,'movies/genre');
	$error=1;
}
*/
$pageid=12;
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hungamaone : Add Plan Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
<style>
/* styles for the tree */
   SPAN.TreeviewSpanArea A {
        font-size: 10pt; 
        font-family: verdana,helvetica; 
        text-decoration: none;
        color: black
   }
   SPAN.TreeviewSpanArea A:hover {
        color: '#820082';
   }
   
   
</style>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script language="Javascript" type="text/javascript" src="js/common.js"></script>
<link href="/lib/calendar/calendar-system.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="/lib/calendar/calendar.js" ></script>
<script language="javascript" type="text/javascript" src="/lib/calendar/calendar-en.js" ></script>
<script language="javascript" type="text/javascript" src="/lib/calendar/calendar-setup.js" ></script>
<script language="Javascript" type="text/javascript">
function openMovieGenre(fromfield)
	{
		
		URLStr="selectOneGenre?fromfield="+fromfield;
		window.open(URLStr, 'Select','width=620,height=650,menubar=no,resizable=yes,scrollbars=yes,toolbar=no,top=90,left=90');

	}
function checkValid()
{
	if(	document.getElementById("genreTitle1").value=="" && 
	document.getElementById("genreTitle2").value=="" &&
	document.getElementById("genreTitle3").value=="" && 
	document.getElementById("genreTitle4").value=="" && 
	document.getElementById("genreTitle5").value=="" )
	{
		alert("Select at least one genre");
		return false;
	}
}
</script>
</head>
<body>
<div id="container">
 <div id="wrapper">
            <div id="content">
               <div class="pageTitle">
	<table width="100%" cellspacing="0"><tr>
		<td><b>Genre Search</b></td>
		<td ></td>
	</tr>
   <?php if($error==1){?> 
    <tr>
		<td align="center"><strong>Genre updated successfully!!!!!!!!</strong></td>
		<td class="goUp"></td>
	</tr>
    <?php 
	}
	?>  
    </table>
</div>
<fieldset>
<legend>Genre</legend>
<form name="myform" method="post" action="add_genre_banner.php" onsubmit="return checkValid();">
<input type="hidden" name="mode" value="add">
	<table class="formTable" width="100%" cellspacing="0">
	<tr>
		<td class="name">Genre 1</td>
		<td>
		<INPUT TYPE="text" id="genreTitle1" class="input-box" readonly="readonly"> 
		<INPUT TYPE="hidden" name='genre[]' id="genre1" class="input-box"> &nbsp;	<a href="#" onclick="openMovieGenre('genre1')">Select</a></td>
	</tr>
	<tr>
		<td class="name">Genre 2</td>
		<td>
		<INPUT TYPE="text" id="genreTitle2" class="input-box" readonly="readonly"> 
		<INPUT TYPE="hidden" name='genre[]' id="genre2" class="input-box"> &nbsp;	<a href="#" onclick="openMovieGenre('genre2')">Select</a></td>
	</tr>
	<tr>
		<td class="name">Genre 3</td>
		<td>
		<INPUT TYPE="text" id="genreTitle3" class="input-box" readonly="readonly"> 
		<INPUT TYPE="hidden" name='genre[]' id="genre3" class="input-box"> &nbsp;	<a href="#" onclick="openMovieGenre('genre3')">Select</a>	</td>
	</tr>
	<tr>
		<td class="name">Genre 4</td>
		<td>
		<INPUT TYPE="text" id="genreTitle4" class="input-box" readonly="readonly"> 
		<INPUT TYPE="hidden" name='genre[]' id="genre4" class="input-box"> &nbsp;	<a href="#" onclick="openMovieGenre('genre4')">Select</a>	</td>
	</tr>
	<tr>
		<td class="name">Genre 5</td>
		<td>
		<INPUT TYPE="text" id="genreTitle5" class="input-box" readonly="readonly"> 
		<INPUT TYPE="hidden" name='genre[]' id="genre5" class="input-box"> &nbsp;	<a href="#" onclick="openMovieGenre('genre5')">Select</a>	</td>
	</tr>
	</table>
	<table width="100%" cellspacing="0" border=0 align="center">
	<tr  align="center">
		<td  align="center">
	<input type="submit" name="submit" value="Save" >
		</td>
	</tr>
	</table>
</form>
</fieldset>

<br>
<div id="searchResult" style="display:none"></div>
<div align=center id="messageSuccess" style="display:none">Updated Successfully</div>
<div id="editMovie" style="display:none"></div>
            </div>
          
      </div>
      
</div>
</body>
</html>