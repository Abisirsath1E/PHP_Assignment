<?php

$directory = "C:/xampp/htdocs/PHP_Assignment/PHP_Assignment/File Upload";
$filename  = "test.txt";
$filepath  = $directory . "/" . $filename;

// Check if directory exists
if (!is_dir($directory)) {
    die("Directory does not exist!");
}

// Check if file exists inside directory
if (file_exists($filepath)) {

    // Open file in append mode and write message
    $message = "Hello we have found the file\n";
    file_put_contents($filepath, $message, FILE_APPEND);

    echo "<h3>File found! Message written successfully.</h3>";

} else {

    // File does not exist
    echo "<h3>Sorry we haven't found the file</h3>";
}

?>