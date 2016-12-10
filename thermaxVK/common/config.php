<?php
include_once 'constants.php';
class Config {

	var $dbServer;
	var $dbName;
	var $dbUser;
	var $dbPass;

	function Config() {
		$this->dbServer	= DB_SERVER;
		$this->dbName	= DB_NAME;
		$this->dbUser	= DB_USER;
		$this->dbPass	= DB_PASSWORD;
	}
}
?>