<?php
$dataArr = array();
require_once 'router.php';
$projectObj = new Project();
$dataArr['project_list'] = $projectObj->getProjectList();
$dataArr['tracker_list'] = $projectObj->getTrackerList();
$dataArr['status_list'] = $projectObj->getStatusList();
Util::tplTransform($dataArr, 'update_issue');
