<!doctype html>
<html lang="en">
<?php
require "connection.php";
session_start();
if(!isset($_SESSION['Username']) || !isset($_SESSION['Email']) || !isset($_SESSION['Password'])){
  echo '<script>
      window.alert("Please Login first");
    </script>';
    header("Location:authentication-login.php");
    exit;
}
else{
  if (isset($_POST['View'])) {

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Damage Assistance</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="../assets/js/sidebarmenu.js"></script> -->
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/ds.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            
            <?php
            $priviledge = $_SESSION['Priviledge'];
            if ($priviledge == "Admin") {
            echo
            '<li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admin</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./accounts.php" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Account Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="recent actiivty.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Recent Activity</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./barangay.php" aria-expanded="false">
                <span>
                  <i class="ti ti-basket"></i>
                </span>
                <span class="hide-menu">Barangay Records</span>
              </a>
            </li>';
            }
?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./masterlist.php" aria-expanded="false">
                <span>
                  <i class="ti ti-receipt"></i>
                </span>
                <span class="hide-menu">Masterlist</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="evacuation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Manage Evac Centers</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="disaster.php" aria-expanded="false">
                <span>
                  <i class="ti ti-bolt"></i>
                </span>
                <span class="hide-menu">Disaster Management</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Add new Resident</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Generate QR Code</span>
              </a>
            </li>
            <li class="sidebar-item">
                <script>
              function assistme() {
                  if (document.getElementById("assistthis").style.display == "none") {
                    document.getElementById("assistthis").style.display = "block";
                    document.getElementById("assistingarrow").style.transform = "rotate(180deg)";
                  }
                    else{
                    document.getElementById("assistthis").style.display = "none";
                    document.getElementById("assistingarrow").style.transform = "rotate(0deg)";
                  }
                  
                }
                </script>
              <a class="sidebar-link" onclick="assistme()" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Assistance form</span>
                <span class="rotate" id="assistingarrow" style="margin-right: 0px; margin-left: auto; transform: rotate(180deg);">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                </span>
              </a>
              <span id="assistthis" style="display: block;margin-left: 50px;margin-right: auto;">
              <ul class="sidebar-submenu"> 
                <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="assistance.php" aria-expanded="false">
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="relief.php" aria-expanded="false">
                    <span>Relief Distribution</span>
                  </a>
                </li>
              </ul>
              </span>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Records</span>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-card.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-user"></i>
                    </span>
                    <span>Family</span>
                  </a>
                </li> 
                <li class="sidebar-item">
                  <a class="sidebar-link" href="damages.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-flag"></i>
                    </span>
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="relief-records.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-package"></i>
                    </span>
                    <span>Relief Distribution</span>
                  </a>
                </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-basket"></i>
                </span>
                <span class="hide-menu">Hazard Map</span>
              </a>
            </li> -->
            <li class="sidebar-item">
              
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link logout" href="./logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login" style="color: red;"></i>
                </span>
                <span class="hide-menu" style="color: red;">Logout</span>
              </a>
            </li>
            <li style="color: white;">
              <div style="height: 50px;"></div>
            </li>
<style>
  .sidebar-nav ul .sidebar-item .logout:hover {
    background-color: rgba(93,135,255,0.1);
    color: red;
  }
</style>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header" style="border-bottom: 1px solid lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a> -->
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                </a> -->
                <span><?php $profile = $_SESSION['Username']; echo $profile; ?></span>
                <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="./logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="formbold-main-wrapper">
                <!DOCTYPE html>
<html>
<head>
    <title>Family Assistance Record</title>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="tablestyle.css">
</head>
<body>
  <style type="text/css">
    select {
  /* Reset Select */
  appearance: none;
  outline: 10px red;
  border: 0;
  box-shadow: none;
  /* Personalize */
  flex: 1;
  padding: 0 1em;
  color: #fff;
  background-color: var(--darkgray);
  background-image: none;
  cursor: pointer;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select wrapper */
.select {
  position: relative;
  display: flex;
  width: auto;
  height: 3em;
  border-radius: .25em;
  overflow: hidden;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  padding: 1em;
  background-color: #34495e;
  transition: .25s all ease;
  pointer-events: none;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}
:root {
  --background-gradient: linear-gradient(178deg, #ffff33 10%, #3333ff);
  --gray: #34495e;
  --darkgray: #2c3e50;
}
::placeholder {
  color: white;
  opacity: 1; /* Firefox */
}
td{
  background-color: #F5F5F5;
}
  </style>
  <form id="myForm" method="post" action="assistance-action-finalize.php">
  <div class="container" style="padding: 30px 1px 1px 1px; margin-left: 0px;">
      <div class="formbold-main-wrapper">
        <style>
.previous {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

.previous:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}
</style>

<div class="row">
  <div class="col-md">
  <button type="button" class="previous" onclick="window.location.replace('assistance.php')">&laquo; Go Back</button>
  </div>
  <div class="col-md">
    <center>
    <h3 style="color: black;">Family Info</h3>
    </center>
  </div>
  <div class="col-md"></div>
  </div>
        <table class="fl-table">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Serial No.</th>
              <th style="text-align: center; vertical-align: middle;">QRCode</th>
              <th style="text-align: center; vertical-align: middle;">Family Name</th>
              <!-- <th style="text-align: center; vertical-align: middle;">Head First Name</th>
              <th style="text-align: center; vertical-align: middle;">Head Middle Name</th>
              <th style="text-align: center; vertical-align: middle;">Head Last Name</th> -->
              <th colspan="3" style="text-align: center; vertical-align: middle;">Head of the Family</th>
              <th style="text-align: center; vertical-align: middle;">Occupation</th>
              <th style="text-align: center; vertical-align: middle;">CI</th>
              <th style="text-align: center; vertical-align: middle;">Civil Status</th>
              <th style="text-align: center; vertical-align: middle;">4Ps</th>
              <th style="text-align: center; vertical-align: middle;">Ethnicity</th>
              <th style="text-align: center; vertical-align: middle;">Religion</th>
              <th style="text-align: center; vertical-align: middle;">Gender</th>
            </tr>
          </thead> 
            <tbody>
              <?php
                    $Serial = $_POST['View'];
                    $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    // read data of each rows of applicants
                    $cellindex = 0;
            while ($row = $result->fetch_assoc()) {
              $cellindex = $cellindex + 1;
              echo "
                <tr>
                    <td style='vertical-align: middle;'>" . $row["Serial_No."] . "</td>
                    <td style='vertical-align: middle;'>
                      <span id='cell".$cellindex."'>
                      <img style=\"height: 75px;width: 75px;\" src=\"https://api.qrserver.com/v1/create-qr-code/?size=200x200&data='" . $row["Serial_No."] . "'\">
                      </span>
                      <button id='qrbut".$cellindex."' style=\"margin-bottom: 10px;\" type=\"button\" class=\"btn btn-link\" onclick='hidecell".$cellindex."()'>Show</button>
                      <script>
                        function hidecell".$cellindex."() {
                          if (document.getElementById('cell".$cellindex."').style.display == 'none') {
                            document.getElementById('cell".$cellindex."').style.display = 'block';
                            document.getElementById('qrbut".$cellindex."').innerHTML = 'Hide';
                          }
                          else{
                            document.getElementById('cell".$cellindex."').style.display = 'none';
                            document.getElementById('qrbut".$cellindex."').innerHTML = 'Show';
                          }
                        }
                        document.getElementById('cell".$cellindex."').style.display = 'none';
                      </script>
                    </td>
                    <td style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_firstName"] . "</td>                    
                    <td style='vertical-align: middle;'>" . $row["Head_midName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_lastName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Occupation"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Monthly_Net_Income"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Civil Status"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["4Ps Beneficiary"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Type of Ethnicity"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Religion"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                </tr>";
            }
              ?>
            </tbody>
        </table>
        
        <table class="fl-table">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Birthdate</th>
              <th style="text-align: center; vertical-align: middle;">Region</th>
              <th style="text-align: center; vertical-align: middle;">Province/District</th>
              <th style="text-align: center; vertical-align: middle;">Evacuation Center</th>
              <th style="text-align: center; vertical-align: middle;">City/Municipality</th>
              <th style="text-align: center; vertical-align: middle;">House Ownership</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
                    $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);
                    $setevaccenter = '';
                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    // read data of each rows of applicants
                    $cellindex = 0;
              while ($row = $result->fetch_assoc()) {
                echo "

                  <td style='vertical-align: middle;'>" . $row["Birthdate"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Region"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Province/District"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["City/Municipality"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["House_Ownership"] . "</td>
                ";
                $setevaccenter = $row["Evacuation_Center"];

              }
            ?>
            </tr>
          </tbody>
        </table>
        <br>
        <br>
        <center>
        <h3 style="color: black;">Record Damages:</h3>
        </center>
      <table class="fl-table">
        <thead>
          <th style="text-align: center; vertical-align: middle; width: auto;">Housing Condition :</th>
          <th style="text-align: center; vertical-align: middle; width: auto;">Evacuation Center :</th>
          <th style="text-align: center; vertical-align: middle; width: auto;">Assistance During :</th>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="select">
              <select style="width: 100%;"  id="damages" name="damages" required>
                <option value="">Choose One...</option>
                <option value="No Damage">No Damage</option>
                <option value="Partially Damaged">Partially Damaged</option>
                <option value="Totally Damaged">Totally Damaged</option>
              </select>
              </div>
            </td>
            <td>
              <div class="select">
              <select style="width: 100%;" id="evaccenter" name="evaccenter" required>
                <option>Choose One...</option>
                <?php
                  $sql = "SELECT * FROM `evac_center`";
                  $result = $conn->query($sql);

                  if(!$result){
                  die("Invalid query: " . $connection->error);
                  }

                  while ($row = $result->fetch_assoc()) {
                    $choiceevaccenter = $row["Evac_Center_Name"];
                    if ($setevaccenter == $choiceevaccenter) {
                      echo "<option value='" . $row["Evac_ID"] . "' selected>" . $row["Evac_Center_Name"] . "</option>";
                    }
                    else{
                      echo "<option value='" . $row["Evac_ID"] . "'>" . $row["Evac_Center_Name"] . "</option>";
                    }
                    
                  }
                ?>
              </select>
            </div>
            </td>
            <td>
              <div  class="select">
              <!-- <input type="text" style="width: 100%; height: 3em;color: #fff;background-color: var(--darkgray);border-radius: .25em;overflow: hidden;" name="asstduring" placeholder=" Name of Disaster" required> -->
              <select style="width: 100%; height: 3em;color: #fff;background-color: var(--darkgray);border-radius: .25em;overflow: hidden;" name="asstduring" required>
                <option value="">Choose One</option>
                <?php
                $sql = "SELECT * FROM `disaster` ORDER BY `Occurred` DESC;";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                $firstIteration = true; // Introduce a variable to track the first iteration

                while ($row = $result->fetch_assoc()) {

                    $checksql = "SELECT * FROM `damages` INNER JOIN `disaster` ON `damages`.`Disaster_ID` = `disaster`.`Disaster_ID` WHERE `disaster`.`Disaster_ID` = '" . $row["Disaster_ID"] . "' AND `damages`.`Serial_No.` = '$Serial';";
                    $checkresult = $conn->query($checksql);

                    if (mysqli_num_rows($checkresult) == 0) {
                        // Check if it's the first iteration and add the 'selected' attribute
                        $selectedAttribute = $firstIteration ? 'selected' : '';

                        echo "<option value='" . $row["Disaster_ID"] . "' $selectedAttribute>" . $row["Disaster"] . "</option>";

                        // Set the firstIteration variable to false after the first iteration
                        $firstIteration = false;
                    }
                }
                ?>
            </select>

            </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

      </div>
        <input style="display: none;" id="Action" type="text" name="Action" value="" placeholder="Query Action" readonly>
        <input style="display: none;" id="Serial" type="text" name="Serial" value="" placeholder="Index" readonly> 
        <br>
        <br>
        <center>
        <h3 class="center">Family Members</h3>
        </center>
        <table class="fl-table">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Name</th>
              <th style="text-align: center; vertical-align: middle;">Head Relation</th>
              <th style="text-align: center; vertical-align: middle;">Age</th>
              <th style="text-align: center; vertical-align: middle;">Gender</th>
              <th style="text-align: center; vertical-align: middle;">Civil Status</th>
              <th style="text-align: center; vertical-align: middle;">Education</th>
              <th style="text-align: center; vertical-align: middle;">Occupation</th>
              <th style="text-align: center; vertical-align: middle;">Remarks</th>
              <th style="text-align: center; vertical-align: middle;">Casualty</th>
              <th>Evac Center</th>
            </tr>
          </thead>
          <tbody>
            
              <?php
              
                    $sql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    // read data of each rows of applicants
                    $cellindex = 0;
              while ($row = $result->fetch_assoc()) {
                $cellindex = $cellindex + 1;
                
                if ($cellindex == mysqli_num_rows($result)) {
                  $borderadder = "border-bottom: 1px solid black;";
                }
                else{
                  $borderadder = "";
                }
                
                echo "
                <tr>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Member_Name"] . "</td>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Head_Relation"] . "</td>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Age"] . "</td>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Gender"] . "</td>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Civil_Status"] . "</td>
                  <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Educational_Level"] . "</td>
                  ";
                  if (is_null($row["Occupational_Skills"])){
                    echo "<td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>None</td>";
                  }
                  else{
                    echo "<td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Occupational_Skills"] . "</td>";
                  }
                  if (is_null($row["Remarks"])) {
                    echo "
                    <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Remarks"] . "</td>
                    ";
                  }
                  else{
                    echo "
                    <td style='vertical-align: middle;padding: 4px;border-top: 1px solid black;".$borderadder."'>" . $row["Remarks"][0] . "</td>
                    ";
                  }
                  

                  echo "
                  <td style='vertical-align: middle;padding: 0px;border-top: 1px solid black;".$borderadder."'>
                  <div class='select'>
                    <select id='casualty' name='casualty[]'>
                      <option value=''>None</option>
                      <option value='01'>01-Dead</option>
                      <option value='02'>02-Injured</option>
                      <option value='03'>03-Missing</option>
                      <option value='04'>04-With Illness</option>
                    </select>
                  </div>
                  </td>
                  <td style='vertical-align: middle;padding: 0px;border-top: 1px solid black;".$borderadder."'>
                    <div class='select'>
                    <select class='form-contro'l style='width: auto;' id='memevaccenter".$cellindex."' name='memevaccenter[]' required>
                      <option>Choose One...</option>
                      ";
                        $sqlevac = "SELECT * FROM `evac_center`";
                        $resultevac = $conn->query($sqlevac);

                        if(!$resultevac){
                        die("Invalid query: " . $connection->error);
                        }

                        while ($rowevac = $resultevac->fetch_assoc()) {
                          $choiceevaccenter = $rowevac["Evac_Center_Name"];
                          if ($setevaccenter == $choiceevaccenter) {
                            echo "<option value='" . $rowevac["Evac_ID"] . "' selected>" . $rowevac["Evac_Center_Name"] . "</option>";
                          }
                          else{
                            echo "<option value='" . $rowevac["Evac_ID"] . "'>" . $rowevac["Evac_Center_Name"] . "</option>";
                          }
                        }
                      echo "
                    </select>
                    </div>
                  </td>
                  </tr>
                ";
              }
            ?>
            
          </tbody>
        </table>
        <center>
        <button type="submit" class="btn btn-primary" name='Save' value='<?php echo $Serial ?>'>Save</button>
        </center>
    </form>
    </div>
    <script type="text/javascript">
      function do_this(serial, action) {
        document.getElementById('Action').value = action;
        document.getElementById('Serial').value = serial;
        document.getElementById("myForm").submit();
      }
    </script>
    <script>
      $(document).ready(function () {
      $("#familytable").dataTable();
    });
    </script>


</body>
<?php
  }
  else{
    header("Location:assistance.php");
  }
}
?>
</html>

