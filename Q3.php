<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter Number 1: <input type="number" name="num1" required><br><br>
    Enter Number 2: <input type="number" name="num2" required><br><br>

    <button type="submit" name="operation" value="add">Add</button>
    <button type="submit" name="operation" value="sub">Sub</button>
    <button type="submit" name="operation" value="mul">Mul</button>
    <button type="submit" name="operation" value="div">Div</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n1 = $_POST["num1"];
    $n2 = $_POST["num2"];
    $op = $_POST["operation"];

    if ($op == "add") {
        echo "<h3>Addition = " . ($n1 + $n2) . "</h3>";
    }
    elseif ($op == "sub") {
        echo "<h3>Subtraction = " . ($n1 - $n2) . "</h3>";
    }
    elseif ($op == "mul") {
        echo "<h3>Multiplication = " . ($n1 * $n2) . "</h3>";
    }
    elseif ($op == "div") {
        if ($n2 == 0) {
            echo "<h3>Division by zero not allowed</h3>";
        } else {
            echo "<h3>Division = " . ($n1 / $n2) . "</h3>";
        }
    }
}
?>

</body>
</html>
