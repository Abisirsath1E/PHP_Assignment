<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Online Laptop Shop – Page 2</h2>

<form action="cart_handler.php" method="post">

    <h3>Lenovo ThinkPad – Rs. 60000</h3>
    <input type="checkbox" name="laptops[]" value="Lenovo ThinkPad - 60000">

    <h3>Asus VivoBook – Rs. 48000</h3>
    <input type="checkbox" name="laptops[]" value="Asus VivoBook - 48000">

    <br><br>
    <input type="submit" name="submit" value="Generate Bill">
</form>

</body>
</html>
