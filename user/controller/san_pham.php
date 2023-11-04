<?php

include_once 'model/san_pham.php';
include_once 'model/danh_muc.php';
$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $base_url = '/QuanAo/zimage/';
        $danhmuc = getAllDanhMuc();

        // Kiểm tra xem người dùng đã chọn danh mục nào
        if (isset($_GET['id'])) {
            $selectedCategoryId = $_GET['id'];
            $userSanPhams = getSanPhamByDanhMuc($selectedCategoryId);
        } else {
            $userSanPhams = getAllUserSP();
        }

        include 'view/san_pham/index.php';
        break;
    case 'search':
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $userSanPhams = searchUserSP($keyword);

            include 'view/san_pham/index.php';
        }
        break;

    // Thêm các trường hợp và điều hướng khác cần thiết cho phần khách hàng tại đây...

    default:
        // Xử lý mặc định hoặc thông báo lỗi
        break;
}
