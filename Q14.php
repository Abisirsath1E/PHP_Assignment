<!DOCTYPE html>
<html>
<body>

<h2>Person Details Form</h2>

<form method="post">

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" min="1" required><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Other" required> Other
    <br><br>

    Address:<br>
    <textarea name="address" rows="3" cols="40" required></textarea><br><br>

    State:
    <select name="state" required>
        <option value="">Select State</option>
        <option>Maharashtra</option>
        <option>Gujarat</option>
        <option>Karnataka</option>
        <option>Madhya Pradesh</option>
        <option>Rajasthan</option>
    </select>
    <br><br>

    Hobbies:<br>
    <input type="checkbox" name="hobbies[]" value="Reading" required> Reading<br>
    <input type="checkbox" name="hobbies[]" value="Music"> Music<br>
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br><br>

    Favourite Color:
    <input type="color" name="color" required><br><br>

    Date of Birth:
    <input type="date" name="dob" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Mobile Number:
    <input type="tel" name="phone" pattern="[0-9]{10}" required><br><br>

    <input type="submit" value="Submit Details">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $color = $_POST["color"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $hobbies = implode(", ", $_POST["hobbies"]);

    // Voting eligibility
    if ($age >= 18) {
        $msg = "Eligible for voting";
    } else {
        $msg = "Not eligible for voting";
    }

    echo "<h2>Entered Details</h2>";
    echo "Name: $name <br>";
    echo "Age: $age <br>";
    echo "Gender: $gender <br>";
    echo "Address: $address <br>";
    echo "State: $state <br>";
    echo "Hobbies: $hobbies <br>";
    echo "Favourite Color: $color <br>";
    echo "Date of Birth: $dob <br>";
    echo "Email: $email <br>";
    echo "Mobile: $phone <br>";
    echo "<h3>$msg</h3>";
}
?>

</body>
</html>
