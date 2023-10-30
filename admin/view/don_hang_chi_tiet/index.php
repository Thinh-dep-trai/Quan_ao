<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chi tiết đơn hàng</title>
</head>
<body>
    <h1>Danh sách chi tiết đơn hàng</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Chi tiết</th>
                <th>ID Đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donHangCTs as $dhct) { ?>
                <tr>
                    <td><?php echo $dhct['id']; ?></td>
                    <td><?php echo $dhct['don_hang_id']; ?></td>
                    <td><?php echo $dhct['ten_san_pham']; ?></td>
                    <td><?php echo $dhct['so_luong']; ?></td>
                    <td><?php echo $dhct['gia_san_pham']; ?></td>
                    <td><?php echo $dhct['so_luong'] * $dhct['gia_san_pham']; ?></td>
                    <td>
                        <a href="index.php?ctrl=don_hang_chi_tiet&action=edit&id=<?php echo $dhct['id']; ?>">Sửa</a>
                        <a href="index.php?ctrl=don_hang_chi_tiet&action=delete&id=<?php echo $dhct['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="index.php?ctrl=don_hang_chi_tiet&action=add">Thêm mới</a><br>
    <a href="index.php?ctrl=don_hang">Quay lại danh sách đơn hàng</a>
</body>
</html>
