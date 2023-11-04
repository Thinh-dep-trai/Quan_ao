<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Danh sách sản phẩm</title>
    </head>
    <body>
        <div class="right">

            <ul class="danh-muc-list">
                <?php foreach ($danhmuc as $dm) { ?>
                    <li class="danh-muc-item">
                        <a href="index.php?ctrl=san_pham&action=index&id=<?php echo $dm['id']; ?>">
                            <?php echo $dm['ten']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>




            <h3 class="tcsp">Danh Sách Sản Phẩm</h3>
            <hr>
            <div class="boxcenter">
                <?php foreach ($userSanPhams as $sanPham) { ?>
                    <div class="box">
                        <img src="<?php echo $base_url . $sanPham['hinh_anh']; ?>" alt="Hình ảnh sản phẩm" style="max-width: 150px;">
                        <div class="name"><?php echo $sanPham['ten']; ?></div>
                        <div class="gia"><?php echo $sanPham['gia']; ?>đ</div>
                        <div class="mua">
                            <a href="index.php?ctrl=gio_hang&action=addtocart&product_id=<?php echo $sanPham['id']; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </body>
</html>
