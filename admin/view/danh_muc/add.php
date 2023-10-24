<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục mới</title>
</head>
<body>
    <h1>Thêm danh mục mới</h1>
    
    <form action="index.php?ctrl=danh_muc&action=store" method="POST">
        <label for="ten">Tên sản phẩm:</label>
        <input type="text" id="ten" name="ten" required>
        
        <label for="mo_ta">Mô tả:</label>
        <textarea id="mo_ta" name="mo_ta" required></textarea>
      
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
