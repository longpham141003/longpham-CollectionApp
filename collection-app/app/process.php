<?php
require 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['price'])) {
    $products->push([
        'name' => htmlspecialchars($_POST['name']),
        'price' => (float) $_POST['price']
    ]);
    $_SESSION['products'] = $products; 
    header("Location: index.php"); 
    exit;
}

// Xử lý xóa sản phẩm
if (isset($_GET['delete'])) {
    $index = (int) $_GET['delete'];
    $products->remove($index);
    $_SESSION['products'] = $products; 
    header("Location: index.php");
    exit;
}

$minPrice = $_GET['min_price'] ?? 0;
$filteredProducts = $products->filter(fn($p) => $p['price'] >= $minPrice);
?>