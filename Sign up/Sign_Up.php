<?php
include '../Database/connection.php';
if(isset($_POST['submit'])){

    $Status = $_POST["status"];
    $First_Name = $_POST["Fname"];
    $Last_Name = $_POST["Lname"];
    $Service_No = $_POST["Snum"];
    $Rank = $_POST["rank"];
    $Title = $_POST["titleName"];
    $NIC = $_POST["nicNumber"];
    $Birth_Date = $_POST["DOB"];
    $Gender = $_POST["gender"];
    $Location = $_POST["location"];
    $E_Mail = $_POST["email"];
    $Contact_No = $_POST["contactNumber"];
    $User_Name = $_POST["Uname"];


    $sql_test = "INSERT INTO `sign_up`(`Status`, `First_Name`, `Last_Name`, `Service_No`, `Rank`, `Title`, `NIC`, `Birth_Date`, `Gender`, 
    `Location`, `E_Mail`, `Contact_No`, `User_Name`) VALUES ('$Status','$First_Name','$Last_Name','$Service_No','$Rank','$Title',
    '$NIC','$Birth_Date','$Gender','$Location','$E_Mail','$Contact_No','$User_Name')";

    $result = mysqli_query($con,$sql_test);

    if($result){
        echo "<script>  window.alert('You will get signup approval soon.'); window.location='../Login/Login.php';</script>";
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
    <link rel="stylesheet" href="Sign_Style.css">
    <script src="../Sign up/Sign.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <li><a href="../Login/Login.php" class="log-btn"><b>Login</b></a></li>
                </ul>
            </div>
        </nav>
    <div class="wrapper">
        <form method="POST" class="form" id="signupForm">
            <h1>Registration</h1>
            <div class="input-box">
            <div class="input-field">
                <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="O">OIC</option>
                        <option value="PF">Police Officer</option>
                        <option value="I">Investigator</option>
                    </select>
            </div>
            <div class="input-field">
                <label>Title:</label>
                    <select name="titleName" class="form-control">
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                    </select>
            </div>
              
                <div class="input-field">
                    <input type="text" name="Fname" placeholder="First Name" oninput="validateName(this)" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="number" name="nicNumber" placeholder="NIC" oninput="validateNIC(this); calculateDetails()" id="nic" pattern="^[0-9]{9}[vV]$|^[0-9]{12}$"
                    title="Please enter a valid NIC number: 9 digits followed by 'V' or 12 digits." required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-field">
                    <input type="text"  name="Lname" placeholder="Last Name" oninput="validateName(this)" required>
                    <i class='bx bxs-user'></i>
                </div>
                
                <div class="input-field">
                    <input type="text" name="Snum" placeholder="Service No." required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="rank" placeholder="Rank" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="DOB" id="dob" placeholder="Birth Date" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                
            </div>

            <div class="input-box">
            
            
              
                <div class="input-field">
                    <input type="text" name="gender" id="gender" placeholder="Gender" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Investigator visiting location" name="location">
                    <i class='bx bxl-gmail'></i>
                    
                </div>
                <div class="input-field">
                    <input type="email" name = "email" placeholder="Email" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-field">
                    <input type="number" name="contactNumber" oninput="validateContactNumber(this)" pattern="^[0-9]{10}$" title="Please enter exactly 10 digits." maxlength="10" placeholder="Contact Number" required>
                    <i class='bx bxs-phone' ></i>
                </div>
                <div class="input-field">
                    <input type="text" name="Uname" placeholder="Username" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                
            </div>
            <label><input type="checkbox">I here by declare that the above information provided is true and correct.</label>
            <button type="submit" value="Register" name="submit" class="btn">Register</button>
        </form>
    </div>
</div>
</body>
</html>