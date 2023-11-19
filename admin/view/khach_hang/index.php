<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin khách hàng</title>
    </head>
    <body>
        <h1>Thông tin khách hàng</h1>

        <a href="index.php?ctrl=khach_hang&action=add">Thêm khách hàng</a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>ID tài khoản</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($khachHangs as $khachHang) { ?>
                    <tr>
                        <td><?php echo $khachHang['id']; ?></td> 
                        <td><?php echo $khachHang['ten']; ?></td>
                        <td><?php echo $khachHang['email']; ?></td>
                        <td><?php echo $khachHang['so_dien_thoai']; ?></td>
                        <td><?php echo $khachHang['dia_chi']; ?></td>
                        <td><?php echo $khachHang['tai_khoan_id']; ?></td>

                        <td>
                            <a href="index.php?ctrl=khach_hang&action=edit&id=<?php echo $khachHang['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=khach_hang&action=del&id=<?php echo $khachHang['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


