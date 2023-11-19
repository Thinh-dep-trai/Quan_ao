<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng mới</title>
</head>
<body>
    <h1>Thêm khách hàng mới</h1>
    
    <form action="index.php?ctrl=khach_hang&action=them" method="POST">
        <label for="ten">Tên khách hàng:</label>
        <input type="text" id="ten" name="ten" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="so_dien_thoai">SĐT:</label>
        <input id="so_dien_thoai" name="so_dien_thoai" required>
        
        <label for="dia_chi">Địa chỉ:</label>
        <input id="dia_chi" name="dia_chi" required>
        
        <label for="tai_khoan_id">ID tài khoản:</label>
        <input id="tai_khoan_id" name="tai_khoan_id" required>
        
      
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
