<?php
session_start();
include('../common.php');
include('../include/function.php');
$aa_artist_list = '';
$aa_artist_list = paisavasool_list();
$db->mysqlclose();
echo $aa_artist_list; 
?>