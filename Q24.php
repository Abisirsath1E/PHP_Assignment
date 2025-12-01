<!DOCTYPE html>
<html>
<body>

<h2>Employees Sorted by Salary (Ascending)</h2>

<?php

// DB connection
$conn = mysqli_connect("localhost", "root", "", "company");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Query to get employee details sorted by salary
$sql = "SELECT * FROM employee ORDER BY salary ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Salary</th>
                <th>Department</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['emp_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['salary']}</td>
                <td>{$row['department']}</td>
              </tr>";
    }

    echo "</table>";
} 
else {
    echo "<h3>No employee records found.</h3>";
}

mysqli_close($conn);
?>

</body>
</html>
