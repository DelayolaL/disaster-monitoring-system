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
  function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileKeywords = ['Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone'];

    // Check if the user agent contains any of the mobile keywords
    foreach ($mobileKeywords as $keyword) {
        if (stripos($userAgent, $keyword) !== false) {
            return true;
        }
    }

    return false;
  }

 if (isMobileDevice()) {
    echo "<script>
      window.alert('Mobile Access is Denied!');
      window.location.replace('index.php');
    </script>";

  }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relief Assistance</title>
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
                <li class="sidebar-item">
                  <a class="sidebar-link" href="assistance.php" aria-expanded="false">
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="relief.php" aria-expanded="false">
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
      <div class="container"  style="padding: 60px 1px 1px 1px; margin-left: 5px;">
        <div>
         <div class="container-fluid">
            <div class="container-fluid">
              <div class="card" style="margin-top: 35px;overflow-x: auto;">
                <div class="card-body">
                  <div class="formbold-main-wrapper">



<head>
    <title>Personal Information Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="tablestyle.css">
    <style>
        .center {
            text-align: center;
        }
        .colored-button {
            background-color: cornflowerblue;
            color: white;
            width: 120px; /* Adjust the width as needed */
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .center {
      text-align: center;
    }
    
    .account-details {
      margin-top: 20px;
    }
    
    .wide-input {
      width: 100%;
    }
    
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    
    .colored-button {
      background-color: #337ab7;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .colored-button:hover {
      background-color: #286090;
    }
    </style>
</head>
<body>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['Select'])) {
    ///////////////////////////////////////////SELECT FAMILY/////////////////////////////////////////
?>
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
  <button type="button" class="previous" onclick="window.location.replace('relief.php')">&laquo; Go Back</button>
  </div>
  <div class="col-md">
    <center>
    <h3 style="color: black;">Damage Info</h3>
    </center>
  </div>
  <div class="col-md"></div>
  </div>
 <table class="fl-table">
  <style>
    td{
      background: #F8F8F8;
    }
  </style>
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Serial No.</th>
              <th style="text-align: center; vertical-align: middle;">Family Name</th>
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
                    $cardserial = '';
                    $Serial = $_POST['Select'];
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
              $cardserial = $row["Serial_No."];
              echo "
                <tr>
                    <td style='vertical-align: middle;'>" . $row["Serial_No."] . "</td>
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
              <th style="text-align: center; vertical-align: middle;" colspan="3">House Ownership</th>
              <th style="text-align: center; vertical-align: middle;">Barangay</th>
              <th style="text-align: center; vertical-align: middle;" colspan='3'>Housing Condition</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                  <?php
                    $cardserial = '';
                    $Serial = $_POST['Select'];
                    $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);

                              if(!$result){
                                  die("Invalid query: " . $connection
                                    ->error);
                              }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <td style='vertical-align: middle;' colspan='3'>" . $row["House_Ownership"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Barangay_Name"] . "</td>
                        ";
                        $damsql = "SELECT * FROM `damages` WHERE `Serial_No.` = '$Serial' ORDER BY `Date` DESC LIMIT 1;";
                        $damresult = $conn->query($damsql);
                        while ($damrow = $damresult->fetch_assoc()) {
                          echo "<td style='vertical-align: middle;' colspan='3'>" . $damrow["Housing_Condition"] . "</td>";
                        }

                      }

                      ?>
              </tr>
            </tbody>
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Birthdate</th>
              <th style="text-align: center; vertical-align: middle;">Region</th>
              <th style="text-align: center; vertical-align: middle;">City/Municipality</th>
              <th style="text-align: center; vertical-align: middle;">Province/District</th>
              <th style="text-align: center; vertical-align: middle;">Evacuation Center</th>
              <th style="text-align: center; vertical-align: middle;">Remarks</th>
              <th style="text-align: center; vertical-align: middle;">Casualties</th>


            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
            function sqlresgetter($sql, $conn){
            $result = $conn->query($sql);
            return $result;
            }
                    $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    // read data of each rows of applicants
                    $cellindex = 0;
              while ($row = $result->fetch_assoc()) {
                $theserial = $row["Serial_No."];

                        $count1 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Remarks` = 'A';";
                        $count2 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Remarks` = 'B';";
                        $count3 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Remarks` = 'C';";
                        $count4 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Remarks` = 'D';";
                        $count5 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Remarks` = 'E';";

                        $res1 = sqlresgetter($count1,$conn);
                        $res2 = sqlresgetter($count2,$conn);
                        $res3 = sqlresgetter($count3,$conn);
                        $res4 = sqlresgetter($count4,$conn);
                        $res5 = sqlresgetter($count5,$conn);


                        $count1 = mysqli_num_rows($res1);
                        $count2 = mysqli_num_rows($res2);
                        $count3 = mysqli_num_rows($res3);
                        $count4 = mysqli_num_rows($res4);
                        $count5 = mysqli_num_rows($res5);

                        $sqlcount1 =  "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Casualty` = '01';";
                        $sqlcount2 =  "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Casualty` = '02';";
                        $sqlcount3 =  "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Casualty` = '03';";
                        $sqlcount4 =  "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial' AND `Casualty` = '04';";

                        $res1 = sqlresgetter($sqlcount1,$conn);
                        $res2 = sqlresgetter($sqlcount2,$conn);
                        $res3 = sqlresgetter($sqlcount3,$conn);
                        $res4 = sqlresgetter($sqlcount4,$conn);

                        $recount1 = mysqli_num_rows($res1);
                        $recount2 = mysqli_num_rows($res2);
                        $recount3 = mysqli_num_rows($res3);
                        $recount4 = mysqli_num_rows($res4);


                echo "
                  <td style='vertical-align: middle;'>" . $row["Birthdate"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Region"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["City/Municipality"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Province/District"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>
                  <td style='vertical-align: middle;'>
                        <span><span style='float: left;'>Old Person : </span><span style='float: right;'>$count1</span></span>
                          <br>
                          <span><span style='float: left;'>Lact Mother : </span><span style='float: right;'>$count2</span></span></span>
                          <br>
                          <span><span style='float: left;'>PWD : </span><span style='float: right;'>$count3</span></span>
                          <br>
                          <span><span style='float: left;'>Pregnant : </span><span style='float: right;'>$count4</span></span>
                          <br>
                          <span><span style='float: left;'>Solo Parent : </span><span style='float: right;'>$count5</span></span>
                  </td>
                  <td style='vertical-align: middle;'>
                        <span><span style='float: left;'>Dead : </span><span style='float: right;'>$recount1</span></span>
                          <br>
                          <span><span style='float: left;'>Injured : </span><span style='float: right;'>$recount2</span></span></span>
                          <br>
                          <span><span style='float: left;'>Missing : </span><span style='float: right;'>$recount3</span></span>
                          <br>
                          <span><span style='float: left;'>With Illness : </span><span style='float: right;'>$recount4</span></span>
                  </td>
                ";
              }
            ?>
            </tr>
            </tbody>
        </table>

  <div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="row">
      <div class="col-md">
        <div class="form-group">

          <label for="relgoods">Relief Goods (Kind/Type):</label>
          <input type="text" name="relgoods" id="relgoods" class="form-control" required>
          <br>
          <label>
            <input type="radio" name="paymentType" value="Cash" onclick="updateInput(this)"> Cash
          </label>
          <label>
            <input type="radio" name="paymentType" value="Non-Cash" onclick="updateInput(this)" checked> Non-Cash
          </label>

        </div>
      </div>
      <div class="col-md">
        <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number" id="qty" name="qty" class="form-control">
          </div>
      </div>
      <div class="col-md">
        <div class="form-group">
          <label for="recfam">Received by:</label>

            <select class="form-control" id="recfam" name="recfam" required>
              <option value="">Choose One...</option>
              <?php

              $famget = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
              $result = $conn->query($famget);
              while ($row = $result->fetch_assoc()) {
                $thehead = $row['Head_firstName'] . " " . $row['Head_lastName'];
                echo '<option value="'.$thehead.'">'.$thehead.'</option>';
              }

              $memfamget = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial'";
              $result = $conn->query($memfamget);
              while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['Member_Name'].'">'.$row['Member_Name'].'</option>';
              }
              ?>
            </select>

        </div>
      </div>
      <div class="col-md">
        <div class="form-group">
          <label for="cashasst">Cash Assistance:</label>
          <input type="number" name="cashasst" id="cashasst" class="form-control" value="0">
        </div>
      </div>
    </div>
    <center>
      <div class="button-container">
            <button class="colored-button" type="submit" name="Relief" value="<?php echo $Serial; ?>">Submit</button>
          </div>
    </center>
  </form>
  </div>
<script>
    function updateInput(radio) {
      var inputField = document.getElementById("relgoods");
      var cashField = document.getElementById("cashasst");
      var quantity = document.getElementById("qty");

      if (radio.value === "Cash") {
        // Set value to "Cash" and make it readonly
        inputField.value = "Cash";
        inputField.readOnly = true;

        quantity.value = 1;
        quantity.readOnly = true;

        cashField.value = "";
        // cashField.readOnly = false;
      } else {
        // Remove readonly attribute
        inputField.value = "";
        inputField.readOnly = false;

        quantity.value = '';
        quantity.readOnly = false;

        cashField.value = 0;
        // cashField.readOnly = true;
      }
    }
  </script>
<?php
  }
  elseif(isset($_POST['Relief'])){ 
    ///////////////////////////////////////////EXECUTE SQL/////////////////////////////////////////
?>
<h3 class="center">FAMILY ASSISTANCE RECORD</h3>
      <?php
      $serial = $_POST['Relief'];

      $quantity = $_POST['qty'];
      $reliefgood = $_POST['relgoods'];
      $cashasst = $_POST['cashasst'];
      $receiver = $_POST['recfam'];
      $provider = $_SESSION['Username'];

      $dmgget = "SELECT * FROM `damages` WHERE `Serial_No.` = '$serial'";
      $result = $conn->query($dmgget);
      while ($row = $result->fetch_assoc()) {
        $damageindex = $row['damage_ID'];
      }

      $famget = "SELECT * FROM `family` WHERE `Serial_No.` = '$serial'";
      $result = $conn->query($famget);
      while ($row = $result->fetch_assoc()) {
        $famname = $row['Family_Name'];
      }

      if ($quantity == '') {
        $quantity = NULL;
      }
      if ($cashasst == '') {
        $cashasst = NULL;
      }

      $sql = "INSERT INTO `relief_distribution` (`rd_ID`, `Serial_No.`, `damage_ID`, `Date`, `Recieving_Family`, `Rec_Fam_Member`, `Kind/Type`, `Quantity`, `Cost`, `Provider`) VALUES (NULL, '$serial', '$damageindex', (curdate()), '$famname', '$receiver', '$reliefgood', '$quantity', '$cashasst', '$provider');";


      if (mysqli_query($conn, $sql)){
        echo "<h3 class=\"center\">Recorded Successfully!</h3>
        <div class=\"button-container\">
          <button onclick=\"window.location.replace('relief.php')\" class=\"colored-button\" type=\"button\">Return</button>
        </div>
      ";
      }
      else
       {
          echo "Error: " . $sql . "" . mysqli_error($conn);
       }
  }
  else{
    echo "<script>
      window.alert('Something Went Wrong')
      window.location.replace('relief.php')
    </script>";
  }
}
else{
  ///////////////////////////////////////////DEFAULT/////////////////////////////////////////
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h3 class="center">DAMAGE RECORDS</h3>
  <div class="account-details" >
  <table id="familytable" class="fl-table">
    <style>
    table.dataTable tbody th, table.dataTable tbody td {
      padding: 0px 0px;

    }
    td{
      border-bottom: 1px solid;
    }
    </style>
    <thead>
      <tr>
        <th style="text-align: center;vertical-align: middle;">Serial No.</th>
        <th style="text-align: center;vertical-align: middle;">Family Name</th>
        <th style="text-align: center;vertical-align: middle;">Family Head</th>
        <th style="text-align: center;vertical-align: middle;">During</th>
        <th style="text-align: center;vertical-align: middle;">Date</th>
        <th style="text-align: center;vertical-align: middle;">Evacuation Center</th>
        <th style="text-align: center;vertical-align: middle;">Housing Condition</th>
        <th style="text-align: center;vertical-align: middle;">Remarks</th>
        <th style="text-align: center;vertical-align: middle;">Action</th>
      </tr>
    </thead>
    <tbody id="data-table">
        <?php
        function sqlresgetter($sql, $conn){
        $result = $conn->query($sql);
        return $result;
        }

          $sql = "SELECT * FROM `damages` INNER JOIN `family` ON `damages`.`Serial_No.` = `family`.`Serial_No.` ORDER BY `Date` DESC;";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
          while ($row = $result->fetch_assoc()) {
              $theserial = $row["Serial_No."];

              $count1 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$theserial' AND `Remarks` = 'A';";
              $count2 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$theserial' AND `Remarks` = 'B';";
              $count3 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$theserial' AND `Remarks` = 'C';";
              $count4 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$theserial' AND `Remarks` = 'D';";
              $count5 = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$theserial' AND `Remarks` = 'E';";

              $res1 = sqlresgetter($count1,$conn);
              $res2 = sqlresgetter($count2,$conn);
              $res3 = sqlresgetter($count3,$conn);
              $res4 = sqlresgetter($count4,$conn);
              $res5 = sqlresgetter($count5,$conn);


              $count1 = mysqli_num_rows($res1);
              $count2 = mysqli_num_rows($res2);
              $count3 = mysqli_num_rows($res3);
              $count4 = mysqli_num_rows($res4);
              $count5 = mysqli_num_rows($res5);
              echo "
                <tr>
                    <td style='vertical-align: middle;'>" . $row["Serial_No."] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_firstName"] . " " . $row["Head_lastName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Assistance During:"] . "</td>                  
                    <td style='vertical-align: middle;'>" . $row["Date"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Housing_Condition"] . "</td>
                    <td style='vertical-align: middle;'>
                    <span><span style='float: left;'>Old Person : </span><span style='float: right;'>$count1</span></span>
                      <br>
                      <span><span style='float: left;'>Lact Mother : </span><span style='float: right;'>$count2</span></span></span>
                      <br>
                      <span><span style='float: left;'>PWD : </span><span style='float: right;'>$count3</span></span>
                      <br>
                      <span><span style='float: left;'>Pregnant : </span><span style='float: right;'>$count4</span></span>
                      <br>
                      <span><span style='float: left;'>Solo Parent : </span><span style='float: right;'>$count5</span></span>
                    </td>
                    <td>
                      <button type=\"submit\" class=\"btn btn-primary\" value='" . $row["Serial_No."] . "' name='Select'>Select</button>
                    </td>
                </tr>";
            }
        ?>
        
    </tbody>
  </table>


  
</form>
                  </div>
                </div>
              </div>
            </div>
<?php
}
?>
</body>
</html>
  </div>

  <script>
      $(document).ready(function () {
      $("#familytable").dataTable({
        "lengthMenu": [5, 10, 15, 20, 50],
        "pageLength": 5,
        'order': []
      });
    });
    </script>
    
 </div>
<?php
}
?>
</body>
</html>
