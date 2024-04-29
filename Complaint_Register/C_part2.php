
<?php
include '../Database/connection.php';
// if(isset($_GET['nic'], $_GET['email'], $_GET['username'])){
if (isset($_GET['param_name'], $_GET['username'])) {
    $id = $_GET['param_name'];
    $uname = $_GET['username'];

    

    if (isset($_POST['Submit'])) {
        $Complaint_Type = $_POST["type"];
        $Other_Type = $_POST["other"];
        $Description = $_POST["description"];
        $Other_Details = $_POST["other"];
        $Suspects = $_POST["suspects"];

        // Update query with a WHERE clause based on User_Name
        $sql_update = "UPDATE `complaint_reg` 
               SET 
                   `Complaint_Type` = ?,
                   `Other_Type` = ?,
                   `Description` = ?,
                   `Other_Details` = ?,
                   `Suspects` = ?
               WHERE 
                   `Complaint_No` = ?";

$stmt = mysqli_prepare($con, $sql_update);

// Bind parameters
mysqli_stmt_bind_param($stmt, "sssssi", $Complaint_Type, $Other_Type, $Description, $Other_Details, $Suspects, $id);

// Execute the statement
$result = mysqli_stmt_execute($stmt);

// Check for success
if ($result) {
    // Your code for the successful update
    // ...
} else {
    echo "Failed to update record: " . mysqli_error($con);
}

// Close the statement
mysqli_stmt_close($stmt);

        if ($result) {

            $sql = "SELECT E_Mail FROM `sign_up` WHERE User_Name = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            $sql2 = "SELECT E_Mail, Ref_Number FROM `complaint_reg` WHERE Complaint_No  = ?";
            $stmt2 = mysqli_prepare($con, $sql2);
            mysqli_stmt_bind_param($stmt2, "s", $id);
            mysqli_stmt_execute($stmt2);
            $res2 = mysqli_stmt_get_result($stmt2);

            if ($res) {
                // Check if a row is returned
                if (mysqli_num_rows($res) == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $email = $row['E_Mail'];

                    // Make API call
                    $api_url = "http://localhost:8040/toInvestigator";
                    $body = json_encode([
                        'email' => $email, 
                        'no' => $id,
                        'comp' => $Complaint_Type
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
                }
            }

            if ($res2) {
                // Check if a row is returned
                if (mysqli_num_rows($res2) == 1) {
                    $row2 = mysqli_fetch_assoc($res2);
                    $ref = $row2['Ref_Number'];
                    $complaint_email = $row2['E_Mail'];

                    // Make API call
                    $api_url2 = "http://localhost:8040/toComplainant";
                    $body2 = json_encode(['email' => $complaint_email, 'refNumber' => $ref]);
                      
                    $ch2 = curl_init($api_url2);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch2, CURLOPT_POST, true);
                    curl_setopt($ch2, CURLOPT_POSTFIELDS, $body2);
                    curl_setopt($ch2, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
                    $response = curl_exec($ch2);

                    
                    if(curl_errno($ch2)) {
                        die("API call to send email failed: " . curl_error($ch2));
                    }
                    curl_close($ch2);
                }
            }

            header('location:../Web/Web.php');
        } else {
            echo "Failed to update record.";
        }
    }
} else {
    header('location:./C_part1.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../Complaint_Register/C_part_2.css">
        <script src="../Complaint_Register/C_PART2.js" defer></script><!--link with javascript code-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="container" id="container">
            <nav>
                <div class="list" id="list">
                    <ul>
                        <li><a href="../Web/Web.php"><b>HOME</b></a></li>
                        <li><a href="../About/About.php"><b>ABOUT</b></a></li>
                        <li><a href="#"><b>CONTACT US</b></a></li>
                        <li><a href="../Summary/login_summary.php"><b>SUMMARY</b></a></li>
                        <li><a href="../Login/Login.php" class="log-btn"><b>LOGIN</b></a></li>
                    </ul>
                </div>
            </nav>
            <div class="wrapper">
                <br>
                <form method="POST" class="form">
                    <div class="form-part">
                        <div class="input-box">
                            <label>Complaint Type:</label>
                            <select name="type" id="complaintType" class="select-box"> 
                                <!--Can select 25 districts as a option-->
                                <option>(Section 100) Abetment of the doing things. </option>
                                <option>(Section 310) Of Hurt. </option>
                                <option>(Section 312) Voluantarity causing hurt. </option>
                                <option>(Section 366) Theft. </option>
                                <option>(Section 386) Criminal misappropriation. </option>
                                <option>(Section 388) Criminal breach of trust.</option>
                                <option>(Section 308) Cruelty to children.</option>
                                <option>(Section 330) Wrongful restraint.</option>
                                <option>(Section 331) Wrongful Confincement.</option>
                                <option>(Section 341) Criminal force.</option>
                                <option>(Section 345) Sexual harassment.</option>
                                <option>(Section 408) Mischief.</option>
                                <option>(Section 427) Criminal tresspass.</option>
                                <option>(Section 483) Criminal Intimidation.</option>
                                <option>(Section 350) Kidnapping.</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label >Other Complaint Type:</label>
                            <input type="text" name= "other" placeholder="Enter other types of complaint" id="otherInput"/>
                        </div>
                        <div class="input-box">
                            <label>Complaint Description:</label>
                            <textarea rows="2" cols="48" id="complaintDescription" name="description" placeholder="Enter the Complaint Details" size="35" required></textarea>
                        </div>
                        <div class="input-box">
                            <label>Other Details:</label>
                            <textarea rows="2" cols="48" id="complaintDescription" name="other_details" placeholder="Enter the Extra Details about the Complaint" size="35" required></textarea>
                        </div>
                        <div class="input-box">
                            <label>Suspects:</label>
                            <textarea rows="2" cols="48" id="suspects" name="suspects" placeholder="Enter the suspects Names" size="35" required></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div class="button-container">
                            <button type="button" class="btn btn-back" onclick="goBack()">Back</button>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                            <button class="btn btn-submit" name="Submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
