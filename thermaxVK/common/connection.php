<?php
//include_once 'config.php'; 


class Connection {

	var $dbServer; // server name
	var $userName; //db user
	var $userPassword; // db user password
	var $dbName; // database name
	var $conn; // database connection
	var $result;
	 
	/**
		This function assigns database config variables 
		and make database connection.
	*/
	function __construct() { 
		//$conf = new Config();
		$this->dbServer		= "localhost";//$conf ->dbServer; //reference for the Host
		$this->userName 	= "root"; //$conf ->dbUser; //reference for the Username
		$this->userPassword = ""; //$conf ->dbPass; //reference for the Password
		$this->dbName 		= "thermax_vendor_konnect"; //$conf ->dbName; //reference for the DatabaseName
		$this->dbConnect();
	}
	
	function dbConnect() { 
		try{ 
			$this->conn = new PDO("mysql:host=".$this->dbServer.";dbname={$this->dbName}",$this->userName,$this->userPassword);
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch (PDOException $e){
			trigger_error("Database connection is Failed!", E_USER_ERROR);
			header('HTTP/1.1 500 Internal Server Error'); 
			exit("Database connection is Failed!");
		}		
	}	
	
	function executeQuery($sql,$param="",$debug=false)
	{
		/*$con  = getcon();
		$res = mysql_query($sql);
		if($debug)
			debug($sql);
		mysql_close($con);
		return $res;*/
		
		if($debug)
			debug($sql);
			
		$statement  = $this->conn->prepare($sql);
		if($param)
			$statement->execute($param);
		else
			$statement->execute();
		
		$res = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		return $res;
	}

	function execute($sql,$param="",$lastid=false,$debug=false)
	{
		/*$con  = getcon();
		$res = mysql_query($sql);
		if($debug)
			debug($sql);
		mysql_close($con);
		return $res;*/

		if($debug)
			debug($sql);
			
		$statement  = $this->conn->prepare($sql);
		if($param)
			$res = $statement->execute($param);
		else
			$res = $statement->execute();
		
		//$res = $statement->fetchAll(PDO::FETCH_ASSOC);
		if($lastid)
			return $this->conn->lastInsertId();
		else
			return $res;
	}
	
	function debug($sql)
	{
		echo "<pre>";
		echo $sql;
		echo "</pre>";
		exit;
	}		
}
?>