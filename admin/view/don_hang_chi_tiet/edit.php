<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa chi tiết đơn hàng</title>
</head>
<body>
    <h1>Chỉnh sửa chi tiết đơn hàng</h1>

    <form method="post" action="index.php?ctrl=don_hang_chi_tiet&action=update">
        <input type="hidden" name="id" value="<?php echo $donHangCTED['id']; ?>">
        
        <label for="don_hang_id">Chọn Đơn hàng:</label>
        <select name="don_hang_id" id="don_hang_id">
            <?php foreach ($donHangIdAdd as $donHang) { ?>
                <option value="<?php echo $donHang['id']; ?>" <?php if ($donHang['id'] == $donHangCTED['don_hang_id']) echo 'selected'; ?>><?php echo $donHang['id']; ?></option>
            <?php } ?>
        </select>
        <br>

        <label for="san_pham_id">Chọn Sản phẩm:</label>
        <select name="san_pham_id" id="san_pham_id">
            <?php foreach ($sanPhamIdAdd as $sanPham) { ?>
                <option value="<?php echo $sanPham['id']; ?>" <?php if ($sanPham['id'] == $donHangCTED['san_pham_id']) echo 'selected'; ?>><?php echo $sanPham['ten']; ?></option>
            <?php } ?>
        </select>
        <br>

        <label for="so_luong">Số lượng:</label>
        <input type="number" name="so_luong" id="so_luong" value="<?php echo $donHangCTED['so_luong']; ?>">
        <br>

        <label for="gia">Giá:</label>
        <input type="number" name="gia" id="gia" value="<?php echo $donHangCTED['gia']; ?>">
        <br>

        <input type="submit" value="Cập nhật">
    </form>

    <a href="index.php?ctrl=don_hang_chi_tiet">Quay lại danh sách chi tiết đơn hàng</a>
</body>
</html>
