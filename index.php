<?php
require_once 'src/Inventory.php';
require_once 'src/Order.php';

$inventory = new Inventory();
$inventory->addProduct(new Product('Laptop', 20000000, 10));
$inventory->addProduct(new Product('Điện thoại', 10000000, 20));
$inventory->addProduct(new Product('Tai nghe', 500000, 50));

$inventory->addProduct(new Product('Bàn phím', 800000, 15));

$inventory->updateProduct('Laptop', 19000000, 12);

$inventory->removeProduct('Tai nghe');

echo "<h2>Danh sách sản phẩm trong kho</h2>";
foreach ($inventory->getProducts()->all() as $product) {
    echo "<p>" . $product->display() . "</p>";
}

$order = new Order($inventory);
$order->addItem('Laptop', 2);
$order->addItem('Điện thoại', 1);

echo "<h2>Giỏ hàng</h2>";
foreach ($order->getItems()->all() as $item) {
    echo "<p>" . $item->display() . "</p>";
}

echo "<h3>Tổng tiền: " . number_format($order->getTotal(), 0, ',', '.') . " VND</h3>";

if ($order->checkout()) {
    echo "<p>Thanh toán thành công!</p>";
} else {
    echo "<p>Thanh toán thất bại!</p>";
}

echo "<h2>Kho hàng sau thanh toán</h2>";
foreach ($inventory->getProducts()->all() as $product) {
    echo "<p>" . $product->display() . "</p>";
}
?>
