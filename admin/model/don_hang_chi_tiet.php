<?php

// Lấy toàn bộ dữ liệu chi tiết đơn hàng
function getAllChiTietDonHang() {
    $sql = "SELECT * FROM chi_tiet_don_hang";
    $result = query($sql);
    return $result;
}

// Lấy thông tin chi tiết đơn hàng theo ID
function getChiTietDonHangById($id) {
    $sql = "SELECT * FROM chi_tiet_don_hang WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

// Tạo một chi tiết đơn hàng mới
function createChiTietDonHang($don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "INSERT INTO chi_tiet_don_hang(don_hang_id, san_pham_id, so_luong) 
            VALUES ($don_hang_id, $san_pham_id, $so_luong, $gia)";
    execute($sql);
}

// Cập nhật thông tin chi tiết đơn hàng theo ID
function updateChiTietDonHang($id, $don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "UPDATE chi_tiet_don_hang "
            . "SET don_hang_id = $don_hang_id, san_pham_id = $san_pham_id, so_luong = $so_luong, gia = $gia "
            . "WHERE id = $id";
    execute($sql);
}

// Xóa một chi tiết đơn hàng theo ID
function deleteChiTietDonHang($id) {
    $sql = "DELETE FROM chi_tiet_don_hang WHERE id = $id";
    execute($sql);
}
