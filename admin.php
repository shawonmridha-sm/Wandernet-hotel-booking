    <!-- Database Connection -->
    <?php
    $conn = new mysqli("localhost", "root", "", "hotel_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    
    <!-- admin_login.php -->
    <?php
    session_start();
    include 'db_connect.php';
    if (isset($_SESSION['admin_logged_in'])) {
        header("Location: admin_dashboard.php");
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid login credentials";
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="admin_styles.css">
    </head>
    <body>
        <div class="login-container">
            <h2>Admin Login</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
    </html>
    
    <!-- admin_dashboard.php -->
    <?php
    session_start();
    include 'db_connect.php';
    if (!isset($_SESSION['admin_logged_in'])) {
        header("Location: admin_login.php");
        exit();
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="admin_styles.css">
    </head>
    <body>
        <div class="dashboard-container">
            <h2>Welcome, Admin</h2>
            <a href="logout.php">Logout</a>
            <h3>Manage Bookings</h3>
            <!-- Add Booking management features here -->
            <h3>Manage Rooms</h3>
            <!-- Add Room management features here -->
        </div>
    </body>
    </html>
    
    <!-- logout.php -->
    <?php
    session_start();
    session_destroy();
    header("Location: admin_login.php");
    exit();
    ?>
    
    /* admin_styles.css */
    .login-container, .dashboard-container {
        width: 300px;
        margin: 100px auto;
        text-align: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #ccc;
    }
    input, button {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
    }
    .error {
        color: red;
    }
    
    <!-- db_connect.php -->
    <?php
    $conn = new mysqli("localhost", "root", "", "hotel_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
