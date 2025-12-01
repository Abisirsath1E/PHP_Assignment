<!DOCTYPE html>
<html>
<body>

<h2>Insert New Employee</h2>

<form method="post">
    Employee ID:
    <input type="number" name="emp_id" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" required><br><br>

    Salary:
    <input type="number" name="salary" required><br><br>

    Department:
    <input type="text" name="department" required><br><br>

    <input type="submit" value="Insert Employee">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["emp_id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];
    $dept = $_POST["department"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "company");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert query
    $sql = "INSERT INTO employee (emp_id, name, age, salary, department)
            VALUES ($id, '$name', $age, $salary, '$dept')";

    if (mysqli_query($conn, $sql)) {

        echo "<h3 style='color:green;'>Employee inserted successfully!</h3>";

        echo "<h2>Inserted Employee Record</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Department</th>
                </tr>

                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$age</td>
                    <td>$salary</td>
                    <td>$dept</td>
                </tr>
              </table>";
    } else {
        echo "<h3 style='color:red;'>Error inserting record: " . mysqli_error($conn) . "</h3>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
