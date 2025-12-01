<!DOCTYPE html>
<html>
<body>

<h2>Enter Student Details</h2>

<form method="post">

    Name: 
    <input type="text" name="name" required><br><br>

    Age: 
    <input type="number" name="age" required><br><br>

    Gender: 
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Other" required> Other
    <br><br>

    Address:<br>
    <textarea name="address" rows="3" cols="40" required></textarea><br><br>

    Course:
    <select name="course" required>
        <option value="">Select Course</option>
        <option value="BCA">BCA</option>
        <option value="BCS">BCS</option>
        <option value="BBA">BBA</option>
        <option value="MCA">MCA</option>
    </select>
    <br><br>

    Hobbies:<br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading<br>
    <input type="checkbox" name="hobbies[]" value="Music"> Music<br>
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br><br>

    <input type="submit" value="Display Table">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $course = $_POST["course"];

    if (isset($_POST["hobbies"])) {
        $hobbies = implode(", ", $_POST["hobbies"]);
    } else {
        $hobbies = "No hobbies selected";
    }

    echo "<h2>Student Details (Table Format)</h2>";

    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Course</th>
                <th>Hobbies</th>
            </tr>
            <tr>
                <td>$name</td>
                <td>$age</td>
                <td>$gender</td>
                <td>$address</td>
                <td>$course</td>
                <td>$hobbies</td>
            </tr>
          </table>";
}
?>

</body>
</html>
