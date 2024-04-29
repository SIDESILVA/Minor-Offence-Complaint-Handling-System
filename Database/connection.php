<?php
    $con = new mysqli('localhost','root','','dbuser');

    if($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    }
?>