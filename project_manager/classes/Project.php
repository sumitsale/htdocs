<?php
class Project extends Dbop {
	private $dbConn;

    public function __construct($db = 1) {
		$this->dbConn = $db;
    }
	public function getProjectList($view='') {
		$aReturn = array();
		
		
		if($view=='')
		{
				if(isset($_SESSION["projectname"]) && $_SESSION["projectname"]!='')
				{
					$query = 'select project_name,description from project_master where project_name ="'.$_SESSION["projectname"].'"';
				
				}
				else
				{
				$query = 'select project_name,description from project_master';
					
				}
		}
			else
			{
			$query = 'select project_name,description from project_master';
			}
		$aReturn = $this->select($query, '', $this->dbConn);
		//print_r($aReturn);exit;
		return $aReturn;
	}
	
		public function getProjectdetail($porojectname) {
		$areturn = array();
		$query = 'select project_name,description from project_master where project_name ="'.$porojectname.'"';
		$aReturn = $this->select($query, '', $this->dbConn);
		return $aReturn;
	}
	public function getTrackerList() {
		$areturn = array();
		$query = 'select tracker from pm_tracker_master';
		$aReturn = $this->select($query, '', $this->dbConn);
		return $aReturn;
	}
	public function getStatusList() {
		$areturn = array();
		$query = 'select status from pm_status_master';
		$aReturn = $this->select($query, '', $this->dbConn);
		return $aReturn;	
	}
	public function insertRegistrationData($rData) {
		$rReturn= array();
		$query = 'insert into pm_user_registration_details(username,email,password,projectname,firstname,lastname) values (?,?,?,?,?,?) ';
		
		$insertId = $this->insert($query,array($rData['username'], $rData['email'], $rData['password'], $rData['projectname'], $rData['firstname'], $rData['lastname']), $this->dbConn);
		$rReturn['id'] = $insertId;
		return $rReturn;
	}
	
	public function authnticateuser($rsData)
	{
	
		
		$areturn = array();
		$query = 'select * from pm_user_registration_details where username ="'.$rsData['username'].'" and password ="'.$rsData['password'].'"';
		$aReturn = $this->select($query, '', $this->dbConn);
		
		// echo "<pre>";
		// print_r($aReturn);exit;
		
		if(count($aReturn)>0)
		{
		session_start();
		$_SESSION["emp_id"] = $aReturn[0]['emp_id'];
		$_SESSION["username"] =$aReturn[0]['username'];
		$_SESSION["email"] =$aReturn[0]['email'];
		$_SESSION["projectname"] = $aReturn[0]['projectname'];
		
		
			$areturn['flag'] =  'success';
			$areturn['refresh_url'] =  WEB_URL.'project_list.php';
		}
			else
			{
			
			$areturn['flag'] =  'error';
			}
		return $areturn;
	}
	
	
	public function getIssuelist($projectname) {
		$areturn = array();
		$query = 'select * from pm_project_issues_details where project_name="'.$projectname.'"';
		
		$aReturn = $this->select($query, '', $this->dbConn);
		return $aReturn;
	}
	
	public function deleteissue($id) {
		$areturn = array();
		$query = 'delete from pm_project_issues_details where issue_id in ('.$id.')';
		$this->delete($query, '', $this->dbConn);
		return $aReturn;
	}
}
?>