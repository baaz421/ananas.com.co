<?php 
// update-for-coupon.php
require_once "../db_connnection.php";



$coupon_per = $_POST['c_per'];
$checkout_id = $_POST['checkout_id'];


$insert_per_sql = "UPDATE checkout SET coupon_per = '{$coupon_per}' WHERE ID = '{$checkout_id}'";
mysqli_query($conn, $insert_per_sql);

echo $coupon_per;







