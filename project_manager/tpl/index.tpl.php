<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>		
	</head>
	<body>
		<div class="header">
			<h1>Fermion Infotech</h1>
			<a href="register.php" onclick="" id="reg_link">Register</a>
		</div>
		<div id="login_body_div" class="form_body_div">
			<form id="user_login_form" method="post" action="">
			<p class="title">Login Form<p>
				<center>
				<table id="login_table">
					<tr>
						<td class="label"> User Name <span class="compulsary_field">*</span></td>
						<td> <input type="text" name="user_name" id="user_name" class="input_field validate[required,custom[email]]" ></td>
					</tr>
					<tr>
						<td class="label">Password<span class="compulsary_field">*</span></td>
						<td><input type="password" name="password" id="login_password" class="input_field validate[required]"></td>
					</tr>
					<tr>
						<td class="label">Confirm Password<span class="compulsary_field">*</span></td>
						<td><input type="password" name="confirm_password" id="login_confirm_password" class="input_field validate[required]"></td>
					</tr>
				</table>
				</center> 
				<center>
					<table>
					 <tr>
						<td><input type="button" name="user_login" value="LOG IN" id="user_login" class="btn" onclick="isAutheticUser()"><td>
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