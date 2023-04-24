<?php
  $host = 'localhost';
  $user = 'root';
  $password = 'fatima02';
  $dbname = 'gymmanagementsystem';

  // Create connection
  $connection = mysqli_connect($host, $user, $password, $dbname);

  // Check connection
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
/* ------------------- Trainer: Fetching all the customer details according to the trainer Id ------------------- */

if(isset($_POST['readRec'])){
  if(isset($_COOKIE['loginId'])){
    $loginId = $_COOKIE['loginId'];
    /* echo $loginId; */
  }

  $trainerId = null;
  $finalLQuery = mysqli_query($connection, "select * from trainer where loginID = '$loginId'");
  if(mysqli_num_rows($finalLQuery) > 0){
    $myrow = mysqli_fetch_assoc($finalLQuery);
    $trainerId = $myrow['trainerID'];
  }

  $data = '<div class="Tblheader">
              <div class="col1">Client ID</div>
              <div class="col2">Client Name</div>
              <div class="col3">Phone No</div>
              <div class="col4">Client DOB</div>
              <div class="col5">View Diet Plan</div>
          </div>';

  $data .= '<table class="customerTable" id="customerTable" data-filter-control="true"
  data-show-search-clear-button="true">';

  $query = mysqli_query($connection, "select * from customer where trainerID = '$trainerId'");
  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
      $data .='<tr>
        <td>'.$row['customerID'].'</td>
        <td>'.$row["fName"] . " " . $row["lName"].'</td>
        <td>'.$row['phoneNo'].'</td>
        <td>'.$row['DOB'].'</td>
        <td>
        <button class="btn viewDietPlanDescBtn" onclick = "getUserDetails(\''.addslashes($row['customerID']).'\')">View Diet Plan</button>
        </td>
      </tr>';
    }
  }
  $data .= '</table>';
  echo $data;
}


/* ---------------------------- Trainer: Getting DietPlan detail according to customerId -------------------------- */

if(isset($_POST['id']) && isset($_POST['id']) != ""){
 $customer_id = $_POST['id'];
 $secquery = "select dietplan.* from dietplan inner join  customer on dietplan.dietID = customer.dietID where customer.customerID = '$customer_id'";

 if(!$finalQuery = mysqli_query($connection, $secquery)){
    exit(mysqli_error());
 }

  if(mysqli_num_rows($finalQuery) > 0){
    while($row = mysqli_fetch_assoc($finalQuery)){
      $response[] = $row;
    };
  
  }else{
    $response['status'] =200;
    $response['message'] ="Data not present";
  }

  echo json_encode($response);

}
else{
  $response['status'] = 200;
  $response['message'] = "Invalid Request";
}


/* ---------------------------- Trainer: Updating DietPlan details on PopUp  -------------------------- */
if(isset($_POST['idtobeUpdatedAt'])){
  $idtobeUpdatedAt = $_POST['idtobeUpdatedAt'];
  $dietID = $_POST['dietID'];
  $type = $_POST['type'];
  $description = $_POST['description'];

  $thirdQuery = "update customer SET `dietID` = '$dietID' WHERE customer.customerID = '$idtobeUpdatedAt'";
  mysqli_query($connection, $thirdQuery);
}

/* ------------------------------- Trainer: Profile Settings --------------------------------------- */
if(isset($_GET['id']) && isset($_GET['id']) != ""){
  $trainer_login_id = $_GET['id'];
  $fourthquery = "select trainer.*, loginauthentication.email, loginauthentication.password from trainer inner join loginauthentication on trainer.loginID = loginauthentication.loginID where trainer.loginID = '$trainer_login_id'";
 
  if(!$finalTrQuery = mysqli_query($connection, $fourthquery)){
     exit(mysqli_error());
  }
 
   if(mysqli_num_rows($finalTrQuery) > 0){
     $row = mysqli_fetch_assoc($finalTrQuery);
     $response = $row;
   
   }else{
     $response['status'] =200;
     $response['message'] ="Data not present";
   }
 
   echo json_encode($response);
 
 }
 else{
   $response['status'] = 200;
   $response['message'] = "Invalid Request";
 }

 /* ----------------------------------------------------------------------------------------------------------------------- */
 /* ---------------------------- Trainer/Customer : Updating Password from Profile -------------------------- */
if(isset($_POST['t_Lid'])){
  $idtobeUpdatedAt = $_POST['t_Lid'];
  $password= $_POST['c_pass'];

  $updateTrainerPassQuery = "update `loginauthentication` SET `password` = '$password' WHERE loginID = '$idtobeUpdatedAt'";
  mysqli_query($connection, $updateTrainerPassQuery);
}

 /* -------------------------------- Customer: Fetching all the trainer details ------------------------------------------- */

if(isset($_POST['readATRec'])){

  $data = '<div class="Tblheader">
						<div class="col1">Trainer ID</div>
						<div class="col2">Trainer Name</div>
						<div class="col3">Trainer DOB</div>
						<div class="col4">Experience</div>
						<div class="col5">select Trainer</div>
					</div>';

  $data .= '<table class="trainerTable" id="trainerTable" data-filter-control="true"
						data-show-search-clear-button="true">';

  $Cquery = mysqli_query($connection, "select trainer.* from trainer left join customer on trainer.trainerID = customer.trainerID group by customer.trainerID having COUNT(customer.trainerID) < 3;");
  
  if(mysqli_num_rows($Cquery) > 0){
    while($row = mysqli_fetch_array($Cquery)){
      $data .='<tr>
        <td>'.$row['trainerID'].'</td>
        <td>'.$row["fName"] . " " . $row["lName"].'</td>
        <td>'.$row['DOB'].'</td>
        <td>'.$row['experience'].'</td>
        <td>
        <button class="btn" onclick = "changeTrainer(\''.addslashes($row['trainerID']).'\')">Select</button>
        </td>
      </tr>';
    }
  }
  $data .= '</table>';
  echo $data;
}

/* -------------------------------- Customer: Updating trainer  ------------------------------------------- */
if(isset($_POST['tid'])){
  $tid = $_POST['tid'];
  $cloginId = $_COOKIE['loginId'];

  $updateTrainerQuery = "update customer SET `trainerID` = '$tid' WHERE customer.loginID = '$cloginId'";
  mysqli_query($connection, $updateTrainerQuery);
}

/* -------------------------------- Customer: Profile Settings ------------------------------------------- */
if(isset($_GET['custid']) && isset($_GET['custid']) != ""){
  $c_login_id = $_GET['custid'];
  /* $cProfquery = "select customer.* from customer where loginID = '$c_login_id'"; */
  $cProfquery = "select customer.*, loginauthentication.email, loginauthentication.password from customer inner join loginauthentication on customer.loginID = loginauthentication.loginID where customer.loginID = '$c_login_id'";
 
  if(!$finalCPQuery = mysqli_query($connection, $cProfquery)){
     exit(mysqli_error());
  }
 
   if(mysqli_num_rows($finalCPQuery) > 0){
     $row = mysqli_fetch_assoc($finalCPQuery);
     $response = $row;
   
   }else{
     $response['status'] =200;
     $response['message'] ="Data not present";
   }
 
   echo json_encode($response);
 
 }
 else{
   $response['status'] = 200;
   $response['message'] = "Invalid Request";
 }
