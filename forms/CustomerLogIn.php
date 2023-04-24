<?php
    include_once('../backend/connection.php');

    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM loginauthentication WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result);
            $loginId = $row['loginID'];
            header("Location: ../2-Customer/CustomerHome.php");
            setcookie("loginId", $loginId, time() + 360000000, "/");
            exit();
        } else {
            ?>
            <script>
                alert("Invalid email or password");
            </script>
        <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer-LogIn</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/form.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&family=Oswald:wght@600&display=swap"
        rel="stylesheet">
</head>

<body>
    <!----------------------------- Login section -------------------------------------->
    <div class="loginForm authenticateForm">
        <form method="POST">
            <div class="upperTxt">
                <i class="fa-regular fa-user" id="user-btn"></i>
                <h3>Customer Login</h3>
            </div>
            <input type="email" name="email" class="box" placeholder="Enter Your Email" required>
            <input type="password" name="password" class="box" placeholder="Enter Your Password" required>
            <input type="submit" value="LogIn" class="btn">
            <p>don't have an account? <a href="CustomerSignUp.php" id="registerNowBtn">register now</a></p>
        </form>
    </div>
    <!--------------------X---------- Login Section -----------X----------------------->
    <script src="js/form.js"></script>
</body>

</html>
