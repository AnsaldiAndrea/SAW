<?php
include("mysql_credentials.php");
$db = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}
$db->set_charset('utf8');
?>