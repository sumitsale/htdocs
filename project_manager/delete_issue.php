<?php
$dataArr = array();
require_once 'router.php';
$projectObj = new Project();


$ids_array = $_POST['ids'];
 $projectObj->deleteIssue($ids_array);