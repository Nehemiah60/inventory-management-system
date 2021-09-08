
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Course Code</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <h3 class="text-center">Select Purchase ID</h3>
    <hr>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="display_purchases_delete.php" method="post">
                <select name="DIS" id="" class="form-control" required>
                    <?php
                    $conn = mysqli_connect("localhost","root","","inventory");
                    if (!$conn){
                        die("Database Connection Error : " . mysqli_connect_error());
                    }
                    $sql = "select purchase_id from purchases";
                    $result = $conn -> query($sql);
                    if ($result -> num_rows > 0){
                        // If the table has data
                        while ($row = $result -> fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['purchase_id'];?>"> <?php echo $row['purchase_id'];?> </option>
                            <?php
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <hr>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</body>
</html>


