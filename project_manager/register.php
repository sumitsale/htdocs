<?php
$dataArr = array();
require_once 'router.php';
$projectObj = new Project();
$rData = array();
$rResponse = array();
$dataArr['project_list'] = $projectObj->getProjectList();
$action = Util::getControllerAction();
$aData['action'] = $action;

// print_r($_POST);exit;
switch($action){
	case 'insert':
	$rData['username'] = isset($_POST['username']) ? $_POST['username'] : '';
	$rData['email'] = isset($_POST['email_id']) ? $_POST['email_id'] : '';
	$rData['password'] = isset($_POST['password']) ? $_POST['password'] : '';
	$rData['projectname'] = isset($_POST['project_name']) ? $_POST['project_name'] : '';
	$rData['firstname'] = isset($_POST['firstname']) ? $_POST['firstname'] : '';
	$rData['lastname'] = isset($_POST['lastname']) ? $_POST['lastname'] : '';
	
	// echo "<pre>";
	// print_r($rData);exit;
	$rResponse = $projectObj->insertRegistrationData($rData);
	
	if(isset($rResponse['id']))
	{
		$response['flag'] 		 = 'success'; 
		$response['refresh_url'] = WEB_URL;


		echo json_encode($response);	
	return;
	}
	
	// header("Location : ".WEB_URL);
	break;	
}
Util::tplTransform($dataArr, 'register');
