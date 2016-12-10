<?php
session_start();
//print_r($_SESSION);
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }
  include_once("protected/modelDirect.php");
  $allApplications=$model->getNewApplications($_SESSION['empid']);
 // Application Status ENUM('Initiated', 'VendorPending', 'ApproverPending', 'Rejected', 'Accepted', 'Registered')
  $initiatedApplications="";
  $approverPendingApplications="";
  $vendorPendingApplications="";
  $otherStatusApplications="";
  $others="";
  //print_r($allApplications);
  foreach($allApplications as $application){	
	if($application['app_status']=="VendorPending"){
		$vendorPendingApplications=$vendorPendingApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
	}
	elseif($application['app_status']=="ApproverPending"){
		$approverPendingApplications=$approverPendingApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
	}
	elseif($application['app_status']=="Initiated" || $application['app_status']=="Submitted"){
		$initiatedApplications=$initiatedApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
	}
	else{
		$otherStatusApplications=$otherStatusApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['products_services']."</td><td>".$application['app_status']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
	}	
  }
  
  if (($_SESSION['role']=='Approver')){
	$allApplications=$model->getApprovalApplications($_SESSION['empid']);
	//print_r($allApplications);
	foreach($allApplications as $application){	
		if($application['approver_status']=="Pending"){
			$approverPendingApplications=$approverPendingApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
		}else{
			$others=$others."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
		}
	}
	//$approverPendingApplications=$approverPendingApplications."<tr><td>".$application['vendor_name']."</td><td>".$application['vendor_type']."</td><td>".$application['vendor_subtype']."</td><td>".$application['name']."</td><td>".$application['products_services']."</td><td><a href='#' id=".$application['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
  }
 // print_r($applications);
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
    <body class="page-header-fixed" >
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>           
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
		</nav>

        <main class="page-content content-wrap">
            <div class="navbar">
            	<?php include("header.php") ?>
                
                	
                        <div class="top-menu">                           
                            <ul class="nav navbar-nav navbar-right">
                              <li style="display:none;">
                                    <a class="" id="showRight">                                      
                                    </a>
                              </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                   
                
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <?php include("sidebar.php") ?>
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>View Applications</h3>
                   
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12" >
						
							<?php
								//session_start();	 
								//print_r($_SESSION);
								if (isset($_SESSION['username']) && ($_SESSION['username']!='') && ($_SESSION['role']=='Initiator')) {
							?>
	
						
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:#ff0000">Applications -> New</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive" >						 
                                    <table id="tblnewapplication" class="display table" style="width: 100%; cellspacing: 0;" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Vendor Type</th>
                                                <th>Sub Type</th>
                                                <th>Entity</th>
                                                <th>Products/Services</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php echo $initiatedApplications; ?>
                                       	</tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>                              
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:#ff0000">Applications -> Approvers Feedback</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive" >
                                    <table id="tblapproverpending" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Vendor Type</th>
                                                <th>Sub Type</th>
                                                <th>Entity</th>
                                                <th>Products/Services</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php echo $approverPendingApplications; ?>                     
                                       	</tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div> 
                            
                             <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:#ff0000">Applications -> Vendors Response</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive" >
                                    <table id="tblvendorpending" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Vendor Type</th>
                                                <th>Sub Type</th>
                                                <th>Entity</th>
                                                <th>Products/Services</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php echo $vendorPendingApplications; ?>                                            
                                       	</tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div> 
							
							<div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title" style="color:#ff0000">Applications -> Others</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive" >
                                    <table id="tblotherapplication" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Vendor Type</th>
                                                <th>Sub Type</th>
                                                <th>Products/Services</th>
												<th>Status</th>												
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php echo $otherStatusApplications; ?>                                            
                                       	</tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div> 
							
							
							<?php
								}
								elseif (isset($_SESSION['username']) && ($_SESSION['username']!='') && ($_SESSION['role']=='Approver')) {
							?>
								 <div class="panel panel-white">
									<div class="panel-heading clearfix">
										<h4 class="panel-title" style="color:#ff0000">Applications -> Pending for Approval</h4>
									</div>
									<div class="panel-body">
									   <div class="table-responsive">
										<table id="tblnewapplication" class="display table" style="width: 100%; cellspacing: 0;">
											<thead>
												<tr>
													<th>Name</th>
													<th>Vendor Type</th>
													<th>Sub Type</th>
													<th>Entity</th>
													<th>Products/Services</th>
													<th>View</th>
												</tr>
											</thead>
											<tbody>
												<?php echo $approverPendingApplications; ?>
											</tbody>
										   </table>  
										</div>
									</div>
								</div>  
                            
								<div class="panel panel-white">
									<div class="panel-heading clearfix">
										<h4 class="panel-title" style="color:#ff0000">Applications -> Others</h4>
									</div>
									<div class="panel-body">
									   <div class="table-responsive">
										<table id="tblnewapplication" class="display table" style="width: 100%; cellspacing: 0;">
											<thead>
												<tr>
													<th>Name</th>
													<th>Vendor Type</th>
													<th>Sub Type</th>
													<th>Entity</th>
													<th>Products/Services</th>
													<th>View</th>
												</tr>
											</thead>
											<tbody>
												<?php echo $others; ?>
											</tbody>
										   </table>  
										</div>
									</div>
								</div> 
							<?php
								}
							?>
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
		//$(document).ready(
		/*function() {
			localStorage.setItem("vendorId","");
		});*/
		
		function showDetails(val){
			//localStorage.setItem("vendorId",val.id);
			window.location.href = 'newvapplication.php?id='+val.id;
		}
	</script>
</html>