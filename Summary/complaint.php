<?php

include '../Database/connection.php';

$Complaint_No = isset($_GET['complaintNumber']) ? $_GET['complaintNumber'] : '';
$Ref_Number = isset($_GET['referenceNumber']) ? $_GET['referenceNumber'] : '';

// Use the complaintNumber and referenceNumber to fetch details from the database
$sql = "SELECT * FROM `complaint_reg` WHERE `Complaint_No` = '$Complaint_No'";
$result = mysqli_query($con, $sql);

// Initialize variables
$Date = '';
$Title = '';
$First_Name = '';
$Last_Name = '';
$E_Mail = '';
$Contact_Number = '';
$NIC = '';
$Age = '';
$Birth_Date = '';
$Gender = '';
$Address = '';
$District = '';
$City = '';
$Division_Code = '';
$Investigator_Name = '';
$Complaint_Type = '';
$Other_Type = '';
$Description = '';
$Suspects = '';
$Other_Details = '';




if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row !== null) {
        // Fetch additional details from complaint_reg
        $Complaint_No = $row['Complaint_No'];
        $queryComplaintReg = "SELECT * FROM complaint_reg WHERE Complaint_No = '$Complaint_No'";
        $resultComplaintReg = mysqli_query($con, $queryComplaintReg);

        if ($resultComplaintReg) {
            $rowComplaintReg = mysqli_fetch_assoc($resultComplaintReg);
            $Date = isset($rowComplaintReg['Date']) ? $rowComplaintReg['Date'] : '';
            $Title = isset($rowComplaintReg['Title']) ? $rowComplaintReg['Title'] : '';
            $First_Name = isset($rowComplaintReg['First_Name']) ? $rowComplaintReg['First_Name'] : '';
            $Last_Name = isset($rowComplaintReg['Last_Name']) ? $rowComplaintReg['Last_Name'] : '';
            $E_Mail = isset($rowComplaintReg['E_Mail']) ? $rowComplaintReg['E_Mail'] : '';
            $Contact_Number = isset($rowComplaintReg['Contact_Number']) ? $rowComplaintReg['Contact_Number'] : '';
            $NIC = isset($rowComplaintReg['NIC']) ? $rowComplaintReg['NIC'] : '';
            $Age = isset($rowComplaintReg['Age']) ? $rowComplaintReg['Age'] : '';
            $Birth_Date = isset($rowComplaintReg['Birth_Date']) ? $rowComplaintReg['Birth_Date'] : '';
            $Gender = isset($rowComplaintReg['Gender']) ? $rowComplaintReg['Gender'] : '';
            $Address = isset($rowComplaintReg['Address']) ? $rowComplaintReg['Address'] : '';
            $District = isset($rowComplaintReg['District']) ? $rowComplaintReg['District'] : '';
            $City = isset($rowComplaintReg['City']) ? $rowComplaintReg['City'] : '';
            $Division_Code = isset($rowComplaintReg['Division_Code']) ? $rowComplaintReg['Division_Code'] : '';
            $Investigator_Name = isset($rowComplaintReg['Investigator_Name']) ? $rowComplaintReg['Investigator_Name'] : '';
            $Complaint_Type = isset($rowComplaintReg['Complaint_Type']) ? $rowComplaintReg['Complaint_Type'] : '';
            $Other_Type = isset($rowComplaintReg['Other_Type']) ? $rowComplaintReg['Other_Type'] : '';
            $Description = isset($rowComplaintReg['Description']) ? $rowComplaintReg['Description'] : '';
            $Suspects = isset($rowComplaintReg['Suspects']) ? $rowComplaintReg['Suspects'] : '';
            $Other_Details = isset($rowComplaintReg['Other']) ? $rowComplaintReg['Other'] : '';
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
    <title>Registration</title>
    <link rel="stylesheet" href="../Summary/com_style.css" />
</head>

<body>
<div class="main">
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
    <section class="container">
    <form method="GET" class="form" name="textForm">
    <div class="wrapper">   <!-- Two Column layout starts here -->
            <div class="form-row">
                 <!-- First Column -->
                <div class="form-column">
                    <div class="input-box">
                        <label>Date:</label>
                        <input type="date" placeholder="" name="date" size="35" value="<?php echo $Date; ?>"readonly >
                    </div>
                    <div class="input-box">
                        <label>Title:</label>
                        <input type="text" name="Fname" value="<?php echo $Title; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>First Name:</label>
                        <input type="text" name="Fname" value="<?php echo $First_Name; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Last Name:</label>
                        <input type="text" name="Lname" value="<?php echo $Last_Name; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>E-mail</label>
                        <input type="email"  size="35" name="email" value="<?php echo $E_Mail; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Contact Number:</label>
                        <input type="number" name="contactNumber"  size="35" value="<?php echo $Contact_Number; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>NIC:</label>
                        <input type="text" name="nicNumber"  size="35" value="<?php echo $NIC; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Age:</label>
                        <input type="number" name="age" size="2" maxlength="2" value="<?php echo $Age; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Birth Date:</label>
                        <input type="date" id="dob" name = "DOB"size="50" value="<?php echo $Birth_Date; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Gender:</label>
                        <input type="text" id="gender"  name= "gender" size="35" value="<?php echo $Gender; ?>" readonly>
                    </div>
                    <div class="input-box">
                        <label>Address:</label>
                        <textarea  name="address" class="description-textarea" readonly ><?php echo $Address; ?></textarea>
                    </div>
                </div>
                          <!--second column-->
                <div class="form-column">
                    
                    
                    <div class="input-box">
                        <label>District:</label>
                        <input type="text" id="district"  name= "district" size="35" value="<?php echo $District; ?>" readonly>
                    </div>
                    <div class="input-box">
                        <label>City:</label>
                        <input type="text" name="city" size="35" value="<?php echo $City; ?>" readonly>
                    </div>
                    <div class="input-box">
                        <label>Division Code:</label>
                        <input type="text" name="division_Code"  size="35" value="<?php echo $Division_Code; ?>" readonly />
                    </div>
                    <div class="input-box">
                        <label>Investigator Name:</label>
                        <input name="Iname" type="text" placeholder="" value="<?php echo $Investigator_Name; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Complaint Type:</label>
                        <input name="type" type="text" placeholder="" value="<?php echo $Complaint_Type; ?>" readonly >
                    </div>
                    <div class="input-box">
                        <label>Other Complaint Type:</label>
                        <input type="text" name="other" size="57" value="<?php echo $Other_Type; ?>" readonly />
                    </div>
                    <div class="input-box">
                        <label>Complaint Description:</label>
                        <textarea id="complaintDescription" name="description" rows="8" cols="25" class="description-textarea" readonly><?php echo $Description; ?></textarea>                    </div>
                    <div class="input-box">
                        <label>Suspects:</label>
                        <textarea id="suspects" name="suspects" class="description-textarea" readonly><?php echo $Suspects; ?></textarea>
                    </div>
                    <div class="input-box">
                        <label>Other Details:</label>
                        <textarea id="other_details" name="other_details" class="description-textarea" readonly><?php echo $Other_Details; ?></textarea>
                    </div>
                </div>
            </div>
        </form>
    </section>
    
</body>
</html>