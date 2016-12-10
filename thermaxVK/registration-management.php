<div role="tabpanel" class="tab-pane fade" id="tab22">
  <div class="container">
 	<div class="row">
     	<div class="col-md-8" ng-controller="managementInfoController" id="managementInfo">
         <div class="alert alert-success" id="management-success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        You have successfully saved Management Information. Click Statutory Data tab to complete Statutory Data Information.
                        </div>
                        <div><strong>NOTE: </strong>
						  All <span style="color: #d00;">*</span> marked fields are mandatory. Atleast one key contact needs to be entered.
					  </div>
					  <div class="help-block" style="font-weight: bold;font-size: 12px;color: #000000;">The emailid provided shall be used for all communications including payment intimations.
					  </div>
					  
         	<form class="form-horizontal" style="margin-top:30px;" role="form"
                                             ng-submit="submit()"
                                             ng-fab-form-options="customFormOptions">
             	<div class="form-group">
                 <div class="col-sm-3"><strong>Key contacts</strong></div>
                 <div class="col-sm-2"><select class="form-control m-b-sm" id="key_contact_id_1" name="key_contact_id_1" required ng-model="managementKeyContactsModel.row1.key_contact_id"
               ng-options="kc.idmast_key_contact as kc.key_contact for kc in model.keyContacts">
               <option value="">Select</option></select></div>
                 <div class="col-sm-2"><select class="form-control m-b-sm" id="key_contact_id_2" name="key_contact_id_2"  ng-model="managementKeyContactsModel.row2.key_contact_id"
               ng-options="kc.idmast_key_contact as kc.key_contact for kc in model.keyContacts">
               <option value="">Select</option></select></div>
                 <div class="col-sm-2"><select class="form-control m-b-sm" id="key_contact_id_3" name="key_contact_id_3"  ng-model="managementKeyContactsModel.row3.key_contact_id"
               ng-options="kc.idmast_key_contact as kc.key_contact for kc in model.keyContacts">
               <option value="">Select</option></select></div>
                 <div class="col-sm-2"><select class="form-control m-b-sm" id="key_contact_id_4" name="key_contact_id_4"  ng-model="managementKeyContactsModel.row4.key_contact_id"
               ng-options="kc.idmast_key_contact as kc.key_contact for kc in model.keyContacts">
               <option value="">Select</option></select></div>
                 </div>
             	<div class="form-group required">
						 <label for="input-Default" class="col-sm-3 control-label">Name </label>
					 	<div class="col-sm-2">
						 <input type="text" class="form-control" id="name_1"
                   placeholder="Name"
                  name="name_1"
                  required
                  
                  ng-model="managementKeyContactsModel.row1.name">
					 	</div>
                     <div class="col-sm-2">
						 <input type="text" class="form-control" id="name_2"
                   placeholder="Name"
                  name="name_2"
                  ng-model="managementKeyContactsModel.row2.name">
					 	</div>
                     <div class="col-sm-2">
						  <input type="text" class="form-control" id="name_3"
                   placeholder="Name"
                  name="name_3"
                  ng-model="managementKeyContactsModel.row3.name">
					 	</div>
                     <div class="col-sm-2">
						  <input type="text" class="form-control" id="name_4"
                   placeholder="Name"
                  name="name_4"
                  ng-model="managementKeyContactsModel.row4.name">
					 	</div>
				 </div>
                  <div class="form-group required">
						 <label for="input-Default" class="col-sm-3 control-label">Designation/Title </label>
					 	<div class="col-sm-2">
                   <input type="text" class="form-control" id="title_1"
                   placeholder="Title"
                  name="title_1"
                  required
                  ng-model="managementKeyContactsModel.row1.title">
                  </div>
                     <div class="col-sm-2">
                   <input type="text" class="form-control" id="title_2"
                   placeholder="Title"
                  name="title_2"
                  ng-model="managementKeyContactsModel.row2.title">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="title_3"
                   placeholder="Title"
                  name="title_3"
                  ng-model="managementKeyContactsModel.row3.title">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="title_4"
                   placeholder="Title"
                  name="title_4"
                  ng-model="managementKeyContactsModel.row4.title">
                  </div>
				 </div>
 <div class="form-group required">
						 <label for="input-Default" class="col-sm-3 control-label">Landline </label>
					 	<div class="col-sm-2">
                   <input type="text" class="form-control" id="landline_1"
                   placeholder="Landline"
                  name="landline_1"
                  required
                  ng-model="managementKeyContactsModel.row1.landline">
                  </div>
                     <div class="col-sm-2">
                   <input type="text" class="form-control" id="landline_2"
                   placeholder="Landline"
                  name="landline_2"
                  ng-model="managementKeyContactsModel.row2.landline">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="landline_3"
                   placeholder="Landline"
                  name="landline_3"
                  ng-model="managementKeyContactsModel.row3.landline">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="landline_4"
                   placeholder="Landline"
                  name="landline_4"
                  ng-model="managementKeyContactsModel.row4.landline">
                  </div>
				 </div>
                  <div class="form-group required">
						 <label for="input-Default" class="col-sm-3 control-label">Mobile no </label>
					 	<div class="col-sm-2">
                  <input type="text" class="form-control" id="mobile_number_1"
                   placeholder="Mobile Number"
                  name="mobile_number_1"
                  required
                  ng-model="managementKeyContactsModel.row1.mobile_number">
                  </div>
                     <div class="col-sm-2">
                   <input type="text" class="form-control" id="mobile_number_2"
                   placeholder="Mobile Number"
                  name="mobile_number_2"
                  ng-model="managementKeyContactsModel.row2.mobile_number">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="mobile_number_3"
                   placeholder="Mobile Number"
                  name="mobile_number_3"
                  ng-model="managementKeyContactsModel.row3.mobile_number">
                  </div>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="mobile_number_4"
                   placeholder="Mobile Number"
                  name="mobile_number_4"
                  ng-model="managementKeyContactsModel.row4.mobile_number">
                  </div>
				 </div>
                  <div class="form-group required">
						<label for="input-Default" class="col-sm-3 control-label">E mail address</label>
					 	<div class="col-sm-2">
                   <input type="email" class="form-control" id="email_1"
                   placeholder="Email"
                  name="email_1"
                  required
                  ng-model="managementKeyContactsModel.row1.email">
                  </div>
                   <div class="col-sm-2">
                   <input type="text" class="form-control" id="email_2"
                   placeholder="Email"
                  name="email_2"
                  ng-model="managementKeyContactsModel.row2.email">
                  </div>
                     <div class="col-sm-2">
                    <input type="text" class="form-control" id="email_3"
                   placeholder="Email"
                  name="email_3"
                  ng-model="managementKeyContactsModel.row3.email">
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" id="email_4"
                   placeholder="Email"
                  name="email_4"
                  ng-model="managementKeyContactsModel.row4.email">
                  </div>
				 </div>
<div class="form-group">
                 <p class="help-block">Please declare the names of the entities related to you (entities under control of same management). This declaration is mandatory</p>
                 <label for="input-Default" class="col-sm-3 control-label">Name of related entity</label>
<label for="input-Default" class="col-sm-3 control-label">Relationship</label>
<label for="input-Default" class="col-sm-3 control-label">Names of common person</label>
<label for="input-Default" class="col-sm-3 control-label">Thermax Vendor Code</label>
</div>
<div class="form-group">
<div class="col-sm-3">
                 <input type="text" class="form-control" id="entity_name_1"
                   placeholder="Entity Name"
                  name="entity_name_1"
                  ng-model="managementRelationshipsModel.row1.entity_name">                                                                    
                 </div>
<div class="col-sm-3">
                    <select class="form-control m-b-sm" id="relationship_id_1" name="relationship_id_1"  ng-model="managementRelationshipsModel.row1.relationship_id"
               ng-options="rs.id as rs.name for rs in model.relationships">
               <option value="">Select</option></select>                                                                
                 </div>
<div class="col-sm-3">
                    <input type="text" class="form-control" id="comman_person_name_1"
                   placeholder="Comman Person"
                  name="comman_person_name_1"
                  ng-model="managementRelationshipsModel.row1.comman_person_name">                                                                    
                 </div>
                 <div class="col-sm-3">
                    <input type="text" class="form-control" id="thermax_code_1"
                   placeholder="Thermax Code"
                  name="thermax_code_1"
                  ng-model="managementRelationshipsModel.row1.thermax_code">                                                                    
                 </div>
             </div>
<div class="form-group">
<div class="col-sm-3">
                    <input type="text" class="form-control" id="entity_name_2"
                   placeholder="Entity Name"
                  name="entity_name_2"
                  ng-model="managementRelationshipsModel.row2.entity_name">                                                                    
                 </div>
<div class="col-sm-3">
                    <select class="form-control m-b-sm" id="relationship_id_2" name="relationship_id_2" ng-model="managementRelationshipsModel.row2.relationship_id"
               ng-options="rs.id as rs.name for rs in model.relationships">
               <option value="">Select</option></select>                                                                     
                 </div>
<div class="col-sm-3">
                    <input type="text" class="form-control" id="comman_person_name_2"
                   placeholder="Comman Person"
                  name="comman_person_name_2"
                  ng-model="managementRelationshipsModel.row2.comman_person_name">                                                                      
                 </div>
                 <div class="col-sm-3">
                    <input type="text" class="form-control" id="thermax_code_2"
                   placeholder="Thermax Code"
                  name="thermax_code_2"
                  ng-model="managementRelationshipsModel.row2.thermax_code">                                                                    
                 </div>
             </div>
<div class="form-group">
<div class="col-sm-3">
                    <input type="text" class="form-control" id="entity_name_3"
                   placeholder="Entity Name"
                  name="entity_name_3"
                  ng-model="managementRelationshipsModel.row3.entity_name">                                                                    
                 </div>
<div class="col-sm-3">
                    <select class="form-control m-b-sm" id="relationship_id_3" name="relationship_id_3" ng-model="managementRelationshipsModel.row3.relationship_id"
               ng-options="rs.id as rs.name for rs in model.relationships">
               <option value="">Select</option></select>                                                                
                 </div>
<div class="col-sm-3">
                    <input type="text" class="form-control" id="comman_person_name_3"
                   placeholder="Comman Person"
                  name="comman_person_name_3"
                  ng-model="managementRelationshipsModel.row3.comman_person_name">                                                                      
                 </div>
                 <div class="col-sm-3">
                    <input type="text" class="form-control" id="thermax_code_3"
                   placeholder="Thermax Code"
                  name="thermax_code_3"
                  ng-model="managementRelationshipsModel.row3.thermax_code">                                                                    
                 </div>
             </div>																
<div class="form-group">
<div class="col-sm-3">
                    <input type="text" class="form-control" id="entity_name_4"
                   placeholder="Entity Name"
                  name="entity_name_4"
                  ng-model="managementRelationshipsModel.row4.entity_name">                                                                    
                 </div>
<div class="col-sm-3">
                    <select class="form-control m-b-sm" id="relationship_id_4" name="relationship_id_4" ng-model="managementRelationshipsModel.row4.relationship_id"
               ng-options="rs.id as rs.name for rs in model.relationships">
               <option value="">Select</option></select>                                                                
                 </div>
<div class="col-sm-3">
                    <input type="text" class="form-control" id="comman_person_name_4"
                   placeholder="Comman Person"
                  name="comman_person_name_4"
                  ng-model="managementRelationshipsModel.row4.comman_person_name">                                                                      
                 </div>
                 <div class="col-sm-3">
                    <input type="text" class="form-control" id="thermax_code_4"
                   placeholder="Thermax Code"
                  name="thermax_code_4"
                  ng-model="managementRelationshipsModel.row4.thermax_code">                                                                    
                 </div>
             </div>   
<div class="form-group">   
<div class="col-sm-9">
	<p class="help-block">Are any of your directors/ partners/ owners or relatives working/were working in THERMAX?</p>
                 </div>
<div class="col-sm-3">
  <select class="form-control m-b-sm" id="relation_with_thermax" name="relation_with_thermax" ng-model="managementVendorModel.relation_with_thermax">
        
         <option value="0">No</option>  <option value="1" selected>Yes</option>
     </select>
</div>
</div>
<div class="form-group" ng-show="managementVendorModel.relation_with_thermax==1">   
<div class="col-sm-5">
<label for="input-Default" class="col-sm-12 control-label">Name Of directors/ partners/ owners</label>
</div>
<div class="col-sm-7">
<input type="text" class="form-control" id="thermax_partner"  required ng-model="managementVendorModel.thermax_partner" name="thermax_partner">
</div>
</div>  
                 
               
                 <div class="modal-footer" style="margin-top:30px;">
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