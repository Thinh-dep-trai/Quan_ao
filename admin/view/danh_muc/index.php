<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách danh mục</title>
    </head>
    <body>
        <h1>Danh sách danh mục</h1>

        <a href="index.php?ctrl=danh_muc&action=add">Thêm danh mục</a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($danhMucs as $danhMuc) { ?>
                    <tr>
                        <td><?php echo $danhMuc['id']; ?></td> 
                        <td><?php echo $danhMuc['ten']; ?></td>
                        <td><?php echo $danhMuc['mo_ta']; ?></td>

                        <td>
                            <a href="index.php?ctrl=danh_muc&action=edit&id=<?php echo $danhMuc['id']; ?>">Sửa</a>
                            <a href="index.php?ctrl=danh_muc&action=delete&id=<?php echo $danhMuc['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


