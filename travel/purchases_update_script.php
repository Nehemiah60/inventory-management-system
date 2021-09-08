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
            height: 140px;
            font-size: 20px;
            color: white;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 sasa">
            <?php
            // Establish a Connection
            $conn=mysqli_connect("localhost","root","","inventory");
            if (!$conn){
                die("Database Connection Error : " .mysqli_connect_error());
            }

            //Remove SQL Injection
            $purchase=mysqli_real_escape_string($conn, $_POST['PD']);
            $supplier=mysqli_real_escape_string($conn, $_POST['SD']);
            $product_id= mysqli_real_escape_string($conn,$_POST['ID']);
            $proN=mysqli_real_escape_string($conn, $_POST['PN']);
            $numbers=mysqli_real_escape_string($conn, $_POST['NR']);

            // Introduce an SQL Query
            $sql=" update purchases set supplier_id= '$supplier', product_id='$product_id',
             product_name='$proN', numbers_received='$numbers' where purchase_id='$purchase'";

            // Execute the SQL Query
            if ($conn ->query($sql)== true){
                print "<p>Purchase details updated Successfully</p>";
                print "<a href='search_purchase_update.php' class='btn btn-outline-success font-weight-bold'>Update another Purchase</a>";
            }
            else{
                print "<p> Purchase details not updated</p>";
                print "<a href='search_purchase_update.php' class='btn btn-outline-success'>Try Again</a>";
            }



            ?>

        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
    </div>

</div>


</body>
</html>

