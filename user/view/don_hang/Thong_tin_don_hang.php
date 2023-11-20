<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin đơn hàng</title>
    </head>
    <body>
        <h1>Thông tin đơn hàng</h1>
        <?php
        $_SESSION['id'] = $khachHang['id'];
        ?>

        <p>ID khách hàng: <?php echo $_SESSION['id']; ?></p>
        <!--<a href="index.php?ctrl=don_hang&action=add">Thêm đơn hàng</a>-->

        <table border="1">
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Tổng giá</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donHang as $dh) { ?>
                    <tr>
                        <td><?php echo $dh['khach_hang_id']; ?></td>
                        <td><?php echo $dh['tong_gia']; ?></td>
                        <td><?php echo $dh['trang_thai']; ?></td>

                        <td>
                            <a href="index.php?ctrl=gio_hang&action=chi_tiet&id=<?php echo $dh['id']; ?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


