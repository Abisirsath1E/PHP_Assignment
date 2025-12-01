<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Name: 
    <input type="text" name="name" required><br><br>

    Enter Age: 
    <input type="number" name="age" required><br><br>

    <input type="submit" value="Check Eligibility">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $age = $_POST["age"];

    if ($age < 18) {
        echo "<h3>$name is not eligible for voting</h3>";
    } else {
        echo "<h3>$name is eligible for voting</h3>";
    }
}
?>

</body>
</html>
