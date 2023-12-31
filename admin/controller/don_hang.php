<?php

// Include model
include_once 'model/don_hang.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        // Lấy danh sách đơn hàng
        //$giaSanPham = getGiaSanPham();
        $khachHangName = getIdKhachHang();
        $sanPhamName = getIdSanPham();
        $donHangs = getAllDonHang();
        $giaSP = getGiaSanPham();
        include 'view/don_hang/index.php';
        break;

    case 'add':
        $khachHangIdAdd = getIdKhachHang();
        $sanPhamIdAdd = getIdSanPham();
        $giaSP = getGiaSanPham();
        // Hiển thị form thêm mới
        include 'view/don_hang/add.php';
        break;

    case 'store':
        // Xử lý thêm mới
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Lấy dữ liệu từ form
            $khach_hang_id = $_POST['khach_hang_id'];
            $tong_gia = $_POST['tong_gia'];
            $trang_thai = $_POST['trang_thai'];
            createDonHang($khach_hang_id, $tong_gia, $trang_thai);

            header('Location: index.php?ctrl=don_hang');
        }
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $donHangED = getDonHangById($id);
            $khachHangIdAdd = getIdKhachHang();
            $sanPhamIdAdd = getIdSanPham();
            $giaSP = getGiaSanPham();
            include 'view/don_hang/edit.php';
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $khach_hang_id = $_POST['khach_hang_id'];
            $tong_gia = $_POST['tong_gia'];
            $trang_thai = $_POST['trang_thai'];

            updateDonHang($id, $khach_hang_id, $tong_gia, $trang_thai);

            header('location: index.php?ctrl=don_hang');
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteDonHang($id);

            header('location: index.php?ctrl=don_hang');
        }
        break;
    case 'chi_tiet':
        $id = $_GET['id'];
        $donHang = getIdDonHangofCT($id);
        $don_hang_id = $donHang['id'];
        $donHangChiTiet = getIDDH($don_hang_id);
        include 'view/don_hang_chi_tiet/chiTiet.php';

        break;

    default:
        // Trang không tồn tại
        break;
}

