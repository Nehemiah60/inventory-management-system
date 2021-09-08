<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Report</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <table class="table table-bordered table-striped table-responsive-sm">
        <tr>
            <th colspan="9">Products Report</th>
        </tr>
        <tr>
            <th>Product_id</th>
            <th>Product_name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Inventory Available</th>
            <th>Inventory Shipped</th>
            <th>Stock</th>
            <th>Date Added</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "inventory");
        if (!$conn) {
            die("Database Connection Error : " . mysqli_connect_error());
        }
        $sql = "select * from products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['Category']; ?></td>
                    <td><?php echo $row['Brand']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                    <td><?php echo $row['inventory_available']; ?></td>
                    <td><?php echo $row['inventory_shipped']; ?></td>
                    <td><?php echo $row['Stock']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td> <a href="search_delete_product.php" class="btn btn-danger"> Delete </a>
                    <td> <a href="search_product_update.php" class="btn btn-success"> Update </a>

                    </td>
                </tr>
                <?php
            }
            mysqli_close($conn);
        }
        ?>
    </table>
</div>
</body>
</html>


