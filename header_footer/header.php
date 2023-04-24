<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css link -->
    <?php 
    if(basename($_SERVER['PHP_SELF']) == 'index.php'){ ?>
        <title>Home-Gym Management System</title>
        <link rel="stylesheet" href="css/style.css">
    <?php }

    elseif(basename($_SERVER['PHP_SELF']) == 'about.php'){ ?>
        <title>About-Gym Management System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/about.css">
    <?php } 

    elseif(basename($_SERVER['PHP_SELF']) == 'plans.php'){ ?>
        <title>Plans-Gym Management System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/plans.css">
    <?php }
    
    elseif(basename($_SERVER['PHP_SELF']) == 'gallery.php'){ ?>
        <title>Gallery-Gym Management System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/gallery.css">
    <?php } ?>


    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&family=Oswald:wght@600&display=swap" rel="stylesheet">

</head>
<body>
    <!--------------------------------- Header Section ---------------------------------------->
    <header class="header">

        <div id="menu-btn" class="fa-solid fa-bars"></div>
        <a href="/" class="name"> <i class="fa-solid fa-dumbbell" ></i> Voltage</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="plans.php">Membership Plan</a>
            <a href="index.php#services">Services</a>
            <a href="gallery.php">Gallery</a>      
        </nav>

        <div class="icons">
            <i class="fa-regular fa-user" id="user-btn"></i>
            <a href="//www.facebook.com"><i class="fa-brands fa-facebook" id="fb-btn"></i></a>
            <a href="//www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="//www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </div>

        <div class="options">
            <a href="#" class="optbtn" id="LogInBtn"><i class="fa-regular fa-user" id="user-btn"></i> Log In</a>
            <a href="#" class="optbtn" id="SignUpBtn"><i class="fa-regular fa-user" id="user-btn"></i> Sign Up</a>
        </div>
    </header>
    <!---------------------X----------- Header Section ------------X------------------------->
    <!--------------------------------- LogIn PopUp ----------------------------------------->
    <div class="LoginPopUp" id="LoginPopUp">
        <i class="fa-solid fa-times popUp1CloseBtn" id="loginPopUpCloseBtn"></i>
        <div class="PopUp1container">
            <div class="PopUpheader">
                <i class="fa-regular fa-user" id="user-btn"></i>
                <h3>LOGIN AS</h3>
            </div>
            <div class="PopUpbuttons">
                <a href="forms/CustomerLogIn.php" class="btn" id="loginPopUpBtn1">Customer</a> 
                <a href="forms/TrainerLogIn.php" class="btn" id="loginPopUpBtn2">Trainer</a> 
            </div>    
        </div>
    </div>
    <!--------------------x------------ LoginPopUp -----------------X------------------------->
    <!--------------------------------- SignUp PopUp ----------------------------------------->
    <div class="SignUpPopUp" id="SignUpPopUp">
        <i class="fa-solid fa-times popUp1CloseBtn" id="signupPopUpCloseBtn"></i>
        <div class="PopUp1container">
            <div class="PopUpheader">
                <i class="fa-regular fa-user" id="user-btn"></i>
                <h3>SIGN UP AS</h3>
            </div>
            <div class="PopUpbuttons">
                <a href="forms/CustomerSignUp.php" class="btn" id="signUpPopUpBtn1">Customer</a> 
            </div>    
        </div>
    </div>
    <!---------------------X----------- SignUp PopUp ------------X---------------------------->