<?php
    function show_error() {
        echo "<script>alert('Invalid Credential. Try again'); window.location='login.html'</script>";
    }

    $csv = array_map('str_getcsv', file('myusers.txt'));
    $csv = array_slice($csv, 3);

    $username = $_POST['username'];
    $password = $_POST['password'];

    session_start();
    foreach($csv as $c) {
        if($c[1]==$username and $c[2]==sha1($password)){
            $_SESSION['name'] = $c[0];
            header("Location: welcome.php");
            exit();
        }
    }
    $_SESSION = array();
    show_error();