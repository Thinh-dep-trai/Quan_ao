<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm đơn hàng mới</title>
    </head>
    <body>
        <h1>Thêm đơn hàng mới</h1>

        <form action="index.php?ctrl=don_hang&action=store" method="POST">
            <label>Khách hàng</label>
            <select name="khach_hang_id">
                <?php
                foreach ($khachHangIdAdd as $khachHang) {
                    echo '<option value="' . $khachHang['id'] . '">' . $khachHang['ten'] . '</option>';
                }
                ?>
            </select>
            <label>Sản phẩm</label>
            <select name="san_pham_id">
                <?php
                foreach ($sanPhamIdAdd as $sanPham) {
                    echo '<option value="' . $sanPham['id'] . '">' . $sanPham['ten'] . '</option>';
                }
                ?>
            </select>
            <label>Số lượng</label>
            <input type="number" name="so_luong" id="so_luong" oninput="calculateTotal()">
            <label>Giá</label>
            <input type="number" name="gia" id="gia" oninput="calculateTotal()">


           <label for="tong_gia">Tổng giá</label>
           <input type="text" name="tong_gia" id="tong_gia" readonly >
            <label>Trạng thái</label>
            <select name="trang_thai">
                <option value="Đang xử lý">Đang xử lý</option>
                <option value="Đã xử lý">Đã xử lý</option>
            </select>
            <button type="submit">Lưu</button>
        </form>

        <script>
           
            function calculateTotal() {
                var soLuong = parseFloat(document.getElementById('so_luong').value) || 0;
                var gia = parseFloat(document.getElementById('gia').value) || 0;
                var tongGia = soLuong * gia;
                document.getElementById('tong_gia').value = tongGia;
            }
        </script>

    </body>
</html>
