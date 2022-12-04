<?php
require_once 'pdo.php';

function hang_hoa_insert($ten_hh, $don_gia, $hinh, $ngay_nhap, $mo_ta, $luot_xem, $dac_biet, $ma_loai)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, hinh, ngay_nhap , mo_ta , luot_xem , dac_biet , ma_loai) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $hinh, $ngay_nhap, $mo_ta, $luot_xem, $dac_biet, $ma_loai);
}

function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $hinh, $mo_ta, $luot_xem, $dac_biet, $ma_loai)
{
    $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,hinh=?,mo_ta=?,luot_xem=?,dac_biet=?,ma_loai=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $hinh, $mo_ta, $luot_xem, $dac_biet, $ma_loai, $ma_hh);
}

function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
    if (is_array($ma_hh)) {
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_hh);
    }
}

function hang_hoa_select_all($start, $limit)
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai ORDER BY hang_hoa.ma_hh ASC LIMIT $start,$limit";
    return pdo_query($sql);
}

function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa WHERE luot_xem > 0 ORDER BY luot_xem DESC LIMIT 0, 3";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=0";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function hang_hoa_select_page()
{
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai");
        // $_SESSION['page_count'] = ceil($row_count / 3);
    }
    if (exist_param("page_no")) {
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if ($_SESSION['page_no'] < 0) {
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if ($_SESSION['page_no'] >= $_SESSION['page_count']) {
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai ORDER BY ma_hh LIMIT " . $_SESSION['page_no'] . ", 3";
    return pdo_query($sql);
}