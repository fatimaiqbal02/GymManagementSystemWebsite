<?php
    include_once('../backend/connection.php');
	
	$loginId = $_COOKIE['loginId'];
	$customerQuery = "SELECT * FROM customer WHERE loginID = '$loginId'";
	$customerResult = mysqli_query($connection, $customerQuery);
	$customerRow = mysqli_fetch_assoc($customerResult);
	$membershipId = $customerRow['membershipID'];
	$trainerId = $customerRow['trainerID'];
	$dietId = $customerRow['dietID'];
	$customerId = $customerRow['customerID'];

	$customerMembershipQuery = "SELECT * FROM membershipplan WHERE membershipID = '$membershipId'";
	$customerMembershipResult = mysqli_query($connection, $customerMembershipQuery);
	$customerMembershipRow = mysqli_fetch_assoc($customerMembershipResult);

	$membershipPlanQuery = "SELECT * FROM membershipplan where membershipID != '$membershipId' AND planStatus = 1";
	$membershipPlanResult = mysqli_query($connection, $membershipPlanQuery);

	$trainerQuery = "SELECT * FROM trainer WHERE trainerID = '$trainerId'";
	$trainerResult = mysqli_query($connection, $trainerQuery);
	$trainerRow = mysqli_fetch_assoc($trainerResult);

	$dietQuery = "SELECT * FROM dietplan WHERE dietID = '$dietId'";
	$dietResult = mysqli_query($connection, $dietQuery);
	$dietRow = mysqli_fetch_assoc($dietResult);

	$chatQuery = "SELECT * from customerquery where customerID = '$customerId'";
	$chatResult = mysqli_query($connection, $chatQuery);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Gym Management System</title>
		
		<!-- font awesome cdn link -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		/>
		<!-- google fonts link -->
		<link
			href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&family=Oswald:wght@600&display=swap"
			rel="stylesheet"
		/>
		<!-- css link -->
		<link rel="stylesheet" href="../forms/css/form.css">
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<!--------------------------------- Header Section ---------------------------------------->
		<header class="header">
			<div id="menu-btn" class="fa-solid fa-bars"></div>
			<a href="/" class="name"> <i class="fa-solid fa-dumbbell"></i> Voltage</a>

			<nav class="navbar">
				<a href="#home">Home</a>
				<a href="#plan">Membership Plan</a>
				<?php 
					if($trainerId != null) {
						?>
						<a href="#diet">Diet Plan</a>
						<?php
					}
				?>
				<a href="#trainer">Trainer</a>
			</nav>

			<div class="icons">
				<i class="fa-regular fa-user" id="memberProfileBtn" onclick="ShowCustProfile('<?php echo $_COOKIE['loginId']?>')"></i>
				<a href="//www.facebook.com"><i class="fa-brands fa-facebook" id="fb-btn"></i></a>
				<a href="//www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
				<a href="//www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
			</div>
		</header>
		<!---------------------X----------- Header Section ------------X---------------------------->
		<!---------------------------------- Profile Section ------------------------------------------->
		<section class="customerProfile" id="customerProfile">
			<i class="fa-solid fa-times popUp1CloseBtn" id="customerProfilePopUpCloseBtn"></i>
			<div class="container">
				<div class="mainInfo">
					<img src="../1-Trainer/images/Trainerprofile.png" alt="" srcset="">
					<h3 class="box" id="customerPFNameTag">John Deo</h3>
					<h3 class="email" id="customerPFEmailTag">xyz@gmail.com</h3>
					<h3 class="country">Customer</h3>
					<a href="../index.php"class="btn">Log Out </a>
				</div>
				<form action="">
					<div class="Txt">
						<h2>your profile</h2>
					</div>
					<div class="column">
						<label for="customerPFName">Name:</label>
						<input type="text" class="box" placeholder="your name..." id="customerPFName" name="customerPFName" value="" readonly>
					</div> 
					<div class="column ctAge">
						<label for="customerPFAge">DOB:</label>
						<input type="text" class="box" placeholder="your Age..." id="customerPFAge" name="customerPFAge" value="" readonly>
					</div> 
					<div class="column">
						<label for="customerPFAddress">Address:</label>
						<textarea class="box" col="8" rows="1"placeholder="your address..." id="customerPFAddress" name="customerPFAddress" value="" readonly></textarea>
					</div> 
					<div class="column mobileNoClass">
						<label for="trainerPFPN">Mobile No:</label>
						<input type="text" class="box" placeholder="your Phone Number...." id="customerPFPN" name="customerPFPN" value="" readonly>
					</div> 
					<div class="column">
						<label for="customerPFemail">Email:</label>
						<input type="email" class="box" placeholder="your email..." id="customerPFemail" name="customerPFemail" value="" readonly>
					</div> 
					<div class="column cyof">
						<label for="customerPFCS">Password:</label>
						<input type="text" class="box" placeholder="pasword" id="customerPFCS" name="customerPFCS" value="">
					</div>
					<button type="submit" class="btn" id="cust_PF_changePasBtn"  onclick = "updateCustPass('<?php echo $_COOKIE['loginId']?>')">Change Password</button>
				</form>
			</div>
		</section>
    <!---------------------x------------ Profile Section -----------x------------------------------->  
		<!--------------------------------- Home Section ------------------------------------------->
		<section class="home" id="home">
			<h3 class="heading"><span>Welcome </span> <?php echo $customerRow['fName'] ?> <span>!</span></h3>
		</section>
		<!---------------------X----------- Home Section ------------X------------------------------>
		<!--------------------------------- Membership Plan Section --------------------------------->
		<section class="plan" id="plan">
			<h1 class="subheading">Membership <span>Plans</span></h1>
			<div class="subscribed-plan">
				<h3 class="title"><?php echo $customerMembershipRow['membershipName']?></h3>
				<p class="price">Rs.<?php echo $customerMembershipRow['price']?>/MO</sub></p>
				<div class="facility">
					<div class="item">
						<h4>Features</h4>
						<p><?php echo $customerMembershipRow['features']?></p>
					</div>
					</div>
				</div>
			</div>
			<div class="available-plan">
				<h1>Available Plans</h1>
				<div class="container">
					<?php
					while ($row = mysqli_fetch_assoc($membershipPlanResult)) {
						?>
						<div class="item">
							<h3 class="title"><?php echo $row['membershipName'] ?></h3>
							<p class="price"><sup>Rs.</sup><?php echo $row['price'] ?><sub>/MO</sub></p>
							<div class="facility">
								<p><?php echo $row['features'] ?></p>
							</div>
							<button class="btn" onclick="updatePlan('<?php echo $row['membershipID'] ?>')">Change</button>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<!---------------------X----------- Membership Plan Section -----------X-------------------->
		<!--------------------------------- Diet-Plan Section ------------------------------------>
		<?php 
			if($trainerId != null) {
				?>
				<section class="diet" id="diet">
					<h1 class="subheading">Diet <span>Plan</span></h1>
					<div class="container">
						<h3>Trainer: <span><?php echo $trainerRow['fName'] . " " . $trainerRow['lName'] ?></span></h3>
						<p><?php echo $dietRow['description']?></p>
					</div>
				</section>
				<?php
			}
		?>
		<!---------------------X----------- Diet-Plan Section -----------X------------------------>
		<!--------------------------------- Available Trainers ------------------------------------>
		<section class="availableTrainers" id="availableTrainers">
			<h1 class="subheading">Available<span>Trainers</span></h1>
			<div class="container">
				<div class="Tblcontainer" id="Tbl2container">
				<div>
			</div>
    	</section>
		<!-------------------x------------- Available Trainers -----------x------------------------>
		<!--------------------------------- Customer Query Section -------------------------------->
		<div class="CustomerQueryChatbox">
			<div class="chatboxbtn" id="chatboxbtn">
				<i class="fa-solid fa-comments"></i>
			</div>
			<div class="chatboxSpace" id="chatboxSpace">
				<div class="chatboxHeader">
					<i class="fa-solid fa-comments"></i>
					<h3>Chat with the Admin!</h3>
				</div>

					<div class="chatboxContent">
					<?php 
						while($row = mysqli_fetch_assoc($chatResult) ) {
							?>
								<div class="chatContainer chatsent">
									<span class="chatcontainerText"><?php echo $row['statement'] ?></span>
									<span class="chatcontainerdate"><?php echo $row['queryDate'] ?></span>
								</div>
								<div class="chatContainer chatreceive">
									<span class="chatcontainerText"><?php echo $row['reply'] ?></span>
								</div>
								<?php
						}
					?>
					</div>
						
						<div class="chatboxFooter">
							<div class="chatboxMsgForm">
								<textarea class="chatBoxMsgInput" placeholder="Type Here..." rows="1"></textarea>
								<button type="submit" onclick="sendChat()" class="chatBoxMsgsubmitBtn"><i class="fa-solid fa-paper-plane"></i></button>
							</div>
						</div>

			</div>
		</div>
		<!---------------------X-----------Customer Query Section -----------X--------------------->
		<!--------------------------------- Footer Section ------------------------------------>
		<footer>
			<div class="container">
				<div class="box">
					<h3>About us</h3>
					<p>
					<p>Our team of certified trainers is dedicated to help you reach your fitness goals. Along with wide range of equipment and classes to suit all levels and interests. We welcome you to an inclusive atmosphere</p>
					</p>
				</div>
				<div class="box">
					<h3>Explore</h3>
					<a href="#home">Home</a>
					<a href="#plan">Membership Plan</a>
					<?php 
						if($trainerId != null) {
							?>
							<a href="#diet">Diet Plan</a>
							<?php
						}
					?>
					<a href="#trainer">Trainer</a>
					
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
				readAvailableTrainersRecord();
			});

			function readAvailableTrainersRecord(){
				var readATRec = "readATRec";
				$.ajax({
					url: "../backend/connection.php",
					type: "post",
					data: {readATRec:readATRec},
					success: function(data, status){
						$('#Tbl2container').html(data);
					}
				});
			}

			// function selectTrainer(tid){
			// 	$.post("../backend/connection.php", {
			// 		tid:tid
			// 	}, function(data,status){
			// 		readAvailableTrainersRecord();
			// 	});
			// }

			function ShowCustProfile(custid){
				console.log("name",custid);
				$.get("../backend/connection.php", {
				custid:custid
				}, function(data,status){
					var cpInfo = JSON.parse(data);
					console.log(cpInfo);
					console.log(cpInfo.fName);

					$('#customerPFName').val(cpInfo.fName.concat(" ").concat(cpInfo.lName));
					$('#customerPFemail').val(cpInfo.email);
					$('#customerPFAddress').val(cpInfo.address);
					$('#customerPFPN').val(cpInfo.phoneNo);
					$('#customerPFAge').val(cpInfo.DOB);
					$('#customerPFCS').val(cpInfo.password);

					$('#customerPFNameTag').html(cpInfo.fName.concat(" ").concat(cpInfo.lName));
					$('#customerPFEmailTag').html(cpInfo.email);
				});
					cprofile.classList.toggle('active');
			}

			function updateCustPass(t_Lid){
            var c_pass =  $('#customerPFCS').val();
            console.log('name',t_Lid);
            console.log(c_pass);
            $.post("../backend/connection.php", {
                t_Lid:t_Lid,
                c_pass:c_pass
            }, function(data,status){
                cprofile.classList.remove('active');
            }   
            );
        }

			function updatePlan(membershipId) {
				if (window.confirm("Are you sure you want to change your membership plan?")) {
					window.location.assign("UpdateMembershipPlan.php");
					document.cookie = "membershipId=" + membershipId;
  				}
			}
			
			function changeTrainer(trainerId) {
				if (window.confirm("Are you sure you want to change your trainer?")) {
					window.location.assign("ChangeTrainer.php");
					document.cookie = "trainerId=" + trainerId;
  				}
			}

			function sendChat() {
				var statement = document.querySelector('.chatBoxMsgInput').value;
				window.location.assign("SendChat.php");
				document.cookie = "statement=" + statement;
			}
		</script>
	</body>
</html>
