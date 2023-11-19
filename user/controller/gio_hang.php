<?php

//session_start();

include_once 'model/gio_hang.php';
include_once './../login/model/tai_khoan.php';

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        // Kiểm tra xem đã đăng nhập hay chưa
        if (isset($_SESSION['tai_khoan_id'])) {
            $khachHang = layThongTinKhachHang();
        }
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

    case 'checkouts':
        // Đã đăng nhập
        // Lấy id từ $_SESSION['id']
        $id = $_SESSION['id'];

        // Tính tổng giá của giỏ hàng
        $tong_gia = calculateTotalPrice();

        // Tạo đơn hàng
        $trang_thai = 'Đang xử lý';
        $don_hang_id = createDonHang($id, $tong_gia, $trang_thai);

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

    case 'update_cart':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cart'])) {

            $cartData = json_decode(file_get_contents("php://input"), true);

            foreach ($cartData as $itemData) {
                $itemId = $itemData['id'];
                $quantity = $itemData['quantity'];

                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $itemId) {
                        $item['quantity'] = $quantity;
                        break;
                    }
                }
            }
        }
    case 'thongtinkhachhang':

        $khachHang = layThongTinKhachHang();

        // Kiểm tra xem thông tin khách hàng có tồn tại không
        if ($khachHang) {
            // Hiển thị thông tin khách hàng
            include 'view/khach_hang/thong_tin_khach_hang.php';
        } else {
            // Xử lý khi không có thông tin khách hàng
            echo "Không có thông tin khách hàng.";
        }

        break;

    case 'chonKhachHang':


        $khachHangED = getKhachHangMuonSua();

        include 'view/khach_hang/edit.php';

        break;

    case 'suaKhacHang':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $tai_khoan_id = $_POST['tai_khoan_id'];

            suaThongTinKhachHang($id, $ten, $email, $so_dien_thoai, $dia_chi, $tai_khoan_id);
            header('location: index.php?ctrl=gio_hang&action=thongtinkhachhang');
        }
        break;

    case 'donHangTheoKH':
        // Lấy thông tin khách hàng
        $khachHang = layThongTinKhachHang();
        $khachHangId = $khachHang['id'];

        // Lấy thông tin đơn hàng của khách hàng
        $donHang = donHangCuaKhachHang($khachHangId);

        // Kiểm tra xem có đơn hàng hay không
        if ($donHang) {
            include 'view/don_hang/Thong_tin_don_hang.php';
        } else {
            echo 'Không có đơn hàng nào.';
        }
        break;
}
?>
