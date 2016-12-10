<div role="tabpanel" class="tab-pane fade" id="tab24">
<div class="container">
<div class="row">
<div class="col-md-8" ng-controller="bankDetailsController">
<div class="alert alert-success" id="bank-success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        You have successfully saved Bank Information. Please verify all tabs whether all infomation correctly filled.
                        </div>
		<div><strong>NOTE: </strong>
          All <span style="color: #d00;">*</span> marked fields are mandatory.
      </div>
	  <div class="help-block" style="font-weight: bold;font-size: 12px;color: #000000;">Please provide the bank account details in which you wish to receive the payments from
Thermax Limited.
					  </div>
	<form class="form-horizontal" style="margin-top:30px;"
   role="form"
   ng-submit="submit()"
   ng-fab-form-options="customFormOptions">
   <input type="hidden"  id="bank_details_id" ng-model="bankDetailsModel.bank_details_id" name="bank_details_id">
   <input type="hidden"  id="bank_vendor_id" ng-model="bankDetailsModel.vendor_id" name="bank_vendor_id">
    	<div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">IFSC Code (11 digits)</label>
            <div class="col-sm-9">
                <!-- <input type="text" class="form-control" id="ifsc_code" required ng-model="bankDetailsModel.ifsc_code" name="ifsc_code"> -->
				<div class="col-sm-9">
					<input type="text" style="height:34px;width:100%;margin-left:-15px;" id="ifsc_code" required ng-model="bankDetailsModel.ifsc_code" name="ifsc_code" class="form-control input-search" placeholder="Search...">
				</div>
				<div class="col-sm-3">
					<span class="input-group-btn">
						<button class="btn btn-danger" type="button" ng-click="getSearchBankResult()" >Get Details</button>
					</span>
				</div>
			</div>
        </div>
		<div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Bank Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="bank_name" required ng-model="bankDetailsModel.bank_name" name="bank_name" disabled>
			</div>
        </div>
		<div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Branch Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="branch_name" required ng-model="bankDetailsModel.branch_name" name="branch_name" disabled>
			</div>
        </div>
        <div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Bank's Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="bank_address" required ng-model="bankDetailsModel.bank_address" name="bank_address" disabled>
			</div>
        </div>
        <div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Bank Code</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="bank_code" required ng-model="bankDetailsModel.bank_code" name="bank_code" disabled>
			</div>
        </div>
        <div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Bank Account Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="bank_account_number" required ng-model="bankDetailsModel.bank_account_number" name="bank_account_number">
			</div>
        </div>


        <div class="form-group required">
            <label for="input-Default" class="col-sm-3 control-label">Bank account type</label>
            <div class="col-sm-9">
                <!-- <input type="text" class="form-control" id="bank_account_type" required ng-model="bankDetailsModel.bank_account_type" name="bank_account_type"> -->
				<select class="form-control" id="bank_account_type" required ng-model="bankDetailsModel.bank_account_type" name="bank_account_type">
					<option value="Saving">Saving</option>
					<option value="Current">Current</option>
				</select>
				
			</div>
        </div>

        <br><br>
        <div class="modal-footer">
<button type="submit" class="btn btn-primary btn-rounded cu-btn-rounded">Save </button>

</div>
    </form>
</div>
<div class="col-md-3" ng-controller="perviewDataController">
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
    <button type="button" class="btn btn-primary btn-rounded cu-btn-rounded" data-toggle="modal" ng-click="getPerviewData()" id="preview" data-target="#myModal">Preview </button>
    <?php include("preview.php") ?>
    <button type="button" class="btn btn-default btn-rounded cu-btn-rounded"data-toggle="modal" data-target="#submitModal" >Submit</button>
</div>
</div>

</div>
</div>

<div class="cd-overlay"></div>
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Confirmation Submition</h4>
</div>
<div class="modal-body">
Are you sure you want to submit vendor registration form. Once you  submit this form you wont be able to update any information.
</div>
<div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success btn-ok" id="formSubmit">Submit</button>
</div>
</div>
</div>
</div>

	<script>
		$(document).ready(
			function() {			
				$("#ifsc_code").autocomplete({
				source: "protected/controller.php?action=searchBankDetails",
				select: function(event,ui){
					console.log(ui);
					var vid=ui['item']['id'];					
					getBankDetails(vid);						
				}
			});
				
			function getBankDetails(vid){
				$.ajax({
					url:"protected/controller.php?action=getBankDetailsIFSC&vid="+vid,	
					dataType: "JSON",	
					success:function(data){
						console.log(data.result[0]);
						str="";
						/*$("#bank_name").val(data.result[0].bank_name);
						$("#branch_name").val(data.result[0].bank_branch);
						$("#bank_address").val(data.result[0].bank_address);*/
						jQuery.each(data.result, function(i, val) {
							//str=str+'<h3 class="no-m"><a href="" class="text-danger">'+val.vendor_name+'</a></h3><a href="" class="search-link">'+val.email+'</a><p><strong>PAN:</strong>'+val.name+'<br></p>';
						});
						if(str==""){
							str=str+'<strong>No result found.</strong>';
						}
					},
					error:function (request, status, error){
						$("#dsearchresult").html('No results found.');
					}
				});
			}
		});
	
		
		 $('#formSubmit').click(function(){
			 /* when the submit button in the modal is clicked, submit the form */
			/*alert('submitting');*/
			$('#submitModal').modal('toggle');
			$( ":input" ).attr("disabled", true);
			$( "span" ).attr("disabled", true);
			$( "#preview" ).attr("disabled", false);
			$( ".close" ).attr("disabled", false);
			
			$.ajax({
				url:"protected/controller.php?action=savesubmitform",	
				success:function(data){	
					window.location.href = 'registration.php';
				},
				error:function (request, status, error){
					console.log(error);
				}
			});	
			//console.log('submitting');
		  //  $('#formfield').submit();
		});
	</script>
