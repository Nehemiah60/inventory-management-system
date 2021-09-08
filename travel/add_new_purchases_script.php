<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.jpg">
    <title>Add Products</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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
        }
    </style>

</head>
<body>
<hr>
<div class="container">
    <h3 class="text-center text-success"> Purchases </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-5 sasa">
            <form action="" method="post">
                <?php
                //Establishing a Database Connection
                $conn=mysqli_connect("localhost","root","","inventory");
                if (!$conn){
                    die("Database Connection Error :" . mysqli_connect_error());
                }
                //Remove SQL Injection
                $purchase=mysqli_real_escape_string($conn, $_POST['PD']);
                $supplier=mysqli_real_escape_string($conn, $_POST['SD']);
                $product_id= mysqli_real_escape_string($conn,$_POST['ID']);
                $proN=mysqli_real_escape_string($conn, $_POST['PN']);
                $numbers=mysqli_real_escape_string($conn, $_POST['NR']);


                //Create an SQL Query
                $sql= "insert into purchases (purchase_id, supplier_id, product_id,product_name,numbers_received)
                
                     values ('$purchase', '$supplier','$product_id','$proN','$numbers')
            
            ";

                //Execute the SQL Query Above
                if ($conn ->query($sql) == true){
                    print "<p> New Purchase Added Successfully </p>";
                    print "<a href='add_purchases.php' class='btn btn-outline-success'>Add Another Purchases</a>";
                }
                else{
                    print "<p>  Error! Purchases Not Added </p>";
                    print "<a href='add_purchases.php' class='btn btn-outline-success'>Try Again</a>";
                }





                ?>



            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</div>
</body>
</html>
