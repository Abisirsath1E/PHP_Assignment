<!DOCTYPE html>
<html>
<body>

<h2>Reverse & Uppercase Converter</h2>

<form method="post">

    <b>Enter Paragraph:</b><br>
    <textarea name="inputText" rows="6" cols="50" required></textarea><br><br>

    <input type="submit" value="Convert"><br><br>

    <b>Output:</b><br>
    <textarea rows="6" cols="50">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["inputText"];

    // Convert to uppercase
    $upper = strtoupper($text);

    // Reverse string
    $reverse = strrev($upper);

    echo $reverse;
}
?>
    </textarea>

</form>

</body>
</html>
