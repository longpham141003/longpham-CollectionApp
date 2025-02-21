<?php
require __DIR__ . '/src/Collection.php';

require __DIR__ . '/src/Product.php';


session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = new Collection([
        new Product('Laptop', 20000000),
        new Product('Điện thoại', 10000000),
        new Product('Tai nghe', 500000)
    ]);
}

$products = $_SESSION['products'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['price'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = (float)$_POST['price'];

    $newProduct = new Product($name, $price);
    $products->add($newProduct);

    $_SESSION['products'] = $products;
    header("Location: index.php");
    exit;
}

$minPrice = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;

$filteredProducts = $products->filter(function ($product) use ($minPrice) {
    return $product->getPrice() >= $minPrice;
});

if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    $products->remove($index);
    $_SESSION['products'] = $products;
    header("Location: index.php");
    exit;
}
