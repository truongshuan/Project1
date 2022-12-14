<?php
session_start();
require '../connection.php';
require_once '../config_vnpay.php';
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

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
if (isset($_POST['redirect'])) {
    unset($_SESSION['cart']);
    $code_payment = $_POST['code_payment'];
    $sql = "SELECT * FROM hoa_don WHERE code_payment = '$code_payment'";
    $result = mysqli_query($con, $sql);
    $item = mysqli_fetch_assoc($result);
    $ma_hd = $item['ma_hd'];
    $tong_tien = $_POST['tong_tien'];
    $payment = $_POST['payment'];
    $email_user  = $_POST['email_user'];
    // thay doi trang  thai
    $update = "UPDATE hoa_don SET trang_thai = 2 WHERE ma_hd = '$ma_hd'";
    $query = mysqli_query($con, $update);

    // Send mail 
    if ($mail) {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $subject = "Email Thank For Payment!";
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
        $mail->Password = "Shuan0310.."; // GMAIL password
        $mail->AddAddress($email_user);
        $mail->SetFrom('xuanptpc04031@fpt.edu.vn', 'Admin: Shuandz');
        $mail->Subject = $subject;
        $mail->Body = 'Thank For You Payment Bill'
            . "\n"
            .  'Dear User,'
            . "\n"
            . 'Thank you so much for using Gettree service andd paying for your order by VNPay';
        $mail->addEmbeddedImage('../../content/client/img/logo.png', 'logo.png');
        $mail->Send();
    }
    if ($payment == 'vnpay') {
        $vnp_TxnRef = $item['ma_hd']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Payment this your bill";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = ($tong_tien * 23000) * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
if (isset($_POST['cancel'])) {
    unset($_SESSION['cart']);
    header('location: ../product.php');
}