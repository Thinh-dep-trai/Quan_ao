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
            </ul>

        </div>

        <form action="index.php" method="GET">
            <input type="hidden" name="ctrl" value="san_pham">
            <input type="hidden" name="action" value="search">
            <input type="text" name="keyword" placeholder="Nhập tên sản phẩm cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form>


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
