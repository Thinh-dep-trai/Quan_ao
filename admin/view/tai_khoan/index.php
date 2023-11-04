<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
</head>
<body>
    <h1>Danh sách tài khoản</h1>

    <a href="index.php?ctrl=tai_khoan&action=add">Thêm mới tài khoản</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($taiKhoans as $taiKhoan) { ?>
                <tr>
                    <td><?php echo $taiKhoan['id']; ?></td>
                    <td><?php echo $taiKhoan['email']; ?></td>
                    <td><?php echo $taiKhoan['PASSWORD']; ?></td>
                    <td><?php echo $taiKhoan['role']; ?></td>
                    <td>
                        <a href="index.php?ctrl=tai_khoan&action=edit&id=<?php echo $taiKhoan['id']; ?>">Sửa</a>
                        <a href="index.php?ctrl=tai_khoan&action=delete&id=<?php echo $taiKhoan['id']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
