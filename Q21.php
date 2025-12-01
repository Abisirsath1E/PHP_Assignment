<!DOCTYPE html>
<html>
<body>

<h2>Students NOT Living in Mumbai</h2>

<?php

$conn = mysqli_connect("localhost", "root", "", "school");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Step 1: Delete students who live in Mumbai
$delete = "DELETE FROM student WHERE city = 'Mumbai'";
mysqli_query($conn, $delete);

// Step 2: Fetch students who do NOT live in Mumbai
$sql = "SELECT * FROM student WHERE city != 'Mumbai'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
                <th>Course</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['city']}</td>
                <td>{$row['course']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h3>No students found (All Mumbai students deleted).</h3>";
}

mysqli_close($conn);
?>

</body>
</html>
