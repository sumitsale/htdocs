 <?php
	error_reporting(0);
	require_once("model.php");
	$action = strtolower($_REQUEST['action']);
	$params = array_merge($_POST,$_GET,$_REQUEST,$_FILES);
	$data 	= array('msg'=>'' , 'error'=> 0, 'result'=>''); 
	//print_r($action);
  	switch($action){

  		/*case 'loginuser':
            $res = $model->loginuser($params);
         
			if($res){
	          
	            $data['error'] 	= 0;
			}else{				
				$data['msg'] 	= 'The email id or password is incorrect.';
				$data['error'] 	= 1;
			}
		break;*/
		case 'loginuser':
			$res = $model->loginuser($params,$action);
			//print_r($res[0]);
			session_start();
			if($res){	 
				if ($_SESSION['role']=="Vendor"){
					$data['msg'] 	= "registration.php";
				}
				elseif ($_SESSION['role']=="Initiator"){
					$data['msg'] 	= "edashboard.php";
				}
				elseif ($_SESSION['role']=="Approver"){
					$data['msg'] 	= "view-application.php";
				}
				elseif ($_SESSION['role']=="superadmin"){
					$data['msg'] 	= "edashboard.php";
				}
				else{
					$data['msg'] 	= "registration.php";
				}				
				$data['error'] 	= 0;
			}else{				
				$data['msg'] 	= 'The email id or password is incorrect.';
				$data['error'] 	= 1;
			}
		break;
		case 'vloginuser':
            $res = $model->vloginuser($params,$action);
			//print_r($res);
			if($res){	          
	            $data['error'] 	= 0;
				if($res[0]['is_password_changed']=='N'){
					$data['msg'] 	= "changepassword.php";
				}else{
					$data['msg'] 	= "registration.php";
				}
			}else{				
				$data['msg'] 	= 'The email id or password is incorrect.';
				$data['error'] 	= 1;
			}
		break;
		case 'signout' :
			session_start();
			$_SESSION = array();
			session_destroy();
		break;
		case 'sendinvitation':
			$res = $model->sendinvitation($params);
			//echo "====>".$res; exit;
			if($res){ 
				$data['msg'] 	= $res;
			    $data['error'] 	= 0;
			}
			else{
				$data['msg'] 	= $res;
				$data['error'] 	= 1;
			}		
		break;
		case 'insertdata' :
			$res = $model->insertdata($params);
			if($res){
				$data['msg'] 	= $res;
				$data['error'] 	= 0;
			}
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}			
		break;

		case 'updatedata' :
			$res = $model->updatedata($params);
			if($res){
				$data['msg'] 	= 'success update';
				$data['error'] 	= 0;
			}
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}			
		break;
		case 'addcategory':
			$res = $model->addcategory($params);
			if($res){
				$data['msg'] 	= 'success';
				$data['error'] 	= 0;
			}
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}		
		break;
		case 'addcountry':
			$res = $model->addcountry($params);
			if($res){
				$data['msg'] 	= 'success';
				$data['error'] 	= 0;
			}
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}		
		break;	
		case 'deletecategory' :
			$rs = $model->deletecategory($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}	
		break;
		case 'deletecountry' :
			$rs = $model->deletecountry($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}	
		break;
		
		//Nitin Codes
		case 'newapplications':
			$rs = $model->getNewApplications();
			//print_r($rs);
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}				
		break;
		
		case 'searchvendordetails':
			$phrase=$params['term'];
			$rs = $model->searchVendorDetails($phrase);
			//print_r($rs);
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}				
		break;
		
		case 'searchbankdetails':
			$phrase=$params['term'];
			$rs = $model->searchBankDetails($phrase);
			//print_r($rs);
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}				
		break;		
		
		case 'getvendordetails':
			//print_r($params);
			$rs = $model->getVendorDetails($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}				
		break;
		
		
		case 'getbankdetailsifsc':
			//print_r($params);
			$rs = $model->getBankDetailsIFSC($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}				
		break;

		case 'sendinvitationmail':
			//print_r($params);
			$rs = $model->sendInvitationMail($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;

		case 'checkpassword':
			//print_r($params);
			$rs = $model->checkPassword($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;

		case 'changepassword':
			//print_r($params);
			$rs = $model->changePassword($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		case 'saveapplicationcomment':
			//print_r($params);
			$rs = $model->saveApplicationComment($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		case 'saveapplicationpsection':
			//print_r($params);
			$rs = $model->saveApplicationPSection($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		case 'apprejapplication':
			//print_r($params);
			$rs = $model->apprejApplication($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		case 'initiateappproc':
			$rs = $model->initiateAppProc($params);			
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		case 'getapprover':
			//print_r($params);
			$rs = $model->getApprover($params);			
			if($rs){
				$strapp="<label  class='control-label col-sm-4' style='margin-bottom: 15px;'>Approvers</label><select class='form-control m-b-sm col-sm-8' id='cboapprover' name='cboapprover' style='width:200px' ><option value=''>Select</option>";
				foreach($rs as $approver){
				//$strapp=$strapp."<option value='".$approver['idmast_employee']."'>".$approver['empname']."</option>";
				$strapp=$strapp."<option value='".$approver['idmast_emp']."'>".$approver['empname']."</option>";					
				}
				$strapp=$strapp."</select>";
			
		      $data['msg']='success';
		      $data['error']=0;
			  $data['result']=$strapp;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
			}
		break;
		
		// Manohar cases
		case 'getvendortypes' :
		
			$rs = $model->getVendorTypes($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getvendorsubtypes' :
		
			$rs = $model->getVendorSubTypes($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getentitytypes' :
		
			$rs = $model->getEntityTypes($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getkeycontacts' :
		
			$rs = $model->getKeyContacts($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getrelationships' :
		
			$rs = $model->getRelationships($params);		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getcountries' :
		
			$rs = $model->getCountries();		
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getstates' :
		//echo json_encode("hi");return;
			$rs = $model->getStates();	
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'getpreviewdata' :
		//echo json_encode("hi");return;
			$rs = $model->getPreviewData();	
			   if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'savesubmitform' :
			$rs = $model->savesubmitform();	
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		case 'uploadcodeofconduct' :
			$rs = $model->uploadCodeOfConduct();	
			if($rs){
		      $data['msg']='success';
		      $data['error']=0;
		      $data['data']=$rs;
		     }
			else{
				$data['msg'] 	= "Invalid Details";
				$data['error'] 	= 1;
				 $data['data']=null;
			}	
		break;
		
	}

	if($action == 'insertdata' || $action == 'updatedata')
		echo $data['msg'];
	elseif($action=='searchvendordetails' || $action=='searchbankdetails'){
		echo json_encode($data['result']);
	}
	else
		echo json_encode($data);
?>
