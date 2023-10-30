<?php

require_once './../database/database.php';

// Lấy toàn bộ dữ liệu chi tiết đơn hàng
function getAllChiTietDonHang() {
    $sql = "SELECT d.*, s.ten AS ten_san_pham, s.gia AS gia_san_pham
            FROM don_hang_chi_tiet d
            JOIN san_pham s ON d.san_pham_id = s.id";
    $result = query($sql);
    return $result;
}

// Lấy thông tin chi tiết đơn hàng theo ID
function getChiTietDonHangById($id) {
    $sql = "SELECT d.*, s.ten AS ten_san_pham, s.gia AS gia_san_pham
            FROM don_hang_chi_tiet d
            JOIN san_pham s ON d.san_pham_id = s.id
            WHERE d.id = $id";
    $result = queryOne($sql);
    return $result;
}

// Tạo một chi tiết đơn hàng mới
function createChiTietDonHang($don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "INSERT INTO don_hang_chi_tiet(don_hang_id, san_pham_id, so_luong, gia) 
            VALUES ($don_hang_id, $san_pham_id, $so_luong, $gia)";
    execute($sql);
}

// Cập nhật thông tin chi tiết đơn hàng theo ID
function updateChiTietDonHang($id, $don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "UPDATE don_hang_chi_tiet 
            SET don_hang_id = $don_hang_id, san_pham_id = $san_pham_id, so_luong = $so_luong, gia = $gia
            WHERE id = $id";
    execute($sql);
}

// Xóa một chi tiết đơn hàng theo ID
function deleteChiTietDonHang($id) {
    $sql = "DELETE FROM don_hang_chi_tiet WHERE id = $id";
    execute($sql);
}

function getIdDonHang() {
    $sql = "SELECT id FROM don_hang";
    $result = query($sql);
    return $result;
}

function getIdSanPhamOfDHCT() {
    $sql = "SELECT id, ten, gia FROM san_pham";
    $result = query($sql);
    return $result;
}

function getTTDonHang() {
    $sql = "SELECT dh.id AS don_hang_id, kh.ten AS ten_khach_hang, dh.trang_thai
            FROM don_hang dh
            JOIN khach_hang kh ON dh.khach_hang_id = kh.id";
    $result = query($sql);
    return $result;
}


