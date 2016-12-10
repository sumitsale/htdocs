// app.js
// create angular app
var thermaxApp = angular.module('thermaxApp', [ 'ngFabForm',
    'ngMessages',
    'ngAnimate']);



thermaxApp.controller('generalInfoController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.generalInfoModel={};
    $("#general-success-alert").hide();
    $scope.model = {
        vendorTypes: [],
        vendorSubTypes: [],
        entityTypes: [],
        keyContacts: [],
        countries: [], 
        selectedvendorSubTypes: {}
    };
   /* getGeneralInfo = function ()
    {
        $http.get("protected/vendorController.php?action=getgeneralinfo")
        .then(function(response) {
            if(response.data.error!=1)
             $scope.generalInfoModel = response.data.data;
        });
    }
    getGeneralInfo();
*/    $scope.submit = function ()
        {
            $vendor_status=0;
            if(typeof $scope.generalInfoModel.vendor_id === "undefined")
            $vendor_status=0;
             data =$scope.generalInfoModel;
             $http.post('protected/vendorController.php?action=savegeneralinfo', data)
	        .success(function(data, status, headers, config)
	        {
               generalInfoService.successAlert("general-success-alert");
               generalInfoService.getGeneralInfo().then(function(data){
                    $scope.generalInfoModel = data;
                });
               if($vendor_status==0)
               {
                    generalInfoService.getManagementInfo().then(function(data){
                        $scope.managementKeyContactsModel = data.managementKeyContactsModel;
                         $scope.managementRelationshipsModel = data.managementRelationshipsModel;
                         $scope.managementVendorModel = data.managementVendorModel;   
                         console.log($scope.managementKeyContactsModel);
                         
             
                    });

               }
	        })
	        .error(function(data, status, headers, config)
	        {
	            console.log('error');
	        });
        	
		};
    
    generalInfoService.getGeneralInfo().then(function(data){
        $scope.generalInfoModel = data;
    });
    
    generalInfoService.getVendorTypes().then(function(data){
        $scope.model.vendorTypes = data;
       
    });

    generalInfoService.getVendorSubTypes().then(function(data){
        $scope.model.vendorSubTypes = data;
    });

    generalInfoService.getEntityTypes().then(function(data){
        $scope.model.entityTypes = data;
    });



}]);
thermaxApp.factory('generalInfoService', ['$http', '$q', function($http, $q){
    return {
        getVendorTypes: function(){
            return $http.get('protected/controller.php?action=getvendortypes').then(function(result) {
               return result.data.data;
            });
        },
        successAlert: function(success){
           // alert(success);
             $("#"+success).show();
                $("#"+success).fadeTo(4000, 500).slideUp(500, function(){
                $("#"+success).hide();
                    });
                $('html, body').animate({
                    scrollTop: $("#"+success).position().top
                }, 1000);
            
        },
        getVendorSubTypes: function(){
            return $http.get('protected/controller.php?action=getvendorsubtypes').then(function(result){
                return result.data.data;
            });
		},
		getEntityTypes: function(){
        return $http.get('protected/controller.php?action=getentitytypes').then(function(result){
            return result.data.data;
        });
        },
        getKeyContacts: function(){
        return $http.get('protected/controller.php?action=getkeycontacts').then(function(result){
            return result.data.data;
        });
       },
       getRelationships: function(){
        return $http.get('protected/controller.php?action=getrelationships').then(function(result){
            return result.data.data;
        });
       },
       getGeneralInfo: function(){
        return $http.get('protected/vendorController.php?action=getgeneralinfo').then(function(result){
            return result.data.data;
        });
       },
       getManagementInfo: function(){
        return $http.get('protected/vendorController.php?action=getmanagementinfo').then(function(result){
            return result.data.data;
        });
       },
}

    
}]);

thermaxApp.controller('managementInfoController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.managementKeyContactsModel={};
    $scope.managementRelationshipsModel={};
    $scope.managementVendorModel={};
    $("#management-success-alert").hide();
    $scope.model = {
        keyContacts: [],
        relationships: [],
    };
    /*getManagementInfo = function ()
    {
        $http.get("protected/vendorController.php?action=getmanagementinfo")
        .then(function(response) {
            if(response.data.error!=1)
            {
                 $scope.managementKeyContactsModel = response.data.data.managementKeyContactsModel;
                 $scope.managementRelationshipsModel = response.data.data.managementRelationshipsModel;
                 $scope.managementVendorModel = response.data.data.managementVendorModel;   
             
            }
        });
    }
    getManagementInfo();*/
    $scope.submit = function ()
        {
             data ={
                'managementKeyContactsModel':$scope.managementKeyContactsModel,
                'managementRelationshipsModel':$scope.managementRelationshipsModel,
                'managementVendorModel':$scope.managementVendorModel,
             }
            $http.post('protected/vendorController.php?action=savemanagementinfo', data)
            .success(function(data, status, headers, config)
            {
               generalInfoService.successAlert("management-success-alert");
               getManagementInfo();
            })
            .error(function(data, status, headers, config)
            {
                console.log('error');
            });
            
        };
    generalInfoService.getKeyContacts().then(function(data){
        $scope.model.keyContacts = data;
    });
    generalInfoService.getRelationships().then(function(data){
        $scope.model.relationships = data;
    }); 
 
}]);

thermaxApp.controller('statutoryDataController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.statutoryDataModel={};
    $("#statutory-success-alert").hide();
    getstatutoryData = function ()
    {
        $http.get("protected/vendorController.php?action=getstatutorydata")
        .then(function(response) {
           console.log("statutoryDataModel");
           console.log(response.data.data.statutoryDataModel);
            if(response.data.error!=1)
            {
                 $scope.statutoryDataModel = response.data.data.statutoryDataModel;
            }
        });
    }
    getstatutoryData();
    $scope.submit = function ()
        {
             data ={
                'statutoryDataModel':$scope.statutoryDataModel,
             }
            $http.post('protected/vendorController.php?action=savestatutorydata', data)
            .success(function(data, status, headers, config)
            {
                generalInfoService.successAlert("statutory-success-alert");
                  getstatutoryData();
            })
            .error(function(data, status, headers, config)
            {
                console.log('error');
            });
            
        };
       
 
}]);

thermaxApp.controller('bankDetailsController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.bankDetailsModel={};
    $("#bank-success-alert").hide();
      getBankDetails = function ()
    {
        $http.get("protected/vendorController.php?action=getbankdetails")
        .then(function(response) {
           // console.log(response.data.data);
            if(response.data.error!=1)
             $scope.bankDetailsModel = response.data.data;
        });
    }
    getBankDetails();
    $scope.submit = function ()
        {
            //console.log($scope.bankDetailsModel);
             data =$scope.bankDetailsModel;

            $http.post('protected/vendorController.php?action=savebankdetails', data)
            .success(function(data, status, headers, config)
            {

                generalInfoService.successAlert("bank-success-alert");
                getBankDetails();
              //  console.log(data);
            })
            .error(function(data, status, headers, config)
            {
                console.log('error');
            });
            
        };
 
}]);

thermaxApp.controller('companyInfoController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.companyInfoModel={};
    $("#company-success-alert").hide();
    getCompanyInfo = function ()
    {
        $http.get("protected/vendorController.php?action=getcompanyinfo")
        .then(function(response) {
            if(response.data.error!=1 && response.data.data)
            $scope.companyInfoModel = response.data.data.companyInfoModel;
        });
    }
    getCompanyInfo();
    $scope.submit = function ()
        {
            data ={
                'companyInfoModel':$scope.companyInfoModel,
             }
             $http.post('protected/vendorController.php?action=savecompanyinfo', data)
            .success(function(data, status, headers, config)
            {
                generalInfoService.successAlert("company-success-alert");
                getCompanyInfo();
            })
            .error(function(data, status, headers, config)
            {
                console.log('error');
            });
            
        };
 
}]);
