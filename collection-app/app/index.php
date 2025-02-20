<?php
require __DIR__ . '/src/Collection.php'; 
use App\Collection;

$products = new Collection([
    ['name' => 'Laptop', 'price' => 1500],
    ['name' => 'Phone', 'price' => 800],
    ['name' => 'Tablet', 'price' => 600],
    ['name' => 'Headphone', 'price' => 200],
]);


$minPrice = $_GET['min_price'] ?? 0;
$filteredProducts = $products->filter(fn($p) => $p['price'] >= $minPrice);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <form method="GET">
        <label for="min_price">Lọc giá trên:</label>
        <input type="number" name="min_price" value="<?php echo $minPrice; ?>">
        <button type="submit">Lọc</button>
    </form>

    <ul>
        <?php foreach ($filteredProducts->all() as $product): ?>
            <li><?php echo $product['name'] . ' - $' . $product['price']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
