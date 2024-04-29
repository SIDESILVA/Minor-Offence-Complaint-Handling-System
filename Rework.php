<?php
include 'Database/connection.php';

if(isset($_GET['nic'])){
    $id = mysqli_real_escape_string($con, $_GET['nic']); // Escape the string to prevent SQL injection
    
    if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'yes') {
    
        $sql = "UPDATE `sign_up` SET `Step`='Pending' WHERE `NIC`=$id";
    
        $result = mysqli_query($con,$sql);
    
        if($result){
            header ('location:Users.php');
        }else{
            echo "Failed";
        }
    }
    else {
        echo "<script>
            if(confirm('Are you sure you want to rework?')) {
                window.location.href = '?nic=$id&confirmed=yes';
            } else {
                window.history.back(); // Go back if user declines
            }
        </script>";
        exit;
    }
}
?>