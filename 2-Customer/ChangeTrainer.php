<?php
    include_once('../backend/connection.php');
    
    $loginId = $_COOKIE['loginId'];
    $trainerId = $_COOKIE['trainerId'];

    $query = "UPDATE customer SET trainerID = '$trainerId' WHERE loginID = '$loginId'";
    mysqli_query($connection, $query);

    header('Location: CustomerHome.php');
?>