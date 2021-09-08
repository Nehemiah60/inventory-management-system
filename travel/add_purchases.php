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
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>

</head>
<body>
<?php include_once("Templates/header.php"); ?>


<div class="container">
    <h3 class="text-center"> Purchases </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="add_new_purchases_script.php" method="post">
                <input type="text" name="PD" placeholder="* purchase_id" required class="form-control">

                <input type="text" name="SD" placeholder="* supplier_id" required class="form-control">

                <input type="text" name="ID" placeholder="* product_id" class="form-control">

                <input type="text" name="PN" placeholder="* product_name" class="form-control">

                <input type="text" name="NR" placeholder="* number_received" class="form-control">

                <hr>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary"> Add New</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</div>
</body>
</html>

