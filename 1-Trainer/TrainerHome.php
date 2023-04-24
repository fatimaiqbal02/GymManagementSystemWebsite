<?php
    include_once('../backend/connection.php');
	
    $trainerInfoForName = 'null';
    $trainer_loginId = $_COOKIE['loginId'];
    $getUsernameQuery = "SELECT * FROM trainer where loginID = '$trainer_loginId'";
    $myresult = mysqli_query($connection, $getUsernameQuery);
    $trainerInfoForName = mysqli_fetch_assoc($myresult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer-Gym Management System</title>
    <!-- css link -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../forms/css/form.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&family=Oswald:wght@600&display=swap"
        rel="stylesheet">

</head>
<body>
    <!--------------------------------- Header Section ---------------------------------------->
    <header class="header">

        <div id="menu-btn" class="fa-solid fa-bars"></div>
        <a href="/" class="name"> <i class="fa-solid fa-dumbbell"></i> Voltage</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#myCustomers">My Clients</a>
            <a href="#employeeRules">WorkPlace Rules</a>
        </nav>

        <div class="icons">
            <i class="fa-regular fa-user" id="trainerProfileBtn" onclick="ShowtrainerProfile('<?php echo $_COOKIE['loginId']?>')"></i>
            <a href="//www.facebook.com"><i class="fa-brands fa-facebook" id="fb-btn"></i></a>
            <a href="//www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="//www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </div>

    </header>
    <!---------------------X----------- Header Section ------------X------------------------->
    <!---------------------------------- Profile Section ------------------------------------------->
    <section class="trainerProfile" id="trainerProfile">
        <i class="fa-solid fa-times popUp1CloseBtn" id="TrainerProfilePopUpCloseBtn"></i>
        <div class="container">
            <div class="mainInfo">
                <img src="../1-Trainer/images/Trainerprofile.png" alt="" srcset="">
                <h3 class="box" id="trainerPFNameTag"></h3>
                <h3 class="email" id="trainerPFEmailTag"></h3>
                <h3 class="country">Trainer</h3>
                <a href="../index.php"class="btn">Log Out </a>
            </div>
            <form action="">
                <div class="Txt">
                    <h2>your profile</h2>
                </div>
                <div class="column">
                    <label for="trainerPFName">Name:</label>
                    <input type="text" class="box" placeholder="your name..." id="trainerPFName" name="trainerPFName" value="" readonly>
                </div> 
                <div class="column tAge">
                    <label for="trainerPFAge">DOB:</label>
                    <input type="text" class="box" placeholder="your Age..." id="trainerPFAge" name="trainerPFAge" value="" readonly>
                </div> 
                <div class="column">
                    <label for="trainerPFAddress">Address:</label>
                    <textarea class="box" col="8" rows="1"placeholder="your address..." id="trainerPFAddress" name="trainerPFAddress" value="" readonly></textarea>
                </div> 
                <div class="column mobileNoClass">
                    <label for="trainerPFPN">Mobile No:</label>
                    <input type="text" class="box" placeholder="your Phone Number...." id="trainerPFPN" name="trainerPFPN" value="" readonly>
                </div> 
                <div class="column yof">
                    <label for="trainerPFEX">Years Of Experience:</label>
                    <input type="text" class="box" placeholder="Years of Experience..." id="trainerPFEX" name="trainerPFEX" value="" readonly>
                </div>
                <div class="column">
                    <label for="trainerPFemail">Email:</label>
                    <input type="email" class="box" placeholder="your email..." id="trainerPFemail" name="trainerPFemail" value="" readonly>
                </div> 
                <div class="column yof">
                    <label for="trainerPFEX">Password:</label>
                    <input type="text" class="box" placeholder="password.." id="trainerPFPS" name="trainerPFPS" value="">
                </div>
                <button type="submit" class="btn" id="tr_PF_changePasBtn"  onclick = "updateTrPass('<?php echo $_COOKIE['loginId']?>')">Change Password</button>
            </form>
        </div>
    </section>
    <!---------------------x------------ Profile Section -----------x------------------------------->       
    <!--------------------------------- Home Section ------------------------------------------>
    <section class="home">
        <h4 class="heading"><span>Welcome </span> <?php echo $trainerInfoForName['fName'] ?> <span>!</span></h4>
    </section>
    <!-------------------x-------------- Home Section --------------x---------------------------->
    <!--------------------------------- Customer Section ------------------------------------------>
    <section class="myCustomers" id="myCustomers">
        <h1 class="subheading">Clientele<span>My Clients</span></h1>
        <div class="container">
            <div class="searchArea">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="tblSearch" onkeyup="tblSearchFunc()" placeholder="search for name...">
            </div>
            <div class="Tblcontainer" id="Tblcontainer">
            </div>
        </div>
    </section>
    <!---------------------X----------- Customer Section ------------X------------------------------>
    <!-------------------------------- Diet Plan ------------------------------------------->
    <section class="dietPlanDescPopUp" id="dietPlanDescPopUp"> 
        <form action="">
            <div class="upperTxt">
                <i class="fa-solid fa-weight-scale"></i>
                <h3> Diet Plan</h3>
            </div>
            <i class="fa-solid fa-times" id="dietPlanDescCloseBtn"></i>
            <div class="column">
                <label for="CTdietPlanId">Diet Plan Id:</label>
                <input type="text" class="box" id="CTdietPlanId" name= "CTdietPlanId" value="nothing">
            </div> 
            <div class="column dietPlanTYpe">
                <label for="CTdietPlanType">Plan's Type:</label>
                <input type="text" class="box" id="CTdietPlanType" name= "CTdietPlanType" value="nothing" readonly>
            </div> 
            <div class="column">
                <label for="CTdietPlanDesc">Description:</label>
                <textarea class="box" name="CTdietPlanDesc" id="CTdietPlanDesc" col="8" rows="3"
                value ="" readonly></textarea>
            </div>             
            <button class="btn" id="editDietPlanBtn" onclick = "updateDietPlan()">Save Changes</button>
            <input type="hidden" name=" " id="hidden_cust_id"></input>
        </form>
    
    </section>
    <!---------------------X----------- Diet Plan ------------X------------------------------>
    <!-------------------------------- Workplace Rules --------------------------------------->
    <section class="employeeRules" id="employeeRules">
        <div class="content">
            <h3>WorkPlace Rules</h3>
            <p><span>1. </span> You should make sure to Arrive on time for all training sessions and meetings.</p>
            <p><span>2. </span> You should Maintain a professional and respectful demeanor at all times.</p>
            <p><span>3. </span> You should Follow all safety protocols and guidelines when working with clients.</p>
            <p><span>4. </span> You should make Ensure that the client information is kept confidential.</p>
            <p><span>5. </span> You should Stay up-to-date on the latest fitness trends and techniques.</p>
            <p><span>6. </span> You must be willing to adapt training programs to meet the needs and goals of clients.</p>
            <p><span>7. </span> Make sure to maintain a clean and organized work area and ask others do same</p>
            <p><span>8. </span> You must ensure that you are Wearing appropriate gym attire at all times.</p>
            <p><span>9. </span> You should make sure to respect the equipment and facilities of the gym.</p>
            <p><span>10. </span> Make ensure that you should adhere to the policies and procedures of Voltage Gym</p>
        
            <div class="line"></div>
        </div>
    </section>
    <!---------------------X----------- Workplace Rules ------------X-------------------------->
    <!--------------------------------- Footer Section ------------------------------------>
    <footer>
        <div class="container">
            <div class="box">
                <h3>About us</h3>
                <p>We expect from you to be helpful to customers to reach their fitness goals. Along with wide range of equipment and classes to suit all levels and interests. We welcome you to an inclusive atmosphere</p>
            </div>
            <div class="box">
                <h3>Explore</h3>
                <a href="#home">Home</a>
                <a href="#myCustomers">My Clients</a>
                <a href="#employeeRules">WorkPlace Rules</a>
            </div>
            <div class="box">
                <h3>Follow us</h3>
                <a href="//www.facebook.com">Facebook</a>
                <a href="//www.instagram.com">Instagram</a>
                <a href="//www.twitter.com">Twitter</a>
                <a href="//www.linkedin.com">Linkedin</a>
            </div>
        </div>
        <p class="credit">&copy 2022 All Rights Reserved Powered by Voltage</p>
    </footer>
    <!---------------------X----------- Footer Section -----------X------------------------>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            readRecord();
        });

        function readRecord(){
            var readRec = "readRec";
            $.ajax({
                url: "../backend/connection.php",
                type: "post",
                data: {readRec:readRec},
                success: function(data, status){
                    $('#Tblcontainer').html(data);
                }
            });
        }

        function getUserDetails(id){
            $('#hidden_cust_id').val(id);
            $.post("../backend/connection.php", {
                id:id
            }, function(data,status){
                var cust = JSON.parse(data);
                $('#CTdietPlanId').val(cust[0].dietID);
                $('#CTdietPlanType').val(cust[0].type);
                $('#CTdietPlanDesc').val(cust[0].description);
            });
            dietPlanPopUp.classList.toggle('active');
            console.log(id);
        }

        function updateDietPlan(){
            var dietID =  $('#CTdietPlanId').val();
            var type =  $('#CTdietPlanType').val();
            var description =  $('#CTdietPlanDesc').val();

            var idtobeUpdatedAt = $('#hidden_cust_id').val();
            console.log(idtobeUpdatedAt);
            
            $.post("../backend/connection.php", {
                idtobeUpdatedAt:idtobeUpdatedAt,
                dietID:dietID,
                type:type,
                description:description

            }, function(data,status){
                dietPlanPopUp.classList.remove('active');
                readRecord();
            }   
            );
        }

        function ShowtrainerProfile(id){
           console.log("name",id);
        $.get("../backend/connection.php", {
            id:id
        }, function(data,status){
            var trainerInfo = JSON.parse(data);
            console.log(trainerInfo);
            console.log(trainerInfo.fName);

            $('#trainerPFName').val(trainerInfo.fName.concat(" ").concat(trainerInfo.lName));
            $('#trainerPFemail').val(trainerInfo.email);
            $('#trainerPFAddress').val(trainerInfo.address);
            $('#trainerPFPN').val(trainerInfo.phoneNo);
            $('#trainerPFAge').val(trainerInfo.DOB);
            $('#trainerPFEX').val(trainerInfo.experience);
            $('#trainerPFPS').val(trainerInfo.password);

            $('#trainerPFNameTag').html(trainerInfo.fName.concat(" ").concat(trainerInfo.lName));
            $('#trainerPFEmailTag').html(trainerInfo.email);
            
        }
        );
            profile.classList.toggle('active');
        }

        function updateTrPass(t_Lid){
            var c_pass =  $('#trainerPFPS').val();
            console.log('name',t_Lid);
            console.log(c_pass);
            $.post("../backend/connection.php", {
                t_Lid:t_Lid,
                c_pass:c_pass
            }, function(data,status){
                profile.classList.remove('active');
            }   
            );
        }
    </script>
</body>
</html>