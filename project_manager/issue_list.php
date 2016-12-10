<?php
$dataArr = array();
require_once 'router.php';
$projectObj = new Project();
// echo "<pre>";
// print_r($_GET);exit;

if(isset($_GET['projectname']) && $_GET['projectname']!='')
{
	$dataArr['issue_list'] = $projectObj->getIssuelist($_GET['projectname']);
	$dataArr['project_detail'] = $projectObj->getProjectdetail($_GET['projectname']);
}
	else
	{
		header("Location: ".WEB_URL);
	}
	

	// echo "<pre>";
	// print_r($dataArr);exit;
Util::tplTransform($dataArr, 'issue_list');
