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
  $profile = $_SESSION['Username'];
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (isset($_POST['addevac'])) {
    echo '
      <title>Evacuation Centers</title>
    ';
  }
  elseif (isset($_POST['disaster-add'])) {
    echo '
      <title>Disaster Management</title>
    ';
  }
  else{
    echo "<title>Evacuation Centers</title>";
  }
  ?>
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
            </li>';

            if (isset($_POST['barangay'])) {
              echo '
                <li class="sidebar-item selected">
                <a class="sidebar-link active" href="./barangay.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-basket"></i>
                  </span>
                  <span class="hide-menu">Barangay Records</span>
                </a>
              </li>';
            }
            else{
              echo '
                <li class="sidebar-item">
                <a class="sidebar-link" href="./barangay.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-basket"></i>
                  </span>
                  <span class="hide-menu">Barangay Records</span>
                </a>
              </li>';
            }
            
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
            <?php
            if (isset($_POST['addevac'])) {
              echo '
                <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="evacuation.php" aria-expanded="false">
              ';
            }
            else{
              echo '
                <li class="sidebar-item">
                  <a class="sidebar-link" href="evacuation.php" aria-expanded="false">
              ';
            }
            ?>
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Manage Evac Centers</span>
              </a>
            </li>
            <?php
            if (isset($_POST['disaster-add'])) {
              echo '
                <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="evacuation.php" aria-expanded="false">
              ';
            }
            else{
              echo '
                <li class="sidebar-item">
                  <a class="sidebar-link" href="evacuation.php" aria-expanded="false">
              ';
            }
            ?>
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
<head>
    <!-- <link rel="stylesheet" href="evacmodal.css"> -->
    <link rel="stylesheet" href="evaccent.css">
    <!-- <script defer src="evac.js"></script> -->
</head>
<div style="height: 100px;"></div>
      <div class="container hidethese" id="hidethese" style="opacity: 0; z-index: 1; pointer-events: none">
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
  <title>FAMILY ASSISTANCE RECORD</title>
  <style>
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
  <link rel="stylesheet" href="tablestyle.css">
</head>
<body>

<h3 class="center">Evacuation Centers</h3>
  <div class="account-details">
    <div>
      
  <table id="familytable"  class="fl-table">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;">Action</th>
        <th style="text-align: center; vertical-align: middle;">ID</th>
        <th style="text-align: center; vertical-align: middle;">Evacuation Center</th>
        <th style="text-align: center; vertical-align: middle;">Address</th>
        <th style="text-align: center; vertical-align: middle;">Evacuees</th>
      </tr>
    </thead>
    <tbody id="data-table">

        <?php
          $sql = "SELECT * FROM `evac_center`";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
          while ($row = $result->fetch_assoc()) {
              $indexer = $row["Evac_ID"];
              $anothersql = "SELECT * FROM `family_members` WHERE `Evac_Cent_ID` = $indexer;";
              $res = $conn->query($anothersql);
              $evaccount = mysqli_num_rows($res);
              if(!$result){
              die("Invalid query: " . $connection->error);
              }
              echo "
                <tr>
                    <td style='vertical-align: middle;'>
                      <button type=\"submit\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" name='Update'  value='" . $row["Evac_ID"] . "'><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></button>
                      <button type=\"submit\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" name='Delete'  value='" . $row["Evac_ID"] . "'><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></button>
                      <button type=\"submit\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" name='View'  value='" . $row["Evac_ID"] . "'><i class='material-icons'>remove_red_eye</i></button>
                    </td>
                    <td style='vertical-align: middle;'>" . $row["Evac_ID"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Evac_Center_Name"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Address"] . "</td> 
                    <td style='vertical-align: middle;'>" . $evaccount . "</td>               
                </tr>";
            }
        ?>
        
    </tbody>
  </table>
</div>
</div>
  
  <center>
  <button class="colored-button btnOpen" type="button" onclick="showadder()" >Add</button>
  </center>
  
  </div>
</div>
  

  
</body>

</html>
  </div>
  </div>
  </div>

  <script>
      $(document).ready(function () {
      $("#familytable").dataTable({
        "lengthMenu": [5, 10, 15, 20, 50],
        "pageLength": 5
      });
    });
      function dothis(serial, thefamily) {
        window.alert('You Selected ' + thefamily + ' Family');
        document.getElementById('serialindex').value = serial;
      }
    </script>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ){
  if (isset($_POST['addevac'])) {
   
?>
<form method="post" action="evacuation-action.php">
<div id="modalbody" style="opacity: 1; z-index: 1000;">
    <div class="popup">
    <div class="close-btn" onclick="window.location.replace('evacuation.php')">&times;</div>
    <div class="form">
    <h2>Add Evacuation Center</h2>
    <div class="form-element">
    <input id="Evacname" type="text" name="Evacname" placeholder="Evacuation Center" required>
    </div>
    <div class="form-element">
    <input id="Address" type="text" name="Evacaddress" placeholder="Address" required>
    </div>
    <div class="form-element">
      <button type="submit" name="Add">Save</button>
    </div>
    </div>
    </div>
  </div>
  </form>
<?php
 
  }
  elseif (isset($_POST['disaster-add'])) {
?>
<form method="post" action="disaster-add.php">
<div id="modalbody" style="opacity: 1; z-index: 1000;">
    <div class="popup">
    <div class="close-btn" onclick="window.location.replace('disaster.php')">&times;</div>
    <div class="form">
    <h2>Add Disaster</h2>
    <div class="form-element">
    <input id="Evacname" type="text" name="disaster" placeholder="Disaster" required>
    </div>
    <div class="form-element">
    <input id="Address" type="date" name="occurred" placeholder="Occurred" required>
    </div>
    <div class="form-element">
      <button type="submit" name="Add">Save</button>
    </div>
    </div>
    </div>
  </div>
  </form>

<?php
  }
  elseif (isset($_POST['barangay'])) {
?>
<form method="post" action="brgy-add.php">
<div id="modalbody" style="opacity: 1; z-index: 1000;">
    <div class="popup">
    <div class="close-btn" onclick="window.location.replace('barangay.php')">&times;</div>
    <div class="form">
    <h2>Add Barangay</h2>
    <div class="form-element">
    <input id="Evacname" type="text" name="barangay" placeholder="Barangay" required>
    </div>
    <div class="form-element">
    <input id="Address" type="text" name="chair" placeholder="Chairperson" required>
    </div>
    <div class="form-element">
    <input id="Address" type="text" name="kontak" placeholder="Contact No." required>
    </div>
    <div class="form-element">
      <button type="submit" name="Add">Save</button>
    </div>
    </div>
    </div>
  </div>
  </form>

<?php
  }
  else{
    echo "<script>
            window.alert('Something Went Wrong');
            window.location.replace('index.php');
          </script>";
  }
}
}
?>

</body>
</html>

