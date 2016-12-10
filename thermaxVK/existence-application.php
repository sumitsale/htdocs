<?php
session_start();
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }

//For Generating Password to give vendors in Invitation Email  
 //  $auto_PwdChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 //  $autopwd = substr( str_shuffle( $auto_PwdChars ), 0, 6 );
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
                    <h3>View Registered Vendors</h3>
                   
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <!--<h4 class="panel-title" style="color:#ff0000">Existence Applications </h4>-->
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Vendor Type</th>
                                                <th>Email</th>
                                                <th>PAN Code</th>
                                                <th>Products/Services</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                      <!-- 
  <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Nature of the entity</th>
                                                <th>Email</th>
                                                <th>PAN Code</th>
                                                <th>VAT TIN no.</th>
                                                <th>View</th>
                                            </tr>
                                        </tfoot>
 -->
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>Domestic Service Vendor</td>
                                                <td>info@tiger.com</td>
                                                <td>ANQPT2565T</td>
                                                <td>Iron Ore</td>
                                                <td><a href="newvapplication.php?fl=ext">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Domestic Sub-Contractor</td>
                                                <td>info@garrett.com</td>
                                                <td>ANQPT2565T</td>
                                                <td>Software Service</td>
                                                <td><a href="newvapplication.php?fl=ext">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Foreign Service Vendor</td>
                                                <td>info@Ashton.com</td>
                                                <td>ANQPT2565T</td>
                                                <td>Human Resource</td>
                                                <td><a href="newvapplication.php?fl=ext">View</a></td>
                                            </tr>
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