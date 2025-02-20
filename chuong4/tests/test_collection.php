<?php

require '../src/Collection.php';

$collection = new Collection([1, 2, 3, 4]);

echo "All: ";
print_r($collection->all());

echo "First: " . $collection->first() . PHP_EOL;
echo "Last: " . $collection->last() . PHP_EOL;

$filtered = $collection->filter(fn($item) => $item > 2);
echo "Filtered ( > 2 ): ";  
print_r($filtered->all());
