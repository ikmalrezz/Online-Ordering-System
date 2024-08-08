<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <li class="item">
                        <div>
                            <strong>Base:</strong> RM<?php echo htmlspecialchars($item['base']); ?><br>
                            <strong>Toppings:</strong> RM<?php echo htmlspecialchars(implode(", ", $item['toppings'])); ?><br>
                            <strong>Total Price:</strong> RM<?php echo htmlspecialchars($item['totalPrice']); ?>
                        </div>
                        <form action="remove_from_cart.php" method="POST" style="margin: 0;">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" class="btn">Remove</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
