<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chỉnh sửa đơn hàng</title>
    </head>
    <body>
        <h1>Chỉnh sửa đơn hàng</h1>

        <form action="index.php?ctrl=don_hang&action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $donHangED['id']; ?>">

            <label>Khách hàng</label>
            <select name="khach_hang_id">
                <?php foreach ($khachHangIdAdd as $khachHang) { ?>
                    <option value="<?php echo $khachHang['id']; ?>"<?php if ($donHangED['khach_hang_id'] == $khachHang['id']) echo ' selected'; ?>>
                        <?php echo $khachHang['ten']; ?>
                    </option>
                <?php } ?>
            </select>

            <label>Sản phẩm</label>
            <select name="san_pham_id" id="san_pham_id" onchange="updatePrice()">
                <?php foreach ($giaSP as $sanPham) { ?>
                    <option value="<?php echo $sanPham['id']; ?>" data-price="<?php echo $sanPham['gia']; ?>"<?php if ($donHangED['san_pham_id'] == $sanPham['id']) echo ' selected'; ?>>
                        <?php echo $sanPham['ten']; ?>
                    </option>
                <?php } ?>
            </select>
            

            <label>Số lượng</label>
            <input type="number" name="so_luong" id="so_luong" oninput="calculateTotal()" value="<?php echo $donHangED['so_luong']; ?>">

            <label>Giá</label>
            <input type="text" name="gia" id="gia" readonly value="<?php echo $donHangED['gia']; ?>">

            <label for="tong_gia">Tổng giá</label>
            <input type="text" name="tong_gia" id="tong_gia" readonly value="<?php echo $donHangED['tong_gia']; ?>">

            <label>Trạng thái</label>
            <select name="trang_thai">
                <option value="Đang xử lý"<?php if ($donHangED['trang_thai'] === 'Đang xử lý') echo ' selected'; ?>>Đang xử lý</option>
                <option value="Đã xử lý"<?php if ($donHangED['trang_thai'] === 'Đã xử lý') echo ' selected'; ?>>Đã xử lý</option>
            </select>
            <button type="submit">Cập nhật</button>
        </form>

        <script>
            function calculateTotal() {
                var soLuong = parseFloat(document.getElementById('so_luong').value) || 0;
                var gia = parseFloat(document.getElementById('gia').value) || 0;
                var tongGia = soLuong * gia;
                document.getElementById('tong_gia').value = tongGia;
            }

            function updatePrice() {
                var select = document.getElementById('san_pham_id');
                var selectedOption = select.options[select.selectedIndex];
                var selectedPrice = selectedOption.getAttribute('data-price');
                document.getElementById('gia').value = selectedPrice;
            }
        </script>
    </body>
</html>
