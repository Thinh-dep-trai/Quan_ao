<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sửa sản phẩm</title>
    </head>
    <body>
        <h1>Sửa sản phẩm</h1>

        <form  action="index.php?ctrl=san_pham&action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $sanPham['id']; ?>">

            <label for="ten">Tên sản phẩm:</label>
            <input type="text" id="ten" name="ten" value="<?php echo $sanPham['ten']; ?>" required>

            <label for="ten">ID Danh mục:</label>
            <!--<input type="text" id="danh_muc_id" name="danh_muc_id" required>-->
            <select id="danh_muc_id" name="danh_muc_id" required>
                <?php
                foreach ($danhMucIds as $danhMucId) {
                    echo '<option value="' . $danhMucId['id'] . '">' . $danhMucId['id'] . '</option>';
                }
                ?>
            </select>

            <label for="mo_ta">Mô tả:</label>
            <textarea id="mo_ta" name="mo_ta" required><?php echo $sanPham['mo_ta']; ?></textarea>

            <label for="gia">Giá:</label>
            <input type="number" id="gia" name="gia" value="<?php echo $sanPham['gia']; ?>" required>
            
            <label for="hinh_anh">Hình ảnh:</label>
            <input type="file" id="hinh_anh" name="hinh_anh" accept="image/*" required>


            <label for="so_luong">Số lượng:</label>
            <input type="number" id="so_luong" name="so_luong" value="<?php echo $sanPham['so_luong']; ?>" required>

            <button type="submit">Lưu</button>
        </form>
    </body>
</html>
