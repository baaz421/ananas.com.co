<?php
//login-ajax-files/forgot-password.php
session_start();
require_once "../db_connnection.php";

 
	$email = mysqli_real_escape_string($conn, $_POST['f_u_email']);
	$check_email = "SELECT * FROM users WHERE email='$email'";
	$time = $date;
	$run_sql = mysqli_query($conn, $check_email);
	$fetch = mysqli_fetch_assoc($run_sql);
	$fetch_m_code = $fetch['countrycode'];
	$fetch_m_num = $fetch['mobile'];
	if(mysqli_num_rows($run_sql) > 0){
	    $code = rand(999999, 111111);
	    $insert_code = "UPDATE users SET vcode = '$code', updatetime = '$time' WHERE email = '$email'";
	    //echo $insert_code;
	    $run_query =  mysqli_query($conn, $insert_code);
	    if($run_query){
	    //$subject = "Forgot password Verification Code";
	    //$message = "Forgot password verification code is $code";
	    //$number = $fetch_m_code.$fetch_m_num;                 
	    //$sms = send_sms($number,$message);
	    //$mail = send_mail($email, $subject, $message); 
	    // if($mail || $sms){
	    //         $info = "We've sent a passwrod reset otp to your email - $email";
	    //         $_SESSION['info'] = $info;
	    //         $_SESSION['email'] = $email;
	    //         header('location: reset_code.php');
	    //         exit();
	    //     }else{
	    //         $errors['otp-error'] = "Failed while sending code!";
	    //     }
	    	$_SESSION['u_email'] = $email;


	    echo 3; // redirect to verifying code page
	    }else{
	        echo 1; // Something went wrong!
	    }
	}else{
	   echo 2 ; //This email address does not exist!
	}
