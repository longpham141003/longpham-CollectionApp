<?php
require_once 'Collection.php';
require_once 'Product.php';
require_once 'Inventory.php';

class Order {
    private Collection $items;
    private Inventory $inventory;

    public function __construct(Inventory $inventory) {
        $this->items = new Collection();
        $this->inventory = $inventory;
    }

    public function addItem(string $name, int $quantity): bool {
        $product = $this->inventory->getProduct($name);
        if ($product && $product->getQuantity() >= $quantity) {
            $this->items->add(new Product($name, $product->getPrice(), $quantity));
            return true;
        }
        return false;
    }

    public function removeItem(string $name): void {
        foreach ($this->items->all() as $index => $item) {
            if ($item->getName() === $name) {
                $this->items->remove($index);
                break;
            }
        }
    }

    public function getTotal(): float {
        return array_reduce($this->items->all(), function ($total, $item) {
            return $total + ($item->getPrice() * $item->getQuantity());
        }, 0);
    }

    public function checkout(): bool {
        foreach ($this->items->all() as $item) {
            if (!$this->inventory->updateProduct($item->getName(), null, $this->inventory->getProduct($item->getName())->getQuantity() - $item->getQuantity())) {
                return false;
            }
        }
        return true;
    }

    public function getItems(): Collection {
        return $this->items;
    }
}
