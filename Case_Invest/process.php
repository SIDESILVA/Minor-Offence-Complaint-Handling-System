<?php
include '../Database/connection.php';

if(isset($_GET['no'])){
    $id = mysqli_real_escape_string($con, $_GET['no']); // Escape the string to prevent SQL injection
    
    if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'yes') {
    
        $sql = "UPDATE `case_investigate` SET `Status`='Processing' WHERE `Complaint_No`='$id'";
    
        $result = mysqli_query($con, $sql);
    
        if($result){
            echo "<script>
            window.history.back();
            </script>";
            exit; // Always exit after a header redirect
        } else {
            echo "Failed";
        }
    }
    else {
        echo "<script>
            if(confirm('Are you sure you want to process this?')) {
                window.location.href = '?no=$id&confirmed=yes';
            } else {
                window.history.back(); // Go back if the user declines
            }
        </script>";
        exit;
    }
}
?>
