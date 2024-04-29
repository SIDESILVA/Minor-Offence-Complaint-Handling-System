<?php
include '../Database/connection.php';
if(isset($_POST['Submit'])){

    $Complaint_No  = $_POST["complaintNumber"];
    $In_Parties = $_POST["parties"];
    $Final = $_POST["Update"];
    $Start_Date = $_POST["Sdate"];
    $Start_Time = $_POST["Stime"];
    $End_Date = $_POST["Edate"];
    $End_Time = $_POST["Etime"];
    $Image = $_POST["image"];
    $Audio = $_POST["audio"];
    $Text = $_POST["text"];
    $Video = $_POST["video"];
    $Status = $_POST["C_status"];

    $sql_test = "INSERT INTO `case_investigate`(`Complaint_No`,`In_Parties`, `Final`, `Start_Date`, `Start_Time`, `End_Date`, `End_Time`, 
        `Image`, `Audio`, `Text`, `Video`, `Status`) VALUES ('$Complaint_No','$In_Parties','$Final','$Start_Date','$Start_Time','$End_Date','$End_Time',
        '$Image','$Audio','$Text','$Video', 'Processing')";

    $result = mysqli_query($con,$sql_test);//error

    if($result){
        echo "<script>  window.alert('Investigator Submission Successfull.'); window.location='../Case_invest/Complete_investigation.php';</script>";
    }else{
        echo "Failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../Case_Invest/Inves.css">
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
                <form method="POST" class="form" onsubmit="onFormSubmit(event)" >
                    <div class="form-part">
                        <!-- First Part of the Form -->
                        <!-- Column 1 -->
                        <div class="form-column">
                            <div class="input-box">
                                <label class="label-style">Complaint No:</label>
                                <input type="text" name="complaintNumber" placeholder="Complaint No" size="35" required>
                            </div>
                            <div class="input-box">
                                <label class="label-style">Names of complaint parties:</label>
                                <input type="text" name="parties" placeholder="Enter the Complaint Parties" size="35" required>
                            </div>
                            <div class="input-box">
                                <label>Action Taken:</label>
                                <br>
                                <div class="picContainer">
                                    <!-- Image Upload -->
                                    <label for="imageInput">  
                                    Upload Image:
                                    <input type="file" id="imageInput" name="image" accept="image/*"></label>
                                    <!-- Audio Upload -->
                                    <label for="audioInput">
                                    Upload Audio:
                                    <input type="file" id="audioInput" name="audio" accept="audio/*">  </label>
                                    <!-- Text Upload -->
                                    <label for="textInput">
                                    Upload Text:    
                                    <input type="file" id="textInput" name="text" accept=".txt"></label> 
                                    <!-- Video Upload -->
                                    <label for="videoInput">
                                    Upload Video:
                                    <input type="file" id="videoInput" name="video" accept="video/*"> </label>
                                </div>
                            </div>
                            <div class="input-box">
                                <label>Final Update:</label>
                                <textarea rows="2" cols="48" name="Update" placeholder="Enter the Final Update" size="35" required></textarea>
                            </div>
                            <div class="input-box">
                                <label>Start Date:</label>
                                <input type="date" name="Sdate" placeholder="" required>
                            </div>
                            <div class="input-box">
                                <label>Start Time:</label>
                                <input type="time" name="Stime" placeholder="" required>
                            </div>
                            <div class="input-box">
                                <label>End Date:</label>
                                <input type="date" name="Edate" placeholder="" required>
                            </div>
                            <div class="input-box">
                                <label>End Time:</label>
                                <input type="time" name="Etime" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <input class="btn btn-primary" name="Submit" type="Submit"  value="Submit"><br><br>
                        <script>
                            document.querySelector("[name='Etime']").addEventListener('change', function() {
                                // Fetch the start and end dates
                                var startDate = new Date(document.querySelector("[name='Sdate']").value);
                                var endDate = new Date(document.querySelector("[name='Edate']").value);

                                // Placeholder for the message
                                var alertMessage = document.getElementById("alertMessage");

                                // Calculate the difference in days
                                var timeDifference = endDate - startDate;
                                var dayDifference = timeDifference / (1000 * 3600 * 24);

                                // Check if the dates are valid
                                if (dayDifference < 0) {
                                    alert("Incorrect start date. The end date should be after the start date.");
                                } else if (isNaN(dayDifference)) {
                                    alertMessage.textContent = "Please provide valid start and end dates.";
                                } else {
                                    alertMessage.textContent = "Duration of the Investigation: " + dayDifference + " days.";
                                }
                            });
                        </script>
                </form>
            </div>
        </div>
    </body>
</html>

