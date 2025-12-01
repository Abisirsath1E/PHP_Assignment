<!DOCTYPE html>
<html>
<body>

<h2>Select Fruits</h2>

<form method="post">

<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "shopdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM fruit";
$result = mysqli_query($conn, $sql);

// Check if fruits found
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['fid'];
        $name = $row['fname'];

        echo "<input type='checkbox' name='fruits[]' value='$name'> $name <br>";
    }

} else {
    echo "<h3>No fruits found in table.</h3>";
}

mysqli_close($conn);
?>

<br>
<input type="submit" value="Submit">

</form>

</body>
</html>
