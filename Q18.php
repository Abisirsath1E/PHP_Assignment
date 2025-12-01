<!DOCTYPE html>
<html>
<body>

<h2>Employee Registration</h2>

<form method="post">

    Employee No: 
    <input type="number" name="empno" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" required><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Other" required> Other
    <br><br>

    Address:
    <textarea name="address" rows="3" cols="40" required></textarea><br><br>

    <input type="submit" value="Submit">
</form>

<?php
// When form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $empno = $_POST["empno"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "company");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if employee already exists
    $check = mysqli_query($conn, "SELECT * FROM emp WHERE empno = $empno");

    if (mysqli_num_rows($check) > 0) {
        echo "<h3 style='color:red;'>Employee record already exists!</h3>";
    } else {

        // Insert new record
        $sql = "INSERT INTO emp VALUES ($empno, '$name', $age, '$gender', '$address')";

        if (mysqli_query($conn, $sql)) {

            // Fetch and display inserted record
            $result = mysqli_query($conn, "SELECT * FROM emp WHERE empno = $empno");
            $row = mysqli_fetch_assoc($result);

            echo "<h2>Inserted Employee Details</h2>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>
                    <tr>
                        <th>Employee No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                    </tr>
                    <tr>
                        <td>{$row['empno']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['address']}</td>
                    </tr>
                  </table>";
        } 
        else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

</body>
</html>
