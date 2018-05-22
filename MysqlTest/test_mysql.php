<?php
$db = new mysqli('localhost', 'root', 'Nuvoletta2', 'dev');
$username = 'potter';
$password = sha1('Rowling');
$query = "SELECT name from User where username='$username' and password='$password'";
$result = $db->query($query);
if(!$result) {
    echo "Error";
    return;
}
$row = mysqli_fetch_assoc($result);
if($row){
    echo $row['name'];
    return;
}
echo "Empty result";
