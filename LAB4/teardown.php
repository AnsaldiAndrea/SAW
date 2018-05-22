<?php
$credential = json_decode(file_get_contents("db_credential.json"), TRUE);
$db = new mysqli($credential['location'], $credential['username'], $credential['password']);
$stmt = "DROP DATABASE lab04";
if($db->query($stmt)===FALSE){
    die("Unable to drop database");
}
echo("Database deleted successfully");
$db->close();