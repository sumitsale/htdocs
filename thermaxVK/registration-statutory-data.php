<div rol  e="tabpanel" class="tab-pane fade" id="tab23">
 <div class="container">
  	<div class="row">
      	<div class="col-md-8" ng-controller="statutoryDataController">
        <div class="alert alert-success" id="statutory-success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        You have successfully saved Statutory Data Information. Click Bank Details to complete Bank Data Information.
                        </div>
                         <div><strong>NOTE: </strong>
                                  All <span style="color: #d00;">*</span> marked fields are mandatory.
                              </div>
                              
              <form class="form-horizontal" style="margin-top:30px;"
               role="form" ng-submit="submit()" ng-fab-form-options="customFormOptions">
             <div class="form-group required" ng-repeat="stdata in statutoryDataModel">
                      <label for="input-Default" class="col-sm-3 control-label">{{stdata.statutory_data_name}}: </label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control"
                          ng-pattern="stdata.regular_expression"
                          validation-msg-pattern="Invalid {{stdata.statutory_data_name}}"
                          required 
                          ng-maxlength="{{stdata.max_length}}"
                          placeholder="{{stdata.statutory_data_name}}"
                          ng-model="stdata.statutory_data_value">
					</div>
					 
  					<div class="col-sm-3">
              <span class="btn btn-success fileinput-button" ng-click="stautoryFileUploader(stdata.statutory_data_id,stdata.statutory_data_name)" >
              <i class="glyphicon glyphicon-plus"></i><span>Add/View Documents</span></span></div>
              <div class="col-sm-3">  
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


<!-- modal start -->  
            <div class="modal fade" id="statutoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 750px;margin-left: -92px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Upload Documents for <span id="statutory_name"><span></h4>
                        </div>
                        <div class="modal-body">
                        <div class="container" style="width:945px">
                            <!-- The file upload form used as target for the file upload widget -->
                            <form id="statutoryFileupload" action="" method="POST" enctype="multipart/form-data" data-upload-template-id="template-upload-2"
    data-download-template-id="template-download-2">
                             
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple>
                                        </span>
                                        <button type="submit" class="btn btn-primary start">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                        <button type="button" class="btn btn-danger delete">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                        <input type="checkbox" class="toggle">
                                        <!-- The global file processing state -->
                                        <!-- progress progress-striped active -->
                                    </div>
                                    <!-- The global progress state -->
                                    <!-- <div class="col-lg-5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                      <!--   <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                        </div> -->
                                        <!-- The extended global progress state -->
                                        <!--<div class="progress-extended">&nbsp;</div>
                                    </div> -->
                                </div>


                                <!-- The table listing the files available for upload/download -->
                                <table  style="width: 75%;" role="presentation" class="table table-striped">
                                <thead>
                                <th>
                                 </th>
                                 <th>
                                 File Names
                                 </th>
                                 <th>
                                 Validate Till Date
                                 </th>
                                 <th>
                                 </th>
                          </thead>    
                                <tbody class="files"></tbody></table>
                            </form>
                            <br>
                        </div>
                        <!-- The blueimp Gallery widget -->
                        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                        <!-- The template to display files available for upload -->
                        <script id="template-upload-2" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                                <td>
                                    <span class="preview"></span>
                                </td>
                                <td>
                                    <p class="name">{%=file.name%}</p>
                                    <strong class="error text-danger"></strong>
                                </td>
                                <!-- ... -->
                                <td class="title" style="width: 200px">
                                <div class='input-group date' >
                                    <input type='hidden' class="form-control"  name="vendor_id[]" value="1" />
                                    <input type='hidden' class="form-control"  name="statutory_data_id[]" value="1"  />
                                    <input type='text' class="form-control"  name="valid_till_date[]" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div> 
                                </td>
                                <!-- ... -->
                                <!-- <td>
                                    <p class="size">Processing...</p>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                </td> -->
                                <td>
                                    {% if (!i && !o.options.autoUpload) { %}
                                        <button class="btn btn-primary start" disabled>
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start</span>
                                        </button>
                                    {% } %}
                                    {% if (!i) { %}
                                        <button class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel</span>
                                        </button>
                                    {% } %}
                                </td>
                            </tr>
                        {% } %}
                        </script>
                        <!-- The template to display files available for download -->
                        <script id="template-download-2" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade">
                                <td>
                                    <span class="preview">
                                        {% if (file.thumbnailUrl) { %}
                                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                                        {% } %}
                                    </span>
                                </td>
                                <td>
                                    <p class="name">
                                        {% if (file.url) { %}
                                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                        {% } else { %}
                                            <span>{%=file.name%}</span>
                                        {% } %}
                                    </p>
                                    {% if (file.error) { %}
                                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                    {% } %}
                                </td>
                                <td>
                                    <span class="size">{%=file.valid_till_date%}</span>
                                </td>
                                <td>
                                    {% if (file.deleteUrl) { %}
                                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                        <input type="checkbox" name="delete" value="1" class="toggle">
                                    {% } else { %}
                                        <button class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel</span>
                                        </button>
                                    {% } %}
                                </td>
                            </tr>
                        {% } %}
                        </script>



                        </div>

                        <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                        </div>
                    </div>
                </div>
            </div>

                                <!-- modal end -->


  <script type="text/javascript">
    function showStautoryFileUploader(statutory,statutory_data_id) {
        var scope=angular.element($("#generalInfoCtrl")).scope().generalInfoModel;
        var vendor_id=scope.vendor_id;
        $('#statutoryModal').modal('show');
        $("#statutory_name").html(statutory);
        loadStautoryJqueryFileUploader(vendor_id,statutory_data_id);
     }
     function loadStautoryJqueryFileUploader(vendor_id,statutory_data_id) {
      $("#statutoryFileupload").find(".files").empty();
        $("table tbody.files").empty();
         $('#statutoryFileupload').fileupload({
           url: 'server/php/StatutoryUploadHandler.php',
        }).bind('fileuploadsubmit', function (e, data) {
         $("input[name='vendor_id[]']").each(function() {
               $(this).val(vendor_id);
            });
           $("input[name='statutory_data_id[]']").each(function() {
                $(this).val(statutory_data_id);
            });
        var inputs = data.context.find(':input');
            data.formData = inputs.serializeArray();
             console.log("form-data");
              console.log(data.formData);
        });
                // Enable iframe cross-domain access via redirect option:
        $('#statutoryFileupload').fileupload(
            'option',
            'redirect',
            window.location.href.replace(
                /\/[^\/]*$/,
                '/cors/result.html?%s'
            )
        );
       // Load existing files:
       /*console.log("outside");*/
            $('#statutoryFileupload').addClass('fileupload-processing');
            $.ajax({
                url: $('#statutoryFileupload').fileupload('option', 'url'),
                dataType: 'json',
                data:{'vendor_id':vendor_id,'statutory_data_id':statutory_data_id},
                context: $('#statutoryFileupload')[0]
            }).always(function () {
                $(this).removeClass('fileupload-processing');
            }).done(function (result) {
                $(this).fileupload('option', 'done')
                    .call(this, $.Event('done'), {result: result});
            });
     }
    $(function () {
     $("body").delegate(".date", "focusin", function(){
        $(this).datepicker({
    format: 'dd-mm-yyyy',
    }).on('changeDate', function(e){
    $(this).datepicker('hide');
    });    
    });
    });


    </script>