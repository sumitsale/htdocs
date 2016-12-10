var app = angular.module('myApp', []);
app.controller('vendorGeneralInformationCtrl', function($scope, $http) {

$http.get('protected/controller.php?action=vGIList').then(function(resp) {
        $scope.options = resp.data;
        console.log(resp.data);
    }, function(err) {
        console.error('ERR', err);
        // err.status will contain the status code
    })

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


