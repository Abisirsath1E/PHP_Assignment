<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Selected Laptops – Final Bill</h2>

<?php
if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    echo "<h3>No laptops selected.</h3>";
    exit;
}

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Laptop Model</th><th>Price (Rs.)</th></tr>";

$total = 0;

foreach ($_SESSION["cart"] as $lap) {

    list($model, $price) = explode(" - ", $lap);
    $total += (int)$price;

    echo "<tr>";
    echo "<td>$model</td>";
    echo "<td>$price</td>";
    echo "</tr>";
}

echo "<tr><th>Total</th><th>Rs. $total</th></tr>";
echo "</table>";

session_destroy();
?>

</body>
</html>
