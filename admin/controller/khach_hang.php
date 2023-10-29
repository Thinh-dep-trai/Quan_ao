<?php

include_once 'model/khach_hang.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $khachHangs = getAllKhachHang();
        include 'view/khach_hang/index.php';
        break;
    case 'add':
        include 'view/khach_hang/add.php';
        break;
    case 'them':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            createKhachHang($ten, $email, $so_dien_thoai, $dia_chi);
            header('location: index.php?ctrl=khach_hang');
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $khachHangED = getKhachHangById($id);
            include 'view/khach_hang/edit.php';
        }
        break;
    case 'del':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteKhachHang($id);
            header('location: index.php?ctrl=khach_hang');
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];

            updateKhachHang($id, $ten, $email, $so_dien_thoai, $dia_chi);

            header('location: index.php?ctrl=khach_hang');
        }
        break;
    case 'search':
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $sanPhams = searchSP($keyword);

            include 'view/san_pham/index.php';
        }
        break;

    default:
        // Xử lý mặc định hoặc thông báo lỗi
        break;
}
