<!DOCTYPE html>
<html>
<body>

<h2>View Employee Details</h2>

<form method="post">
    Enter Employee ID:
    <input type="number" name="empid" required>
    <input type="submit" value="Show Details">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $empid = $_POST["empid"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "company");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Query to find employee
    $sql = "SELECT * FROM office WHERE empid = $empid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<h3 style='color:red;'>No employee found with ID $empid</h3>";
    }
    else {
        $row = mysqli_fetch_assoc($result);

        echo "<h2>Employee Details</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Department</th>
                    <th>Photo</th>
                </tr>

                <tr>
                    <td>{$row['empid']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['department']}</td>
                    <td><img src='impfile/{$row['photo']}' width='150'></td>
                </tr>
             </table>";
    }

    mysqli_close($conn);
}

?>

</body>
</html>
