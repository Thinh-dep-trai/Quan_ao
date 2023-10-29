<?php

include_once 'model/san_pham.php';
include_once 'model/danh_muc.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $sanPhams = getAllSP();
        include 'view/san_pham/index.php';
        break;
    case 'addnew':
        $danhMucIds = getIdDanhMuc();
        include 'view/san_pham/addnew.php';
        break;
    case 'them':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = $_POST['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            createSP($ten, $danh_muc_id, $gia, $mo_ta, $hinh_anh, $so_luong);
            header('location: index.php?ctrl=san_pham');
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sanPham = getByIdSP($id);
            $danhMucIds = getIdDanhMuc();
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
            $danh_muc_id = $_POST['danh_muc_id'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = $_POST['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            updateSP($id, $ten, $danh_muc_id, $gia, $mo_ta, $hinh_anh, $so_luong);
            header('location: index.php?ctrl=san_pham');
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
