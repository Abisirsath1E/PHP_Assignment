<!DOCTYPE html>
<html>
<body>

<h2>Employee Registration with Photo Upload</h2>

<form method="post" enctype="multipart/form-data">

    Employee ID:
    <input type="number" name="empid" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" required><br><br>

    Department:
    <input type="text" name="department" required><br><br>

    Select Image (less than 100 KB):
    <input type="file" name="photo" accept="image/*" required><br><br>

    <input type="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database values
    $empid      = $_POST["empid"];
    $name       = $_POST["name"];
    $age        = $_POST["age"];
    $department = $_POST["department"];

    // File details
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp  = $_FILES["photo"]["tmp_name"];
    $photo_size = $_FILES["photo"]["size"];

    // Check file size (< 100 KB)
    if ($photo_size > 100000) {
        echo "<h3 style='color:red;'>Error: Image must be less than 100 KB!</h3>";
        exit;
    }

    // Destination path
    $dest_path = "impfile/" . $photo_name;

    // Upload file
    if (move_uploaded_file($photo_tmp, $dest_path)) {

        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "company");

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        // Insert employee details
        $sql = "INSERT INTO office (empid, name, age, department, photo)
                VALUES ($empid, '$name', $age, '$department', '$photo_name')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3 style='color:green;'>Employee added successfully!</h3>";

            echo "<h3>Uploaded Details:</h3>";
            echo "Employee ID: $empid <br>";
            echo "Name: $name <br>";
            echo "Age: $age <br>";
            echo "Department: $department <br>";
            echo "Photo: <br><img src='impfile/$photo_name' width='150'>";
        } 
        else {
            echo "<h3 style='color:red;'>Database Error: " . mysqli_error($conn) . "</h3>";
        }

        mysqli_close($conn);
    } 
    else {
        echo "<h3 style='color:red;'>File upload failed!</h3>";
    }
}

?>

</body>
</html>
