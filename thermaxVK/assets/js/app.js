// app.js
// create angular app
var thermaxApp = angular.module('thermaxApp', [ 'ngFabForm',
    'ngMessages',
    'ngAnimate']);

/*thermaxApp.controller('welcomeController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.agree=false;
    
    getAgree = function ()
    {
      $http.get("protected/vendorController.php?action=getgeneralinfo")
        .then(function(response) {
            
            $scope.agree=response.data.data;
             console.log("response========");
            console.log($scope.agree);
        });
    }
   getAgree();
       
}]);*/
thermaxApp.controller('generalInfoController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.generalInfoModel={};
    $("#general-success-alert").hide();
    $scope.model = {
        vendorTypes: [],
        vendorSubTypes: [],
        entityTypes: [],
        keyContacts: [],
        countries: [], 
        states: [], 
        selectedvendorSubTypes: {}
    };
    getGeneralInfo = function ()
    {
        $http.get("protected/vendorController.php?action=getgeneralinfo")
        .then(function(response) {
            if(response.data.error!=1)
             $scope.generalInfoModel = response.data.data;
			if($scope.generalInfoModel.app_status=="Submitted" || $scope.generalInfoModel.app_status=="ApproverPending" || $scope.generalInfoModel.app_status=="Accepted" || $scope.generalInfoModel.app_status=="Rejected"){
				setTimeout(function(){ 
					$( ":input" ).attr("disabled", true);
					$( "span" ).attr("disabled", true);
					$( "#preview" ).attr("disabled", false);
					$( ".close" ).attr("disabled", false);
					console.log("disabled");
                }, 500);
			}
        });
    }
    getGeneralInfo();
	$scope.updatestatus = function() {
		if ($('#agree').is(":checked")){
			$scope.generalInfoModel.code_of_conduct_agree=true;
		}else{
			$scope.generalInfoModel.code_of_conduct_agree=false;
		}		
		console.log("updae" + $scope.generalInfoModel.code_of_conduct_agree);
    }
    $scope.submit = function ()
        {
			if ($('#agree').is(":checked")){
				$scope.generalInfoModel.code_of_conduct_agree=true;
			}else{
				$scope.generalInfoModel.code_of_conduct_agree=false;
			}	
			console.log("submit" +$scope.generalInfoModel.code_of_conduct_agree);
            data =$scope.generalInfoModel;
            $vendor_status=1;
            if(typeof $scope.generalInfoModel.vendor_id === "undefined")
            $vendor_status=0;
            $http.post('protected/vendorController.php?action=savegeneralinfo', data)
	        .success(function(data, status, headers, config)
	        {
                generalInfoService.successAlert("general-success-alert");
                getGeneralInfo();
                generalInfoService.isVendorExist();
               
	        })
	        .error(function(data, status, headers, config)
	        {
	            console.log('error');
	        });
        	
		};
    generalInfoService.getVendorTypes().then(function(data){
        $scope.model.vendorTypes = data;
       
    });

    generalInfoService.getVendorSubTypes().then(function(data){
        $scope.model.vendorSubTypes = data;
    });

    generalInfoService.getEntityTypes().then(function(data){
        $scope.model.entityTypes = data;
    });
    generalInfoService.getCountries().then(function(data){
        $scope.model.countries = data;
    });
    generalInfoService.getStates().then(function(data){
        $scope.model.states = data;
    });
   


}]);
thermaxApp.factory('generalInfoService', ['$rootScope','$http', '$q', function($rootScope,$http, $q){
    return {
        getVendorTypes: function(){
            return $http.get('protected/controller.php?action=getvendortypes').then(function(result) {
               return result.data.data;
            });
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
       getCountries: function(){
        return $http.get('protected/controller.php?action=getcountries').then(function(result){
            //console.log('SDSDF');
           // console.log(result);
            return result.data.data;
        });
       },
       getStates: function(){
        return $http.get('protected/controller.php?action=getstates').then(function(result){
			//console.log("result");
            //console.log(result);
            return result.data.data;
        });
       },
       isVendorExist: function(){
        $rootScope.$broadcast('handleIsVendorExist');
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
    $scope.$on('handleIsVendorExist', function() {
       getManagementInfo();
    });
    getManagementInfo = function ()
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
    getManagementInfo();
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
    //$scope.pattern = new RegExp('([A-Z]){5}([0-9]){4}([A-Z]){1}');
    $("#statutory-success-alert").hide();
    $scope.stautoryFileUploader= function(statutory_data_id,statutory_data_name)
    {
        showStautoryFileUploader(statutory_data_name,statutory_data_id);
    }
    /*$scope.getPattern= function(d)
    {
        return '/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/';
 
    }*/
       getstatutoryData = function ()
    {
        $http.get("protected/vendorController.php?action=getstatutorydata")
        .then(function(response) {
           //console.log("statutoryDataModel");
           //console.log(response);
            if(response.data.error!=1)
            {
                 $scope.statutoryDataModel = response.data.data.statutoryDataModel;
            }
        });
    }
    $scope.$on('handleIsVendorExist', function() {
       //console.log("data before");
       //console.log( $scope.statutoryDataModel);
       getstatutoryData();
        //console.log("data after");
       //console.log( $scope.statutoryDataModel);
    });
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
            console.log(response.data.data);
            if(response.data.error!=1)
             $scope.bankDetailsModel = response.data.data;
        });
    }
    $scope.$on('handleIsVendorExist', function() {
       getBankDetails();
    });
    getBankDetails();
	$scope.getSearchBankResult = function() {
		var vl=$("#ifsc_code").val();
		console.log("KKKK" + vl);
		$.ajax({
			url:"protected/controller.php?action=getBankDetailsIFSC&vid="+vl,	
			dataType: "JSON",	
			success:function(data){	
				console.log("LLLLLLLL" + vl);
				str="";
				$scope.bankDetailsModel.bank_name=data.result[0].bank_name;
				$scope.bankDetailsModel.branch_name=data.result[0].bank_branch;
				$scope.bankDetailsModel.bank_address=data.result[0].bank_address;
				$scope.bankDetailsModel.bank_code=data.result[0].bank_code;
				$scope.bankDetailsModel.ifsc_code=vl;
				console.log("LLLLLLLL22222" + vl);
				//$("#dsearchresult").html(str);
			},
			error:function (request, status, error){
				$("#dsearchresult").html('No results found.');
				console.log(request.responseText);
			}
		});
    }
    $scope.submit = function ()
        {
            console.log($scope.bankDetailsModel);
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
    $scope.$on('handleIsVendorExist', function() {
       getCompanyInfo();
    });
    getCompanyInfo();
    $scope.submit = function ()
        {
            /*data ={
                'companyInfoModel':$scope.companyInfoModel,
             }
             $http.post('protected/vendorController.php?action=savecompanyinfo', data)
            .success(function(data, status, headers, config)
            {*/
                generalInfoService.successAlert("company-success-alert"); 
                getCompanyInfo();
           /* })
            .error(function(data, status, headers, config)
            {
                console.log('error');
            });*/
            
        };
 
}]);


thermaxApp.controller('perviewDataController', ['$scope','$http', 'generalInfoService', function($scope,$http,generalInfoService) {
    $scope.generalInfoModel={};
    $scope.companyInfoModel={};
    $scope.companyInfoModel={};
    $scope.companyInfoModel={};
    $scope.companyInfoModel={};
    $scope.getPerviewData = function ()
    {
        //console.log("coming");
        $http.get("protected/vendorController.php?action=getpreviewdata")
        .then(function(response) {
            if(response.data.error!=1 && response.data.data)
            {
               // console.log("Preview")
               // console.log(response.data.data.generalInfoModel)
                $scope.generalInfoModel = response.data.data.generalInfoModel;    
            }
            
        });
    }
   // getPerviewData();
    
}]);


/*thermaxApp.directive('validateEmail', function() {
  var EMAIL_REGEXP = /^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
  return {
    require: 'ngModel',
    restrict: '',
    link: function(scope, elm, attrs, ctrl) {
      // only apply the validator if ngModel is present and Angular has added the email validator
      if (ctrl && ctrl.$validators.email) {

        // this will overwrite the default Angular email validator
        ctrl.$validators.email = function(modelValue) {
          return ctrl.$isEmpty(modelValue) || EMAIL_REGEXP.test(modelValue);
        };
      }
    }
  };
});
thermaxApp.directive('pancard', function() {
  var PANCARD_REGEXP = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
  return {
    require: 'ngModel',
    restrict: '',
    link: function(scope, elm, attrs, ctrl) {
      if (ctrl) {

        // this will overwrite the default Angular email validator
        ctrl.$validators.pancard = function(modelValue) {
          return ctrl.$isEmpty(modelValue) || PANCARD_REGEXP.test(modelValue);
        };
      }
    }
  };
});*/


