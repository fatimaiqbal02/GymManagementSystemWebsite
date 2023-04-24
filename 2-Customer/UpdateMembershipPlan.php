<?php
    include_once('../backend/connection.php');
    
    $loginId = $_COOKIE['loginId'];
    $membershipId = $_COOKIE['membershipId'];

    $query = "UPDATE customer SET membershipID = '$membershipId' WHERE loginID = '$loginId'";
    mysqli_query($connection, $query);

    header('Location: CustomerHome.php');
?>