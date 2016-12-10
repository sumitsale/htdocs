<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 900px;margin-left: -130px;height: 600px;overflow-y:auto;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Vendor Registration Request (Know Your Vendor - KYV)</h4>
			</div>
			<div class="modal-body">
				<table class="table table-reflow">
			<thead>
			  <tr>
				<th colspan="2">General Information</th>
			   </tr>
			</thead>
			<tbody>
			  <tr>
				<th style="width: 250px" scope="row">Vendor Type</th>
				<td>{{generalInfoModel.vendor_type}}</td>
			   </tr>
			  <tr>
				<th scope="row">Vendor Sub Type</th>
				<td>{{generalInfoModel.vendor_subtype}}</td>
				<tr>
				<th scope="row">Name (full legal name)</th>
				<td>{{generalInfoModel.vendor_name}}</td>
				</tr>
				  <tr>
				<th scope="row">Nature of the entity</th>
				<td>{{generalInfoModel.entity_type}}</td>
				<tr>
				<th scope="row">List of products / services</th>
				<td>{{generalInfoModel.products_services}}</td>
				</tr>
				<tr>
				<th scope="row">Addresses(Correspondence address) </th>
				<td>
				Address Line1:{{generalInfoModel.co_address1}},</br>
				Address Line2:{{generalInfoModel.co_address2}},</br>
				Address Line3:{{generalInfoModel.co_address2}},</br>
				City:{{generalInfoModel.co_city}}</br>
				Pincode:{{generalInfoModel.co_pincode}}</br>
				State:{{generalInfoModel.co_state}}</br>
				Country:{{generalInfoModel.co_country}}</br>
				</td>
				<tr>
				<th scope="row">Addresses(Ship from address) </th>
				<td>
				Address Line1:{{generalInfoModel.ship_address1}},</br>
				Address Line2:{{generalInfoModel.ship_address2}},</br>
				Address Line3:{{generalInfoModel.co_address2}},</br>
				City:{{generalInfoModel.ship_city}}</br>
				Pincode:{{generalInfoModel.ship_pincode}}</br>
				State:{{generalInfoModel.ship_state}}</br>
				Country:{{generalInfoModel.ship_country}}</br>
				</td>
				</tr>
				<tr>
				<th scope="row">Addresses(Office address) </th>
				 <td>
				Address Line1:{{generalInfoModel.reg_address1}},</br>
				Address Line2:{{generalInfoModel.reg_address2}},</br>
				Address Line3:{{generalInfoModel.reg_address2}},</br>
				City:{{generalInfoModel.reg_city}}</br>
				Pincode:{{generalInfoModel.reg_pincode}}</br>
				State:{{generalInfoModel.reg_state}}</br>
				Country:{{generalInfoModel.reg_country}}</br>
				</td>
				</tr>
				<tr>
				<th colspan="2">Company Information</th>
			   </tr>
			   <tr ng-repeat="com in companyInfoModel">
				<td >{{com.certification_name}}</td>
				<td>{{com.document_status}}</td>
				</tr>
				<tr ng-show="!companyInfoModel.length">
				<td >data not available</td>
				</tr>
				<tr>
				<th colspan="2">Management Information</th>
			   </tr>
			   <tr>
				<th scope="row" colspan="2">Key Contacts</th>
				</tr>
				<tr>
				<td colspan="4"  style="padding: 0px ! important;
				border-top: none;">
				<table  class="table table-reflow">
				<tr>
				<th scope="row" >#</th>
				<th scope="row" >Key Contact</th>
				<th scope="row" >Name</th>
				<th scope="row">Designation/Title</th>
				<th scope="row" >Landline</th>
				<th scope="row" >Mobile no</th>
				<th scope="row" >E mail address</th>
				</tr>
				<tr ng-repeat="con in managementKeyContactsModel">
				<td>1</td>
				<td>{{con.key_contact}}</td>
				<td>{{con.name}}</td>
				<td>{{con.title}}</td>
				<td>{{con.landline}}</td>
				<td>{{con.mobile_number}}</td>
				<td>{{con.email}}</td>
				</tr>
				<tr ng-show="!managementKeyContactsModel.length">
				<td >data not available</td>
				</tr>
				</table>
				</td >
				</tr>
				<tr>
				<th scope="row" colspan="2">Relational Entities</th>
				</tr>
				<tr>
				<td colspan="4"  style="padding: 0px ! important;
				border-top: none;">
				<table  class="table table-reflow">
				<tr>
				<th scope="row" >#</th>
				<th scope="row" >Name of related entity</th>
				<th scope="row">Relationship</th>
				<th scope="row" >Names of common person</th>
				<th scope="row" >Thermax Code</th>
				</tr>
				<tr ng-repeat="rel in managementRelationshipsModel">
				<td>1</td>
				<td>{{rel.entity_name}}</td>
				<td>{{rel.relationship}}</td>
				<td>{{rel.comman_person_name}}</td>
				<td>{{rel.thermax_code}}</td>
				</tr>
                <tr ng-show="!managementRelationshipsModel.length">
				<td >data not available</td>
				</tr>
				
				</table>
				</td >
				</tr>
				<tr>
				<th colspan="2"> Statutory Data</th>
			   </tr>
			   <tr ng-repeat="st in statutoryDataModel">
				<th >{{st.statutory_data_name}}</th>
				<td>{{st.statutory_data_value}}</td>
				</tr>
				<tr ng-show="!statutoryDataModel.length">
				<td >data not available</td>
				</tr>
				
				<tr>
					<th colspan="2">Bank Details</th>
			    </tr>
			   <tr>
				<td scope="row">Bank Name</td>
				<td>{{bankDetailsModel.bank_name}}</td>
				</tr>
				<tr>
				<td scope="row">Bank Code</td>
				<td>{{bankDetailsModel.bank_code}}</td>
				</tr>
				<tr>
				<td scope="row">Bank Account Number</td>
				<td>{{bankDetailsModel.bank_account_number}}</td>
				</tr>
				<tr>
				<td scope="row">Branch Name</td>
				<td>{{bankDetailsModel.branch_name}}</td>
				</tr>
				<tr>
				<td>Bank's Address</td>
				<td>{{bankDetailsModel.bank_address}}</td>
				</tr>
				<tr>
				<td>Bank account type</td>
				<td>{{bankDetailsModel.bank_account_type}}</td>
				</tr>
				<tr>
				<td>IFSC Code (11 digits)</td>
				<td>{{bankDetailsModel.ifsc_code}}</td>
				</tr>

			 </tbody>
		  </table>
			 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--<button type="button" class="btn btn-success">Save changes</button>-->
			</div>
		</div>
	</div>
                                            </div>