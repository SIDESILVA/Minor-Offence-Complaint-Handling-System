<?php
include '../Database/connection.php';
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
  background-color: #000000; /* Change this to your preferred color */
  color: white;
  border-radius: 5px;
  font-weight: bold;
  text-decoration: none;
  position: fixed; /* This will keep the button at the same position even when you scroll */
  top: 20px; /* Distance from the top */
  right: 20px; /* Distance from the left */
  z-index: 1000; /* This ensures the button is above other elements */
}

.home-btn:hover {
  background-color: #2980b9; /* A slightly darker shade for hover effect */
}

.btn-custom {
    background-color: #000080; /* Add user change */
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

        </style>
  </head>
  <body>
  <a href="../Web/Web.php" class="home-btn">HOME</a>
      <div class="container my-5">
        <div class="my-3">
        <h2>Pending Users</h2>
        <table class="table table-hover">
        <thead>
        <tr>
        <th>Complaint_No</th>
        <th>In_Parties</th>
        <th>Start_Date</th>
        <th>Start_Time</th>
        <th>End_Date</th>
        <th>End_Time</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM `case_investigate`";
            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $complaint_no = $row['Complaint_No'];
                    $in_parties = $row['In_Parties'];
                    $start_date = $row['Start_Date'];
                    $start_time = $row['Start_Time'];
                    $end_date = $row['End_Date'];
                    $end_time = $row['End_Time'];
                    $status = $row['Status'];


                    echo '<tr>
                    <td>'.$complaint_no.'</td>
                    <td>'.$in_parties.'</td>
                    <td>'.$start_date.'</td>
                    <td>'.$start_time.'</td>
                    <td>'.$end_date.'</td>
                    <td>'.$end_time.'</td>
                    <td>'.$status.'</td>
                    
                    
                    <td>
                        <a href="process.php?no='.$complaint_no.'">
                        <button type="button" name="decline" class="btn btn-decline">Process</button>
                        </a>
                        <a href="complete.php?no='.$complaint_no.'">
                        <button type="button" name="decline" class="btn btn-decline">Complete</button>
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
        
      
  </body>
</html>