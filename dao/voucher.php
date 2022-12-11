<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function voucher_insert($ten_km, $mo_ta, $ngay_bat_dau, $ngay_ket_thuc, $code, $discount)
{
    $sql = "INSERT INTO khuyen_mai(ten_km,mo_ta,ngay_bat_dau,ngay_het_han,code,giam_gia) VALUES(?,?,?,?,?,?)";
    pdo_execute($sql, $ten_km, $mo_ta, $ngay_bat_dau, $ngay_ket_thuc, $code, $discount);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function voucher_update($ma_km, $ten_km, $mo_ta, $ngay_bat_dau, $ngay_ket_thuc, $code, $discount)
{
    $sql = "UPDATE khuyen_mai SET ten_km=?,mo_ta=?,ngay_bat_dau=?,ngay_het_han=?,code=?,giam_gia=? WHERE ma_km=?";
    pdo_execute($sql, $ten_km, $mo_ta, $ngay_bat_dau, $ngay_ket_thuc, $code, $ma_km, $discount);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function voucher_delete($ma_km)
{
    $sql = "DELETE FROM khuyen_mai WHERE ma_km=?";
    if (is_array($ma_km)) {
        foreach ($ma_km as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_km);
    }
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function voucher_select_all($start, $limit)
{
    $sql = "SELECT * FROM khuyen_mai ORDER BY ma_km LIMIT $start,$limit";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function voucher_select_by_id($ma_km)
{
    $sql = "SELECT * FROM khuyen_mai WHERE ma_km=?";
    return pdo_query_one($sql, $ma_km);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function voucher_select_by_name_or_code($keyword)
{
    $sql = "SELECT * FROM khuyen_mai WHERE ten_km  LIKE '%$keyword%' OR code  LIKE '%$keyword%'";
    return pdo_query($sql);
}