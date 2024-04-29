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
        body {
        background-color: #cad9f8;  /* This sets the background color to light gray */
    }
      .highlight-card {
  border: 2px solid black;
  box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.5); /* Optional: Add a shadow to make it more pronounced */
}

        .home-btn {
  display: inline-block;
  padding: 8px 20px;
  background-color: #001f3f; /* Change this to your preferred color */
  color: white;
  border-radius: 5px;
  font-weight: bold;
  text-decoration: none;
  position: fixed; /* This will keep the button at the same position even when you scroll */
  top: 20px; /* Distance from the top */
  right: 20px; /* Distance from the left */
  z-index: 1000; /* This ensures the button is above other elements */
}

  /* Add styles for the search bar container */
  #searchContainer {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Align to the right */
    margin-bottom: 20px; /* Adjust the margin to create space */
    margin-right: 820px; /* Add right margin */
    
}

#searchInput {
    padding: 8px;
    width: 50%;
    background-color: white;
    color: black;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
}

/* Add styles for the clear, back, and search buttons */
#clearButton, #backButton, #searchButton {
    padding: 8px 20px; /* Increase the padding to adjust the width */
    margin-left: 10px; /* Add margin between the buttons */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#clearButton {
    background-color: #001f3f;
    color: white;
}

#clearButton:hover {
    background-color: #003366;
}

#backButton {
    background-color: #008ECC; /* Dark gray for rework */
    color: white; /* Text color */
    margin-top: 20px;
}

#backButton:hover {
    background-color:  #333; /* Lighter red on hover */
}

#searchButton {
    background-color: #008ECC; /* Green for search */
    color: white;
    margin-top: 20px;
}

#searchButton:hover {
    background-color:  #333; /* Dark green on hover */
}

    </style>

  </head>
  <body>
    
  <a href="../Web/Web.php" class="home-btn">HOME</a>

  <div id="searchContainer">
        <input type="text" id="searchInput" onkeyup="searchComplaints()" placeholder="Search for complaint Summary...">
        <button id="searchButton" onclick="performSearch()">Search</button>
        <button id="backButton" onclick="goBack()">Back</button>
    </div>

      <div class="container my-5">
        <div class="my-3">
        <div class="row">
        <?php
            $sql = "SELECT * FROM `complaint_reg`";
            $result = mysqli_query($con,$sql);
            
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $Complaint_No = $row['Complaint_No'];
                    $Ref_Number = $row['Ref_Number'];
                    $Date = $row['Date'];
                    $NIC = $row['NIC'];
                    $First_Name = $row['First_Name'];
                    $Last_Name = $row['Last_Name'];
                    $Investigator_Name = $row['Investigator_Name'];

                    echo '<div class="col-4 mt-5" align="center" key='.$Complaint_No.'>
                    <div class="card highlight-card" name='.$Complaint_No.' style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">'.$Complaint_No.'</h5>
                      <h6 class="card-subtitle mb-2 text-muted">'.$Ref_Number.'</h6>
                      <p class="card-text">Date : '.$Date.'</p>
                      <p class="card-text">NIC : '.$NIC.'</p>
                      <p class="card-text">First Name : '.$First_Name.'</p>
                      <p class="card-text">Last Name : '.$Last_Name.'</p>
                      <p class="card-text">Investigator Name : '.$Investigator_Name.'</p>';
                      
                    // Modify the links to include parameters
                    echo '<a href="../Summary/Status.php?complaintNumber='.$Complaint_No.'&referenceNumber='.$Ref_Number.'" class="card-link">View</a>';
                    echo '<a href="../Summary/complaint.php?complaintNumber='.$Complaint_No.'&referenceNumber='.$Ref_Number.'" class="card-link">Complainer</a>';
                    // Fix the Investigator link placement
                    echo '<a href="../Summary/investigation.php?complaintNumber='.$Complaint_No.'&referenceNumber='.$Ref_Number.'" class="card-link">Investigator</a>';
                    echo '</div></div></div>';
                }
                echo '&nbsp';
            }
        ?>
        </div>
        </div>
      </div>
      <script>
function searchComplaints() {
    // Remove this function as it's not needed for real-time search
}

function performSearch() {
    var input, filter, cards, card, title, subtitle, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName("highlight-card");

    for (i = 0; i < cards.length; i++) {
        card = cards[i];
        title = card.querySelector(".card-title");
        subtitle = card.querySelector(".card-subtitle");

        // Check if either the complaint number or reference number matches the search filter
        if (
            title.innerHTML.toUpperCase().indexOf(filter) > -1 ||
            subtitle.innerHTML.toUpperCase().indexOf(filter) > -1
        ) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    }
}

// Function to go back to the previous page
function goBack() {
    document.getElementById("searchInput").value = "";
    // Call the search function to show all cards
    var cards = document.getElementsByClassName("highlight-card");
    for (var i = 0; i < cards.length; i++) {
        cards[i].style.display = "";
    }
}
</script>


  </body>
</html>
