<!DOCTYPE html>
<html>
<body>

<h2>Delete Employee Record</h2>

<form method="post">
    Enter Employee ID:
    <input type="number" name="empid" required>
    <input type="submit" value="Delete Employee">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $empid = $_POST["empid"];

    // DB connection
    $conn = mysqli_connect("localhost", "root", "", "company");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Step 1: Check if employee exists
    $check = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id = $empid");

    if (mysqli_num_rows($check) == 0) {
        echo "<h3 style='color:red;'>No employee found with ID $empid</h3>";
    } else {

        // Fetch employee record before deletion
        $row = mysqli_fetch_assoc($check);

        echo "<h2>Record to be Deleted</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Department</th>
                </tr>
                <tr>
                    <td>{$row['emp_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['salary']}</td>
                    <td>{$row['department']}</td>
                </tr>
              </table>";

        // Step 2: Delete employee record
        mysqli_query($conn, "DELETE FROM employee WHERE emp_id = $empid");

        echo "<h3 style='color:green;'>Employee record deleted successfully!</h3>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
