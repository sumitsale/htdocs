<?php
$dataArr = array();
require_once 'router.php';
$projectObj = new Project();
$rData = array();
$rResponse = array();
$action = Util::getControllerAction();
$aData['action'] = $action;

switch($action){
	case 'login':
	
	$rData['username'] = isset($_POST['user_name']) ? $_POST['user_name'] : '';
	$rData['password'] = isset($_POST['password']) ? $_POST['password'] : '';
	$rData['confirm_password'] = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
	

	$response = $projectObj->authnticateuser($rData);
 
	echo json_encode($response);
	
 
	break;
}
