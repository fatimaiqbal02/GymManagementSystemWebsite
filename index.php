<?php
    require_once("header_footer/header.php");
    include_once('backend/connection.php');

	$membershipPlanQuery = "SELECT * FROM membershipplan where planStatus = 1";
	$membershipPlanResult = mysqli_query($connection, $membershipPlanQuery);
?>
    <!--------------------------------- Home Section ------------------------------------------>
    <section class="home" id="home">
        <div class="slider">
            <figure>
                <div class="slide">
                    <h3 class="heading"><span> GET </span> FIT <span>GET </span>STRONGER</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="forms/CustomerSignUp.php" class="btn" id="beAMemberBtn1">Be A Member</a>  
                </div>
                <div class="slide">
                    <h3 class="heading"><span> GET </span> FIT <span>GET </span>HEALTHIER</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="forms/CustomerSignUp.php" class="btn" id="beAMemberBtn2">Be A Member</a>
                </div>
            </figure>
        </div>
    </section>
    <!---------------------X----------- Home Section ------------X------------------------------>
    <!--------------------------------- About Section ------------------------------------------>
    <section class="about" id="about">
        <h1 class="subheading">about us <span>why choose us</span></h1>
        <div class="row">
            <div class="image">
                <img src="images/aboutUs/about1.jpg" alt="">
            </div>
            <div class="content">
                <h3>What makes our Gym special?</h3>
                <p>Welcome to Voltage Gym! Our team of certified trainers is dedicated to helping you reach your fitness goals. We offer a wide range of equipment and classes to suit all levels and interests. At Voltage Gym, we believe in the power of community. Join us and be part of a welcoming and inclusive atmosphere. Reach your full potential with us!</p>
                <a href="about.php" class="btn">Learn More</a>
            </div>
        </div>
    </section>
    <!---------------------X----------- About Section -----------X------------------------------>
    <!--------------------------------- Membership Plan Section --------------------------------->   
    <section class="plan" id="plan">
        <h1 class="subheading">Membership <span>Plans</span></h1>
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
                            <a href="forms/CustomerSignUp.php" class="btn">Join Now</a>
                        </div>      
                    <?php
                }
            ?>
        </div>
     </section>
    <!---------------------X----------- Membership Plan Section -----------X-------------------->
    <!--------------------------------- Services Section ------------------------------------>
    <section class="services" id="services">
        <h1 class="subheading">Services <span>We provide</span></h1>
        <div class="container">
            <div class="box">
                <i class="fa-sharp fa-solid fa-building-circle-check"></i>
                <h3>State of The Art Equipment</h3>
                <p>An Access to advanced fitness equipment. From weight machines and cardio equipment to functional training tools and free weights, we have everything you need at gym</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-history"></i>
                <h3>24/7 Access</h3>
                <p>No need to worry about limited opening hours or squeezing in a workout before or after work. With 24/7 access, you have the freedom to work out an your own pace</p>   
            </div>
            <div class="box">
                <i class="fa-solid fa-dumbbell"></i>
                <h3>Cardio Training</h3>
                <p>A variety of cardio equipment and classes to suit all preferences. From treadmills and stationary bikes to dance-based workouts, there's something for everyone</p>
            </div>
            <div class="box">
                <i class="fa-sharp fa-solid fa-people-arrows"></i>
                <h3>Personal Trainers</h3>
                <p>Personal certified trainers to help you out on your journey of acheiving fitness goals. They will create a customized training program according to your needs</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-wifi"></i>
                <h3>Free Wifi</h3>
                <p>Whether you need to catch up on work emails or just want to stream your favorite playlist, our WiFi has you covered. Easily track your progress & stay up-to-date.</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-burn"></i>
                <h3>Weight Loss</h3>
                <p>We are dedicated to help you loss weight. We offer a wide range of equipment, classes, & services, including customized training programs & nutrition counseling.</p>
            </div>

        </div>
    </section>
    <!---------------------X----------- Services Section -----------X------------------------>
    <!--------------------------------- Gallery Section ------------------------------------>
    <section class="gallery" id="gallery">
        <h1 class="subheading">Gallery <span>Through Our Lens</span></h1>

        <div class="container">
            <div class="image">
                <img src="images/gallery/galleryImg1.jpg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg2.jpg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg3.png" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg4.png" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg5.png" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg6.jpg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg7.jpg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg8.jpeg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
            <div class="image">
                <img src="images/gallery/galleryImg9.jpg" alt="">
                <div class="content">
                    <h3>Voltage</h3>
                    <p>"Join Voltage Gym and get the support and motivation you need to reach your full potential."</p>
                    <a href="gallery.php" class="btn">See more</a>
                </div>
            </div>
        </div>
    </section>
    <!---------------------X----------- Gallery Section -----------X------------------------>
<?php
    require_once("header_footer/footer.php");
?>
    