<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> New Order</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/popper.min.js" ></script>
    <script src="../bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
<?php include_once("Templates/header.php"); ?>
<div class="container">


    <form action="pagination.php" method="post" name="zest">

        <select name="tata" id="">
                                                        <?php
                                                        $conn = mysqli_connect("localhost","root","","inventory");
                                                        if (!$conn){
                                                            die("Database Connection Error : " . mysqli_connect_error());
                                                        }
                                                        $sql = "select product_name from products";
                                                        $result = $conn -> query($sql);
                                                        if ($result -> num_rows > 0){
                                                        // If the table has data
                                                        while ($row = $result -> fetch_assoc()){
                                                        ?>


                                                        <option value=" <?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option>

                                                            <?php
                                                        }
                                                        }
                                                        mysqli_close($conn);
                                                        ?>
                                                    </select>


        <hr>
        <div class="buttons">
            <button class="btn btn-primary"> Search</button>
        </div>
    </form>
</body>
</html>
