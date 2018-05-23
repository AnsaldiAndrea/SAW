<?php
include("mysql_credentials.php");
$db = new mysqli($mysql_server, $mysql_user, $mysql_pass);
$db->set_charset('utf8');
$stmt = "CREATE DATABASE $mysql_db";
if($db->query($stmt)===FALSE){
    die("Unable to crate database");
}
echo "Database $mysql_db created<br>";
$db->select_db($mysql_db);
$stmt = "CREATE TABLE `User` (
    `name` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL PRIMARY KEY,
    `username` varchar(64) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($db->query($stmt)===FALSE){
    die("Unable to create table 'User'");
}
echo "Table 'User' created<br>";
$stmt = "INSERT INTO `User` (`name`, `email`, `username`, `password`) VALUES
    ('Test Name', 'test@gmail.com', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');";
if($db->query($stmt)===FALSE){
    echo "Could not insert data in User - not necessary for testing<br>";
}
echo "Added testing user with crentials username=test and password=test<br>";
echo "Setup done";
$db->close();
