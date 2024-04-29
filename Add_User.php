<?php
include 'Database/connection.php';
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
        echo "<script>  window.alert('Sign-in successful');</script>";
        header('location:Users.php');
    }else{
        echo "Failed";
    }
}
?>
<!--echo "<script>  window.alert('Submit successful'); window.location='Website.php';</script>";-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Officer/Investigator/OIC Sign Up</title>
    <link rel="stylesheet" href="../Sign up/Sign_Style.css">
    <script src="../Sign up/Sign_Script.js" defer></script><!--link with javascript code-->
    <style>
        /* Insert your CSS here */
        .three-columns {
            display: flex;
            justify-content: space-between;
        }

        .form-column {
            flex: 1;
            margin: 0 10px;
        }

        .gender-option, .btns-group {
            display: flex;
            justify-content: space-between;
        }
        
        .form-control {
            width: 100%;
        }

        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
 
    <!-- <form action="SDatabase.php" method="POST" class="form" onsubmit="return showSuccessMessage(event)"> -->
    <form method="POST" class="form">
        <h1 class="text-center"></h1>

        <div class="three-columns">
            <!-- 1st Column -->
            <div class="form-column">
              
                    <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="O">OIC</option>
                        <option value="PF">Police Officer</option>
                        <option value="I">Investigator</option>
                    </select>
                <br>
                <br>
                <div class="input-group">
                        <label>Rank:</label>
                        <input type="text" class="form-control" name="rank" placeholder="Rank" required>
                    </div>
                    <br>

                <div class="input-group">
                    <label>First Name:</label>
                    <input type="text" class="form-control" name="Fname" placeholder="Enter the First Name" oninput="validateName(this)" required >
                </div>
                <br>
                <div class="input-group">
                    <label>Last Name:</label>
                    <input type="text" class="form-control" name="Lname" placeholder="Enter the Last Name" oninput="validateName(this)" required>
                </div>
                <br>
                    <div class="input-group">
                        <label>Service No.:</label>
                        <input type="text" class="form-control" name="Snum" placeholder="Enter your Service No." required>
                    </div>
                    <br>
                    
                    
            </div>

            <!-- 2nd Column -->
            <div class="form-column">
               

                <div class="input-group">
                    <label>Title:</label>
                    <select name="titleName" class="form-control">
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label>NIC:</label>
                    <input type="text" class="form-control" name="nicNumber" placeholder="Enter the NIC number" oninput="validateNIC(this); calculateDetails()" id="nic" pattern="^[0-9]{9}[vV]$|^[0-9]{12}$"
                    title="Please enter a valid NIC number: 9 digits followed by 'V' or 12 digits."  required>
                    <!--Validation and calculating parts of NIC, can add only 9 or 12 digits and letter "V"-->
                    <!--Calculate gender, Birthday, Age by NIC-->
                </div>
                <br>
                <div class="input-group">
                    <label>Birth Date:</label>
                    <input type="date" class="form-control" name="DOB" id="dob" placeholder="DD/MM/YY" required>
                </div>
                <br>
                <div class="input-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender will appear here" readonly>
                </div>
                <br>
                <div class="input-group">
                    <label>Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter your visiting location">
                    <div class="alert-message">
                        (*only investigators should fill thier duty locations.)
                 </div>
                </div>
            </div>

            <!-- 3rd Column -->
            <div class="form-column">
                <div class="input-group">
                    <label>E-mail:</label>
                    <input type="email" class="form-control" name = "email" placeholder="abscefg@gmail.com" required>
                </div>
                <br>
                <div class="input-group">
                    <label>Contact No:</label>
                    <input type="number" class="form-control" name="contactNumber" oninput="validateNumber(this)" pattern="^[0-9]{10}$" title="Please enter exactly 10 digits." placeholder="**********" required>
                </div>
                <br>
                <div class="input-group">
                    <label>User Name:</label>
                    <input type="text" class="form-control" name="Uname" placeholder="Enter User Name">
                </div>
            </div>
        </div>
       

        <!-- Submit button -->
        <div class="btns-group">
            <!-- <input type="submit" value="Register" class="btn btn-primary" name="Register"> -->
            <input type="submit" value="Register" class="btn btn-primary" name="submit">
        </div>
        <div id="notification" style="display:none; padding: 10px; background-color: #D4EDDA; color: #155724; border: 1px solid #C3E6CB; margin: 10px; border-radius: 5px;">
            Submitted successfully!
        </div>
        <a href="../Website/Web.php" class="home-btn">HOME</a>
    </form>
</body>
</html>