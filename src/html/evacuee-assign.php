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
if (isset($_POST['AddEvacs'])){
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DAFAC SYSTEM</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
    <span>
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="recent actiivty.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Recent Activity</span>
              </a>
            </li>
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="evacuation.php" aria-expanded="false">
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
            <li class="sidebar-item">
              <a class="sidebar-link" onclick="hideme()" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Records</span>
                <span class="rotate" id="changingarrow" style="margin-right: 0px; margin-left: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                </span>
              </a>
              <span id="showthis" style="display: none;margin-left: 50px;margin-right: auto;">
              <ul class="sidebar-submenu">
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-card.php" aria-expanded="false">
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

            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-basket"></i>
                </span>
                <span class="hide-menu">Hazard Map</span>
              </a>
            </li>
            <li class="sidebar-item">
              
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
            
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->  
    </aside>
    <!--  Sidebar End -->
    </span>
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li> -->
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    
                    </a>
                    <a href="./logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid hidethese">
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
<form method="post" action="evacuee-assign.php">
  <?php
  $evacindex = $_POST['AddEvacs'];
  $sql = "SELECT * FROM `evac_center` WHERE `Evac_ID` = $evacindex;";
  $result = $conn->query($sql);

  if(!$result){
  die("Invalid query: " . $connection->error);
  }
  while ($row = $result->fetch_assoc()) {
    echo "<h3 class='center'><span><b><i class='ti ti-home'></i></span> ".$row["Evac_Center_Name"]."</b><h3>";
  }

  ?>
    <h3 class="center">Unevacuated Families</h3>

    <span><p><i class="fa-solid fa-people-roof"></i> Assign All Family Members</p></span>
    <span><p><i class="fa-solid fa-person-shelter"></i> Assign Individually</p></span>
  <div class="account-details">
    <div>
      <input type="text" style="display: none;" name="EvacIndex" value="<?php echo $evacindex; ?>">
  <table id="familytable"  class="fl-table">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;">Action</th>
        <th style="text-align: center; vertical-align: middle;">Family Name</th>
        <th style="text-align: center; vertical-align: middle;">Family Head</th>
        <th style="text-align: center; vertical-align: middle;">Family Head Count</th>
        <th style="text-align: center; vertical-align: middle;">Assigned Evac Center</th>
      </tr>
    </thead>
    <tbody id="data-table">
        <?php
          $sql = "SELECT * FROM `family` WHERE `Evac_Cent_ID` IS NULL";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }

          if (mysqli_num_rows($result) > 0){

            while ($row = $result->fetch_assoc()) {
                echo "
                  <tr>
                      <td style='vertical-align: middle;'>
                        <button type=\"submit\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" name='AssignAll'  value=" . $row["Serial_No."] . "><i class=\"fa-solid fa-people-roof\" data-toggle=\"tooltip\" title=\"Assign All\"></i></button>
                        <button type=\"submit\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" name='AssignInd'  value=" . $row["Serial_No."] . "><i class=\"fa-solid fa-person-shelter\" data-toggle=\"tooltip\" title=\"Assign Individually\"></i></button>
                      </td>
                      <td style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                      <td style='vertical-align: middle;'>" . $row["Head_firstName"] . " " . $row["Head_lastName"] . "</td>
                      <td style='vertical-align: middle;'>" . $row["No_of_Members"] . "</td> 
                      <td style='vertical-align: middle;'>" . $row["Evacuation_Center"] . "</td>                     
                  </tr>";
            }
          echo '<script>
                          $(document).ready(function () {
                          $("#familytable").dataTable({
                          "lengthMenu": [5, 10, 15, 20, 50],
                          "pageLength": 5
                          });
                          });
              </script>
              ';
          }
          else{
            echo "
                  <tr>    
                      <td style='vertical-align: middle;' colspan='5'>No Unevacuated Families Yet</td>
                  </tr>";
          }
        ?>
        
    </tbody>
  </table>
</div>
</div>

  </form>

  
</body>

</html>

<?php
  }
  elseif (isset($_POST['AssignAll'])) {
    $famindex = $_POST['AssignAll'];
    $evacindex = $_POST['EvacIndex'];

    $sql1 = "UPDATE `family` SET `Evac_Cent_ID` = '$evacindex' WHERE `family`.`Serial_No.` = '$famindex';";
    $sql2 = "UPDATE `family_members` SET `Evac_Cent_ID` = '$evacindex' WHERE `Serial_No.` = '$famindex';";

    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
      echo "<script>
          window.alert(\"Assigned Successfully!\");
          window.location.replace(\"evacuation.php\")
        </script>
      ";
    }
    else{
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }

  }
  elseif (isset($_POST['AssignInd'])) {
    echo "Assign Individually";
  }
  else{
    header("Location:evacuation.php");
  }
}
?>