<!-- Register -->
<?php
session_start();
require_once '../../admin/connection.php';
$email = "";
$name = "";
$errors = array();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// new
// require 'vendor/autoload.php';
// 
require "../../PHPMailer/src/SMTP.php";
require "../../PHPMailer/src/Exception.php";
require "../../PHPMailer/src/PHPMailer.php";
$mail = new PHPMailer(true);

// Register
if (isset($_POST['register'])) {
    $ma_kh = mysqli_real_escape_string($con, $_POST['ma_kh']);
    $ten_kh = mysqli_real_escape_string($con, $_POST['ten_kh']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mat_khau = mysqli_real_escape_string($con, $_POST['mat_khau']);
    $cmat_khau = mysqli_real_escape_string($con, $_POST['mat_khau_con']);
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($avatar_tmp, '../../uploads/' . $avatar);
    if ($ma_kh == '' || $ten_kh == '' || $email == '' || $mat_khau == '' || $cmat_khau == '' || $avatar == '') {
        $errors['null'] = "Please fill form register!";
    } elseif ($mat_khau !== $cmat_khau) {
        $errors['mat_khau'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM khach_hang WHERE email  = '$email' AND ma_kh = '$ma_kh'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email and Username are already exist!";
    }
    if (count($errors) === 0) {
        $en_mat_khau = password_hash($mat_khau, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO khach_hang (ma_kh,ten_kh,mat_khau,avatar,email,trang_thai,code)
                        values('$ma_kh', '$ten_kh', '$en_mat_khau', '$avatar', '$email','$status','$code')";
        $data_check = mysqli_query($con, $insert_data);
        if ($data_check) {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "xuanptpc04031@fpt.edu.vn";
            if ($mail) {
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $mat_khau;
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->IsSMTP(); // telling the class to use SMTP
                $mail->SMTPAuth = true; // enable SMTP authentication
                $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
                $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                $mail->Port = 465; // set the SMTP port for the GMAIL server
                $mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
                $mail->Password = "Shuan0310."; // GMAIL password
                $mail->AddAddress($email);
                $mail->SetFrom($sender, 'Admin: Shuandz');
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->Send();
                header('location: user-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}
//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM khach_hang WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE khach_hang SET code = $code, trang_thai = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $ma_kh;
            $_SESSION['email'] = $email;
            header('location: ../index.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['mat_khau']);
    $check_email = "SELECT * FROM khach_hang WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['mat_khau'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['trang_thai'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ../index.php');
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM khach_hang WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE khach_hang SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "xuanptpc04031@fpt.edu.vn";
            if ($mail) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->IsSMTP(); // telling the class to use SMTP
                $mail->SMTPAuth = true; // enable SMTP authentication
                $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
                $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                $mail->Port = 465; // set the SMTP port for the GMAIL server
                $mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
                $mail->Password = "Shuan0310."; // GMAIL password
                $mail->AddAddress($email);
                $mail->SetFrom($sender, 'Admin: Shuandz');
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->Send();
                header('location: reset-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}
//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM khach_hang WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['mat_khau']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cmat_khau']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE khach_hang SET code = $code, mat_khau = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: login.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
?>