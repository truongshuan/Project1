<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function loai_insert($ten_loai, $trang_thai)
{
    $sql = "INSERT INTO loai(ten_loai,trang_thai) VALUES(?,?)";
    pdo_execute($sql, $ten_loai, $trang_thai);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function loai_update($ma_loai, $ten_loai, $trang_thai)
{
    $sql = "UPDATE loai SET ten_loai=?,trang_thai=? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $trang_thai, $ma_loai);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function loai_delete($ma_loai)
{
    $sql = "DELETE FROM loai WHERE ma_loai=?";
    if (is_array($ma_loai)) {
        foreach ($ma_loai as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_loai);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function loai_query()
{
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}
function loai_select_all($start, $limit)
{
    $sql = "SELECT * FROM loai ORDER BY ma_loai ASC LIMIT $start,$limit";
    return pdo_query($sql);
}
function loai_select_sold_out()
{
    $sql = "SELECT * FROM loai WHERE trang_thai = 2";
    return pdo_query($sql);
}

/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM loai WHERE ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_loai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($ma_loai)
{
    $sql = "SELECT count(*) FROM `loai` WHERE ma_loai=?";
    return pdo_query_value($sql, $ma_loai) > 0;
}
function select_loai()
{
    $sql = "SELECT ten_loai,COUNT(hang_hoa.ma_loai) AS 'sl' FROM loai INNER JOIN hang_hoa ON loai.ma_loai = hang_hoa.ma_loai GROUP BY ten_loai,hang_hoa.ma_loai;
    ";
    return pdo_query($sql);
}