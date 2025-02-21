<?php

class Collection {
    protected array $items = [];

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function all(): array {
        return $this->items;
    }

    public function add($item): void {
        $this->items[] = $item;
    }

    public function remove(int $index): void {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
    }

    public function count(): int {
        return count($this->items);
    }

    public function filter(callable $callback): Collection {
        return new Collection(array_filter($this->items, $callback));
    }

    public function map(callable $callback): Collection {
        return new Collection(array_map($callback, $this->items));
    }

    public function first() {
        return $this->items[0] ?? null;
    }

    public function last() {
        return end($this->items) ?: null;
    }
}
