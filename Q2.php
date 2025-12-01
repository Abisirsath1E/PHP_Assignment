<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter your name: 
    <input type="text" name="username">
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["username"]);

    // Empty check
    if ($name == "") {
        echo "<p>Please enter a name.</p>";
    }
    // Length check
    elseif (strlen($name) < 4) {
        echo "<p>Name must have at least 4 characters</p>";
    }
    else {
        echo "<p>Hello $name</p>";
    }
}
?>

</body>
</html>
