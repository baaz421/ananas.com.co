<!-- mail-sms-function.php -->
<?php

require "Mail.php";
$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
$file_directry_main_app ="main-app";
$file_directry_includes ="includes";

if (in_array($file_directry_includes,$ex_link)) {
  $file_back= "../../";
}elseif (in_array($file_directry_main_app,$ex_link)) {
  $file_back= "../";
}else{
  $file_back= "";
}
require_once $file_back."config.php";

//========== sending sms function ==========//

function api_sms_message ($url) {
        $ch = curl_init( );
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );
        $output = array();
        $output['server_response'] = curl_exec( $ch );
        $curl_info = curl_getinfo( $ch );
        $output['http_status'] = $curl_info[ 'http_code' ];
        $output['error'] = curl_error($ch);
        curl_close( $ch );
        return $output;
    }
function send_sms($num,$msg){
        $msg = urlencode($msg);
        $result = api_sms_message(
            "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=imh662&passwd=Juman@05&mobilenumber=$num&message=".$msg."&DR=Y&Sid=Qgifts&Mtype=LNG");
        if ($result['http_status'] != 200) {
            return false;
        }
        //echo"msg sent successfully to $num";
    }
//========= sending sms function close here ===========//


 //========= sending email function start here ===========//

function send_mail($to,$subject,$body){

global $from_address, $email_host, $email_port, $email_username, $email_password;
// $from_address = "baaztest421@gmail.com";
// $email_host = "ssl://smtp.gmail.com";
// $email_port = "465";
// $email_username = 'baaztest421@gmail.com';
// $email_password = 'cycompcy421';
$headers = array ('From' => $from_address, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp', array 
                            (
                            'host' => $email_host,
                            'port' => $email_port,
                            'auth' => true,
                            'socket_options' => array('ssl' => array('verify_peer_name' => false, 'allow_self_signed' => true)),
                            'username' => $email_username,
                            'password' => $email_password,
                            'validation' => true,
                            'protocol' => 'mail'
                            )
                        );
// return $smtp->send($to, $headers, $body);

$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
echo($mail->getMessage());
} else {
echo("Message successfully sent!\n");
}
}

//==========================================================================
// echo "this is function";
// echo $from_address;
// echo $email_host;
// echo $email_port;
$email = "baazdesigner@gmail.com";
$sub = "check function mail";
$msg = "this is for test email from fuction";
send_mail($email,$sub,$msg);
// if($mail){
//     echo "sent";
// }else{
//     echo "not send";
// }

// ========================== send mail code =======================================//



// $to_email = "baazdesigner@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi,nn This is test email send by PHP Script";
// $headers = "From: sender\'s email";

// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }

//phpinfo();


?>