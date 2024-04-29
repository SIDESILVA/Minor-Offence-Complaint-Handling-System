<?php
include 'Database/connection.php';

// Ensure all required parameters are set
if(isset($_GET['nic'], $_GET['email'], $_GET['username'])){
    $id = mysqli_real_escape_string($con, $_GET['nic']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $username = mysqli_real_escape_string($con, $_GET['username']);
    
    if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'yes') {
        
        // Generate a random password
        $random_password = bin2hex(random_bytes(5));

        // Update the SQL query
        $sql = "UPDATE `sign_up` SET `Step`='Approved', `Password`='$random_password' WHERE `NIC`='$id'";
        
        $result = mysqli_query($con,$sql);
    
        if($result){
            // Make API call
            $api_url = "http://localhost:8040/newMail";
            $body = json_encode([
                'email' => $email, 
                'name' => $username,
                'pass' => $random_password
            ]);
            
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json"
            ]);

            $response = curl_exec($ch);

            if(curl_errno($ch)) {
                // Handle curl error
                die("API call failed: " . curl_error($ch));
            }
            curl_close($ch);

            // Handle API response if necessary
            // $decodedResponse = json_decode($response, true);

            header('location:Users.php');
        } else {
            echo "Database update failed.";
        }
    }
    else {
        echo "<script>
            if(confirm('Are you sure you want to approve this user?')) {
                window.location.href = '?nic=$id&email=$email&username=$username&confirmed=yes';
            } else {
                window.history.back(); // Go back if user declines
            }
        </script>";
        exit;
    }
}
?>
