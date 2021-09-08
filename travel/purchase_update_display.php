
<?php
// Establish a connection
$conn=mysqli_connect("localhost","root","","inventory");
if (!$conn){
    die("Database Connection Error :" .mysqli_connect_error());
}

// Remove SQL Injection
$purchase=mysqli_real_escape_string($conn, $_POST['PD']);

// Introduce SQL Query
$sql="select * from purchases where  purchase_id= '$purchase'";
//Execute SQL Query
$result=$conn->query($sql);
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
    <title>Purchases</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="purchases_update_script.php" method="post">
                <label for="purhase ID"> Purchase_ID </label>
                <input type="text" name="PD" required class="form-control" value="<?php print $row['purchase_id'];?>">
                <label for="supplier ID"> Supplier_ID</label>
                <input type="text" name="SD" required class="form-control" value="<?php print $row['supplier_id'];?>">
                <label for="productid"> Product_ID</label>
                <input type="text" name="ID" required class="form-control" value="<?php print $row['product_id'];?>">
                <label for="pn"> Product_Name</label>
                <input type="text" name="PN" class="form-control" value="<?php print $row['product_name']; ?>">
                <label for="numb"> Numbers_Received</label>
                <input type="text" name="NR" required class="form-control" value="<?php print $row['numbers_received'];?>">

<div class="buttons">
    <button class="btn btn-primary"> Update</button>
</div>

            </form>


        </div>
        <div class="col-sm-3"></div>
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
