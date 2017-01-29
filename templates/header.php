<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100" >
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title><?php echo $title ?></title>
<body>
<nav class="navbar navbar-default" id=main-nav" role="navigation">
    <div class="container-fluid" id="drop">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PetSwipe</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>
                <?php
                if($_SESSION['user'] == null){
                    $string = "/login.php";
                    echo "<li><a href=$string>Login</a></li>";
                }
                else {
                    $string = "/member.php";
                    echo "<li><a href=$string>Member Area</a></li>";
                }
                ?>
                <li><a href="/swipe.php">Swipe</a></li>
                <?php
                if($_SESSION['user'] != null) {
                    $string = "/logout.php";
                    echo "<li><a href=$string>Logout</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>