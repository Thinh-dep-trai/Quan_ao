<?php

require_once 'database.php'; // file chứa hàm kết nối db

function getAllSP() {
    $sql = "SELECT * FROM san_pham";
    $result = query($sql);
    return $result;
}

function getByIdSP($id) {
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

function createSP($ten, $danh_muc_id, $gia, $mo_ta, $hinh_anh, $so_luong) {
    $sql = "INSERT INTO san_pham(ten, danh_muc_id, gia,mo_ta, hinh_anh, so_luong) VALUES ('$ten',$danh_muc_id, $gia, '$mo_ta','$hinh_anh' ,$so_luong)";
    execute($sql);
}

function updateSP($id, $ten, $danh_muc_id, $gia, $mo_ta, $hinh_anh, $so_luong) {
    $sql = "UPDATE san_pham SET ten='$ten',danh_muc_id=$danh_muc_id, gia=$gia, mo_ta='$mo_ta', hinh_anh='$hinh_anh', so_luong=$so_luong WHERE id = $id";
    execute($sql);
}

function deleteSP($id) {
    $sql = "DELETE FROM san_pham WHERE id = $id";
    execute($sql);
}

function searchSP($keyword) {
    $sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%'";
    $result = query($sql);
    return $result;
}
