<!DOCTYPE html>
<html>
    <head>       
        <!-- Title -->
        <title>Thermax | Vendor Login - Sign in</title>
        
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
                                	<img src="assets/images/login-logo.png" border="" width="85" alt=""/>
                                </a>
                                <p class="text-center m-t-md">&nbsp;</p>
                                <h2 style="margin-bottom:32px;">Vendor Login</h2>
                                <form class="m-t-md" action="regisration.html">
                                    <div class="form-group">
                                    	<label class="login-lebal">Email</label>
                                        <input type="email" class="form-control login-input" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                    	<label class="login-lebal">Password / Code</label>
                                        <input type="password" class="form-control login-input" placeholder="*******" required>
                                    </div>
                                    <label>
                                        <!-- <div class="checker"><span><input type="checkbox"></span></div> Agree the terms and policy -->
                                    </label>
                                    <br>
                                    <button type="submit" class="btn btn-danger btn-block login-btn-rounded">Login</button>
                                    <a href="forgot.html" class="text-center m-t-md text-sm forget">Forgot Password?</a>                                  
                                </form>
                                <!-- <p class="text-left m-t-xs text-sm">2016 &copy; Copyright Thermax Global.</p> -->
                            </div>
                            
                            <div class="well login-sign">2016 &copy; Copyright Thermax Global.</div>
                        </div>
                        <div class="col-md-3">
                            <img src="assets/images/login-right.jpg" border="" alt="right" width="100%"/>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->        
    </body>
</html>