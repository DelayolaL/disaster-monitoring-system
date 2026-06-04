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
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 if (isset($_POST['Edit'])) {
$PostID = $_POST['Edit'];
 
?>

<div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-12">
                <center>
                <h2>Edit <b>Family Member</b></h2>
                </center>
              </div>
            </div>
          </div>
          <style type="text/css">
            td {
              text-align: center;
            }
            .truncate-text {
              max-width: 120px; /* Set the maximum width of the cell */
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis; /* Display an ellipsis (...) to indicate truncated text */
            }
          </style>
          <form method="post" action="ui-card-memberaction-finalize.php">
          <table id="familytable" class="table table-bordered" style="margin-left: 0px;">
              <thead>
                <tr>

                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Member Name</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Relation</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Age</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Gender</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Civil Status</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Educational Level</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Occupational Skills</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Remarks</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Casualty</th>


                </tr>
              </thead> 
                <tbody>
                  <tr>
                  <?php
                  $sql = "SELECT * FROM `family_members` WHERE `member_ID` = $PostID;";

                  $result = $conn->query($sql);

                  if(!$result){
                      die("Invalid query: " . $connection
                        ->error);
                  }
                  $cellindex = 0;
                  while ($row = $result->fetch_assoc()) {
                    $theID = $row["member_ID"];
                    
                    
                    

                    if ($row["Occupational_Skills"] == '') {
                      $CheckOcc = 'N/A';
                    }
                    else{
                      $CheckOcc = $row["Occupational_Skills"];
                    }

                    if ($row["Remarks"] == '') {
                      $CheckRem = 'N/A';
                    }
                    else{
                      $CheckRem = $row["Remarks"];
                    }
                    
                    if ($row["Casualty"] == '') {
                      $CheckCas = 'N/A';
                    }
                    else{
                      $CheckCas = $row["Casualty"];
                    }


                  echo "
                    <td style='vertical-align: middle;'>" . $row["Member_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_Relation"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Age"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Civil_Status"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Educational_Level"] . "</td>
                    <td style='vertical-align: middle;'>" . $CheckOcc . "</td>
                    <td style='vertical-align: middle;'>" . $CheckRem . "</td>
                    <td style='vertical-align: middle;'>" . $CheckCas . "</td>
                    ";
                }
                ?>
                  </tr>
                  <tr>
                    <td style="background-color: #ADADAD;"><input type="text" name="upMem" style="width: 150px;" value=""></td>
                    <td style="background-color: #ADADAD;">
                      <select name="upRel" style="width: 150px;">
                        <option value="">Choose One...</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Common-law Partner">Common-law Partner</option>
                        <option value="Child">Child</option>
                        <option value="Relative">Relative</option>
                        <option value="Grandparent">Grandparent</option>                      </select>
                    </td>
                    <td style="background-color: #ADADAD;"><input type="number" name="upAge" style="width: 50px;" value=""></td>
                    <td style="background-color: #ADADAD;">
                    <select name="upGender" style="width: 100px;">
                        <option value="">Choose...</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                      </select>
                    </td>
                    <td style="background-color: #ADADAD;">
                      <select name="upCiv" style="width: 100px;">
                        <option value="">Choose...</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                        <option value="Widow">Widow</option>
                      </select>
                    </td>
                    <td style="background-color: #ADADAD;">
                      <select name="upEduc" style="width: 150px;">
                        <option value="">Choose One...</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School">High School</option>
                        <option value="Senior High School">Senior High School</option>
                        <option value="College">College</option>
                      </select>
                    </td>
                    <td style="background-color: #ADADAD;"><input type="text" name="upOcc" style="width: 150px;" value=""></td>
                    <td style="background-color: #ADADAD;">
                      <select name="upRem" style="width: 150px;">
                        <option value="">None</option>
                        <option value="A">A-Older Person</option>
                        <option value="B">B-Lactating</option>
                        <option value="C">C-PWD</option>
                        <option value="D">D-Pregnant Mother</option>
                        <option value="E">E-Solo</option>
                      </select>
                    </td>
                    <td style="background-color: #ADADAD;">
                    <select name="upCas" style="width: 125px;">
                      <option value=''>None</option>
                      <option value='01'>01-Dead</option>
                      <option value='02'>02-Injured</option>
                      <option value='03'>03-Missing</option>
                      <option value='04'>04-With Illness</option>
                    </select>
                    </td>

                  </tr>
                </tbody>
            </table>
        
        </div>
      </div>
      <center>
        <div class="buttons">
          <button type="button" onclick="location.replace('ui-card.php')" class="btn btn-default">Return</button>
          <button type="submit" name="Update" value="<?php echo $theID; ?>" class="btn btn-primary">Update</button>
        </div>
        </center>
          </form> 
</div>
<?php
  }
  elseif(isset($_POST['Delete'])){
    $PostID = $_POST['Delete'];
?>
<div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-12">
                <center>
                <h2>Delete <b>Family Member?</b></h2>
                </center>
              </div>
            </div>
          </div>
          <style type="text/css">
            td {
              text-align: center;
            }
            .truncate-text {
              max-width: 120px; /* Set the maximum width of the cell */
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis; /* Display an ellipsis (...) to indicate truncated text */
            }
          </style>
          <form method="post" action="ui-card-memberaction-finalize.php">
          <table id="familytable" class="table table-bordered" style="margin-left: 0px;">
              <thead>
                <tr>

                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Member Name</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Head Relation</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Age</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Gender</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Civil Status</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Educational Level</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Occupational Skills</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Remarks</th>
                  <th style="text-align: center; vertical-align: middle; background-color: #435d7d; color: white;">Casualty</th>

                </tr>
              </thead> 
                <tbody>
                  <tr>
                  <?php
                  $sql = "SELECT * FROM `family_members` WHERE `member_ID` = $PostID;";

                  $result = $conn->query($sql);

                  if(!$result){
                      die("Invalid query: " . $connection
                        ->error);
                  }
                  $cellindex = 0;
                  while ($row = $result->fetch_assoc()) {
                    $theID = $row["member_ID"];
                    
                    
                    

                    if ($row["Occupational_Skills"] == '') {
                      $CheckOcc = 'N/A';
                    }
                    else{
                      $CheckOcc = $row["Occupational_Skills"];
                    }

                    if ($row["Remarks"] == '') {
                      $CheckRem = 'N/A';
                    }
                    else{
                      $CheckRem = $row["Remarks"];
                    }

                    if ($row["Casualty"] == '') {
                      $CheckCas = 'N/A';
                    }
                    else{
                      $CheckCas = $row["Casualty"];
                    }


                  echo "
                    <td style='vertical-align: middle;'>" . $row["Member_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Head_Relation"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Age"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Civil_Status"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Educational_Level"] . "</td>
                    <td style='vertical-align: middle;'>" . $CheckOcc . "</td>
                    <td style='vertical-align: middle;'>" . $CheckRem . "</td>
                    <td style='vertical-align: middle;'>" . $CheckCas . "</td>
                    ";
                }
                ?>
                  </tr>
                </tbody>
            </table>
        
        </div>
      </div>
      <center>
        <div class="buttons">
          <button type="button" onclick="location.replace('ui-card.php')" class="btn btn-default">Return</button>
          <button type="submit" name="Delete" value="<?php echo $theID; ?>" class="btn btn-danger">Delete</button>
        </div>
        </center>
          </form>
</div>

<?php
  }
  else{
  echo "<script>
  window.alert('Something Went Wrong Edit/Delete');
  window.location.replace('ui-card.php');
  </script>";
  }
}
else{
  echo "<script>
  window.alert('Something Went Wrong POST');
  window.location.replace('ui-card.php');
</script>";
}
?>

<!-- Session Else -->
<?php
}
?>
</body>
</html>