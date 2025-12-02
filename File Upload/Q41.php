<?php

$file = "Hello world.txt";

// Check if file exists
if (!file_exists($file)) {
    die("File not found!");
}

// Read file content
$content = file_get_contents($file);

// Count characters (including spaces)
$charCount = strlen($content);

// Read file as array (each line is an element)
$lines = file($file, FILE_IGNORE_NEW_LINES);

// Count lines
$lineCount = count($lines);

// Count words
$wordCount = str_word_count($content);

// Display output
echo "<h2>File Statistics for first.txt</h2>";
echo "Total Lines: $lineCount <br>";
echo "Total Words: $wordCount <br>";
echo "Total Characters: $charCount <br>";

?>
