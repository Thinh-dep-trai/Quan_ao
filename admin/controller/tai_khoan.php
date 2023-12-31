<?php

include_once 'model/tai_khoan.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $taiKhoans = getAllTaiKhoan();
        include 'view/tai_khoan/index.php';
        break;
    case 'add':
        include 'view/tai_khoan/add.php';
        break;
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $password = $_POST['PASSWORD'];
            $role = $_POST['role'];
            createTaiKhoan($ten_dang_nhap, $password, $role);
            header('Location: index.php?ctrl=tai_khoan');
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $password = $_POST['PASSWORD'];
            $role = $_POST['role'];
            updateTaiKhoan($id, $ten_dang_nhap, $password, $role);
            header('Location: index.php?ctrl=tai_khoan');
        } else {
            $id = $_GET['id'];
            $taiKhoan = getTaiKhoanById($id);
            include 'view/tai_khoan/edit.php';
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        deleteTaiKhoan($id);
        header('Location: index.php?ctrl=tai_khoan');
        break;
    default:
        // Xử lý mặc định hoặc thông báo lỗi
        break;
}
