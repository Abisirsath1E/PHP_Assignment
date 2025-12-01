<!DOCTYPE html>
<html>
<body>

<h2>Delete Student Record</h2>

<form method="post">
    Enter Student ID to Delete:
    <input type="number" name="sid" required>
    <input type="submit" value="Delete Record">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sid = $_POST["sid"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "school");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Step 1: Check if record exists
    $check = mysqli_query($conn, "SELECT * FROM student WHERE id = $sid");

    if (mysqli_num_rows($check) == 0) {
        echo "<h3 style='color:red;'>No student found with ID $sid</h3>";
    } else {

        // Fetch record before deletion
        $record = mysqli_fetch_assoc($check);

        // Step 2: Delete the record
        mysqli_query($conn, "DELETE FROM student WHERE id = $sid");

        // Step 3: Display deleted record
        echo "<h2>Deleted Student Record</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Course</th>
                </tr>
                <tr>
                    <td>{$record['id']}</td>
                    <td>{$record['name']}</td>
                    <td>{$record['age']}</td>
                    <td>{$record['city']}</td>
                    <td>{$record['course']}</td>
                </tr>
              </table>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
