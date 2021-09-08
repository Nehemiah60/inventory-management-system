

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/order.js"></script>
    <script>
        $(document).ready(function (){
            var html = ' <tr><td><input  type="number" name="enternumber" required></td> <td> <div class="container"> <select name="tata[]" id="zara" > </select><td><input  type="text" name="tq"></td><td><input  type="text" name="q"> </td><td><input  type="text" name="pr"> </td><td><input  type="text" name="tot"> </td> <td> <button id="remove" style="..." class="btn btn-danger" value="remove" name="remove">Remove</button></td> </tr>';
            var x=1;
            $("#add").click(function (){
             $("#table_field").append(html);

            });
          $("#table_field").on('click' , '#remove' , function (){
           $(this).closest('tr').remove();
          });
        });

        $('.ent').on('.ent', function (){
            var element = $(this);
        });
    </script>
</head>
<body>
<div class="overlay"><div class="loader"></div></div>
<!-- Navbar -->
<?php include_once("Templates/header.php"); ?>
<br/><br/>

<div class="container">
    <div class="row">
        <div class="col-sm-13 mx-auto">
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header">
                    <h4>New Orders</h4>
                </div>
                <div class="card-body">
                    <form id="get_order_data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" align="right">Order Date</label>
                            <div class="col-sm-6">
                                <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
                            <div class="col-sm-6">
                                <input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
                            </div>
                        </div>


                        <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                            <div class="card-body" >
                                <h3>Make a order list</h3>
                                <table align="center" style="width:800px;"  id="table_field">
                                    
                                    <tr>
                                        <th style="..."> No. </th>
                                        <th style="..">Item Name</th>
                                        <th style="..">Total Quantity</th>
                                        <th style="..">Quantity</th>
                                        <th style="..">Price</th>
                                        <th>Total</th>
                                        <th> Add or Remove </th>
                                    </tr>
                                    <tr>
                                        <td><input  type="number" name="enternumber" required></td>
                                        <td> <div class="container">


                                                    <select name="tata[]" id="zara" class="ent">
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
                                        <td><input  type="text" name="tq"></td>
                                        <td><input  type="text" name="q"> </td>
                                        <td><input  type="text" name="pr"> </td>
                                        <td><input  type="text" name="tot"> </td>
                                        <td> <button id="remove" style="..." class="btn btn-danger" value="remove" name="remove">Remove</button></td>

                                    </tr>

                                    <tbody id="invoice_item">

                                    </tbody>
                                </table> <!--Table Ends-->
                                <center style="padding:10px;">
                                    <button id="add" style="width:150px;" class="btn btn-success" value="add">Add</button>

                                </center>
                            </div> <!--Crad Body Ends-->
                        </div> <!-- Order List Crad Ends-->

                        <p></p>



                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>