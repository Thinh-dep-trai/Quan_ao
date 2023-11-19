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

    case 'view_dangky':
        include 'view/tai_khoan/dang_ky.php';
        break;

    case 'dangky':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenDangNhap = $_POST['ten_dang_nhap'];
            $matKhau = $_POST['PASSWORD'];

            // Gọi hàm dangKyTaiKhoan để kiểm tra và đăng ký tài khoản
            if (dangKyTaiKhoan($tenDangNhap, $matKhau)) {

                // Nếu đăng ký thành công, lấy thông tin tài khoản
                $result = ktDangNhap($tenDangNhap, $matKhau);

                // Kiểm tra và lấy ID tài khoản mới đăng ký
                if ($result && isset($result['id'])) {
                    $taiKhoanId = $result['id'];

                    // Thêm thông tin khách hàng vào bảng 'khach_hang'
                    $ten = $_POST['ten'];
                    $email=$_POST['email'];
                    $soDienThoai = $_POST['so_dien_thoai'];
                    $diaChi = $_POST['dia_chi'];

                    execute("INSERT INTO khach_hang (ten, email, so_dien_thoai, dia_chi, tai_khoan_id) VALUES ('$ten', '$email', '$soDienThoai', '$diaChi', $taiKhoanId)");

                    // Đăng nhập và chuyển hướng người dùng đến trang chủ
                    $_SESSION['username'] = $tenDangNhap;
                    header("Location: /QuanAo/user/index.php");
                    exit();
                } else {
                    // Xử lý lỗi nếu không lấy được thông tin tài khoản mới đăng ký
                    echo "<script>alert('Đã xảy ra lỗi khi đăng ký tài khoản!');</script>";
                }
            }
        }
        break;

//    case 'dangky':
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $tenDangNhap = $_POST['ten_dang_nhap'];
//            $matKhau = $_POST['PASSWORD'];
//            $role = $_POST['role'];
//
//            if (dangKyTaiKhoan($tenDangNhap, $matKhau, $role)) {
//                $_SESSION['username'] = $tenDangNhap;
//                header("Location: /QuanAo/user/index.php");
//                exit();
//            } else {
//                echo "<script>alert('Đăng ký thất bại!');</script>";
//            }
//        }
//        break;
}
