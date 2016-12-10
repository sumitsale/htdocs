<?php 
//define('DEPLOY_PATH','/var/www/html/fresher/pratik/register/');
//define('WEB_URL','http://192.168.1.6/fresher/pratik/register');
define('DEPLOY_PATH','d:/xampp/htdocs/project_manager/');
define('WEB_URL','http://localhost/project_manager/');
define('DATABASE_NAME','fresher');
define('DATABASE_USERNAME','root');
//define('DATABASE_PASSWORD','root@123');
define('DATABASE_SERVERNAME','localhost');

define('DB_FRESHER', 1);
$databases = array();
$databases[DB_FRESHER] = array('host' => 'localhost', 'database' => 'fresher', 'user' => 'root');
//$databases[DB_FRESHER] = array('host' => 'localhost', 'database' => 'fresher', 'user' => 'root', 'password' => 'root@123');