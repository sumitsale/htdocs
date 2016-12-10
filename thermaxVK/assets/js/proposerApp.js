// app.js
// create angular app
var thermaxproposerApp = angular.module('thermaxproposerApp', [ 'ngFabForm',
    'ngMessages',
    'ngAnimate']);

// create angular controller and pass in $scope and $http
//   function formController($scope, $http) {
//    }
		
// create angular controller
thermaxproposerApp.controller('mainProposerController', ['$scope', '$http',  function($scope,$http) {
	//$scope.formData = {vendor_name: "nitin6", vendor_email: "nitin@email.com", vendor_subject: "nitin", vendor_body: "nitin"};
	$scope.formData = "";
	$("#dmsg").html("");
	$scope.formsubmit  = function(isValid) {
		$("#dmsg").html("");
		// check to make sure the form is completely valid
		if (isValid) {
			$.ajax({
				url:"protected/controller.php?action=sendinvitationmail",	
				dataType: "JSON",
				data: $scope.formData,
				success:function(data){	
					console.log(data);
					$("#dmsg").html("Invitation has been sent successfully!").fadeOut(3000);
					window.location.href = 'edashboard.php';
				},
				error:function (request, status, error){
					console.log(request);
						console.log(status);
						console.log(error);
				}
			});
		}
		else{
			 //alert('our form is not amazing');
		}
	  };
	 
	 
  // function to submit the form after all validation has occurred            
	  $scope.submitForm = function(isValid) {
		// check to make sure the form is completely valid
		if (isValid) {
		  //alert('our form is 2 amazing');
		}
	  };

}]);