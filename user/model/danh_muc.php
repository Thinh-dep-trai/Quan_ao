<?php

// Kết nối database 

require_once "./../database/database.php";

// Lấy tất cả danh mục
function getAllDanhMuc() {
    $sql = "SELECT * FROM danh_muc";
    $result = query($sql);
    return $result;
}

