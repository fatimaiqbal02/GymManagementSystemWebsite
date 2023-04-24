<?php
    require_once("header_footer/header.php");
    include_once('backend/connection.php');

	$membershipPlanQuery = "SELECT * FROM membershipplan where planStatus = 1";
	$membershipPlanResult = mysqli_query($connection, $membershipPlanQuery);
?>
    <!--------------------------------- Home Section ------------------------------------------->
    <section class="home" id="home">
        <h3 class="heading"><span>Plans </span>Accroding <span>To Your </span> Choice</h3>
    </section>
    <!---------------------X----------- Home Section ------------X------------------------------>
    <!--------------------------------- Membership Plan Section --------------------------------->
    <section class="plan" id="plan">
        <h1 class="subheading">Membership <span>Plans</span></h1>
        <div class="intro">
            <p>We provide with you the plans according to your needs. Following are the membership plans we offer. Select any of the following and become member of voltage gym. We ensure that we would keep your information private. Join Today to be part of our Gym </p>
        </div>
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
    <!-------------------------------- Privacy Policy Section -------------------------------->
    <section class="policy" id="policy">
        <div class="content">
            <h3>Privacy Policy</h3>
            <p>At Voltage Gym, we take the privacy of our members very seriously. We understand that personal information shared with us is sensitive, and we are committed to protecting it.We collect personal information such as name, contact information, and payment details in order to provide our members with the services they have requested, such as membership plans and personal training sessions. We may also use this information to communicate with our members about gym updates, promotions, and other relevant information. We will never sell or share our members' personal information with third parties without their consent, except in cases where it is necessary to provide requested services or as required by law. We take appropriate measures to ensure the security of our members' personal information, including using encrypted storage and secure servers. If you have any questions or concerns about our privacy policy, please don't hesitate to contact us. We are here to help.
            </p>
            <p></p>
            <div class="line"></div>
        </div>
    </section>
    <!-----------------------x-------- Privacy Policy Section -----x-------------------------->
<?php
    require_once("header_footer/footer.php");
?>