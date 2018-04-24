<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="root.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>MySite:Login</title>
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
            <a class="navbar-brand" href="404.html">MySite</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="404.html">Another Page</a></li>
                <li><a href="404.html">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.html"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <?php if(empty($_SESSION)) : ?>
    <div class="alert alert-danger">
        <strong>Unauthorized!</strong><br>
        Please <a href="login.html">Login</a>
    </div>
    <?php else: ?>
    <div class="alert alert-success">
        <strong>Login Successful.</strong><br>
        Welcome <strong><?php echo $_SESSION['name'] ?></strong>
    </div>
    <?php endif ?>
</div>

<footer class="footer navbar-bottom">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="login.html">Login</a>
                <br>
                <a href="register.html">Register</a>
                <br>
                <a href="404.html">About</a>
            </div>
            <div class="col-md-9">
                <span class="text-muted">In vel sapien enim. Quisque a velit nisi. Ut gravida turpis ut neque commodo semper. Aenean eu consequat nunc. Suspendisse potenti. Curabitur a turpis ultricies, luctus purus ut, bibendum tortor. Nullam in libero placerat, gravida est at, placerat velit. Duis nec lobortis neque. </span>
            </div>
        </div>
        <span class="text-muted">Copyright &copy; MySite.com</span>
    </div>
</footer>
</body>
</html>