<?php
require_once 'pdo.php';

function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}

function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
}

function binh_luan_delete($ma_bl)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}

function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan bl ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}

function binhluan($ma_hh)
{
    $sql = "SELECT * FROM binh_luan INNER JOIN khach_hang ON binh_luan.ma_kh = khach_hang.ma_kh WHERE ma_hh=?";
    return pdo_query($sql, $ma_hh);
}
function phan_hoi($ma_bl)
{
    $sql = "SELECT * FROM phan_hoi INNER JOIN binh_luan ON phan_hoi.ma_bl = binh_luan.ma_bl INNER JOIN khach_hang ON phan_hoi.ma_kh = khach_hang.ma_kh WHERE phan_hoi.ma_bl=?";
    return pdo_query($sql, $ma_bl);
}

function binh_luan_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM binh_luan INNER JOIN khach_hang ON binh_luan.ma_kh = khach_hang.ma_kh WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}

function binh_luan_exist($ma_bl)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
//-------------------------------//
function binh_luan_select_by_hang_hoa($ma_hh)
{
    $sql = "SELECT * FROM binh_luan INNER  JOIN khach_hang ON binh_luan.ma_kh=khach_hang.ma_kh INNER  JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh WHERE binh_luan.ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
}
function binh_luan_select_by_hang_hoa_hinh($ma_hh)
{
    $sql = "SELECT * FROM binh_luan INNER  JOIN khach_hang ON binh_luan.ma_kh=khach_hang.ma_kh  WHERE binh_luan.ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
}
// function count_comment($ma_hh)
// {
//     $sql = "SELECT COUNT(binh_luan.ma_hh) AS 'quality' FROM `binh_luan` INNER JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh WHERE binh_luan.ma_hh =? GROUP BY binh_luan.ma_hh";
//     return pdo_query($sql, $ma_hh);
// }