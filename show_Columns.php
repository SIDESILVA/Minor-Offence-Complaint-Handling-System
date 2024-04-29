<?php
// Use __DIR__ to get the absolute path to the included file
include 'Database/connection.php';

// Check if the $con variable is set and not null
if (isset($con) && $con instanceof mysqli) {
    $tableName = 'case_investigate';

    $sql = "SHOW COLUMNS FROM $tableName";
    $result = mysqli_query($con, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Field'] . "<br>";
        }
    } else {
        echo 'Error in executing query: ' . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo 'Database connection not properly initialized.';
}
?>
