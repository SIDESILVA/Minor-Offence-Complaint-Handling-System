
<?php
include '../Database/connection.php';

$name = $complaintNumber = $complaintType = $complaintText = $currentStatus = "" ;
$refNumber = ""; 
$finalUpdate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_GET['refNumber'])) {
        $refNumber = $_GET['refNumber'];
    } else if(isset($_POST['refNumber'])) {
        $refNumber = $_POST['refNumber'];
    }
    
  $refNumber = $_POST['refNumber'];

 // Using Prepared Statements for security
 $stmt = $con->prepare("SELECT * FROM complaint_reg WHERE Ref_Number = ?");
 $stmt->bind_param("s", $refNumber);
 $stmt->execute();

 $result = $stmt->get_result();

 if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $name = $row['First_Name'] . " " . $row['Last_Name'];
  $complaintNumber = $row['Complaint_No'];
  $complaintType = $row['Complaint_Type'];
  $complaintText = $row['Description'];
  $currentStatus = isset($row['C_status']) ? $row['C_status'] : ""; 


  // After fetching from complaint_reg, fetch from case_investigate
  $stmt2 = $con->prepare("SELECT * FROM case_investigate WHERE Complaint_No = ?");
  $stmt2->bind_param("s", $complaintNumber);  // Using complaintNumber to fetch the data
  $stmt2->execute();
  $result2 = $stmt2->get_result();


  if(mysqli_num_rows($result2) == 1) {
    $row2 = mysqli_fetch_assoc($result2);
    $currentStatus = $row2['Status'];
    $finalUpdate = $row2['Final'];  
  }
} else {
  echo "<script>alert('No data found for the provided reference number.'); window.location.href='Status_R.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveDetails'])) {
  // Fetch data from the POST array
  $refNumberToSave = $_POST['refNumberToSave'];
  $nameToSave = $_POST['nameToSave'];
  $complaintNumberToSave = $_POST['complaintNumberToSave'];
  $complaintTypeToSave = $_POST['complaintTypeToSave'];
  $complaintTextToSave = $_POST['complaintTextToSave'];
  $currentStatusToSave = $_POST['currentStatusToSave'];
  $finalUpdateToSave = $_POST['finalUpdateToSave'];

  // Insert the data into status_view
  $stmtSave = $con->prepare("INSERT INTO status_view (Ref_No, Name, Complaint_No, C_Type, Complaint, Current_Status, Final) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmtSave->bind_param("sssssss", $refNumberToSave, $nameToSave, $complaintNumberToSave, $complaintTypeToSave, $complaintTextToSave, $currentStatusToSave, $finalUpdateToSave);


}
}
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
            <h1>Status View Form</h1>
            <form method="POST" action="Status_R.php">
                <div class="input-box">
                    <label for="referenceNumber">Reference Number:</label>
                    <input type="text" id="refNumber" name="refNumber" value="<?php echo htmlspecialchars($refNumber); ?>" placeholder="Enter Reference Number" required>
                </div>
                <div class="button-container">
                    <button class="btn btn-submit" type="submit">View Status</button>
                </div>
            </form>
            <form id="statusDetailsForm" method="POST" action="Status_R.php">
            <div class="status-details">
                <h2>Status Details</h2>
                <div class="details-container">
                    <div class="detail-item">
                        <label><b>Name:</b></label>
                        <br>
                        <input type="text" id="name" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <label><b>Full Update:</b></label>
                        <br>
                        <id="complaintText" rows="5" cols="50" class="text-right" readonly><?php echo $complaintText; ?>
                    </div>
                    <div class="detail-item">
                        <label><b>Complaint Type:</b></label>
                        <br>
                        <id="complaintType" class="complaint-type-textarea text-right" readonly><?php echo $complaintType; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
