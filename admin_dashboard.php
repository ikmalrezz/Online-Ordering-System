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

// Function to update cafe menu item
if (isset($_POST['update'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit_of_measure = $_POST['unit_of_measure'];
    $price = $_POST['price'];
    $supplier_name = $_POST['supplier_name'];
    $supplier_contact = $_POST['supplier_contact'];

    // Validate and sanitize input
    $item_id = mysqli_real_escape_string($conn, $item_id);
    $item_name = mysqli_real_escape_string($conn, $item_name);
    $category = mysqli_real_escape_string($conn, $category);
    $quantity = mysqli_real_escape_string($conn, $quantity);
    $unit_of_measure = mysqli_real_escape_string($conn, $unit_of_measure);
    $price = mysqli_real_escape_string($conn, $price);
    $supplier_name = mysqli_real_escape_string($conn, $supplier_name);
    $supplier_contact = mysqli_real_escape_string($conn, $supplier_contact);

    // Update query
    $sql_update = "UPDATE cafe_menu SET 
                    item_name = '$item_name',
                    category = '$category',
                    quantity = '$quantity',
                    unit_of_measure = '$unit_of_measure',
                    price = '$price',
                    supplier_name = '$supplier_name',
                    supplier_contact = '$supplier_contact'
                    WHERE item_id = '$item_id'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Function to add new cafe menu item
if (isset($_POST['add'])) {
    $item_name = $_POST['new_item_name'];
    $category = $_POST['new_category'];
    $quantity = $_POST['new_quantity'];
    $unit_of_measure = $_POST['new_unit_of_measure'];
    $price = $_POST['new_price'];
    $supplier_name = $_POST['new_supplier_name'];
    $supplier_contact = $_POST['new_supplier_contact'];

    // Validate and sanitize input
    $item_name = mysqli_real_escape_string($conn, $item_name);
    $category = mysqli_real_escape_string($conn, $category);
    $quantity = mysqli_real_escape_string($conn, $quantity);
    $unit_of_measure = mysqli_real_escape_string($conn, $unit_of_measure);
    $price = mysqli_real_escape_string($conn, $price);
    $supplier_name = mysqli_real_escape_string($conn, $supplier_name);
    $supplier_contact = mysqli_real_escape_string($conn, $supplier_contact);

    // Insert query
    $sql_insert = "INSERT INTO cafe_menu (item_name, category, quantity, unit_of_measure, price, supplier_name, supplier_contact)
                   VALUES ('$item_name', '$category', '$quantity', '$unit_of_measure', '$price', '$supplier_name', '$supplier_contact')";

    if (mysqli_query($conn, $sql_insert)) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error adding new record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Stock List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer_details.php">Customer Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sales_report.php">Sales Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index3.php">Website</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="admin-details">
            <h3>Admin Information</h3>
            <p><strong>Admin ID:</strong> <?php echo $admin_id; ?></p>
            <p><strong>Admin Name:</strong> <?php echo $admin_name; ?></p>
            <p><strong>Admin Email:</strong> <?php echo $admin_email; ?></p>
        </div>

        <h3>Stock List - Cafe Menu</h3>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_stock = mysqli_fetch_assoc($result_stock)) { ?>
                        <tr>
                            <form method="post" action="admin_dashboard.php">
                                <td><?php echo $row_stock['item_id']; ?>
                                    <input type="hidden" name="item_id" value="<?php echo $row_stock['item_id']; ?>">
                                </td>
                                <td><input type="text" name="item_name" value="<?php echo $row_stock['item_name']; ?>" class="form-control"></td>
                                <td><input type="text" name="category" value="<?php echo $row_stock['category']; ?>" class="form-control"></td>
                                <td><input type="text" name="quantity" value="<?php echo $row_stock['quantity']; ?>" class="form-control"></td>
                                <td><input type="text" name="unit_of_measure" value="<?php echo $row_stock['unit_of_measure']; ?>" class="form-control"></td>
                                <td><input type="text" name="price" value="<?php echo $row_stock['price']; ?>" class="form-control"></td>
                                <td><input type="text" name="supplier_name" value="<?php echo $row_stock['supplier_name']; ?>" class="form-control"></td>
                                <td><input type="text" name="supplier_contact" value="<?php echo $row_stock['supplier_contact']; ?>" class="form-control"></td>
                                <td><?php echo $row_stock['date_added']; ?></td>
                                <td><button type="submit" name="update" class="btn btn-primary">Update</button></td>
                            </form>
                        </tr>
                    <?php } ?>
                    <tr>
                        <form method="post" action="admin_dashboard.php">
                            <td></td> <!-- Placeholder for Item ID (auto-incremented in database) -->
                            <td><input type="text" name="new_item_name" placeholder="Item Name" class="form-control"></td>
                            <td><input type="text" name="new_category" placeholder="Category" class="form-control"></td>
                            <td><input type="text" name="new_quantity" placeholder="Quantity" class="form-control"></td>
                            <td><input type="text" name="new_unit_of_measure" placeholder="Unit of Measure" class="form-control"></td>
                            <td><input type="text" name="new_price" placeholder="Price" class="form-control"></td>
                            <td><input type="text" name="new_supplier_name" placeholder="Supplier Name" class="form-control"></td>
                            <td><input type="text" name="new_supplier_contact" placeholder="Supplier Contact" class="form-control"></td>
                            <td>Auto-generated</td> <!-- Date Added is auto-generated in database -->
                            <td><button type="submit" name="add" class="btn btn-success">Add</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="generate_receipt.php" class="btn btn-info">Generate Receipt</a>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

