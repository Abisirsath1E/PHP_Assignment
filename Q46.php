<?php
// Start session (Session Creation)
session_start();

echo "<h2>Session Handling Demo</h2>";

// ---------------- SESSION CREATION & ASSIGNING ----------------

if (!isset($_SESSION["username"])) {

    // Assigning session variables
    $_SESSION["username"] = "Abhijeet";
    $_SESSION["role"] = "Admin";
    $_SESSION["login_time"] = date("H:i:s");

    echo "<h3>New Session Created & Variables Assigned!</h3>";
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Role: " . $_SESSION["role"] . "<br>";
    echo "Login Time: " . $_SESSION["login_time"] . "<br>";

} else {

    // ---------------- ACCESSING SESSION VARIABLES ----------------
    echo "<h3>Session Already Exists</h3>";
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Role: " . $_SESSION["role"] . "<br>";
    echo "Login Time: " . $_SESSION["login_time"] . "<br>";

    // ---------------- DESTROYING SESSION VARIABLES ----------------
    echo "<br><b>Destroying session ...</b><br>";

    session_unset();   // removes all session variables
    session_destroy(); // removes session completely

    echo "<h3>Session Destroyed Successfully!</h3>";
}

?>
