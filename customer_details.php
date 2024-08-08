<?php
// Include the database connection file
include 'db_conn.php';

// Handle delete request
if (isset($_POST['delete'])) {
    $idToDelete = $_POST['id_to_delete'] ?? '';

    if ($idToDelete) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $idToDelete);

        if ($stmt->execute()) {
            $_SESSION['message'] = "User has been deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete the user: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Retrieve and display user details
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
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
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            color: white;
            border-radius: 4px;
            text-align: center;
        }
        .delete {
            background-color: #dc3545;
        }
        .home {
            background-color: #007bff;
        }
    </style>
    <script>
        function confirmDelete(form) {
            if (confirm('Are you sure you want to delete this customer?')) {
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Customer Details</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <p><strong><?php echo htmlspecialchars($_SESSION['message']); ?></strong></p>
            <?php unset($_SESSION['message']); // Clear the message after displaying ?>
        <?php endif; ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["id"]) . "</td>
                            <td>" . htmlspecialchars($row["user_name"]) . "</td>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>" . htmlspecialchars($row["email"]) . "</td>
                            <td>
                                <form method='post' style='display:inline;' onsubmit='return confirmDelete(this);'>
                                    <input type='hidden' name='id_to_delete' value='" . htmlspecialchars($row["id"]) . "'>
                                    <button type='submit' name='delete' class='button delete'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </table>

        <div style="text-align: center; margin-top: 20px;">
            <a href="admin_dashboard.php" class="button home">Go to Homepage</a>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>



