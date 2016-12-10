<?php
session_start();
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }
 $initiatedApplications="";
include_once("protected/modelDirect.php");
$application=$model->getMyApplications($_SESSION['user_id']); //
$comments="";
 //print_r($application);
 //print_r($_SESSION['user_id']);
 $cnt="No alerts for now.";
 if($application){
	$initiatedApplications=$initiatedApplications."<tr><td>".$application[0]['vendor_name']."</td><td>".$application[0]['vendor_type']."</td><td>".$application[0]['vendor_subtype']."</td><td>".$application[0]['name']."</td><td>".$application[0]['products_services']."</td><td><a href='registration.php' id=".$application[0]['vendor_id']." onclick='showDetails(this)'>View</a></td></tr>";
	
	$comments=$model->getMyApplicationComments($application[0]['vendor_id']);
	//print_r($comments);
	
	$cnt="<h4 class='panel-title'>Existence Application Status </h4> </br> <div style='color:#ff0000'> You are requested to take appropriate action based on following comments dated:".$comments[0]['date'].". If action already taken then please wait for updates.</div><br><div>Comments on ".$comments[0]['commentssection']." : ".$comments[0]['comments']."</div>";
}
else
	$initiatedApplications=$initiatedApplications.'No registered application found. <a href="registration.php"><button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" >Register Now!</button></a></br></br></br>';
	
	
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
                    <h3>My Applications</h3>
                   
                </div>
                <div id="main-wrapper">
                    <div class="row" style="min-height:450px">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix" style="height:150px">
                                    
									<?php echo $cnt ; ?>
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
</html>