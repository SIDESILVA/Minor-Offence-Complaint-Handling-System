<?php
include '../Database/connection.php';

if (isset($_POST['change_password'])) {
    $user_name = $_POST['user_name'];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Password validation checks
    if (strlen($newPassword) < 8) {
        echo "<script>alert('Password must be at least 8 characters long'); window.location='./Login.php';</script>";
        exit;
    }

    if (!preg_match("/[a-zA-Z]/", $newPassword) || !preg_match("/[0-9]/", $newPassword)) {
        echo "<script>alert('Password must contain both letters and numbers'); window.location='./Login.php';</script>";
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match'); window.location='./Login.php';</script>";
        exit;
    }

    // Update the password and set 'logged' to 1 for the specific user
    $updateSql = "UPDATE `sign_up` SET Password = ?, Logged = 1 WHERE User_Name = ?";
    $updateStmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ss", $newPassword, $user_name);

    if (mysqli_stmt_execute($updateStmt)) {
        // Password updated successfully
        echo "<script>alert('Password Changed Successfully!'); window.location='./Login.php';</script>"; // Redirect to the desired page after password change
        exit;
    } else {
        echo "<script>alert('Password update failed'); window.location='./Login.php';</script>";
    }

    // Close the prepared statement for update
    mysqli_stmt_close($updateStmt);
}

// Close the database connection
mysqli_close($con);
?>
