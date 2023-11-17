<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>

    <h2>Đăng nhập</h2>

    <form action="index.php?ctrl=tai_khoan&action=ktDangNhap" method="post">
        <label for="ten_dang_nhap">Tên đăng nhập:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" required> <br><br>

        <label for="PASSWORD">Mật khẩu:</label>
        <input type="password" id="PASSWORD" name="PASSWORD" required><br><br>

        <button type="submit">Đăng nhập</button><br><br>
    </form>
    <button type="submit">Đăng ký</button>

</body>
</html>