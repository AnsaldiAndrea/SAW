<?php
    function show_error($error_message) {
        echo "<script>alert('$error_message'); window.location='login.html'</script>";
    }

    function clear_input($input) {
        $input = trim($input);
        $input = addslashes($input);
        return $input;
    }

    $username = clear_input($_POST['username']);
    $password = clear_input($_POST['password']);

    $db = new mysqli('localhost', 'root', 'Nuvoletta2', 'dev');
    $query = "SELECT name from User where username='$username' and password='".sha1($password)."'";
    
    $_SESSION = array();
    $result = $db->query($query);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        if($row){
            session_start(); 
            $_SESSION['name'] = $row['name'];
            header("Location: welcome.php");
            exit();
        } else show_error("Invalid Credential");
    } else show_error("An Error Occurred. Try again");