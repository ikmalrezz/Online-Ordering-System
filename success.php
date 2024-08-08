<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        .buttons {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }
        button.home {
            background-color: #007bff;
            color: white;
            border: none;
        }
        button.print {
            background-color: #28a745;
            color: white;
            border: none;
        }
    </style>
    <script>
        // Redirect to sales_report.php after a short delay
        setTimeout(function() {
            window.location.href = 'sales_report.php';
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>
</head>
<body>
    <div class="container">
        <h1>Success</h1>
        <?php if (isset($_SESSION['message'])): ?>
            <p><strong><?php echo htmlspecialchars($_SESSION['message']); ?></strong></p>
            <?php unset($_SESSION['message']); // Clear the message after displaying ?>
        <?php endif; ?>
        <p><strong>User Name:</strong> <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
        <p><strong>Payment Amount:</strong> <?php echo htmlspecialchars($_SESSION['payment_amount'] ?? ''); ?></p>
        <p><strong>Transaction ID:</strong> <?php echo htmlspecialchars($_SESSION['transaction_id'] ?? ''); ?></p>
        <p><strong>Transaction Date:</strong> <?php echo htmlspecialchars($_SESSION['transaction_date'] ?? ''); ?></p>

        <div class="buttons">
            <button class="home" onclick="location.href='index3.php'">Go to Homepage</button>
            <button class="print" onclick="window.print()">Print Receipt</button>
        </div>
    </div>
</body>
</html>



