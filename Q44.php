<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Online Watch Shop – Page 1</h2>

<form action="add_to_cart.php" method="post">

    <h3>Casio Vintage – Rs. 1500</h3>
    <input type="checkbox" name="items[]" value="Casio Vintage - 1500">

    <h3>Fastrack Classic – Rs. 2200</h3>
    <input type="checkbox" name="items[]" value="Fastrack Classic - 2200">

    <br><br>
    <input type="submit" name="submit" value="Add to Cart & Go to Page 2">

</form>

</body>
</html>
