<?php
namespace App;

class Collection {
    protected array $items;

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function all(): array {
        return $this->items;
    }

    public function push($item): self {
        $this->items[] = $item;
        return $this;
    }

    public function filter(callable $callback): self {
        return new self(array_filter($this->items, $callback));
    }

    public function map(callable $callback): self {
        return new self(array_map($callback, $this->items));
    }

    public function first() {
        return $this->items[0] ?? null;
    }

    public function last() {
        return $this->items[count($this->items) - 1] ?? null;
    }

    public function remove(int $index): self {
        if (isset($this->items[$index])) {
            array_splice($this->items, $index, 1);
        }
        return $this;
    }
}
