<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
</head>
<body>
    <h1>Sửa tài khoản</h1>
    
    <form  action="index.php?ctrl=tai_khoan&action=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $taiKhoan['id']; ?>">
        
        <label for="ten_dang_nhap">Tài khoản:</label>
        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="<?php echo $taiKhoan['ten_dang_nhap']; ?>" required>
        
       <label for="password">Mật khẩu:</label>
       <input type="text" id="password" name="PASSWORD" value="<?php echo $taiKhoan['PASSWORD']; ?>" required>
        
        <label for="role">Chức vụ:</label>
        <input type="text" id="role" name="role" value="<?php echo $taiKhoan['role']; ?>" required>
        
        <button type="submit">Lưu</button>
    </form>