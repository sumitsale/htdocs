// app.js
// create angular app
var thermaxvendorApp = angular.module('thermaxvendorApp', [ 'ngFabForm',
    'ngMessages',
    'ngAnimate']);
		
// create angular controller
thermaxvendorApp.controller('mainVendorController', ['$scope', '$http',  function($scope,$http) {
	//$scope.formData = {vendor_name: "nitin6", vendor_email: "nitin@email.com", vendor_subject: "nitin", vendor_body: "nitin"};
	$scope.formData = "";
	$("#dmsg").html("");
	$scope.formsubmit  = function(isValid) {
		$("#dmsg").html("");
		// check to make sure the form is completely valid
		if (isValid) {
			if($scope.formData.newpassword!=$scope.formData.repassword){
				$("#dmsg").html("New Password and Re-entered Password does not match.").fadeIn(3000).fadeOut(3000);
				return;
			}else{		
				$.ajax({
					url:"protected/controller.php?action=checkpassword",	
					dataType: "JSON",
					data: $scope.formData,
					success:function(data){	
						if(data.error==0){						
							$.ajax({
								url:"protected/controller.php?action=changepassword",	
								dataType: "JSON",
								data: $scope.formData,
								success:function(data){	
									$("#dmsg").html("Password Changed Successfully!").fadeIn(3000).fadeOut(3000);
									window.location.href = 'myapplications.php';
								},
								error:function (request, status, error){
									console.log("error is status " + data.error);
								}
							});					
						}
						else{
							$("#dmsg").html("Old Password does not match.").fadeIn(3000).fadeOut(3000);
						}
					},
					error:function (request, status, error){
						console.log(request);
							console.log(status);
							console.log(error);
					}
				});
			}
		}
		else{
			$("#dmsg").html("Please provide the values.").fadeOut(3000);
			isValid=false;
			//alert('our form is not amazing');
		}
	  };
	 
	 
  // function to submit the form after all validation has occurred            
	  $scope.submitForm = function(isValid) {
		// check to make sure the form is completely valid
		if (isValid) {
		  alert('our form is 2 amazing');
		}
	  };

}]);