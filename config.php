<?php
//include('Mail.php');
// ============== time zone for qatar ========================//

 date_default_timezone_set("Asia/Qatar");
 date_default_timezone_get();
 $date = date("d-m-Y H:i");


// ============== time zone for qatar ========================//

// ============== time zone for all over the world ========================//

// //this is time zone for all countries 
// $ip = "89.211.108.47";  
// // $ip = $_SERVER['REMOTE_ADDR'];
// $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
// $ipInfo = json_decode($ipInfo);
// $timezone = $ipInfo->timezone;
// date_default_timezone_set($timezone);
// echo date_default_timezone_get();
// echo date('Y/m/d H:i:s')."<br>";


// ============== time zone for all over the world  ========================//

// =============== ERROR REPORTING ENABLE OR DISABLE ============== //
	// just comment disable it will work if no enable comment 

//error_reporting(0);

// =============== DATABASE CONNECTION CONFIGURATION ============== //

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "qegmolla");

// ========================== END =============================== //

// =============== EMAIL CONNECTION CONFIGURATION ============== //
@$from_address = "baaztest421@gmail.com";
// @$email_host = "ssl://smtp.gmail.com";
// @$email_host = "tls://smtp.gmail.com";
@$email_host = "smtp.gmail.com";
@$email_port = "465";
// @$email_port = "587";
@$email_username = 'baaztest421@gmail.com';
@$email_password = 'cycompcy421';

// ========================== END =============================== //

// ================  Host name or directry root ================//

$host_project_name = "http://localhost/molla/";

// ================  Host name or directry root end================//

?>