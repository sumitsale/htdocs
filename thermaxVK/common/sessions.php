<?php

include_once("connection.php");

class Sessions {

    var $email;
    var $password;

    function __construct() {
        
    }

    function login($email, $password) {
        try {
            $this->email = $email;
            $this->password = $password;
            $obj = new Connection();
            $query = "SELECT * FROM jcl_userprofile WHERE email = ? AND Password = ? "; //and accountStatus in ('approved','pending')";					
            $param = array($this->email, md5($this->password));
            $rows = $obj->executeQuery($query, $param);
            if (!empty($rows[0]['role'])) {
                session_start();
                $_SESSION['userGuid'] = $rows[0]['userGuid'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = strtolower($rows[0]['role']);
                $_SESSION['firstName'] = $rows[0]['firstName'];
                $_SESSION['cricketPlayer'] = $rows[0]['cricketPlayer'];

                /* if($rows[0]['accountStatus']=="Pending"){
                  $_SESSION['role']="Pending";
                  } */

                $query = "SELECT * FROM jcl_configure where currentyear='2014'";
                $res = $obj->executeQuery($query);
                if ($res) {
                    $_SESSION['currentYear'] = $res[0]['currentYear'];
                    $_SESSION['allowPlayersCloth'] = $res[0]['allowPlayersCloth'];
                    $_SESSION['allowNonPlayersCloth'] = $res[0]['allowNonPlayersCloth'];
                }

                $query = "SELECT captainFlag,teamGuid FROM jcl_team_player where teamPlayerStatus='Selected' and playerGuid=" . $rows[0]['userGuid'];
                $res = $obj->executeQuery($query);
                if ($res) {
                    if ($res[0]['captainFlag'] == 1)
                        $_SESSION['role'] = "Captain";
                    $_SESSION['teamGuid'] = $res[0]['teamGuid'];
                }
                return $_SESSION['role'];
            }
            else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            header('HTTP/1.1 500 Internal Server Error');
            exit("Something went wrong when we tried to give you access to the system. Please try again! Sorry for any inconvenience!");
        }
    }

    function chk_login($email) {
        $this->email = $email;
        if (isset($email) && ($email != null)) {
            return true; //logged in user
        }
    }

}

?>