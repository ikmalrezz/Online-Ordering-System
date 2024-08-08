<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $toppings = json_decode($_POST['toppings']);
    $totalPrice = $_POST['totalPrice'];

    // Create a cart array if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = [
        'base' => $base,
        'toppings' => $toppings,
        'totalPrice' => $totalPrice
    ];

    echo "Item added to cart.";
}
?>
