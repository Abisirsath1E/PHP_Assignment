<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Name: 
    <input type="text" name="name" required><br><br>

    Enter Age: 
    <input type="number" name="age" required><br><br>

    <input type="submit" value="Display Name">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);

    if ($name == "" || $age == "") {
        echo "<p>Please fill all fields.</p>";
    }
    else {
        echo "<h3>Output:</h3>";

        for ($i = 1; $i <= $age; $i++) {
            echo $i . ". " . $name . "<br>";
        }
    }
}
?>

</body>
</html>
