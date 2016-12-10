<?php
final class Util {

	public static function tplTransform(array $dataArr, $tplFile){
		header("Content-type: text/html; charset=utf-8");
        include_once('tpl/' . $tplFile . '.tpl.php');
	}
	
	public static function getControllerAction(){
		$action = isset($_POST['action']) ? $_POST['action'] : '';
		if($action == ''){
			$action = isset($_GET['action']) ? $_GET['action'] : '';
		}
		return $action;
	}
}