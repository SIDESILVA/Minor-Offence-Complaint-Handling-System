<?php

include '../Database/connection.php';

$Complaint_No = isset($_GET['complaintNumber']) ? $_GET['complaintNumber'] : '';
$Ref_Number = isset($_GET['referenceNumber']) ? $_GET['referenceNumber'] : '';

// Use the complaintNumber and referenceNumber to fetch details from the database
$sql = "SELECT * FROM `case_investigate` WHERE `Complaint_No` = '$Complaint_No'";
$result = mysqli_query($con, $sql); // Use $sql instead of $query

// Initialize variables
$Start_Date = '';
$Start_Time = '';
$End_Date = '';
$End_Time = '';
$Final = '';
$Status = '';
$In_Parties = '';
$Image = '';
$Video = '';
$Audio = '';
$Text = '';



if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row !== null) {
        // Fetch additional details from case_investigate
        $complaintNumber = $row['Complaint_No'];
        $queryInvestigate = "SELECT * FROM case_investigate WHERE Complaint_No = '$complaintNumber'";
        $resultInvestigate = mysqli_query($con, $queryInvestigate);

        if ($resultInvestigate) {
            $rowInvestigate = mysqli_fetch_assoc($resultInvestigate);
            $Start_Date = isset($rowInvestigate['Start_Date']) ? $rowInvestigate['Start_Date'] : '';
            $Start_Time = isset($rowInvestigate['Start_Time']) ? $rowInvestigate['Start_Time'] : '';
            $End_Date = isset($rowInvestigate['End_Date']) ? $rowInvestigate['End_Date'] : '';
            $End_Time = isset($rowInvestigate['End_Time']) ? $rowInvestigate['End_Time'] : '';
            $Final = isset($rowInvestigate['Final']) ? $rowInvestigate['Final'] : '';
            $Status = isset($rowInvestigate['Status']) ? $rowInvestigate['Status'] : '';
            $In_Parties = isset($rowInvestigate['In_Parties']) ? $rowInvestigate['In_Parties'] : '';
       
        }
        
    } 
} else {
    echo 'Error in executing query: ' . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Summary/investigator.css">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
    <nav>
        <div class="list" id="list">
            <ul>
                <li><a href="../Website/Web.php"><b>HOME</b></a></li>
                <li><a href="../About/About.php"><b>ABOUT</b></a></li>
                <li><a href="#"><b>CONTACT US</b></a></li>
                <li><a href="../Summary/login_summary.php"><b>SUMMARY</b></a></li>
                <li><a href="../Login/Login.php" class="log-btn"><b>LOGIN</b></a></li>
                        </ul>
        </div>
    </nav>
    <div class="wrapper">
        <br>
        <form method="POST" action="../Summary/evidence.php" class="form">
            <div class="form-part">
                <!-- First Part of the Form -->
                <!-- Column 1 -->
                <div class="form-column">
                <div class="input-box">
                        <label>Start Date:</label>
                        <input type="text" name="Sdate" readonly value="<?php echo $Start_Date; ?>">
                    </div>
                    <div class="input-box">
                        <label>Start Time:</label>
                        <input type="text" name="Stime" readonly value="<?php echo $Start_Time; ?>">
                    </div>
                    <div class="input-box">
                        <label>End Date:</label>
                        <input type="text" name="Edate" readonly value="<?php echo $End_Date; ?>">
                    </div>
                    <div class="input-box">
                        <label>End Time:</label>
                        <input type="text" name="Etime"  readonly value="<?php echo $End_Time; ?>">
                    </div>
                    <div class="input-box">
                        <label>Current Status:</label>
                        <input type="text" name="C_status" readonly value="<?php echo $Status; ?>">
                    </div>
                    <div class="input-box">
                        <label>Final Update:</label>
                        <textarea rows="2" cols="48" name="Update" size="35" readonly><?php echo $Final; ?></textarea>
                    </div>
                    <div class="input-box">
                        <label class="label-style">Names of complaint parties:</label>
                        <input type="text" name="parties" size="35" readonly value="<?php echo $In_Parties; ?>">
                    </div>
                    
                    
                   
                  
                   
            </div>

            <script>
            document.querySelector('[name="Sdate"]').value = '<?= $Start_Date ?>';
            document.querySelector('[name="Stime"]').value = '<?= $Start_Time ?>';
            document.querySelector('[name="Edate"]').value = '<?= $End_Date ?>';
            document.querySelector('[name="Etime"]').value = '<?= $End_Time ?>';
            document.querySelector('[name="C_status"]').value = '<?= $Status ?>';
            document.querySelector('[name="Update"]').value = '<?= $Final ?>';
            document.querySelector('[name="parties"]').value = '<?= $In_Parties ?>';
        </script>
        </form>
    </div>
</div>
</body>
</html>