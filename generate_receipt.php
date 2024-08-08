<?php
session_start();

// Check if admin is logged in, redirect to login if not
if (!isset($_SESSION['admin_id'])) {
    header("Location: index2.php");
    exit();
}

// Include database connection
include "db_conn.php";

// Fetch admin details from session
$admin_id = $_SESSION['admin_id'];

// Query to fetch admin details based on admin_id
$sql_admin = "SELECT * FROM admin WHERE Admin_ID='$admin_id'";
$result_admin = mysqli_query($conn, $sql_admin);

if (!$result_admin) {
    echo "Error fetching admin details: " . mysqli_error($conn);
    exit();
}

// Fetch cafe menu items
$sql_stock = "SELECT * FROM cafe_menu";
$result_stock = mysqli_query($conn, $sql_stock);

if (!$result_stock) {
    echo "Error fetching stock list: " . mysqli_error($conn);
    exit();
}

// Fetch admin details
$row_admin = mysqli_fetch_assoc($result_admin);
$admin_name = $row_admin['Admin_Name'];
$admin_email = $row_admin['Admin_Email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Stock List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 20px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .receipt-header h2 {
            margin: 0;
        }
        .receipt-header p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-header">
            <h2>Receipt</h2>
            <p><strong>Admin:</strong> <?php echo $admin_name; ?></p>
            <p><strong>Email:</strong> <?php echo $admin_email; ?></p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit of Measure</th>
                        <th>Price</th>
                        <th>Supplier Name</th>
                        <th>Supplier Contact</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_stock = mysqli_fetch_assoc($result_stock)) { ?>
                        <tr>
                            <td><?php echo $row_stock['item_id']; ?></td>
                            <td><?php echo $row_stock['item_name']; ?></td>
                            <td><?php echo $row_stock['category']; ?></td>
                            <td><?php echo $row_stock['quantity']; ?></td>
                            <td><?php echo $row_stock['unit_of_measure']; ?></td>
                            <td><?php echo $row_stock['price']; ?></td>
                            <td><?php echo $row_stock['supplier_name']; ?></td>
                            <td><?php echo $row_stock['supplier_contact']; ?></td>
                            <td><?php echo $row_stock['date_added']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <button onclick="window.print();" class="btn btn-primary">Print Receipt</button>
            <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
