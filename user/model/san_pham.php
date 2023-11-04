<?php

require_once "./../database/database.php";

function getAllUserSP() {
    $sql = "SELECT * FROM san_pham";
    $result = query($sql);
    return $result;
}

function getUserSPById($id) {
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

function searchUserSP($keyword) {
    $sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%'";
    $result = query($sql);
    return $result;
}

function getSanPhamByDanhMuc($danhMucId) {
    $sql = "SELECT * FROM san_pham WHERE danh_muc_id = $danhMucId";
    $result = query($sql);
    return $result;
}

?>
