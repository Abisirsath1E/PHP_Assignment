<!DOCTYPE html>
<html>
<body>

<h2>Upload PDF File (Less than 100 KB)</h2>

<form method="post" enctype="multipart/form-data">

    Select PDF File:
    <input type="file" name="pdffile" accept="application/pdf" required>
    <br><br>

    <input type="submit" value="Upload PDF">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file_name = $_FILES["pdffile"]["name"];
    $file_tmp  = $_FILES["pdffile"]["tmp_name"];
    $file_size = $_FILES["pdffile"]["size"];
    $file_type = $_FILES["pdffile"]["type"];

    // Validate file type (only PDF)
    if ($file_type != "application/pdf") {
        echo "<h3 style='color:red;'>Error: Only PDF files are allowed!</h3>";
        exit;
    }

    // Validate file size (less than 100 KB)
    if ($file_size > 100000) {
        echo "<h3 style='color:red;'>Error: File must be less than 100 KB!</h3>";
        exit;
    }

    // Destination
    $dest = "impfile/" . $file_name;

    // Move uploaded file
    if (move_uploaded_file($file_tmp, $dest)) {

        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "filedb");

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        // Insert file record
        $sql = "INSERT INTO uploads (filename, upload_date)
                VALUES ('$file_name', NOW())";

        mysqli_query($conn, $sql);

        echo "<h3 style='color:green;'>File uploaded successfully!</h3>";

        mysqli_close($conn);
    }
    else {
        echo "<h3 style='color:red;'>File upload failed!</h3>";
    }
}

// After upload, display all records sorted by upload date (ASC)
$conn = mysqli_connect("localhost", "root", "", "filedb");

$sql = "SELECT * FROM uploads ORDER BY upload_date ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<h2>All Uploaded PDF Files</h2>";

    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>File Name</th>
                <th>Upload Date</th>
                <th>Download</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['filename']}</td>
                <td>{$row['upload_date']}</td>
                <td><a href='impfile/{$row['filename']}'>Download</a></td>
              </tr>";
    }

    echo "</table>";
}

mysqli_close($conn);
?>

</body>
</html>
