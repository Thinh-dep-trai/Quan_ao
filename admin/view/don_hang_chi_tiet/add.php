<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm mới chi tiết đơn hàng</title>
    </head>
    <body>
        <h1>Thêm mới chi tiết đơn hàng</h1>

        <form method="post" action="index.php?ctrl=don_hang_chi_tiet&action=store">
            <label for="don_hang_id">Chọn Đơn hàng:</label>
            <select name="don_hang_id" id="don_hang_id">
                <?php foreach ($donHangIdAdd as $donHang) { ?>
                    <option value="<?php echo $donHang['id']; ?>"><?php echo $donHang['id']; ?></option>
                <?php } ?>
            </select>
            <br>

            <label for="san_pham_id">Chọn Sản phẩm:</label>
            <select name="san_pham_id" id="san_pham_id" onchange="updatePrice()">
                <option value="" selected>Chọn sản phẩm</option>
                <?php foreach ($sanPhamIdAdd as $sanPham) { ?>
                    <option value="<?php echo $sanPham['id']; ?>" data-price="<?php echo $sanPham['gia']; ?>">
                        <?php echo $sanPham['ten']; ?> </option>
                <?php } ?>
            </select>
            <br>

            <label for="so_luong">Số lượng:</label>
            <input type="number" name="so_luong" id="so_luong">
            <br>

            <label for="gia">Giá:</label>
            <input type="number" name="gia" id="gia">
            <br>

            <input type="submit" value="Thêm mới">
        </form>

        <a href="index.php?ctrl=don_hang_chi_tiet">Quay lại danh sách chi tiết đơn hàng</a>

        <script>
            function updatePrice() {
                var select = document.getElementById('san_pham_id');
                var selectedOption = select.options[select.selectedIndex];
                var selectedPrice = selectedOption.getAttribute('data-price');
                document.getElementById('gia').value = selectedPrice;
            }
        </script>
    </body>
</html>
