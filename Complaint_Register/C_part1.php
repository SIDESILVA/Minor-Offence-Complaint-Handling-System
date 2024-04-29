<?php
include '../Database/connection.php';


if(isset($_POST['Next'])){

    $Complaint_No = $_POST["complaintNumber"];
    $Ref_Number = $_POST["refNumber"];
    $Date = $_POST["date"];
    $Title = $_POST["title"];
    $First_Name = $_POST["Fname"];
    $Last_Name = $_POST["Lname"];
    $E_Mail = $_POST["email"];
    $Contact_Number = $_POST["contactNumber"];
    $NIC  = $_POST["nicNumber"];
    $Age = $_POST["age"];
    $Birth_Date = $_POST["DOB"];
    $Gender = $_POST["gender"];
    $Address = $_POST["address"];
    $District = $_POST["district"];
    $City = $_POST["city"];
    $Division_Code = $_POST["division_Code"];
    $Investigator_Name = $_POST["Iname"];



    $sql_test = "INSERT INTO `complaint_reg`(`Complaint_No`, `Ref_Number`, `Date`, `Title`, `First_Name`, `Last_Name`, `E_Mail`, `Contact_Number`, `NIC`, `Age`, 
    `Birth_Date`, `Gender`, `Address`, `District`, `City`, `Division_Code`, `Investigator_Name`) VALUES ('$Complaint_No', '$Ref_Number', '$Date','$Title',
    '$First_Name','$Last_Name','$E_Mail', '$Contact_Number','$NIC','$Age','$Birth_Date','$Gender','$Address','$District','$City', '$Division_Code',
    '$Investigator_Name')";

    $result = mysqli_query($con,$sql_test);

    if($result){
        header ("location:../Complaint_Register/C_part2.php?param_name=" . urlencode($Complaint_No)."&username=" . urlencode($Investigator_Name));
        // <a href="update.php?id='.$id.'&name='.$name.'&email='.$email.'&mobile='.$mobile.'&password='.$password.'"> 
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
        <link rel="stylesheet" href="../Complaint_Register/C_part_1.css">
        <script src="../Complaint_Register/C_PART1.js" defer></script><!--link with javascript code-->
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
                <form method="POST" class="form" action="../Complaint_Register/C_part1.php" name="textForm" onsubmit="return validateForm()">
                    <div class="form-part">
                        <!-- First Part of the Form -->
                        <!-- Column 1 -->
                        <div class="form-column">
                            <div class="input-box">
                                <label class="label-style">Complaint No:</label>
                                <input type="text" name="complaintNumber" size="35" required readonly >
                            </div>
                            <div class="input-box">
                                <label class="label-style">Reference No:</label>
                                <input type="text" name="refNumber" size="35" required readonly>
                            </div>
                            <div class="input-box">
                                <label>Date:</label>
                                <input type="date" id="dateInput" placeholder="DD/MM/YY" name="date" required>
                            </div>
                            <div class="gender-box">
                                <label>Title</label>
                                <div class="gender-option">
                                    <input type="radio" name="title" value="Mr">Mr.
                                    <input type="radio" name="title" value="Mrs">Mrs.
                                    <input type="radio" name="title" value="Ms">Ms.
                                    <input type="radio" name="title" value="Rev">Rev.
                                </div>
                            </div>
                            <br>
                            <div class="input-box">
                                <label>First Name:</label>
                                <input type="text" name="Fname" placeholder="Enter the First Name" oninput="validateName(this)" required>
                            </div>
                            <div class="input-box">
                                <label>Last Name:</label>
                                <input type="text" name="Lname" placeholder="Enter the Last Name" oninput="validateName(this)" required>
                            </div>
                            <div class="input-box">
                                <label>E-mail</label>
                                <input type="email" class="emailInput" placeholder="abscefg@gmail.com" name="email" required>
                            </div>
                            <div class="input-box">
                                <label>Contact Number:</label>
                                <input type="number" name="contactNumber" class="contactInput" oninput="validateNumber(this)" pattern="^[0-9]{10}$" title="Please enter exactly 10 digits." placeholder="**********" required>
                            </div>
                            <div class="input-box">
                                <label>NIC:</label>
                                <input type="text" name="nicNumber" placeholder="Enter the NIC number" oninput="validateNIC(this); calculateDetails()" id="nic" pattern="^[0-9]{9}[vV]$|^[0-9]{12}$" title="Please enter a valid NIC number: 9 digits followed by 'V' or 12 digits." size="35" required>
                            </div>
                            <div class="input-box">
                                <label>Age:</label>
                                <input type="number" name="age" id="age" placeholder="" size="2" maxlength="2" required>
                            </div>
                            <div class="input-box">
                                <label>Birth Date:</label>
                                <input type="date" id="dob" name = "DOB" placeholder="DD/MM/YY" size="50" required>
                            </div>
                            <div class="input-box">
                                <label>Gender:</label>
                                <input type="text" id="gender"  name= "gender" placeholder="Gender will appear here" size="35" readonly>
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="form-column">
                            <div class="input-box">
                                <label>Address:</label>
                                <textarea rows="2" cols="48" name="address" placeholder="Enter the Address" size="35" required></textarea>
                            </div>
                            <div class="input-box">
                                <label>District:</label>
                                <select name="district" class="select-box"> 
                                    <!--Can select 25 districts as a option-->
                                    <option>Colombo</option> 
                                    <option>Gampaha</option>
                                    <option>Kalutara</option>
                                    <option>Kandy</option>
                                    <option>Matale</option>
                                    <option>Nuwara Eliya</option>
                                    <option>Galle</option>
                                    <option>Matara</option>
                                    <option>Hambantota</option>
                                    <option>Jaffna</option>
                                    <option>Kilinochchi</option>
                                    <option>Mannar</option>
                                    <option>Mullaitivu</option>
                                    <option>Vauniya</option>
                                    <option>Batticaloa</option>
                                    <option>Ampara</option>
                                    <option>Trincomalee</option>
                                    <option>Kurunegala</option>
                                    <option>Puttalam</option>
                                    <option>Anuradhapura</option>
                                    <option>Polonnaruwa</option>
                                    <option>Badulla</option>
                                    <option>Monaragala</option>
                                    <option>Ratnapura</option>
                                    <option>Kegalle</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label>City:</label>
                                <input type="text" name= "city" placeholder="Enter the City" size="35" required/>
                            </div>
                            <div class="input-box">
                                <label>Division Code:</label>
                                <input type="text" name="division_Code" placeholder="Enter the division code" size="35" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-part">
                        <!-- Second Part of the Form -->
                        <!-- Column 1 -->
                        <div class="form-column">
                            <div class="input-box">
                                <label>Investigator Name:</label>
                                <select name="Iname" id="Iname" placeholder="Select the duty investigator name" required class="select-box">
                                    <!--Can select 25 districts as a option-->
                                    <?php
                                    $sql = "SELECT `User_Name` FROM `sign_up` WHERE `Status` = 'I'";
                                    $result = mysqli_query($con,$sql);
                                        
                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $user_Name = $row['User_Name'];

                                            echo '<option>'.$user_Name.'</option>';

                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" name="Next">Next</button>
                </form>
            </div>
        </div>
    </body>
</html>

