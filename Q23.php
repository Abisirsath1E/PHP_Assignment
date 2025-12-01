<!DOCTYPE html>
<html>
<body>

<h2>Update Student Record</h2>

<form method="post">
    Enter Student ID:
    <input type="number" name="id" required><br><br>

    New Name:
    <input type="text" name="name" required><br><br>

    New Age:
    <input type="number" name="age" required><br><br>

    New City:
    <input type="text" name="city" required><br><br>

    New Course:
    <input type="text" name="course" required><br><br>

    <input type="submit" value="Update Record">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $city = $_POST["city"];
    $course = $_POST["course"];

    // DB connection
    $conn = mysqli_connect("localhost", "root", "", "school");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Step 1: Check if record exists
    $check = mysqli_query($conn, "SELECT * FROM student WHERE id = $id");

    if (mysqli_num_rows($check) == 0) {
        echo "<h3 style='color:red;'>Student with ID $id not found!</h3>";
    } else {

        // Step 2: Update record
        $update = "UPDATE student 
                   SET name='$name', age=$age, city='$city', course='$course'
                   WHERE id=$id";

        mysqli_query($conn, $update);

        // Step 3: Fetch updated record
        $result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        echo "<h2>Updated Student Record</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Course</th>
                </tr>
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['course']}</td>
                </tr>
              </table>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
