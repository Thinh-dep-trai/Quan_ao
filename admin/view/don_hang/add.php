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
            <label for="tong_gia">Tổng giá</label>
            <input type="text" name="tong_gia" id="tong_gia" >

            <label>Trạng thái</label>
            <select name="trang_thai">
                <option value="Đang xử lý">Đang xử lý</option>
                <option value="Đã xử lý">Đã xử lý</option>
            </select>
            <button type="submit">Lưu</button>
        </form>

    </body>
</html>
