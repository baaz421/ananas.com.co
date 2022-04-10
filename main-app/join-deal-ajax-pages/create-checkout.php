<?php
// create-checkout.php
session_start();
require_once "../db_connnection.php";

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
	$status  = 0;
	$coupon_per = 0;
	$check_row = "SELECT * FROM checkout WHERE user_id = {$user_id} AND status = {$status}";
	$run_check_row = mysqli_query($conn, $check_row);

	if(mysqli_num_rows($run_check_row) > 0){
		$fetch_order_id = mysqli_fetch_assoc($run_check_row);
		$_SESSION['checkout_id'] = $fetch_order_id['ID'];
		echo 1;
	}else{
		$create_row_checkout = "INSERT INTO checkout(user_id, coupon_per, status) VALUES('{$user_id}','{$coupon_per}','{$status}')";
		$run_create_row_checkout = mysqli_query($conn, $create_row_checkout);
		if($run_create_row_checkout){
			$last_id_get = mysqli_insert_id($conn);
			$_SESSION['checkout_id'] = $last_id_get;
			echo 1;
		}else{
			echo 2;
		}
	}
}else{
	echo 2;
}


