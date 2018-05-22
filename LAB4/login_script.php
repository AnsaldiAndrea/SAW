<?php
    function show_error() {
        $_SESSION['error'] = ['danger', 'Invalid Credential. Try again'];
        header("Location: login.php");
        exit();
    }

    session_start();

    include("db_connection.php");

    $username = htmlspecialchars(trim($_POST['username']));
    $username = $db->real_escape_string($username);

    $password = sha1($_POST['password']);

    $stmt = $db->prepare("SELECT * FROM User WHERE username=? and password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
    $stmt->close();
    if($result){
        $_SESSION['logged_in'] = True;
        $_SESSION['name'] = $result['name'];
        $_SESSION['username'] = $result['username'];
        header("Location: welcome.php");
        exit();
    }
    $_SESSION = array();
    show_error();