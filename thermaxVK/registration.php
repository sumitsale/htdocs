<?php
session_start();
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }
 
?>
<!DOCTYPE html>
<html ng-app="thermaxApp">
<head>
<!-- Title -->
<title>Thermax</title>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta charset="UTF-8">
<meta name="description" content="Admin Dashboard Template" />
<meta name="keywords" content="admin,dashboard" />
<meta name="author" content="Steelcoders" />

<!-- Styles -->
<?php include("cssheader.php") ?>
</head>
<body class="page-header-fixed" >
<div class="overlay"></div>

<main class="page-content content-wrap">
  <div class="navbar">
	<?php include("header.php") ?>
  </div>
  <!-- Navbar -->
<div class="page-sidebar sidebar">
	<?php include("sidebar.php") ?>
</div>
  <!-- Page Sidebar -->
  <div class="page-inner">
    <div class="page-title">
      <h3>Registration Request</h3>
     </div>
    <div id="main-wrapper" style="background: #f7f8f8 !important;">
      <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title"></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                            	<li role="presentation" class="active"><a href="#tab20" role="tab" data-toggle="tab"><span aria-hidden="true" class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Welcome</a></li>
                                                <li role="presentation"><a href="#tab21" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-info"></span>&nbsp;&nbsp;General Information</a></li>
                                                <li role="presentation"><a href="#tab25" role="tab" data-toggle="tab"><span aria-hidden="true" class="fa fa-certificate"></span>&nbsp;&nbsp;Company Info</a></li>
                                                <li role="presentation"><a href="#tab22" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-users"></span>&nbsp;&nbsp;Management</a></li>
                                                <li role="presentation"><a href="#tab23" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-notebook"></span>&nbsp;&nbsp;Statutory Data</a></li> 
                                                <li role="presentation"><a href="#tab24" role="tab" data-toggle="tab"><span aria-hidden="true" class="fa fa-university"></span>&nbsp;&nbsp;Bank Details</a></li>
                                                 
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                            <?php include("registration-welcome.php") ?>
                                            <?php include("registration-general-information.php") ?>
                                            <?php include("registration-company-information.php") ?>
                                            <?php include("registration-management.php") ?>
                                            <?php include("registration-statutory-data.php") ?>
                                            <?php include("registration-bank-details.php") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
          
        </div>
      </div>
      <!-- Row --> 
    </div>
    <!-- Main Wrapper -->
	 <div class="page-footer">
		<?php include("footer.php") ?>
	</div>
  </div>
  <!-- Page Inner --> 
</main>
<!-- Page Content -->

<div class="cd-overlay"></div>


<!-- Javascripts --> 
<?php include("jsheader.php") ?>


</body>
</html>