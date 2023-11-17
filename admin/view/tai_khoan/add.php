<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm tài khoản</title>
    </head>
    <body>
        <h1>Thêm tài khoản</h1>

        <form action="index.php?ctrl=tai_khoan&action=create" method="POST">
            <label for="ten_dang_nhap">Tên đăng nhập:</label>
            <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" required>
            <br>

            <label for="password">Password:</label>
            <input type="text" name="PASSWORD" id="password" required>
            <br>

            <label for="role">Role:</label>
            <input type="text" name="role" id="role" required>
            <br>

            <button type="submit">Thêm</button>
        </form>
    </body>
</html>
