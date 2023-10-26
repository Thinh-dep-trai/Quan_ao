<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
</head>
<body>
    <h1>Sửa danh mục </h1>
    
    <form  action="index.php?ctrl=danh_muc&action=update" method="POST">
        <input type="hidden" name="id" value="<?php echo $danhMuc['id']; ?>">
        
        <label for="ten">Tên sản phẩm:</label>
        <input type="text" id="ten" name="ten" value="<?php echo $danhMuc['ten']; ?>" required>
        
        <label for="mo_ta">Mô tả:</label>
        <textarea id="mo_ta" name="mo_ta" required><?php echo $danhMuc['mo_ta']; ?></textarea>
        
        
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
