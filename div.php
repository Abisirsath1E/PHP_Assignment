<?php
$n1 = $_GET["n1"];
$n2 = $_GET["n2"];

if ($n2 == 0) {
    echo "<h2>Division by zero not allowed</h2>";
} else {
    echo "<h2>Division = " . ($n1 / $n2) . "</h2>";
}
?>
