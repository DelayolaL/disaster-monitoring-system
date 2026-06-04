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
      <div class="container"  style="padding: 60px 1px 1px 1px; margin-left: 5px;">
        <div>
              <div class="formbold-main-wrapper">
<head>
    <title>Personal Information Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script>
$(document).ready(function(){
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();
  
  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").click(function(){
    if(this.checked){
      checkbox.each(function(){
        this.checked = true;                        
      });
    } else{
      checkbox.each(function(){
        this.checked = false;                        
      });
    }
  });
  checkbox.click(function(){
    if(!this.checked){
      $("#selectAll").prop("checked", false);
    }
  });
});

</script>
<link rel="stylesheet" href="tablestyle.css">
</head>

<body>
  <form id="myForm" method="post" action="ui-card-action.php">
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
  <button type="button" class="previous" onclick="window.location.replace('ui-card.php')">&laquo; Previous</button>
  </div>
  <div class="col-md">
    <center>
    <h3 style="color: black;">View Family Info</h3>
    </center>
  </div>
  <div class="col-md"></div>
  </div>

        <table class="fl-table">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Action</th>
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
                    $cardserial = '';
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
              $cardserial = $row["Serial_No."];
              echo "
                <tr>
                    <td style='vertical-align: middle;'>
                      <button type='submit' class='btn btn-primary btn-sm' data-toggle='modal' value='" . $row["Serial_No."] . "' name='Update'>
                        <i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i>
                      </button>
                      <button type='submit' class='btn btn-danger btn-sm' data-toggle='modal' value='" . $row["Serial_No."] . "' name='Delete'>
                        <i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i>
                      </button>
                    </td>
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
                    </td>";

                    // Get classnames here
                    echo "
                    <td class='upfamname' style='vertical-align: middle;'>" . $row["Family_Name"] . "</td>
                    <td class='upfirstname' style='vertical-align: middle;'>" . $row["Head_firstName"] . "</td>                    
                    <td class='upmidname' style='vertical-align: middle;'>" . $row["Head_midName"] . "</td>
                    <td class='uplastname' style='vertical-align: middle;'>" . $row["Head_lastName"] . "</td>
                    <td class='upoccu' style='vertical-align: middle;'>" . $row["Occupation"] . "</td>
                    <td class='upincome' style='vertical-align: middle;'>" . $row["Monthly_Net_Income"] . "</td>
                    <td class='upcivstat' style='vertical-align: middle;'>" . $row["Civil Status"] . "</td>
                    <td class='upfourps' style='vertical-align: middle;'>" . $row["4Ps Beneficiary"] . "</td>
                    <td class='upeth' style='vertical-align: middle;'>" . $row["Type of Ethnicity"] . "</td>
                    <td class='upreligion' style='vertical-align: middle;'>" . $row["Religion"] . "</td>
                    <td class='upseggs' style='vertical-align: middle;'>" . $row["Gender"] . "</td>
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
              <th style="text-align: center; vertical-align: middle;">Barangay</th>

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
                  <td style='vertical-align: middle;'>" . $row["Barangay_Name"] . "</td>
                ";
              }
            ?>
            </tr>
          </tbody>
        </table>
        </form>
        <input style="display: none;" id="Action" type="text" name="Action" value="" placeholder="Query Action" readonly>
        <input style="display: none;" id="Serial" type="text" name="Serial" value="" placeholder="Index" readonly>
        
        <center>
        <h3 class="center">Family Members</h3>
        </center>
        <form id="myForm" method="post" action="ui-card-memberaction.php">
        <table class="fl-table">
          <thead>
            <tr>
              <th style="text-align: center; vertical-align: middle;">Action</th>
              <th style="text-align: center; vertical-align: middle;">Name</th>
              <th style="text-align: center; vertical-align: middle;">Head Relation</th>
              <th style="text-align: center; vertical-align: middle;">Age</th>
              <th style="text-align: center; vertical-align: middle;">Gender</th>
              <th style="text-align: center; vertical-align: middle;">Civil Status</th>
              <th style="text-align: center; vertical-align: middle;">Educational Level</th>
              <th style="text-align: center; vertical-align: middle;">Occupational Skills</th>
              <th style="text-align: center; vertical-align: middle;">Remarks</th>
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
                echo "
                <tr>
                    <td style='vertical-align: middle;'>
                      <button value='" . $row["member_ID"] . "'  name=\"Edit\" type=\"submit\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></button>
                      <button value='" . $row["member_ID"] . "'  title=\"Delete\" type=\"submit\" class=\"btn btn-danger btn-sm\" name=\"Delete\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\">&#xE872;</i></button>
                    </td>
                  <td style='vertical-align: middle;'>" . $row["Member_Name"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Head_Relation"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Age"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Gender"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Civil_Status"] . "</td>
                  <td style='vertical-align: middle;'>" . $row["Educational_Level"] . "</td>
                  ";
                  if (is_null($row["Occupational_Skills"])){
                    echo "<td style='vertical-align: middle;'>NULL</td>";
                  }
                  else{
                    echo "<td style='vertical-align: middle;'>" . $row["Occupational_Skills"] . "</td>";
                  }
                  echo "
                  <td style='vertical-align: middle;'>" . $row["Remarks"] . "</td>
                </tr>
                ";
              }
            ?>
            
          </tbody>
        </table>
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

</div>
<div class="row">
          <div class="col-md">
              <form id="myForm" method="post" action="DAFAC_Card/dafaccard-damaged.php" target="_blank">
            
              <button style="float: right;" type="submit" class="btn btn-primary btn-sm" value="<?php echo $cardserial ?>" name="cardindex">Show Profile</button>
            
              </form>
          </div>
          <div class="col-md float-start">
              <form id="myForm" method="post" action="DAFAC_Card_back/dafaccardback.php" target="_blank">
            
              <button style="float: left;" type="submit" class="btn btn-primary btn-sm" value="<?php echo $cardserial ?>" name="cardindex">Show Back</button>
            
              </form>
          </div>
</div>
  <br>
</body>


<script>
  // Declare variables in a higher scope
var originalChairmanContent, originalContactNoContent;

// Variable to store the currently edited row
var currentlyEditedRow = null;

// Function to restore the original content of the edited row
function restoreOriginalContent() {
  if (currentlyEditedRow) {
    var chairmanCell = currentlyEditedRow.find('.chairman-cell');
    var contactNoCell = currentlyEditedRow.find('.contact-no-cell');

    // Retrieve the original content and replace the input fields
    chairmanCell.html(originalChairmanContent);
    contactNoCell.html(originalContactNoContent);

    // Change the button class and icon back to "Edit"
    currentlyEditedRow.find('.edit-btn').removeClass('btn-danger').addClass('btn-primary');
    currentlyEditedRow.find('.edit-btn i').text('');
    // Remove the "Check" button
    currentlyEditedRow.find('.check-btn').remove();

    // Reset the currently edited row
    currentlyEditedRow = null;
  }
}


// Event delegation for edit action
$('#data-table').on('click', '.btn-primary', function () {

   // If there's an ongoing edit, restore its original content first
  restoreOriginalContent();

  // Save the currently edited row
  currentlyEditedRow = $(this).closest('tr');
  
  // Save the original innerHTML before turning into input
  var chairmanCell = $(this).closest('tr').find('.chairman-cell');
  var contactNoCell = $(this).closest('tr').find('.contact-no-cell');

  originalChairmanContent = chairmanCell.html();
  originalContactNoContent = contactNoCell.html();

  // Create input fields with current values
    var chairmanInput = $('<input type="text" name="upCap" class="form-control" value="' + chairmanCell.text() + '">');
    var contactNoInput = $('<input type="text" name="upNo" class="form-control" value="' + contactNoCell.text() + '" oninput="validateContactNo(this)">');

    // Replace cell content with input fields
    chairmanCell.html(chairmanInput);
    contactNoCell.html(contactNoInput);

  // Change button class and icon to cancel
  $(this).removeClass('btn-primary').addClass('btn-danger');
  $(this).find('i').text('close');

  // Append a "Check" button with a check icon
var editButtonValue = $(this).val();
var checkButton = $('<button>', {
  type: 'button',
  class: 'btn btn-success btn-sm check-btn',
  value: editButtonValue,
  html: '<i class="material-icons">check</i>', // Assuming 'check' is the check icon for Material Icons
  click: function () {
    // Get the input values
    var upCapValue = document.getElementsByName('upCap')[0].value;
    var upNoValue = document.getElementsByName('upNo')[0].value;

    // Get the value of the button (theID)
    var theIDValue = editButtonValue; // Use the value of the "Edit" button

    // Create a FormData object to send the values as a form
    var formData = new FormData();
    formData.append('upCap', upCapValue);
    formData.append('upNo', upNoValue);
    formData.append('Update', theIDValue);  // Include theID in the FormData

    // Use the fetch API to send a POST request
    fetch('barangay-edit-action-test.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())  // Assuming the response is in JSON format
    .then(data => {
      // Handle the response data, e.g., show a success message
      console.log(data);

      // Assuming 'data' contains the updated values from the server response
      var updatedRowId = data.updatedData.brgyID;
      var updatedChairman = data.updatedData.Chair;
      var updatedContactNo = data.updatedData.Contno;

      // Update the corresponding <td> elements in the specific row
      var chairmanCell = document.querySelector('[data-row-id="' + updatedRowId + '"] .chairman-cell');
      var contactNoCell = document.querySelector('[data-row-id="' + updatedRowId + '"] .contact-no-cell');

      chairmanCell.innerText = updatedChairman;
      contactNoCell.innerText = updatedContactNo;

      // Restore the "Edit" button
      var rowId = $(this).val();
      restoreEditButton(rowId);
    })
    .catch(error => {
      // Handle errors
      console.error('Error:', error);
    });

    // Change button class and icon back to edit
    function restoreEditButton(rowId) {
      // Restore the "Edit" button
      var editButton = $('<button>', {
        type: 'button',
        class: 'btn btn-primary btn-sm edit-btn',
        value: rowId,
        html: '<i class="material-icons">&#xE254;</i>', // Assuming '&#xE254;' is the edit icon for Material Icons
        click: function () {
          // Your existing code for handling the "Edit" button click
        }
      });

      // Replace the "Check" button with the restored "Edit" button
      $('[data-row-id="' + rowId + '"] .edit-btn-container').html(editButton);
    }

  }
});

  // Insert the "Check" button after the "Cancel" button
  $(this).after(checkButton); 
});

// Event delegation for cancel action
$('#data-table').on('click', '.btn-danger', function () {
  var chairmanCell = $(this).closest('tr').find('.chairman-cell');
  var contactNoCell = $(this).closest('tr').find('.contact-no-cell');

  // Retrieve the original content and replace the input fields
  chairmanCell.html(originalChairmanContent);
  contactNoCell.html(originalContactNoContent);

  // Change button class and icon back to edit
  $(this).removeClass('btn-danger').addClass('btn-primary');
  $(this).find('i').text('');
  // Remove the "Check" button
  $(this).closest('tr').find('.btn-success').remove();


});

</script>


<?php
}
?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the selected sidebar item
    var selectedItem = document.querySelector('.sidebar-item.selected');

    // Scroll to the selected item if found
    if (selectedItem) {
      selectedItem.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
      });
    }
  });
</script>
</html>
