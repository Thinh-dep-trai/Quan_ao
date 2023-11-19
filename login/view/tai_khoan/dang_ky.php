<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng ký</title>
    </head>
    <body>

        <h2>Đăng ký tài khoản</h2>

        <form action="index.php?ctrl=tai_khoan&action=dangky" method="post">
            <label for="ten_dang_nhap">Tên đăng nhập:</label>
            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required> <br><br>
            <label for="PASSWORD">Mật khẩu:</label>
            <input type="password" id="PASSWORD" name="PASSWORD" required><br><br>


            <h2>Thông tin khách hàng</h2>
            <label for="name">Tên:</label>
            <input type="text" id="name" name="ten" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="so_dien_thoai"><br><br>

            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="dia_chi"><br><br>




            <button type="submit">Xác nhận</button><br><br>
        </form>

        <button onclick="window.location.href = '/QuanAo/user/index.php'">Quay lại trang chủ</button>

    </body>
</html>