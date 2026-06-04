<!doctype html>
<html lang="en">
<?php
session_start();
require "connection.php";

if(!isset($_SESSION['Username']) || !isset($_SESSION['Email']) || !isset($_SESSION['Password'])){
  echo '<script>
      window.alert("Please Login first");
    </script>';
    header("Location:authentication-login.php");
    exit;
}
else{
  include 'mobilechecker.php';
  $profile = $_SESSION['Username'];
  $priviledge = $_SESSION['Priviledge'];
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>System Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css"> -->
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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./index.php" aria-expanded="false">
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
            <?php
              if (isMobileDevice()) {
                echo '
                <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-alerts-alt.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">QR Code Scanner</span>
                </a>
              </li>';
            }
            else{
              ?>
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
            <?php
                }
            ?>
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
      <div style="height: 100px;"></div>
<style>
  #barFilter {
        position: fixed;
        z-index: 1000; /* Adjust z-index as needed */
    }
     .custom-select {
    position: relative;
    display: inline-block;
  }

  .custom-select::after {
    content: '\f078'; /* Unicode for the down arrow icon in Font Awesome */
    font-family: 'Font Awesome 5 Free';
    position: absolute;
    top: 50%;
    right: 10px; /* Adjust the right padding as needed */
    transform: translateY(-50%);
    pointer-events: none;
  }
</style>
<?php
if ($_SESSION['useBackup'] != false) {
  $sessioncheck = 'true';
}
else{
  $sessioncheck = 'false';
}
if ($_SESSION['switching'] == true) {
  
  echo "
  <script>
    window.alert('you are using database: ".$database_name."');
  </script>
  ";
  echo "
  <script>
    window.alert('Session is: ".$sessioncheck."');
  </script>
  ";

}
?>
<div class="row">
<div class="col-md-2" style="margin-bottom: 10px;">

                  <button id="filterbtn" class="btn btn-primary" data-toggle="collapse" data-target="#barFilter" style="width: 100%">Show Filter &#9776;</button>
                    
</div>
<div class="col-md-8">
    <div id="barFilter" class="collapse" style="width: 50%;margin-bottom: 10px;">
            <select id="barFilterYear" class="form-control custom-select">
              <?php
              $sqlgetyear = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
              $result = $conn->query($sqlgetyear);
              $dashboardyear = array();

              if(!$result){
              die("Invalid query: " . $connection->error);
              }

              while ($row = $result->fetch_assoc()) {
                $dashboardyear[] = $row["DistinctYear"];
                echo '<option value="'.$row["DistinctYear"].'">'.$row["DistinctYear"].'</option>';
              }
              ?>
            </select>
    </div>
</div>
<div class="col-md-2">
  <button class="btn btn-success btn-sm" onclick="window.location.replace('switcher.php')" style="width: 100%">DB Options</button>

</div>

<div class="col-md-6" style="padding-right: 35px; display: none;">
  <button class="btn btn-primary" data-toggle="collapse" data-target="#pieFilter">Filter &#9776;</button>
                    <div id="pieFilter" class="collapse">
                        <select id="pieFilterYear" class="form-control">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
</div>

<div class="col-md-12">
    <div class="card w-100" style="overflow-x: scroll;">
    <div class="card-body">
      <h4>Hazard Zone Residents Per Barangay</h4>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
        #chart-container {
          width: 600px;
          margin: 0px;
        }
      </style>
    <div class="row" style="margin-top: 50px; margin-bottom: 30px">
    <div class="col-md-3" style="height: 300px; overflow-y: auto;">
      <?php
      $sql = "SELECT * FROM `barangay`";
      $result = $conn->query($sql);

      if(!$result){
          die("Invalid query: " . $connection
            ->error);
                }
      while ($row = $result->fetch_assoc()) {
        echo "<span><b>".$row['Barangay_ID']."</b> - ".$row['Barangay_Name']."</span><br>";
      }
      ?>    
    </div>
    <div class="col-md-9">
        <div id="chart-container">
          <canvas id="barGraphbarangaybyresident" style="height: 300px;"></canvas>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
<div class="col-md-12">
  <div class="card overflow-hidden">
      <div class="card-body p-4" id="Elem2">
        <span>
        <h4 class="card-title mb-9 fw-semibold">Resident Categories</h4>
        </span>
        <div class="row align-items-center">
          <div class="col-12">
            <div class="d-flex justify-content-center">
              <canvas id="Resremark" style="max-height: 200px; max-width:; : 200px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>          
</div>
<div class="col-md-6">
                <div class="card overflow-hidden" style="height: 90.5%;">
                  <div class="card-body p-4" id="Elem1">
                    <span><center>
                    <h5 class="card-title mb-9 fw-semibold">Currently Evacuated Families: <span id="totalevacs">55</span></h5>
                    </center></span>
                    <div class="row align-items-center">
                      <div class="col-6">
                        <!-- <div id="legendContainer" style="position: absolute; top: 1; right: 0;"></div> -->
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #000099;"></span>
                            <span class="fs-3">Totally Damaged : <span id="totaldmg">55</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #4d4dff;"></span>
                            <span class="fs-3">Partially Damaged : <span id="partdmg">66</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #9999ff;"></span>
                            <span class="fs-3">No Damage : <span id="nodmg">44</span></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex justify-content-center">
                          
                          <canvas id="pieGraph" style="max-height: 200px; max-width: 200px;"></canvas>


                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
</div>

<div class="col-md-6 align-items-stretch">
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold"><center>Residents By Gender</center></h5>
                <div class="row align-items-center">
                  <div class="col-6">
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #000099;"></span>
                            <span class="fs-2">Male : <span id="malesres">1</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #ff0066;"></span>
                            <span class="fs-2">Female : <span id="femalesres">1</span></span>
                          </div>
                        </div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex justify-content-center">
                      <canvas id="Gendergraph" style="max-height: 200px; max-width:; : 200px"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

<div class="col-md-6 align-items-stretch">
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold"><center>Evacuation Type</center></h5>
                <div class="row align-items-center">
                  <div class="col-6">
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #000099;"></span>
                            <span class="fs-2">Inside : <span id="insideevac">1</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #6666ff;"></span>
                            <span class="fs-2">Outside : <span id="outsideevac">1</span></span>
                          </div>
                        </div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex justify-content-center">
                      <canvas id="pieGraph3" style="max-height: 200px; max-width:; : 200px"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

<div class="col-md-6">
                <div class="card overflow-hidden" style="height: 90.5%;">
                  <div class="card-body p-4" id="Elem1">
                    <span><center>
                    <h5 class="card-title mb-9 fw-semibold">Total Casualties: <span id="totalcasualties">55</span></h5>
                    </center></span>
                    <div class="row align-items-center">
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #000099;"></span>
                            <span class="fs-2">Dead : <span id="totaldead">1</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #1a1aff;"></span>
                            <span class="fs-2">Injured : <span id="totalinjured">1</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #6666ff;"></span>
                            <span class="fs-2">Missing : <span id="totalmissing">1</span></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #b3b3ff;"></span>
                            <span class="fs-2">With Illness : <span id="totalillness">1</span></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex justify-content-center">
                          
                          <canvas id="pieGraphcasualty" style="max-height: 200px; max-width: 200px;"></canvas>


                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
</div>
<div class="col-md-12">
    <div class="card w-100" style="overflow-x: scroll;">
    <div class="card-body">
      <h4>Housing Condition (Per Family)</h4>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
        #chart-container {
          width: 600px;
          margin: 0px;
        }
      </style>
    <div class="row" style="margin-top: 50px; margin-bottom: 30px">
    <div class="col-md-3" style="height: 300px; overflow-y: auto;">
      <?php
      $sql = "SELECT * FROM `evac_center`;";
      $result = $conn->query($sql);
      $yeararray = array();

      if(!$result){
      die("Invalid query: " . $connection->error);
      }

      while ($row = $result->fetch_assoc()) {
        echo "<span><b>".$row['Evac_ID']."</b> - ".$row['Evac_Center_Name']."</span><br>";
      }
      ?> 
    </div>
    <div class="col-md-9">
        <div id="chart-container">
          <canvas id="barGraph" style="height: 300px;"></canvas>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card w-100" style="overflow-x: scroll;">
    <div class="card-body">
      <h4>Evacuation Monitoring (By Barangay)</h4>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
        #chart-container {
          width: 600px;
          margin: 0px;
        }
      </style>
    <div class="row" style="margin-top: 50px; margin-bottom: 30px">
    <div class="col-md-3" style="height: 300px; overflow-y: auto;">
      <?php
      $sql = "SELECT * FROM `barangay`";
      $result = $conn->query($sql);

      if(!$result){
          die("Invalid query: " . $connection
            ->error);
                }
      while ($row = $result->fetch_assoc()) {
        echo "<span><b>".$row['Barangay_ID']."</b> - ".$row['Barangay_Name']."</span><br>";
      }
      ?>    
    </div>
    <div class="col-md-9">
        <div id="chart-container">
          <canvas id="barGraphbarangaybyevac" style="height: 300px;"></canvas>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
</div>
  


<!-- Official End -->
<div class="row">
<div class="col-md-12 align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Evacuees Monitoring (By Head Count)</h5>
                <canvas id="disasterlinegraph" width="800" height="400"></canvas>
              </div>
            </div>

  </div>
</div>

<div class="col-md-6">
    
  </div>

    </div>

    <!-- Add Bootstrap and Chart.js JS libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
  // year variables start
      const linecounter = {
      <?php
      $sqlgetyear = "SELECT DISTINCT YEAR(CURDATE()) AS DistinctYear FROM `damages` UNION SELECT DISTINCT YEAR(CURDATE()) - 1 FROM `damages` UNION SELECT DISTINCT YEAR(CURDATE()) - 2 FROM `damages` UNION SELECT DISTINCT YEAR(CURDATE()) - 3 FROM `damages`;";
      $yearcounter = 0;
      $result = $conn->query($sqlgetyear);
      $linegraph = array();

      if(!$result){
      die("Invalid query: " . $connection->error);
      }

      while ($row = $result->fetch_assoc()) {
      $linegraph[] = $row['DistinctYear'];
      $yearcheck = $row['DistinctYear'];
      }

      //Year loop start
      foreach ($linegraph as $year) {

        $linearray = array();
        echo '"'.$year.'": [';

        //Month loop start
        $months = range(1, 12);
        foreach ($months as $month){

          $sqlline = "SELECT * FROM `damages` WHERE YEAR(`Date`) = $year AND MONTH(`Date`) = $month;";
          $resultline = $conn->query($sqlline);

          if(!$resultline){
          die("Invalid query: " . $connection->error);
          }

          if ($year == date('Y')) {
            if ($month > date('n')){
              $linearray[] = 'null';
            }
            else{
              $linearray[] = mysqli_num_rows($resultline);
            }
          }
          else{
            $linearray[] = mysqli_num_rows($resultline);
          }
          

        }

        echo implode(', ', $linearray) . '],';
        echo "\n";
        $yearcounter += 1;
              
          }
      while ($yearcounter != 4){
        $yearcheck -= 1;
        echo '"'.$yearcheck.'": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],';
        echo "\n";
        $yearcounter += 1;
      }

      ?>
      };
      // Sample data (replace this with your actual data)
        var currentYear = new Date().getFullYear();
        var currentMonth = new Date().getMonth();
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Year ' + (currentYear),
                    data: linecounter[currentYear],
                    borderColor: 'rgba(241, 27, 37, 1)',  // Pigment Red
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Year ' + (currentYear - 1),
                    data: linecounter[currentYear - 1],
                    borderColor: 'rgba(29, 113, 184, 1)',  // Slightly darker blue
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Year ' + (currentYear - 2),
                    data: linecounter[currentYear - 2],
                    borderColor: 'rgba(74, 156, 222, 1)',  // Lighter blue
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Year ' + (currentYear - 3),
                    data: linecounter[currentYear - 3],
                    borderColor: 'rgba(135, 206, 250, 1)',  // Lightest blue
                    borderWidth: 2,
                    fill: false
                }


                // This is the null Application
                // {
                //     label: '2024',
                //     data: Array(currentMonth).fill(null).concat([80, 90]),
                //     borderColor: 'rgba(255, 205, 86, 1)',
                //     borderWidth: 2,
                //     fill: false
                // }
            ]
        };

      // Get the canvas element and render the chart
      var ctx = document.getElementById('disasterlinegraph').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
              scales: {
                  x: [{
                      type: 'time', // This assumes your x-axis represents time
                      time: {
                          unit: 'year', // Adjust the unit based on your preferred time range
                          displayFormats: {
                              year: 'YYYY' // Adjust the display format as needed
                          }
                      }
                  }],
                  y: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
      </script>

    <script>
      // Scripts for data
      <?php
      $sqlgetyear = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";

      ?>

        // Replace this data with your actual evacuee data for each year

        // No Damage
        // Year : [EvacCentCount]
        const nodamagedFams = {

          // Insert php function //
          <?php
          $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {

            $sqlevac = "SELECT * FROM `evac_center`";
              $resultevac = $conn->query($sqlevac);

              if(!$resultevac){
              die("Invalid query: " . $connection->error);
              }
              $nodmgarray = array();
              echo '"'.$element.'": [';


              while ($rowevac = $resultevac->fetch_assoc()) {
                $evac_ID = $rowevac["Evac_ID"];
                  $sql = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = '$evac_ID' AND `Housing_Condition` = 'No Damage' AND YEAR(`Date`) = '$element';";
                  $noresult = $conn->query($sql);
                  $nodmgarray[] = mysqli_num_rows($noresult);
              }
              echo implode(', ', $nodmgarray) . '],';
              echo "\n";
          }
          ?>
        };

        // Partially Damage
        // Year : [EvacCentCount]
        const partdamagedFams = {
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
            $result = $conn->query($sql);
            $yeararray = array();

            if(!$result){
            die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
            $yeararray[] = $row['DistinctYear'];
            }


            foreach ($yeararray as $element) {

              $sqlevac = "SELECT * FROM `evac_center`";
                $resultevac = $conn->query($sqlevac);

                if(!$resultevac){
                die("Invalid query: " . $connection->error);
                }
                $nodmgarray = array();
                echo '"'.$element.'": [';


                while ($rowevac = $resultevac->fetch_assoc()) {
                  $evac_ID = $rowevac["Evac_ID"];
                    $sql = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = '$evac_ID' AND `Housing_Condition` = 'Partially Damaged' AND YEAR(`Date`) = '$element';";
                    $noresult = $conn->query($sql);
                    $nodmgarray[] = mysqli_num_rows($noresult);
                }
                echo implode(', ', $nodmgarray) . '],';
                echo "\n";
            }
            ?>
        };

        // Totally Damage 
        // Year : [EvacCentCount]
        const totaldamagedFams = {
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
            $result = $conn->query($sql);
            $yeararray = array();

            if(!$result){
            die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
            $yeararray[] = $row['DistinctYear'];
            }


            foreach ($yeararray as $element) {

              $sqlevac = "SELECT * FROM `evac_center`";
                $resultevac = $conn->query($sqlevac);

                if(!$resultevac){
                die("Invalid query: " . $connection->error);
                }
                $nodmgarray = array();
                echo '"'.$element.'": [';


                while ($rowevac = $resultevac->fetch_assoc()) {
                  $evac_ID = $rowevac["Evac_ID"];
                    $sql = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = '$evac_ID' AND `Housing_Condition` = 'Totally Damaged' AND YEAR(`Date`) = '$element';";
                    $noresult = $conn->query($sql);
                    $nodmgarray[] = mysqli_num_rows($noresult);
                }
                echo implode(', ', $nodmgarray) . '],';
                echo "\n";
            }
            ?>
        };

        const evacuatedData = {
          <?php
          $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {
          $thearray = array();

            $sqlevac = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'Totally Damaged' AND Year(`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'Partially Damaged' AND Year(`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'No Damage' AND Year(`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);
              
              if(!$resultevac){
              die("Invalid query: " . $connection->error);
              }
              
              echo '"'.$element.'": [';

              echo implode(', ', $thearray) . '],';
              echo "\n";
          }
          ?>
        };

        const residentRemarks = {
            "2020": [1, 2, 4, 5, 6, 17],
            "2021": [8, 7, 5, 9 , 10, 9],
            "2022": [9, 11, 13, 12, 14, 22],
            "2023": [17, 13, 15, 14, 16, 5],
            "2024": [17, 20, 18, 22, 19, 21, 13],
        };

        const genders = {
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {
          $thearray = array();

              $sqlevac = "SELECT * FROM `family` INNER JOIN `damages` ON `family`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family`.`Gender` = 'Male' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $famMale = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Gender` = 'Male' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $memMale = mysqli_num_rows($resultevac);

              $thearray[] = $famMale + $memMale;


              $sqlevac = "SELECT * FROM `family` INNER JOIN `damages` ON `family`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family`.`Gender` = 'Female' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $famFemale = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Gender` = 'Female' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $memFemale = mysqli_num_rows($resultevac);

              $thearray[] = $famFemale + $memFemale;

              if(!$resultevac){
              die("Invalid query: " . $connection->error);
              }
              
              echo '"'.$element.'": [';

              echo implode(', ', $thearray) . '],';
              echo "\n";
          }
            ?>
        };

        const insideoutside = {
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {
          $thearray = array();

              $evacsql = "SELECT `family`.`Evacuation_Center` AS AssignedEvac, `damages`.`Evac_Cent_ID` AS ActID, `evac_center`.`Evac_Center_Name` AS ActualEvac FROM `family` INNER JOIN `damages` ON `damages`.`Serial_No.` = `family`.`Serial_No.` INNER JOIN `evac_center` ON `evac_center`.`Evac_ID` = `damages`.`Evac_Cent_ID` WHERE Year(`damages`.`Date`) = $element AND `family`.`Evacuation_Center` COLLATE utf8mb4_general_ci = `evac_center`.`Evac_Center_Name` COLLATE utf8mb4_general_ci;";
              $evares = $conn->query($evacsql);

              $inside = mysqli_num_rows($evares); // Same Column Row Count

              $evacsql = "SELECT `family`.`Evacuation_Center` AS AssignedEvac, `damages`.`Evac_Cent_ID` AS ActID, `evac_center`.`Evac_Center_Name` AS ActualEvac FROM `family` INNER JOIN `damages` ON `damages`.`Serial_No.` = `family`.`Serial_No.` INNER JOIN `evac_center` ON `evac_center`.`Evac_ID` = `damages`.`Evac_Cent_ID` WHERE Year(`damages`.`Date`) = $element AND `family`.`Evacuation_Center` COLLATE utf8mb4_general_ci <> `evac_center`.`Evac_Center_Name` COLLATE utf8mb4_general_ci;";
              $evares = $conn->query($evacsql);
              $outside =  mysqli_num_rows($evares); // Different Column Row Count

              $thearray[] = $inside;
              $thearray[] = $outside;


              if(!$evares){
              die("Invalid query: " . $conn->error);
              }
              
              echo '"'.$element.'": [';

              echo implode(', ', $thearray) . '],';
              echo "\n";
          }
            ?>
        };

        const evacueeresident = { // Resident Monitoring
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
            $result = $conn->query($sql);
            $yeararray = array();

            if(!$result){
            die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
            $yeararray[] = $row['DistinctYear'];
            }


            foreach ($yeararray as $element) {
                $thearray = array();

                $evacsql = "SELECT * FROM `evac_center`;";
                $evares = $conn->query($evacsql);
                
                  while ($rowevac = $evares->fetch_assoc()) {
                    $indexer = $rowevac["Evac_ID"];
                    $anothersql = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.`= `damages`.`Serial_No.` WHERE `damages`.`Evac_Cent_ID` = '$indexer' AND Year(`damages`.`Date`) = '$element';";
                    $res = $conn->query($anothersql);

                    $anothersql2 = "SELECT * FROM `family` INNER JOIN `damages` ON `family`.`Serial_No.` = `damages`.`Serial_No.` WHERE `damages`.`Evac_Cent_ID` = '$indexer' AND Year(`damages`.`Date`) = '$element';";
                    $res2 = $conn->query($anothersql2);

                    $thearray[] = mysqli_num_rows($res) + mysqli_num_rows($res2);
                  }

                if(!$evares){
                die("Invalid query: " . $conn->error);
                }
                
                echo '"'.$element.'": [';

                echo implode(', ', $thearray) . '],';
                echo "\n";
                
            }
            ?>
        };

        const evacueecasualty = { // Evacuee Casualties 
          // Col: [Dead, Injured, Missing, With Illness]
            <?php
            $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {
          $thearray = array();

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Casualty` LIKE '%01%' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Casualty` LIKE '%02%' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Casualty` LIKE '%03%' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);

              $sqlevac = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family_members`.`Casualty` LIKE '%04%' AND Year(`damages`.`Date`) = '$element';";
              $resultevac = $conn->query($sqlevac);
              $thearray[] = mysqli_num_rows($resultevac);


              if(!$resultevac){
              die("Invalid query: " . $connection->error);
              }
              
              echo '"'.$element.'": [';

              echo implode(', ', $thearray) . '],';
              echo "\n";
          }
            ?>
        };

        const barangayevacs = { // Evacuee Casualties 
          <?php
          $sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
          $result = $conn->query($sql);
          $yeararray = array();

          if(!$result){
          die("Invalid query: " . $connection->error);
          }

          while ($row = $result->fetch_assoc()) {
          $yeararray[] = $row['DistinctYear'];
          }


          foreach ($yeararray as $element) {

            $sqlevac = "SELECT * FROM `barangay`";
              $resultevac = $conn->query($sqlevac);

              if(!$resultevac){
              die("Invalid query: " . $connection->error);
              }
              $thearray = array();
              echo '"'.$element.'": [';


              while ($rowevac = $resultevac->fetch_assoc()) {
                $ID = $rowevac["Barangay_ID"];
                  $sql = "SELECT * FROM `family` INNER JOIN `damages` ON `family`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family`.`Barangay_ID` = '$ID' AND YEAR(`damages`.`Date`) = '$element';";
                  $noresult = $conn->query($sql);
                  $famcount = mysqli_num_rows($noresult);

                  $sql = "SELECT `family`.`Barangay_ID`, `family_members`.`Member_Name`, `damages`.`Date` FROM `barangay` INNER JOIN `family` ON `family`.`Barangay_ID` = `barangay`.`Barangay_ID` INNER JOIN `family_members` ON `family_members`.`Serial_No.` = `family`.`Serial_No.` INNER JOIN `damages` ON `family_members`.`Serial_No.` = `damages`.`Serial_No.` WHERE `family`.`Barangay_ID` = '$ID' AND YEAR(`damages`.`Date`) = '$element';";
                  $noresult = $conn->query($sql);
                  $memcount = mysqli_num_rows($noresult);

                  $thearray[] = $memcount + $famcount;
              }
              echo implode(', ', $thearray) . '],';
              echo "\n";
          }

          ?>
        };

        // Initialize Bar Graph
        const barCtx = document.getElementById("barGraph").getContext("2d");
        const barGraph = new Chart(barCtx, {
            type: "bar",
            data: {
              <?php

              $thearray = array();

              $sql = "SELECT * FROM `evac_center`;";
              $result = $conn->query($sql);

              if(!$result){
              die("Invalid query: " . $connection->error);
              }

              while ($row = $result->fetch_assoc()) {
              $thearray[] = $row['Evac_ID'];
              }

              echo 'labels: [';

              echo implode(', ', $thearray) . '],';
              echo "\n";
              ?>
                datasets: [],
            },
        });

        const barCtx2 = document.getElementById("Resremark").getContext("2d");
        const resremark = new Chart(barCtx2, {
            type: "bar",
            data: {
                labels: ["Older Person", "Lactating", "PWD", "Pregnant Mother", "Solo Parent", "Child"],
                datasets: [],
            },
        });
        const barCtx3 = document.getElementById("barGraphbarangaybyevac").getContext("2d");
        const barGraphbarangaybyevac = new Chart(barCtx3, {
            type: "bar",
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19"],
                datasets: [],
            },
        });

        const barCtx4 = document.getElementById("barGraphbarangaybyresident").getContext("2d");
        const barGraphbarangaybyresident = new Chart(barCtx4, {
            type: "bar",
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19"],
                datasets: [],
            },
        });

        barGraphbarangaybyresident.data.datasets = [{
                label: `No. of Residents`,
                <?php
                
                $barArray = array();
                $sql = "SELECT * FROM `barangay`";
                $result = $conn->query($sql);

                if(!$result){
                die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                  $barID = $row['Barangay_ID'];
                  $sqlbar = "SELECT * FROM `family` WHERE `Barangay_ID` = '$barID';";
                  $resultbar = $conn->query($sqlbar);

                  if(!$result){
                  die("Invalid query: " . $connection->error);
                  }
                  $barArray[] = mysqli_num_rows($resultbar);
                }
                echo 'data: [' . implode(', ', $barArray) . '],';
                ?>
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1,
            }];
        barGraphbarangaybyresident.update();

        resremark.data.datasets = [{
                label: `Resident Categories`,
                <?php
                $theArray = array();
                  $count1 = "SELECT * FROM `family_members` WHERE `Remarks` LIKE '%A%';";
                  $count2 = "SELECT * FROM `family_members` WHERE `Remarks` LIKE '%B%';";
                  $count3 = "SELECT * FROM `family_members` WHERE `Remarks` LIKE '%C%';";
                  $count4 = "SELECT * FROM `family_members` WHERE `Remarks` LIKE '%D%';";
                  $count5 = "SELECT * FROM `family_members` WHERE `Remarks` LIKE '%E%';";

                  $res1 = $conn->query($count1);
                  $res2 = $conn->query($count2);
                  $res3 = $conn->query($count3);
                  $res4 = $conn->query($count4);
                  $res5 = $conn->query($count5);


                  $theArray[] = mysqli_num_rows($res1);
                  $theArray[] = mysqli_num_rows($res2);
                  $theArray[] = mysqli_num_rows($res3);
                  $theArray[] = mysqli_num_rows($res4);
                  $theArray[] = mysqli_num_rows($res5);
                  echo 'data: [' . implode(', ', $barArray) . '],';

                ?>
                backgroundColor: "#000099",
                borderColor: "#000099",
                borderWidth: 1,
            }];
            resremark.update();

        // Initialize Pie Graph
        const pieCtx = document.getElementById("pieGraph").getContext("2d");
        const pieGraph = new Chart(pieCtx, {
            type: "pie",
            data: {
                labels: ["Totally Damaged: 33", "Partially Damaged: 22", "No Damage: 55"],
                datasets: [],
            },
            options: {
              legend: {
                display: false, // Hide default legend
              },
              tooltips: {
                enabled: true // Enable tooltips
              }
            }

        });


        // Initialize Pie Graph3
        const pieCtx3 = document.getElementById("pieGraph3").getContext("2d");
        const pieGraph3 = new Chart(pieCtx3, {
            type: "pie",
            data: {
                labels: ["Inside", "Outside"],
                datasets: [],
            },
        });


        // Initialize Gendergraph
        const pieCtx5 = document.getElementById("Gendergraph").getContext("2d");
        const genderGraph = new Chart(pieCtx5, {
            type: "pie",
            data: {
                labels: ["Male", "Female"],
                datasets: [],
            },
        });

        // Initialize Pie Graph - Casualty
        const pieCtx4 = document.getElementById("pieGraphcasualty").getContext("2d");
        const pieGraphcasualty = new Chart(pieCtx4, {
            type: "pie",
            data: {
                labels: ["Dead", "Injured", "Missing", "With Illness"],
                datasets: [],
            },
        });


        function updateGraphs(year) {
          // Set Data
            const nodamageData = nodamagedFams[year];
            const partdamageData = partdamagedFams[year];
            const totaldamageData = totaldamagedFams[year];

            const EvacuatedFams = evacuatedData[year];
            const Resremarks = residentRemarks[year];
            const Resevac = insideoutside[year];
            const brgyevac = barangayevacs[year];
            const casualties = evacueecasualty[year];

            const evacueemonitor = evacueeresident[year];



            const Resgender = genders[year];
            //
            //
            // Update Bar Graph
            //
            //
            barGraph.data.datasets = [{
                label: `No Damage`,
                data: nodamageData,
                backgroundColor: "#9999ff",
                borderColor: 'rgba(0, 37, 255, 0.8)',
                borderWidth: 1,
            },
            {
                label: "Partially Damaged",
                data: partdamageData,
                backgroundColor: "#4d4dff",
                borderColor: 'rgba(0, 37, 255, 0.8)',
                borderWidth: 1,
            },
            {
                label: "Totally Damaged",
                data: totaldamageData,
                backgroundColor: "#000099",
                borderColor: 'rgba(0, 37, 255, 0.8)',
                borderWidth: 1,
            }];
            barGraph.update();

            barGraphbarangaybyevac.data.datasets = [{
                label: `No. of Residents`,
                data: brgyevac,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1,
            }];
            barGraphbarangaybyevac.update();

            //
            //
            // Update Pie Graph
            //
            //

            pieGraph.data.datasets = [{
                data: EvacuatedFams,
                backgroundColor: ["#000099", "#4d4dff", "#9999ff"],
            }];


            document.getElementById("totaldmg").innerHTML = evacuatedData[year][0];
            document.getElementById("partdmg").innerHTML = evacuatedData[year][1];
            document.getElementById("nodmg").innerHTML = evacuatedData[year][2];

            var evacs = evacuatedData[year][0] + evacuatedData[year][1] + evacuatedData[year][2];
            document.getElementById("totalevacs").innerHTML = evacs;


            document.getElementById("malesres").innerHTML = genders[year][0];
            document.getElementById("femalesres").innerHTML = genders[year][1];
            document.getElementById("insideevac").innerHTML = insideoutside[year][0];
            document.getElementById("outsideevac").innerHTML = insideoutside[year][1];

            document.getElementById("totaldead").innerHTML = casualties[0];
            document.getElementById("totalinjured").innerHTML = casualties[1];
            document.getElementById("totalmissing").innerHTML = casualties[2];
            document.getElementById("totalillness").innerHTML = casualties[3];

            var casualty = casualties[0] + casualties[1] + casualties[2] + casualties[3];
            document.getElementById("totalcasualties").innerHTML = casualty;
            
            <?php
            $evacsql = "SELECT * FROM `evac_center`;";
            $evares = $conn->query($evacsql);
            $indexer = 0;
            while ($rowevac = $evares->fetch_assoc()) {

              // echo "document.getElementById('count".$rowevac["Evac_ID"]."').innerHTML = evacueemonitor[".$indexer."];";
              // $indexer = $indexer + 1;
            }
            ?>

            pieGraph.update();


            pieGraph3.data.datasets = [{
                data: Resevac,
                backgroundColor: ["#000099", "#6666ff"],
            }];
            pieGraph3.update();

            
            pieGraphcasualty.data.datasets = [{
                data: casualties,
                backgroundColor: ["#000099", "#1a1aff", "#6666ff", "#b3b3ff"],  
            }];
            pieGraphcasualty.update();

            genderGraph.data.datasets = [{
                data: Resgender,
                backgroundColor: ["#000099", "#ff0066"],
            }];
            genderGraph.update();
        }

        // Initial data display
        <?php
        $sqlgetyear = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
        $result = $conn->query($sqlgetyear);

        $firstRow = $result->fetch_assoc();

        echo 'updateGraphs("'.$firstRow['DistinctYear'].'");';
        ?>
        

        // Event listeners for year filter
        document.getElementById("barFilterYear").addEventListener("change", (event) => {
            const selectedYear = event.target.value;
            updateGraphs(selectedYear);
        });
        
        document.getElementById("pieFilterYear").addEventListener("change", (event) => {
            const selectedYear = event.target.value;
            updateGraphs(selectedYear);
        });


      function hideLabels() {
      // Set labels to an empty array
      pieGraph.data.labels = [];
      pieGraphcasualty.data.labels = [];
      pieGraph3.data.labels = [];
      genderGraph.data.labels = [];
      // Update the chart
      pieGraph.update();
      pieGraphcasualty.update();
      pieGraph3.update();
      genderGraph.update();
    }
            setTimeout(hideLabels, 10);

    $(document).ready(function () {
        $('#filterbtn').on('click', function () {
            var button = $(this);
            if (button.text() === 'Show Filter ☰') {
                button.text('Hide Filter ☰');
            } else {
                button.text('Show Filter ☰');
            }
        });
    });
    </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
<?php 
  }
?>
</body>

</html>