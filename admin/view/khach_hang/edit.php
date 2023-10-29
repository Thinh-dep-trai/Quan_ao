<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm thông tin khách hàng</title>
    </head>
    <body>
        <h1>Thêm thông tin khách hàng</h1>

        <form action="index.php?ctrl=khach_hang&action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $khachHangED['id']; ?>">
            <label for="ten">Tên khách hàng:</label>
            <input type="text" id="ten" name="ten" value="<?php echo $khachHangED['ten']; ?>" required>

            <label for="email">Email:</label>
            <input type="email"id="email" name="email" value="<?php echo $khachHangED['email']; ?>" required>

            <label for="so_dien_thoai">SĐT:</label>
            <input type="text"id="so_dien_thoai" name="so_dien_thoai" value="<?php echo $khachHangED['so_dien_thoai']; ?>" required>

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi" value="<?php echo $khachHangED['dia_chi']; ?>" required>

            <button type="submit">Lưu</button>
        </form>
    </body>
</html>
