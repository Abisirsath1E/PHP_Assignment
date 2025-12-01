<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a paragraph:<br>
    <textarea name="para" rows="6" cols="50" required></textarea><br><br>
    <input type="submit" value="Show First 5 Words">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $paragraph = trim($_POST["para"]);

    // Convert paragraph to array of words
    $words = explode(" ", $paragraph);

    // Extract first 5 words
    $firstFive = array_slice($words, 0, 5);

    // Convert array back to string
    $result = implode(" ", $firstFive);

    echo "<h3>First Five Words:</h3>";
    echo "<p>$result</p>";
}
?>

</body>
</html>
