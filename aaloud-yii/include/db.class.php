<?php
/**
 * @package  for DB connection
 * @version  $id
 * @author   gede.suartana 
 * @license  GNU GENERAL PUBLIC LICENSE
 * @access   Public + Private
 * @php      5 or higher
 *
 * */

class DbaseMySQL {

	// protectec member
	/*
	 * Connection information
	 */
	protected $mySQLUser    = "HungamaOne";              // MySQL Username
	protected $mySQLPasswd  = "HungamaOne";             // MySQL Password
	protected $mySQLHost    = "localhost";            // MySQL Host IP-Address or Domainname
	protected $mySQLPort    = "3306";                 // MySQL Port option
	protected $mySQLName    = "artistaloud";            // MySQL Databasename
	protected $mySQLSelectDB;                         // MySQL Databasename
	protected $mySQLConnection;                       // MySQL Databasename

	/**
	 * DbaseMySQL class constructor
	 *
	 * Initializes the DbaseMySQL class
	 * @access public
	 * @param none
	 * @return string $this->mySQLConnect()
	 */

	public function __construct(){

		return $this->mySQLConnect();

	}


	/**
	 * Provides an OOP interface to an MySQL host
	 * @param none
	 * @return boolean
	 */
	public function mySQLConnect(){
		// set connection
		$this->mySQLConnection = mysql_connect($this->mySQLHost.":".$this->mySQLPort, $this->mySQLUser, $this->mySQLPasswd) or die("{connect} Database Error: ".mysql_errno()." : ".mysql_error());

		if($this->mySQLConnection){
			//select from databasename
			$this->mySQLSelectDB = mysql_select_db($this->mySQLName, $this->mySQLConnection) or die("{select_db} Database Error: ".mysql_errno()." : ".mysql_error());
			return true;
		}else{
			return false;
		}
	}

	/**
	 * closing connection from MySQL host
	 * @param none
	 * @return boolean
	 */

	public function mysqlclose()
	{
		// close connection
		$this->mySQLConnection = mysql_close();

		if($this->mySQLConnection){
			return true;
		}else {
			return false;
		}

	}

}


?>
