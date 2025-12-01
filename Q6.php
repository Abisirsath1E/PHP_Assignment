<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a paragraph:<br>
    <textarea name="para" rows="6" cols="50" required></textarea><br><br>
    <input type="submit" value="Replace and with sand">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $paragraph = $_POST["para"];

    // Replace "and" with "sand"
    $updated = str_replace("and", "sand", $paragraph);

    echo "<h3>Updated Paragraph:</h3>";
    echo "<p>$updated</p>";
}
?>

</body>
</html>
