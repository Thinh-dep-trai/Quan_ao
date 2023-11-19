<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin khách hàng</title>
    </head>
    <body>
        <?php
        $_SESSION['id'] = $khachHang['id'];
        ?>

        <p>ID khách hàng: <?php echo $_SESSION['id'];  ?></p>


        <h2>Thông tin khách hàng</h2>
        <p>Tên: <?php echo $khachHang['ten']; ?></p>
        <p>Email: <?php echo $khachHang['email']; ?></p>
        <p>Số điện thoại: <?php echo $khachHang['so_dien_thoai']; ?></p>
        <p>Địa chỉ: <?php echo $khachHang['dia_chi']; ?></p>
        <a href="/QuanAo/user/index.php?ctrl=gio_hang&action=chonKhachHang&id=<?php echo $_SESSION['id']; ?>">Sữa</a> <br><br>---<br>


        <a href="/QuanAo/user/index.php?ctrl=gio_hang&action=donHangTheoKH&id=<?php echo $_SESSION['id']; ?>">Đơn hàng đã mua</a>
    </body>


</html>
