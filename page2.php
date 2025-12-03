<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Online Watch Shop – Page 2</h2>

<form action="add_to_cart.php" method="post">

    <h3>Sonata Gold – Rs. 1800</h3>
    <input type="checkbox" name="items[]" value="Sonata Gold - 1800">

    <h3>Titan Luxury – Rs. 3200</h3>
    <input type="checkbox" name="items[]" value="Titan Luxury - 3200">

    <br><br>
    <input type="submit" name="submit" value="Go to Bill Page">

</form>

</body>
</html>
