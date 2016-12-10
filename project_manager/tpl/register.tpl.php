<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>		
	</head>
	<body>
		<div class="header">
			<h1>Fermion Infotech</h1>
			<a href="javascript:void(0)" onclick="" id="signin_link">SignIn</a>
		</div>
		<div id = "register_body_div" class="form_body_div">
			<form id="register_form" method="post" action=""> 
				<p class = "title">Registration Form</p>
				<center>    
					<table>  
						<tr>
							<td class="label">User Name<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="username" id="username" class="input_field validate[required]" ></td>
						</tr>
						<tr>
							<td class="label">Email Id <span class="compulsary_field">*</span></td>
							<td><input type='text' name='email_id' id="email_id" class="input_field validate[required,custom[email]]"></td>  
						</tr>						
						<tr>
							<td class="label">Password <span class="compulsary_field">*</span></td>
							<td><input type='password' name='password' id="password" class="input_field validate[required]" min=5;></td>  
						</tr>
						<tr>
							<td class="label">Confirm Password <span class="compulsary_field">*</span></td>
							<td><input type='password' name='confirm_password' id="confirm_password" class="input_field validate[required,equals[password]] "></td>  
						</tr>
						<tr>
							<td class="label">Project Name <span class="compulsary_field">*</span></td>
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
							<td class="label">First Name<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="firstname" id="firstname" class="input_field validate[required]" ></td>
						</tr>
						<tr>
							<td class="label">User Name<span class="compulsary_field">*</span> </td>
							<td><input type="text" name="lastname" id="lastname" class="input_field validate[required]" ></td>
						</tr>
					</table>
				</center>
				<center>
                    <table>
                        <tr>
                            <td><input type="button" value="Submit" name="Submit" class="btn" onclick="saveRegistrationForm()"></td>
                            <td><input type="button" value="Cancel" name="cancel" class="btn" onclick="resetRegistrationForm()"></td>
                        </tr>
                    </table>
                </center>	
			</form>		
		</div>	
		<script src="js/jquery1.7.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
        <script src="js/jquery.validationEngine.js"></script>
        <script src="js/jquery.validationEngine-en.js"></script>
        <script src="js/index.js"></script>
	</body>
</html>