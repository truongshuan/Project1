<?php
require_once 'pdo.php';

function hoa_don_select_all()
{
    $sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd ORDER BY hoa_don.ma_hd ASC ";
    return pdo_query($sql);
}