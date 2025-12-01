<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a paragraph:<br>
    <textarea name="para" rows="6" cols="50" required></textarea><br><br>
    <input type="submit" value="Count Words">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $paragraph = trim($_POST["para"]);

    // Count words
    $wordCount = str_word_count($paragraph);

    echo "<h3>Total Words: $wordCount</h3>";
}
?>

</body>
</html>
