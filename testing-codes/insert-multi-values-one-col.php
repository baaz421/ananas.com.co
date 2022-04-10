<?php 
// insert-multi-values-one-col.php
session_start();

date_default_timezone_set("Asia/Qatar");
date_default_timezone_get();
$date = date("d-m-Y H:i");
echo $date."<br>";

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "qegmolla");
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}

echo $user_id."---This<br>";


$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
if(mysqli_num_rows($run_get_Cartlist) > 0){
  $pro_ids = array();
  $pro_qtys = array();
  while($row = mysqli_fetch_assoc($run_get_Cartlist)){
		
		$pro_id = $row['product_id'];
		$c_qty 	= $row['qty'];
		$c_id = $row['ID'];
		$p_amt = $row['unit_price'];
   		$total_amount = $row['total'];
		$p_s = 1;
		$pro_ids[]=  $pro_id;
		$pro_qtys[]= $c_qty;



		$get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
		$run_get_pro_details = mysqli_query($conn, $get_pro_detail);

		if(mysqli_num_rows($run_get_pro_details) > 0){
			$fetch_pro = mysqli_fetch_assoc($run_get_pro_details);

			$p_id = $fetch_pro['ID'];
			$p_name =$fetch_pro['product_name'];
			$link = "product-view.php?p_id=".$p_id;
			
			$img_path ="../All-Products-images/";
			$img_src = $img_path.$fetch_pro['image_0'];
			
			
		}


	}


}
echo "<pre>";
print_r($pro_ids);
print_r($pro_qtys);
$merg = array_combine($pro_ids,$pro_qtys);
print_r($merg);
print_r(array_keys($merg));
echo "</pre>";

 $im_arr = implode("-",$pro_ids);
 $im2_arr = implode("-",array_keys($merg));

 echo $im_arr;

 $exp_arr = explode("-",$im_arr);
 $exp2_arr = explode("-",$im2_arr);


echo "<pre>";
print_r($exp_arr);
print_r($exp2_arr);
echo "</pre>";

