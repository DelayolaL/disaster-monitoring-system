<!doctype html>
<html lang="en">
<?php
require "connection.php";
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoloader
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Border;
session_start();
date_default_timezone_set('Asia/Manila');
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
  <title>Masterlist</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./masterlist.php" aria-expanded="false">
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
  <link rel="stylesheet" href="tablestyle.css">
  <style>
  .truncate-text {
    max-width: 120px; /* Set the maximum width of the cell */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; /* Display an ellipsis (...) to indicate truncated text */
  }
  table.dataTable thead th, table.dataTable thead td {
    padding: 7.5px;
  }
</style>
</head>
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="formbold-main-wrapper">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
function formatDate($dateString) {
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F j, Y');
    $formattedDate = strtoupper($formattedDate); // Capitalize all letters
    return $formattedDate;
}

$disasterindex = $_POST['View'];
?>

<form method="post" action="accounts-edit.php">

<h3 class="center">MASTERLIST</h3>
  <div class="account-details">
    <div>
      <div class="container">
  </div>
  <table id="masterlist" class="fl-table">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;">No.</th>
        <th style="text-align: center; vertical-align: middle;">Barangay</th>
        <th style="text-align: center; vertical-align: middle;">Name of Family Head</th>
        <th style="text-align: center; vertical-align: middle;">No. of <br>Family <br>Members</th>
        <th style="text-align: center; vertical-align: middle;">Male</th>
        <th style="text-align: center; vertical-align: middle;">Female</th>
        <th style="text-align: center; vertical-align: middle;">Senior <br>Citizen</th>
        <th style="text-align: center; vertical-align: middle;">PWD</th>
        <th style="text-align: center; vertical-align: middle;">Pregnant</th>
        <th style="text-align: center; vertical-align: middle;">4ps Member <br>Yes/No</th>
        <th style="text-align: center; vertical-align: middle;">Totally/Partially <br>Damaged</th>
        <th style="text-align: center; vertical-align: middle;">Inside/Outside <br>Evacuation</th>
      </tr>
    </thead>
    <tbody id="data-table">
        <?php
        function sqlresgetter($sql, $conn)
        {
          $result = $conn->query($sql);
          return $result;
        }

          $sql = "SELECT `barangay`.`Barangay_ID`, `barangay`.`Barangay_Name` AS Barangay, `family`.`Serial_No.` AS Serial, CONCAT(`family`.`Head_firstName`, ' ', `family`.`Head_midName`, ' ', `family`.`Head_lastName`) AS NAME_OF_FAMILY_HEAD, `family`.`4Ps Beneficiary` AS 4ps_Yes_or_No, `damages`.`Housing_Condition` AS Totally_or_Partially_Damaged, 'Inside' AS Inside_or_Outside_Evacuation FROM `barangay` INNER JOIN `family` ON `family`.`Barangay_ID` = `barangay`.`Barangay_ID` INNER JOIN `damages` ON `damages`.`Serial_No.` = `family`.`Serial_No.` WHERE `damages`.`Disaster_ID` = '$disasterindex' ORDER BY `barangay`.`Barangay_ID` ASC;";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    $indexno = 0;
                    $mastercount = mysqli_num_rows($result);
$htmltable = "<table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Barangay</th>
        <th>Name of Family Head</th>
        <th>No. of <br>Family <br>Members</th>
        <th>Male</th>
        <th>Female</th>
        <th>Senior <br>Citizen</th>
        <th>PWD</th>
        <th>Pregnant</th>
        <th>4ps Member <br>Yes/No</th>
        <th>Totally/Partially <br>Damaged</th>
        <th>Inside/Outside <br>Evacuation</th>
      </tr>
    </thead>
    <tbody>";


          while ($row = $result->fetch_assoc()) {
            $indexno += 1;
            $familyserial = $row["Serial"];

            $memsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial;";

            $fammale = "SELECT * FROM `family` WHERE `Serial_No.` = '$familyserial' AND `Gender` = 'Male';";
            $famfemale = "SELECT * FROM `family` WHERE `Serial_No.` = '$familyserial' AND `Gender` = 'Female';";

            $malesql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Gender` = 'Male';";
            $femalesql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Gender` = 'Female';";

            $seniorsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Age` > 59;";
            $PWDsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$familyserial' AND `Remarks` LIKE '%C%';";
            $Pregsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$familyserial' AND `Remarks` LIKE '%D%';";

            $memres = sqlresgetter($memsql,$conn);

            $maleres = sqlresgetter($malesql,$conn);
            $fammaleres = sqlresgetter($fammale,$conn);
            $famfemaleres = sqlresgetter($famfemale,$conn);
            $femaleres = sqlresgetter($femalesql,$conn);

            $seniorres = sqlresgetter($seniorsql,$conn);
            $pwdres = sqlresgetter($PWDsql,$conn);
            $pregres = sqlresgetter($Pregsql,$conn);

            $memcount = mysqli_num_rows($memres);
            $malecount = mysqli_num_rows($maleres) + mysqli_num_rows($fammaleres);
            $femalecount = mysqli_num_rows($femaleres) + mysqli_num_rows($famfemaleres);
            $seniorcount = mysqli_num_rows($seniorres);
            $pwdcount = mysqli_num_rows($pwdres);
            $pregcount = mysqli_num_rows($pregres); 
            $evacuation = "NONE";

            $evacsql = "SELECT `family`.`Evacuation_Center` AS AssignedEvac, `damages`.`Evac_Cent_ID` AS ActID, `evac_center`.`Evac_Center_Name` As ActualEvac FROM `family` INNER JOIN `damages` ON `damages`.`Serial_No.` = `family`.`Serial_No.` INNER JOIN `evac_center` ON `evac_center`.`Evac_ID` = `damages`.`Evac_Cent_ID` where `family`.`Serial_No.` = $familyserial;";

            $evares = sqlresgetter($evacsql,$conn);

            while ($evrow = $evares->fetch_assoc()) {
                
              $AssignedEvac = $evrow["AssignedEvac"];
              $ActualEvac = $evrow["ActualEvac"];

              if ($ActualEvac == $AssignedEvac) {
                $evacuation = "INSIDE";
              }
              else{
                $evacuation = "OUTSIDE";
              }

            }

              echo "
                <tr>
                    <td style='vertical-align: middle;'>" . $indexno . "</td>
                    <td style='vertical-align: middle;'>" . $row["Barangay"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["NAME_OF_FAMILY_HEAD"] . "</td>                    
                    <td style='vertical-align: middle;'>" . $memcount . "</td>
                    <td style='vertical-align: middle;'>" . $malecount . "</td>
                    <td style='vertical-align: middle;'>" . $femalecount . "</td>
                    <td style='vertical-align: middle;'>" . $seniorcount . "</td>
                    <td style='vertical-align: middle;'>" . $pwdcount . "</td>
                    <td style='vertical-align: middle;'>" . $pregcount . "</td>
                    <td style='vertical-align: middle;'>" . $row["4ps_Yes_or_No"] . "</td>
                    <td style='vertical-align: middle;'>" . $row["Totally_or_Partially_Damaged"] . "</td>
                    <td style='vertical-align: middle;'>" . $evacuation . "</td>
                </tr>";

                $htmltable = $htmltable ."
                <tr>
                    <td>" . $indexno . "</td>
                    <td>" . $row["Barangay"] . "</td>
                    <td>" . $row["NAME_OF_FAMILY_HEAD"] . "</td>                    
                    <td>" . $memcount . "</td>
                    <td>" . $malecount . "</td>
                    <td>" . $femalecount . "</td>
                    <td>" . $seniorcount . "</td>
                    <td>" . $pwdcount . "</td>
                    <td>" . $pregcount . "</td>
                    <td>" . $row["4ps_Yes_or_No"] . "</td>
                    <td>" . $row["Totally_or_Partially_Damaged"] . "</td>
                    <td>" . $evacuation . "</td>
                </tr>";
            }
            $htmltable = $htmltable ."</tbody>
     </table>";
        ?>
    </tbody>
  </table>
</form>
        </div>
      </div>
    </div>
      <center>
        <div class="buttons">
          <button type="button" onclick="window.location.replace('masterlist.php')" class="btn btn-default">Return</button>
        <?php
        if ($mastercount == 0) {
          echo '
            <button type="button" class="btn btn-primary" disabled>Generate Masterlist</button>
          ';
        }
        else{

$existingExcelFilePath = 'masterlist.xlsx'; // Existing Excel file
$outputExcelFilePath = 'newfile.xlsx'; // Specify the new output Excel file path

function convertTableToCsv($html) {
    $dom = new DOMDocument();
    $dom->loadHTML($html);

    $table = $dom->getElementsByTagName('table')->item(0);
    $tbody = $table->getElementsByTagName('tbody')->item(0);

    $rows = [];
    foreach ($tbody->getElementsByTagName('tr') as $row) {
        $rowData = [];
        foreach ($row->getElementsByTagName('td') as $cell) {
            $rowData[] = trim($cell->nodeValue);
        }
        $rows[] = $rowData;
    }

    return [
        'rows' => $rows,
    ];
}

function insertCsvToExcel($csvArray, $templateFile = 'masterlist.xlsx', $outputFileName = 'output.xlsx', $startCell = 'A13', $conn) {
    // Load the template Excel file
    $spreadsheet = IOFactory::load($templateFile);
    $sheet = $spreadsheet->getActiveSheet();

    // Insert CSV data
    $excelData = $csvArray['rows'];
    $startRow = 13;
    foreach ($excelData as $rowIndex => $rowData) {
        foreach ($rowData as $colIndex => $cellData) {
            $sheet->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + $startRow, $cellData);
        }
    }
    $disasterindex = $_POST['View'];
    $sql = "SELECT * FROM `disaster` WHERE `Disaster_ID` = '$disasterindex' ";
    $result = $conn->query($sql);

    if(!$result){
    die("Invalid query: " . $connection->error);
    }

    while ($row = $result->fetch_assoc()) {
      $originalDate = $row["Occurred"];
      $formattedDate = formatDate($originalDate);

      $Disastername = $row["Disaster"];
    }
    $time = date('h:i A'); 

    $masterdate = 'As of '.$formattedDate.' ('.$time.')';
    $currentDate = date('Y-m-d');
    $curdate = formatDate($currentDate);
    $printdate = 'As of '.$curdate.' ('.$time.')';

    // Insert additional strings without affecting current styles
    $sheet->setCellValue('A7', $printdate);
    $sheet->mergeCells('A7:L7');

    $sheet->setCellValue('C10', strtoupper($Disastername));
    $sheet->mergeCells('C10:L10');

    $sheet->setCellValue('C11', $formattedDate);
    $sheet->mergeCells('C11:L11');

    // Apply borders to all cells
    $endColumnIndex = 12; // Assuming the data goes up to column L
    $endColumn = Coordinate::stringFromColumnIndex($endColumnIndex);
    $endRow = count($excelData) + $startRow - 1;
    $sheet->getStyle('A13:' . $endColumn . $endRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

    // Save the new Excel file
    $writer = new Xlsx($spreadsheet);
    $writer->save($outputFileName);

    return $outputFileName;
}
// Example usage:

$csvArray = convertTableToCsv($htmltable);

$sql = "SELECT * FROM `disaster` WHERE `Disaster_ID` = '$disasterindex' ";
$result = $conn->query($sql);

if(!$result){
die("Invalid query: " . $connection->error);
}

while ($row = $result->fetch_assoc()) {
  $originalDate = $row["Occurred"];
  $formattedDate = formatDate($originalDate);

  $Disastername = $row["Disaster"];
}

$masterdate = 'As of '.$formattedDate;
$fileName = $Disastername . " " . $masterdate.".xlsx";
// $fileName = 'testname.xlsx';
// Insert CSV data into a new Excel file using the masterlist.xlsx template
$downloadLink = insertCsvToExcel($csvArray, 'masterlist.xlsx', $fileName, 'A13', $conn);

          echo '
            <button type="button" onclick="window.location.href=\'' . $downloadLink . '\'" class="btn btn-primary">Generate Masterlist</button>
          ';
        }
        ?>
        </div>
      </center>
  </div>
</div>
<?php
}
else{
  // POST ELSE
  echo "<script>
            window.alert('Something Went Wrong');
            window.location.replace('masterlist.php');
          </script>";
}
?>
<script>
   $(document).ready(function () {
      $("#masterlist").dataTable({
        "lengthMenu": [10, 15, 20, 50],
        "pageLength": 10,
        "ordering": false
      });
    });
    </script>
<?php
}
?>
</body>
</html>