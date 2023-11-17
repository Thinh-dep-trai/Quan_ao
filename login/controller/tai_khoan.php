<?php

session_start();
include_once 'model/tai_khoan.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        include 'view/tai_khoan/dang_nhap.php';
        break;

    case 'ktDangNhap':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenDangNhap = $_POST['ten_dang_nhap'];
            $matKhau = $_POST['PASSWORD'];

            $result = ktDangNhap($tenDangNhap, $matKhau);

            if ($result) {
                $_SESSION['username'] = $tenDangNhap;
                header("Location: http://localhost:8080/QuanAo/admin/index.php?ctrl=don_hang");
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không đúng!". "<br>";

                echo "Tên đăng nhập: " . $tenDangNhap . "<br>";
                echo "Mật khẩu: " . $matKhau . "<br>";
               // echo "Mật khẩu sau khi băm: " . md5($matKhau) . "<br>";
            }
        }
        break;
}
