<?php
session_start();
require_once '../connection.php';
if (!empty($_GET['id'])) {
    $ma_hh = $_GET['id'];
}
$action = (isset($_GET['action']) ? $_GET['action'] : 'add');

$quality = (isset($_GET['quality'])) ? $_GET['quality'] : 1;
if ($quality <= 0) {
    $quality = 1;
}

$result = mysqli_query($con, "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE ma_hh = '$ma_hh'");
if ($result) {
    $product = mysqli_fetch_assoc($result);
}
$item = [
    'ma_hh' => $product['ma_hh'],
    'ten_hh' => $product['ten_hh'],
    'ten_loai' => $product['ten_loai'],
    'hinh' => $product['hinh'],
    'don_gia' => $product['don_gia'],
    'mo_ta' => $product['mo_ta'],
    'quality' => $quality
];

if ($action == 'add') {
    if (isset($_SESSION['cart'][$ma_hh])) {
        $_SESSION['cart'][$ma_hh]['quality'] += $quality;
        header('location: ../product.php');
    } else {
        $_SESSION['cart'][$ma_hh] = $item;
        header('location: ../product.php');
    }
}
if ($action == 'update') {
    $_SESSION['cart'][$ma_hh]['quality'] = $quality;
    $_SESSION['status'] = "Updated Cart Successfully";
    $_SESSION['status_code'] = "success";
    header('location: cart.php');
}
if ($action == 'delete') {
    unset($_SESSION['cart'][$ma_hh]);
    $_SESSION['status'] = "Deleted This Product Successfully";
    $_SESSION['status_code'] = "success";
    header('location: cart.php');
}