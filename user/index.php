<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../user/css/style.css">
        <title>Khách hàng là đồ ngu</title> <!-- Điền tên trang web của bạn vào đây -->
    </head>
    <body>
        <div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?ctrl=san_pham">Sản Phẩm</a></li>
                <li><a href="index.php?ctrl=gio_hang">giỏ hàng</a></li>
                <!--<li><a href="/QuanAo/login/index.php?ctrl=tai_khoan">Đăng nhập</a></li>-->


                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    // Nếu đã đăng nhập, hiển thị liên kết đăng xuất và tên người dùng
                    echo '<li><a href="../admin/index.php">Admin</a></li>';
                    echo '<li><a href="index.php?ctrl=dang_xuat">Đăng xuất</a></li>';
                    echo '<li>Xin chào ' . $_SESSION['username'] . '</li>';
                } else {
                    // Nếu chưa đăng nhập, hiển thị liên kết đăng nhập
                    echo '<li><a href="/QuanAo/login/index.php?ctrl=tai_khoan">Đăng nhập</a></li>';
                }
                ?>

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
