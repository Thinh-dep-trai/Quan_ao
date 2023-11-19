<?php

// Kết nối database
include_once "./../database/database.php";

function ktDangNhap($tenDangNhap, $matKhau) {
    $sql = "SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$tenDangNhap' AND PASSWORD = '$matKhau'";
    $row = queryOne($sql);
    if ($row && isset($row['role'])) {
        session_start();
        $_SESSION['tai_khoan_id'] = $row['id'];
        return $row;
    } else {
        return false;
    }
}

function dangKyTaiKhoan($tenDangNhap, $matKhau) {
    $sqlCheck = "SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$tenDangNhap'";
    $row = queryOne($sqlCheck);
    if ($row) {
        // ten_dang_nhap đã tồn tại
        echo "<script>
          alert('Tên đăng nhập đã được đăng ký!');
          window.location.href='/QuanAo/login/index.php?ctrl=tai_khoan';
          </script>";

        return false;
    }
    $sql = "INSERT INTO tai_khoan (ten_dang_nhap, PASSWORD, role) VALUES ('$tenDangNhap', '$matKhau', 2)";
    execute($sql);

    return true;
}
