<?php

session_start();
$dataArr = array();
require_once 'router.php';
Util::tplTransform($dataArr, 'project_list');
$projectObj = new Project();


// echo "<pre>";
// print_r($_GET);exit;
// // print_r($_SESSION);exit;
// print_r($project_list);exit;

if(isset($_GET['view']) && $_GET['view']=='all')
{

	$project_list = $projectObj->getProjectList('all');
}
else
{
	$project_list = $projectObj->getProjectList();
}


echo "<table align='center'>";

for($i=0;$i<count($project_list);$i++) { 

echo 		"<tr>
			<td>project name:- </td>
			<td><a href=\"issue_list.php?projectname=".$project_list[$i]['project_name']."\">".$project_list[$i]['project_name']."</a></td>
			
		</tr>
	
		<tr>
			<td>project description:- </td>
			<td>".$project_list[$i]['description']."</td>
			
		</tr>
		
			
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		
		";
		
		
		
		}


echo "</table>";
