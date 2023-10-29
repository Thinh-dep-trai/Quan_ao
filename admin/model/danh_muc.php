<?php

// Kết nối database 

require_once "./../database/database.php";
// Lấy tất cả danh mục
function getAllDanhMuc() {
    $sql = "SELECT * FROM danh_muc";
    $result = query($sql);
    return $result;
}


// Lấy chi tiết danh mục theo id
function getDanhMucById($id) {
    $sql = "SELECT * FROM danh_muc WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

// Thêm mới danh mục
function createDanhMuc($ten, $mo_ta) {
    $sql = "INSERT INTO danh_muc(ten, mo_ta) 
          VALUES ('$ten', '$mo_ta')";

    execute($sql);
}

// Cập nhật danh mục 
function updateDanhMuc($id, $ten, $mo_ta) {
    $sql = "UPDATE danh_muc SET ten = '$ten', mo_ta = '$mo_ta' WHERE id = $id";
    execute($sql);
}

// Xóa danh mục
function deleteDanhMuc($id) {
    $sql = "DELETE FROM danh_muc WHERE id = $id";
    execute($sql);
}
