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
		<main class="page-content content-wrap">
	  		<div class="navbar">
				<?php include("header.php") ?>
			</div> <!-- Navbar -->
	 
	 		<div class="page-sidebar sidebar">
				<?php include("sidebar.php") ?>
			</div> <!-- Page Sidebar -->
			<div class="page-inner">
				<div class="page-title">
					<h3>View Applications -> Approvers Feedback</h3>
				</div>
				<div id="main-wrapper">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-body">
									<div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs nav-justified" role="tablist">
											     <li role="presentation" class="active"><a href="#tab21" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-info"></span>&nbsp;&nbsp;General Information</a></li>
                                                <li role="presentation"><a href="#tab25" role="tab" data-toggle="tab"><span aria-hidden="true" class="fa fa-certificate"></span>&nbsp;&nbsp;Company Info</a></li>
                                                <li role="presentation"><a href="#tab22" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-users"></span>&nbsp;&nbsp;Management</a></li>
                                                <li role="presentation"><a href="#tab23" role="tab" data-toggle="tab"><span aria-hidden="true" class="icon-notebook"></span>&nbsp;&nbsp;Statutory Data</a></li> 
                                                <li role="presentation"><a href="#tab24" role="tab" data-toggle="tab"><span aria-hidden="true" class="fa fa-university"></span>&nbsp;&nbsp;Bank Details</a></li>
											
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="tab21">
												<div class="container">
													<div class="row">
														<div class="col-md-12">
															<form class="form-horizontal" >
																<div class="form-group">
																	<label class="col-sm-1 control-label">Type</label>
																	<span class="col-sm-2 control-label">Domestic Sub-Contractor</span>
																	<label class="col-sm-2 control-label">Sub-Type</label>
																	<span class="col-sm-2 control-label">Manufacturer</span>													
																</div>
																<div class="form-group">
																	<label for="input-Default" class="col-sm-1 control-label">Name</label>
																	<span class="col-sm-2 control-label">
																		Garrett Winters
																	</span>									 
																	<label for="input-Default" class="col-sm-2 control-label">Nature of the entity</label>
																	<span class="col-sm-2 control-label">
																		Private Limited
																	</span>																																 
																	 <label for="input-Default" class="col-sm-2 control-label">List of products / services</label>
																	 <span class="col-sm-2 control-label">
																		Software, Services
																	</span>																	
																 </div>
																 <div class="form-group">
																	 <label for="input-Default" class="col-sm-1 control-label">Addresses</label>																 
																	 <div class="col-sm-2">
																		 <p class="form-control-static">                     
																		 	<strong>Correspondance</strong><br>
																				John Doe<br>
																				795 Folsom Ave, Suite 600<br>
																				San Francisco, CA 94107</p>
																	</div>
																	<!-- <label for="input-Default" class="col-sm-2 control-label"></label> -->
																 	<div class="col-sm-2">
																		 <p class="form-control-static">
																		 <strong>Shipping From</strong><br>
																			John Doe<br>
																			795 Folsom Ave, Suite 600<br>
																			San Francisco, CA 94107</p>
																	</div>
																    <!-- <label for="input-Default" class="col-sm-2 control-label"></label> -->
																    <div class="col-sm-2">
																		 <p class="form-control-static">
																		 	<strong>Registered</strong><br>
																			John Doe<br>
																			795 Folsom Ave, Suite 600
																			San Francisco,CA 94107</p>
																	</div>
																 </div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab22">
												 <div class="container">
													<div class="row">
														<div class="col-md-12">
															<form class="form-horizontal">
																<div class="form-group">
																	<label for="input-Default" class="col-sm-2 control-label">Key Contacts</label>
																	<div class="col-sm-2">
																	 	<p class="form-control-static">
																		 	<strong>Promoter</strong><br>
																			John Doe<br>
																			22795600<br>
																			9909908809<br>
																			mailme@email.com</p>
																	</div>
															 		<div class="col-sm-2">
																	 	<p class="form-control-static">
																		 	<strong>CEO</strong><br>
																			John Doe<br>
																			22795600<br>
																			9909908809<br>
																			mailme@email.com</p>
																	</div>
																	<div class="col-sm-2">
																	 	<p class="form-control-static">
																		 	<strong>Managing Director</strong><br>
																			John Doe<br>
																			22795600<br>
																			9909908809<br>
																			mailme@email.com</p>
																	</div>
																	<div class="col-sm-2">
																	 	<p class="form-control-static">
																		 	<strong>Director</strong><br>
																			-<br>
																			-<br>
																			-<br>
																			-</p>
																	</div>
																	
																 </div>
																	 	
																<div class="form-group">
																	<label class="col-sm-2 control-label">Name of related entity</label>
																	<div class="col-sm-2"><p class="form-control-static">NA </p></div>
																</div>
																	
																<div class="form-group">
																	<label class="col-sm-8 control-label">Are any of your directors/ partners/ owners or relatives working/were working in THERMAX?</label>
																	<div class="col-sm-2"><p class="form-control-static">NA </p></div>
																</div>
															</form>
														 </div>
													  
													</div>
												 </div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab23">
											   <div class="container">
													<div class="row">
														<div class="col-md-12">													
															<form class="form-horizontal">
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">PAN code: </label>
																	<div class="col-sm-2">
																	   <p class="form-control-static">ANQPT1234T</p>
																 	</div>
																	<div class="col-sm-2">
																		
																 	</div>
																 	<div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">VAT TIN no.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">VTAI1234T</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">11/08/2019</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">CST TIN no.</label>
																	<div class="col-sm-2">
																	   <p class="form-control-static">CSTT1234T</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">12/08/2018</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
                                                                    
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">ECC no./Excise Regn no.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">EXREGN987456</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">12/09/2020</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">Service Tax No</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">SERTAX123</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">12/06/2018</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">ESIC no.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">EXICN12358</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">08/08/2015</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">PF No.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">PFN-123569</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">19/05/2023</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																 <div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">Labour Licence no.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">LAB - LIC1234T</p></div>
																	<div class="col-sm-2">
																		<p class="form-control-static">24/05/2017</p>
																 	</div>
                                                                    <div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">Municipal Corpn Name</label>
																	<div class="col-sm-2"><p class="form-control-static">-</p>
																		</div>
																	<div class="col-sm-2">
																		
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">LBT Registered No.</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">-</p></div>
																	<div class="col-sm-2">
																		
                                                                     </div>
																</div>
																<div class="col-sm-12">
																	<label for="input-Default" class="col-sm-2 control-label">IBA No./Date</label>
																	<div class="col-sm-2">
																		<p class="form-control-static">-</p></div>
																	<div class="col-sm-2">
																		
                                                                     </div>
																</div>
																
																<label for="input-Default" class="col-sm-3 control-label">Covered under MSME Act 2006</label>
																<div class="col-sm-2">
																	<p class="form-control-static">ANQPT1234T</p>
																</div>
																<div class="col-sm-2">
																	<p class="form-control-static">12/12/2018</p>
																</div>
                                             					<div class="col-sm-2">
																		<a href="" data-toggle="modal" data-target="#myModal">View</a>  
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
											
											<div role="tabpanel" class="tab-pane fade" id="tab24">
                                                     <div class="container">
                                                    	<div class="row">
                                                        	<div class="col-md-12">                                                            
																<div class="col-md-12">
																	<label for="input-Default" class="col-sm-2 control-label">Bank Name</label>
																	<div class="col-sm-3">
																	   <p class="form-control-static">HDFC Bank</p>
																	</div>                                                                    
																	<label for="input-Default" class="col-sm-2 control-label">Bank Code</label>
																	<div class="col-sm-3">
																		<p class="form-control-static">HDFE 000123</p>
																	</div> 
																</div>
																<div class="col-md-12">	
																	<label for="input-Default" class="col-sm-2 control-label">Bank Account Number</label>
																	<div class="col-sm-3">
																	   <p class="form-control-static">002354678902</p>
																	</div>																
																	<label for="input-Default" class="col-sm-2 control-label">Branch Name</label>
																	<div class="col-sm-3">
																		<p class="form-control-static">Pune Main</p>
																	</div> 
																</div>
																<div class="col-md-12">	
																	<label for="input-Default" class="col-sm-2 control-label">Bank's Address</label>
																	<div class="col-sm-3">
																		<p class="form-control-static">Baner, Pune</p>
																	</div>                                                                    
																	<label for="input-Default" class="col-sm-2 control-label">Bank account type</label>
																	<div class="col-sm-3">
																		<p class="form-control-static">Current Account</p>
																	</div>
																</div>
																<div class="col-md-12">		
																	<label for="input-Default" class="col-sm-2 control-label">IFSC Code (11 digits)</label>
																	<div class="col-sm-3">
																	   <p class="form-control-static">HDFC1234</p>
																	</div>
																</div>
                                                            </div>                                                             
                                                        </div>
                                                     </div>
                                                </div>
											
                                            <div role="tabpanel" class="tab-pane fade" id="tab25">
                                                    <div class="container">
                                                    	<div class="row">
                                                        	<div class="col-md-12">
                                                            	<form class="form-horizontal" >
                                                                	<div class="col-md-6">ISO Certification</div>
																	<div class="col-md-12">
																		<div class="col-md-2">
																			<label style="line-height:25px;">ISO 9001</label>
																		</div>                                                                    
																		<div class="col-md-2">
																		 <p class="form-control-static">Yes</p>
																		</div>
																		<div class="col-md-2">
																			 <p class="form-control-static">12/12/2018</p>
																		</div>
																		<div class="col-sm-2">
																			<a href="" data-toggle="modal" data-target="#myModal2">View</a>  
																		 </div>
																	</div>
																	<div class="col-md-12">
																		<div class="col-md-2">
																			<label style="line-height:25px;">ISO 14000</label>
																		</div>                                                                    
																		<div class="col-md-2">
																		 <p class="form-control-static">No</p>
																		</div>
																		<div class="col-md-2">&nbsp;<br>
																		</div>
																		<div class="col-sm-2">																	 
																		 </div>
																	</div>
																	<div class="col-md-12">
																		<div class="col-md-2">
																			<label style="line-height:25px;">OHSAS</label>
																		</div>                                                                    
																		<div class="col-md-2">
																		 <p class="form-control-static">Yes</p>
																		</div>
																		<div class="col-md-2">
																			 <p class="form-control-static">15/08/2019</p>
																		</div>
																		<div class="col-sm-2">
																			<a href="" data-toggle="modal" data-target="#myModal2">View</a>  
																		 </div>
																	</div>
																	<div class="col-md-12">
																		<div class="col-md-2">
																			<label style="line-height:25px;">ISO 27000</label>
																		</div>																		
																		<div class="col-md-2">
																		 <p class="form-control-static">No</p>
																		</div>
																		<div class="col-md-2">
																		   &nbsp;
																		</div>
																		<div class="col-sm-2"></div>
																	</div>
                                                                    <div class="col-md-6">
																		Statutory Certifications:- IBR , CE , UL , ATEX etc:
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                         <p class="form-control-static">IBR</p>
                                                                    </div>
                                                                    <div class="col-md-2">&nbsp;<br>
                                                                    </div>
																	<div class="col-md-6">
                                                                    Approved by EPC Cos/ Consultants:-
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                         <p class="form-control-static">-</p>
                                                                    </div>
                                                                    <div class="col-md-2">&nbsp;<br>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    	Are there any legal cases  pending against the Company or its Directors/Partners/Owners etc  	
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                     <p class="form-control-static">-</p>
                                                                    </div>
                                                                    <div class="col-sm-2">
																		  
                                                                     </div>
                                                                    <br><br>
                                                                    
                                                                </form>
                                                             </div>
                                                              
                                                          </div>
                                                     </div>
                                                </div>    
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
      
					   <div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading clearfix">
									<h4 class="panel-title">Approvers Comments</h4>
								</div>
								<div class="panel-body">
								   <table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Department</th>												
												<th>Comments</th>
												<th>Status</th>												
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Amir</td>
												<td>Accounts</td>											   
												<td>Need Balance sheet</td>
												<td>Pending</td>												
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Yuvraj</td>
												<td>Sales</td>												
												<td>OK</td>
												<td>Completed</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Shirish</td>
												<td>Production</td>												
												<td>---</td>
												<td>Pending</td>
											</tr>											
										</tbody>
									</table>
								</div>
							</div>
						</div>
      
						<div class="col-md-12">
							<div class="panel panel-white">								
								<div class="panel-body">				
									<form class="form-inline">
										<div class="post col-md-7" >
											<label for="input-Default" class="col-sm-12 control-label">Enter the comments based on approvers feedback, to seek information from vendor</label><br><br>
											<textarea class="form-control" placeholder="Comments" rows="4" style="width:80%;margin-left:15px">Attach the balance sheet </textarea>
											<div class="post-options">
												<button type="button" class="btn btn-danger btn-rounded cu-btn-rounded ">Send Back to Vendor</button>
											</div>
										</div>
									</form>				
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
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Pan card</h4>
				</div>
				<div class="modal-body">
					<img src="assets/images/pan-card.gif" border="" width="100%"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!--<button type="button" class="btn btn-success">Save changes</button>-->
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Pan card</h4>
				</div>
				<div class="modal-body">
					<img src="assets/images/ISO-9001-2008-Certificate.jpg" border="" width="100%"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!--<button type="button" class="btn btn-success">Save changes</button>-->
				</div>
			</div>
		</div>
	</div>
<!-- Javascripts --> 
  <?php include("jsheader.php") ?>

</body>
</html>