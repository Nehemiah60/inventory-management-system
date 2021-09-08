<?php
// Establish a Connection
$conn=mysqli_connect("localhost", "root","","inventory");
if (!$conn){
   die("Database Connection Error : ". mysqli_connect_error());
}
// SQL Query to Create Products Table
$sql="create table products(
    product_id varchar (255) not null,
    primary key (product_id),
    product_name varchar (255) not null,
    Category varchar (255) not null,
    Brand varchar (255) not null
)";




// Execute the SQL query above
if ($conn ->query($sql) == true){
    print "products table created successfully";
}
else{
    print "Table Exists";
}

mysqli_close($conn);
