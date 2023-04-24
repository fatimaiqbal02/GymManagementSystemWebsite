<?php
    include_once('../backend/connection.php');
    
    $loginId = $_COOKIE['loginId'];
    $statement = $_COOKIE['statement'];

    $customerQuery = "SELECT * FROM customer WHERE loginID = '$loginId'";
	$customerResult = mysqli_query($connection, $customerQuery);
	$customerRow = mysqli_fetch_assoc($customerResult);

    $highestChatQuery = "SELECT * FROM customerquery order by queryID DESC limit 1";
    $highestChatResult = mysqli_query($connection, $highestChatQuery);
    $highestChatRow = mysqli_fetch_assoc($highestChatResult);
    $highestChatId = $highestChatRow['queryID'];

    $queryId = incrementString('Q', $highestChatId);
    $queryDate = date("Y-m-d");
    $replyStatus = "NotReplied";
    $customerId = $customerRow['customerID'];

    $chatInsertQuery = "INSERT INTO customerquery (queryID, statement, replyStatus, reply, queryDate, customerID) VALUES ('$queryId', '$statement', '$replyStatus', null, '$queryDate', '$customerId')";
    mysqli_query($connection, $chatInsertQuery);

    header('Location: CustomerHome.php');
    function incrementString($firstLetter, $id) {
        // Split the id into an array
        $parts = explode($firstLetter, $id);

        // Get the number part and increment it by 1
        $num = intval($parts[1]) + 1;

        // Join the parts back together
        $result = $firstLetter . str_pad($num, 2, "0", STR_PAD_LEFT);

        return $result;
    }
?>