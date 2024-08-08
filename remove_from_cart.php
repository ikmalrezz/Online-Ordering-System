<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];

    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
    }

    header("Location: cart.php");
    exit();
}
?>
