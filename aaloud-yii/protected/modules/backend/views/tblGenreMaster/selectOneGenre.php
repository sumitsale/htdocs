<?php
$xml_path="application/xml/movies/";

$fromfield=$_REQUEST['fromfield'];
$fromfieldTitle=str_replace("genre","genreTitle",$_REQUEST['fromfield']);

$whereCondition=" WHERE display_status=1";
if(isset($_REQUEST['mode']))
{
	if($_REQUEST['mode']=="name")
	{
		$whereCondition.=" AND title LIKE '%".trim($_REQUEST['movie'])."%'";
	}
	else if($_REQUEST['mode']=="alpha")
	{
		if(isset($_REQUEST['keyword']))
		{
			$whereCondition.=" AND title LIKE '".$_REQUEST['keyword']."%'";
		}
	}
	 $whereCondition." ORDER BY title ASC ";
	
$user = Yii::app()->db->createCommand()
				->select('id,title')
				->from('tbl_genre_master')
				->where('page_id=:page_id', array(':page_id'=>$row["id"]))
				->queryAll();
}

?>

<style>
	li {font-family:Tahoma,Arial,Verdana,Helvetica; font-size:12px; }
</style>
<div class="pageTitle">
	<table width="100%" cellspacing="0"><tbody><tr>
		<td>Genre</td>
		<td class="goUp"></td>
	</tr></tbody></table>
</div>

<fieldset>
<legend>Genre</legend>

	<form name="frmSearch" method="post" action="selectOneGenre.php" onsubmit="return checkSearch();" >
<input type="hidden" name="fromfield" value="<?php echo $fromfield?>">
			<table class="formTable" width="100%" cellspacing="0">
			<tbody>

			<tr>
				<td class="name">Genre</td>
				<td><input name="movie" id="movie" class="input-box" type="text"></td>
			</tr>


			</tbody></table>
			<table class="formButtons" width="100%" cellspacing="0">
			<tbody><tr>
				<td>
					<input name="mode" value="name" type="hidden">
					<input name="submit" value="Search" class="submit-button" type="submit">

				</td>
			</tr>
			</tbody></table>
		</form>

<div align=center style="font-size:12px">
<?php
for($i=65;$i<91;$i++)
{
?>
	<a href="selectOneGenre?mode=alpha&keyword=<?php echo chr($i);?>&fromfield=<?php if(isset($_REQUEST['fromfield'])){echo $_REQUEST['fromfield'];}?>"><?php echo chr($i);?></a> 

<?php
}
?>
</div>

<form name="frmList" method="post" action="">



<?php
if(isset($res))
{
	if(mysql_num_rows($res)>0) 
	{
?>
<br>
<div align=center>
<input type="button" onclick="addMovies()" value="Add selected">
<input type="button" onclick="window.close()" value="Close">
</div>
<ul>
<?php
		if($_REQUEST['mode']=="name")
		{

			while($rw = mysql_fetch_array($res))
			{
?>
	<li style="float:left;width:255px">
	<input type="radio" name="movie" id="movie" value="<?php echo $rw[0];?>,<?php echo $rw[1];?>" <?php if(in_array($rw[0],$selectedIds)){echo "checked";}?>> 
		
	<?php 
		$nme=str_ireplace(trim($_REQUEST['movie']), "<b>".trim($_REQUEST['movie'])."</b>", $rw[1]);
		echo ucwords($nme);?>
	
	</li>
	<?php
			}
		}
		else
		{
			while($rw = mysql_fetch_array($res))
			{
	?>
	<li style="float:left;width:255px">
	<input type="radio" name="movie" id="movie" value="<?php echo $rw[0];?>,<?php echo $rw[1];?>" <?php if(in_array($rw[0],$selectedIds)){echo "checked";}?>>
	<?php echo $rw[1];?></li>
	<?php
			}
		}

	}
}
?>
</ul>
</form>

</fieldset>
<?php
if(isset($res))
{
	if(mysql_num_rows($res)>0) 
	{
?>
<br>
<div align=center>
<input type="button" onclick="addMovies()" value="Add selected">
<input type="button" onclick="window.close()" value="Close">
</div>
<?php
	}
}
	
?>

<script>
	function addMovies()
	{
		if(checkValid()==false)
			return false;

		tot=document.frmList.movie.length;
		tmp_id="";
		tmp_title="";
//		tmp=opener.document.getElementById("movieid").value+",";
		for(i=0;i<tot;i++)
		{
			if(document.frmList.movie[i].checked==true)
			{
				tmp=document.frmList.movie[i].value;
				tmparr=tmp.split(",");
				tmp_id+=tmparr[0];
				tmp_title+=tmparr[1];
			}
		}

		if(!document.frmList.movie.length)
		{
			tmp=document.frmList.movie.value;
			tmparr=tmp.split(",");
			tmp_id=tmparr[0];
			tmp_title=tmparr[1];
		}

		opener.document.getElementById("<?php echo $fromfield;?>").value=tmp_id;
		opener.document.getElementById("<?php echo $fromfieldTitle;?>").value=tmp_title;
		opener.focus();
		opener.document.getElementById("<?php echo $fromfieldTitle;?>").focus();
		window.close();
	}

	document.load=window.focus();

	function checkValid()
	{
		tot=document.frmList.movie.length;

		flag=0;
		for(i=0;i<tot;i++)
		{
			if(document.frmList.movie[i].checked==true)
				flag=1;
		}
	
		if(document.frmList.movie.checked==true)
			flag=1;

		if(flag==0)
		{
			alert("Select atleast one genre");
			return false;
		}
		else
			return true;

	}
	function checkSearch()
	{
		if(trim(document.frmSearch.movie.value)=="")
		{
			alert("Enter text to search");
			document.frmSearch.movie.focus();
			return false;
		}
	}
	function trim(s)
	{
	  if(s != null)
	  return s.replace(/^\s+/,'').replace(/\s+$/,'') ;
	}

</script>