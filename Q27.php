<!DOCTYPE html>
<html>
<body>

<h2>Delete Employees With Salary Less Than 20000</h2>

<?php

// Connect to database (company)
$conn = mysqli_connect("localhost", "root", "", "company");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Delete query
$sql = "DELETE FROM employee WHERE salary < 20000";
mysqli_query($conn, $sql);

// Count deleted records
$deleted = mysqli_affected_rows($conn);

echo "<h3>Total Deleted Records: $deleted</h3>";

mysqli_close($conn);
?>

</body>
</html>
