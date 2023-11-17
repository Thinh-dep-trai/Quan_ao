<!DOCTYPE html>
<html>
    <head>
        <title>Giỏ hàng</title>
        <script type="text/javascript">
            // Tăng
            function increaseQuantity(itemId) {
                var quantityInput = document.getElementById('quantity_' + itemId);
                var currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
                updateSubtotal(itemId, currentQuantity + 1);
            }

            // Giảm
            function decreaseQuantity(itemId) {
                var quantityInput = document.getElementById('quantity_' + itemId);
                var currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                    updateSubtotal(itemId, currentQuantity - 1);
                }
            }

            // Hàm tính thành tiền và cập nhật nó
            function updateSubtotal(itemId, quantity) {
                var price = document.getElementById('price_' + itemId).innerHTML;
                var subtotal = price * quantity;
                document.getElementById('subtotal_' + itemId).textContent = subtotal.toFixed(2);
            }

            // Hàm cập nhật giỏ hàng trước khi đặt hàng
            function updateCartOnCheckout() {
                var cartData = [];

                // Lặp qua các sản phẩm trong giỏ hàng và lấy thông tin cần thiết
<?php foreach ($_SESSION['cart'] as $item) { ?>
                    var itemId = <?php echo $item['id']; ?>;
                    var quantity = parseInt(document.getElementById('quantity_' + itemId).value);

                    cartData.push({
                        id: itemId,
                        quantity: quantity
                    });
<?php } ?>

                // Gửi dữ liệu lên server để cập nhật giỏ hàng
                fetch('index.php?ctrl=gio_hang&action=update_cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(cartData)
                })

            }
        </script>
    </head>
    <body onload="onPageLoad();">
        <h1>Giỏ hàng</h1>

        <?php if ($action == 'index') { ?>
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php foreach ($_SESSION['cart'] as $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><span id="price_<?php echo $item['id']; ?>"><?php echo $item['price']; ?></span></td>
                            <td>
                                <button onclick="decreaseQuantity(<?php echo $item['id']; ?>)">-</button>
                                <input id="quantity_<?php echo $item['id']; ?>" type="text" value="<?php echo $item['quantity']; ?>">
                                <button onclick="increaseQuantity(<?php echo $item['id']; ?>)">+</button>
                            </td>
                            <td><span id="subtotal_<?php echo $item['id']; ?>"><?php echo $item['price'] * $item['quantity']; ?></span></td>
                            <td><a href="index.php?ctrl=gio_hang&action=delete&product_id=<?php echo $item['id']; ?>">Xóa</a></td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Mẫu thông tin khách hàng -->
                <h2>Thông tin khách hàng</h2>
                <form id="customer-form" action="index.php?ctrl=gio_hang&action=checkout" method="post">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="ten" required><br>

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required><br>

                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="so_dien_thoai"><br>

                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="dia_chi"><br>

                    <button type="submit" onclick="updateCartOnCheckout();">Đặt hàng</button>
                </form>
                <!-- End of mẫu thông tin khách hàng -->

            <?php } else { ?>
                <p>Giỏ hàng trống.</p>
            <?php } ?>
        <?php } elseif ($action == 'checkout_fail') { ?>
            <p>Đặt hàng thất bại. Vui lòng thử lại sau.</p>
        <?php } ?>
    </body>
</html>
