<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Online Laptop Shop – Page 1</h2>

<form action="cart_handler.php" method="post">

    <h3>Dell Inspiron – Rs. 45000</h3>
    <input type="checkbox" name="laptops[]" value="Dell Inspiron - 45000">

    <h3>HP Pavilion – Rs. 52000</h3>
    <input type="checkbox" name="laptops[]" value="HP Pavilion - 52000">

    <br><br>
    <input type="submit" name="submit" value="Next Page">
</form>

</body>
</html>
