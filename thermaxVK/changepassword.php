<?php
session_start();
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }
  //print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>        
        <!-- Title -->
        <title>Thermax</title>        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <?php include("cssheader.php") ?>
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
      
        <main class="page-content content-wrap">
            <div class="navbar">
                <?php include("header.php") ?>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <?php include("sidebar.php") ?>
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Change Password</h3>
                </div>
                <div id="main-wrapper" >
                    <div class="row">
                    	<div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Change Password</h4>
                                </div>
                                <div class="panel-body" ng-app="thermaxvendorApp" ng-controller="mainVendorController">
                                    <form id="frmSendEmail" name="userForm" role="form" ng-submit="processForm()" ng-fab-form-options="customFormOptions">
                                        <div class="form-group">
                                        <br><br>
                                            <label for="input-Default" class="col-sm-4 control-label">Thermax Provided Code</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="txtoldpassword" type="password" name="txtoldpassword" required ng-model="formData.oldpassword">
                                            </div>
                                            <br><br><br>
                                            
                                             <label for="input-Default" class="col-sm-4 control-label">Enter New Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="txtnewpassword" name="txtnewpassword" type="password" required ng-model="formData.newpassword">
                                            </div>
                                            <br><br><br>
                                            
                                             <label for="input-Default" class="col-sm-4 control-label">Re-Enter New Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="txtrepassword" type="password" name="txtrepassword" required ng-model="formData.repassword">
                                            </div>
                                            <br><br><br>                                             
                                        </div>                                       
                                    </form>
                                   
                                    <div class="form-group">
                                       	<div class="col-sm-offset-2 col-sm-10">
										<br>
											<div id="dmsg" style="color:#00aaff"></div>
                                    	    <button type="submit" class="btn btn-danger btn-rounded" ng-click="formsubmit(userForm.$valid)">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
					
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <?php include("footer.php") ?>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <div class="cd-overlay"></div>
	
        <?php include("jsheader.php") ?>
		       
    </body>
	<script>
		$(document).ready(
			function() {				
				$("#provider-json").autocomplete({
				source: "protected/controller.php?action=searchVendorDetails",
				select: function(event,ui){
					var vid=ui['item']['id'];
					console.log(ui);
					getVendorDetails(vid);						
				}
			});
				
			function getVendorDetails(vid){
				$("#dsearchresult").html("");
				$.ajax({
					url:"protected/controller.php?action=getVendorDetails&vid="+vid,	
					dataType: "JSON",	
					success:function(data){
						console.log(data);
						//$("#dsearchresult").html('<h3 class="no-m"><a href="" class="text-danger">'+data.result[0]["vendor_name"]+'</a></h3><a href="" class="search-link">'+data.result[0]["email"]+'</a><p><strong>PAN:</strong>'+data.result[0]["name"]+'<br></p>');
						str="";
						jQuery.each(data.result, function(i, val) {
							str=str+'<h3 class="no-m"><a href="" class="text-danger">'+val.vendor_name+'</a></h3><a href="" class="search-link">'+val.email+'</a><p><strong>PAN:</strong>'+val.name+'<br></p>';
						});
						if(str==""){
							str=str+'<strong>No result found.</strong>';
						}
						$("#dsearchresult").html(str);
					},
					error:function (request, status, error){
						$("#dsearchresult").html('No results found.');
						//$("#divloader").hide(500);
						console.log(request.responseText);
					}
				});
			}
		});
	
		function getSearchResult(){
			var vl=$("#provider-json").val();
			console.log(vl);
			$("#dsearchresult").html("");
			$.ajax({
				url:"protected/controller.php?action=getVendorDetails&vid="+vl,	
				dataType: "JSON",	
				success:function(data){	
					str="";
					jQuery.each(data.result, function(i, val) {
						str=str+'<h3 class="no-m"><a href="" class="text-danger">'+val.vendor_name+'</a></h3><a href="" class="search-link">'+val.email+'</a><p><strong>PAN:</strong>'+val.name+'<br></p>';
					});
					if(str==""){
						str=str+'<strong>No result found.</strong>';
					}
					$("#dsearchresult").html(str);
				},
				error:function (request, status, error){
					$("#dsearchresult").html('No results found.');
					console.log(request.responseText);
				}
			});
		}
		
		
	</script>
</html>