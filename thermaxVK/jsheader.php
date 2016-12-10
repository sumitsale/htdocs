    <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>        
   <!-- Javascripts -->
<!--	<script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script> -->
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/pace-master/pace.min.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/switchery/switchery.min.js"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
	<script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
	<script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
	<script src="assets/plugins/waves/waves.min.js"></script>
	<script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
<!--	<script src="assets/js/modern.min.js"></script>	-->
	<!-- Javascripts -->
	<script src="assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
	<script src="assets/plugins/moment/moment.js"></script>
	<script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
	<script src="assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/pages/table-data.js"></script>
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	
	<!-- <script src="assets/js/jquery.easy-autocomplete.js"></script> -->
	
	<!--<script src="assets/js/modern.min.js"></script>	
	<script src="assets/js/pages/form-elements.js"></script> -->
	
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-messages.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-animate.min.js"></script>
    <script src="//johannesjo.github.io/ng-fab-form/ng-fab-form.min.js"></script>
    <script src="assets/js/app.js"></script> -->

	<script type="text/javascript">
        function logout(){
			localStorage.setItem("contentPanel3","");
            var action="signout";
            $.ajax({
                    type:'POST',
                    url:'protected/controller.php',
                    data: { action:action},
                    success:function(data){ 
                        location.reload();
                    },
                    error:function (request, status, error){
                        console.log(request.responseText);
                    }
            }); 
        }
		


 </script>