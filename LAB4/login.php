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
            <a class="navbar-brand" href="index.php">MySite</a>
        </div><div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['logged_in'])) : ?>
                <li><a href="404.php">Welcome <?php echo $_SESSION['username'] ?></a><li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php else : ?>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif ?>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <?php if(isset($_SESSION['logged_in'])) : ?>
    <div class="col-md-9 center-block">
        <h1>Login</h1>
        <p>You are already logged in.</p>
        <br>
        <p>If you want to log in with another account:
            <a href="logout.php">Log out</a>
        </p>
    <?php else : ?>
    <div class="col-md-9 center-block">
        <?php if(isset($_SESSION['error'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['error'][0]?>">
            <?php echo $_SESSION['error'][1]; unset($_SESSION['error']) ?>
        </div>
        <?php endif ?>
        <h1>Login</h1>
        <form method="post" action="login_script.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input class="form-control" id="password" name="password" type="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
        <span>Don't have an account?
            <a href="register.php">Register</a>
        </span>
    </div>
    <?php endif ?>
</div>

<footer class="footer navbar-bottom">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="login.php">Login</a>
                <br>
                <a href="register.php">Register</a>
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