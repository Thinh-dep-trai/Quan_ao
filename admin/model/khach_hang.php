<?php

// Kết nối database 
//require_once 'database.php';
require_once "./../database/database.php";
// Lấy tất cả danh mục
function getAllKhachHang() {
    $sql = "SELECT * FROM khach_hang";
    $result = query($sql);
    return $result;
}

// Lấy chi tiết khách hàng theo id
function getKhachHangById($id) {
    $sql = "SELECT * FROM khach_hang WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

// Thêm mới khách hàng
function createKhachHang($ten, $email, $so_dien_thoai, $dia_chi) {
    $sql = "INSERT INTO khach_hang(ten, email, so_dien_thoai,dia_chi) 
          VALUES ('$ten', '$email', '$so_dien_thoai', '$dia_chi')";
    execute($sql);
}

// Cập nhật khách hàng
function updateKhachHang($id, $ten, $email, $so_dien_thoai, $dia_chi) {
    $sql = "UPDATE khach_hang SET ten = '$ten', email= '$email', so_dien_thoai='$so_dien_thoai', dia_chi='$dia_chi'  WHERE id = $id";
    execute($sql);
}

// Xóa khách hàng
function deleteKhachHang($id) {
    $sql = "DELETE FROM khach_hang WHERE id = $id";
    execute($sql);
}
