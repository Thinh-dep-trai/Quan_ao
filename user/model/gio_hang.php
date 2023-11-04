<?php

// File model/cart.php
// Kết nối CSDL
include_once './../database/database.php';

function addToCart($product_id) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $exist = false;

    // Tìm sản phẩm trong giỏ hàng
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            $exist = true;
            $_SESSION['cart'][$key]['quantity']++;
            break;
        }
    }

    if (!$exist) {
        // Lấy thông tin sản phẩm từ CSDL
        $sql = "SELECT * FROM san_pham WHERE id = $product_id";
        $product = queryOne($sql);

        if ($product) {
            // Thêm mới vào giỏ hàng
            $item = array(
                'id' => $product['id'],
                'name' => $product['ten'],
                'price' => $product['gia'],
                'quantity' => 1
            );

            $_SESSION['cart'][] = $item;
        }
    }
}

// Hàm thêm đơn hàng
function addToOrder($khach_hang_id, $trang_thai) {
    // Tạo một đơn hàng mới
    $sql = "INSERT INTO don_hang (khach_hang_id, trang_thai) VALUES ($khach_hang_id, '$trang_thai')";
    $order_id = executeReturnLastId($sql);

    return $order_id;
}

// Hàm thêm chi tiết đơn hàng
function addToOrderDetail($order_id) {
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];

        // Lấy thông tin sản phẩm từ CSDL
        $sql = "SELECT * FROM san_pham WHERE id = $product_id";
        $product = queryOne($sql);

        // Insert vào bảng chi tiết đơn hàng
        $sql = "INSERT INTO don_hang_chi_tiet (don_hang_id, san_pham_id, so_luong, gia) 
                VALUES ($order_id, $product_id, $quantity, " . $product['gia'] . ")";

        execute($sql);
    }
}

// Hàm xóa sản phẩm khỏi giỏ
function deleteProduct($product_id) {
    // Xóa sản phẩm khỏi SESSION['cart']
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

?>