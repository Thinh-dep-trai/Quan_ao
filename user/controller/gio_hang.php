<?php

session_start();

// Bao gồm model và file kết nối CSDL
include_once 'model/gio_hang.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        include 'view/gio_hang/index.php';
        break;

    case 'addtocart':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            addToCart($product_id);
            header("Location: index.php?action=index");
        } else {
            header("Location: index.php?action=error_page");
            echo "Lỗi: Không tìm thấy sản phẩm.";
        }
        break;

    case 'checkout':
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $khach_hang_id = 1; // Thay thế bằng ID của khách hàng thực tế
            $trang_thai = 'Chờ xử lý'; // Trạng thái đơn hàng mặc định
            $order_id = addToOrder($khach_hang_id, $trang_thai);

            if ($order_id) {
                addToOrderDetail($order_id);
                unset($_SESSION['cart']); // Xóa giỏ hàng sau khi đặt hàng thành công
                header("Location: index.php?action=index"); // Chuyển hướng đến trang giỏ hàng sau khi đặt hàng thành công
            } else {
                header("Location: index.php?action=checkout_fail"); // Chuyển hướng đến trang đặt hàng thất bại
            }
        }
        break;

    case 'delete':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            deleteProduct($product_id);
        }
        header("Location: index.php?action=index"); // Chuyển hướng đến trang giỏ hàng
        break;

    case 'checkout_fail':
        include 'view/checkout_fail.php'; // Trang thông báo đặt hàng thất bại
        break;
}
?>
