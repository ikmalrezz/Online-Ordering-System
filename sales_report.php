<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B9452C;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        button.reject {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        button.approve {
            background-color: #28a745;
            color: white;
            border: none;
        }
        button.home {
            background-color: #007bff;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sales Report</h1>
        <?php if (isset($_SESSION['message'])): ?>
            <p><strong><?php echo htmlspecialchars($_SESSION['message']); ?></strong></p>
            <?php unset($_SESSION['message']); // Clear the message after displaying ?>
        <?php endif; ?>
        
        <table>
            <tr>
                <th>User Name</th>
                <td><?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></td>
            </tr>
            <tr>
                <th>Payment Amount</th>
                <td><?php echo htmlspecialchars($_SESSION['payment_amount'] ?? ''); ?></td>
            </tr>
            <tr>
                <th>Transaction ID</th>
                <td><?php echo htmlspecialchars($_SESSION['transaction_id'] ?? ''); ?></td>
            </tr>
            <tr>
                <th>Transaction Date</th>
                <td><?php echo htmlspecialchars($_SESSION['transaction_date'] ?? ''); ?></td>
            </tr>
        </table>
        
            </form>
            <button class="home" onclick="location.href='admin_dashboard.php'">Go to Homepage</button>
            <button class="print" onclick="window.print()">Print Report</button>
        </div>
    </div>
</body>
</html>

