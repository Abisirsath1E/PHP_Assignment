<!DOCTYPE html>
<html>
<body>

<h2>Employee Registration Form</h2>

<form method="post" enctype="multipart/form-data">

    Emp ID:
    <input type="number" name="empid" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" required><br><br>

    Address:
    <textarea name="address" rows="3" cols="30" required></textarea><br><br>

    Mobile Number:
    <input type="text" name="mobile" pattern="[0-9]{10}" required><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Other" required> Other
    <br><br>

    Hobbies:<br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
    <input type="checkbox" name="hobbies[]" value="Music"> Music
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling
    <br><br>

    Upload Photograph (jpg / jpeg / png, < 100 KB):
    <input type="file" name="photo" accept="image/*" required><br><br>

    <input type="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $empid   = $_POST["empid"];
    $name    = $_POST["name"];
    $age     = $_POST["age"];
    $address = $_POST["address"];
    $mobile  = $_POST["mobile"];
    $gender  = $_POST["gender"];
    $hobbies = implode(", ", $_POST["hobbies"]);

    // File information
    $file_name = $_FILES["photo"]["name"];
    $file_tmp  = $_FILES["photo"]["tmp_name"];
    $file_size = $_FILES["photo"]["size"];

    // File extension
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validate size (<100 KB)
    if ($file_size > 100000) {
        echo "<h3 style='color:red;'>Error: File size must be less than 100 KB!</h3>";
        exit;
    }

    // Validate file type
    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
        echo "<h3 style='color:red;'>Error: Only JPG, JPEG, PNG files allowed!</h3>";
        exit;
    }

    // Read file as BLOB
    $photo_blob = addslashes(file_get_contents($file_tmp));

    // DB Connection
    $conn = mysqli_connect("localhost", "root", "", "companydb");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Insert query
    $sql = "INSERT INTO EMP_TABLE (empid, name, age, address, mobile, gender, hobbies, photo)
            VALUES ($empid, '$name', $age, '$address', '$mobile', '$gender', '$hobbies', '$photo_blob')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3 style='color:green;'>Employee details stored successfully!</h3>";
    } 
    else {
        echo "<h3 style='color:red;'>Error: " . mysqli_error($conn) . "</h3>";
    }

    mysqli_close($conn);
}

?>

</body>
</html>
