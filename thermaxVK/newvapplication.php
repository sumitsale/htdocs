<?php
session_start();
if ($_SESSION['username']=='') {
    header('Location: index.php');
    exit;
  }
$vendorId="";
$vendorId = $_REQUEST['id'];
if(!$vendorId){
	 header('Location: view-application.php');
    exit;
}
//echo $vendorId;
include_once("protected/modelDirect.php");
$vendorInformation=$model->getVendorDetails($vendorId);
//print_r($vendorInformation);
if($vendorInformation['count']>0){
$generalInformation=$vendorInformation['generalInformation'][0];
$companyInformation=$vendorInformation['companyInformation'];
$managementInformation=$vendorInformation['managementInformation'];
$relatedEntitiesInformation=$vendorInformation['relatedEntitiesInformation'];
$statutoryInformation=$vendorInformation['statutoryInformation'];
if(empty($vendorInformation['bankInformation']))
$bankInformation="";
else
$bankInformation=$vendorInformation['bankInformation'][0];
}
else{
$generalInformation="";
$companyInformation="";
$managementInformation="";
$relatedEntitiesInformation="";
$statutoryInformation="";
$bankInformation="";
}
$applicationComments=$model->getApplicationComments($vendorId);
$commentstrail="<ul>";
foreach($applicationComments as $comment){
	if($comment['commentsflg']==1){
		$commentstrail=$commentstrail."<li><i>On <label>".date('d-M-Y',strtotime($comment['date']))."</label> - <label>".$comment['empname']."</label></i> against <label>".$comment['commentssection']."</label>  <span style='color:#00aaff'> and intimated the vendor </span></br>".$comment['comments']." </br></li>"; 
	}else{
		$commentstrail=$commentstrail."<li><i>On <label>".date('d-M-Y',strtotime($comment['date']))."</label> - <label>".$comment['empname']."</label></i> against <label>".$comment['commentssection']."</label></br>".$comment['comments']." </br></li>"; 
	}
 }
$buttontext="";
if (($_SESSION['role']=='Approver')){ 
	$buttontext="Add & Send to Proposer";
}else{
	$buttontext="Add & Send to Vendor";
}
 
$departments=$model->getDepartment();
$strdept="<select class='form-control m-b-sm col-sm-8' id='cbodept' name='cbodept' style='width:250px' onchange=getApprover()><option value=''>Select</option>";
foreach($departments as $department){
	$strdept=$strdept."<option value='".$department['id']."'>".$department['name']."</option>"; 			
}
$strdept=$strdept."</select>";
 
//print_r($bankInformation);
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
<?php error_reporting(0); ?>
<?php
	$fl=$_REQUEST['fl'];
	
	if($fl!='ext'){
	
		$psDetails=$model->getPSectionDetails($vendorId);
//print_r($psDetails);
		$divisions=$model->getDivision();
		$strdivision="<select class='form-control m-b-sm col-sm-8' id='cbodivision' name='cbodivision' style='width:250px'><option value=''>Select</option>";
		foreach($divisions as $division){
			if($psDetails[0]['vendor_psecctiondiv']==$division['divid']){
				$strdivision=$strdivision."<option value='".$division['divid']."' selected>".$division['divname']."</option>"; 
			}else{
				$strdivision=$strdivision."<option value='".$division['divid']."'>".$division['divname']."</option>"; 
			}			
		}
		$strdivision=$strdivision."</select>";

		$tdstypes=$model->getTDSType();
		$strtdstype="<select class='form-control m-b-sm col-sm-8' id='cbotdstype' name='cbotdstype' style='width:250px'><option value=''>Select</option>";
		foreach($tdstypes as $tdstype){
			if($psDetails[0]['vendor_psecctiontdstype']==$tdstype['idmast_tds_type']){
				$strtdstype=$strtdstype."<option value='".$tdstype['idmast_tds_type']."' selected>".$tdstype['tds_type']."</option>"; 
			}else{
				$strtdstype=$strtdstype."<option value='".$tdstype['idmast_tds_type']."'>".$tdstype['tds_type']."</option>";
			}
		}
		$strtdstype=$strtdstype."</select>";		
				
		$businessCats=$model->getBusinessCategory();
		$strbusinessCats="<select class='form-control m-b-sm col-sm-8' id='cbobuscat' name='cbobuscat' style='width:250px'><option value=''>Select</option>";
		foreach($businessCats as $businessCat){
		if($psDetails[0]['vendor_psecctionbuscat']==$businessCat['id']){
				$strbusinessCats=$strbusinessCats."<option value='".$businessCat['id']."' selected>".$businessCat['name']."</option>"; 
			}else{
				$strbusinessCats=$strbusinessCats."<option value='".$businessCat['id']."'>".$businessCat['name']."</option>";
			}
		}
		$strbusinessCats=$strbusinessCats."</select>";
		
		$currencys=$model->getCurrency();
		$strcurrency="<select class='form-control m-b-sm col-sm-8' id='cbocurrency' name='cbocurrency' style='width:250px'><option value=''>Select</option>";
		foreach($currencys as $currency){
		if($psDetails[0]['vendor_psecctioncurr']==$currency['id']){
				$strcurrency=$strcurrency."<option value='".$currency['id']."' selected>".$currency['currency_type']."</option>";
			}else{
				$strcurrency=$strcurrency."<option value='".$currency['id']."'>".$currency['currency_type']."</option>";
			}
		}
		$strcurrency=$strcurrency."</select>";
		
		$delterms=$model->getDeliveryTerms();
		$strdelterm="<select class='form-control m-b-sm col-sm-8' id='cbodelterm' name='cbodelterm' style='width:250px'><option value=''>Select</option>";
		foreach($delterms as $delterm){
		if($psDetails[0]['vendor_psecctiondterms']==$delterm['idmast_delivery_terms']){
				$strdelterm=$strdelterm."<option value='".$delterm['idmast_delivery_terms']."' selected>".$delterm['term_name']."</option>"; 
			}else{
				$strdelterm=$strdelterm."<option value='".$delterm['idmast_delivery_terms']."'>".$delterm['term_name']."</option>"; 
			}
		}
		$strdelterm=$strdelterm."</select>";
		
		$vedCats=$model->getVED();
		$strvedCat="<select class='form-control m-b-sm col-sm-8' id='cbovedCat' name='cbovedCat' style='width:250px'><option value=''>Select</option>";
		foreach($vedCats as $vedCat){
		if($psDetails[0]['vendor_psecctionved']==$vedCat['idmast_ved']){
				$strvedCat=$strvedCat."<option value='".$vedCat['idmast_ved']."' selected>".$vedCat['ved_type']."</option>"; 
			}else{
				$strvedCat=$strvedCat."<option value='".$vedCat['idmast_ved']."'>".$vedCat['ved_type']."</option>"; 
			}
		}
		$strvedCat=$strvedCat."</select>";
		
		$suppstatuss=$model->getSuppStatus();
		$strsuppstatus="<select class='form-control m-b-sm col-sm-8' id='cbosuppstatus' name='cbosuppstatus' style='width:250px'><option value=''>Select</option>";
		foreach($suppstatuss as $suppstatus){
		if($psDetails[0]['vendor_psecctionsstatus']==$suppstatus['idmast_suppstatus']){
				$strsuppstatus=$strsuppstatus."<option value='".$suppstatus['idmast_suppstatus']."' selected>".$suppstatus['suppstatus_type']."</option>"; 
			}else{
				$strsuppstatus=$strsuppstatus."<option value='".$suppstatus['idmast_suppstatus']."'>".$suppstatus['suppstatus_type']."</option>"; 
			}
		}
		$strsuppstatus=$strsuppstatus."</select>";
		
		$itemlists=$model->getItemsList();
		$stritemlists="<select class='form-control m-b-sm col-sm-8' id='cboitemlists' name='cboitemlists' style='width:250px'><option value=''>Select</option>";
		foreach($itemlists as $itemlist){
		if($psDetails[0]['vendor_psecctionsitem']==$itemlist['idmast_supplier_items']){
				$stritemlists=$stritemlists."<option value='".$itemlist['idmast_supplier_items']."' selected>".$itemlist['item_name']."</option>";
			}else{
				$stritemlists=$stritemlists."<option value='".$itemlist['idmast_supplier_items']."'>".$itemlist['item_name']."</option>";
			}
		}
		$stritemlists=$stritemlists."</select>";
		
			
	}
	//echo $fl;
?>
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
					<h3>View Applications -> New Application</h3>
				</div>
				<div id="main-wrapper">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-body">
									<div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs nav-justified" role="tablist">
											<!--<li role="presentation" class="active"><a href="#tab20" role="tab" data-toggle="tab"><span aria-hidden="true" class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Welcome</a></li> -->
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
														<div class="col-md-8">															
															<div class="row">																	
																<label class="col-sm-2 control-label">Type</label>
																<span class="col-sm-4 control-label"><?php echo $generalInformation['vendor_type']; ?></span>
																<label class="col-sm-2 control-label">Sub-Type</label>
																<span class="col-sm-4 control-label"><?php echo $generalInformation['vendor_subtype']; ?></span>													
															</div>
															<div class="row">
																<label class="col-sm-2 control-label">Name</label>
																<span class="col-sm-4 control-label">
																	<?php echo $generalInformation['vendor_name']; ?>
																</span>									 
																<label class="col-sm-2 control-label">Entity Nature</label>
																<span class="col-sm-4 control-label">
																	<?php echo $generalInformation['name']; ?>
																</span>	
															</div>
															<div class="row">															 
																 <label class="col-sm-2 control-label">List of products / services</label>
																 <span class="col-sm-4 control-label">
																	<?php echo $generalInformation['products_services']; ?>
																</span>																
															</div>
															<div class="row">
																 <label class="col-sm-2 control-label">Addresses</label>
																 <div class="col-sm-3">														                   
																	<label>Correspondance</label><br>
																	<?php echo $generalInformation['co_address1']; ?><br>
																	<?php echo $generalInformation['co_address2']; ?><br>
																	<?php echo $generalInformation['co_address3']; ?><br>
																	<?php echo $generalInformation['co_city']; ?>,  <?php echo $generalInformation['co_pincode']; ?><br><?php echo $generalInformation['co_state']; ?>, <?php echo $generalInformation['co_country']; ?><br>
																</div>
																<div class="col-sm-3">
																	<label>Shipping From</label><br>
																	<?php echo $generalInformation['ship_address1']; ?><br>
																	<?php echo $generalInformation['ship_address2']; ?><br>
																	<?php echo $generalInformation['ship_address3']; ?><br>
																	<?php echo $generalInformation['ship_city']; ?>,  <?php echo $generalInformation['ship_pincode']; ?><br><?php echo $generalInformation['ship_state']; ?>, <?php echo $generalInformation['ship_country']; ?><br>
																</div>
																<div class="col-sm-3">
																	<label>Registered</label><br>
																	<?php echo $generalInformation['reg_address1']; ?><br>
																	<?php echo $generalInformation['reg_address2']; ?><br>
																	<?php echo $generalInformation['reg_address3']; ?><br>
																	<?php echo $generalInformation['reg_city']; ?>,  <?php echo $generalInformation['reg_pincode']; ?><br><?php echo $generalInformation['reg_state']; ?>, <?php echo $generalInformation['reg_country']; ?><br></p>
																</div>
															</div>														
														</div>
														<div class="col-md-4">
															<div class="row" style="/*margin-top:20px*/border-left: 1px solid;padding-left: 10px;">
																<form id="frmcomment_GeneralInformation" name="frmcomment_GeneralInformation">
																	<input type="hidden" id="txthidden_GeneralInformation" name="txthidden_GeneralInformation" value="<?php echo $vendorId ?>">
																	<label class="col-md-12">Add Comments</label>
																	<textarea class="col-md-12" id="txtcomment_GeneralInformation" type="text" name="txtcomment_GeneralInformation" rows="8" style="width:68%;float:left"></textarea>
																	<div class="col-md-12" style="padding-top:10px">
																		<div id="dcmt_GeneralInformation" style="width:180px;float:left"></div>
																		<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('GeneralInformation','0')">Add</button> 
																		
																			<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('GeneralInformation','1')"><?php echo $buttontext; ?></button>
																		
																		
																		
																	</div>
																</form>
															</div>
																																				
														</div>
														
													</div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab22">
												 <div class="container">
													<div class="row">
														<div class="col-md-8">
															<div class="row">
																<label class="col-sm-12 control-label">Key Contacts</label>
																<?php
																foreach($managementInformation as $info){
																?>																	
																<div class="col-sm-4">
																	<p class="form-control-static">
																		<strong><?php echo $info['key_contact']; ?></strong><br>
																		<?php echo $info['name']; ?><br>
																		<?php echo $info['landline']; ?><br>
																		<?php echo $info['mobile_number']; ?><br>
																		<?php echo $info['email']; ?></p>
																</div>
																<?php } ?>
																
															 </div>
															<div class="row">
																<label class="col-sm-3 control-label">Name of related entity</label>
																<label class="col-sm-3 control-label">Relationship</label>
																<label class="col-sm-3 control-label">Name of Common</label>
																<label class="col-sm-3 control-label">Thermax Code</label><br>
															</div>	
															
															<div class="row">
																<?php
																foreach($relatedEntitiesInformation as $info){
																?>
																<span class="col-sm-3 control-label"><?php echo $info['entity_name']; ?></span>
																<span class="col-sm-3 control-label"><?php echo $info['name']; ?></span>
																<span class="col-sm-3 control-label"><?php echo $info['comman_person_name']; ?></span>
																<span class="col-sm-3 control-label"><?php echo $info['thermax_code']; ?></span><br></br>
																<?php } ?>
															</div>
																
															<div class="row">
																<label class="col-sm-10 control-label">Are any of your directors/ partners/ owners or relatives working/were working in THERMAX?</label>
																<div class="col-sm-2"><?php echo $generalInformation['relation_with_thermax']; ?></div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="row" style="/*margin-top:20px*/border-left: 1px solid;padding-left: 10px;">
																<form id="frmcomment_ManagementInfo" name="frmcomment_ManagementInfo">
																	<input type="hidden" id="txthidden_ManagementInfo" name="txthidden_ManagementInfo" value="<?php echo $vendorId ?>">
																	<label class="col-md-12">Add Comments</label>
																	<textarea class="col-md-12" id="txtcomment_ManagementInfo" type="text" name="txtcomment_ManagementInfo" rows="8" style="width:68%;float:left"></textarea>
																	<div class="col-md-12" style="padding-top:10px">
																	<div id="dcmt_ManagementInfo" style="width:180px;float:left"></div>
																	<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('ManagementInfo','0')">Add</button> <button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('ManagementInfo','1')"><?php echo $buttontext; ?></button>
																	</div>
																</form>
															</div>																						
														</div>
													</div>
												 </div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab23">
											   <div class="container">
													<div class="row">
														<div class="col-md-8">													
															<?php
																$path="";
																foreach($statutoryInformation as $info){
																	if($info['name']!="")
																		$path="server\\php\\files\\".$info['name'];
															?>
																<div class="col-sm-12">
																	<label style="line-height:25px;" class="col-sm-3 control-label"><?php echo $info['statutory_data_name']; ?> </label>
																	<div class="col-sm-3">
																	   <?php echo $info['statutory_data_value']; ?>
																	</div>
																	<div class="col-sm-3">
																		<?php echo $info['valid_till_date']; ?>
																	</div>
																	<div class="col-sm-3">
																	<?php
																		if($info['name']!=""){
																	?>
																		<a href="<?php echo $path; ?>" target="_blank">View</a>  
																	<?php } ?>
																	 </div>
																</div>
															<?php
																$path="";}
															?>
														</div>
														<div class="col-md-4">
															<div class="row" style="/*margin-top:20px*/border-left: 1px solid;padding-left: 10px;">
																<form id="frmcomment_StatutoryInfo" name="frmcomment_StatutoryInfo">
																	<input type="hidden" id="txthidden_StatutoryInfo" name="txthidden_StatutoryInfo" value="<?php echo $vendorId ?>">	<label class="col-md-12">Add Comments</label>
																	<textarea class="col-md-12" id="txtcomment_StatutoryInfo" type="text" name="txtcomment_StatutoryInfo" rows="8" style="width:68%;float:left"></textarea>
																	<div class="col-md-12" style="padding-top:10px">
																	<div id="dcmt_StatutoryInfo" style="width:180px;float:left"></div>
																	<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('StatutoryInfo','0')">Add</button> <button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('StatutoryInfo','1')"><?php echo $buttontext; ?></button>
																	</div>
																</form>
															</div>																						
														</div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab24">
                                                     <div class="container">
                                                    	<div class="row">
                                                        	<div class="col-md-8">   
																<div class="col-md-12">		
																	<label  style="line-height:25px;" class="col-sm-3 control-label" >IFSC Code (11 digits)</label>
																	<div class="col-sm-3">
																	   <?php echo $bankInformation['ifsc_code']; ?>
																	</div>
																</div>
																<div class="col-md-12">
																	<label  style="line-height:25px;" class="col-sm-3 control-label">Bank Name</label>
																	<div class="col-sm-3">
																	   <?php echo $bankInformation['bank_name']; ?>
																	</div>                                                                    
																	<label  class="col-sm-3 control-label">Bank Code</label>
																	<div class="col-sm-3">
																		<?php echo $bankInformation['bank_code']; ?>
																	</div> 
																</div>
																<div class="col-md-12">	
																	<label  style="line-height:25px;" class="col-sm-3 control-label">Bank Account Number</label>
																	<div class="col-sm-3">
																	   <?php echo $bankInformation['bank_account_number']; ?>
																	</div>																
																	<label  class="col-sm-3 control-label">Branch Name</label>
																	<div class="col-sm-3">
																		<?php echo $bankInformation['branch_name']; ?>
																	</div> 
																</div>
																<div class="col-md-12">	
																	<label  style="line-height:25px;" class="col-sm-3 control-label">Bank's Address</label>
																	<div class="col-sm-3">
																		<?php echo $bankInformation['bank_address']; ?>
																	</div>                                                                    
																	<label  class="col-sm-3 control-label">Bank account type</label>
																	<div class="col-sm-3">
																		<?php echo $bankInformation['bank_account_type']; ?>
																	</div>
																</div>
																
                                                            </div> 
															<div class="col-md-4">	
																<div class="row" style="/*margin-top:20px*/border-left: 1px solid;padding-left: 10px;">
																	<form id="frmcomment_BankInfo" name="frmcomment_BankInfo">
																		<input type="hidden" id="txthidden_BankInfo" name="txthidden_BankInfo" value="<?php echo $vendorId ?>">
																		<label class="col-md-12">Add Comments</label>
																		<textarea class="col-md-12" id="txtcomment_BankInfo" type="text" name="txtcomment_BankInfo" rows="8" style="width:68%;float:left"></textarea>
																		<div class="col-md-12" style="padding-top:10px">
																		<div id="dcmt_BankInfo" style="width:180px;float:left"></div>
																		<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('BankInfo','0')">Add</button> <button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('BankInfo','1')"><?php echo $buttontext; ?></button>
																		</div>
																	</form>
																</div>
																																					
															</div>                                                            
                                                        </div>
                                                     </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab25">
                                                    <div class="container">
                                                    	<div class="row">
                                                        	<div class="col-md-8">                                                            	
																<div class="col-md-12">ISO Certification</div>
																<?php
																	$path="";
																	foreach($companyInformation as $info){
																		if($info['name']!="")
																			$path="server\\php\\files\\".$info['name'];
																?>
																	<div class="col-md-12">
																		<div class="col-md-6">
																			<label style="line-height:25px;"><?php echo $info['certification_name'];  ?></label>
																		</div>                                                                    
																		<div class="col-md-3">
																			<?php echo $info['valid_till_date'] ; ?>
																		</div>
																		<div class="col-md-3">
																			<?php
																				if($info['name']!=""){
																			?>
																				<a href="<?php echo $path; ?>" target="_blank">View</a>  
																			<?php } ?>
																		 </div>
																	</div>
																<?php  $path="";} ?>
                                                                
                                                             </div>
                                                              <div class="col-md-4">
																<div class="row" style="/*margin-top:20px*/border-left: 1px solid;padding-left: 10px;">
																	<form id="frmcomment_CertificationInfo" name="frmcomment_CertificationInfo">
																		<input type="hidden" id="txthidden_CertificationInfo" name="txthidden_CertificationInfo" value="<?php echo $vendorId ?>">
																		<label class="col-md-12">Add Comments</label>
																		<textarea class="col-md-12" id="txtcomment_CertificationInfo" type="text" name="txtcomment_CertificationInfo" rows="8" style="width:68%;float:left"></textarea>
																		<div class="col-md-12" style="padding-top:10px">
																		<div id="dcmt_CertificationInfo" style="width:180px;float:left"></div>
																		<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('CertificationInfo','0')">Add</button> <button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="saveComment('CertificationInfo','1')"><?php echo $buttontext; ?></button>
																		</div>
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
					  </div>
					  
					  
						<div class=" col-md-12" style="/*margin-top:20px;border-left: 1px solid;padding-left: 10px;*/">
							<div class="panel panel-white">
								<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Previous Comments</h4>
                                </div>
								<div class="panel-body"> 
									<div style="height:250px;overflow: auto;"><?php echo $commentstrail; ?></div>
								</div>
							</div>
						</div>	
					  
					  <?php
						if(($_SESSION['role']!='Approver')){
					  ?>
					  
					  <div class="col-md-12">
                        	<div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Proposer Section</h4>
                                </div>
                                <div class="panel-body">                                	
                                	<form id="frmpsection" name="frmpsection">
										<input type="hidden" id="txthidden_psection" name="txthidden_psection" value="<?php echo $vendorId ?>">
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Division</label>
												 <?php echo $strdivision; ?>
											</div>
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">TDS Type</label>
												 	<?php echo $strtdstype; ?>			
											</div>  
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Business Category</label>
													<?php echo $strbusinessCats; ?>	
											</div>
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Trans Curr</label>
												 <?php echo $strcurrency; ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Delivery Terms</label>
												 <?php echo $strdelterm; ?>
											</div>
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Type of Purchase</label>
												 <input type="radio" name="rdpurchase" value="0" checked> Voucher Payment
												 <input type="radio" name="rdpurchase" value="1"> Purchase Order<br>											
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Supplier Category</label>
												 <input type="radio" name="rdsupcat" value="0" checked> One Time
												 <input type="radio" name="rdsupcat" value="1"> Regular<br>													
											</div>
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">VED Analysis</label>
												  <?php echo $strvedCat; ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Supplier Status</label>
												<?php echo $strsuppstatus; ?>
											</div>
											<div class="form-group col-md-6">
												 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Supp Required For</label>
													<?php echo $stritemlists; ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												 <div id="dpsection"></div>												
											</div>
											<div class="form-group col-md-6" style="text-align: right;padding-right: 110px;">
												<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="savePSection('certification')">Save</button> <?php if($generalInformation['app_status']=="Submitted") {?><button type="button" class="btn btn-danger btn-rounded" onclick="initiateappproc()">Initiate Approval Process</button> <?php } else { ?>
												</br><label style='color:#00aaff'>Cannot initiate approval process, as application is pending with vendor/Approver. Please see comments log above.</label>
												<?php } ?>
											</div>
										</div>
                                    </form>
                                    <br><br>
                                    
                                </div>
								
                            </div>
                        </div>
					  
					  <!--
					   <div class="col-md-12">
                        	<div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Assign Approver</h4>
                                </div>
                                <div class="panel-body">                                	
                                		<div class="col-md-12">
											<form id="frmdeptapprover" name="frmdeptapprover">
										
												<div class="form-group col-md-6">
													 <label  class="control-label col-sm-4" style="margin-bottom: 15px;">Department</label>
													 <?php //echo $strdept; ?>											
												</div>
												<div class="form-group col-md-4" id="dapprover">
													 
																							
												</div>							
											
												<div class="form-group" style="margin-bottom: 15px;">
													<button type="button" class="btn btn-danger btn-rounded"><i class="fa fa-plus"></i></button>
												</div>
											</form>
										</div>
                                    <br><br>
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Amir</td>
                                                <td>Accounts</td>
                                                
                                                <td><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Amir</td>
                                                <td>Accounts</td>
                                                
                                                <td><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Amir</td>
                                                <td>Accounts</td>
                                                
                                                <td><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Amir</td>
                                                <td>Accounts</td>
                                                
                                                <td><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
									<div class="form-group" style="margin-bottom: 15px;">
										<button type="button" class="btn btn-danger btn-rounded">Initiate Approval Process</button>
									</div>
                                </div>
								
                            </div>
                        </div> -->
					<?php
						}else{
					?>
						<div class="col-md-12">
                        	<div class="panel panel-white">
                            	<div class="panel-heading clearfix">
                                    <h4 class="panel-title">Complete the Process</h4>
                                </div>
                                <div class="panel-body">                                	
                                		
									<div class="form-group" style="margin-bottom: 15px;">
										<form id="frmcommentapp" name="frmcommentapp">
											<input type="hidden" id="txthiddenapp" name="txthiddenapp" value="<?php echo $vendorId ?>">
											<label class="col-md-12">Add Comments</label>
											<textarea class="col-md-12" id="txtcommentapp" type="text" name="txtcommentapp" rows="8" style="width:68%;float:left"></textarea>
											<div class="col-md-12" style="padding-top:10px">
											<div id="dcmtapp" style="width:180px;float:left"></div>
											<button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="approveapp('Approve','0')">Approve Application</button> <button type="button" class="btn btn-danger btn-rounded" style="margin-left:10px" onclick="approveapp('reject','0')">Reject Application</button>
											</div>
										</form>
																	
									</div>
                                </div>
								
                            </div>
                        </div>
					<?php
						}
					?>
					

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
<script>
	//$("#dcmt_"+vl).html("");
	$("#dpsection").html("");
			
	function saveComment(vl,v2){
		//alert(vl);
		$("#dcmt_"+vl).html("");
		//cmt=$("txtcomment_"+saveComment).val();
		$.ajax({
		  url	: "protected/controller.php?action=saveapplicationcomment&section="+vl+"&commentsflg="+v2,
		  type	: "POST",
		  dataType: "JSON",		  
		  data	: $('#frmcomment_'+vl).serialize() ,
		  success: function(dt){			
			console.log(dt);
			if(dt.error != 1){
				$("#dcmt_"+vl).html("Comment Saved!"); 
				location.reload();
			}
		  },
		  error:function (request, status, error){
			console.log(request.responseText);
		 }
		});
	}
	
	function approveapp(vl,v2){
		//alert(vl);
		$("#dcmtapp").html("");
		//cmt=$("txtcomment_"+saveComment).val();
		$.ajax({
		  url	: "protected/controller.php?action=apprejapplication&section="+vl+"&commentsflg="+v2,
		  type	: "POST",
		  dataType: "JSON",		  
		  data	: $('#frmcommentapp').serialize() ,
		  success: function(dt){			
			console.log(dt);
			if(dt.error != 1){
				$("#dcmtapp").html("Comment Saved!"); 
				location.reload();
			}
		  },
		  error:function (request, status, error){
			console.log(request.responseText);
		 }
		});
	}
	
	function savePSection(){
		$("#dpsection").html("");
		$.ajax({
		  url	: "protected/controller.php?action=saveapplicationpsection",
		  type	: "POST",
		  dataType: "JSON",		  
		  data	: $('#frmpsection').serialize() ,
		  success: function(dt){			
			console.log(dt);
			if(dt.error != 1){
				$("#dpsection").html("Details Saved!"); 
			}
		  },
		  error:function (request, status, error){
			console.log(request.responseText);
		 }
		});
	}
	
	function initiateappproc(){
		$("#dpsection").html("");
		$.ajax({
		  url	: "protected/controller.php?action=initiateappproc",
		  type	: "POST",
		  dataType: "JSON",		  
		  data	: $('#frmpsection').serialize() ,
		  success: function(dt){			
			console.log(dt);
			if(dt.error != 1){
				$("#dpsection").html("Process Initiated!"); 
				location.reload();
			}
		  },
		  error:function (request, status, error){
			console.log(request.responseText);
		 }
		});
	}
	
	function getApprover(){
		$("#dapprover").html("");
		$.ajax({
		  url	: "protected/controller.php?action=getapprover",
		  type	: "POST",
		  dataType: "JSON",		  
		  data	: $('#frmdeptapprover').serialize() ,
		  success: function(dt){			
			console.log(dt);
			if(dt.error != 1){
				$("#dapprover").html(dt.result); 
			}
		  },
		  error:function (request, status, error){
			console.log(request.responseText);
		 }
		});
	
	}
</script>
</html>