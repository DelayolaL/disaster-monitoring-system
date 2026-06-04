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
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="recent actiivty.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Recent Activity</span>
              </a>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="evacuation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Manage Evac Centers</span>
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
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" onclick="hideme()" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Records</span>
                <span class="rotate" id="changingarrow" style="margin-right: 0px; margin-left: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                </span>
              </a>
              <span id="showthis" style="display: none;margin-left: 50px;margin-right: auto;">
              <ul class="sidebar-submenu">
                <li class="sidebar-item selected">
                  <a class="sidebar-link active" href="./ui-card.php" aria-expanded="false">
                    <span>Family</span>
                  </a>
                </li> 
                <li class="sidebar-item">
                  <a class="sidebar-link" href="damages.php" aria-expanded="false">
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="relief-records.php" aria-expanded="false">
                    <span>Relief Distribution</span>
                  </a>
                </li>
              </ul>
              </span>
              <script>
                function hideme() {
                  if (document.getElementById("showthis").style.display == "none") {
                    document.getElementById("showthis").style.display = "block";
                    document.getElementById("changingarrow").style.transform = "rotate(180deg)";
                  }
                    else{
                    document.getElementById("showthis").style.display = "none";
                    document.getElementById("changingarrow").style.transform = "rotate(0deg)";
                  }
                  
                }
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
            </li> -->
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
      <div class="container-fluid">
  <?php
    $sql = "SELECT * FROM `damages`";
    $result = $conn->query($sql);
    if(!$result){
    die("Invalid query: " . $connection->error);
    }
    $evacuated = mysqli_num_rows($result);

    $sql = "SELECT * FROM `damages`";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM `damages`";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM `damages`";
    $result = $conn->query($sql);

  ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$sql = "SELECT * FROM `evac_center`";
$result = $conn->query($sql);

if(!$result){die("Invalid query: " . $connection->error);}

$showcentID = array();
$centname = array();
$nodmgcount = array();
$ptdmgcount = array();
$tldmgcount = array();

$cellindex = 0;
while ($row = $result->fetch_assoc()) {
  $IDgetter = $row['Evac_ID'];
  $showcentID[] = $row['Evac_ID'];
  $centname[] = $row['Evac_Center_Name'];

  $evsql1 = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = $IDgetter AND `Housing_Condition` = 'No Damage';";
  $evsql2 = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = $IDgetter AND `Housing_Condition` = 'Partially Damaged';";
  $evsql3 = "SELECT * FROM `damages` WHERE `Evac_Cent_ID` = $IDgetter AND `Housing_Condition` = 'Totally Damaged';";
  $res1 = $conn->query($evsql1);
  $res2 = $conn->query($evsql2);
  $res3 = $conn->query($evsql3);

  $nodmgcount[] = mysqli_num_rows($res1);
  $ptdmgcount[] = mysqli_num_rows($res2);
  $tldmgcount[] = mysqli_num_rows($res3);
}
?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var ctx = document.getElementById('bar-chart').getContext('2d');
      var chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
            <?php

              $length = count($showcentID);

              for ($i = 0; $i < $length; $i++) {
                if ($i == 0) {
                  echo "'$showcentID[$i]'";
                }
                else{
                  echo ", '$showcentID[$i]'";
                }

              }

            ?>
          ], // Names of evac centers
          datasets: [{
            label: 'No Damage',
            data: [
              <?php

              $length = count($nodmgcount);

              for ($i = 0; $i < $length; $i++) {
                if ($i == 0) {
                  echo "'$nodmgcount[$i]'";
                }
                else{
                  echo ", '$nodmgcount[$i]'";
                }

              }

            ?>
            ], // Count of No Damage
            backgroundColor: 'rgb(102, 255, 51, 0.5)',
            borderColor: 'rgba(0, 37, 255, 0.8)',
            borderWidth: 1
          },
          {
            label: 'Partially Damaged',
            data: [
              <?php

              $length = count($ptdmgcount);

              for ($i = 0; $i < $length; $i++) {
                if ($i == 0) {
                  echo "'$ptdmgcount[$i]'";
                }
                else{
                  echo ", '$ptdmgcount[$i]'";
                }

              }

            ?>
            ], // Count of partially damaged
            backgroundColor: 'rgb(255, 204, 0, 0.5)',
            borderColor: 'rgba(0, 37, 255, 0.8)',
            borderWidth: 1
          },
          {
            label: 'Totally Damaged',
            data: [
              <?php

              $length = count($tldmgcount);

              for ($i = 0; $i < $length; $i++) {
                if ($i == 0) {
                  echo "'$tldmgcount[$i]'";
                }
                else{
                  echo ", '$tldmgcount[$i]'";
                }

              }

            ?>

            ], // Count of totally damaged
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(0, 37, 255, 0.8)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: 'Available Evacuation Centers'
              }
            },
            y: {
              display: true,
              title: {
                display: true,
                text: 'Count'
              }
            }
          }
        }
      });
  // =====================================
  // Breakup
  // =====================================
    <?php
      $piesql1 = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'No Damage';";
      $piesql2 = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'Partially Damaged';";
      $piesql3 = "SELECT * FROM `damages` WHERE `Housing_Condition` = 'Totally Damaged';";
      $pieres1 = $conn->query($piesql1);
      $pieres2 = $conn->query($piesql2);
      $pieres3 = $conn->query($piesql3);

      $nocount = mysqli_num_rows($pieres1);
      $ptcount = mysqli_num_rows($pieres2);
      $tlcount = mysqli_num_rows($pieres3);
    ?>
  var breakup = {
    color: "#adb5bd",
    series: [
      <?php
      echo "$tlcount, $ptcount, $nocount";
      ?>
      ],
    labels: ["Totally Damaged", "Partially Damaged", "No Damage"],
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: ["#ff0000", "#FFA500", "#008000"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: "dark",
      fillSeriesColor: false,
    },
  };
  <?php
      $piesql1 = "SELECT * FROM `family_members` WHERE `Remarks` = 'A';";
      $piesql2 = "SELECT * FROM `family_members` WHERE `Remarks` = 'B';";
      $piesql3 = "SELECT * FROM `family_members` WHERE `Remarks` = 'C';";
      $piesql4 = "SELECT * FROM `family_members` WHERE `Remarks` = 'D';";
      $piesql5 = "SELECT * FROM `family_members` WHERE `Remarks` = 'E';";
      
      $pieres1 = $conn->query($piesql1);
      $pieres2 = $conn->query($piesql2);
      $pieres3 = $conn->query($piesql3);
      $pieres4 = $conn->query($piesql4);
      $pieres5 = $conn->query($piesql5);

      $Acount = mysqli_num_rows($pieres1);
      $Btcount = mysqli_num_rows($pieres2);
      $Clcount = mysqli_num_rows($pieres3);
      $Dlcount = mysqli_num_rows($pieres4);
      $Elcount = mysqli_num_rows($pieres5);
    ?>
  var breakup2 = {
    color: "#adb5bd",
    series: [
      <?php
      echo "$Acount, $Btcount, $Clcount, $Dlcount, $Elcount";
      ?>
      ],
    labels: ["Older Person", "Lactating Mother", "PWD", "Pregnant Mother", "Solo Parent"],
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: ["#EF476F", "#FFD166", "#06D6A0", "#118AB2", "#073B4C"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: "dark",
      fillSeriesColor: false,
    },
  };
  <?php
      $piesql1 = "SELECT * FROM `family_members` WHERE `Casualty` = '01';";
      $piesql2 = "SELECT * FROM `family_members` WHERE `Casualty` = '02';";
      $piesql3 = "SELECT * FROM `family_members` WHERE `Casualty` = '03';";
      $piesql4 = "SELECT * FROM `family_members` WHERE `Casualty` = '04';";
      
      $pieres1 = $conn->query($piesql1);
      $pieres2 = $conn->query($piesql2);
      $pieres3 = $conn->query($piesql3);
      $pieres4 = $conn->query($piesql4);


      $onecount = mysqli_num_rows($pieres1);
      $twocount = mysqli_num_rows($pieres2);
      $threecount = mysqli_num_rows($pieres3);
      $fourcount = mysqli_num_rows($pieres4);

    ?>
  var breakup3 = {
    color: "#adb5bd",
    series: [

      <?php
      echo "$onecount, $twocount, $threecount, $fourcount";
      ?>
      ],
    labels: ["Dead", "Injured", "Missing", "With Illness"],
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: ["#9BBFE0", "#E8A09A", "#FBE29F", "#C6D68F"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
  chart.render();
  var chart2 = new ApexCharts(document.querySelector("#breakup2"), breakup2);
  chart2.render();
  var chart3 = new ApexCharts(document.querySelector("#breakup3"), breakup3);
  chart3.render();
    });
  </script>
        <!--  Row 1 -->
<div class="row">
<div>
  <button class="btn btn-primary" onclick="showfilt()">Filter &#9776;</button>
    <button class="btn btn-primary" onclick="updateGraphs()">Try &#9776;</button>
  
  <div id="pieFilter" style="display: none">
    <select id="pieFilterYear" class="form-control">
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
    </select>
  </div>
  <script>
    function showfilt() {
      if (document.getElementById('pieFilter').style.display == 'none') {
        document.getElementById('pieFilter').style.display = 'block';
      }
      else{
        document.getElementById('pieFilter').style.display = 'none';
      }
    }
  </script>
</div>
<div class="col-lg-4">
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Currently Evacuated Families</h5>
                    <div class="row align-items-center">
                      <div class="col-7">
                        <h4 class="fw-semibold mb-3"><?php echo $evacuated; ?></h4>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: red;"></span>
                            <span class="fs-2">Totally Damaged : <?php echo $tlcount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: orange;"></span>
                            <span class="fs-2">Partially Damaged : <?php echo $ptcount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: green;"></span>
                            <span class="fs-2">No Damage : <?php echo $nocount; ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                      <div class="col-1"></div>
                    </div>
                  </div>
                </div>
</div>
<div class="col-lg-4">
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Evacuees Remarks</h5>
                    <div class="row align-items-center">
                      <div class="col-7">
                        <!-- <h4 class="fw-semibold mb-3"></h4> -->
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #ef476f;"></span>
                            <span class="fs-2">Older Person : <?php echo $Acount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #ffd166;"></span>
                            <span class="fs-2">Lactating : <?php echo $Btcount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #06d6a0;"></span>
                            <span class="fs-2">PWD : <?php echo $Clcount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #118ab2;"></span>
                            <span class="fs-2">Pregnant Mother : <?php echo $Dlcount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #073b4c;"></span>
                            <span class="fs-2">Solo Parent : <?php echo $Elcount; ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup2"></div>
                        </div>
                      </div>
                      <div class="col-1"></div>
                    </div>
                  </div>
                </div>
</div>
<div class="col-lg-4">
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Evacuee Casualties</h5>
                    <div class="row align-items-center">
                      <div class="col-7">
                        <h4 class="fw-semibold mb-3"></h4>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #9BBFE0;"></span>
                            <span class="fs-2">Dead : <?php echo $onecount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #E8A09A;"></span>
                            <span class="fs-2">Injured : <?php echo $twocount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #FBE29F;"></span>
                            <span class="fs-2">Missing : <?php echo $threecount; ?></span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-2">
                            <span class="round-8 rounded-circle me-2 d-inline-block" style="background-color: #C6D68F;"></span>
                            <span class="fs-2">With Illness : <?php echo $fourcount; ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup3"></div>
                        </div>
                      </div>
                      <div class="col-1"></div>
                    </div>
                  </div>
                </div>
</div>
</div>
        <!--  Row 2 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100" style="overflow-x: scroll;">
              <div class="card-body">
  <h4>Evacuation Monitoring (By Family)</h4>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <style>
    #chart-container {
      width: 600px;
      margin: 0px;
      
    }
  </style>
<div class="row" style="margin-top: 50px; margin-bottom: 30px">
  <script>
    // window.alert('<?php echo count($showcentID);; ?>')
  </script>
      <div class="col-md-3" style="height: 300px; overflow-y: auto;">
        <?php

        $getlength = count($showcentID);
        $centindex = 0;
        while ($centindex < $getlength) {
          echo "<span><b>$showcentID[$centindex]</b> - $centname[$centindex]</span><br>";
          $centindex = $centindex + 1;
        }

        ?>
      </div>
      <div class="col-md-9">
        <div id="chart-container">
          <canvas id="bar-chart"></canvas>
        </div>
      </div>
    </div>
  
              </div>
            </div>
          </div>

        </div>
          <div class="row">
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Evacuees Monitoring (By Head Count)</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle" id="noborder">
                    <style type="text/css">
                      .table>:not(caption)>*>*{
                        padding: 16px 8px;
                      }
                      .table td, .table th {
                        padding: 0.75rem;
                        vertical-align: top;
                        border-top: none;
                    }
                    </style>
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Evacuation Center</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Address</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"><span>No. of <br>Evacuees</span></h6>
                        </th>
                        <!-- <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Budget</h6>
                        </th> -->
                      </tr>
                    </thead>
                    <tbody>
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

                      $anothersql2 = "SELECT * FROM `family` WHERE `Evac_Cent_ID` = $indexer;";
                      $res2 = $conn->query($anothersql2);

                      $evaccount = mysqli_num_rows($res) + mysqli_num_rows($res2);
                      if(!$result){
                      die("Invalid query: " . $connection->error);
                      }
                        echo "
                          <tr>
                              <td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row["Evac_ID"] . "</h6></td>
                              <td class='border-bottom-0'>
                            <h6 class='fw-semibold mb-0'>" . $row["Evac_Center_Name"] . "</h6>
                        
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>" . $row["Address"] . "</p>
                        </td>
                        <td class='border-bottom-0'>
                          <div class='d-flex align-items-center gap-2'>
                            <span>" . $evaccount . "</span>
                          </div>
                        </td>                  
                          </tr>";
                      }
                      ?>                  
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Recent Activity</h5>
                </div>

                <ul class="timeline-widget mb-0 position-relative mb-n5">
                  <?php 
                  $sql = "SELECT * FROM `recent activity` ORDER BY `Created_On` DESC LIMIT 10;";
                  $result = $conn->query($sql);

                  if(!$result){
                  die("Invalid query: " . $connection->error);
                  }
                  if (mysqli_num_rows($result) <= 0) {
                    echo 'No Recent Activity Yet';
                  }
                  else{
                    $styles = array("primary", "info", "success", "warning", "danger");


                    while ($row = $result->fetch_assoc()) {
                    $DateSpan = $row['Created_On'];
                      echo '<li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">
                    <span>'.substr($DateSpan, 0, 10).'
                      <br>
                    '.substr($DateSpan, -8).'</span>
                    </div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-'.$styles[array_rand($styles)].' flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">'.$row['Activity'].'</div>
                  </li>';
                    }
                  }
                ?>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script>

      const evacueeData = {
            "2020": [1, 2, 3],
            "2021": [8, 7, 6, 5],
            "2022": [9, 11, 10, 12],
            "2023": [13, 15, 16, 14],
            "2024": [17, 18, 20, 19],
        };

    function updateGraphs() {
            year = 2020;
            // Update Pie Graph
            const disasterData = evacueeData[year];
            breakup.series = [{
                disasterData
            }];
            chart.update();

            
        }

        // Initial data display
        updateGraphs("2020");

        // Event listeners for year filter
        document.getElementById("barFilterYear").addEventListener("change", (event) => {
            const selectedYear = event.target.value;
            updateGraphs(selectedYear);
        });
        
        document.getElementById("pieFilterYear").addEventListener("change", (event) => {
            const selectedYear = event.target.value;
            updateGraphs(selectedYear);
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