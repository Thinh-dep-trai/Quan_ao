<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm sản phẩm mới</title>
    </head>
    <body>
        <h1>Thêm sản phẩm mới</h1>

        <form action="index.php?ctrl=san_pham&action=them" method="POST">
            <label for="ten">Tên sản phẩm:</label>
            <input type="text" id="ten" name="ten" required><br>

            <label for="ten">Danh mục sản phẩm:</label> 
    <!--        <input type="text" id="danh_muc_id" name="danh_muc_id" required>-->
            <select id="danh_muc_id" name="danh_muc_id" required>
                <?php
                foreach ($danhMucIdADD as $danhMuc) {
                    echo '<option value="' . $danhMuc['id'] . '">' . $danhMuc['ten'] . '</option>';
                }
                ?>
            </select><br>

            <label for="mo_ta">Mô tả:</label>
            <textarea id="mo_ta" name="mo_ta" required></textarea><br>

            <label for="gia">Giá:</label>
            <input type="number" id="gia" name="gia" required><br>

            <label for="hinh_anh">Hình ảnh:</label>
            <input type="file" id="hinh_anh" name="hinh_anh" accept="image/*" required><br>


            <label for="so_luong">Số lượng:</label>
            <input type="number" id="so_luong" name="so_luong" required><br>

            <button type="submit">Lưu</button>
        </form>
    </body>
</html>
