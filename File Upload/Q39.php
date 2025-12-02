<?php

$first = "first.txt";
$second = "second.txt";
$third = "third.txt";

// Step 1: Read both files into arrays (line by line)
$first_lines = file($first, FILE_IGNORE_NEW_LINES);
$second_lines = file($second, FILE_IGNORE_NEW_LINES);

// Arrays to hold selected lines
$even_lines = [];   // from first.txt
$odd_lines  = [];   // from second.txt

// Step 2: Extract even-numbered lines from first.txt (2,4,6...)
foreach ($first_lines as $index => $line) {
    if (($index + 1) % 2 == 0) {   // +1 because array index starts at 0
        $even_lines[] = $line;
    }
}

// Step 3: Extract odd-numbered lines from second.txt (1,3,5...)
foreach ($second_lines as $index => $line) {
    if (($index + 1) % 2 == 1) {
        $odd_lines[] = $line;
    }
}

// Step 4: Write to third.txt → even line, then odd line
$output = "";

$max = min(count($even_lines), count($odd_lines));

for ($i = 0; $i < $max; $i++) {
    $output .= $even_lines[$i] . "\n";
    $output .= $odd_lines[$i] . "\n";
}

// Step 5: Write to third file
file_put_contents($third, $output);

echo "third.txt created successfully with merged content!";
?>
