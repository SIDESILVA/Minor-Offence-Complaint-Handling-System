<?php
include '../Database/connection.php';

$Complaint_No = $_GET['complaintNumber']; // Assuming you pass this in the URL
$Ref_Number = $_GET['referenceNumber']; // Assuming you pass this in the URL

// Use the complaintNumber and referenceNumber to fetch details from the database
$query = "SELECT * FROM complaint_reg WHERE Complaint_No = '$Complaint_No' AND Ref_Number = '$Ref_Number'";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error in executing query: ' . mysqli_error($con));
}

// Rest of your code


// Initialize $finalUpdate and $currentStatus to empty strings
$finalUpdate = '';
$currentStatus = '';

// Display the retrieved details
if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Fetch additional details from case_investigate
    $complaintNumber = $row['Complaint_No'];

    $queryInvestigate = "SELECT * FROM case_investigate WHERE Complaint_No = '$complaintNumber'";
    $resultInvestigate = mysqli_query($con, $queryInvestigate);

    if ($resultInvestigate) {
        $rowInvestigate = mysqli_fetch_assoc($resultInvestigate);
        $finalUpdate = isset($rowInvestigate['Final']) ? $rowInvestigate['Final'] : '';
        $currentStatus = isset($rowInvestigate['Status']) ? $rowInvestigate['Status'] : '';
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
    <title>Status View Form</title>
    <link rel="stylesheet" href="../Status_View/Status_Style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form id="statusDetailsForm" method="POST" action="Status_R.php">
            <div class="status-details">
                <div class="details-container">
                    <div class="detail-item">
                    <label for="name">Name</label>
                    <input type="text" id="name" value="<?php echo $row['First_Name'] . ' ' . $row['Last_Name']; ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <label><b>Current Status:</b></label>
                        <br>
                        <id="currentStatus" rows="5" cols="50" class="text-right" readonly><?php echo $currentStatus; ?>
                    </div>
                    <div class="detail-item">
                        <label><b>Complaint Type:</b></label>
                        <br>
                        <id="complaintType" class="complaint-type-textarea text-right" readonly><?php echo $row['Complaint_Type']; ?>
                    </div>
                    <div class="detail-item">
                        <label><b>Complaint Description:</b></label>
                        <br>
                        <id="complaintText" class="complaint-type-textarea text-right" readonly><?php echo $row['Description']; ?>
                    </div>
                    <div class="detail-item">
                        <label><b>Final Update:</b></label>
                        <br>
                        <id="ComplaintFinal" class="complaint-type-textarea text-right" readonly><?php echo $finalUpdate ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
