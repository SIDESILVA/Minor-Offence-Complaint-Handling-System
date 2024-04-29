<?php
include 'Database/connection.php';

if(isset($_GET['nic'])){
    $id = mysqli_real_escape_string($con, $_GET['nic']); // Escape the string to prevent SQL injection
    
    if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'yes') {
        $sql = "DELETE FROM `sign_up` WHERE `NIC` = '$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            header('location:Users.php');
            exit;
        } else {
            die(mysqli_error($con));
        }
    }
    else {
        echo "<script>
            if(confirm('Are you sure you want to delete?')) {
                window.location.href = '?nic=$id&confirmed=yes';
            } else {
                window.history.back(); // Go back if user declines
            }
        </script>";
        exit;
    }
}
?>