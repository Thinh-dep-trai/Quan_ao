<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi tiết đơn hàng</title>
    </head>
    <body>
        <h1>Chi tiết đơn hàng</h1>


        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Đơn hàng</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donHangChiTiet as $donHangCT) { ?>
                    <tr>
                        <td><?php echo $donHangCT['id']; ?></td> 
                        <td><?php echo $donHangCT['don_hang_id']; ?></td>
                        <td><?php echo $donHangCT['ten_san_pham']; ?></td>
                        <td><?php echo $donHangCT['so_luong']; ?></td>
                        <td><?php echo $donHangCT['gia_san_pham']; ?></td>
                        <td><?php echo $donHangCT['so_luong'] * $donHangCT['gia_san_pham']; ?></td>
                        
                        

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <a href="index.php?ctrl=gio_hang&action=donHangTheoKH">Quay lại</a>
    </body>
</html>


