<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin đơn hàng</title>
    </head>
    <body>
        <h1>Thông tin đơn hàng</h1>

        <!--<a href="index.php?ctrl=don_hang&action=add">Thêm đơn hàng</a>-->

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Tổng giá</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donHangs as $donHang) { ?>
                    <tr>
                        <td><?php echo $donHang['id']; ?></td> 
                        <td><?php echo $donHang['ten_khach_hang']; ?></td>
                        <td><?php echo $donHang['tong_gia']; ?></td>
                        <td><?php echo $donHang['trang_thai']; ?></td>

                        <td>
                            <a href="index.php?ctrl=don_hang&action=edit&id=<?php echo $donHang['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=don_hang&action=delete&id=<?php echo $donHang['id']; ?>">Xóa</a>
                            <a href="index.php?ctrl=don_hang&action=chi_tiet&id=<?php echo $donHang['id']; ?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


