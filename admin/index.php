<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tên trang web của bạn</title> <!-- Điền tên trang web của bạn vào đây -->
    </head>
    <body>
        <div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?ctrl=danh_muc">Danh Mục</a></li>
                <li><a href="index.php?ctrl=san_pham">Sản Phẩm</a></li>
                <li><a href="index.php?ctrl=khach_hang">Khách Hàng</a></li>
                <li><a href="index.php?ctrl=don_hang">Đơn hàng</a></li>
            </ul>

        </div>

        <div class="home">
            <?php
            if (isset($_GET['ctrl'])) {
                $ctrl = $_GET['ctrl'];
                include 'controller/' . $ctrl . '.php';
            }
            ?>
        </div>
    </body>
</html>
