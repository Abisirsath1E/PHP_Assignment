<?php
$n1 = $_POST["num1"];
$n2 = $_POST["num2"];
$op = $_POST["operation"];

if ($op == "add") {
    header("Location: add.php?n1=$n1&n2=$n2");
}
elseif ($op == "sub") {
    header("Location: sub.php?n1=$n1&n2=$n2");
}
elseif ($op == "mul") {
    header("Location: mul.php?n1=$n1&n2=$n2");
}
elseif ($op == "div") {
    header("Location: div.php?n1=$n1&n2=$n2");
}
exit;
?>
