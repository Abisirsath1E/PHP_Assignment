<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Your Watch Purchase Bill</h2>

<?php
if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    echo "<h3>No items selected.</h3>";
    exit;
}

$total = 0;

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Item Name</th><th>Price (Rs.)</th></tr>";

foreach ($_SESSION["cart"] as $product) {

    list($name, $price) = explode(" - ", $product);
    $total += (int)$price;

    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$price</td>";
    echo "</tr>";
}

echo "<tr><th>Total Amount</th><th>Rs. $total</th></tr>";
echo "</table>";

session_destroy();  // End the shopping session
?>

</body>
</html>
