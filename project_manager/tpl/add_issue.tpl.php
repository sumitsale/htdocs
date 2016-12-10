<html>
	<head>
		<title>Add Issue</title>
		<link href="css/datePicker.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>	
	</head>
	<body>
		<div class="header">
			<h1>Fermion Infotech</h1>
		</div>
		<div id = "issue_update_body_div" class="form_body_div">
			<form id="update_issue_form" method="post" action=""> 
				<p class = "title">Add Issues</p>
				<center>    
					<table>  
						<tr>
							<td class="label">Project Name<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="project_name" id="project_name" class="input_field text_field validate[required]">
									<option value="">Project Name</option>
                                    <?php foreach($dataArr['project_list'] as $pro ) {?>
                                        <option value="<?php echo $pro['project_name']; ?>"> <?php echo $pro['project_name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
						</tr>
						<tr>
							<td class="label">Tracker<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="tracker" id="tracker" class="input_field validate[required]">
									<option value="">Tracker</option>
                                    <?php foreach($dataArr['tracker_list'] as $track ) {?>
                                        <option value="<?php echo $track['tracker']; ?>"> <?php  echo $track['tracker']; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
						</tr>
						<tr>
							<td class="label">Status<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="status" id="status" class="input_field validate[required]">
									<option value="">Status</option>
                                    <?php foreach($dataArr['status_list'] as $status ) {?>
                                        <option value="<?php echo $status['status']; ?>"> <?php echo $status['status']; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
						</tr>
						<tr>
							<td class="label">Priority<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="priority" id="priority" class="input_field validate[required]">                                  
                                    <option value="">Priority</option>
                                    <option value="high">High</option>
									<option value="low">Low</option>
									<option value="urgent">Urgent</option>
                            </td>
						</tr>
						<tr>
							<td class="label">Subject <span class="compulsary_field">*</span></td>
							<td><input type='text' name='subject' id="subject" class="input_field validate[required,custom[email]]"></td>  
						</tr>
						<tr>
                            <td class="label">Description <span class="compulsary_field">*</span> </td>
                            <td><textarea rows="5" cols="30" name="description" id="description"class="input_field validate[required]"></textarea></td>
                        </tr>
						<tr>
							<td class="label">Assignee<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="assignee" id="assignee" class="input_field validate[required]">
									<option value="">assignee</option>
                                    <?php foreach($dataArr['roll_list'] as $roll ) {?>
                                        <option value="<?php echo $roll['rollno']; ?>"> <?php echo $roll['rollno']; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
						</tr>	
						<tr>
							<td class="label">Updated<span class="compulsary_field">*</span></td>
							<td><input type='text' name='updated' id="updated" class="input_field validate[required]" min=5;></td>  
						</tr>
						<tr>
							<td class="label">Start Date <span class="compulsary_field">*</span></td>
							<td><input type='text' name='start_date' id="start_date" class="date_pick input_field validate[required,equals[password]] "></td>  
						</tr>
						<tr>
							<td class="label">Due Date<span class="compulsary_field">*</span></td>
							<td><input type='text' name='due_date' id="due_date" class="date_pick input_field validate[required]"></td>  
						</tr>
						<tr>
							<td class="label">Estimated Time<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="estimated_time" id="estimated_time" class="input_field validate[required]" ></td>
						</tr>
						<tr>
							<td class="label">Spent Time<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="spent_time" id="spent_time" class="input_field validate[required]" ></td>
						</tr>
						<tr>
							<td class="label">% Done<span class="compulsary_field">*</span> </td>
							<td>
                                <select name="per_done" id="per_done" class="input_field validate[required]">
									<option value="">% Done</option>
                                    <?php for($i=0;$i<=100;$i++){?>
                                        <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
						</tr>
						<tr>
							<td class="label">Created<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="created" id="created" class="date_pick input_field validate[required]" ></td>
						</tr>
					</table>
				</center>
				<center>
                    <table>
                        <tr>
                            <td><input type="button" value="Submit" name="Submit" class="btn" onclick="saveUpdateIssueForm()"></td>
                            <td><input type="button" value="Cancel" name="cancel" class="btn"></td>
                        </tr>
                    </table>
                </center>	
			</form>	
		</div>	
		<script src="js/jquery1.7.1.min.js" ></script> 
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.validationEngine.js"></script>
        <script src="js/jquery.validationEngine-en.js"></script>
        <script src="js/index.js"></script>
        <script>
            $( function() {
                $('.date_pick').datepicker({
                changeMonth:true,
                changeYear: true,
                minDate: new Date('1900','01', '01'),
                maxDate: new Date(),
                closeText: 'Close',
                currentText: 'Today',
                showButtonPanel: true,
                dateFormat: 'mm dd yy',
//                constrainInput: true,
            });
        });
        </script>
	</body>
</html>