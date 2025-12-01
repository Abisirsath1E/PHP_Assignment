<?php

// Indexed array of student marks
$marks = array(45, 78, 90, 62, 55);

// Associative array of fruit prices
$fruitPrices = array(
    "apple" => 120,
    "banana" => 40,
    "mango" => 150,
    "orange" => 60
);

echo "<pre>";

// 1. sort() — ascending order (indexed array)
$sortedMarks = $marks;
sort($sortedMarks);
echo "1. sort() - Marks Ascending:\n";
print_r($sortedMarks);

// 2. rsort() — descending order (indexed array)
$sortedMarksDesc = $marks;
rsort($sortedMarksDesc);
echo "\n2. rsort() - Marks Descending:\n";
print_r($sortedMarksDesc);

// 3. asort() — ascending order by value (associative array)
$fruitByPriceAsc = $fruitPrices;
asort($fruitByPriceAsc);
echo "\n3. asort() - Fruit Prices Ascending (by value):\n";
print_r($fruitByPriceAsc);

// 4. ksort() — ascending order by key
$fruitByNameAsc = $fruitPrices;
ksort($fruitByNameAsc);
echo "\n4. ksort() - Fruit Prices Ascending (by key):\n";
print_r($fruitByNameAsc);

// 5. arsort() — descending order by value
$fruitPriceDesc = $fruitPrices;
arsort($fruitPriceDesc);
echo "\n5. arsort() - Fruit Prices Descending (by value):\n";
print_r($fruitPriceDesc);

// 6. krsort() — descending order by key
$fruitNameDesc = $fruitPrices;
krsort($fruitNameDesc);
echo "\n6. krsort() - Fruit Prices Descending (by key):\n";
print_r($fruitNameDesc);

echo "</pre>";
?>
