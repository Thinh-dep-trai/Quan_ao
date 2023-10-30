<?php

// Kết nối CSDL
require_once './../database/database.php';

// Lấy tất cả đơn hàng
function getAllDonHang() {
    $sql = "SELECT don_hang.*, khach_hang.ten AS ten_khach_hang, san_pham.ten AS ten_san_pham
            FROM don_hang
            INNER JOIN khach_hang ON don_hang.khach_hang_id = khach_hang.id
            INNER JOIN san_pham ON don_hang.san_pham_id = san_pham.id";

    $result = query($sql);
    return $result;
}

// Lấy chi tiết đơn hàng theo id
function getDonHangById($id) {
    $sql = "SELECT * FROM don_hang WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

// Thêm mới đơn hàng
//function createDonHang($khach_hang_id, $san_pham_id, $so_luong, $gia, $tong_gia, $trang_thai) {
//    $sql = "INSERT INTO don_hang(khach_hang_id, san_pham_id, so_luong, gia, tong_gia, trang_thai) 
//          VALUES ($khach_hang_id, $san_pham_id, $so_luong, $gia, $tong_gia, '$trang_thai')";
//
//    execute($sql);
//}
// Thêm mới đơn hàng
function createDonHang($khach_hang_id, $san_pham_id, $so_luong, $gia, $tong_gia, $trang_thai) {

    // Thêm bản ghi đơn hàng
    $sql = "INSERT INTO don_hang(khach_hang_id, san_pham_id, so_luong, gia, tong_gia, trang_thai) 
            VALUES ($khach_hang_id, $san_pham_id, $so_luong, $gia, $tong_gia, '$trang_thai')";

    // Lấy id vừa insert
    $don_hang_id = executeReturnLastId($sql);

    // Thêm bản ghi chi tiết đơn hàng
    createDonHangChiTiet($don_hang_id, $san_pham_id, $so_luong, $gia);
}

// Hàm thêm chi tiết đơn hàng 
function createDonHangChiTiet($don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "INSERT INTO don_hang_chi_tiet(don_hang_id, san_pham_id, so_luong, gia) 
            VALUES ($don_hang_id, $san_pham_id, $so_luong, $gia)";

    execute($sql);
}

// Cập nhật đơn hàng
function updateDonHang($id, $khach_hang_id, $san_pham_id, $so_luong, $gia, $tong_gia, $trang_thai) {
    $sql = "UPDATE don_hang SET khach_hang_id = $khach_hang_id, "
            . "san_pham_id = $san_pham_id, "
            . "so_luong = $so_luong, "
            . "gia = $gia, "
            . "tong_gia = $tong_gia,"
            . "trang_thai = '$trang_thai' "
            . "WHERE id = $id";

    execute($sql);
}

// Xóa đơn hàng
function deleteDonHang($id) {
    $sql = "DELETE FROM don_hang WHERE id = $id";
    execute($sql);
}

//Lấy id khách hàng để select combo
function getIdKhachHang() {
    $sql = "SELECT id, ten FROM khach_hang";
    $result = query($sql);
    return $result;
}

//Lấy id sản phẩm để select combo
function getIdSanPham() {
    $sql = "SELECT id, ten FROM san_pham";
    $result = query($sql);
    return $result;
}

//lấy giá của sản phẩm qua đơn hàng

function getGiaSanPham() {
    $sql = "SELECT id, ten, gia FROM san_pham";
    $result = query($sql);
    return $result;
}

//copy từ mmodel don_hang_chi_tiet
function getIDDH($id) {
    $sql = "SELECT * FROM don_hang_chi_tiet WHERE id LIKE ?";
    $params = array("%$id%"); // Sử dụng `%` để tìm kiếm tên một phần
    $result = query($sql, $params);
    return $result;
}
