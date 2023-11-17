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

            if ($result && isset($result['role'])) {
                $_SESSION['username'] = $tenDangNhap;
                $_SESSION['role'] = $result['role'];
                header("Location:/QuanAo/user/index.php");
            } else {
                header("Location:/QuanAo/user/index.php?error=1");
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
            }
        }
        break;
}
