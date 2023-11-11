<?php

session_start();

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
            header("Location: index.php?ctrl=san_pham");
        }
        break;

    // Trong file controller/gio_hang_controller.php
    case 'checkout':
        // Đặt hàng
        // Lấy thông tin khách hàng từ form
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];

        // Tạo khách hàng hoặc lấy ID nếu đã tồn tại
        $khach_hang_id = createKhachHang($ten, $email, $so_dien_thoai, $dia_chi);

        // Tính tổng giá của giỏ hàng
        $tong_gia = calculateTotalPrice();

        // Tạo đơn hàng
        $trang_thai = 'Đang xử lý';

        // Lưu id của đơn hàng mới tạo
        $don_hang_id = createDonHang($khach_hang_id, $tong_gia, $trang_thai);

        // Kiểm tra xem có lỗi khi tạo đơn hàng không
        if ($don_hang_id) {
            // Tiếp tục thêm chi tiết đơn hàng
            foreach ($_SESSION['cart'] as $item) {
                $san_pham_id = $item['id'];
                $so_luong = $item['quantity'];
                $gia = $item['price'];

                // Gọi hàm và truyền vào $don_hang_id
                addToDonHangChiTiet($don_hang_id, $san_pham_id, $so_luong, $gia);
            }

            // Xóa giỏ hàng
            unset($_SESSION['cart']);

            // Chuyển hướng đến trang cảm ơn
            header('Location: index.php?ctrl=gio_hang&action=thankyou');
        } else {
            // Có lỗi khi tạo đơn hàng
            echo "Lỗi: Không thể tạo đơn hàng.";
        }
        break;

    case 'delete':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            deleteProduct($product_id);
        }
        header("Location: index.php?ctrl=gio_hang"); // Chuyển hướng đến trang giỏ hàng
        break;
}
?>
