<?php
session_start();
require_once '../connection.php';
// $errors = array();
if (isset($_POST['apply'])) {
    $voucher = mysqli_real_escape_string($con, $_POST['voucher']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $ngay_nhap =  date_format(date_create(), 'Y-m-d');
    $check_voucher = "SELECT * FROM khuyen_mai WHERE code = '$voucher'";
    $res = mysqli_query($con, $check_voucher);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $start_date = $fetch['ngay_bat_dau'];
        $end_date = $fetch['ngay_het_han'];
        if ($ngay_nhap <= $start_date && $ngay_nhap < $end_date) {
            echo 'true';
        } else {
            echo 'false';
        }
    } else {
        $_SESSION['error_vou'] = "Coupon is not exists";
    }
}