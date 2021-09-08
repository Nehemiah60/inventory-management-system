
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo.jpg">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLING/custom.css">
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/popper.min.js" ></script>
    <script src="../bootstrap/js/bootstrap.min.js" ></script>

    <style>

        body{
            background: mediumblue;
        }
    </style>


</head>
<body>
<!-- Navbar -->
<?php include_once("Templates/header.php"); ?>

<br/><br/>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto">
                <img class="card-img-top mx-auto" style="width:60%;" src="../Images/admin.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Profile Info</h4>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Nehemiah Bosire</p>
                    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                    <p class="card-text"   >Last Login : <?php echo date("Y-m-d"); ?>  </p>
                    <a href="#" class="btn btn-primary"><i class="fa fa-edit" >&nbsp;</i>Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="width:100%;height:100%;">
                <h1>Welcome Admin,</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">New Orders</h4>
                                <p class="card-text">Here you can make invoices and create new orders</p>
                                <a href="search_new_order.php" class="btn btn-primary">New Orders</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<p></p>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <p class="card-text">Here you can manage your prpducts and you add new products</p>
                    <a href="addproduct.php" class="btn btn-primary">   <i class="fa fa-plus"></i> Add</a>
                    <a href="products_reports_id.php" class="btn btn-success"> <i class="fa fa-edit"></i> Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Purchases</h4>
                    <p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
                    <a href="add_purchases.php" class="btn btn-primary" ><i class="fa fa-plus">&nbsp;</i> Add</a>
                    <a href="purchases_report_id.php" class="btn btn-success"><i class="fa fa-edit"></i> Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
                    <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"> <i class="fa fa-plus-square"></i> Add</a>
                    <a href="manage_categories.php" class="btn btn-success">Purchases</a>
                </div>
            </div>
        </div>
    </div>
</div>








</body>
</html>
