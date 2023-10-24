<?php

include_once 'model/san_pham.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $sanPhams = getAllSP();

//        foreach ($sanPhams as $sanPham) {
//            $danhMuc = getDanhMucById($sanPham['danh_muc_id']);
//
//            $sanPham['danh_muc'] = $danhMuc;
//        }

// Truyền dữ liệu sang view
        $data = ['sanPhams' => $sanPhams];

        include 'view/san_pham/index.php';
        break;
    case 'addnew':
        include 'view/san_pham/addnew.php';
        break;
    case 'them':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $so_luong = $_POST['so_luong'];
            createSP($ten, $gia, $mo_ta, $so_luong);
            header('location: index.php?ctrl=san_pham');
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sanPham = getByIdSP($id);
            include 'view/san_pham/edit.php';
        }
        break;
    case 'del':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteSP($id);
            header('location: index.php?ctrl=san_pham');
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $so_luong = $_POST['so_luong'];
            updateSP($id, $ten, $gia, $mo_ta, $so_luong);
            header('location: index.php?ctrl=san_pham');
        }
        break;
    default:
        // Xử lý mặc định hoặc thông báo lỗi
        break;
}
