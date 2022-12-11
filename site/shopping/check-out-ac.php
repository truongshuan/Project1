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
    $ngay_dat = date_format(date_create(), 'Y-m-d');
    $ma_km = mysqli_real_escape_string($con, $_POST['ma_km']);
    $tong_tien = (float)$tong_tienn;
    if ($ma_kh == "") {
        $sql = "INSERT INTO hoa_don(email,sdt,dia_chi,ngay_dat,tong_tien,ma_kh,ma_km,trang_thai) VALUES('$email','$sdt','$dia_chi','$ngay_dat','$tong_tien','$ma_kh',NULL,0)";
    } else {
        $sql = "INSERT INTO hoa_don(email,sdt,dia_chi,ngay_dat,tong_tien,ma_kh,ma_km,trang_thai) VALUES('$email','$sdt','$dia_chi','$ngay_dat','$tong_tien','$ma_kh','$ma_km',0)";
    }
    $query = mysqli_query($con, $sql);
    if ($query) {
        $ma_hd = mysqli_insert_id($con);
        foreach ($cart as $value) {
            mysqli_query($con, "INSERT INTO chi_tiet_hoa_don(ma_hd,ma_hh,so_luong,gia_tien) VALUES('$ma_hd','$value[ma_hh]','$value[quality]','$value[don_gia]')");
        }
    }
    unset($_SESSION['cart']);
    header('location: ../product.php');
    // echo 'concac';
    // echo '<pre>';
    // print_r($_POST);
    // var_dump(is_float($tong_tien));
    // var_dump(is_string($tong_tien));
}