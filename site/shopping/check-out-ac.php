<?php
session_start();
require_once '../connection.php';
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
if (isset($_POST['save_bill'])) {
    $ma_kh = mysqli_real_escape_string($con, $_POST['ma_kh']);
    $ten_kh = mysqli_real_escape_string($con, $_POST['ten_kh']);
    $sdt = mysqli_real_escape_string($con, $_POST['sdt']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $dia_chi = mysqli_real_escape_string($con, $_POST['dia_chi']);
    $tong_tienn = $_POST['tong_tien'];
    $code_payment = rand(0, 9999);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay_dat = date_format(date_create(), 'Y-m-d');
    $ma_km = mysqli_real_escape_string($con, $_POST['ma_km']);
    $tong_tien = (float)$tong_tienn;
    if ($ma_km == "") {
        $sql = "INSERT INTO hoa_don(email,sdt,dia_chi,ngay_dat,tong_tien,ma_kh,ma_km,trang_thai,code_payment) VALUES('$email','$sdt','$dia_chi','$ngay_dat','$tong_tien','$ma_kh',0,0,'$code_payment')";
    } else {
        $sql = "INSERT INTO hoa_don(email,sdt,dia_chi,ngay_dat,tong_tien,ma_kh,ma_km,trang_thai,code_payment) VALUES('$email','$sdt','$dia_chi','$ngay_dat','$tong_tien','$ma_kh','$ma_km',0,'$code_payment')";
    }
    $query = mysqli_query($con, $sql);
    if ($query) {
        $ma_hd = mysqli_insert_id($con);
        foreach ($cart as $value) {
            mysqli_query($con, "INSERT INTO chi_tiet_hoa_don(ma_hd,ma_hh,so_luong,gia_tien) VALUES('$ma_hd','$value[ma_hh]','$value[quality]','$value[don_gia]')");
        }
    }
    $_SESSION['bill_ma_kh'] = $ma_kh;
    $_SESSION['bill_ten_kh'] = $ten_kh;
    $_SESSION['bill_sdt'] = $sdt;
    $_SESSION['bill_dia_chi'] = $dia_chi;
    $_SESSION['bill_email'] = $email;
    $_SESSION['bill_tong_tien'] = $tong_tien;
    $_SESSION['bill_ma_km'] = $ma_km;
    $_SESSION['bill_ngay_dat'] = $ngay_dat;
    $_SESSION['bill_code'] = $code_payment;
    header('location: ../payment.php');
}