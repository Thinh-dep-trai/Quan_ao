<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi tiết đơn hàng</title>
    </head>
    <body>
        <h1>Chi tiết đơn hàng</h1>

        <!--<a href="index.php?ctrl=don_hang_chi_tiet&action=add">Thêm đơn hàng</a>-->

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Đơn hàng</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donHangChiTiet as $donHangCT) { ?>
                    <tr>
                        <td><?php echo $donHangCT['id']; ?></td> 
                        <td><?php echo $donHangCT['don_hang_id']; ?></td>
                        <td><?php echo $donHangCT['san_pham_id']; ?></td>
                        <td><?php echo $donHangCT['so_luong']; ?></td>
                        <td><?php echo $donHangCT['gia']; ?></td>

                        <td>
                            <a href="index.php?ctrl=don_hang_chi_tiet&action=edit&id=<?php echo $donHang['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=don_hang_chi_tiet&action=delete&id=<?php echo $donHang['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


