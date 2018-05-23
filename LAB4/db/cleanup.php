<?php
include("mysql_credentials.php");
$db = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
$stmt = "DROP TABLE User";
if($db->query($stmt)===FALSE){
    die("Unable to drop table User");
}
echo "Table User dropped successfully<br>";
$stmt = "DROP DATABASE $mysql_db";
if($db->query($stmt)===FALSE){
    die("Unable to drop database");
}
echo "Database deleted successfully";
$db->close();