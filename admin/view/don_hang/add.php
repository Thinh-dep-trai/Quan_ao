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
                <?php foreach ($khachHangIdAdd as $khachHang) { ?>
                    <option value="<?php echo $khachHang['id']; ?>"><?php echo $khachHang['ten']; ?></option>
                <?php } ?>
            </select>

            <label>Sản phẩm</label>
            <select name="san_pham_id" id="san_pham_id" onchange="updatePrice()">
                 <option value="" selected>Chọn sản phẩm</option>
                <?php foreach ($giaSP as $sanPham) { ?>
                    <option value="<?php echo $sanPham['id']; ?>" data-price="<?php echo $sanPham['gia']; ?>">
                        <?php echo $sanPham['ten']; ?>
                    </option>
                <?php } ?>
            </select>

            <label>Số lượng</label>
            <input type="number" name="so_luong" id="so_luong" oninput="calculateTotal()">

            <label>Giá</label>
            <input type="text" name="gia" id="gia" readonly>
            <!--<span id="selected_price"></span>-->

            <label for="tong_gia">Tổng giá</label>
            <input type="text" name="tong_gia" id="tong_gia" readonly>

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

            function updatePrice() {
                var select = document.getElementById('san_pham_id');
                var selectedOption = select.options[select.selectedIndex];
                var selectedPrice = selectedOption.getAttribute('data-price');
                document.getElementById('gia').value = selectedPrice;
                //            document.getElementById('selected_price').textContent = "Giá sản phẩm: " + selectedPrice;
            }
        </script>
    </body>
</html>
