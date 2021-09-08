<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Products</title>

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
    <h3 class="text-center"> Products </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 sasa">
            <form action="" method="post">
            <?php
            //Establishing a Database Connection
            $conn=mysqli_connect("localhost","root","","inventory");
            if (!$conn){
                die("Database Connection Error :" . mysqli_connect_error());
            }
            //Remove SQL Injection
            $product_id=mysqli_real_escape_string($conn, $_POST['ID']);
            $proname=mysqli_real_escape_string($conn, $_POST['PN']);
            $cat= mysqli_real_escape_string($conn,$_POST['category']);
            $br=mysqli_real_escape_string($conn, $_POST['brand']);
            $pri=mysqli_real_escape_string($conn, $_POST['price']);
            $available=mysqli_real_escape_string($conn, $_POST['IV']);
            $shipped=mysqli_real_escape_string($conn, $_POST['IS']);

            //Create an SQL Query
            $sql= "insert into products(product_id, product_name, Category, Brand, Price,
                     inventory_available, inventory_shipped)
                     values ('$product_id', '$proname','$cat','$br','$pri','$available','$shipped')
            
            ";

            //Execute the SQL Query Above
            if ($conn ->query($sql) == true){
                print "<p> New Product Added Successfully </p>";
                print "<a href='addproduct.php' class='btn btn-outline-success'>Add New Product</a>";
            }
            else{
                print "<p>  Error! Product Not Added </p>";
                print "<a href='addproduct.php' class='btn btn-outline-success'>Try Again</a>";
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
