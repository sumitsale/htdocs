<?php
session_start();
if ($_SESSION['username']=='' || $_SESSION['empid']=='') {
    header('Location: index.php');
    exit;
  }
 // print_r($_SESSION);
  
  include_once("protected/modelDirect.php");
  $allinvitedVendors=$model->getInvitedVendors($_SESSION['empid']);
  $invitedVendors="";
	foreach($allinvitedVendors as $application){		
			$invitedVendors=$invitedVendors."<tr><td>".$application['name']."</td><td>".$application['email']."</td><td>".date('d-M-Y',strtotime($application['date']))."</td><td>".$application['status']."</td></tr>";
	}
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
                    <h3>Send Invite</h3>
                </div>
                <div id="main-wrapper" >
                    <div class="row">
                    	<div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Send EMail Invitation</h4>
                                </div>
                                <div class="panel-body" ng-app="thermaxproposerApp" ng-controller="mainProposerController">
                                    <form id="frmSendEmail" name="userForm" role="form" ng-submit="processForm()" ng-fab-form-options="customFormOptions">
                                        <div class="form-group">
                                        <br><br>
                                            <label for="input-Default" class="col-sm-2 control-label">Vendor Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="txtvendorname" type="text" name="txtvendorname" required ng-model="formData.vendor_name">
                                            </div>
                                            <br><br><br>
                                            
                                             <label for="input-Default" class="col-sm-2 control-label">Vendor Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="txtvendoremail" name="txtvendoremail" type="email" required ng-model="formData.vendor_email">
                                            </div>
                                            <br><br><br>
                                            
                                            <!---<label for="input-Default" class="col-sm-2 control-label">Subject</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="txtsubject" type="subject" name="txtsubject" required ng-model="formData.vendor_subject">
                                            </div>
                                            <br><br><br>
                                             <label for="input-Default" class="col-sm-2 control-label">Email Body</label>
                                            <div class="col-sm-10">
                                            	<textarea class="form-control" placeholder="Body" rows="5" id="txtbody" name="txtbody" required ng-model="formData.vendor_body"></textarea>
                                            </div> 
                                            <br><br><br> --->
                                           
                                        </div>
                                       
                                    </form>
                                   
                                    <div class="form-group">
                                       	<div class="col-sm-offset-2 col-sm-10">
										<br>
											<div id="dmsg" style="color:#00aaff"></div>
                                    	    <button type="submit" class="btn btn-danger btn-rounded" ng-click="formsubmit(userForm.$valid)">Send Invitation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        	<div class="panel panel-default">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Search Vendor</h4>
                                </div>
                                <div class="panel-body">
                                <br>
                                	<form action="#" method="GET">
                                        <div class="input-group col-sm-10">
                                            <input type="text" style="height:36px" name="provider-json" id="provider-json" class="form-control input-search" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" onclick="getSearchResult()"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div><!-- Input Group -->
                                    </form>
                                    <br>
									<div id="dmsgiap" style="color:#00aaff"></div>
									
                                    <div role="tabpanel" class="tab-pane fade p-v-lg active in" id="all" style="overflow-y:auto;height:315px">
										<div class="search-item" id="dsearchresult">									
										</div>										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
					
					<div class="row">
						<div class="panel panel-white">
							<div class="panel-heading clearfix">
								<h4 class="panel-title" style="color:#ff0000">Invitation Mail Sent</h4>
							</div>
							<div class="panel-body">
							   <div class="table-responsive" >						 
								<table id="tblnewapplication" class="display table" style="width: 100%; cellspacing: 0;" >
									<thead>
										<tr>
											<th>Name</th>
											<th>EMail</th>
											<th>Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php echo $invitedVendors; ?>
									</tbody>
								   </table>  
								</div>
							</div>
						</div>
					</div>
					
					
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
					console.log(ui);
					var vid=ui['item']['id'];
					
					getVendorDetails(vid);						
				}
			});
				
			function getVendorDetails(vid){
				console.log("first");
				$("#dsearchresult").html("");
				$.ajax({
					url:"protected/controller.php?action=getVendorDetails&vid="+vid,	
					dataType: "JSON",	
					success:function(data){
						console.log(data);
						str="";
						jQuery.each(data.result, function(i, val) {
							str=str+'<h3 class="no-m"><a href="" class="text-danger">'+val.vendor_name+'</a></h3><a href="" class="search-link">'+val.email+'</a></br><button type="submit" class="btn btn-danger btn-rounded" onclick="initiateap()">Initiate Approval Process</button>';
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
			console.log("second");
			var vl=$("#provider-json").val();
			console.log(vl);
			console.log("second");
			$("#dsearchresult").html("");
			$.ajax({
				url:"protected/controller.php?action=getVendorDetails&vid="+vl,	
				dataType: "JSON",	
				success:function(data){	
					str="";
					jQuery.each(data.result, function(i, val) {
						str=str+'<h3 class="no-m"><a href="" class="text-danger">'+val.vendor_name+'</a></h3><a href="" class="search-link">'+val.email+'</a></br><button type="submit" class="btn btn-danger btn-rounded" onclick="initiateap()">Initiate Approval Process</button>';
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
		
		function initiateap(){			
			$("#dmsgiap").html("Request sent to corresponding approvers!").fadeOut(3000);
		}
		
	</script>
</html>