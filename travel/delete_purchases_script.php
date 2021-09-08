<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Success</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <script src="bootstrap/js/jquery-3.6.0.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style>
        .sasa{
            background: indianred;
            color: white;
            height: 140px;
            font-size: 20px;
            text-align: center;
            border-radius: 20px;
            padding-top: 10px;
        }
        h2{
            color: indianred;
        }
    </style>

</head>
<body>
<hr>
<div class="container">
    <h2 class="text-center">Delete Success</h2>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-5 sasa">
            <?php
            $conn = mysqli_connect("localhost","root","","inventory");
            if (!$conn){
                die("Database Connection Error : " . mysqli_connect_error());
            }
            // Removing SQL Injections
            $purchase= mysqli_real_escape_string($conn,$_POST['PD']);

            // Using MySQL Insert to post the data to the database table courses
            $sql = "delete from purchases where purchase_id = '$purchase'";
            if ($conn -> query($sql) == true){
                print "<p>Purchase details deleted Successfully</p>";
                print " <br> <a href='search_delete_purchases.php' class='btn btn-primary'>Delete another Purchase</a>";
            }
            else{
                print "<p>Product Details deleted</p>";
                print "<a href='search_delete_purchases.php' class='btn btn-outline-danger'>Try Again</a>";
            }
            mysqli_close($conn);
            ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>

