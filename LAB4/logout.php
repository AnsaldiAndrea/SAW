<?php
session_start();
if(isset($_SESSION['logged_in'])){
    $_SESSION = array();
    $_SESSION['error'] = ['success', 'You have successfully logged out'];
} else {
    $_SESSION['error'] = ['danger', '<strong>Unauthorized</strong>'];
}
header("Location: index.php");
exit();

