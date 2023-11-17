<?php

// Kết nối database
require_once "./../database/database.php";


function ktDangNhap($tenDangNhap, $matKhau) {
   // $matKhauHash = md5($matKhau);

    $sql = "SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$tenDangNhap' AND PASSWORD = '$matKhau'";
    $row = queryOne($sql);

    return $row;
}