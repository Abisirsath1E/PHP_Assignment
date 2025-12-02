<!DOCTYPE html>
<html>
<body>

<h2>Employee Registration (Photo + Degree Upload)</h2>

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

    Upload UG Degree (PDF only, < 100 KB):
    <input type="file" name="degree" accept="application/pdf" required><br><br>

    <input type="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get basic form data
    $empid   = $_POST["empid"];
    $name    = $_POST["name"];
    $age     = $_POST["age"];
    $address = $_POST["address"];
    $mobile  = $_POST["mobile"];
    $gender  = $_POST["gender"];
    $hobbies = implode(", ", $_POST["hobbies"]);

    // -------------------- PHOTO VALIDATION ---------------------
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp  = $_FILES["photo"]["tmp_name"];
    $photo_size = $_FILES["photo"]["size"];
    $photo_ext  = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

    if ($photo_size > 100000) {
        echo "<h3 style='color:red;'>Error: Photo must be less than 100 KB!</h3>";
        exit;
    }

    if (!in_array($photo_ext, ["jpg", "jpeg", "png"])) {
        echo "<h3 style='color:red;'>Error: Photo must be JPG, JPEG or PNG!</h3>";
        exit;
    }

    // Create unique name
    $new_photo_name = "PHOTO_" . time() . "." . $photo_ext;
    $photo_dest = "EMP/" . $new_photo_name;

    move_uploaded_file($photo_tmp, $photo_dest);

    // -------------------- DEGREE VALIDATION ---------------------
    $degree_name = $_FILES["degree"]["name"];
    $degree_tmp  = $_FILES["degree"]["tmp_name"];
    $degree_size = $_FILES["degree"]["size"];
    $degree_ext  = strtolower(pathinfo($degree_name, PATHINFO_EXTENSION));

    if ($degree_size > 100000) {
        echo "<h3 style='color:red;'>Error: Degree PDF must be less than 100 KB!</h3>";
        exit;
    }

    if ($degree_ext != "pdf") {
        echo "<h3 style='color:red;'>Error: UG Degree must be in PDF format!</h3>";
        exit;
    }

    $new_degree_name = "DEGREE_" . time() . ".pdf";
    $degree_dest = "EMP/" . $new_degree_name;

    move_uploaded_file($degree_tmp, $degree_dest);

    // -------------------- DATABASE INSERT ---------------------
    $conn = mysqli_connect("localhost", "root", "", "companydb");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO EMP_TABLE
            (empid, name, age, address, mobile, gender, hobbies, photo, degree_path)
            VALUES 
            ($empid, '$name', $age, '$address', '$mobile', '$gender', '$hobbies', 
             '$photo_dest', '$degree_dest')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3 style='color:green;'>Employee details saved successfully!</h3>";

        echo "<h3>Stored Details:</h3>";
        echo "Emp ID: $empid <br>";
        echo "Name: $name <br>";
        echo "Age: $age <br>";
        echo "Address: $address <br>";
        echo "Mobile: $mobile <br>";
        echo "Gender: $gender <br>";
        echo "Hobbies: $hobbies <br><br>";

        echo "Photograph:<br><img src='$photo_dest' width='150'><br><br>";
        echo "UG Degree: <a href='$degree_dest' target='_blank'>Download PDF</a>";
    }
    else {
        echo "<h3 style='color:red;'>DB Error: " . mysqli_error($conn) . "</h3>";
    }

    mysqli_close($conn);
}

?>

</body>
</html>
