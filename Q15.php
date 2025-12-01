<!DOCTYPE html>
<html>
<body>

<h2>Password Match Checker</h2>

<form method="post">
    Old Password:
    <input type="password" name="oldpass" required><br><br>

    New Password:
    <input type="password" name="newpass" required><br><br>

    <input type="submit" value="Check">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old = $_POST["oldpass"];
    $new = $_POST["newpass"];

    if ($old === $new) {
        echo "<h3>Passwords Matched</h3>";
    } 
    else {
        echo "<h3>Passwords Do Not Match</h3>";
    }
}
?>

</body>
</html>
