<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="Web_Style.css">
</head>
<body>
    <div class="container" id="container"> <!-- Add id="container" here -->
        <nav>
            <div>
            <img src="../Img/logo.png" class="logo">
            </div>
            <div class="list" id="list">
            <ul>
                <li><a href="../Web/Web.php"><b>HOME</b></a></li>
                <li><a href="../Web/Web.php"><b>ABOUT</b></a></li>
                <li><a href="../Webe/Web.php"><b>CONTACT US</b></a></li>
                <li><a href="../Summary/login_summary.php"><b>SUMMARY</b></a></li>

                <li><a href="../Login/Login.php" class="btn"><b>Login</b></a></li>
            </ul>

           
            </div>
        </nav>
        <div class="content">
            <h1>Minor Offence <br> Complaint Handling System</h1>
            <p>The Sri Lankan Minor Offence Branch handles low-level violations of the law.<br>
                It primarily focuses on efficient resolution and administration of penalties for less severe infractions.</p>
            <form action="../Status_View/Status_R.php" method="GET">
                <input type="text" placeholder="Complainant Status View" name="complainantStatus">
                <button type="submit" class="btn">Search</button>
            </form>                
        </div>

       <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.getElementById("container");
                const images = [
                    "url(../Img/ba1.jpg)"
                ];
                let currentImageIndex = 0;
        
                function changeBackground() {
                    // Check if we reached the end of the images array
                    if (currentImageIndex === images.length) {
                        // If yes, reset currentImageIndex to 0 to repeat the pattern
                        currentImageIndex = 0;
                    }
        
                    container.style.backgroundImage = images[currentImageIndex];
                    currentImageIndex++;
                }
               
        
                // Change background every 5 seconds (5000 milliseconds)
                setInterval(changeBackground, 5000);
                
            });
        </script>
        
        

    </div>
</body>
</html>
