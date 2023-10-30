<?php

// Include model
include_once 'model/don_hang_chi_tiet.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $donHangCTs = getAllChiTietDonHang();
        $TTDonHangCT = getTTDonHang();
        $idDH= getIdDonHang();
        include 'view/don_hang_chi_tiet/index.php';
        break;

    case 'add':
        // Hiển thị form thêm mới
        $donHangIdAdd = getIdDonHang();
        $sanPhamIdAdd = getIdSanPhamOfDHCT();
        include 'view/don_hang_chi_tiet/add.php';
        break;

    case 'store':
        // Xử lý thêm mới
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $don_hang_id = $_POST['don_hang_id'];
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $gia = $_POST['gia']; // Lấy giá từ form

            createChiTietDonHang($don_hang_id, $san_pham_id, $so_luong, $gia);

            header('Location: index.php?ctrl=don_hang_chi_tiet');
        }
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $donHangCTED = getChiTietDonHangById($id);
            $donHangIdAdd = getIdDonHang();
            $sanPhamIdAdd = getIdSanPhamOfDHCT();
            include 'view/don_hang_chi_tiet/edit.php';
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $don_hang_id = $_POST['don_hang_id'];
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $gia = $_POST['gia'];

            updateChiTietDonHang($id, $don_hang_id, $san_pham_id, $so_luong, $gia);

            header('location: index.php?ctrl=don_hang_chi_tiet');
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteChiTietDonHang($id);

            header('location: index.php?ctrl=don_hang_chi_tiet');
        }
        break;
    

    default:
        // Trang không
        break;
}