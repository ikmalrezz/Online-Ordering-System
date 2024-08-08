Ruwe Kopi Web Application
Overview
Ruwe Kopi is a web application designed for managing and displaying a cafe's menu. This repository contains the source code for the admin dashboard and the main user interface of the application.

File Structure
admin_dashboard.php
This file handles the administrative dashboard for the Ruwe Kopi application.

Key Features:
Session Management: Ensures only logged-in admins can access the dashboard.
Database Connection: Includes a connection to the database.
Admin Details: Fetches and displays admin details from the database.
Fetching Data: Retrieves cafe menu items from the cafe_menu table.
Update Functionality: Allows admins to update cafe menu items.
Dependencies:
db_conn.php: Database connection script.
index2.php: Redirects to this file if the admin is not logged in.
index3.php
This file is the main page for the Ruwe Kopi application, accessible by users.

Key Features:
Session Management: Checks if a user is logged in.
HTML Structure: Basic structure with DOCTYPE, head, and body.
CSS and Font Awesome: Includes links to Font Awesome and custom CSS for styling.
Header Section: Contains the navigation menu and logo.
Dependencies:
style.css: Custom CSS file for styling.
images/logo.jpg: Logo image used in the header.
Installation
Clone the repository.
Set up the database and import the required tables.
Update the db_conn.php file with your database credentials.
Ensure all dependencies are in place (style.css, logo.jpg).
Usage
Admin Access: Navigate to admin_dashboard.php and log in with admin credentials.
User Access: Navigate to index3.php to access the main application interface.
Contributing
Please fork the repository and submit pull requests for any improvements or bug fixes.
