<?php 
require_once "Mail.php";
$errors = array();

//===============if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $password = mysqli_real_escape_string($con, $_POST['userpass']);
    $mobile = $_POST['phone'];
    $mobileCode = $_POST['phonecode'];
    $countryname = $_POST['contryname'];
    $birthdate = $_POST['birthdate'];
    $time = date('d m Y h:i:s A');
    $update= null; 
    $u_status = 1;

    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, password, country, countrycode, mobile, dob, vcode, vstatus, createtime, updatetime, u_status)
                        values('$name', '$email', '$encpass', '$countryname', '$mobileCode', '$mobile', '$birthdate', '$code', '$status', '$time', '$update', '$u_status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){

            $subject = "Email new Verification Code";
            $message = "Your new verification code is $code";
            $number = $mobileCode.$mobile;                
            $sms = send_sms($number,$message);
            $mail = send_mail($email, $subject, $message); 
            if($mail || $sms){
                $info = "We've sent a verification code to your email - $email & $number";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                //header('location: user-otp.php');
                header('location: dashboard.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while sign up please fill all fields!";
        }
    }

}

 //==========if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE vcode = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['vcode'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET vcode = $code, vstatus = '$status' WHERE vcode = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['info'] = "verified";
                header('location: dashboard.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }


      //=======if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $check_email) or die("Connection failed");
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $status = $fetch['vstatus'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location:'. $_GET["continue"]);
                    //echo "<script>history.go(-1);</script>";
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: dashboard.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }


    //========if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $time = date('d m Y h:i:s A');
        $run_sql = mysqli_query($con, $check_email);
        $fetch = mysqli_fetch_assoc($run_sql);
        $fetch_m_code = $fetch['countrycode'];
        $fetch_m_num = $fetch['mobile'];

        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET vcode = '$code', updatetime = '$time' WHERE email = '$email'";
            echo $insert_code;
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
            $subject = "Forgot password Verification Code";
            $message = "Forgot password verification code is $code";
            $number = $fetch_m_code.$fetch_m_num;                 
            $sms = send_sms($number,$message);
            $mail = send_mail($email, $subject, $message); 
            if($mail || $sms){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset_code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }


    //============if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE vcode = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new_password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!"; 
        }
    }

       //=========if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $time = date('d m Y h:i:s A');
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET vcode = '$code', password = '$encpass', updatetime = '$time' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                $_SESSION['password'] = $password;
                header('Location: dashboard.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

?>