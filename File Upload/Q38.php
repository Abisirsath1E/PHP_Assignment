<?php
// File names (relative to this script)
$file1 = "file1.txt";
$file2 = "file2.txt";

// Make sure both files exist
if (!file_exists($file1) || !file_exists($file2)) {
    die("One or both files do not exist.");
}

// Read contents
$content1 = file_get_contents($file1);
$content2 = file_get_contents($file2);

// Swap: write content2 to file1 and content1 to file2
file_put_contents($file1, $content2);
file_put_contents($file2, $content1);

echo "Content of the two files swapped successfully!";
?>
