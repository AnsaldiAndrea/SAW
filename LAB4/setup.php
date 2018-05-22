<?php
$credential = json_decode(file_get_contents("db_credential.json"), TRUE);
$db = new mysqli($credential['location'], $credential['username'], $credential['password']);
$db->set_charset('utf-8');
$stmt = "CREATE DATABASE lab04";
if($db->query($stmt)===FALSE){
    die("Unable to crate database");
}
echo "Database lab04 created<br>";
$db->select_db("lab04");
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
    echo "Could not insert data in User - not necessary for testing\n";
}
echo "Setup done";
$db->close();
