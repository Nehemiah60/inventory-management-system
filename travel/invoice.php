
<?php
$connect = mysqli_connect("localhost", "root","","inventory");
include('DatabaseInvoice.php');

$statement = $connect->prepare("
SELECT * FROM order_table
ORDER BY order_id DESC 
"
);

// Execute the Query Above
$statement -> execute();
$all_result= $statement -> fetchAll();
$total_rows = $statement -> rowCount();
if (isset($_POST["create_invoice"]))
{
    $order_total_before_tax= 0;
    $order_total_tax=0;
    $order_total_after_tax=0;
    $statement = $connect->prepare("
INSERT INTO order_table (order_id, order_date, order_receiver_name, order_receiver_adress, order_total_before_tax,
                         order_total_after_tax, order_date_time)
VALUES (:order_id, :order_date, :order_receiver_name, :order_receiver_adress, :order_total_before_tax,
                         :order_total_after_tax, :order_date_time)
");
    $statement->execute(
array(
        ':order_id' => trim($_POST)["order_id"],
        ':order_date' => trim($_POST)["order_date"],
        ':order_receiver_name' => trim($_POST)["order_receiver_name"],
        ':order_receiver_adress' => trim($_POST)["order_receiver_adress"],
        ':order_total_before_tax' => $order_total_before_tax,
        ':order_total_tax' => $order_total_tax,
        ':order_total_after_tax' => $order_total_after_tax,
        ':order_date_time' => date ("Y-M-D")
)
    );

    $statement=$connect->query("SELECT LAST_INSERT_ID()");
    $order_id=$statement->fetchColumn();
    for ($count = 0; $count<$_POST["total_item"]; $count++)
    {
        $order_total_before_tax = $order_total_before_tax + floatval(trim(["order_item_actual_amount"][$count]));

        $order_total_tax = $order_total_tax + floatval(trim(["order_item_tax_amount"][$count]));

        $order_total_after_tax = $order_total_after_tax + floatval(trim(["order_item_final_amount"][$count]));

        $statement = $connect->prepare("
INSERT INTO order_item (item_id, order_id, item_name, item_quantity, item_price,
                        item_tax_rate, item_tax_amount, item_final_amount)
VALUES (:item_id, :order_id, :item_name, :item_quantity, :item_price,
                         :item_tax_rate, :item_tax_amount, item_final_amount)
");
        $statement->execute(
            array(
                ':item_id' => trim($_POST)["item_id"][$count],
                ':order_id' => trim($_POST)["order_id"][$count],
                ':item_name' => trim($_POST)["item_name"][$count],
                ':item_quantity' => trim($_POST)["item_quantity"][$count],
                ':item_price' => trim($_POST)["item_price"][$count],
                ':item_tax_rate' => trim($_POST)["item_tax_rate"][$count],
                ':item_tax_amount' => trim($_POST)["item_tax_amount"][$count],
                ':item_final_amount' => trim($_POST)["item_final_amount"][$count]));

    }

    header("location:invoice.php");
}

?>


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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="../bootstrap/js/jquery-3.6.0.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="../bootstrap/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/datepicker.css">

</head>
<body>
<div class="container-fluid">
    <?php
    if (isset($_GET["Add"]))
    {
    ?>
        <form action="" method="post" id="invoice_form">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" align="center"> <h2 style="margin-top: 10.5px"> Create Invoice </h2> </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <div class="row">
                                <div class="col-md-8">
                                    To, <br>
                                    <b> Receive (Bill To)</b> <br>
                                    <input type="text" name="order_receiver_name" id="order_receiver_name"
                                    class="form-control input-group-sm" placeholder="* Enter Receiver Name"
                                    >
                                    <textarea name="order_receiver_adress" id="order_receiver_adress" cols="30" rows="10" class="form-control"
                                              placeholder="* Enter Billing Address">

                                    </textarea>
                                </div>
                                <div class="col-md-4">
                                    Reverse Charge <br>
                                    <input type="text" name="order_id" id="order_id" class="form-control input-group-sm"
                                    placeholder="Enter Invoice No.">
                                    <input type="text" name="order_date" id="order_date" class="form-control input-group-sm" placeholder="* Select Invoice Date">
                                </div>
                            </div>
                            <table class="table table-bordered" id="invoice-item-table">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th colspan="2">Tax Rate</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    
                                </tr>
                                <tr>
                                    <td> <span id="sr_no"> 1</span> </td>
                                    <td><input type="text" name="item_name[]" id="item_name1" class="form-control"></td>
                                    <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" class="form-control input-group-sm order_item_quantity" data-srno="1"></td>
                                    <td><input type="text" name="order_item_price[]" id="order_item_price1" class="form-control input-group-sm number_only order_item_price" data-srno="1"></td>
                                    <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" class="form-control input-group-sm order_item_actual_amount" data-srno="1"></td>
                                    <td><input type="text" name="order_item_tax_rate[]" id="order_item_tax_rate1" class="form-control input-group-sm number_only order_item_tax_rate" data-srno="1"></td>
                                    <td><input type="text" name="order_item_tax_amount[]" id="order_item_tax_amount1" class="form-control input-group-sm order_item_tax_amount" data-srno="1"></td>
                                    <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" class="form-control input-group-sm order_item_final_amount" data-srno="1"></td>

                                </tr>
                            </table>
                            <div align="center">
                                <button type="button" name="add_row" id="add_row" class="btn btn-success"></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> <b>Total</b> </td>
                        <td align="right"> <b> <span id="final_total_amount"></span> </b> </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="total_item" id="total_item" value="1">
                            <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-primary"
                            value="Create"
                            >
                        </td>
                    </tr>
                </table>
            </div>
        </form>

<!--  J-Query Scripts for Adding and Removing Rows      -->

        <script>
            $(document).read(function (){
                var final_total_amt =$('#final_total_amount').text();
                var count = 1;
                $ (document).on('click', '#add_row', function (){
                    count = count +1;
                    $('#total_item').val(count);
                    var html_code ='';
                    html_code += '<tr id="row_id '+count+'">';
                    html_code += ' <td> <span id="sr_no '+count+'"></span></td>';
                    html_code += ' <td> <input type="text" name="item_name[]" id="item_name '+count+'" class="form-control input-group-sm"></td>';
                    html_code += ' <td> <input type="text" name="order_item_quantity[]" id="item_name '+count+'" class="form-control input-group-sm"></td>';
                   html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity1 '+count+'" class="form-control input-group-sm order_item_quantity" data-srno="1"></td>';
                   html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price1 '+count+'" class="form-control input-group-sm number_only order_item_price" data-srno="1"></td>';
                    html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1 '+count+'" class="form-control input-group-sm order_item_actual_amount" data-srno="1"></td>';
                  html_code += '<td><input type="text" name="order_item_tax_rate[]" id="order_item_tax_rate1 '+count+'" class="form-control input-group-sm number_only order_item_tax_rate" data-srno="1"></td>';
                    html_code += '<td><input type="text" name="order_item_tax_amount[]" id="order_item_tax_amount1 '+count+'" class="form-control input-group-sm order_item_tax_amount" data-srno="1"></td>';
                    html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1 '+count+'" class="form-control input-group-sm order_item_final_amount" data-srno="1"></td>';
               html_code += '<button type="button" name="remove_row" id=" '+count+'" class="btn btn-danger remove_row"></button>';
               $('#invoice-item-table'). append(html_code);
                });
                $ (document).on('click', '.remove_row', function (){
                 var row_id= $(this). attr("id");
                 var total_item_amount = $('#order_item_final_amount1' + row_id).val();
                 var final_amount = $('#final_total_amount').text();
                 var result_smount = parseFloat(final_amount) - parseFloat(total_item_amount);
                 $('#final_total_amount') .text(result_smount);
                 $('#row_id' +row_id).remove();
                 count --;
                 $('#total_item').val(count);
                });

// J-QUERY SCRIPT FOR CALCULATIONS

             function cal_final_total(count)
             {
                 var final_item_total = 0;
                 for (j=1; j<=total; j++)
                 {
                     var quantity =0;
                     var price = 0;
                     var actual_amount= 0;
                      var tax_rate = 0;
                      var tax_amount=0;
                      quantity = $('#order_item_quantity1' +j) .val();
                      if (quantity > 0)
                      {
                          price = $('#order_item_price' +j) .val();
                          if (price > 0)
                          {
                              actual_amount = parseFloat(quantity) * parseFloat(price);
                              $('#order_item_actual_amount1' +j). val(actual_amount);
                              tax_rate = $('#order_item_tax_rate1' +j).val();
                              if (tax_rate >0 )
                              {
                                  tax_amount = parseFloat(actual_amount) * parseFloat(tax_rate)/100;
                                  $('#order_item_tax_amount1' +j).val(tax_amount);
                              }
                              final_item_total = parseFloat(actual_amount) + parseFloat(tax_amount);

                          }
                      }
                 }
                $('#final_total_amount').text(final_item_total);

             }

             $(document).on('blur', '.order_item_price', function (){

                 cal_final_total(count);
                });
            $(document).on('blur', '.order_item_tax_rate', function () {
                cal_final_total(count); // This Function Calculates Tax  Amount
            });
            $('#create_invoice').click( function (){
                if ($.trim( $('#order_receiver_name'). val()).length==0
                )
                {
                    alert("Please Enter Receiver Name");
                    return false
                }
                if ($.trim( $('#order_no'). val()).length==0
                )
                {
                    alert("Please Enter Invoice Number");
                    return false
                }
                if ($.trim( $('#order_date'). val()).length==0
                )
                {
                    alert("Please Select Invoice Date");
                    return false
                }

                for (var no=1; no<=count; no++)
                {
                    if ($.trim($('#item_name1' +no ).val()).length == 0)
                    {
                        alert("Please Enter Item Name");
                       $('#item_name1' + no).focus();
                       return false;
                    }
                    if ($.trim($('#order_item_quantity' +no ).val()).length == 0)
                    {
                        alert("Please Enter Quantity");
                        $('#order_item_quantity' + no).focus();
                        return false;
                    }
                    if ($.trim($('#order_item_price' +no ).val()).length == 0)
                    {
                        alert("Please Enter Price");
                        $('#order_item_price' + no).focus();
                        return false;
                    }

                }
                $('#invoice_form').submit();

            });


            });

        </script>
        <?php
        }
    else{
    ?>

    <h3> Invoice List </h3>
    <hr>
    <div align="right">
        <a href="invoice.php?add=1" class="btn btn-info btn-xs"> Create</a>
        
    </div>

        <table id="data-table" class="table table-bordered table-striped">

            <tr>
                <th>Invoice No</th>
                <th>Invoice Date</th>
                <th>Receiver Name</th>
                <th>Invoice Total</th>
                <th>PDF</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <?php
            if ($total_rows >0){
                foreach ($all_result as $row ){
                    echo '
                    <tr>
                    <td> '.$row['order_date'].' </td>
                    <td> '.$row['order_receiver_name'].' </td>
                    <td> '.$row['order_receiver_address'].' </td>
                    <td> '.$row['order_total_before_tax'].' </td>
                    <td> '.$row['order_date_time'].' </td>
                    <td> <a href="print_invoice.php?pdf=1&id= '.$row['order_id'].'"></a> PDF </td>
                    <td> <a href="print_invoice.php?pdf=1&id= '.$row['order_id'].'"> <span class="glyphicon glyphicon-edit"></span></a> PDF </td>
                    <td> <a href="print_invoice.php?pdf=1&id= '.$row['order_id'].'"> <span class="glyphicon glyphicon-delete"></span></a> PDF </td>
                    
                    
</tr>
                    ';
                }
            }
            ?>
        </table>

    <?php
    }
    ?>
        <br>
        <footer class="container-fluid text-center">
            <p> Footer Text </p>
        </footer>
    </div>
</div>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function (){
        var table = $('#data-table'). DataTable();
    });
</script>
