<?php
    include_once('../backend/connection.php');
	
	$customerQuery = "SELECT * FROM customer order by customerID DESC limit 1";
	$customerResult = mysqli_query($connection, $customerQuery);
	$customerRow = mysqli_fetch_assoc($customerResult);
	$highestCustomerId = $customerRow['customerID'];

    $loginQuery = "SELECT * FROM LoginAuthentication order by loginID DESC limit 1";
    $loginResult = mysqli_query($connection, $loginQuery);
	$loginRow = mysqli_fetch_assoc($loginResult);
	$highestLoginId = $loginRow['loginID'];

    if(isset($_POST['submit'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $addressTxt = $_POST['addressTxt'];
        $phNo = $_POST['phNo'];
        $age = $_POST['age'];
        $dob = date("Y-m-d", strtotime("-$age years"));
        $joiningDate = date("Y-m-d");
        $customerId = incrementString("C", $highestCustomerId);
        $cnic = $_POST['cnic'];
        $loginId = incrementString("L", $highestLoginId);

        $emailCheckQuery = "SELECT * from LoginAuthentication where email = '$email'";
        $emailCheckResult = mysqli_query($connection, $emailCheckQuery);
        if(mysqli_num_rows($emailCheckResult) > 0) {
            ?>
            <script>
                alert("Email already registered.");
            </script>
            <?php
        } else {
            $loginInsertQuery = "INSERT INTO LoginAuthentication (loginID, email, password) values ('$loginId','$email','$password')";
            mysqli_query($connection, $loginInsertQuery);
            
            $customerInsertQuery = "INSERT INTO Customer(customerID, fName, lName, DOB, dateJoined, phoneNo, address, CNIC, trainerID, membershipID, dietID, loginID) VALUES ('$customerId','$fName', '$lName', '$dob','$joiningDate','$phNo','$addressTxt', '$cnic', null, 'M01', 'D01', '$loginId')";
            mysqli_query($connection, $customerInsertQuery);
            ?>
            <script>
                alert("Successfully registered, you can login now!");
                window.location.href = '../forms/CustomerLogIn.php';
            </script>
            <?php
        }
    }

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer-SignUp</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/form.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&family=Oswald:wght@600&display=swap"
        rel="stylesheet">
</head>

<body>
    <!----------------------------- SignUp section -------------------------------------->
    <div class="signUpForm authenticateForm">

        <form action="" method="post">
            <div class="upperTxt">
                <i class="fa-regular fa-user" id="user-btn"></i>
                <h3>Customer SignUp</h3>
            </div>
            <div class="nameFeilds">
                <input type="text" name="fName" class="inputName box" placeholder="Enter your first name" required>
                <input type="text" name="lName" class="inputName box lastName" placeholder="Enter your last name" required>
            </div> 
            <input type="email" name="email" class="box" placeholder="Enter your email" required>
            <input type="password" name="password" class="box" placeholder="Enter your password" required>
            <textarea class="box" name="addressTxt" id="addressTxt" col="8" rows="1"
                placeholder="Enter our address"></textarea>
            <input type="text" name="phNo" class="box" placeholder="Enter your phone number">
            <input type="number" name="age" class="box" min="12" placeholder="Select your age" required>
            <input type="text" pattern="\d{5}-\d{7}-\d{1}" class="box" name="cnic" placeholder="Enter your CNIC number" required>
            <input type="submit" name="submit" value="SignUp" class="btn">
        </form>
    </div>
    <!--------------------X---------- SignUp Section -----------X----------------------->
    <script src="js/form.js"></script>
</body>

</html>