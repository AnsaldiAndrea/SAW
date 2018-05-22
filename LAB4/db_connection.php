<?php
$credential = json_decode(file_get_contents("db_credential.json"), TRUE);
$db = new mysqli($credential['location'], $credential['username'], $credential['password'], 'lab04');
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}
$db->set_charset('utf-8');
?>