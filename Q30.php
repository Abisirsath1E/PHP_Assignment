<!DOCTYPE html>
<html>
<body>

<h2>Select a Course</h2>

<form method="post">

<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM course";
$result = mysqli_query($conn, $sql);

// Check if values exist
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $cid   = $row['cid'];
        $cname = $row['cname'];

        echo "<input type='radio' name='course' value='$cname' required> $cname <br>";
    }

} else {
    echo "<h3>No courses found in table.</h3>";
}

mysqli_close($conn);
?>

<br>
<input type="submit" value="Submit">

</form>

</body>
</html>
