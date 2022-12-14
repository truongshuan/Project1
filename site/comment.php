<?php
session_start();
require 'connection.php';

if (isset($_SESSION['id_product'])) {
    $ma_hh = $_SESSION['id_product'];
}
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email  = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $fetch_info = mysqli_fetch_assoc($result);
    }
    if (isset($_POST['add_comment'])) {
        $msg = mysqli_real_escape_string($con, $_POST['msg']);
        $ma_kh = $fetch_info['ma_kh'];
        $ma_hh = $_SESSION['id_product'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_bl = date_format(date_create(), 'Y-m-d');
        $sql = "INSERT INTO binh_luan(noi_dung,ngay_bl,ma_kh,ma_hh) VAlUES ('$msg','$ngay_bl','$ma_kh','$ma_hh')";
        $query = mysqli_query($con, $sql);
        echo 'true';
    }

    if (isset($_POST['add_reply'])) {
        $ma_bl = mysqli_real_escape_string($con, $_POST['ma_bl']);
        $noi_dung = mysqli_real_escape_string($con, $_POST['reply_msg']);
        $ma_kh = $fetch_info['ma_kh'];
        $ma_hh = $_SESSION['id_product'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_ph = date_format(date_create(), 'Y-m-d');
        $sql = "INSERT INTO phan_hoi(noi_dung_ph,ngay_ph,ma_kh,ma_bl,ma_hh) VAlUES ('$noi_dung','$ngay_ph','$ma_kh','$ma_bl','$ma_hh')";
        $query = mysqli_query($con, $sql);
        echo 'true';
    }
    if (isset($_POST['add_subreply'])) {
        $ma_bl = mysqli_real_escape_string($con, $_POST['cmt_id']);
        $noi_dung = mysqli_real_escape_string($con, $_POST['reply_msg']);
        $ma_kh = $fetch_info['ma_kh'];
        $ma_hh = $_SESSION['id_product'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_ph = date_format(date_create(), 'Y-m-d');
        $sql = "INSERT INTO phan_hoi(noi_dung_ph,ngay_ph,ma_kh,ma_bl,ma_hh) VAlUES ('$noi_dung','$ngay_ph','$ma_kh','$ma_bl','$ma_hh')";
        $query = mysqli_query($con, $sql);
        echo 'true';
    }
} else {
    if (isset($_POST['add_comment'])) {
        echo 'false';
    }
    if (isset($_POST['add_reply'])) {
        echo 'false';
    }
    if (isset($_POST['add_subreply'])) {
        echo 'false';
    }
}


if (isset($_POST['comment_load_data'])) {
    $comment_query = "SELECT * FROM binh_luan WHERE ma_hh = '$ma_hh' ";
    $query_run = mysqli_query($con, $comment_query);
    $array_result = [];
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            $ma_kh = $row['ma_kh'];
            $user_query = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh' LIMIT 1";
            $user_query_run = mysqli_query($con, $user_query);
            $user_result = mysqli_fetch_array($user_query_run);
            array_push($array_result, ['cmt' => $row, 'user' => $user_result]);
        }
        header('Content-type: application/json');
        echo json_encode($array_result);
    }
}

if (isset($_POST['view_comment_data'])) {
    $ma_bl = mysqli_real_escape_string($con, $_POST['cmt_id']);
    $query = "SELECT * FROM phan_hoi WHERE ma_bl= '$ma_bl'";
    $query_run = mysqli_query($con, $query);
    $result_array = [];
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            $ma_kh = $row['ma_kh'];
            $user_query = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh' LIMIT 1";
            $user_query_run = mysqli_query($con, $user_query);
            $user_result = mysqli_fetch_array($user_query_run);
            array_push($result_array, ['cmt' => $row, 'user' => $user_result]);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}