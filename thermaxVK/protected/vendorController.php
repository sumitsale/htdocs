 <?php
	error_reporting(0);
	require_once("vendorModel.php");
	$action = strtolower($_REQUEST['action']);
	$params = array_merge($_POST,$_GET,$_REQUEST,$_FILES);
	$data 	= array('msg'=>'' , 'error'=> 0); 
	switch($action){

		case 'getgeneralinfo' :
			$rs = $model->getGeneralInfo();		
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
		case 'savegeneralinfo' :
			$attributes = json_decode(file_get_contents("php://input"));
			$rs = $model->persistGeneralInfo($attributes);		
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
		case 'getmanagementinfo' :
			$rs = $model->getManagementInfo();		
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
		case 'savemanagementinfo' :
			$attributes = json_decode(file_get_contents("php://input"));
			$rs = $model->persistManagementInfo($attributes);		
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
		case 'getstatutorydata' :
			$rs = $model->getStatutoryData();		
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
		case 'savestatutorydata' :
			$attributes = json_decode(file_get_contents("php://input"));
			$rs = $model->persistStatutoryData($attributes);		
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
		case 'getbankdetails' :
			$rs = $model->getBankDetails();		
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
		case 'savebankdetails' :
			$attributes = json_decode(file_get_contents("php://input"));
			$rs = $model->persistBankDetails($attributes);		
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
		case 'getcompanyinfo' :
			$rs = $model->getCompanyInfo();		
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
		case 'savecompanyinfo' :
			$attributes = json_decode(file_get_contents("php://input"));
			$rs = $model->persistCompanyInfo($attributes);		
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
		
    }
	// echo json_encode($data);
	if($action == 'insertdata' || $action == 'updatedata')
		echo $data['msg'];
	else
		echo json_encode($data);
?>
