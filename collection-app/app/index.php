<?php
require 'process.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Danh sách sản phẩm</h2>

    <form method="GET">
        <label for="min_price">Lọc giá trên:</label>
        <input type="number" name="min_price" value="<?php echo htmlspecialchars($minPrice); ?>">
        <button type="submit">Lọc</button>
    </form>

    <ul class="product-list">
        <?php foreach ($filteredProducts->all() as $index => $product): ?>
            <li class="product">
                <?php echo $product->display(); ?>
                <a class="delete-btn" href="process.php?delete=<?php echo $index; ?>">Xóa</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Thêm sản phẩm mới</h3>
    <form method="POST" action="process.php">
        <input type="text" name="name" placeholder="Tên sản phẩm" required>
        <input type="number" name="price" placeholder="Giá" required>
        <button type="submit">Thêm</button>
    </form>
</div>

</body>
</html>
