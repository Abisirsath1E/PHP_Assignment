<?php

echo "<h2>Cookie Handling Demo</h2>";

// -------------------- COOKIE CREATION / SETTING --------------------

if (!isset($_COOKIE["user_name"])) {

    // Create/Set a Cookie
    setcookie("user_name", "Abhijeet", time() + 60, "/");  // valid for 60 seconds
    setcookie("user_role", "Admin", time() + 60, "/");

    echo "<h3>Cookies have been created & set successfully!</h3>";
    echo "Refresh the page to access the cookies.<br>";

} else {

    // -------------------- ACCESSING COOKIES --------------------

    echo "<h3>Cookies Found</h3>";
    echo "User Name: " . $_COOKIE["user_name"] . "<br>";
    echo "User Role: " . $_COOKIE["user_role"] . "<br>";

    // -------------------- DESTROYING COOKIES --------------------

    echo "<br><b>Destroying Cookies...</b><br>";

    setcookie("user_name", "", time() - 3600, "/");
    setcookie("user_role", "", time() - 3600, "/");

    echo "<h3>Cookies have been deleted!</h3>";
}

?>
