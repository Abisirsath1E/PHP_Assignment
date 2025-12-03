<?php
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Add selected laptops
if (isset($_POST["laptops"])) {
    foreach ($_POST["laptops"] as $item) {
        $_SESSION["cart"][] = $item;
    }
}

// Navigation
if ($_POST["submit"] == "Next Page") {
    header("Location: laptop_page2.php");
} else {
    header("Location: laptop_bill.php");
}

exit;
?>
