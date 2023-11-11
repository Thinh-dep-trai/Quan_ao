<?php

include_once 'model/khach_hang';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
     case 'addKH':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            addToCart($product_id);
            header("Location: index.php?ctrl=san_pham");
        }
        // Xử lý mặc định hoặc thông báo lỗi
        break;
}