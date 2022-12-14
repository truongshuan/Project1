<?php
require_once 'pdo.php';

function bai_viet_insert($tieu_de, $ngay_dang, $noi_dung_bv, $anh_bv, $ma_ad)
{
    $sql = "INSERT INTO bai_viet(tieu_de, ngay_dang, noi_dung_bv, anh_bv, ma_ad) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $tieu_de, $ngay_dang, $noi_dung_bv, $anh_bv, $ma_ad);
}

function bai_viet_update($ma_bv, $tieu_de, $noi_dung_bv, $anh_bv)
{
    $sql = "UPDATE bai_viet SET tieu_de=?,noi_dung_bv=?,anh_bv=? WHERE ma_bv=?";
    pdo_execute($sql, $tieu_de, $noi_dung_bv, $anh_bv, $ma_bv);
}

function bai_viet_delete($ma_bv)
{
    $sql = "DELETE FROM bai_viet WHERE  ma_bv=?";
    if (is_array($ma_bv)) {
        foreach ($ma_bv as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bv);
    }
}

function bai_viet_select_all($start, $limit)
{
    $sql = "SELECT * FROM bai_viet INNER JOIN admin ON bai_viet.ma_ad = admin.ma_ad ORDER BY ma_bv ASC LIMIT $start, $limit";
    return pdo_query($sql);
}
function bai_viet_select_id($ma_bv)
{
    $sql = "SELECT * FROM bai_viet INNER JOIN admin ON bai_viet.ma_ad = admin.ma_ad WHERE ma_bv = ?";
    return pdo_query_one($sql, $ma_bv);
}
function bai_viet_key($keyword, $start, $limit)
{
    $sql = "SELECT * FROM bai_viet INNER JOIN admin ON bai_viet.ma_ad = admin.ma_ad WHERE tieu_de  LIKE '%$keyword%' ORDER BY ma_bv ASC LIMIT $start, $limit ";
    return pdo_query($sql);
}