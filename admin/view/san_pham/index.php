<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách sản phẩm</title>
    </head>
    <body>
        <h1>Danh sách sản phẩm</h1>

        <form action="index.php" method="GET">
            <input type="hidden" name="ctrl" value="san_pham">
            <input type="hidden" name="action" value="search">
            <input type="text" name="keyword" placeholder="Nhập tên sản phẩm cần tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form>

        <a href="index.php?ctrl=san_pham&action=addnew">Thêm sản phẩm</a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hình Ảnh</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sanPhams as $sanPham) { ?>
                    <tr>
                        <td><?php echo $sanPham['id']; ?></td> 
                        <td><?php echo $sanPham['ten']; ?></td>
                        <td><?php echo $sanPham['mo_ta']; ?></td>
                        <td><?php echo $sanPham['gia']; ?></td>
                        <td>
                            <img src="/QuanAo/zimage/<?php echo $sanPham['hinh_anh']; ?>" alt="Hình ảnh sản phẩm" width="100">
                        </td>


                        <td><?php echo $sanPham['so_luong']; ?></td>

                        <td>
                            <!--<a href="san_pham.php?action=edit&id=<?php echo $sanPham['id']; ?>">Danh mục</a>-->
                            <a href="index.php?ctrl=san_pham&action=edit&id=<?php echo $sanPham['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=san_pham&action=del&id=<?php echo $sanPham['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
