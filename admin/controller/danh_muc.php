<?php

include_once 'model/danh_muc.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $danhMucs = getAllDanhMuc();
        include 'view/danh_muc/index.php';
        break;

    case 'add':
        include 'view/danh_muc/add.php';
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];

            createDanhMuc($ten, $mo_ta);

            header('location: index.php?ctrl=danh_muc');
        }
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $danhMuc = getDanhMucById($id);

            include 'view/danh_muc/edit.php';
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $mo_ta = $_POST['mo_ta'];

            updateDanhMuc($id, $ten, $mo_ta);

            header('location: index.php?ctrl=danh_muc');
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            deleteDanhMuc($id);

            header('location: index.php?ctrl=danh_muc');
        }
        break;

    default:
        // Trang 404
        break;
}
