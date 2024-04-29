<?php
include 'Database/connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Users</title>
    <style>
         body{
            background-color: #ffffff; 
        }
            
        .home-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000080; /* Change this to your preferred color */
            color: white;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            position: fixed; /* This will keep the button at the same position even when you scroll */
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the left */
            z-index: 1000; /* This ensures the button is above other elements */
        }

        .btn-custom {
            background-color: #0e4d92; /* Add user change */
            color: white; /* Text color */
        }

        .btn-approve {
            background-color: #008ECC; /* Green for approval */
            color: white; /* Text color */
        }

        .btn-decline {
            background-color: #111E6C; /* Yellow for decline */
            color: white; /* Text color */
        }

        .btn-rework {
            background-color: #588BAE; /* Dark gray for rework */
            color: white; /* Text color */
        }

        .btn-remove {
            background-color: #0e4d92; /* Red for removal */
            color: white; /* Text color */
        }

        .scrollable-content {
            height: calc(100vh - 100px); /* Adjust the height according to your design */
            overflow-y: auto; /* Enable vertical scrolling */
        }
    </style>
  </head>
  <body>
  <a href="../Web/Web.php" class="home-btn">HOME</a>
      <div class="container my-5">
      <a href="Add_User.php">
    <button type="button" class="btn btn-primary">Add user</button>
</a>
        <div class="my-3">
        <h2>Pending Users</h2>
        <table class="table table-hover">
        <thead>
        <tr>
        <th>NIC</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th>Service No.</th>
        <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM `sign_up` WHERE `Step` = 'Pending'";
            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $nic = $row['NIC'];
                    $first_Name = $row['First_Name'];
                    $last_Name = $row['Last_Name'];
                    $user_Name = $row['User_Name'];
                    $email = $row['E_Mail'];
                    $mobile = $row['Contact_No'];
                    $status = $row['Status'];
                    $Service_No = $row['Service_No'];


                    echo '<tr>
                    <td name="nic">'.$nic.'</td>
                    <td>'.$first_Name.'</td>
                    <td>'.$last_Name.'</td>
                    <td>'.$user_Name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$mobile.'</td>
                    <td>'.$status.'</td>
                    <td>'.$Service_No.'</td>
                    
                    
                    <td>
                    <a href="Approve_User.php?nic='.$nic.'&username='.$user_Name.'&email='.$email.'">
    <button type="button" name="approve" class="btn btn-approve">Approve</button>
</a>
<a href="Decline_User.php?nic='.$nic.'">
<button type="button" name="decline" class="btn btn-decline">Decline</button>
</a>
<a href="Delete_User.php?nic='.$nic.'">
<button type="button" class="btn btn-remove">Remove</button>
</a>
                    </td>
                    </tr>';

                }
            }
            // <a href="update.php?id='.$id.'&name='.$name.'&email='.$email.'&mobile='.$mobile.'&password='.$password.'"> 
        ?>
        </tbody>
        </table>
        </div>
        <div class="my-3">
        <h2>Approved Users</h2>
        <table class="table table-hover">
        <thead>
        <tr>
        <th>NIC</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th>Service No.</th>
        <th>Operation</th>
        
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM `sign_up` WHERE `Step` = 'Approved'";
            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $nic = $row['NIC'];
                    $first_Name = $row['First_Name'];
                    $last_Name = $row['Last_Name'];
                    $email = $row['E_Mail'];
                    $mobile = $row['Contact_No'];
                    $status = $row['Status'];
                    $Service_No = $row['Service_No'];
                    
                    

                    echo '<tr>
                    <td name="nic">'.$nic.'</td>
                    <td>'.$first_Name.'</td>
                    <td>'.$last_Name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$mobile.'</td>
                    <td>'.$status.'</td>
                    <td>'.$Service_No.'</td>
                    
                    
                    <td>
                    <a href="Rework.php?nic='.$nic.'">
    <button type="button" name="rework" class="btn btn-rework">Rework</button>
</a>
<a href="Delete_User.php?nic='.$nic.'">
<button type="button" class="btn btn-remove">Remove</button>
</a>
                    </td>
                    </tr>';

                }
            }
            // <a href="update.php?id='.$id.'&name='.$name.'&email='.$email.'&mobile='.$mobile.'&password='.$password.'"> 
        ?>
        </tbody>
        </table>
        </div>
        <div class="my-3">
        <h2>Declined Users</h2>
        <table class="table table-hover">
        <thead>
        <tr>
        <th>NIC</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th>Service No.</th>
        <th>Operation</th>
        
        
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM `sign_up` WHERE `Step` = 'Declined'";
            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $nic = $row['NIC'];
                    $first_Name = $row['First_Name'];
                    $last_Name = $row['Last_Name'];
                    $email = $row['E_Mail'];
                    $mobile = $row['Contact_No'];
                    $status = $row['Status'];
                    $Service_No = $row['Service_No'];
                    

                    echo '<tr>
                    <td name="nic">'.$nic.'</td>
                    <td>'.$first_Name.'</td>
                    <td>'.$last_Name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$mobile.'</td>
                    <td>'.$status.'</td>
                    <td>'.$Service_No.'</td>
                    
                    
                    <td>
                    <a href="Rework.php?nic='.$nic.'">
    <button type="button" name="rework" class="btn btn-rework">Rework</button>
</a>
                    <a href="Delete_User.php?nic='.$nic.'">
    <button type="button" class="btn btn-remove">Remove</button>
</a>
                    </td>
                    </tr>';

                }
            }
            // <a href="update.php?id='.$id.'&name='.$name.'&email='.$email.'&mobile='.$mobile.'&password='.$password.'"> 
        ?>
        </tbody>
        </table>
        </div>
      </div>
      
  </body>
</html>