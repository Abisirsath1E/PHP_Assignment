<!DOCTYPE html>
<html>
<body>

<h2>User Feedback Form</h2>

<form method="post">
    Full Name: 
    <input type="text" name="fullname"><br><br>

    Email: 
    <input type="email" name="email"><br><br>

    Feedback Message:<br>
    <textarea name="message" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="Submit Feedback">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = trim($_POST["fullname"]);
    $email  = trim($_POST["email"]);
    $msg    = trim($_POST["message"]);

    // Validation – no field must be blank
    if ($name == "" || $email == "" || $msg == "") {
        echo "<h3 style='color:red;'>All fields are required. Please fill out all fields.</h3>";
    } 
    else {

        // DB Connection
        $conn = mysqli_connect("localhost", "root", "", "website");

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        // Insert Query
        $sql = "INSERT INTO feedback (fullname, email, message)
                VALUES ('$name', '$email', '$msg')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3 style='color:green;'>Feedback submitted successfully!</h3>";
        } else {
            echo "<h3 style='color:red;'>Error: " . mysqli_error($conn) . "</h3>";
        }

        mysqli_close($conn);
    }
}

?>

</body>
</html>
