<?php

// File model/gio_hang.php
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

// Hàm thêm đơn hàng
//function createDonHang($khach_hang_id, $tong_gia, $trang_thai) {
//    $sql = "INSERT INTO don_hang (khach_hang_id, tong_gia, trang_thai) 
//            VALUES ($khach_hang_id, $tong_gia, '$trang_thai')";
//    //execute($sql);
//
//    return executeReturnLastId($sql, [$khach_hang_id, $tong_gia, $trang_thai]);
//}


function createDonHang($khach_hang_id, $tong_gia, $trang_thai) {
    $sql = "INSERT INTO don_hang (khach_hang_id, tong_gia, trang_thai) 
            VALUES ($khach_hang_id, $tong_gia, '$trang_thai')";
    //execute($sql);

    return executeReturnLastId($sql, [$khach_hang_id, $tong_gia, $trang_thai]);
}

function addToDonHangChiTiet($don_hang_id, $san_pham_id, $so_luong, $gia) {
    $sql = "INSERT INTO don_hang_chi_tiet (don_hang_id, san_pham_id, so_luong, gia) 
            VALUES ($don_hang_id, $san_pham_id, $so_luong, $gia)";
    execute($sql);
}

function calculateTotalPrice() {
    $totalPrice = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];

            $totalPrice += $quantity * $price;
        }
    }

    return $totalPrice;
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

// Hàm tạo khách hàng hoặc lấy ID nếu đã tồn tại
function createKhachHang($ten, $email, $so_dien_thoai, $dia_chi) {
    $sql = "INSERT INTO khach_hang (ten, email, so_dien_thoai, dia_chi) 
          VALUES ('$ten', '$email', '$so_dien_thoai', '$dia_chi')
          ON DUPLICATE KEY UPDATE email=VALUES(email)";

    execute($sql);

    // Lấy ID của khách hàng, nếu không tồn tại thì trả về null
    $sqlGetId = "SELECT id FROM khach_hang WHERE email = '$email'";
    $row = queryOne($sqlGetId);

    return $row ? $row['id'] : null;
}

?>
