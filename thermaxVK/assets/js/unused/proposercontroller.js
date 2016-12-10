var app = angular.module('proposerApp', ["ngTable"]);
app.controller('proposerController', function($scope, $http, $filter, ngTableParams) {


	//var newApplications=[];
	$http.get('protected/controller.php?action=newapplications').then(function(resp) {
        $scope.newApplications = resp.data.result;
		//this.newApplications=$scope.newApplications ;
        console.log($scope.newApplications);
		
		$scope.usersTable = new ngTableParams({
			page: 1,
			count: 10
		}, {
			total: $scope.newApplications.length, 
			getData: function ($defer, params) {
				$scope.data = params.sorting() ? $filter('orderBy')($scope.newApplications, params.orderBy()) : $scope.newApplications;
				$scope.data = params.filter() ? $filter('filter')($scope.data, params.filter()) : $scope.data;
				$scope.data = $scope.data.slice((params.page() - 1) * params.count(), params.page() * params.count());
				$defer.resolve($scope.data);
			}
		});
		
		
    }, function(err) {
        console.error('ERR', err);
        // err.status will contain the status code
    })

	
/*var newApplications=[
	 {
	   name:'Airi Satou new',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Brielle Williamson new',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	   name:'Cedric Kelly new',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Uthapizza new',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	}
	];

this.newApplications = newApplications;
*/

var approversResponseApplications=[
	 {
	   name:'Airi Satou app',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Brielle Williamson app',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	   name:'Cedric Kelly',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Uthapizza',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	}
	];

this.approversResponseApplications = approversResponseApplications;


var vendorsResponseApplications=[
	 {
	   name:'Airi Satou vend',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Brielle Williamson vend',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	   name:'Cedric Kelly',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	},
	{
	  name:'Uthapizza',
	   vendorType: 'mains',
	   email:'Hot',
	   panCode:'4.99',
	   product:'A unique combination of Indian Uthappam (pancake) and Italian pizza, topped with Cerignola olives, ripe vine cherry tomatoes, Vidalia onion, Guntur chillies and Buffalo Paneer.',
	   view: ''
	}
	];

this.vendorsResponseApplications = vendorsResponseApplications;



// create new product 
$scope.createVendorGeneralInformation = function(){
         
       /*  method: "post",
                url: "protected/controller.php?action=search",
                data: parameter
    // fields in key-value pairs*/
    $http.post('protected/controller.php?action=search', {
            data: parameter
        }
    ).success(function (data, status, headers, config) {
        console.log(data);
        // tell the user new product was created
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').closeModal();
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the list
        $scope.getAll();
    });
}
// clear variable / form values
$scope.clearForm = function(){
    $scope.id = "";
    $scope.name = "";
    $scope.description = "";
    $scope.price = "";
}});


