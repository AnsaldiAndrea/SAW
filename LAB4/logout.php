<?php
session_start();
if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    $_SESSION['error'] = ['success', 'You have successfully logged out'];
} else {
    $_SESSION['error'] = ['danger', '<strong>Unauthorized</strong>'];
}
header("Location: index.php");
exit();

