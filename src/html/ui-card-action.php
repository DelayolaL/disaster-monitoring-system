<!doctype html>
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
  $profile = $_SESSION['Username']; 
?>

<html lang="en">
<!-- THIS IS THE RESIDENTS TABLE -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Family Records</title>
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
                <span class="hide-menu">Assistance Form</span>
                <span class="rotate" id="assistingarrow" style="margin-right: 0px; margin-left: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                </span>
              </a>
              <span id="assistthis" style="display: none;margin-left: 50px;margin-right: auto;">
              <ul class="sidebar-submenu"> 
                <li class="sidebar-item">
                  <a class="sidebar-link" href="assistance.php" aria-expanded="false">
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
            <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="./ui-card.php" aria-expanded="false">
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
  .me-2 {
    margin-right: 0.5rem!important;
  }
  .nopadd{
    padding: 0;
  }
  .row{
    padding-left: 35px;
    padding-right: 35px;
  }
  .btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
  }
  .btn-default:focus {
      color: #333;
      background-color: #e6e6e6;
      border-color: #8c8c8c;
  }
  .btn-default:hover {
      color: #333;
      background-color: #e6e6e6;
      border-color: #adadad;
  }
  .btn-default:active {
      color: #333;
      background-color: #e6e6e6;
      border-color: #adadad;
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
                <span><?php echo $profile; ?></span>
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

<style>
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn-default:focus {
    color: #333;
    background-color: #e6e6e6;
    border-color: #8c8c8c;
}
.btn-default:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.btn-default:active {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
body {
  color: #566787;
  background: #f5f5f5;
  font-family: 'Varela Round', sans-serif;
  font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
  background: #fff;
  padding: 10px 5px;
  border-radius: 3px;
  min-width: 1000px;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
  padding-bottom: 15px;
  background: #435d7d;
  color: #fff;
  padding: 16px 30px;
  min-width: 100%;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
}
.table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
}
.table-title .btn-group {
  float: right;
}
.search-box {
     width: 70%;
     height: 40px;
     padding: 10px;
     font-size: 16px;
     border: none;
     border-radius: 20px;
     box-shadow: 0px 2px 6px rgba(0,0,0,0.3);
 }
 .filter-button {
     width: 25%;
     height: 40px;
     font-size: 16px;
     background-color: #ddd;
     border: none;
     border-radius: 20px;
     box-shadow: 0px 2px 6px rgba(0,0,0,0.3);
     color: #333;
     margin-left: 10px;
 }

table.table tr th, table.table tr td {
  border-color: #e9e9e9;
  padding: 5px 5px;
  vertical-align: middle;
}
table.table tr th:first-child {
  width: 60px;
}
table.table tr th:last-child {
  width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
  background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
}
table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
} 
table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
  margin: 0 5px;
}
table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
}
table.table td a:hover {
  color: #2196F3;
}
table.table td a.edit {
  color: #FFC107;
}
table.table td a.delete {
  color: #F44336;
}
table.table td i {
  font-size: 19px;
}
table.table .avatar {
  border-radius: 50%;
  vertical-align: middle;
  margin-right: 10px;
}
.pagination {
  float: right;
  margin: 0 0 5px;
}
.pagination li a {
  border: none;
  font-size: 13px;
  min-width: 30px;
  min-height: 30px;
  color: #999;
  margin: 0 2px;
  line-height: 30px;
  border-radius: 2px !important;
  text-align: center;
  padding: 0 6px;
}
.pagination li a:hover {
  color: #666;
} 
.pagination li.active a, .pagination li.active a.page-link {
  background: #03A9F4;
}
.pagination li.active a:hover {        
  background: #0397d6;
}
.pagination li.disabled i {
  color: #ccc;
}
.pagination li i {
  font-size: 16px;
  padding-top: 6px
}
.hint-text {
  float: left;
  margin-top: 10px;
  font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
  position: relative;
}
.custom-checkbox input[type="checkbox"] {    
  opacity: 0;
  position: absolute;
  margin: 5px 0 0 3px;
  z-index: 9;
}
.custom-checkbox label:before{
  width: 18px;
  height: 18px;
}
.custom-checkbox label:before {
  content: '';
  margin-right: 10px;
  display: inline-block;
  vertical-align: text-top;
  background: white;
  border: 1px solid #bbb;
  border-radius: 2px;
  box-sizing: border-box;
  z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
  left: 6px;
  top: 3px;
  width: 6px;
  height: 11px;
  border: solid #000;
  border-width: 0 3px 3px 0;
  transform: inherit;
  z-index: 3;
  transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
  border-color: #03A9F4;
  background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
  border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
  color: #b8b8b8;
  cursor: auto;
  box-shadow: none;
  background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
  max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
  padding: 20px 30px;
}
.modal .modal-content {
  border-radius: 3px;
  font-size: 14px;
}
.modal .modal-footer {
  background: #ecf0f1;
  border-radius: 0 0 3px 3px;
}
.modal .modal-title {
  display: inline-block;
}
.modal .form-control {
  border-radius: 2px;
  box-shadow: none;
  border-color: #dddddd;
}
.modal textarea.form-control {
  resize: vertical;
}
.modal .btn {
  border-radius: 2px;
  min-width: 100px;
} 
.modal form label {
  font-weight: normal;
} 
</style>

</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['Update'])){
      $Serial = $_POST['Update'];
    ?>
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-12">
                <center>
                <h2 style="color: white;">Edit <b>Family</b></h2>
                </center>
              </div>
            </div>
          </div>
          <style type="text/css">
            td {
              text-align: center;
            }
          </style>
          <form method="post" action="ui-card-action-finalize.php">
            <!--  Put the Serial No. Here -->
          
          <?php
          echo
          '<input style="display: none;" type="text" name="Serialindex" value="'.$Serial.'" readonly>';
          ?>
          <table id="familytable" class="table table-bordered" style="margin-left: 0px;">
              <thead>
                <tr>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Family Name</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head First Name</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Middle Name</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Last Name</th>
                  <!-- <th style="text-align: center; vertical-align: middle;">Head of the Family</th> -->
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Occupation</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Monthly Net Income</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Civil Status</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">4Ps Beneficiary</th>
                  
                </tr>
              </thead> 
                <tbody>
                  <tr>
                    <?php
                  
                        $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query: " . $connection
                              ->error);
                        }
    
                while ($row = $result->fetch_assoc()) {
                  echo "
                        <td style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Head_firstName"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Head_midName"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Head_lastName"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Occupation"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Monthly_Net_Income"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Civil Status"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["4Ps Beneficiary"] . "</td>
                    ";
                }
                ?>
                  </tr>
                                <tr>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upFamname" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upheadfirst" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upheadmid" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upheadlast" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upOccu" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;"><input type="text" name="upMonthly" style="width: 110px;" value=""></td>
                                  <td style="background-color: #ADADAD;">
                                  <select name="civstatus">
                                    <option value="">Choose One...</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Widow">Widow</option>
                                  </select></td>
                                  <td style="background-color: #ADADAD;">
                                    <select name="update4ps">
                                      <option value="">Choose One...</option>
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                    </select>
                                  </td>
                                </tr>
                              </tbody>
                          </table>
                          <table class="table table-bordered" style="margin-left: 0px;">
                            <thead>
                              <tr>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Ethnicity</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Religion</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Gender</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Birthdate</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Region</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Province/District</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Evacuation Center</th>
                                <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">City/Municipality</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                <?php
                $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query: " . $connection
                              ->error);
                        }
                  while ($row = $result->fetch_assoc()){
                    echo"
                      <tr>
                        <td style='vertical-align: middle;'>" . $row["Type of Ethnicity"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Religion"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Birthdate"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Region"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Province/District"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>
                        <td style='vertical-align: middle;'>" . $row["City/Municipality"] . "</td>
                      </tr>
                    ";
                  }
                ?>
                <tr>
                              <td style="background-color: #ADADAD;"><input type="text" name="upEthnic" style="width: 110px;" value=""></td>
                              <td style="background-color: #ADADAD;">
                                <select name="upRel">
                                  <option value="">Choose One...</option>
                                  <option value="Roman Catholic">Roman Catholic</option>
                                  <option value="Born Again">Born Again</option>
                                  <option value="Islam">Islam (Muslim)</option>
                                  <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                  <option value="Other">Other</option>
                                </select>
                              </td>
                              <td style="background-color: #ADADAD;">
                                <select name="upGen" style="width: 110px;">
                                  <option value="">Choose One...</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </td>
                              <td style="background-color: #ADADAD;"><input type="date" name="upBdate" style="width: 110px;" value=""></td>
                              <td style="background-color: #ADADAD;"><input type="text" name="upRegion" style="width: 110px;" value=""></td>
                              <td style="background-color: #ADADAD;"><input type="text" name="upProv" style="width: 110px;" value=""></td>
                              <td style="background-color: #ADADAD;"><input type="text" name="upEvac" style="width: 110px;" value=""></td>
                              <td style="background-color: #ADADAD;"><input type="text" name="upCity" style="width: 110px;" value=""></td>
                            </tr>
                          </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-left: 0px;">
                          <thead>
                            <tr>
                              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">House Ownership</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                  <?php
                $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query: " . $connection
                              ->error);
                        }
                  while ($row = $result->fetch_assoc()){
                    echo"
                      <tr>
                        <td style='vertical-align: middle;'>" . $row["House_Ownership"] . "</td>
                      </tr>
                    ";
                  }
                ?></tr>
                            <tr>
                              <td style="background-color: #ADADAD;">
                                <select  name="upOwner">
                                  <option value="">Choose an option...</option>
                                  <option value="House & lot owner">House & lot owner</option>
                                  <option value="Rented house & lot">Rented house & lot</option>
                                  <option value="House owner & lot renter">House owner & lot renter</option>
                                  <option value="House owner,rent-free lot with owner\'s consent">House owner,rent-free lot with owner\'s consent</option>
                                  <option value="House owner,rent-free lot w/o owner\'s consent">House owner,rent-free lot w/o owner\'s consent</option>
                                  <option value="Rent-free house & lot with owner\'s consent">Rent-free house & lot with owner\'s consent</option>
                                  <option value="Rent-free house & lot w/o owner\'s consent">Rent-free house & lot w/o owner\'s consent</option>
                                </select>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <center>
                        <div class="buttons">
                          <button type="button" onclick="location.replace('ui-card.php')" class="btn btn-default">Return</button>
                          <button type="submit" name="actbtn" value="Update" class="btn btn-primary">Update</button>
                        </div>
                        </center>
                    </div>
                  </div>        
                </div>

<?php
}
elseif (isset($_POST['Delete'])){
  $Serial = $_POST['Delete'];
?>
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-12">
            <center>
            <h2 style="color: white;">Delete <b>Family</b></h2>
            </center>
          </div>
        </div>
      </div>
      <style type="text/css">
        td {
          text-align: center;
        }
      </style>
      <form method="post" action="ui-card-action-finalize.php">
        <!--  Put the Serial No. Here -->
        <?php
          echo
        '<input style="display: none;" type="text" name="Serialindex" value="'.$Serial.'" readonly>';
        ?>
      <table id="familytable" class="table table-bordered" style="margin-left: 0px;">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Family Name</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head First Name</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Middle Name</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Last Name</th>
              <!-- <th style="text-align: center; vertical-align: middle;">Head of the Family</th> -->
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Occupation</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Monthly Net Income</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Civil Status</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">4Ps Beneficiary</th>
            </tr>
          </thead> 
            <tbody>
              <tr>
              <?php
                    $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }

            while ($row = $result->fetch_assoc()) {
              echo "
                    <td style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_firstName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_midName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_lastName"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Occupation"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Monthly_Net_Income"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Civil Status"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["4Ps Beneficiary"] . "</td>
                ";
            }
              ?>
              </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="margin-left: 0px;">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Ethnicity</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Religion</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Gender</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Birthdate</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Region</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Province/District</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Evacuation Center</th>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">City/Municipality</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
              while ($row = $result->fetch_assoc()){
                echo"
                  <tr>
                    <td style='vertical-align: middle;'>" . $row["Type of Ethnicity"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Religion"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Birthdate"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Region"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Province/District"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["City/Municipality"] . "</td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
        <table class="table table-bordered" style="margin-left: 0px;">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">House Ownership</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
            $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
              while ($row = $result->fetch_assoc()){
                echo"
                  <tr>
                    <td style='vertical-align: middle;'>" . $row["House_Ownership"] . "</td>
                  </tr>
                ";
              }
            ?>
            </tr>
          </tbody>
        </table>
        <center>
        <div class="buttons">
          <button type="button" onclick="location.replace('ui-card.php')" class="btn btn-default">Return</button>
          <button type="submit" name="actbtn" value="Delete" class="btn btn-danger">Delete</button>
        </div>
        </center>
    </div>
  </div>        
</div>
<?php
}
else{
  echo "<script>
      window.alert('Something went wrong');
      window.location.replace('ui-card.php')
    </script>";
}

}
else{
echo "<script>
      window.alert('Something went wrong');
      window.location.replace('ui-card.php')
    </script>";
}
?>
<script>
  $(document).ready(function () {
    $("#visittable").dataTable();
  });
</script>

</form>
<?php
}
?>
</body>
</html>