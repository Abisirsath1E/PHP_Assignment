<?php
session_start();

// If session cart not created yet
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Add selected items from the page
if (isset($_POST["items"])) {
    foreach ($_POST["items"] as $item) {
        $_SESSION["cart"][] = $item;
    }
}

// Redirect based on button pressed
if ($_POST["submit"] == "Add to Cart & Go to Page 2") {
    header("Location: page2.php");
} 
else {
    header("Location: bill.php");
}

exit;
?>
