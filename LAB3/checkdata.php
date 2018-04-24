<?php
    function check_input($_name){
        return (isset($_POST[$_name]) and !empty($_POST[$_name]));    
    }

    $cod_regex = "/^[A-Za-z]{6}[0-9LMNPQRSTUV]{2}[A-Za-z]{1}[0-9LMNPQRSTUV]{2}[A-Za-z]{1}[0-9LMNPQRSTUV]{3}[A-Za-z]{1}$/";
    $error = array();

    if(!check_input('name')){
        array_push($error, "Name filed cannot be empty");
    }
    if(!check_input('sex')) {
        array_push($error, "Inavilid Sex - Please select one");
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
    if(!check_input('cod_fiscale')) {
        array_push($error, "Fiscal Code field cannot be empty");
    } elseif (preg_match($cod_regex, $_POST['cod_fiscale'])!=1){
        array_push($error, "Fiscal Code is not valid");    
    }
    if(empty($error)) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $sex = $_POST['sex'];
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));
        $password_encoded = sha1(md5(trim($_POST['password'])));
        $cod_fiscale = htmlspecialchars(trim($_POST['cod_fiscale']));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="root.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>MySite:RegistrationResult</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">MySite</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="404.html">Another Page</a></li>
                <li><a href="404.html">About</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
<?php if(empty($error)) : ?>
    <h1>Input:</h1>
    <span class="block"><strong>Name</strong> => <?php echo $name ?></span>
    <span class="block"><strong>Sex</strong> => <?php echo $sex ?></span>
    <span class="block"><strong>Fiscal Code</strong> => <?php echo $cod_fiscale ?></span>
    <span class="block"><strong>Email</strong> => <?php echo $email ?></span>
    <span class="block"><strong>Username</strong> => <?php echo $username ?></span>
    <span class="block"><strong>Password</strong> => <?php echo $password ?></span>
    <span class="block"><strong>Encoded Password</strong> => <?php echo $password_encoded ?></span> 
<?php else :?>
    <h1>Error:</h1>
    <?php foreach($error as $_error): ?>
        <span class="block text-danger"><?php echo $_error ?></span>
    <?php endforeach; ?>
<?php endif;?>

</div>



<footer class="footer navbar-bottom">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="login.html">Login</a>
                <br>
                <a href="register.html">Register</a>
                <br>
                <a href="404.html">About</a>
            </div>
            <div class="col-sm-9">
                <span class="text-muted">In vel sapien enim. Quisque a velit nisi. Ut gravida turpis ut neque commodo semper. Aenean eu consequat nunc. Suspendisse potenti. Curabitur a turpis ultricies, luctus purus ut, bibendum tortor. Nullam in libero placerat, gravida est at, placerat velit. Duis nec lobortis neque. </span>
            </div>
        </div>
        <span class="text-muted">Copyright &copy; MySite.com</span>
    </div>
</footer>


</body>
</html>