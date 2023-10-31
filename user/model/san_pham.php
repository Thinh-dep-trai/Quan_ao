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


// Thêm các hàm khác cần thiết cho phần khách hàng tại đây...
?>
