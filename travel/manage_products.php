<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<!-- Navbar -->
<?php include_once("Templates/header.php"); ?>
<br/><br/>
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_product">
        <!--<tr>
          <td>1</td>
          <td>Electronics</td>
          <td>Root</td>
          <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
          <td>
              <a href="#" class="btn btn-danger btn-sm">Delete</a>
              <a href="#" class="btn btn-info btn-sm">Edit</a>
          </td>
        </tr>-->
        </tbody>
    </table>
</div>


<?php
include_once("search_product_update.php");
?>


</body>
</html>
</body>
</html>