<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách sản phẩm</title>
    </head>
    <body>
        <h1>Danh sách sản phẩm</h1>

        <form action="index.php?ctrl=san_pham&action=search" method="GET">
            <input type="text" name="keyword" placeholder="Nhập tên sản phẩm cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hình Ảnh</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($userSanPhams as $sanPham) { ?>
                    <tr>
                        <td><?php echo $sanPham['id']; ?></td>
                        <td><?php echo $sanPham['ten']; ?></td>
                        <td><?php echo $sanPham['mo_ta']; ?></td>
                        <td><?php echo $sanPham['gia']; ?></td>
                        <td>
                            <img src="<?php echo $base_url . $sanPham['hinh_anh']; ?>" alt="Hình ảnh sản phẩm" width="100">
                        </td>
                        <td>
                            <a href="index.php?ctrl=gio_hang&action=addtocart&product_id=<?php echo $sanPham['id']; ?>">Thêm vào giỏ hàng</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
