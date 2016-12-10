<?php
$companycertificates="";
$certificates="";
include_once("protected/modelDirect.php");
$companycertificates=$model->getCertificates(); //
$i=1;
foreach($companycertificates as $companycertificate){
	$certificates=$certificates.'<div class="col-md-5"><label>'.$companycertificate["certification_name"].'</label></div><div class="col-md-2"><select class="form-control m-b-sm" id="document_status_'.$i.'" name="document_status_'.$i.'" ng-model="companyInfoModel.row'.$i.'.document_status"><option value="1">Yes</option><option value="0">No</option></select></div><div class="col-sm-3" ng-show="companyInfoModel.row'.$i.'.document_status==1"><span class="btn btn-success fileinput-button" onclick="showCompanyFileUploader(\''.$companycertificate["certification_name"].'\','.$i.')" ><i class="glyphicon glyphicon-plus"></i><span>Add/View Documents</span></span></div><br><br><br>';
	$i++;
}
//print_r($certificates);
?>
			
			<div role="tabpanel" class="tab-pane fade" id="tab25">
                <div class="container">
                	<div class="row">
                    	<div class="col-md-8" ng-controller="companyInfoController">
							<div class="alert alert-success" id="company-success-alert">
								<button type="button" class="close" data-dismiss="alert">x</button>
								<strong>Success! </strong>
								You have successfully saved Company Information. Click Management tab to complete Management Information.
							</div>
							<div><strong>NOTE: </strong>
          All <span style="color: #d00;">*</span> marked fields are mandatory.
      </div>
	  <div class="help-block" style="font-weight: bold;font-size: 12px;color: #000000;">Please provide the following information documents related to
your organisation, as applicable.
					  </div>
					  
							
							<form class="form-horizontal" style="margin-top:30px;" enctype="multipart/form-data" role="form" ng-submit="submit()" ng-fab-form-options="customFormOptions">
                            	<?php  echo $certificates; ?>								
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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 750px;margin-left: -92px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Upload Documents for <span id="certification_name"><span></h4>
                        </div>
                        <div class="modal-body">
                        <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
                        <!-- Generic page styles -->
                       <!--  <link rel="stylesheet" href="assets/jQueryFileUpload/css/style.css"> -->
                        <!-- blueimp Gallery styles -->
                        <link rel="stylesheet" href="assets/jQueryFileUpload/css/blueimp-gallery.min.css">
                        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
                        <link rel="stylesheet" href="assets/jQueryFileUpload/css/jquery.fileupload.css">
                        <link rel="stylesheet" href="assets/jQueryFileUpload/css/jquery.fileupload-ui.css">
                        <!-- CSS adjustments for browsers with JavaScript disabled -->
                        <noscript><link rel="stylesheet" href="assets/jQueryFileUpload/css/jquery.fileupload-noscript.css"></noscript>
                        <noscript><link rel="stylesheet" href="assets/jQueryFileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>

                        <div class="container" style="width:945px">
                            <!-- The file upload form used as target for the file upload widget -->
                            <form id="fileupload" action="//jquery-file-upload.appspot.com" method="POST" enctype="multipart/form-data"  data-upload-template-id="template-upload-1"
    data-download-template-id="template-download-1">
                             
                                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
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
                        <script id="template-upload-1" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                                <td >
                                    <span class="preview"></span>
                                </td>
                                <td >
                                    <p class="name">{%=file.name%}</p>
                                    <strong class="error text-danger"></strong>
                                </td>
                                <!-- ... -->
                                <td class="title" style="width: 200px">
                                <div class='input-group date' >
                                    <input type='hidden' class="form-control"  name="vendor_id[]" value="1" />
                                    <input type='hidden' class="form-control"  name="company_certification_id[]" value="1"  />
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
                        <script id="template-download-1" type="text/x-tmpl">
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



                       <!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
                        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                        <script src="assets/jQueryFileUpload/js/vendor/jquery.ui.widget.js"></script>
                        <!-- The Templates plugin is included to render the upload/download listings -->
                        <script src="assets/jQueryFileUpload/js/tmpl.min.js"></script>
                        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                        <script src="assets/jQueryFileUpload/js/load-image.all.min.js"></script>
                        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                        <script src="assets/jQueryFileUpload/js/canvas-to-blob.min.js"></script>
                        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
                        <!-- blueimp Gallery script -->
                        <script src="assets/jQueryFileUpload/js/jquery.blueimp-gallery.min.js"></script>
                        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                        <script src="assets/jQueryFileUpload/js/jquery.iframe-transport.js"></script>
                        <!-- The basic File Upload plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload.js"></script>
                        <!-- The File Upload processing plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-process.js"></script>
                        <!-- The File Upload image preview & resize plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-image.js"></script>
                        <!-- The File Upload audio preview plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-audio.js"></script>
                        <!-- The File Upload video preview plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-video.js"></script>
                        <!-- The File Upload validation plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-validate.js"></script>
                        <!-- The File Upload user interface plugin -->
                        <script src="assets/jQueryFileUpload/js/jquery.fileupload-ui.js"></script>
                        <!-- The main application script -->
                      <!--   <script src="assets/jQueryFileUpload/js/main.js"></script> -->

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
    function showCompanyFileUploader(certification,company_certification_id) {
        var scope=angular.element($("#generalInfoCtrl")).scope().generalInfoModel;
        var vendor_id=scope.vendor_id;
        $('#exampleModal').modal('show');
        $("#certification_name").html(certification);
        loadCompanyJqueryFileUploader(vendor_id,company_certification_id);
     }
     function loadCompanyJqueryFileUploader(vendor_id,company_certification_id) {
        $("table tbody.files").empty();
         $('#fileupload').fileupload({
           url: 'server/php/CompanyUploadHandler.php',
        }).bind('fileuploadsubmit', function (e, data) {
         $("input[name='vendor_id[]']").each(function() {
                $(this).val(vendor_id);
            });
           $("input[name='company_certification_id[]']").each(function() {
                $(this).val(company_certification_id);
            });
        var inputs = data.context.find(':input');
            console.log("data.formData");
             console.log(data.formData);
          
            data.formData = inputs.serializeArray();
        });
                // Enable iframe cross-domain access via redirect option:
        $('#fileupload').fileupload(
            'option',
            'redirect',
            window.location.href.replace(
                /\/[^\/]*$/,
                '/cors/result.html?%s'
            )
        );
       // Load existing files:
            $('#fileupload').addClass('fileupload-processing');
            $.ajax({
                url: $('#fileupload').fileupload('option', 'url'),
                dataType: 'json',
                data:{'vendor_id':vendor_id,'company_certification_id':company_certification_id},
                context: $('#fileupload')[0]
            }).always(function () {
                $(this).removeClass('fileupload-processing');
            }).done(function (result) {
                console.log(result);
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