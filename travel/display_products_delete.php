


<?php

$conn = mysqli_connect("localhost","root","","inventory");
if (!$conn){
    die("Database Connection Error : " . mysqli_connect_error());
}
// Remove SQL Injection
$product_id= mysqli_real_escape_string($conn,$_POST['prosearch']);

$sql = "select * from products where product_id = '$product_id'";
//Execute the SQL Query Above
$result = $conn -> query($sql);
if ($result -> num_rows > 0){
    // If the table has data
    while ($row = $result -> fetch_assoc()){
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Update Course</title>
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="STYLING/custom.css">
            <script src="../bootstrap/js/jquery-3.6.0.js"></script>
            <script src="../bootstrap/js/popper.min.js"></script>
            <script src="../bootstrap/js/bootstrap.js"></script>
        </head>
        <body>
        <div class="container">
            <h2 class="text-center">Update Course</h2>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="delete_products_script.php" method="post">

                        <input type="text" name="ID" placeholder="* product_id" required class="form-control" value="<?php print $row['product_id'];?>">

                        <input type="text" name="PN" placeholder="* product_name" required class="form-control" value="<?php print $row['product_name'];?>">

                        <input type="text" name="category" placeholder="* Category" class="form-control" value="<?php print $row['Category'];?>">

                        <input type="text" name="brand" placeholder="* Brand" class="form-control" value="<?php print $row['Brand'];?>">

                        <input type="number" name="price" placeholder="*  Price" class="form-control" value="<?php print $row['Price'];?>">

                        <input type="number" name="IV" placeholder="* Inventory_Available" class="form-control" value="<?php print $row['inventory_available'];?>">

                        <input type="number" name="IS" placeholder="* Inventory_Shipped" class="form-control" value="<?php print $row['inventory_shipped'];?>">



                        <div class="buttons">
                            <button type="submit" class="btn btn-info"> Delete </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        </body>
        </html>
        <?php
    }
}
mysqli_close($conn);
?>




