<?php
include '../Database/connection.php';

if (isset($_POST['submit'])) {
  
    $Name = $_POST["name"];
    $Pass = $_POST["pwd"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT Password, Status, Logged FROM `sign_up` WHERE User_Name = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];
            $status = $row['Status'];
            $logged = $row['Logged'];

            // Use password_verify for secure password comparison
            if ($Pass == $storedPassword) {
              if ($logged == 0) {
                // Display a password change form
                echo '<div id="changePasswordModal" style="display: block; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; text-align: center; z-index: 999;">
                <div style="background: white; padding: 20px; width: 300px; margin: 100px auto;">
                    <h2>Change Password</h2>
                    <form method="POST" action="change_password.php">
                        <input type="hidden" name="user_name" value="' . $Name . '">
                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" required><br>
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" required><br>
                        <input type="submit" name="change_password" value="Change Password">
                    </form>
                </div>
            </div>';
                        
              }else{
                // Passwords match, redirect to the desired page
                if ($status == "I") {
                  echo "<script>alert('Login successful'); window.location='../Case_Invest/Investigator.php';</script>";
                }
                elseif ($status == "PF") {
                  echo "<script>alert('Login successful'); window.location='../Complaint_Register/C_part1.php';</script>";
                }
                elseif ($status == "O") {
                  echo "<script>alert('Login successful'); window.location='../Users.php';</script>";
                }
                else {
                  echo "<script>alert('Invalid User Role');";
                }
                exit;
              }
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    } else {
        echo "<script>alert('Database query failed');</script>";
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <style>
        /* Paste the CSS code for the modal here */
        #changePasswordModal {
            display: block;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            z-index: 999;
        }

        #changePasswordModal > div {
            background: white;
            padding: 20px;
            width: 300px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        #changePasswordModal h2 {
            margin-bottom: 20px;
        }

        #changePasswordModal form {
            margin-top: 20px;
        }

        #changePasswordModal label {
            display: block;
            margin-bottom: 5px;
        }

        #changePasswordModal input[type="password"] {
            width: calc(100% - 12px); /* Adjust the width of the input fields */
            height: 30px;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #changePasswordModal input[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #changePasswordModal input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
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