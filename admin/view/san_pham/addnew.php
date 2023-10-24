<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>
    
    <form action="index.php?ctrl=san_pham&action=them" method="POST">
        <label for="ten">Tên sản phẩm:</label>
        <input type="text" id="ten" name="ten" required>
        
        <label for="mo_ta">Mô tả:</label>
        <textarea id="mo_ta" name="mo_ta" required></textarea>
        
        <label for="gia">Giá:</label>
        <input type="number" id="gia" name="gia" required>
        
        <label for="so_luong">Số lượng:</label>
        <input type="number" id="so_luong" name="so_luong" required>
        
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
