<?php
require_once 'Collection.php';
require_once 'Product.php';

class Inventory {
    private Collection $products;

    public function __construct() {
        $this->products = new Collection();
    }

    public function addProduct(Product $product): void {
        $this->products->add($product);
    }

    public function removeProduct(string $name): bool {
        foreach ($this->products->all() as $index => $product) {
            if ($product->getName() === $name) {
                $this->products->remove($index);
                return true;
            }
        }
        return false;
    }

    public function updateProduct(string $name, ?float $price = null, ?int $quantity = null): bool {
        foreach ($this->products->all() as $product) {
            if ($product->getName() === $name) {
                if ($price !== null) $product->setPrice($price);
                if ($quantity !== null) $product->setQuantity($quantity);
                return true;
            }
        }
        return false;
    }

    public function getProduct(string $name): ?Product {
        foreach ($this->products->all() as $product) {
            if ($product->getName() === $name) {
                return $product;
            }
        }
        return null;
    }

    public function getProducts(): Collection {
        return $this->products;
    }

    public function totalValue(): float {
        return array_reduce($this->products->all(), function ($total, $product) {
            return $total + ($product->getPrice() * $product->getQuantity());
        }, 0);
    }
}
