<?php
require_once("includes/config.php");
function __autoload($sClassName) {
    if (file_exists(DEPLOY_PATH . 'classes/' . $sClassName . '.php')) {
        require_once(DEPLOY_PATH . 'classes/' . $sClassName . '.php');
    }
}

function closeDBConnections() {
    DbConn::closeConnections();
}

register_shutdown_function('closeDBConnections');