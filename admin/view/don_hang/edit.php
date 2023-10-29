<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sửa đơn hàng</title>
    </head>
    <body>
        <h1>Sửa đơn hàng</h1>

        <form action="index.php?ctrl=don_hang&action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $donHangED['id']; ?>">
            <label>Khách hàng</label>
            <select name="khach_hang_id">
                <?php
                foreach ($khachHangIdAdd as $khachHang) {
                    $selected = ($khachHang['id'] == $donHangED['khach_hang_id']) ? 'selected' : '';
                    echo '<option value="' . $khachHang['id'] . '" ' . $selected . '>' . $khachHang['ten'] . '</option>';
                }
                ?>

            </select>
            <label>Sản phẩm</label>
            <select name="san_pham_id">
                <?php
                foreach ($sanPhamIdAdd as $sanPham) {
                    $selected = ($sanPham['id'] == $donHangED['san_pham_id']) ? 'selected' : '';
                    echo '<option value="' . $sanPham['id'] . '" ' . $selected . '>' . $sanPham['ten'] . '</option>';
                }
                ?>
            </select>
            <label>Số lượng</label>
            <input type="number" name="so_luong" id="so_luong" value="<?php echo $donHangED['so_luong']; ?>" oninput="calculateTotal()">
            <label>Giá</label>
            <input type="number" name="gia" id="gia" value="<?php echo $donHangED['gia']; ?>" oninput="calculateTotal()" readonly>

            <label for="tong_gia">Tổng giá</label>
            <input type="text" name="tong_gia" id="tong_gia" value="<?php echo $donHangED['tong_gia']; ?>" readonly>

            
            <!-- trạng thái không hiện đúng khi ấn sữa-->
            <label>Trạng thái</label>
            <select name="trang_thai" >
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
