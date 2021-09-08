<html>
<head>
    <title>Register User</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="bootstrap/js/jquery-3.4.0.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <style>
        body {
            background-image: url('images/jast.jpg');
        }
        form{
            background: blue;
        }
    </style>
</head>
<body>
<div class="logo">
    <img src="images/logo.jpg" alt="Logo" width="100" height="100">
</div>
<div class="heading">
    <h2 class="text-center">Register</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="add_user.php" method="post">
                <br>
                <input type="text" name="fname" class="form-control" placeholder="* First Name" required>
                <br>
                <input type="text" name="mname" class="form-control" placeholder="* Middle Name" required>
                <br>
                <input type="text" name="lname" class="form-control" placeholder="* Last Name" required>
                <br>
                <input type="text" name="uname" class="form-control" placeholder="* Username" required>
                <br>
                <input type="password" name="password" class="form-control" placeholder="* Password" required>
                <br>
                <select name="ugroup" id="ugroup" class="form-control" required>
                    <option value="">====Select User Group=======</option>
                    <option value="Systems Administrator">Systems Administrator</option>
                    <option value="Staff">Staff</option>
                </select>
                <br>
                <div class="buttons">
                    <button class="btn btn-primary" type="submit">Register</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="dashboard.php" class="btn btn-outline-danger">Dashboard</a>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
