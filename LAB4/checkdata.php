<?php
    include("db_connection.php");
    session_start();


    function check_input($_name){
        return (isset($_POST[$_name]) and !empty($_POST[$_name]));    
    }

    function clear_input($db, $var){
        $var = htmlspecialchars(trim($var));
        return $db->real_escape_string($var);
    }
    
    $error = array();

    if(!check_input('name')){
        array_push($error, "Name filed cannot be empty");
    }
    if(!check_input('email')) {
        array_push($error, "Email field cannot be empty");
    }
    if(!check_input('username')){
        array_push($error, "Username field cannot be empty");
    }
    if(!check_input('password')){
        array_push($error, "Password field cannot be empty");
    }
    if(!check_input('confirm_password')){
        array_push($error, "Confirm Password field cannot be empty");
    } elseif ($_POST['password']!=$_POST['confirm_password']) {
        array_push($error, "Password and Confirm Password don't have the same value"); 
    }
    if(empty($error)) {
        $name = clear_input($db, $_POST['name']);
        $email = clear_input($db, $_POST['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $username = clear_input($db, $_POST['username']);
        $password_encoded = sha1($_POST['password']);
    
        $stmt = $db->prepare("INSERT INTO User (name, username, email, password) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $username, $email, $password_encoded);
        $stmt->execute();
        if($stmt->affected_rows==1) {
            $_SESSION['error'] = ['success', 'Account successfully created'];
            $_SESSION['logged_in'] = True;
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
        } else {
            $_SESSION = array();
            $_SESSION['error'] = ['danger', 'Cannot create account, username or email are already taken'];
            header('Location: register.php');
        }
        $stmt->close();
        exit();
    } else {
        $_SESSION['error'] = ['danger', $error];
        header('Location: register.php');
        exit();
    }
