<?php

// Kết nối database
require_once "./../database/database.php";

// Lấy tất cả tài khoản
function getAllTaiKhoan() {
    $sql = "SELECT * FROM tai_khoan";
    $result = query($sql);
    return $result;
}

// Lấy chi tiết tài khoản theo id
function getTaiKhoanById($id) {
    $sql = "SELECT * FROM tai_khoan WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

// Thêm mới tài khoản
function createTaiKhoan($email, $password, $role) {
    $sql = "INSERT INTO tai_khoan(email, PASSWORD, role) 
          VALUES ('$email', '$password', '$role')";

    execute($sql);
}

// Cập nhật tài khoản
function updateTaiKhoan($id, $email, $password, $role) {
    $sql = "UPDATE tai_khoan SET email = '$email', PASSWORD = '$password', role = '$role' WHERE id = $id";
    execute($sql);
}

// Xóa tài khoản
function deleteTaiKhoan($id) {
    $sql = "DELETE FROM tai_khoan WHERE id = $id";
    execute($sql);
}
