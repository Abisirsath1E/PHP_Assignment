<!DOCTYPE html>
<html>
<body>

<h2>Paragraph Analyzer</h2>

<form method="post">
    Enter a paragraph:<br>
    <textarea name="para" rows="8" cols="60" required></textarea><br><br>
    <input type="submit" value="Analyze">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $paragraph = trim($_POST["para"]);

    // Count characters (including spaces)
    $charCount = strlen($paragraph);

    // Count words
    $wordCount = str_word_count($paragraph);

    // Count lines based on newline character
    $lineCount = substr_count($paragraph, "\n") + 1;

    echo "<h3>Analysis Result:</h3>";
    echo "Total Lines: $lineCount <br>";
    echo "Total Words: $wordCount <br>";
    echo "Total Characters: $charCount <br>";
}
?>

</body>
</html>
