<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Nguyễn Thanh Thịnh</title> <!-- Điền tên trang web của bạn vào đây -->
    </head>
    <body>
        <div class="menu">
<!--            <ul>
                <li><a href="index.php">____________________________________________</a></li>
                <li><a href="index.php?ctrl=tai_khoan">Đăng nhập</a></li>
            </ul>

        </div>-->

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
