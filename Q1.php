<?php
// Associative array of fruit prices
$fruitPrices = array(
    "apple" => 120,
    "banana" => 40,
    "mango" => 150,
    "orange" => 60
);

// Indexed array of student marks
$studentMarks = array(55, 78, 45, 90, 62);

// 1. Sort fruit prices by value (ascending)
$priceAsc = $fruitPrices;
asort($priceAsc);

// 2. Sort student marks in descending order
$marksDesc = $studentMarks;
rsort($marksDesc);

// 3. Sort fruit prices by key (ascending)
$priceByFruitAsc = $fruitPrices;
ksort($priceByFruitAsc);

// 4. Sort fruit prices by value (descending)
$priceDesc = $fruitPrices;
arsort($priceDesc);

// Display Output
echo "<pre>";
echo "1. Fruit Prices Sorted by Price (Ascending):\n";
print_r($priceAsc);

echo "\n2. Student Marks Sorted in Descending Order:\n";
print_r($marksDesc);

echo "\n3. Fruit Prices Sorted by Fruit Name (Ascending):\n";
print_r($priceByFruitAsc);

echo "\n4. Fruit Prices Sorted by Price (Descending):\n";
print_r($priceDesc);
echo "</pre>";
?>
