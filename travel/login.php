<html>
<head>
    <title>Login</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="bootstrap/js/jquery-3.4.0.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div style="background-image: url('images/jast.jpg'); height: 200%">
<div class="logo">
    <img src="images/logo.jpg" alt="Logo" width="200" height="200">
</div>

<div class="heading">
    <h4 class="text-center text-primary">Inventory Management  System (IMS)</h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="post" action="">
                <br>
                <input type="text" name="uname" class="form-control" placeholder="* Username" required>
                <br>
                <input type="password" name="password" class="form-control" placeholder="* Password" required>
                <br>

                <div class="buttons">
                    <input type="submit" name="submit" value="Login" class="btn btn-outline-primary">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="register_user.php" class="btn btn-primary">Create Account</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="staff_login.php" class="btn btn-outline-danger">Staff Login</a>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</div>
</body>
</html>



<?php
session_start();

if(isset($_POST['submit'])){
    include 'dbconnect.php';

    $username = mysqli_real_escape_string($db,$_POST['uname']);
    $password = mysqli_real_escape_string($db,$_POST['password']);


    $qry=mysqli_query($db,"SELECT * FROM users WHERE user_name='$username' AND password='$password'");
    $row = mysqli_fetch_array($qry,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($qry);

    // If result matched $username,$password, table row must be 1 row

    if($count == 1) {

        if(!empty($username) && !empty($password)){
            header("LOCATION:dashboard.php");
        }

        else if(!empty($username) && !empty($password)){
            header("LOCATION:register_user.php");
        }

    }
    else {
        header("LOCATION:login_Errror.php");
    }
}

