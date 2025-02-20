<?php
require __DIR__ . '/src/Collection.php'; 
use App\Collection;

session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = new Collection([
        ['name' => 'Long1', 'price' => 35000000],
        ['name' => 'Long2', 'price' => 20000000],
        ['name' => 'aaaaaa', 'price' => 15000000],
        ['name' => 'áiuhfas', 'price' => 500000],
    ]);
}

$products = $_SESSION['products'];
