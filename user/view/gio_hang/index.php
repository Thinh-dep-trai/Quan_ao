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
              
                <?php if (isset($_SESSION['id'])) { ?>
                    <!-- Nếu đã đăng nhập -->
                    <h2>Thông tin khách hàng</h2>
                    <p>Tên: <?php echo $khachHang['ten']; ?></p>
                    <p>Email: <?php echo $khachHang['email']; ?></p>
                    <p>Số điện thoại: <?php echo $khachHang['so_dien_thoai']; ?></p>
                    <p>Địa chỉ: <?php echo $khachHang['dia_chi']; ?></p>
                    <form id="customer-form" action="index.php?ctrl=gio_hang&action=checkouts" method="post" onsubmit="updateCartOnCheckout();">
                        <!-- Các trường thông tin khác cần hiển thị -->
                        <button type="submit">Đặt hàng</button>
                    </form>
                <?php } else { ?>
                    <!-- Nếu chưa đăng nhập -->
                    <h2>Thông tin khách hàng</h2>
                    <form id="customer-form" action="index.php?ctrl=gio_hang&action=checkout" method="post">
                        <label for="ten">Tên:</label>
                        <input type="text" id="ten" name="ten" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <label for="so_dien_thoai">Số điện thoại:</label>
                        <input type="tel" id="so_dien_thoai" name="so_dien_thoai"><br>

                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" id="dia_chi" name="dia_chi"><br>

                        <!-- Các trường thông tin khác cần nhập -->

                        <button type="submit">Đặt hàng</button>
                    </form>
                <?php } ?>
                <!-- ... -->

                <!-- End of mẫu thông tin khách hàng -->

            <?php } else { ?>
                <p>Giỏ hàng trống.</p>
            <?php } ?>
        <?php } elseif ($action == 'checkout_fail') { ?>
            <p>Đặt hàng thất bại. Vui lòng thử lại sau.</p>
        <?php } ?>
    </body>
</html>
