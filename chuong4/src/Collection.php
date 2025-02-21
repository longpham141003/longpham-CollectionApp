<?php

class Collection {
    private array $items;

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function all(): array {
        return $this->items;
    }

    public function add($item): void {
        $this->items[] = $item;
    }

    public function count(): int {
        return count($this->items);
    }

    public function first() {
        return count($this->items) > 0 ? $this->items[0] : null;
    }

    public function last() {
        return count($this->items) > 0 ? $this->items[count($this->items) - 1] : null;
    }

    public function remove(int $index): void {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items); 
        }
    }

    public function filter(callable $callback): Collection {
        $filtered = [];
        foreach ($this->items as $item) {
            if ($callback($item)) {
                $filtered[] = $item;
            }
        }
        return new Collection($filtered);
    }

    public function map(callable $callback): Collection {
        $mapped = [];
        foreach ($this->items as $item) {
            $mapped[] = $callback($item);
        }
        return new Collection($mapped);
    }
}
