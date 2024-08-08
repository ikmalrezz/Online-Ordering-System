<?php 
session_start(); 
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    // Validate input data
    $uname = mysqli_real_escape_string($conn, $uname); // Escape special characters to prevent SQL injection
    $password = mysqli_real_escape_string($conn, $password);

    if (empty($uname)) {
        header("Location: index2.php?error=User Name is required");
        exit();
    } elseif (empty($password)) {
        header("Location: index2.php?error=Password is required");
        exit();
    } else {
        // Query to fetch admin details based on admin_name
        $sql = "SELECT * FROM admin WHERE Admin_Name='$uname'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                // Compare plain text password
                if ($row['Admin_Password'] === $password) {
                    // Passwords match, setup session variables
                    $_SESSION['admin_id'] = $row['Admin_ID'];
                    $_SESSION['admin_name'] = $row['Admin_Name'];
                    $_SESSION['admin_email'] = $row['Admin_Email'];

                    // Redirect to admin dashboard or another page
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    // Incorrect password
                    header("Location: index2.php?error=Incorrect password");
                    exit();
                }
            } else {
                // Admin not found
                header("Location: index2.php?error=Admin not found");
                exit();
            }
        } else {
            // Error in SQL query
            header("Location: index2.php?error=SQL Error: " . mysqli_error($conn));
            exit();
        }
    }
} else {
    // Redirect if accessed directly without POST method
    header("Location: index2.php");
    exit();
}
?>
