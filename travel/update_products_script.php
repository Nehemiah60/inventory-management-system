<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Course Update </title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <style>
        .sasa{
            background: green;
            color: white;
            height: 140px;
            padding-top: 20px;
            text-align: center;

        font-size: 20px;
        border-radius: 20px;
    </style>
</head>
<body>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4 sasa">
            <?php
            // Establish a Connection
            $conn=mysqli_connect("localhost","root","","inventory");
            if (!$conn){
                die("Database Connection Error : " .mysqli_connect_error());
            }

            //Remove SQL Injection
            $product_id=mysqli_real_escape_string($conn, $_POST['ID']);
            $proname=mysqli_real_escape_string($conn, $_POST['PN']);
            $cat= mysqli_real_escape_string($conn,$_POST['category']);
            $br=mysqli_real_escape_string($conn, $_POST['brand']);
            $pri=mysqli_real_escape_string($conn, $_POST['price']);
            $available=mysqli_real_escape_string($conn, $_POST['IV']);
            $shipped=mysqli_real_escape_string($conn, $_POST['IS']);

            // Introduce an SQL Query
            $sql=" update products set product_name='$proname', Category='$cat', Brand='$br', Price='$pri',
 inventory_available='$available', inventory_shipped='$shipped' where product_id='$product_id'";
            // Execute the SQL Query
            if ($conn ->query($sql)== true){
                print "<p>Products details updated Successfully</p>";
                print "<a href='search_product_update.php' class='btn btn-outline-primary font-weight-bold'>Update another Product</a>";
            }
            else{
                print "<p> Products details not updated</p>";
                print "<a href='search_product_update.php' class='btn btn-outline-success'>Try Again</a>";
            }



            ?>

        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
    </div>

</div>


</body>
</html>
