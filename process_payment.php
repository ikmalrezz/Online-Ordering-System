<?php
session_start();
include "db_conn.php";

// Get the payment data from POST
$paymentAmount = $_POST['payment_amount'] ?? '10.00';
$transactionId = $_POST['transaction_id'] ?? '1234';
$userName = $_POST['user_name'] ?? 'ahmad';
$transactionDate = $_POST['transaction_date'] ?? date('Y-m-d H:i:s');

$message = "";

if ($conn) {
    // Check if the transaction ID already exists
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM transactions WHERE transaction_id = ?");
    if ($checkStmt === false) {
        $message = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    } else {
        $checkStmt->bind_param('s', $transactionId);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            $message = "Transaction ID already exists. Please use a unique Transaction ID.";
        } else {
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO transactions (transaction_id, user_name, payment_amount, transaction_date) VALUES (?, ?, ?, ?)");
            if ($stmt === false) {
                $message = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            } else {
                // Bind parameters
                $stmt->bind_param('ssss', $transactionId, $userName, $paymentAmount, $transactionDate);

                // Execute the statement
                if ($stmt->execute()) {
                    $message = "New record created successfully";
                } else {
                    $message = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            }
        }
    }

    // Close the connection
    $conn->close();
} else {
    $message = "Connection failed: " . mysqli_connect_error();
}

// Store transaction details in session
$_SESSION['message'] = $message;
$_SESSION['user_name'] = $userName;
$_SESSION['payment_amount'] = $paymentAmount;
$_SESSION['transaction_id'] = $transactionId;
$_SESSION['transaction_date'] = $transactionDate;

// Redirect to success page
header("Location: success.php");
exit();
?>
