<?php

class Product {
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function display(): string {
        return "{$this->name} - " . number_format($this->price, 0, ',', '.') . " VND - Số lượng: {$this->quantity}";
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }

}
