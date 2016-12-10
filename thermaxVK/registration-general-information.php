<div role="tabpanel" class="tab-pane fade" id="tab21">
													<div class="container">
													 <div class="row">
													 
													  	 <div class="col-md-8"  ng-controller="generalInfoController"  id="generalInfoCtrl">
													  	 <div class="alert alert-success" id="general-success-alert">
															    <button type="button" class="close" data-dismiss="alert">x</button>
															    <strong>Success! </strong>
															    You have successfully saved General Information. Click Company Info tab to complete Company Information.
															</div>
															<div class="alert alert-warning collapse general-before-warning-alert" > <button type="button" class="close" data-dismiss="alert">x</button>
													    <strong>Warning! </strong>
													    You need to provide General Information first before moving ahead.
													</div>
													 <div><strong>NOTE: </strong>
															    All <span style="color: #d00;">*</span> marked fields are mandatory.
															</div>
															 <form class="form-horizontal" style="margin-top:30px;"
															 role="form"
														   ng-submit="submit()"
														   ng-fab-form-options="customFormOptions" >
														    <input type="hidden"  id="vendor_id" ng-model="generalInfoModel.vendor_id" name="vendor_id">
																 <div class="form-group  required">
												   <label for="input-Default" class="col-sm-3 control-label">Vendor Type</label>
													<div class="col-sm-3">
													   <select class="form-control m-b-sm" id="cboVendorType" name="vendor_type" required ng-model="generalInfoModel.vendor_type"
													   ng-options="vendor.id as vendor.vendor_type for vendor in model.vendorTypes ">
													   <option value="">Select Vendor Type</option></select>
													</div>
				  <label for="input-Default" class="col-sm-3 control-label">Vendor Sub Type</label>
													<div class="col-sm-3">
														<select
														name="vendor_sub_type"
													   required
													   ng-model="generalInfoModel.vendor_sub_type" 
														class="form-control m-b-sm"
														ng-options="vst.id as vst.vendor_subtype for vst in model.vendorSubTypes">
																				<option value="">Select Sub Type</option>
														</select>
													</div>
												</div>
				 <div class="form-group   required">
													<label for="input-Default" class="col-sm-3 control-label">Name (full legal name)</label>
													<div class="col-sm-9">
													   <input type="text" class="form-control" id="input-Default"
													   type="text"
													   placeholder="Enter Name"
													   name="vendor_name"
													   required=""
													   ng-model="generalInfoModel.vendor_name">
													</div>
												</div>
													<div class="form-group required">
													<label for="input-Default" class="col-sm-3 control-label">Nature of the entity</label>
													<div class="col-sm-9">
														<select
														name="entity_type"
													   required
													   ng-model="generalInfoModel.entity_type" 
														class="form-control m-b-sm"
														ng-options="vst.id as vst.name for vst in model.entityTypes">
																				<option value="">Select Entity Name</option>
														</select>

													</div>
												</div>
																	 <div class="form-group required">
													<label for="input-Default" class="col-sm-3 control-label">List of products / services</label>
													<div class="col-sm-9">
													   <input type="text" class="form-control" id="products_services"  required ng-model="generalInfoModel.products_services" name="products_services">
													</div>
												</div>
													<div class="form-group   required">
													<label for="input-Default" class="col-sm-3 control-label">Addresses</label>
																		 
													<div class="col-sm-9">
																		 <p class="help-block">Your "correspondence" address (We shall send purchase orders, cheques for payments etc to this address)</p>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="co_address1" required="" placeholder="Address line 1" ng-model="generalInfoModel.co_address1" name="co_address1"><br><br><br>
																		 <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="City"  required="" ng-model="generalInfoModel.co_city" name="co_city"><br><br><br>
														<select
														name="co_country"
													   required
													   ng-model="generalInfoModel.co_country" 
														class="form-control m-b-sm"
														ng-options="co.id as co.country_fname for co in model.countries">
														<option value="">Select Country</option>
														</select>																		 
													</div>
														<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 2" ng-model="generalInfoModel.co_address2" name="co_address2"><br><br><br>
													   <select
														name="co_state"
													   required
													   ng-model="generalInfoModel.co_state" 
														class="form-control m-b-sm"
														ng-options="st.name as st.name for st in model.states">
														<option value="">Select State</option>
														</select>
																		
													</div>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default"  placeholder="Address line 3" ng-model="generalInfoModel.co_address3" name="co_address3"><br><br><br>
																		 <input type="text"  class="form-control col-sm-3" required ng-maxlength="6" id="input-Default" placeholder="PIN / ZIP" ng-model="generalInfoModel.co_pincode" name="co_pincode"
																		 >
													</div>
																		</div>
												</div>
																	 <div class="form-group ">
													<label for="input-Default" class="col-sm-3 control-label">Addresses</label>
																		 
													<div class="col-sm-9">
																		 <p class="help-block">Your “ship from” address</p>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 1" ng-model="generalInfoModel.ship_address1" name="ship_address1"><br><br><br>
																		 <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="City" ng-model="generalInfoModel.ship_city" name="ship_city"><br><br><br>
																<select
														name="ship_country"
													   ng-model="generalInfoModel.ship_country" 
														class="form-control m-b-sm"
														ng-options="co.id as co.country_fname for co in model.countries">
														<option value="">Select Country</option>
														</select>

													</div>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 2" ng-model="generalInfoModel.ship_address2" name="ship_address2"><br><br><br>
																
																<select
														name="ship_state"
													   ng-model="generalInfoModel.ship_state" 
														class="form-control m-b-sm"
														ng-options="st.name as st.name for st in model.states">
														<option value="">Select State</option>
														</select>		 
																		
													</div>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 3" ng-model="generalInfoModel.ship_address3" name="ship_address3"><br><br><br>
																		 <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="PIN / ZIP" ng-model="generalInfoModel.ship_pincode" name="ship_pincode">
													</div>
																		</div>
												</div>
																	 <div class="form-group">
													<label for="input-Default" class="col-sm-3 control-label">Addresses</label>
																		 
													<div class="col-sm-9">
																		 <p class="help-block">Your registered/principal office address</p>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 1" ng-model="generalInfoModel.reg_address1" name="reg_address1"><br><br><br>
																		 <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="City" ng-model="generalInfoModel.reg_city" name="reg_city"><br><br><br>
																		 <select
														name="reg_country"
													   ng-model="generalInfoModel.reg_country" 
														class="form-control m-b-sm"
														ng-options="co.id as co.country_fname for co in model.countries">
														<option value="">Select Country</option>
														</select>
																	
													</div>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 2" ng-model="generalInfoModel.reg_address2" name="reg_address2"><br><br><br>
																	<select
														name="reg_state"
													   ng-model="generalInfoModel.reg_state" 
														class="form-control m-b-sm"
														ng-options="st.name as st.name for st in model.states">
														<option value="">Select State</option>
														</select>

																		
													</div>
																		<div class="col-sm-4">
													   <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="Address line 3" ng-model="generalInfoModel.reg_address3" name="reg_address3"><br><br><br>
																		 <input type="text" class="form-control col-sm-3" id="input-Default" placeholder="PIN / ZIP" ng-model="generalInfoModel.reg_pincode" name="reg_pincode">
													</div>
																		</div>
												</div>
																	 <div class="modal-footer">
														   <button type="submit" class="btn btn-primary btn-rounded cu-btn-rounded">Save </button>
															
														</div>
																</form>
															</div>
															<div class="col-md-3">
															 <ul class="list-group">
																	<li class="list-group-item">
																	 <h5>General Information</h5>
																	 <div class="progress progress-sm">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 48%">
																				<span class="sr-only">48% Complete</span>
																			</div>
																		</div>
																	</li>
																	<li class="list-group-item">
																	 <h5>Management</h5>
																	 <div class="progress progress-sm">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
																				<span class="sr-only">60% Complete</span>
																			</div>
																		</div>
																	</li>
																	<li class="list-group-item">
																	 <h5>Statutory Data</h5>
																	 <div class="progress progress-sm">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 22%">
																				<span class="sr-only">22% Complete</span>
																			</div>
																		</div>
																	</li>
																	<li class="list-group-item">
																	 <h5>Bank Details</h5>
																	 <div class="progress progress-sm">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 48%">
																				<span class="sr-only">48% Complete</span>
																			</div>
																		</div>
																	</li>
																	<li class="list-group-item">
																	 <h5>Third Certifications</h5>
																	 <div class="progress progress-sm">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
																				<span class="sr-only">60% Complete</span>
																			</div>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
													   
												</div>