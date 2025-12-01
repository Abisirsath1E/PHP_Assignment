<?php
// Connect to database
$connection = new mysqli("localhost", "root", "", "company_db");
if ($connection->connect_error) {
    die("Database Connection Failed: " . $connection->connect_error);
}

// Check if form is submitted
if(isset($_POST['submit'])){
    $employeeName = $_POST['employee_name'];
    $employeeAge = $_POST['employee_age'];
    $employeeAddress = $_POST['employee_address'];
    $employeeMobile = $_POST['employee_mobile'];

    // File upload
    $photo = $_FILES['employee_photo'];
    $photoName = $photo['name'];
    $photoTemp = $photo['tmp_name'];
    $photoSize = $photo['size'];
    $photoExt = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));
    $allowedFormats = ['jpg', 'jpeg', 'png'];

    if(in_array($photoExt, $allowedFormats)){
        if($photoSize < 100000){ // 100 KB limit
            $newPhotoName = uniqid('emp_', true).".".$photoExt;
            if(!is_dir('emp_photos')){
                mkdir('emp_photos', 0777, true);
            }
            move_uploaded_file($photoTemp, 'emp_photos/'.$newPhotoName);

            // Insert data into database
            $insertQuery = "INSERT INTO emp (name, age, address, mobile, image) 
                            VALUES ('$employeeName', $employeeAge, '$employeeAddress', '$employeeMobile', '$newPhotoName')";
            if($connection->query($insertQuery)){
                echo "<h3>Employee Details Added Successfully!</h3>";
                echo "Name: $employeeName <br>";
                echo "Age: $employeeAge <br>";
                echo "Address: $employeeAddress <br>";
                echo "Mobile: $employeeMobile <br>";
                echo "Photo: <br><img src='emp_photos/$newPhotoName' width='150'>";
            } else {
                echo "Error in Inserting Data: " . $connection->error;
            }
        } else {
            echo "Error: File size should be less than 100 KB.";
        }
    } else {
        echo "Error: Only JPG, JPEG, PNG files are allowed.";
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Employee Upload Form</title>
</head>
<body>
    <h2>Enter Employee Details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="employee_name" value="John Doe" required><br><br>
        Age: <input type="number" name="employee_age" value="30" required><br><br>
        Address: <input type="text" name="employee_address" value="123 Main Street" required><br><br>
        Mobile: <input type="text" name="employee_mobile" value="9876543210" required><br><br>
        Photo: <input type="file" name="employee_photo" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
