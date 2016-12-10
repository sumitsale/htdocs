<?php
session_start();
 
  if (isset($_SESSION['username']) && ($_SESSION['username']!='') ) {
		header('Location: edashboard.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
    <head>       
        <!-- Title -->
        <title>Thermax | Employee Login - Sign in</title>        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
    
        <?php include("cssjs.php") ?>
        
    </head>
    <body class="page-login login-bg">
        <main class="login-box-shadow">
            <div class="">
                <div id="main-wrapper">
                    <div class="row">
                    	<div class="col-md-7 col-sm-offset-1" style="background-color:#fff;">
                        	<div class="login-box">
                                <a href="#" class="logo-name text-lg text-left" style="margin-top:10%;">
                                	<img src="assets/images/login-logo.jpg" border="" style="width:185px" alt=""/>
                                </a>
                                <p class="text-center m-t-md">&nbsp;</p>
                                <div class="panel-body">
                                	<div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">Employee Login</a></li>
                                                <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Vendor Login</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                                    <form class="m-t-md" action="edashboard.php" name="flogin" id="flogin">
														<div class="form-group">
															<label class="login-lebal">Email</label>
															<input type="email" class="form-control login-input" placeholder="Email" required id="username" name="username" onkeyup="loginCall1();">
														</div>
														<div class="form-group">
															<label class="login-lebal">Password</label>
															<input type="password" class="form-control login-input" placeholder="*******" required id="password" name="password" onkeyup="loginCall();">
														</div>
														<div id="successlogin">&nbsp;</div>														
														<!-- <button type="submit" class="btn btn-danger btn-block login-btn-rounded">Login</button> -->
														<button type="button" onclick="fun_login()" id="loginBtn" name="loginBtn" class="btn btn-danger btn-block login-btn-rounded">Login</button>
														<a class="text-center m-t-md text-sm forget">&nbsp;</a>                                 
													</form>
													<a>&nbsp;</a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="tab2">
                                                    <form class="m-t-md" action="regisration.php" name="vflogin" id="vflogin">
														<div class="form-group">
															<label class="login-lebal">Email</label>
															<input type="email" class="form-control login-input" placeholder="Email" required id="vusername" name="vusername" onkeyup="vloginCall1();">
														</div>
														<div class="form-group">
															<label class="login-lebal">Password / Code</label>
															<input type="password" class="form-control login-input" placeholder="*******" required id="vpassword" name="vpassword" onkeyup="vloginCall();">
														</div>
														<div id="vsuccesslogin">&nbsp;</div>
														<button type="button" onclick="vfun_login()" id="vloginBtn" name="vloginBtn" class="btn btn-danger btn-block login-btn-rounded">Login</button>
													   <!-- <a href="forgot.html" class="text-center m-t-md text-sm forget">Forgot Password?</a> -->     
														<a href="#" class="text-center m-t-md text-sm forget">Forgot Password?</a>
													</form>
													<!-- <a href="regisration.php">New Registration</a> -->
                                                </div>
                                            </div>
                                        </div>
                                </div> 
                                <!-- <p class="text-left m-t-xs text-sm">2016 &copy; Copyright Thermax Global.</p> -->
                            </div>
                            <!-- <div class="well login-sign">2016 &copy; Copyright Thermax Global.</div> -->
                        </div>
                        <div class="col-md-3">
                            <img src="assets/images/login-right.jpg" border="" alt="right" width="100%"/>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->   

		<script type="text/javascript">
		   function ValidateEmail(email) {
				  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				  return expr.test(email);
			  }

			function fun_login(){	
				localStorage.setItem("contentPanel3","menu_edash");
				//alert($("#username").val());
				$('#successlogin').html("Checking...");
				if ($("#username").val()==""){
				  $('#successlogin').html("Please Enter Email.");
				  return false;
				}
				if (!ValidateEmail($("#username").val())) {
				  $('#successlogin').html("Please Enter Valid EMail.");
				  return false;
				}
				if ($("#password").val()==""){
				  $('#successlogin').html("Please Enter Password.");
				  return false;
				}	 
				$.ajax({
					url       : "protected/controller.php?action=loginuser",
					type      : "POST",
					dataType  : "JSON",		  
					data      : $('#flogin').serialize(),
					success:function(data){
						console.log(data);
						$('#successlogin').html("<span style='color:#ffffff'>"+data.msg+"</span>").show();
						$("#divloader").hide(1000);
						if(data.error == 0){
							$('#loginBtn').prop('disabled', true);
							$('#successlogin').html(" User validated! Redirecting .. ");
							setTimeout(function(){window.location =data.msg; },1000);				
						}else{
							$('#successlogin').html(""+data.msg+"");
						}			
					},
					error:function (request, status, error){			
						console.log(request.responseText);
					}
				});
			}

			function loginCall(){ 
				$("#password").keyup(function(event){
					if(event.keyCode == 13){
						$("#loginBtn").click();
					}
				});
			}
			function loginCall1(){ 
				$("#username").keyup(function(event){
					if(event.keyCode == 13){
						$("#loginBtn").click();
					}
				});
			}

			function vfun_login(){	//alert("call"); return false;
				localStorage.setItem("contentPanel3","menu_edash");
				if ($("#vpanno").val()==""){
				  $('#vsuccesslogin').html("Please Enter PAN Number.");
				  return false;
				}
				
				if ($("#vusername").val()==""){
				  $('#vsuccesslogin').html("Please Enter Email Address.");
				  return false;
				}
				if (!ValidateEmail($("#vusername").val())) {
				  $('#vsuccesslogin').html("Please enter valid email.");
				  return false;
				}
				if ($("#vpassword").val()==""){
				  $('#vsuccesslogin').html("Please Enter Password.");
				  return false;
				}	 

				$.ajax({
					url       : "protected/controller.php?action=vloginuser",
					type      : "POST",
					dataType  : "JSON",		  
					data      : $('#vflogin').serialize(),
					success:function(data){
					//alert(data.error);
						$('#vsuccesslogin').html("<span style='color:#ffffff'>"+data.msg+"</span>").show();
						$("#divloader").hide(1000);
						if(data.error == 0){
							$('#vloginBtn').prop('disabled', true);
							$('#vsuccesslogin').html(" User validated! Redirecting .. ");
							//$('#vusername').val('');
							//$('#vpassword').val('');
							setTimeout(function(){window.location =data.msg; },1000);
						}else{
							$('#vsuccesslogin').html(""+data.msg+"");
							//$('#successlogin').html("<span style='color:#ffffff'>"+data.msg+"</span>").show();
							//$('#vusername').val('');
							//$('#vpassword').val('');
						}			
					},
					error:function (request, status, error){			
						console.log(request.responseText);
					}
				});
			}
			function vloginCall(){ 
				$("#vpassword").keyup(function(event){
					if(event.keyCode == 13){
						$("#vloginBtn").click();
					}
				});
			}
			function vloginCall1(){ 
				$("#vusername").keyup(function(event){
					if(event.keyCode == 13){
						$("#vloginBtn").click();
					}
				});
			}
		</script>
    </body>
</html>