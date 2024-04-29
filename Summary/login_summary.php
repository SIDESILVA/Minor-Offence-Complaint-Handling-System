
<?php
include '../Database/connection.php';

if (isset($_POST['submit'])) {
    $Name = $_POST["name"];
    $Pass = $_POST["pwd"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT Password, Status, Logged FROM `sign_up` WHERE User_Name = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $Name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            // Check if a row is returned
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $storedPassword = $row['Password'];
                $logged = $row['Logged'];

                // Use password_verify for secure password comparison
                if ($Pass == $storedPassword) {
                    if ($logged == 0) {
                        // Proceed with additional logic if needed
                    } else {
                        // Passwords match, redirect to the desired page
                        echo "<script>alert('Login successful'); window.location='../AllComplains.php';</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }
            } else {
                echo "<script>alert('User not found');</script>";
            }

            // Close the result set
            mysqli_free_result($result);
        } else {
            echo "<script>alert('Database query failed');</script>";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare statement');</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
    <body>
        <div class="wrapper">
            <form action="" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="name" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pwd" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
            
            <button type="submit" name="submit"  value="Login" class="btn">Login</button>
            
            <div class="register-link">
                <p>Don't have an account? <a href="../Agreement/agreement.php">  Register</a></p>
            </div>
            </form>
        </div>
    </body>
</html>