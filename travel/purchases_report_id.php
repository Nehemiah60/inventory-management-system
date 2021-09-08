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
            <th>Purchase_id</th>
            <th>Supplier_id/th>
            <th>Product_id</th>
            <th>Product Name</th>
            <th>Numbers Received</th>
            <th>Purchase Date</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "inventory");
        if (!$conn) {
            die("Database Connection Error : " . mysqli_connect_error());
        }
        $sql = "select * from purchases";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['purchase_id']; ?></td>
                    <td><?php echo $row['supplier_id']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['numbers_received']; ?></td>
                    <td><?php echo $row['purchase_date']; ?></td>
                    <td> <a href="search_purchase_update.php" class="btn btn-success"> Update </a>
                    <td> <a href="search_delete_purchases.php" class="btn btn-danger"> Delete </a>

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



