<?php 
//session_start();
$pageid=12;
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
</head>
<body>
	<div id="container">
    	<div id="wrapper">
            <div id="content">
				<h1>Movies Query Manager</h1>		
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr><td colspan='4' align='center'>
					<!--?php if(trim($_GET["msgCode"]==1)){echo "<b><font color='green'>XML Created Sucessfully</font></b>";}?-->
					<!--?php if(trim($_GET["msgCode"]==2)){echo "<b><font color='red'>Execution failed, due to insufficent records.</font></b>";}?-->
					</td></tr>
					<tr><td><b>Location Master</b></td><td><b>Location Title</b></td><td><b>XML</b></td><td><b>&nbsp;</b></td></tr>
				<!--?php print_r($user);exit;?-->
				<?php	
				// $size=count($user);
				foreach($user as $row)
				{ 
				$user1 = Yii::app()->db->createCommand()
				->select('*')
				->from('tbl_location_master')
				->where('page_id=:page_id', array(':page_id'=>$row["id"]))
				->queryAll();
				?>
				<!--?php print_r($user1);exit;?-->
				<tr>
				    <td><?php echo $row['page_title']; ?></td>
				    <td align="center"><?php echo $row['page_html_name']; ?></td>
				</tr>
				<?php
				//for($i=0;$i<=$size;$i++)
				foreach($user1 as $row)
				{
				//print_r($user1);exit;
				$edit='';
				$xmlfile='';
				$edit='<a href="store_movie_query?locationid='.$row["location_id"].'&page_id='.$row["page_id"].'">Edit</a>';
				$xmlfile=$row["page_id"]."_".$row["location_id"]."_.xml";
				echo "<tr><td>&nbsp;".ucwords(strtolower($row['location_desc']))."</td><td>".$row['location_current_title']."</td><td>".$xmlfile."</td><td>".$edit."</td></tr>";	
				}
				}
				?>
				<?php
				?>
				</table>
            </div>
      </div>
</div>
</body>
</html>
