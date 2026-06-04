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
  $profile = $_SESSION['Username'];
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Residents</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" /> 
  <link rel="stylesheet" href="style.css">
</head>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>
<body onload="zoom()">
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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./ui-forms.php" aria-expanded="false">
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
</body>
      <div>

        <div>
          <div class="card">
            <div class="card-body" style="padding-left: 0px;">
              <div class="formbold-main-wrapper" style=" margin-top: 50px;">

<title>DAFAC FORM</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<style>
html, body {
min-height: 100%;
}
body, div, form, input, select, p { 
padding: 0;
margin: 0;
outline: none;
font-family: Roboto, Arial, sans-serif;
font-size: 14px;
color: #666;
}
h1 {
margin: 0;
font-weight: 400;
}
h3 {
margin: 12px 0;
color: #8ebf42;
}
.main-block {
display: flex;
justify-content: center;
align-items: center;
background: #fff;
}
form {
width: 100%;
padding: 20px;
}
fieldset {
border: none;
border-top: 1px solid #8ebf42;
}
.account-details, .personal-details {
display: flex;
flex-wrap: wrap;
justify-content: space-between;
}
.account-details >div, .personal-details >div >div {
display: flex;
align-items: center;
margin-bottom: 10px;
}
.account-details >div, .personal-details >div, input, label {
width: 100%;
}
label {
padding: 0 5px;
text-align: right;
vertical-align: middle;
}
input {
padding: 5px;
vertical-align: middle;
}
.checkbox {
margin-bottom: 10px;
}
select, .children, .gender, .bdate-block {
width: calc(100% + 26px);
padding: 5px 0;
}
select {
background: transparent;
}
.gender input {
width: auto;
} 
.gender label {
padding: 0 5px 0 0;
} 
.bdate-block {
display: flex;
justify-content: space-between;
}
.birthdate select.day {
width: 35px;
}
.birthdate select.mounth {
width: calc(100% - 94px);
}
.birthdate input {
width: 38px;
vertical-align: unset;
}
.checkbox input, .children input {
width: auto;
margin: -2px 10px 0 0;
}
.checkbox a {
color: #8ebf42;
}
.checkbox a:hover {
color: #82b534;
}
button {
width: 100%;
padding: 10px 0;
margin: 10px auto;
border-radius: 5px; 
border: none;
background: #8ebf42; 
font-size: 14px;
font-weight: 600;
color: #fff;
}
button:hover {
background: #82b534;
}
@media (min-width: 568px) {
.account-details >div, .personal-details >div {
width: 50%;
}
label {
width: 40%;
}
input {
width: 60%;
}
select, .children, .gender, .bdate-block {
width: calc(60% + 16px);
}
}
</style>
</head>

<body onload="zoom()">
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        
        th:last-child, td:last-child {
            border-right: none;
        }
        
        .wide-input {
            width: 100%;
        }
        
        /* Design styles */
        th {
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
        }
        
        td {
            background-color: #fff;
            text-align: center;
        }
        
        tbody tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
        
        textarea {
            border: none;
            resize: none;
            width: 100%;
            background-color: transparent;
            font-family: inherit;
            font-size: inherit;
            padding: 6px;
            box-sizing: border-box;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            /* Hide table headers */
            th {
                display: none;
            }
            
            /* Adjust table cell styles */
            td {
                display: block;
                padding: 6px;
                border: none;
                border-bottom: 1px solid #ddd;
                border-right: none;
                position: relative;
                text-align: center;
            }
            
            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 100px;
                content: attr(data-label);
                font-weight: bold;
            }
            
            /* Adjust textarea styles */
            textarea {
                height: auto;
                padding: 4px;
            }
        }
                /* Define the animation */
                @keyframes slideDown {
                  from {
                    max-height: 0;
                    opacity: 0;
                  }
                  to {
                    max-height: 100px; /* Adjust the maximum height as needed */
                    opacity: 1;
                  }
                }

                /* Apply styles to the animated element */
                #otherReligionInput {
                  overflow: hidden;
                  max-height: 0;
                  transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
                }
    </style>


<div class="main-block">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validateForm()">
<center>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serial = $_POST['serial'];
  $region = $_POST['region'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $evacsite = $_POST['evacsite'];
  $familyname = $_POST['familyname'];
  $headlast = $_POST['headlast'];
  $headfirst = $_POST['headfirst'];
  $headmidname = $_POST['headmidname'];
  $headocc = $_POST['headocc'];
  $income = $_POST['income'];
  $civstatus = $_POST['civstatus'];
  $fourPs = $_POST['4ps'];
  $ethnicity = $_POST['ethnicity'];
  $religion = $_POST['religion'];
  $gender = $_POST['gender'];
  $bdate = $_POST['bdate'];
  $ownership = $_POST['ownership'];
  
  $contactno = $_POST['contactno'];

  $fammember = $_POST['fammember'];
  $famrelation = $_POST['famrelation'];
  $famage = $_POST['famage'];
  $famgender = $_POST['famgender'];
  $famcivstatus = $_POST['famcivstatus'];
  $fameduc = $_POST['fameduc'];
  $famoccupational = $_POST['famoccupational'];
  $famcode = $_POST['famcode'];
  $indexer = 0;

  $serialcheck = "SELECT * FROM `family` WHERE `Serial_No.` = $serial;";
  $serialresult = mysqli_query($conn,$serialcheck) or die(mysqli_error($conn));

if (isset($_POST['evacbrgy'])) {
  $evacbrgy = $_POST['evacbrgy'];
  $evacbrgycheck = "SELECT * FROM `barangay` WHERE `Barangay_ID` = '$evacbrgy';";
  $evacbrgyresult = mysqli_query($conn,$evacbrgycheck) or die(mysqli_error($conn));
  while ($row = $evacbrgyresult->fetch_assoc()) {
    $Barangay = $row['Barangay_Name'];
  }
}
elseif (isset($_POST['nullbrgy'])) {
  $evacbrgy = NULL;
  $Barangay = $_POST['nullbrgy'];
}
else{
  $evacbrgy = NULL;
  $Barangay = NULL;
}
  
  $evacgetsql = "SELECT * FROM `evac_center` WHERE `Evac_ID` = $evacsite;";
  $evacgetres = mysqli_query($conn,$evacgetsql) or die(mysqli_error($conn));
  $evacsitename = "";
  while ($row = $evacgetres->fetch_assoc()) {
    $evacsitename = $row["Evac_Center_Name"];
  }


  

  if (mysqli_num_rows($serialresult) == 0){

      $familyquery = "INSERT INTO `family` (`Serial_No.`, `Barangay_ID`, `Barangay_Name`, `Family_Name`, `Head_firstName`, `Head_midName`, `Head_lastName`, `Occupation`, `Monthly_Net_Income`, `Civil Status`, `4Ps Beneficiary`, `Type of Ethnicity`, `Religion`, `Gender`, `Birthdate`, `Region`, `Province/District`, `Evacuation_Center`, `City/Municipality`, `House_Ownership`, `Contact_No.`) VALUES (NULLIF('$serial',''),NULLIF('$evacbrgy',''), '$Barangay', '$familyname', '$headfirst', NULLIF('$headmidname',''), '$headlast', NULLIF('$headocc',''), '$income', '$civstatus', '$fourPs', NULLIF('$ethnicity',''), '$religion', '$gender', '$bdate', '$region', '$province', '$evacsitename', '$city', '". addslashes($ownership) ."', '$contactno');";

      try {
        mysqli_query($conn, $familyquery);
        $counter = 0; 
        foreach ($fammember as $indexer => $fammember) {
          if ($fammember == '') {
              // Your condition to end the loop
              break;
          }
          $memquery = "INSERT INTO `family_members` (`member_ID`, `Serial_No.`, `Member_Name`, `Head_Relation`, `Age`, `Gender`, `Civil_Status`, `Educational_Level`, `Occupational_Skills`, `Remarks`) VALUES (NULL, '$serial', '$fammember', '$famrelation[$indexer]', '$famage[$indexer]', '$famgender[$indexer]', '$famcivstatus[$indexer]', '$fameduc[$indexer]', NULLIF('$famoccupational[$indexer]',''), NULLIF('$famcode[$indexer]',''));";
          mysqli_query($conn, $memquery);
          $counter = $counter + 1;
            }
        $recentact = "Added ".$familyname." Family as new Record with ".$counter." Family Members aside from Head";
        $recentsql = "INSERT INTO `recent activity` (`Act_ID`, `Activity`, `Activity_Type`, `Account_Used`) VALUES (NULL, '$recentact', 'INSERT', '$profile');";
        mysqli_query($conn, $recentsql);
        echo "<h1>DATA SUCCESSFULLY RECORDED!</h1>
        <center>
        <div class=\"wrapper\">
          <header>
            <h1>QR Code Generator</h1>
          </header>
          <div class=\"form\">
            <input type=\"text\" spellcheck=\"false\" placeholder=\"Enter text or url\" value=\"". $serial ."\" readonly>
            <button id=\"autogenerate\" type=\"button\">Generate QR Code</button>
          </div>
          <div class=\"qr-code\">
            <img src=\"\" alt=\"qr-code\">
          </div>
        </div>

        <script src=\"script.js\"></script>
        <div>
          <button type=\"button\" onclick=\"window.location.replace('ui-forms.php')\" style=\"width: 300px;\">Return</button>
        </div>
        </center>
        <script type=\"text/javascript\">
          window.onload=function(){
          document.getElementById(\"autogenerate\").click();
          window.alert('".$recentact."');
          };         
        </script>
        ";
      }
      catch (Exception $e) {
        echo "<h1>Something Went Wrong!</h1>";
        echo "<h5>". $e ."</h5>";
        echo '<div> 
                      <button type="button" onclick="window.location.replace(\'ui-forms.php\')" style="width: 300px;">Return</button>
                      </div>';
      }


  }
  else{

  echo '<h1 style="text-align: left;">DAFAC FORM</h1>
<fieldset>
<legend>
<h3 style="text-align: left;">RESIDENT INFORMATION</h3>
</legend>
<div class="account-details">


<div>
<label>Region : </label>
<div class="gender">
<label for="local" class="radio">CALABARZON</label>
<input type="radio" id="calabarzon" name=\'regionality\' onclick="checkRegion()" checked/>
<label for="non-local" class="radio">Others</label>
<input type="radio" id="otherregion" name=\'regionality\' onclick="checkRegion()"/>
</div>
</div>
<div id=\'default-region\'><label>Region<span style="color: red">*</span></label><input type="text" name="region" value="IV-A CALABARZON" readonly></div>
<div>
<label>Barangay : </label>
<div class="gender">
  <label for="brgy" class="radio">Local</label>
  <input type="radio" id="local-brgy" name=\'brgy\' onclick="checkBarangay()" checked/>
  <label for="brgy" class="radio">Non-Local</label>
  <input type="radio" id="non-locbrgy" name=\'brgy\' onclick="checkBarangay()" />
</div>
</div>

<div id="default-brgy">';
              $sqlbrgy = "SELECT * FROM `barangay`";
              $resultbrgy = $conn->query($sqlbrgy);
              $thevalue = $_POST['evacbrgy'];
              if(!$resultbrgy){
                die("Invalid query: " . $connection->error);
              }

              echo "<label>
              Barangay<span style=\"color: red\">*</span>
              </label> 
              <select name=\"evacbrgy\" required>";
              echo '<option value="">Choose One...</option>';
              while ($rowbrgy = $resultbrgy->fetch_assoc()) {
                $brgyindex = $rowbrgy['Barangay_ID'];
                if ($thevalue == $brgyindex) {
                  echo '<option value="'. $rowbrgy['Barangay_ID'] .'" selected>'. $rowbrgy['Barangay_Name'] .'</option>';
                }
                else{
                  echo '<option value="'. $rowbrgy['Barangay_ID'] .'">'. $rowbrgy['Barangay_Name'] .'</option>';
                }
                
              }
              echo "</select>'";

echo '
</div>

<div>
<label>Residence : </label>
<div class="gender">
  <label for="local" class="radio">Local</label>
  <input type="radio" id="local" id="local" name=\'locality\' onclick="checkMunicipality()" checked />
  <label for="non-local" class="radio">Non-Local</label>
  <input type="radio" id="non-local" id="non-local" name=\'locality\' onclick="checkMunicipality()" />
</div>
</div>
<div id="default-residence"><label>City/Municipality<span style="color: red">*</span></label>

    <input type="text" name="city" value="Lian" readonly>

</div>
<div><label>Serial No.<span style="color: red">This Serial Number Already Exists</span></label><input style="box-shadow: 0 0 5px rgba(255, 50, 40, 1)" id="serial" type="text" onkeypress="return onlyNumberKey(event)" name="serial" value="'.$serial.'" required></div>

<div id="default-province"><label>Province/District<span style="color: red">*</span></label><input type="text" name="province" value="Batangas" readonly></div>
<div><label>Barangay/Evacuation Center/Site<span style="color: red">*</span></label>

  <select name="evacsite" required>
    <option value="">Choose One...</option>
    ';
    $sql = "SELECT * FROM `evac_center`";
    $result = $conn->query($sql);

    if(!$result){
    die("Invalid query: " . $connection->error);
    }

    while ($row = $result->fetch_assoc()) {
      $indexevac = $row["Evac_ID"];
      if ($evacsite == $indexevac) {
        echo "<option value='" . $row["Evac_ID"] . "' selected>" . $row["Evac_Center_Name"] . "</option>";
      }
      else{
        echo "<option value='" . $row["Evac_ID"] . "'>" . $row["Evac_Center_Name"] . "</option>";
      }
    
    }
    echo '
  </select>
</div>
<div><label>Family Name<span style="color: red">*</span></label><input id="famname" type="text" name="familyname" value="'. $familyname .'" required></div>
</div>
</fieldset>
<fieldset>
<legend>
<h3 style="text-align: left;">HEAD OF THE FAMILY</h3>
</legend>
<div class="personal-details">
<div>
<div><label>SURNAME<span style="color: red">*</span></label><input id="surname" type="text" name="headlast" value="'. $headlast .'" required></div>
<div><label>FIRST NAME<span style="color: red">*</span></label><input type="text" name="headfirst" value="'. $headfirst .'" required></div>
<div><label>MIDDLE NAME</label><input type="text" name="headmidname" value="'. $headmidname .'"></div>
<div><label>Occupation<span style="color: red">*</span></label><input type="text" name="headocc" value="'. $headocc .'" required></div>
<div><label>Monthly Net Income<span style="color: red">*</span></label><input type="number" name="income" value="'. $income .'" step=".01" required></div>
<div>
<label>Civil Status<span style="color: red">*</span></label> 
<select name="civstatus" required>
<option value="">Choose One...</option>';
$Marital = array("Married", "Single", "Widow");

foreach ($Marital as $value) {
  
  if ($civstatus == $value) {
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  }
  else{
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
echo '
</select>
</div>
<div>
<label>4Ps Beneficiary<span style="color: red">*</span></label> 
<select name="4ps" required>
<option value="">Choose One...</option>';
$benefit = array("Yes", "No");

foreach ($benefit as $value) {
  
  if ($fourPs == $value) {
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  }
  else{
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
echo'
</select>
</div>

</div>


<div>
<div><label>Type of Ethnicity</label><input type="text" name="ethnicity" value="'. $ethnicity .'"></div>
<div><label>Religion<span style="color: red">*</span></label>
  <select id="religionDropdown" name="religiondropdown" onchange="toggleOtherInput()" required>
    <option value="">Choose One...</option>';
$knownreligion = array("Roman Catholic", "Born Again", "Islam", "Iglesia ni Cristo", "Other");

if (in_array($religion, $knownreligion)) {
    foreach ($knownreligion as $value) {
  
      if ($religion == $value) {
        echo '<option value="'.$value.'" selected>'.$value.'</option>';
      }
      else{
        echo '<option value="'.$value.'">'.$value.'</option>';
      }
    }
  } 
  else {
      foreach ($knownreligion as $value) {
        if ($value == "Other") {
        echo '<option value="'.$value.'" selected>'.$value.'</option>
        ';
        }
        else{
          echo '<option value="'.$value.'">'.$value.'</option>';
        }
      }
  }
echo '
  </select>
</div>
<div id="otherReligionInput" style="display: block;">
  <label>Other Religion</label>
  <input type="text"  name="religion" id="otherReligionTextbox">
</div>
';
 if (!in_array($religion, $knownreligion)) {
    echo '<script defer>
                var otherInput = document.getElementById("otherReligionInput");
                var otherTextbox = document.getElementById("otherReligionTextbox");
                otherInput.style.display = "flex";
                otherTextbox.setAttribute("required", "required");
                otherInput.style.maxHeight = "100px";
                otherInput.style.opacity = "1";
                otherTextbox.value = "'.$religion.'";
              </script>';
  }
echo'
<div>
<label>Gender<span style="color: red">*</span></label>
<div class="gender">';

if ($gender == "Male") {
  echo '<label for="male" class="radio">Male</label>
        <input type="radio" value="Male" id="male" name="gender" checked="checked" required/>';
}
else{
  echo '<label for="male" class="radio">Male</label>
        <input type="radio" value="Male" id="male" name="gender" required/>';
}
if ($gender == "Female") {
  echo '<label for="female" class="radio">Female</label>
        <input type="radio" value="Female" id="female" name="gender" checked="checked" required/>'; 
}
else{
  echo '<label for="female" class="radio">Female</label>
        <input type="radio" value="Female" id="female" name="gender" required/>'; 
}
echo '
</div>
</div>
<div class="birthdate">
<label>Birthdate<span style="color: red">*</span></label>
<input type="date" name="bdate" class="bdate-block" style="width: auto;" value="'. $bdate .'" required>
</div>
<div>
<label>House Ownership<span style="color: red">*</span></label>
<select class="mounth" style="width: auto;" name="ownership" required>
<option value="">Choose an option...</option>';
$houseown= array("House & lot owner", "Rented house & lot", "House owner & lot renter", "House owner,rent-free lot with owner's consent", "House owner,rent-free lot w/o owner's consent", "Rent-free house & lot with owner's consent", "Rent-free house & lot w/o owner's consent");

foreach ($houseown as $value) {
  
  if ($ownership == $value) {
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  }
  else{
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
echo '
</select>

</div>
<div>
  <label>Contact No.<span style="color: red">*</span></label>
  <input type="text" name="contactno"  id="contactnoInput" onkeypress="return onlyNumberKey(event)" oninput="validateContactNo(this)" maxlength="11" value="'.$contactno.'" placeholder="Contact Number" required>
</div>
</div>


<div>

</div>

</fieldset>
<fieldset>
<legend>
<!-- TABLE HERE -->

<table>
    <thead>
      <tr>
        <th style="font-size: 20px;">Family members</th>
        <th style="font-size: 20px;">Relation to Family Head</th>
        <th style="font-size: 20px;">Age</th>
        <th style="font-size: 20px;">Gender</th>
        <th style="font-size: 20px;">Civil Status</th>
        <th style="font-size: 20px;">Education</th>
        <th style="font-size: 20px;">Occupation</th>
        <th style="font-size: 20px;">Remarks</th>
        </tr>
    </thead>
    <tbody id="data-table">
 <tr>
        <td><input id="fammember" type="text" name="fammember[]" style="resize: none;width: auto;" rows="1"></td>
        <td><select style="width: auto;" name="famrelation[]">
              <option value="">Choose</option> 
              <option value="Spouse">Spouse</option>
              <option value="Common-law Partner">Common-law Partner</option>
              <option value="Child">Child</option>
              <option value="Relative">Relative</option>
              <option value="Grandparent">Grandparent</option>
              </select>
        </td>
        <td><input id="famage" type="number" name="famage[]" style="resize: none;width: 60px;" rows="1"></td>
        <td>
          <select id="famgender" style="width: auto;" name="famgender[]">
            <option value="">Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          </td>
        <td><select id="famcivstatus" style="width: auto;" name="famcivstatus[]">
              <option value="">Choose...</option>
              <option value="Married">Married</option>
              <option value="Single">Single</option>
              <option value="Widow">Widow</option>
              </select>
        </td>
        <td><select id="fameduc" style="width: auto;" name="fameduc[]">
              <option value="None">None</option>
              <option value="Elementary">Elementary</option>
              <option value="High School">High School</option>
              <option value="Senior High School">Senior High School</option>
              <option value="College">College</option>
              </select>
        </td>
        <td><input id="famoccupational" type="text" name="famoccupational[]" style="resize: none;width: auto;" rows="1"></td>
        <td>
        <select id="famcode" style="width: auto;" name="famcode[]">
              <option value="">None</option>
              <option value="A">A-Older Person</option>
              <option value="B">B-Lactating</option>
              <option value="C">C-PWD</option>
              <option value="D">D-Pregnant Mother</option>
              <option value="E">E-Solo</option>
        </select>
          </td>
  </tr>
    </tbody>
  </table>
  <center>
  <div class="buttons">
    <button style="width: 45%; font-size: 20px;" type="button" onclick="addRow1()">+</button>
    <button style="width: 45%; background-color: red; font-size: 20px;" type="button" onclick="deleteRow()">-</button>
  </div>
  </center>
</div>

</div>
  

<div style="margin-left: 0px;">

</div>

<fieldset>
<legend>
</fieldset>
<button type="submit">Submit</button>

</div> 

  </div>';
  }
  ?>
<fieldset>
</center>
<?php 
}
else{
  ?>
<h1 style="text-align: left;">DAFAC FORM</h1>
<fieldset>
<legend>
<h3 style="text-align: left;">RESIDENT INFORMATION</h3>
</legend>
<div class="account-details">


<div>
<label>Region : </label>
<div class="gender">
<label for="local" class="radio">CALABARZON</label>
<input type="radio" id="calabarzon" name='regionality' onclick="checkRegion()" checked/>
<label for="non-local" class="radio">Others</label>
<input type="radio" id="otherregion" name='regionality' onclick="checkRegion()"/>
</div>
</div>
<div id='default-region'><label>Region<span style="color: red">*</span></label><input type="text" name="region" value="IV-A CALABARZON" readonly></div>
<div>
<label>Barangay : </label>
<div class="gender">
  <label for="brgy" class="radio">Local</label>
  <input type="radio" id="local-brgy" name='brgy' onclick="checkBarangay()" checked/>
  <label for="brgy" class="radio">Non-Local</label>
  <input type="radio" id="non-locbrgy" name='brgy' onclick="checkBarangay()" />
</div>
</div>

<div id="default-brgy">
  <?php 
              $sqlbrgy = "SELECT * FROM `barangay`";
              $resultbrgy = $conn->query($sqlbrgy);

              if(!$resultbrgy){
                die("Invalid query: " . $connection->error);
              }

              echo "<label>
              Barangay<span style=\"color: red\">*</span>
              </label> 
              <select name=\"evacbrgy\" required>";
              echo '<option value="">Choose One...</option>';
              while ($rowbrgy = $resultbrgy->fetch_assoc()) {
                echo '<option value="'. $rowbrgy['Barangay_ID'] .'">'. $rowbrgy['Barangay_Name'] .'</option>';
              }
              echo "</select>'";
            ?>
</div>




<div>
<label>Residence : </label>
<div class="gender">
  <label for="local" class="radio">Local</label>
  <input type="radio" id="local" id="local" name='locality' onclick="checkMunicipality()" checked />
  <label for="non-local" class="radio">Non-Local</label>
  <input type="radio" id="non-local" id="non-local" name='locality' onclick="checkMunicipality()" />
</div>
</div>
<div id="default-residence"><label>City/Municipality<span style="color: red">*</span></label>

    <input type="text" name="city" value="Lian" readonly>

</div>
<?php

$sqlstart = "SELECT * FROM `family` ORDER BY `Date_Registered` DESC LIMIT 1;";
$result = $conn->query($sqlstart);

if(!$result){
die("Invalid query: " . $connection->error);
}

while ($row = $result->fetch_assoc()) {
  $prevserial = $row['Serial_No.'];
}
$newserial = intval($prevserial) + 1;

$sqlstart = "SELECT * FROM `family` WHERE `Serial_No.` = $newserial;";
$result = $conn->query($sqlstart);

while (mysqli_num_rows($result) > 0) {
  $sqlstart = "SELECT * FROM `family` WHERE `Serial_No.` = $newserial;";
  $result = $conn->query($sqlstart);
  $newserial = intval($newserial) + 1;
}

?>
<div><label>Serial No.<span style="color: red">*</span></label><input id="serial" type="text" onkeypress="return onlyNumberKey(event)" name="serial" value="" required></div>

<div id="default-province"><label>Province/District<span style="color: red">*</span></label><input type="text" name="province" value="Batangas" readonly></div>
<div><label>Barangay/Evacuation Center/Site<span style="color: red">*</span></label>
  <select name="evacsite" required>
    <option value="">Choose One...</option>
    <?php
    $sql = "SELECT * FROM `evac_center`";
    $result = $conn->query($sql);

    if(!$result){
    die("Invalid query: " . $connection->error);
    }

    while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["Evac_ID"] . "'>" . $row["Evac_Center_Name"] . "</option>";
    }
    ?>
  </select>
</div>
<div><label>Family Name<span style="color: red">*</span></label><input id="famname" type="text" name="familyname" required></div>
</div>
</fieldset>
<fieldset>
<legend>
<h3 style="text-align: left;">HEAD OF THE FAMILY</h3>
</legend>
<div class="personal-details">
<div>
<div><label>SURNAME<span style="color: red">*</span></label><input id="surname" type="text" name="headlast" required></div>
<div><label>FIRST NAME<span style="color: red">*</span></label><input type="text" name="headfirst" required></div>
<div><label>MIDDLE NAME</label><input type="text" name="headmidname"></div>
<div><label>Occupation<span style="color: red">*</span></label><input type="text" name="headocc" required></div>
<div><label>Monthly Net Income<span style="color: red">*</span></label><input type="number" name="income" step=".01" required></div>
<div>
<label>Civil Status<span style="color: red">*</span></label> 
<select name="civstatus" required>
<option value="">Choose One...</option>
<option value="Married">Married</option>
<option value="Single">Single</option>
<option value="Widow">Widow</option>
</select>
</div>
<div>
<label>4Ps Beneficiary<span style="color: red">*</span></label> 
<select name="4ps" required>
<option value="">Choose One...</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>

</div>


<div>
<div><label>Type of Ethnicity</label><input type="text" name="ethnicity" value=""></div>
<div><label>Religion<span style="color: red">*</span></label>
  <select id="religionDropdown" name="religiondropdown" onchange="toggleOtherInput()" required>
    <option value="">Choose One...</option>
    <option value="Roman Catholic">Roman Catholic</option>
    <option value="Born Again">Born Again</option>
    <option value="Islam">Islam (Muslim)</option>
    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
    <option value="Other">Other</option>
  </select>
</div>

<div id="otherReligionInput" style="display: block;">
  <label>Other Religion</label>
  <input type="text"  name="religion" id="otherReligionTextbox">
</div>

<div>
<label>Gender<span style="color: red">*</span></label>
<div class="gender">

<label for="male" class="radio">Male</label>
<input type="radio" value="Male" id="male" name="gender" required/>

<label for="female" class="radio">Female</label>
<input type="radio" value="Female" id="female" name="gender" required/>
</div>
</div>
<div class="birthdate">
<label>Birthdate<span style="color: red">*</span></label>
<input type="date" name="bdate" class="bdate-block" style="width: auto;" required>
</div>
<div>
<label>House Ownership<span style="color: red">*</span></label>
<select class="mounth" style="width: auto;" name="ownership" required>
<option value="">Choose an option...</option>
<option value="House & lot owner">House & lot owner</option>
<option value="Rented house & lot">Rented house & lot</option>
<option value="House owner & lot renter">House owner & lot renter</option>
<option value="House owner,rent-free lot with owner's consent">House owner,rent-free lot with owner's consent</option>
<option value="House owner,rent-free lot w/o owner's consent">House owner,rent-free lot w/o owner's consent</option>
<option value="Rent-free house & lot with owner's consent">Rent-free house & lot with owner's consent</option>
<option value="Rent-free house & lot w/o owner's consent">Rent-free house & lot w/o owner's consent</option>
</select>

</div>
<!-- Tried getting QR Here -->
<div>
  <label>Contact No.<span style="color: red">*</span></label>
  <input type="text" name="contactno"  id="contactnoInput" onkeypress="return onlyNumberKey(event)" oninput="validateContactNo(this)" maxlength="11" value="09" placeholder="Contact Number" required>

</div>
</div>
<div>
</div>

</fieldset>
<fieldset>
<legend>
<!-- TABLE HERE -->
<style>
  .info-icon {
    display: inline-block;
    width: 16px;
    height: 16px;
    background-color: #ddd; /* Adjust the background color as needed */
    border-radius: 50%;
    text-align: center;
    line-height: 16px;
    cursor: help;
    margin-left: 5px; /* Adjust the margin as needed */
    position: relative;
  }

  .info-tooltip {
    visibility: hidden;
    width: 200px;
    background-color: #333;
    color: #fff;
    text-align: left;
    border-radius: 5px;
    padding: 10px;
    position: absolute;
    z-index: 1;
    top: 100%;
    left: -150px; /* Adjust the negative value as needed */
  }

  /* Existing styles for .info-icon:hover .info-tooltip */
  .info-icon:hover .info-tooltip {
    visibility: visible;
</style>
<table>
    <thead>
      <tr>
        <th style="font-size: 15px;">Family members</th>
        <th style="font-size: 15px;">Relation to Family Head</th>
        <th style="font-size: 15px;">Age</th>
        <th style="font-size: 15px;">Gender</th>
        <th style="font-size: 15px;">Civil Status</th>
        <th style="font-size: 15px;">Education</th>
        <th style="font-size: 15px;">Occupation</th>
        <th style="font-size: 15px;">
        Remarks
          <span class="info-icon">i
            <div class="info-tooltip">
              A-Older Person<br>B-Lactating<br>C-PWD<br>D-Pregnant Mother<br>E-Solo
            </div>
          </span>
        </th>
        </tr>
    </thead>
    <tbody id="data-table">
 <tr>
        <td><input id="fammember" type="text" name="fammember[]" style="resize: none;width: auto;" rows="1" placeholder="Family Member Name"></td>
        <td><select style="width: auto;" name="famrelation[]">
              <option value="">Relation</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Common-law Partner">Common-law Partner</option>
                        <option value="Child">Child</option>
                        <option value="Relative">Relative</option>
                        <option value="Grandparent">Grandparent</option>
              </select>
        </td>
        <td><input id="famage" type="number" name="famage[]" style="resize: none;width: 60px;" rows="1" placeholder="Age"></td>
        <td>
          <select id="famgender" style="width: auto;" name="famgender[]">
            <option value="">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          </td>
        <td><select id="famcivstatus" style="width: auto;" name="famcivstatus[]">
              <option value="">Civil Status</option>
              <option value="Married">Married</option>
              <option value="Single">Single</option>
              <option value="Widow">Widow</option>
              </select>
        </td>
        <td><select id="fameduc" style="width: auto;" name="fameduc[]">
              <option value="None">Education</option>
              <option value="Elementary">Elementary</option>
              <option value="High School">High School</option>
              <option value="Senior High School">Senior High School</option>
              <option value="College">College</option>
              </select>
        </td>
        <td><input id="famoccupational" type="text" name="famoccupational[]" style="resize: none;width: auto;" rows="1" placeholder="Occupation"></td>
        <td>
        <input type="text" id="famcode" style="width: auto;" name="famcode[]" placeholder="Remarks">

        <script>
        document.getElementById('famcode').addEventListener('input', function(event) {
            // Get the entered value and convert it to uppercase
            let enteredValue = event.target.value.toUpperCase();

            // Check if the entered value contains only valid characters (A, B, C, D, or E)
            if (/^[ABCDE]*$/.test(enteredValue)) {
                // Remove duplicate letters
                let uniqueValue = [...new Set(enteredValue)].join('');

                // Update the input field with the unique value
                event.target.value = uniqueValue;
            } else {
                // Invalid input, clear the input field
                event.target.value = '';
            }
        });
        </script>
        </td>
  </tr>
    </tbody>
  </table>
  <center>
  <div class="buttons">
    <button style="width: 45%; font-size: 20px;" type="button" onclick="addRow1()">+</button>
    <button style="width: 45%; background-color: red; font-size: 20px;" type="button" onclick="deleteRow()">-</button>
  </div>
  </center>
</div>

</div>
  

<div style="margin-left: 0px;">
  
  



</div>
<center>
<button type="submit" style="width: 25%">Submit</button>
</center>
</div> 

  </div>
  <?php
}
?>
<script defer>
  document.addEventListener("DOMContentLoaded", function() {
    function toggleOtherInput() {
      var dropdown = document.getElementById('religionDropdown');
      var otherInput = document.getElementById('otherReligionInput');
      var otherTextbox = document.getElementById('otherReligionTextbox');

      if (dropdown.value === 'Other') {
        otherInput.style.display = 'flex';
        setTimeout(function() {
          otherTextbox.setAttribute('required', 'required');
          otherInput.style.maxHeight = '100px';
          otherInput.style.opacity = '1';
          otherTextbox.value = "";
        }, 10); // Delay for a short time to allow the initial display style to take effect
      } else {
        otherInput.style.maxHeight = '0';
        otherInput.style.opacity = '0';
        otherTextbox.value = document.getElementById('religionDropdown').value;
        setTimeout(function() {
          otherTextbox.removeAttribute('required');
          otherInput.style.display = 'none';
        }, 500); // Duration of the transition
      }
    }

    // Attach the function to the select element's onchange event
    document.getElementById('religionDropdown').addEventListener('change', toggleOtherInput);
  });
</script>
<script>
    // Get references to the input elements
    const famnameInput = document.getElementById('famname');
    const surnameInput = document.getElementById('surname');

    // Add input event listeners to both inputs
    famnameInput.addEventListener('input', updateSurname);
    surnameInput.addEventListener('input', updateFamname);

    // Function to update the surname input based on the famname input
    function updateSurname() {
        surnameInput.value = famnameInput.value;
    }

    // Function to update the famname input based on the surname input
    function updateFamname() {
        famnameInput.value = surnameInput.value;
    }

    document.addEventListener("DOMContentLoaded", function() {
    // Example value from your select query result
    var selectQueryResult = '<?php echo $newserial; ?>';

     // Get the current year
    var currentYear = new Date().getFullYear();

    // Get the select element
    var evacBrgySelect = document.querySelector('select[name="evacbrgy"]');

    // Get the input element
    var serialInput = document.getElementById('serial');

    // Function to update the serial input value based on the select value
    function updateSerialValue() {
        // Get the selected value from the dropdown
        var selectedValue = evacBrgySelect.value;

        // Pad the selectedValue with a leading zero if it is a single digit
        selectedValue = selectedValue.length === 1 ? '0' + selectedValue : selectedValue;

        // Get the last three digits from the select query result
        var lastThreeDigits = selectQueryResult.slice(-3);

        // Check if the last three digits are 999, reset to 1, otherwise increment
        var incrementingNumber = lastThreeDigits === '999' ? 1 : parseInt(lastThreeDigits) + 1;

        // Create an incrementing number of three digits (you can modify this logic as needed)
        var formattedNumber = ("000" + incrementingNumber).slice(-3);

        // Set the default value for the input field with the select value in between
        serialInput.value = currentYear + selectedValue + formattedNumber;
    }

    // Add event listener for the change event on the select element
    evacBrgySelect.addEventListener('change', updateSerialValue);

    // Initial update when the page loads
    updateSerialValue();
});

</script>
  <script>
  function validateContactNo(input) {
  // Remove non-numeric characters
  input.value = input.value.replace(/\D/g, '');

  // Limit to 11 characters
  if (input.value.length > 11) {
      input.value = input.value.slice(0, 11);
  }
      
  }

    function validateForm() {
      var contactnoInput = document.getElementById('contactnoInput');

      if (contactnoInput.value.length !== 11) {
        
        contactnoInput.style.boxShadow = "0 0 5px rgba(255, 50, 40, 1)";
        alert('Contact number must be 11 digits long.');
            return false; // Prevent form submission
          }

      // Continue with form submission if the validation passes
      return true;
    }

    
    function checkRegion() {
        if (document.getElementById("calabarzon").checked){
            document.getElementById("default-region").innerHTML = '<label>Region<span style="color: red">*</span></label><input type="text" name="region" value="IV-A CALABARZON" readonly>';
        } else if (document.getElementById("otherregion").checked){
            document.getElementById("default-region").innerHTML = `<label>Region<span style="color: red">*</span></label>
            <select name="region" style="box-shadow: 0 0 5px #8ebf42; padding: 5px;">
              <option value="National Capital Region">National Capital Region (NCR)</option>
              <option value="Cordillera Administrative Region">Cordillera Administrative Region (CAR)</option>
              <option value="I Ilocos Region">I Ilocos Region</option>
              <option value="II Cagayan Valley">II Cagayan Valley</option>
              <option value="III Central Luzon">III Central Luzon</option>
              <option value="IV-A CALABARZON" selected>IV-A CALABARZON</option>
              <option value="IV-B MIMAROPA">IV-B MIMAROPA</option>
              <option value="V Bicol Region">V Bicol Region</option>
              <option value="VI Western Visayas">VI Western Visayas</option>
              <option value="VII Central Visayas">VII Central Visayas</option>
              <option value="VIII Eastern Visayas">VIII Eastern Visayas</option>
              <option value="IX Zamboanga Peninsula">IX Zamboanga Peninsula</option>
              <option value="X Northern Mindanao">X Northern Mindanao</option>
              <option value="XI Davao Region">XI Davao Region</option>
              <option value="XII SOCCSKSARGEN">XII SOCCSKSARGEN</option>
              <option value="XIII Caraga">XIII Caraga</option>
              <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
          </select>
`;
        }
    }
    function checkMunicipality() {
        if (document.getElementById("local").checked){
            document.getElementById("default-residence").innerHTML = '<label>City/Municipality<span style="color: red">*</span></label><input type="text" name="city" value="Lian" readonly>';
            document.getElementById("default-province").innerHTML = '<label>Province/District<span style="color: red">*</span></label><input type="text" name="province" value="Batangas" readonly>';

        }
        else if (document.getElementById("non-local").checked){
            document.getElementById("default-residence").innerHTML = '<label>City/Municipality<span style="color: red">*</span></label><input style="box-shadow: 0 0 5px #8ebf42;" type="text" name="city" required>';
            document.getElementById("default-province").innerHTML = '<label>Province/District<span style="color: red">*</span></label><input style="box-shadow: 0 0 5px #8ebf42;" type="text" name="province" required>';
        }
    }
    function checkBarangay() {
        if (document.getElementById("local-brgy").checked){
            <?php 
              $sqlbrgy = "SELECT * FROM `barangay`";
              $resultbrgy = $conn->query($sqlbrgy);

              if(!$resultbrgy){
                die("Invalid query: " . $connection->error);
              }

              echo "document.getElementById(\"default-brgy\").innerHTML = '<label>Barangay<span style=\"color: red\">*</span></label><select name=\"evacbrgy\" required>\ ";
              echo '<option value="">Choose One...</option>\ ';
              while ($rowbrgy = $resultbrgy->fetch_assoc()) {
                echo '<option value="'. $rowbrgy['Barangay_ID'] .'">'. $rowbrgy['Barangay_Name'] .'</option> ';
              }
              echo "</select>'";
            ?>

        } else if (document.getElementById("non-locbrgy").checked){
            document.getElementById("default-brgy").innerHTML = '<label>Barangay<span style="color: red">*</span></label><input style="box-shadow: 0 0 5px #8ebf42;" type="text" name="nullbrgy" value=""  autocomplete="on">';
        }
    }
    
      function deleteRow() {
      var table = document.getElementById("data-table");
      var i = document.getElementById("data-table").rows.length - 1;
      if (i > 0) {
      document.getElementById("data-table").deleteRow(i);
      }
      }
        function onlyNumberKey(evt) {
             
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

function addRow1() {
  var scriptString = `<\/script>`;
      var table = document.getElementById("data-table");
      var i = document.getElementById("data-table").rows.length;
        var cell = table.insertRow(i)
        cell.innerHTML = '<tr>\
        <td><input id="fammember' + i + '" type="text" name="fammember[]" style="resize: none;width: auto;" rows="1" placeholder="Family Member Name"></td>\
        <td><select style="width: auto;" name="famrelation[]" required>\
              <option value="">Relation</option>\
              <option value="Spouse">Spouse</option>\
              <option value="Common-law Partner">Common-law Partner</option>\
              <option value="Child">Child</option>\
              <option value="Relative">Relative</option>\
              <option value="Grandparent">Grandparent</option>\
              </select>\
        </td>\
        <td><input id="famage' + i + '" type="number" name="famage[]" style="resize: none;width: 60px;" rows="1" placeholder="Age"></td>\
        <td>\
          <select id="famgender' + i + '" style="width: auto;" name="famgender[]" required>\
            <option value="">Gender</option>\
            <option value="Male">Male</option>\
            <option value="Female">Female</option>\
          </select>\
          </td>\
        <td><select id="famcivstatus' + i + '" style="width: auto;" name="famcivstatus[]" required>\
              <option value="">Civil Status</option>\
              <option value="Married">Married</option>\
              <option value="Single">Single</option>\
              <option value="Widow">Widow</option>\
              </select>\
        </td>\
        <td><select id="fameduc' + i + '" style="width: auto;" name="fameduc[]" required>\
              <option value="None">Education</option>\
              <option value="Elementary">Elementary</option>\
              <option value="High School">High School</option>\
              <option value="Senior High School">Senior High School</option>\
              <option value="College">College</option>\
              </select>\
        </td>\
        <td><input id="famoccupational' + i + '" type="text" name="famoccupational[]" style="resize: none;width: auto;" rows="1" placeholder="Occupation"></td>\
        <td>\
        <input type="text" id="famcode' + i + '" style="width: auto;" name="famcode[]" placeholder="remarks">\
        </td>\
  </tr>\
  <script>\
        document.getElementById("famcode' + i + '").addEventListener("input", function(event) {\
            let enteredValue = event.target.value.toUpperCase();\
            if (/^[ABCDE]*$/.test(enteredValue)) {\
                let uniqueValue = [...new Set(enteredValue)].join("");\
                event.target.value = uniqueValue;\
            } else {\
                event.target.value = "";\
            }\
        });\ ' + scriptString + '\
        ';
      }
    </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="../assets/js/sidebarmenu.js"></script> -->
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</form>
<?php
}
?>
</body>
</html>