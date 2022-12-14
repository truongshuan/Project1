<?php
require_once 'pdo.php';

function hoa_don_select_all()
{
    $sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd WHERE hoa_don.trang_thai = 0 OR hoa_don.trang_thai = 1  ORDER BY hoa_don.ma_hd ASC ";
    return pdo_query($sql);
}
function hoa_don_select_trang_thai()
{
    $sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd WHERE hoa_don.trang_thai = 2 ORDER BY hoa_don.ma_hd ASC ";
    return pdo_query($sql);
}
function hoa_don_select_id($ma_hd)
{
    $sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd WHERE hoa_don.ma_hd =? ORDER BY hoa_don.ma_hd ASC  ";
    return pdo_query_one($sql, $ma_hd);
}

function hoa_don_update($ma_hd, $trang_thai)
{
    $sql = "UPDATE hoa_don SET trang_thai=? WHERE ma_hd=?";
    pdo_execute($sql, $trang_thai, $ma_hd);
}