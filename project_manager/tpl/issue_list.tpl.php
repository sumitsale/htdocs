<html>
	<head>
		<title>Issue List</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>		
	</head>
	<body>
		<div class="header">
			<h1>Fermion Infotech</h1>
			<a href="add_issue.php" onclick="" id="add_issues">AddNewIssue</a>
		</div>
		<div id="project_list_body_div" class="form_body_div">

	
		<table align='center'>
				<tr>	
					<td>Project name : -</td>
					<td><?php echo $dataArr['project_detail'][0]['project_name']; ?></td>
				</tr>
				
				<tr>	
					<td>Description : -</td>
					<td><?php echo $dataArr['project_detail'][0]['description']; ?></td>
				</tr>
		</table>
		
		<br>
		<br>
		
		<table align ='center' id="issue_listing">
			
			
			<tr>
				<td><input type="button" name="Delete" onclick="delete_issue();" value="Delete"></td>
			</tr>
			
			<tr>
				<td><input type="checkbox" name="select_all" id ="select_all"></td>
				<td>project_name</td>
				<td>tracker</td>
				<td>status</td>
				<td>priority</td>
				<td>subject</td>
				<td>description</td>
				<td>assignee</td>
				<td>updated</td>
			</tr>
			
			<?php for($i=0;$i<count($dataArr['issue_list']);$i++) { ?>
			
				
			<tr>
				<td><input type="checkbox" name="issue_id[]" value="<?php echo $dataArr['issue_list'][$i]['issue_id']; ?>" id =""></td>
				<td><?php echo $dataArr['issue_list'][$i]['project_name']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['tracker']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['status']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['priority']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['subject']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['description']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['assignee']; ?></td>
				<td><?php echo $dataArr['issue_list'][$i]['updated']; ?></td>
			
			</tr>
			
			<?php } ?>
		
		</table>
		
		
		
		</div>
		<script src="js/jquery1.7.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
        <script src="js/jquery.validationEngine.js"></script>
        <script src="js/jquery.validationEngine-en.js"></script>
        <script src="js/index.js"></script>
	</body>
</html>