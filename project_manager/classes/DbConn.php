<?php

final class DbConn {

    private static $connections = array();

    private function __construct() { # we don't permit an explicit call of the constructor! (like $v = new Singleton())
        
    }

    private function __clone() { # we don't permit cloning the singleton (like $x = clone $v)
        
    }

    public static function getDBObject($database) {
        if (empty(self::$connections[$database])) {
            self::$connections[$database] = self::createDBObject($database);
        }
        return self::$connections[$database];
    }

    private static function createDBObject($database) {
        global $databases;
        try {
            return new mysqli($databases[$database]['host'], $databases[$database]['user'],"",$databases[$database]['database']);
        } catch (Exception $err) {
            $sysErr = 'Message: ' . $err->getMessage();
            $custErr = 'Error in file: ' . __FILE__ . ', Line: ' . __LINE__;
        }
    }

    public static function closeConnections() {
        try {
            foreach (self::$connections as $connection) {
                try {
                    $connection->close();
                } catch (Exception $closeErr) {
                    
                }
            }
            self::$connections = null;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

}