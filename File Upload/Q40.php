<?php

$first = "A1.txt";
$second = "B1.txt";
$third = "C1.txt";

// Step 1: Read both files into arrays
$first_lines = file($first, FILE_IGNORE_NEW_LINES);
$second_lines = file($second, FILE_IGNORE_NEW_LINES);

// Arrays to store selected lines
$even_lines = [];  // from first.txt
$odd_lines  = [];  // from second.txt

// Step 2: Extract even-numbered lines from first.txt (2,4,6...)
foreach ($first_lines as $index => $line) {
    if (($index + 1) % 2 == 0) {    // because index starts at 0
        $even_lines[] = $line;
    }
}

// Step 3: Extract odd-numbered lines from second.txt (1,3,5...)
foreach ($second_lines as $index => $line) {
    if (($index + 1) % 2 == 1) {
        $odd_lines[] = $line;
    }
}

// Step 4: Prepare output → First all even lines, then all odd lines
$output = "";

foreach ($even_lines as $line) {
    $output .= $line . "\n";
}

foreach ($odd_lines as $line) {
    $output .= $line . "\n";
}

// Step 5: Write to third.txt
file_put_contents($third, $output);

echo "third.txt created successfully!";
?>
