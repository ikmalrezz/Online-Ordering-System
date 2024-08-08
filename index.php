<!DOCTYPE html>
<html>
<head>
    <title>LOGIN | Ruwe Kopi User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>User Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <br><br>
        <!-- Add a button to link to the user login page -->
        <a href="index2.php" class="button">Go to Admin Login</a>
        
        <!-- Alternatively, you can use a button element -->
        <!--
        <button type="button" onclick="window.location.href='index.php';">Go to User Login</button>
        -->

        <!-- Add a link to user registration if needed -->
        <a href="signup.php" class="ca">Create an account</a>
    </form>
</body>
</html>
