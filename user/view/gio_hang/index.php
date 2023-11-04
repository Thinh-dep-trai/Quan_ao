<!DOCTYPE html>
<html>
    <head>
        <title>Giỏ hàng</title>
        <script type="text/javascript">
            //Tăng
            function increaseQuantity(itemId) {
                var quantityInput = document.getElementById('quantity_' + itemId);
                var currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
            }
            //Giảm
            function decreaseQuantity(itemId) {
                var quantityInput = document.getElementById('quantity_' + itemId);
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            }
        </script>
    </head>
    <body>
        <h1>Giỏ hàng</h1>

        <?php if ($action == 'index') { ?>
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Xóa</th>
                    </tr>
                    <?php foreach ($_SESSION['cart'] as $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td>
                                <button onclick="decreaseQuantity(<?php echo $item['id']; ?>)">-</button>
                                <input id="quantity_<?php echo $item['id']; ?>" type="text" value="<?php echo $item['quantity']; ?>">
                                <button onclick="increaseQuantity(<?php echo $item['id']; ?>)">+</button>
                            </td>
                            <td><a href="index.php?action=delete&product_id=<?php echo $item['id']; ?>">Xóa</a></td>
                        </tr>
                    <?php } ?>
                </table>
                <a href="index.php?action=checkout">Đặt hàng</a>
            <?php } else { ?>
                <p>Giỏ hàng trống.</p>
            <?php } ?>
        <?php } elseif ($action == 'checkout_fail') { ?>
            <p>Đặt hàng thất bại. Vui lòng thử lại sau.</p>
        <?php } ?>

    </body>
</html>
