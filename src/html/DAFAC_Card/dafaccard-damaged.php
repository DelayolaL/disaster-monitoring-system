<!doctype html>
<html lang="en">

<?php
require "../connection.php";
session_start();
if(!isset($_SESSION['Username']) || !isset($_SESSION['Email']) || !isset($_SESSION['Password'])){
  echo '<script>
      window.alert("Please Login first");
    </script>';
    header("Location:authentication-login.php");
    exit;
}
// elseif (isset($_POST['cardindex'])) {
  
// }
else{
  $Serial = $_POST['cardindex'];
  $sql = "SELECT * FROM `family` WHERE `Serial_No.` = '$Serial'";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }

    if (mysqli_num_rows($result) == 0){
      echo "<script>
  window.alert('No record of this family in the current database')
  history.replaceState(null, null, document.referrer);
</script>";
    }

    while ($row = $result->fetch_assoc()) {
      $Region = $row["Region"];
      $Province = $row["Province/District"];
      $City = $row["City/Municipality"];
      $Evacenter = $row["Evacuation_Center"];
      $Surname = $row["Head_lastName"];
      $Firstname = $row["Head_firstName"];
      $Midname = $row["Head_midName"];
      $bdate = $row["Birthdate"];

      $date1 = new DateTime($bdate); // Age Calculation
      $date2 = new DateTime('now'); // Age Calculation
      $interval = $date1->diff($date2); // Age Calculation

      $Age = $interval->y;
      $Gender = $row["Gender"];
      $CivStat = $row["Civil Status"];
      $Religion = $row["Religion"];
      $Occupation = $row["Occupation"];
      $CI = $row["Monthly_Net_Income"];
      $fourPs = $row["4Ps Beneficiary"];
      $Ethnic = $row['Type of Ethnicity'];
      $HouseOwn = $row["House_Ownership"];
      $brgy = $row["Barangay_ID"];

      if ($row["Head_midName"] === null) {
        $Sigoverprintname = $Firstname . " " . $Surname;
      }
      else{
        $Sigoverprintname = $Firstname . " " . $Midname[0].". " . $Surname;
      }
      
      $DateReg = $row['Date_Registered'];
    }

    
    if ($brgy === null) {
      $brgy = '';
    }
    else{
    $sql = "SELECT * FROM `barangay` WHERE `Barangay_ID` = '$brgy';";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }

    while ($row = $result->fetch_assoc()) {
      $brgy = $row['Barangay_Chairman'];
    }
}



    $sql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial'";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }

    $fammember = array();
    $relfamhead = array();
    $memAge = array();
    $memGender = array();
    $memcivstat = array();
    $Educ = array();
    $MemOcc = array();
    $Remarks = array();
    $Casualty = array();
    
    while ($row = $result->fetch_assoc()) {
      $fammember[] = $row["Member_Name"];
      $relfamhead[] = $row["Head_Relation"];
      $memAge[] =  $row["Age"];
      $memGender[] = $row["Gender"];
      $memcivstat[] = $row["Civil_Status"];
      $Educ[] = $row["Educational_Level"];
      $MemOcc[] = $row["Occupational_Skills"];
      $Remarks[] = $row["Remarks"];
      $Casualty[] = $row["Casualty"];
    }

    $sql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$Serial'";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }

    $sql = "SELECT * FROM `damages` WHERE `Serial_No.` = '$Serial' ORDER BY `Date` DESC LIMIT 1;";
    $result = $conn->query($sql);

    if(!$result){
      die("Invalid query: " . $connection->error);
    }
    while ($row = $result->fetch_assoc()) {
      $housecondition = $row["Housing_Condition"];
    }

?>
<!DOCTYPE html>
<html lang="english">
  <head>
    <title>exported project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
      @media print {

html, body {
    height: 99%; 
    margin: 0 !important; 
    padding: 0 !important;
    overflow: hidden;
}

body {
    zoom: 78%;
    margin: 25mm 25mm 25mm 25mm;
}

@page {
    margin-top: 5mm; /* Adjust the value as needed */
    margin-right: 0;
    margin-bottom: 0;
    margin-left: 0;
}

}
      
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div>
      <link href="./index.css" rel="stylesheet" />

      <div class="desktop1-container">
        <div class="desktop1-desktop1">
          <div class="desktop1-desktop3">
            <?php
                if (isset($Ethnic)) {
                  echo
                '<div style="position: absolute; top: 410px; left: 415px; height: 25px; width: 125px;">
              <center>
                <p style="color: rgba(0, 0, 0, 1);
                    font-size: 12px;
                    font-style: Semi Bold;
                    text-align: center;
                    font-family: Inter;
                    font-weight: 700;
                    line-height: normal;
                    font-stretch: normal;
                    text-decoration: none;">'.$Ethnic.'</p>
              </center>

              </div>';
                }
                ?>
            
            <img
              src="public/external/rectangle812751-pmkl.svg"
              alt="Rectangle812751"
              class="desktop1-rectangle81"
            />
            <img
              src="public/external/rectangle252750-e9nt.svg"
              alt="Rectangle252750"
              class="desktop1-rectangle25"
            />
            <img
              src="public/external/rectangle822751-9vtx.svg"
              alt="Rectangle822751"
              class="desktop1-rectangle82"
            />
            <img
              src="public/external/rectangle202750-ieui.svg"
              alt="Rectangle202750"
              class="desktop1-rectangle20"
            />
            <img
              src="public/external/line12740-cieg.svg"
              alt="Line12740"
              class="desktop1-line1"
            />
            <img
              src="public/external/rectangle832740-hfyy.svg"
              alt="Rectangle832740"
              class="desktop1-rectangle83"
            />
            <img
              src="public/external/ds12740-xu9-200h.png"
              alt="ds12740"
              class="desktop1-ds1"
            />
            <span class="desktop1-text">
              <span class="desktop1-text001">
                <span>DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT</span>
                <br />
                <span></span>
              </span>
              <span><b>DISASTER ASSISTANCE FAMILY ACCESS CARD (DAFAC)</b></span>
            </span>
            <span class="desktop1-text006"><span>Region</span></span>
            <span class="desktop1-text008"><span>Serial No.</span></span>
            <span class="desktop1-text010">
              <span>
                <span>Province/ District</span>
                <br />
                <span></span>
              </span>
            </span>
            <span class="desktop1-text015">
              <span>Barangay/Evacuation Center/ Site</span>
            </span>
            <span class="desktop1-text017"><span>City/Mun/Brgy</span></span>
            <img
              src="public/external/line22740-aruj.svg"
              alt="Line22740"
              class="desktop1-line2"
            />
            <img
              src="public/external/line562741-rjtap.svg"
              alt="Line562741"
              class="desktop1-line56"
            />
            <img
              src="public/external/line572741-97i.svg"
              alt="Line572741"
              class="desktop1-line57"
            />
            <img
              src="public/external/line582741-43ii.svg"
              alt="Line582741"
              class="desktop1-line58"
            />
            <img
              src="public/external/line592741-dagk.svg"
              alt="Line592741"
              class="desktop1-line59"
            />
            <img
              src="public/external/line62741-0q8i.svg"
              alt="Line62741"
              class="desktop1-line6"
            />
            <span class="desktop1-text019"><span>4P’s Benficiary</span></span>
            <span class="desktop1-text021"><span>4P’s Benficiary</span></span>
            <span class="desktop1-text023">
              <span>IP - Type of Ethnicity</span>
            </span>
            <span class="desktop1-text025"><span>Date of Birth</span></span>
            <span class="desktop1-text027">
              <span>Monthly Net Income</span>
            </span>
            <span class="desktop1-text029"><span>Occupation</span></span>
            <span class="desktop1-text031"><span>Civil Status:</span></span>
            <span class="desktop1-text033">
              <span>HEAD OF THE FAMILY</span>
            </span>
            <img
              src="public/external/line72742-4pz7.svg"
              alt="Line72742"
              class="desktop1-line7"
            />
            <span class="desktop1-text035"><span>SURNAME</span></span>
            <span class="desktop1-text037"><span>FIRSTNAME</span></span>
            <span class="desktop1-text039"><span>MIDDLE NAME</span></span>
            <span class="desktop1-text041">M</span>
            <span class="desktop1-text042">F</span>
            <span class="desktop1-text043"><span>AGE</span></span>
            <span class="desktop1-text045"><span>Single</span></span>
            <span class="desktop1-text047"><span>Others</span></span>
            <span class="desktop1-text049"><span>Married</span></span>
            <span class="desktop1-text051"><span>Religion</span></span>
            <span class="desktop1-text053"><span>Widow</span></span>
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line8"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line81"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line82"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line83"
            />
            <img
              src="public/external/line202744-zwn.svg"
              alt="Line202744"
              class="desktop1-line20"
              id="inserthere"
            />
            <span class="desktop1-text055">
              <span>BENEFICIARY’S COPY</span>
            </span>
            <span class="desktop1-text057"><span>
              <?php
              if (isset($Region)) {
                echo $Region;
              }
            ?>
            </span></span>
            <span class="desktop1-text059"><span>
              <?php
              if (isset($Serial)) {
                echo $Serial;
              }
            ?>
          </span></span>
            <span class="desktop1-text061"><span>
              <?php
              if (isset($Province)) {
                echo $Province;
              }
            ?>
            </span></span>
            <span class="desktop1-text063"><span>
              <?php
              if (isset($City)) {
                echo $City;
              }
            ?>
            </span></span>
            <span class="desktop1-text065"><span>
              <?php
              if (isset($Surname)) {
                echo $Surname;
              }
            ?>
            </span></span>
            <span class="desktop1-text067"><span>
              <?php
              if (isset($Firstname)) {
                echo $Firstname;
              }
            ?>
            </span></span>
            <span class="desktop1-text069"><span>
              <?php
              if (isset($Midname)) {
                echo $Midname;
              }
            ?>
            </span></span>
            <span class="desktop1-text071"><span>
              <?php
              if (isset($Religion)) {
                echo $Religion;
              }
            ?>
            </span></span>
            <span class="desktop1-text073"><span>
              <?php
              if (isset($bdate)) {
                echo $bdate;
              }
            ?>
            </span></span>
            <span class="desktop1-text075"><span>
              <?php
              if (isset($Occupation)) {
                echo $Occupation;
                $Sigoverprintname;
              }
            ?>
            </span></span>
            <span class="desktop1-text077"><span>
              <?php
              if (isset($Sigoverprintname)) {
                echo $Sigoverprintname;
                
              }
            ?>
            </span></span>
            <span class="desktop1-text079">
              <span>
                <?php
                if (isset($brgy)) {
                  echo $brgy;
                }
                ?>
              </span>
            </span>
            <span class="desktop1-text081">
              <span>Maila T Baral</span>
            </span>
            <span class="desktop1-text083"><span>
              <?php
              if (isset($DateReg)) {
                echo $DateReg;
                
              }
            ?>
            </span></span>
            <span class="desktop1-text085"><span>
              <?php
              if (isset($CI)) {
                echo "₱". number_format($CI);
              }
            ?>
            </span></span>
            <span class="desktop1-text087">
              <span>
              <?php
              if (isset($Evacenter)) {
                echo $Evacenter;
              }
            ?>
            </span>
            </span>
            <div class="desktop1-group2">
              <img
                src="public/external/rectangle42746-7dbq-200h.png"
                alt="Rectangle42746"
                class="desktop1-rectangle4"
              />
              <div class="desktop1-frameiconcheck">
                <img
                  src="public/external/vector2746-ksa.svg"
                  alt="Vector2746"
                  class="desktop1-vector"
                />
                <?php
                  if ($CivStat == "Married") {
                    echo '
                <img
                  src="public/external/vector2746-520a.svg"
                  alt="Vector2746"
                  class="desktop1-vector01"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group6">
              <img
                src="public/external/rectangle43066-edgp-200h.png"
                alt="Rectangle43066"
              />
              <div class="desktop1-frameiconcheck1">
                <img
                  src="public/external/vector3067-xh89.svg"
                  alt="Vector3067"
                  class="desktop1-vector02"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($Gender == "Male") {
                    echo '<img
                  src="public/external/vector3067-ljm.svg"
                  alt="Vector3067"
                  class="desktop1-vector03"
                />';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group8">
              <span class="desktop1-text089"><span>
              <?php
              if (isset($Age)) {
                echo $Age;
              }
            ?>
            </span></span>
            </div>
            <div class="desktop1-group9">
              <img
                src="public/external/rectangle43069-zfvk-200h.png"
                alt="Rectangle43069"
              />
              <div class="desktop1-frameiconcheck2">
                <img
                  src="public/external/vector3069-2ce.svg"
                  alt="Vector3069"
                  class="desktop1-vector04"
                  style="border: 1px solid #000000;"
                />
                <?php
                if (isset($Ethnic)) {
                  echo
                '<img
                  src="public/external/vector3069-aril.svg"
                  alt="Vector3069"
                  class="desktop1-vector05"
                  />';
                }
                ?>

              </div>
            </div>
            <div class="desktop1-group10">
              <img
                src="public/external/rectangle43069-zsw8-200h.png"
                alt="Rectangle43069"
              />
              <div class="desktop1-frameiconcheck3">
                <img
                  src="public/external/vector3070-lb4.svg"
                  alt="Vector3070"
                  class="desktop1-vector06"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($fourPs == "Yes") {
                    echo '<img
                  src="public/external/vector3070-75op.svg"
                  alt="Vector3070"
                  class="desktop1-vector07"
                />';
                  }
                ?>
                
              </div>
            </div>
            <div class="desktop1-group7">
              <img
                src="public/external/rectangle43067-asnd-200h.png"
                alt="Rectangle43067"
              />
              <div class="desktop1-frameiconcheck4">
                <img
                  src="public/external/vector3067-8pls.svg"
                  alt="Vector3067"
                  class="desktop1-vector08"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($Gender == "Female") {
                    echo '<img
                  src="public/external/vector3067-uuud.svg"
                  alt="Vector3067"
                  class="desktop1-vector09"
                />';
                  }
                ?>
                
              </div>
            </div>
            <div class="desktop1-group5">
              <img
                src="public/external/rectangle43066-r7mz-200h.png"
                alt="Rectangle43066"
              />
              <div class="desktop1-frameiconcheck5">
                <img
                  src="public/external/vector3066-1z2d.svg"
                  alt="Vector3066"
                  class="desktop1-vector10"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($CivStat == "Single") {
                    echo '
                <img
                  src="public/external/vector3066-pvzx.svg"
                  alt="Vector3066"
                  class="desktop1-vector11"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group4">
              <img
                src="public/external/rectangle43065-yudo-200h.png"
                alt="Rectangle43065"
              />
              <div class="desktop1-frameiconcheck6">
                <img
                  src="public/external/vector3066-d0e.svg"
                  alt="Vector3066"
                  class="desktop1-vector12"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($CivStat == "Widow") {
                    echo '
                <img
                  src="public/external/vector3066-6j7.svg"
                  alt="Vector3066"
                  class="desktop1-vector13"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <span class="desktop1-text091">
              <span>House &amp; lot owner</span>
            </span>
            <span class="desktop1-text093"><span>Housing Condition</span></span>
            <span class="desktop1-text095"><span>Health Condition:</span></span>
            <span class="desktop1-text097"><span>Casualty:</span></span>
            <span class="desktop1-text099"><span>Partially Damaged</span></span>
            <span class="desktop1-text101"><span>Totally Damaged</span></span>
            <span class="desktop1-text103">
              <span>A</span>
              <span>- Older Person</span>
            </span>
            <span class="desktop1-text106"><span>01 - Dead</span></span>
            <span class="desktop1-text108"><span>02 - Injured</span></span>
            <span class="desktop1-text110"><span>03 - Missing</span></span>
            <span class="desktop1-text112"><span>04 - With Illness</span></span>
            <span class="desktop1-text114">
              <span>D</span>
              <span>- Pregnant Mother</span>
            </span>
            <span class="desktop1-text117">
              <span>C</span>
              <span>- PWD;</span>
            </span>
            <span class="desktop1-text120">
              <span>B</span>
              <span>-Lactating Mother</span>
            </span>
            <span class="desktop1-text123">
              <span>E</span>
              <span>- Solo Parent</span>
            </span>
            <span class="desktop1-text126">
              <span>Rented house &amp; lot</span>
            </span>
            <span class="desktop1-text128">
              <span>House owner &amp; lot renter</span>
            </span>
            <span class="desktop1-text130">
              <span>House owner, rent-free lot with owner’s consent</span>
            </span>
            <span class="desktop1-text132">
              <span>
                House owner, rent-free lot w/o owner’s consent of the owner
              </span>
            </span>
            <span class="desktop1-text134">
              <span>Rent-free house &amp; lot with owner’s consent</span>
            </span>
            <span class="desktop1-text136">
              <span>Rent-free house &amp; lot w/o owner’s consent</span>
            </span>
            <span class="desktop1-text138"><span>Code:</span></span>
            <img
              src="public/external/line522750-5kr.svg"
              alt="Line522750"
              class="desktop1-line52"
            />
            <img
              src="public/external/line602750-qci9.svg"
              alt="Line602750"
              class="desktop1-line60"
            />
            <img
              src="public/external/line542750-3ny9.svg"
              alt="Line542750"
              class="desktop1-line54"
            />
            <img
              src="public/external/line552750-08p.svg"
              alt="Line552750"
              class="desktop1-line55"
            />
            <span class="desktop1-text140">
              <span>Signature/Thumbmark of Family Head</span>
            </span>
            <span class="desktop1-text142">
              <span>Name/Signature of Brgy. Captain</span>
            </span>
            <span class="desktop1-text144">
              <span>Name/Signature of LSWDO</span>
            </span>
            <span class="desktop1-text146"><span>Date Registered</span></span>
            <img
              src="public/external/rectangle272751-3q4-200h.png"
              alt="Rectangle272751"
              class="desktop1-rectangle27"
            />
            <img
              src="public/external/rectangle352751-abk1-200h.png"
              alt="Rectangle352751"
              class="desktop1-rectangle35"
            />
            <img
              src="public/external/rectangle432751-hgf9-200h.png"
              alt="Rectangle432751"
              class="desktop1-rectangle43"
            />
            <img
              src="public/external/rectangle512751-vfyb-200h.png"
              alt="Rectangle512751"
              class="desktop1-rectangle51"
            />
            <img
              src="public/external/rectangle592751-sd3p-200h.png"
              alt="Rectangle592751"
              class="desktop1-rectangle59"
            />
            <img
              src="public/external/rectangle672751-kg43-200h.png"
              alt="Rectangle672751"
              class="desktop1-rectangle67"
            />
            <img
              src="public/external/rectangle282751-r0aj-200h.png"
              alt="Rectangle282751"
              class="desktop1-rectangle28"
            />
            <img
              src="public/external/rectangle362751-jzr-200h.png"
              alt="Rectangle362751"
              class="desktop1-rectangle36"
            />
            <img
              src="public/external/rectangle442752-m2e-200h.png"
              alt="Rectangle442752"
              class="desktop1-rectangle44"
            />
            <img
              src="public/external/rectangle522752-7z7y-200h.png"
              alt="Rectangle522752"
              class="desktop1-rectangle52"
            />
            <img
              src="public/external/rectangle602752-zjsd-200h.png"
              alt="Rectangle602752"
              class="desktop1-rectangle60"
            />
            <img
              src="public/external/rectangle682752-0t3o-200h.png"
              alt="Rectangle682752"
              class="desktop1-rectangle68"
            />
            <img
              src="public/external/rectangle292752-2jy-200h.png"
              alt="Rectangle292752"
              class="desktop1-rectangle29"
            />
            <img
              src="public/external/rectangle372752-wpkq-200h.png"
              alt="Rectangle372752"
              class="desktop1-rectangle37"
            />
            <img
              src="public/external/rectangle452752-aps-200h.png"
              alt="Rectangle452752"
              class="desktop1-rectangle45"
            />
            <img
              src="public/external/rectangle532752-fb1l-200h.png"
              alt="Rectangle532752"
              class="desktop1-rectangle53"
            />
            <img
              src="public/external/rectangle612752-x4ml-200h.png"
              alt="Rectangle612752"
              class="desktop1-rectangle61"
            />
            <img
              src="public/external/rectangle692752-uzzq-200h.png"
              alt="Rectangle692752"
              class="desktop1-rectangle69"
            />
            <img
              src="public/external/rectangle312753-gnem-200h.png"
              alt="Rectangle312753"
              class="desktop1-rectangle31"
            />
            <img
              src="public/external/rectangle382753-s9x-200h.png"
              alt="Rectangle382753"
              class="desktop1-rectangle38"
            />
            <img
              src="public/external/rectangle462753-p39v-200h.png"
              alt="Rectangle462753"
              class="desktop1-rectangle46"
              style="width: 52.5px;"
            />
            <img
              src="public/external/rectangle542753-iqxj-200h.png"
              alt="Rectangle542753"
              class="desktop1-rectangle54"
            />
            <img
              src="public/external/rectangle622753-8a8p-200h.png"
              alt="Rectangle622753"
              class="desktop1-rectangle62"
            />
            <img
              src="public/external/rectangle702753-elbo-200h.png"
              alt="Rectangle702753"
              class="desktop1-rectangle70"
            />
            <img
              src="public/external/rectangle322753-u97o-200h.png"
              alt="Rectangle322753"
              class="desktop1-rectangle32"
            />
            <img
              src="public/external/rectangle392753-c0h-200h.png"
              alt="Rectangle392753"
              class="desktop1-rectangle39"
            />
            <img
              src="public/external/rectangle472753-aoh-200h.png"
              alt="Rectangle472753"
            />
            <img
              src="public/external/rectangle552753-m0wf-200h.png"
              alt="Rectangle552753"
              class="desktop1-rectangle55"
            />
            <img
              src="public/external/rectangle632754-u0og-200h.png"
              alt="Rectangle632754"
              class="desktop1-rectangle63"
            />
            <img
              src="public/external/rectangle712754-ook9-200h.png"
              alt="Rectangle712754"
              class="desktop1-rectangle71"
            />
            <img
              src="public/external/rectangle332754-6vk-200h.png"
              alt="Rectangle332754"
              class="desktop1-rectangle33"
            />
            <img
              src="public/external/rectangle402754-p0ok-200h.png"
              alt="Rectangle402754"
              class="desktop1-rectangle40"
            />
            <img
              src="public/external/rectangle482754-o7rp-200h.png"
              alt="Rectangle482754"
              class="desktop1-rectangle48"
            />
            <img
              src="public/external/rectangle562754-mu8-200h.png"
              alt="Rectangle562754"
              class="desktop1-rectangle56"
            />
            <img
              src="public/external/rectangle642754-28t-200h.png"
              alt="Rectangle642754"
              class="desktop1-rectangle64"
            />
            <img
              src="public/external/rectangle722754-l3o-200h.png"
              alt="Rectangle722754"
              class="desktop1-rectangle72"
            />
            <img
              src="public/external/rectangle342754-n6y8-200h.png"
              alt="Rectangle342754"
              class="desktop1-rectangle34"
            />
            <img
              src="public/external/rectangle412754-ai4-200h.png"
              alt="Rectangle412754"
              class="desktop1-rectangle41"
            />
            <img
              src="public/external/rectangle492755-l46-200h.png"
              alt="Rectangle492755"
              class="desktop1-rectangle49"
            />
            <img
              src="public/external/rectangle572755-d5qk-200h.png"
              alt="Rectangle572755"
              class="desktop1-rectangle57"
            />
            <img
              src="public/external/rectangle652755-xnx-200h.png"
              alt="Rectangle652755"
              class="desktop1-rectangle65"
            />
            <img
              src="public/external/rectangle732755-dnq-200h.png"
              alt="Rectangle732755"
              class="desktop1-rectangle73"
            />
            <img
              src="public/external/rectangle302755-4rhk-200h.png"
              alt="Rectangle302755"
              class="desktop1-rectangle30"
            />
            <img
              src="public/external/rectangle422755-c123-200h.png"
              alt="Rectangle422755"
              class="desktop1-rectangle42"
            />
            <img
              src="public/external/rectangle502755-dpe-200h.png"
              alt="Rectangle502755"
              class="desktop1-rectangle50"
            />
            <img
              src="public/external/rectangle582755-72f-200h.png"
              alt="Rectangle582755"
              class="desktop1-rectangle58"
            />
            <img
              src="public/external/rectangle662755-n8h-200h.png"
              alt="Rectangle662755"
              class="desktop1-rectangle66"
            />
            <img
              src="public/external/rectangle742755-ipdh-200h.png"
              alt="Rectangle742755"
              class="desktop1-rectangle74"
            />
            <span class="desktop1-text148"><span>Family Members</span></span>
            <span class="desktop1-text150"><span>
              <?php
                if (isset($fammember[0])) {
                  echo $fammember[0];
                }
              ?>
              </span></span>
            <span class="desktop1-text152"><span>
              <?php
                if (isset($fammember[1])) {
                  echo $fammember[1];
                }
              ?></span></span>
            <span class="desktop1-text154"><span>
              <?php
                if (isset($fammember[2])) {
                  echo $fammember[2];
                }
              ?></span></span>
            <span class="desktop1-text156"><span>
              <?php
                if (isset($fammember[3])) {
                  echo $fammember[3];
                }
              ?></span></span>
            <span class="desktop1-text158"><span>
              <?php
                if (isset($fammember[4])) {
                  echo $fammember[4];
                }
              ?></span></span>
            <span class="desktop1-text160"><span>
              <?php
                if (isset($relfamhead[0])) {
                  echo $relfamhead[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text162"><span>
              <?php
                if (isset($relfamhead[1])) {
                  echo $relfamhead[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text164"><span>
              <?php
                if (isset($relfamhead[2])) {
                  echo $relfamhead[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text166"><span>
              <?php
                if (isset($relfamhead[3])) {
                  echo $relfamhead[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text168"><span>
              <?php
                if (isset($relfamhead[4])) {
                  echo $relfamhead[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text170"><span>
              <?php
                if (isset($memAge[0])) {
                  echo $memAge[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text172"><span>
              <?php
                if (isset($memAge[1])) {
                  echo $memAge[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text174"><span>
              <?php
                if (isset($memAge[2])) {
                  echo $memAge[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text176"><span>
              <?php
                if (isset($memAge[3])) {
                  echo $memAge[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text178"><span>
              <?php
                if (isset($memAge[4])) {
                  echo $memAge[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text180"><span>
              <?php
                if (isset($memGender[0])) {
                  echo $memGender[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text182"><span>
              <?php
                if (isset($memGender[1])) {
                  echo $memGender[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text184"><span>
              <?php
                if (isset($memGender[2])) {
                  echo $memGender[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text186"><span>
              <?php
                if (isset($memGender[3])) {
                  echo $memGender[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text188"><span>
              <?php
                if (isset($memcivstat[1])) {
                  echo $memcivstat[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text190"><span>
              <?php
                if (isset($memGender[4])) {
                  echo $memGender[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text192"><span>
              <?php
                if (isset($memcivstat[0])) {
                  echo $memcivstat[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text194"><span>
              <?php
                if (isset($memcivstat[2])) {
                  echo $memcivstat[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text196"><span>
              <?php
                if (isset($memcivstat[3])) {
                  echo $memcivstat[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text198"><span>
              <?php
                if (isset($memcivstat[4])) {
                  echo $memcivstat[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text200"><span>
              <?php
                if (isset($Educ[0])) {
                  echo $Educ[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text202"><span>
              <?php
                if (isset($Educ[1])) {
                  echo $Educ[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text204"><span>
              <?php
                if (isset($Educ[2])) {
                  echo $Educ[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text206"><span>
              <?php
                if (isset($Educ[3])) {
                  echo $Educ[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text208"><span>
              <?php
                if (isset($Educ[4])) {
                  echo $Educ[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text210"><span>
              <?php
                if (isset($Remarks[0])) {
                  echo $Remarks[0];
                }
                if (isset($Casualty[0])) {
                  if (!is_null($Casualty[0])) {
                    echo $Casualty[0];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text212"><span>
              <?php
                if (isset($Remarks[1])) {
                  echo $Remarks[1];
                }
                if (isset($Casualty[1])) {
                  if (!is_null($Casualty[1])) {
                    echo $Casualty[1];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text214"><span>
              <?php
                if (isset($Remarks[2])) {
                  echo $Remarks[2];
                }
                if (isset($Casualty[2])) {
                  if (!is_null($Casualty[2])) {
                    echo $Casualty[2];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text216"><span>
              <?php
                if (isset($Remarks[3])) {
                  echo $Remarks[3];
                }
                if (isset($Casualty[3])) {
                  if (!is_null($Casualty[3])) {
                    echo $Casualty[3];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text218"><span>
              <?php
                if (isset($Remarks[4])) {
                  echo $Remarks[4];
                }
                if (isset($Casualty[4])) {
                  if (!is_null($Casualty[4])) {
                    echo $Casualty[4];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text220">
              <span>
              <?php
                if (isset($MemOcc[0])) {
                  echo $MemOcc[0];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text222">
              <span>
              <?php
                if (isset($MemOcc[1])) {
                  echo $MemOcc[1];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text224">
              <span>
              <?php
                if (isset($MemOcc[2])) {
                  echo $MemOcc[2];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text226">
              <span>
              <?php
                if (isset($MemOcc[3])) {
                  echo $MemOcc[3];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text228">
              <span>
              <?php
                if (isset($MemOcc[4])) {
                  echo $MemOcc[4];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text230">
              <span>
                <span>Relation to</span>
                <br />
                <span>Family Head</span>
              </span>
            </span>
            <span class="desktop1-text235"><span>Age</span></span>
            <span class="desktop1-text237"><span>Gender</span></span>
            <span class="desktop1-text239">
              <span>
                <span>Civil</span>
                <br />
                <span>Status</span>
              </span>
            </span>
            <span class="desktop1-text244"><span>Educ.</span></span>
            <span class="desktop1-text246">
              <span>
                <span>Occupational</span>
                <br />
                <span>Skills</span>
              </span>
            </span>
            <span class="desktop1-text251"><span>Remarks</span></span>
            <div class="desktop1-group11" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House & lot owner") {
                    echo '
                <img
                  src="public/external/vector2757-ytff.svg"
                  alt="Vector2757"
                  class="desktop1-vector14"
                />
                ';
                  }
                ?>
              
            </div>
            <div class="desktop1-group15" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner & lot renter") {
                    echo '
                <img
                  src="public/external/vector3172-tksp.svg"
                  alt="Vector3172"
                  class="desktop1-vector15"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group16" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner,rent-free lot with owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-111.svg"
                  alt="Vector3172"
                  class="desktop1-vector16"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group17" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner,rent-free lot w/o owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-29em.svg"
                  alt="Vector3172"
                  class="desktop1-vector17"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group18" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rent-free house & lot with owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-93wyd.svg"
                  alt="Vector3172"
                  class="desktop1-vector18"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group19" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rent-free house & lot w/o owner's consent") {
                    echo '
                <img
                  src="public/external/vector3173-rcqi.svg"
                  alt="Vector3173"
                  class="desktop1-vector19"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group14" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rented house & lot") {
                    echo '
                <img
                  src="public/external/vector3171-2mq.svg"
                  alt="Vector3171"
                  class="desktop1-vector20"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group13" style="border: 1px solid #000000;">

              <?php 
              if (isset($housecondition)) {
                if ($housecondition == "Totally Damaged") {
                  echo '<img
                src="public/external/vector3171-37mc.svg"
                alt="Vector3171"
                class="desktop1-vector21"
                />';
                }
              }
              ?>

            </div>
            <div class="desktop1-group12" style="border: 1px solid #000000;">
              <?php 
              if (isset($housecondition)) {
                if ($housecondition == "Partially Damaged") {
                  echo '<img
                    src="public/external/vector3071-8ny5.svg"
                    alt="Vector3071"
                    class="desktop1-vector22"
                  />';
                }
              }
              ?>
              
            </div>
            <?php 
            if (isset($Serial)) {
              echo '<img
              src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=\''.$Serial.'\'"
              alt="QRcodecontainer3173"
              class="desktop1-qrcodecontainer"
            />';
            }
            ?>
          </div>
          <div class="desktop1-desktop2">
            <?php
                if (isset($Ethnic)) {
                  echo
                '<div style="position: absolute; top: 410px; left: 415px; height: 25px; width: 125px;">
              <center>
                <p style="color: rgba(0, 0, 0, 1);
                    font-size: 12px;
                    font-style: Semi Bold;
                    text-align: center;
                    font-family: Inter;
                    font-weight: 700;
                    line-height: normal;
                    font-stretch: normal;
                    text-decoration: none;">'.$Ethnic.'</p>
              </center>

              </div>';
                }
                ?>
            <img
              src="public/external/rectangle812751-pmkl.svg"
              alt="Rectangle812751"
              class="desktop1-rectangle81"
            />
            <img
              src="public/external/rectangle252750-e9nt.svg"
              alt="Rectangle252750"
              class="desktop1-rectangle25"
            />
            <img
              src="public/external/rectangle822751-9vtx.svg"
              alt="Rectangle822751"
              class="desktop1-rectangle82"
            />
            <img
              src="public/external/rectangle202750-ieui.svg"
              alt="Rectangle202750"
              class="desktop1-rectangle20"
            />
            <img
              src="public/external/line12740-cieg.svg"
              alt="Line12740"
              class="desktop1-line1"
            />
            <img
              src="public/external/rectangle832740-hfyy.svg"
              alt="Rectangle832740"
              class="desktop1-rectangle83"
            />
            <img
              src="public/external/ds12740-xu9-200h.png"
              alt="ds12740"
              class="desktop1-ds1"
            />
            <span class="desktop1-text">
              <span class="desktop1-text001">
                <span>DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT</span>
                <br />
                <span></span>
              </span>
              <span><b>DISASTER ASSISTANCE FAMILY ACCESS CARD (DAFAC)<b></span>
            </span>
            <span class="desktop1-text006"><span>Region</span></span>
            <span class="desktop1-text008"><span>Serial No.</span></span>
            <span class="desktop1-text010">
              <span>
                <span>Province/ District</span>
                <br />
                <span></span>
              </span>
            </span>
            <span class="desktop1-text015">
              <span>Barangay/Evacuation Center/ Site</span>
            </span>
            <span class="desktop1-text017"><span>City/Mun/Brgy</span></span>
            <img
              src="public/external/line22740-aruj.svg"
              alt="Line22740"
              class="desktop1-line2"
            />
            <img
              src="public/external/line562741-rjtap.svg"
              alt="Line562741"
              class="desktop1-line56"
            />
            <img
              src="public/external/line572741-97i.svg"
              alt="Line572741"
              class="desktop1-line57"
            />
            <img
              src="public/external/line582741-43ii.svg"
              alt="Line582741"
              class="desktop1-line58"
            />
            <img
              src="public/external/line592741-dagk.svg"
              alt="Line592741"
              class="desktop1-line59"
            />
            <img
              src="public/external/line62741-0q8i.svg"
              alt="Line62741"
              class="desktop1-line6"
            />
            <span class="desktop1-text019"><span>4P’s Benficiary</span></span>
            <span class="desktop1-text021"><span>4P’s Benficiary</span></span>
            <span class="desktop1-text023">
              <span>IP - Type of Ethnicity</span>
            </span>
            <span class="desktop1-text025"><span>Date of Birth</span></span>
            <span class="desktop1-text027">
              <span>Monthly Net Income</span>
            </span>
            <span class="desktop1-text029"><span>Occupation</span></span>
            <span class="desktop1-text031"><span>Civil Status:</span></span>
            <span class="desktop1-text033">
              <span>HEAD OF THE FAMILY</span>
            </span>
            <img
              src="public/external/line72742-4pz7.svg"
              alt="Line72742"
              class="desktop1-line7"
            />
            <span class="desktop1-text035"><span>SURNAME</span></span>
            <span class="desktop1-text037"><span>FIRSTNAME</span></span>
            <span class="desktop1-text039"><span>MIDDLE NAME</span></span>
            <span class="desktop1-text041">M</span>
            <span class="desktop1-text042">F</span>
            <span class="desktop1-text043"><span>AGE</span></span>
            <span class="desktop1-text045"><span>Single</span></span>
            <span class="desktop1-text047"><span>Others</span></span>
            <span class="desktop1-text049"><span>Married</span></span>
            <span class="desktop1-text051"><span>Religion</span></span>
            <span class="desktop1-text053"><span>Widow</span></span>
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line8"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line81"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line82"
            />
            <img
              src="public/external/line82744-fz39.svg"
              alt="Line82744"
              class="desktop1-line83"
            />
            <img
              src="public/external/line202744-zwn.svg"
              alt="Line202744"
              class="desktop1-line20"
              id="inserthere"
            />
            <span class="desktop1-text055">
              <span>SOCIAL WORKER’S COPY</span>
            </span>
            <span class="desktop1-text057"><span>
              <?php
              if (isset($Region)) {
                echo $Region;
              }
            ?>
            </span></span>
            <span class="desktop1-text059"><span>
              <?php
              if (isset($Serial)) {
                echo $Serial;
              }
            ?>
          </span></span>
            <span class="desktop1-text061"><span>
              <?php
              if (isset($Province)) {
                echo $Province;
              }
            ?>
            </span></span>
            <span class="desktop1-text063"><span>
              <?php
              if (isset($City)) {
                echo $City;
              }
            ?>
            </span></span>
            <span class="desktop1-text065"><span>
              <?php
              if (isset($Surname)) {
                echo $Surname;
              }
            ?>
            </span></span>
            <span class="desktop1-text067"><span>
              <?php
              if (isset($Firstname)) {
                echo $Firstname;
              }
            ?>
            </span></span>
            <span class="desktop1-text069"><span>
              <?php
              if (isset($Midname)) {
                echo $Midname;
              }
            ?>
            </span></span>
            <span class="desktop1-text071"><span>
              <?php
              if (isset($Religion)) {
                echo $Religion;
              }
            ?>
            </span></span>
            <span class="desktop1-text073"><span>
              <?php
              if (isset($bdate)) {
                echo $bdate;
              }
            ?>
            </span></span>
            <span class="desktop1-text075"><span>
              <?php
              if (isset($Occupation)) {
                echo $Occupation;
                $Sigoverprintname;
              }
            ?>
            </span></span>
            <span class="desktop1-text077"><span>
              <?php
              if (isset($Sigoverprintname)) {
                echo $Sigoverprintname;
                
              }
            ?>
            </span></span>
            <span class="desktop1-text079">
              <span>
                <?php
                if (isset($brgy)) {
                  echo $brgy;
                }
                ?>
              </span>
            </span>
            <span class="desktop1-text081">
              <span>Maila T Baral</span>
            </span>
            <span class="desktop1-text083"><span>
              <?php
              if (isset($DateReg)) {
                echo $DateReg;
                
              }
            ?>
            </span></span>
            <span class="desktop1-text085"><span>
              <?php
              if (isset($CI)) {
                echo "₱". number_format($CI);
              }
            ?>
            </span></span>
            <span class="desktop1-text087">
              <span>
              <?php
              if (isset($Evacenter)) {
                echo $Evacenter;
              }
            ?>
            </span>
            </span>
            <div class="desktop1-group2">
              <img
                src="public/external/rectangle42746-7dbq-200h.png"
                alt="Rectangle42746"
                class="desktop1-rectangle4"
              />
              <div class="desktop1-frameiconcheck">
                <img
                  src="public/external/vector2746-ksa.svg"
                  alt="Vector2746"
                  class="desktop1-vector"
                />
                <?php
                  if ($CivStat == "Married") {
                    echo '
                <img
                  src="public/external/vector2746-520a.svg"
                  alt="Vector2746"
                  class="desktop1-vector01"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group6">
              <img
                src="public/external/rectangle43066-edgp-200h.png"
                alt="Rectangle43066"
              />
              <div class="desktop1-frameiconcheck1">
                <img
                  src="public/external/vector3067-xh89.svg"
                  alt="Vector3067"
                  class="desktop1-vector02"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($Gender == "Male") {
                    echo '<img
                  src="public/external/vector3067-ljm.svg"
                  alt="Vector3067"
                  class="desktop1-vector03"
                />';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group8">
              <span class="desktop1-text089"><span>
              <?php
              if (isset($Age)) {
                echo $Age;
              }
            ?>
            </span></span>
            </div>
            <div class="desktop1-group9">
              <img
                src="public/external/rectangle43069-zfvk-200h.png"
                alt="Rectangle43069"
              />
              <div class="desktop1-frameiconcheck2">
                <img
                  src="public/external/vector3069-2ce.svg"
                  alt="Vector3069"
                  class="desktop1-vector04"
                  style="border: 1px solid #000000;"
                />
                <?php
                if (isset($Ethnic)) {
                  echo
                '<img
                  src="public/external/vector3069-aril.svg"
                  alt="Vector3069"
                  class="desktop1-vector05"
                  />';
                }
                ?>

              </div>
            </div>
            <div class="desktop1-group10">
              <img
                src="public/external/rectangle43069-zsw8-200h.png"
                alt="Rectangle43069"
              />
              <div class="desktop1-frameiconcheck3">
                <img
                  src="public/external/vector3070-lb4.svg"
                  alt="Vector3070"
                  class="desktop1-vector06"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($fourPs == "Yes") {
                    echo '<img
                  src="public/external/vector3070-75op.svg"
                  alt="Vector3070"
                  class="desktop1-vector07"
                />';
                  }
                ?>
                
              </div>
            </div>
            <div class="desktop1-group7">
              <img
                src="public/external/rectangle43067-asnd-200h.png"
                alt="Rectangle43067"
              />
              <div class="desktop1-frameiconcheck4">
                <img
                  src="public/external/vector3067-8pls.svg"
                  alt="Vector3067"
                  class="desktop1-vector08"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($Gender == "Female") {
                    echo '<img
                  src="public/external/vector3067-uuud.svg"
                  alt="Vector3067"
                  class="desktop1-vector09"
                />';
                  }
                ?>
                
              </div>
            </div>
            <div class="desktop1-group5">
              <img
                src="public/external/rectangle43066-r7mz-200h.png"
                alt="Rectangle43066"
              />
              <div class="desktop1-frameiconcheck5">
                <img
                  src="public/external/vector3066-1z2d.svg"
                  alt="Vector3066"
                  class="desktop1-vector10"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($CivStat == "Single") {
                    echo '
                <img
                  src="public/external/vector3066-pvzx.svg"
                  alt="Vector3066"
                  class="desktop1-vector11"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <div class="desktop1-group4">
              <img
                src="public/external/rectangle43065-yudo-200h.png"
                alt="Rectangle43065"
              />
              <div class="desktop1-frameiconcheck6">
                <img
                  src="public/external/vector3066-d0e.svg"
                  alt="Vector3066"
                  class="desktop1-vector12"
                  style="border: 1px solid #000000;"
                />
                <?php
                  if ($CivStat == "Widow") {
                    echo '
                <img
                  src="public/external/vector3066-6j7.svg"
                  alt="Vector3066"
                  class="desktop1-vector13"
                />
                ';
                  }
                ?>
              </div>
            </div>
            <span class="desktop1-text091">
              <span>House &amp; lot owner</span>
            </span>
            <span class="desktop1-text093"><span>Housing Condition</span></span>
            <span class="desktop1-text095"><span>Health Condition:</span></span>
            <span class="desktop1-text097"><span>Casualty:</span></span>
            <span class="desktop1-text099"><span>Partially Damaged</span></span>
            <span class="desktop1-text101"><span>Totally Damaged</span></span>
            <span class="desktop1-text103">
              <span>A</span>
              <span>- Older Person</span>
            </span>
            <span class="desktop1-text106"><span>01 - Dead</span></span>
            <span class="desktop1-text108"><span>02 - Injured</span></span>
            <span class="desktop1-text110"><span>03 - Missing</span></span>
            <span class="desktop1-text112"><span>04 - With Illness</span></span>
            <span class="desktop1-text114">
              <span>D</span>
              <span>- Pregnant Mother</span>
            </span>
            <span class="desktop1-text117">
              <span>C</span>
              <span>- PWD;</span>
            </span>
            <span class="desktop1-text120">
              <span>B</span>
              <span>-Lactating Mother</span>
            </span>
            <span class="desktop1-text123">
              <span>E</span>
              <span>- Solo Parent</span>
            </span>
            <span class="desktop1-text126">
              <span>Rented house &amp; lot</span>
            </span>
            <span class="desktop1-text128">
              <span>House owner &amp; lot renter</span>
            </span>
            <span class="desktop1-text130">
              <span>House owner, rent-free lot with owner’s consent</span>
            </span>
            <span class="desktop1-text132">
              <span>
                House owner, rent-free lot w/o owner’s consent of the owner
              </span>
            </span>
            <span class="desktop1-text134">
              <span>Rent-free house &amp; lot with owner’s consent</span>
            </span>
            <span class="desktop1-text136">
              <span>Rent-free house &amp; lot w/o owner’s consent</span>
            </span>
            <span class="desktop1-text138"><span>Code:</span></span>
            <img
              src="public/external/line522750-5kr.svg"
              alt="Line522750"
              class="desktop1-line52"
            />
            <img
              src="public/external/line602750-qci9.svg"
              alt="Line602750"
              class="desktop1-line60"
            />
            <img
              src="public/external/line542750-3ny9.svg"
              alt="Line542750"
              class="desktop1-line54"
            />
            <img
              src="public/external/line552750-08p.svg"
              alt="Line552750"
              class="desktop1-line55"
            />
            <span class="desktop1-text140">
              <span>Signature/Thumbmark of Family Head</span>
            </span>
            <span class="desktop1-text142">
              <span>Name/Signature of Brgy. Captain</span>
            </span>
            <span class="desktop1-text144">
              <span>Name/Signature of LSWDO</span>
            </span>
            <span class="desktop1-text146"><span>Date Registered</span></span>
            <img
              src="public/external/rectangle272751-3q4-200h.png"
              alt="Rectangle272751"
              class="desktop1-rectangle27"
            />
            <img
              src="public/external/rectangle352751-abk1-200h.png"
              alt="Rectangle352751"
              class="desktop1-rectangle35"
            />
            <img
              src="public/external/rectangle432751-hgf9-200h.png"
              alt="Rectangle432751"
              class="desktop1-rectangle43"
            />
            <img
              src="public/external/rectangle512751-vfyb-200h.png"
              alt="Rectangle512751"
              class="desktop1-rectangle51"
            />
            <img
              src="public/external/rectangle592751-sd3p-200h.png"
              alt="Rectangle592751"
              class="desktop1-rectangle59"
            />
            <img
              src="public/external/rectangle672751-kg43-200h.png"
              alt="Rectangle672751"
              class="desktop1-rectangle67"
            />
            <img
              src="public/external/rectangle282751-r0aj-200h.png"
              alt="Rectangle282751"
              class="desktop1-rectangle28"
            />
            <img
              src="public/external/rectangle362751-jzr-200h.png"
              alt="Rectangle362751"
              class="desktop1-rectangle36"
            />
            <img
              src="public/external/rectangle442752-m2e-200h.png"
              alt="Rectangle442752"
              class="desktop1-rectangle44"
            />
            <img
              src="public/external/rectangle522752-7z7y-200h.png"
              alt="Rectangle522752"
              class="desktop1-rectangle52"
            />
            <img
              src="public/external/rectangle602752-zjsd-200h.png"
              alt="Rectangle602752"
              class="desktop1-rectangle60"
            />
            <img
              src="public/external/rectangle682752-0t3o-200h.png"
              alt="Rectangle682752"
              class="desktop1-rectangle68"
            />
            <img
              src="public/external/rectangle292752-2jy-200h.png"
              alt="Rectangle292752"
              class="desktop1-rectangle29"
            />
            <img
              src="public/external/rectangle372752-wpkq-200h.png"
              alt="Rectangle372752"
              class="desktop1-rectangle37"
            />
            <img
              src="public/external/rectangle452752-aps-200h.png"
              alt="Rectangle452752"
              class="desktop1-rectangle45"
            />
            <img
              src="public/external/rectangle532752-fb1l-200h.png"
              alt="Rectangle532752"
              class="desktop1-rectangle53"
            />
            <img
              src="public/external/rectangle612752-x4ml-200h.png"
              alt="Rectangle612752"
              class="desktop1-rectangle61"
            />
            <img
              src="public/external/rectangle692752-uzzq-200h.png"
              alt="Rectangle692752"
              class="desktop1-rectangle69"
            />
            <img
              src="public/external/rectangle312753-gnem-200h.png"
              alt="Rectangle312753"
              class="desktop1-rectangle31"
            />
            <img
              src="public/external/rectangle382753-s9x-200h.png"
              alt="Rectangle382753"
              class="desktop1-rectangle38"
            />
            <img
              src="public/external/rectangle462753-p39v-200h.png"
              alt="Rectangle462753"
              class="desktop1-rectangle46"
              style="width: 52.5px;"
            />
            <img
              src="public/external/rectangle542753-iqxj-200h.png"
              alt="Rectangle542753"
              class="desktop1-rectangle54"
            />
            <img
              src="public/external/rectangle622753-8a8p-200h.png"
              alt="Rectangle622753"
              class="desktop1-rectangle62"
            />
            <img
              src="public/external/rectangle702753-elbo-200h.png"
              alt="Rectangle702753"
              class="desktop1-rectangle70"
            />
            <img
              src="public/external/rectangle322753-u97o-200h.png"
              alt="Rectangle322753"
              class="desktop1-rectangle32"
            />
            <img
              src="public/external/rectangle392753-c0h-200h.png"
              alt="Rectangle392753"
              class="desktop1-rectangle39"
            />
            <img
              src="public/external/rectangle472753-aoh-200h.png"
              alt="Rectangle472753"
            />
            <img
              src="public/external/rectangle552753-m0wf-200h.png"
              alt="Rectangle552753"
              class="desktop1-rectangle55"
            />
            <img
              src="public/external/rectangle632754-u0og-200h.png"
              alt="Rectangle632754"
              class="desktop1-rectangle63"
            />
            <img
              src="public/external/rectangle712754-ook9-200h.png"
              alt="Rectangle712754"
              class="desktop1-rectangle71"
            />
            <img
              src="public/external/rectangle332754-6vk-200h.png"
              alt="Rectangle332754"
              class="desktop1-rectangle33"
            />
            <img
              src="public/external/rectangle402754-p0ok-200h.png"
              alt="Rectangle402754"
              class="desktop1-rectangle40"
            />
            <img
              src="public/external/rectangle482754-o7rp-200h.png"
              alt="Rectangle482754"
              class="desktop1-rectangle48"
            />
            <img
              src="public/external/rectangle562754-mu8-200h.png"
              alt="Rectangle562754"
              class="desktop1-rectangle56"
            />
            <img
              src="public/external/rectangle642754-28t-200h.png"
              alt="Rectangle642754"
              class="desktop1-rectangle64"
            />
            <img
              src="public/external/rectangle722754-l3o-200h.png"
              alt="Rectangle722754"
              class="desktop1-rectangle72"
            />
            <img
              src="public/external/rectangle342754-n6y8-200h.png"
              alt="Rectangle342754"
              class="desktop1-rectangle34"
            />
            <img
              src="public/external/rectangle412754-ai4-200h.png"
              alt="Rectangle412754"
              class="desktop1-rectangle41"
            />
            <img
              src="public/external/rectangle492755-l46-200h.png"
              alt="Rectangle492755"
              class="desktop1-rectangle49"
            />
            <img
              src="public/external/rectangle572755-d5qk-200h.png"
              alt="Rectangle572755"
              class="desktop1-rectangle57"
            />
            <img
              src="public/external/rectangle652755-xnx-200h.png"
              alt="Rectangle652755"
              class="desktop1-rectangle65"
            />
            <img
              src="public/external/rectangle732755-dnq-200h.png"
              alt="Rectangle732755"
              class="desktop1-rectangle73"
            />
            <img
              src="public/external/rectangle302755-4rhk-200h.png"
              alt="Rectangle302755"
              class="desktop1-rectangle30"
            />
            <img
              src="public/external/rectangle422755-c123-200h.png"
              alt="Rectangle422755"
              class="desktop1-rectangle42"
            />
            <img
              src="public/external/rectangle502755-dpe-200h.png"
              alt="Rectangle502755"
              class="desktop1-rectangle50"
            />
            <img
              src="public/external/rectangle582755-72f-200h.png"
              alt="Rectangle582755"
              class="desktop1-rectangle58"
            />
            <img
              src="public/external/rectangle662755-n8h-200h.png"
              alt="Rectangle662755"
              class="desktop1-rectangle66"
            />
            <img
              src="public/external/rectangle742755-ipdh-200h.png"
              alt="Rectangle742755"
              class="desktop1-rectangle74"
            />
            <span class="desktop1-text148"><span>Family Members</span></span>
            <span class="desktop1-text150"><span>
              <?php
                if (isset($fammember[0])) {
                  echo $fammember[0];
                }
              ?>
              </span></span>
            <span class="desktop1-text152"><span>
              <?php
                if (isset($fammember[1])) {
                  echo $fammember[1];
                }
              ?></span></span>
            <span class="desktop1-text154"><span>
              <?php
                if (isset($fammember[2])) {
                  echo $fammember[2];
                }
              ?></span></span>
            <span class="desktop1-text156"><span>
              <?php
                if (isset($fammember[3])) {
                  echo $fammember[3];
                }
              ?></span></span>
            <span class="desktop1-text158"><span>
              <?php
                if (isset($fammember[4])) {
                  echo $fammember[4];
                }
              ?></span></span>
            <span class="desktop1-text160"><span>
              <?php
                if (isset($relfamhead[0])) {
                  echo $relfamhead[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text162"><span>
              <?php
                if (isset($relfamhead[1])) {
                  echo $relfamhead[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text164"><span>
              <?php
                if (isset($relfamhead[2])) {
                  echo $relfamhead[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text166"><span>
              <?php
                if (isset($relfamhead[3])) {
                  echo $relfamhead[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text168"><span>
              <?php
                if (isset($relfamhead[4])) {
                  echo $relfamhead[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text170"><span>
              <?php
                if (isset($memAge[0])) {
                  echo $memAge[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text172"><span>
              <?php
                if (isset($memAge[1])) {
                  echo $memAge[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text174"><span>
              <?php
                if (isset($memAge[2])) {
                  echo $memAge[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text176"><span>
              <?php
                if (isset($memAge[3])) {
                  echo $memAge[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text178"><span>
              <?php
                if (isset($memAge[4])) {
                  echo $memAge[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text180"><span>
              <?php
                if (isset($memGender[0])) {
                  echo $memGender[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text182"><span>
              <?php
                if (isset($memGender[1])) {
                  echo $memGender[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text184"><span>
              <?php
                if (isset($memGender[2])) {
                  echo $memGender[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text186"><span>
              <?php
                if (isset($memGender[3])) {
                  echo $memGender[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text188"><span>
              <?php
                if (isset($memcivstat[1])) {
                  echo $memcivstat[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text190"><span>
              <?php
                if (isset($memGender[4])) {
                  echo $memGender[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text192"><span>
              <?php
                if (isset($memcivstat[0])) {
                  echo $memcivstat[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text194"><span>
              <?php
                if (isset($memcivstat[2])) {
                  echo $memcivstat[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text196"><span>
              <?php
                if (isset($memcivstat[3])) {
                  echo $memcivstat[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text198"><span>
              <?php
                if (isset($memcivstat[4])) {
                  echo $memcivstat[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text200"><span>
              <?php
                if (isset($Educ[0])) {
                  echo $Educ[0];
                }
              ?>
            </span></span>
            <span class="desktop1-text202"><span>
              <?php
                if (isset($Educ[1])) {
                  echo $Educ[1];
                }
              ?>
            </span></span>
            <span class="desktop1-text204"><span>
              <?php
                if (isset($Educ[2])) {
                  echo $Educ[2];
                }
              ?>
            </span></span>
            <span class="desktop1-text206"><span>
              <?php
                if (isset($Educ[3])) {
                  echo $Educ[3];
                }
              ?>
            </span></span>
            <span class="desktop1-text208"><span>
              <?php
                if (isset($Educ[4])) {
                  echo $Educ[4];
                }
              ?>
            </span></span>
            <span class="desktop1-text210"><span>
              <?php
                if (isset($Remarks[0])) {
                  echo $Remarks[0];
                }
                if (isset($Casualty[0])) {
                  if (!is_null($Casualty[0])) {
                    echo $Casualty[0];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text212"><span>
              <?php
                if (isset($Remarks[1])) {
                  echo $Remarks[1];
                }
                if (isset($Casualty[1])) {
                  if (!is_null($Casualty[1])) {
                    echo $Casualty[1];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text214"><span>
              <?php
                if (isset($Remarks[2])) {
                  echo $Remarks[2];
                }
                if (isset($Casualty[2])) {
                  if (!is_null($Casualty[2])) {
                    echo $Casualty[2];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text216"><span>
              <?php
                if (isset($Remarks[3])) {
                  echo $Remarks[3];
                }
                if (isset($Casualty[3])) {
                  if (!is_null($Casualty[3])) {
                    echo $Casualty[3];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text218"><span>
              <?php
                if (isset($Remarks[4])) {
                  echo $Remarks[4];
                }
                if (isset($Casualty[4])) {
                  if (!is_null($Casualty[4])) {
                    echo $Casualty[4];
                  }
                }
              ?>
            </span></span>
            <span class="desktop1-text220">
              <span>
              <?php
                if (isset($MemOcc[0])) {
                  echo $MemOcc[0];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text222">
              <span>
              <?php
                if (isset($MemOcc[1])) {
                  echo $MemOcc[1];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text224">
              <span>
              <?php
                if (isset($MemOcc[2])) {
                  echo $MemOcc[2];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text226">
              <span>
              <?php
                if (isset($MemOcc[3])) {
                  echo $MemOcc[3];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text228">
              <span>
              <?php
                if (isset($MemOcc[4])) {
                  echo $MemOcc[4];
                }
              ?>
              </span>
            </span>
            <span class="desktop1-text230">
              <span>
                <span>Relation to</span>
                <br />
                <span>Family Head</span>
              </span>
            </span>
            <span class="desktop1-text235"><span>Age</span></span>
            <span class="desktop1-text237"><span>Gender</span></span>
            <span class="desktop1-text239">
              <span>
                <span>Civil</span>
                <br />
                <span>Status</span>
              </span>
            </span>
            <span class="desktop1-text244"><span>Educ.</span></span>
            <span class="desktop1-text246">
              <span>
                <span>Occupational</span>
                <br />
                <span>Skills</span>
              </span>
            </span>
            <span class="desktop1-text251"><span>Remarks</span></span>
            <div class="desktop1-group11" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House & lot owner") {
                    echo '
                <img
                  src="public/external/vector2757-ytff.svg"
                  alt="Vector2757"
                  class="desktop1-vector14"
                />
                ';
                  }
                ?>
              
            </div>
            <div class="desktop1-group15" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner & lot renter") {
                    echo '
                <img
                  src="public/external/vector3172-tksp.svg"
                  alt="Vector3172"
                  class="desktop1-vector15"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group16" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner,rent-free lot with owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-111.svg"
                  alt="Vector3172"
                  class="desktop1-vector16"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group17" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "House owner,rent-free lot w/o owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-29em.svg"
                  alt="Vector3172"
                  class="desktop1-vector17"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group18" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rent-free house & lot with owner's consent") {
                    echo '
                <img
                  src="public/external/vector3172-93wyd.svg"
                  alt="Vector3172"
                  class="desktop1-vector18"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group19" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rent-free house & lot w/o owner's consent") {
                    echo '
                <img
                  src="public/external/vector3173-rcqi.svg"
                  alt="Vector3173"
                  class="desktop1-vector19"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group14" style="border: 1px solid #000000;">
              <?php
                  if ($HouseOwn == "Rented house & lot") {
                    echo '
                <img
                  src="public/external/vector3171-2mq.svg"
                  alt="Vector3171"
                  class="desktop1-vector20"
                />
                ';
                  }
                ?>
            </div>
            <div class="desktop1-group13" style="border: 1px solid #000000;">
              <?php 
              if (isset($housecondition)) {
                if ($housecondition == "Totally Damaged") {
                  echo '<img
                src="public/external/vector3171-37mc.svg"
                alt="Vector3171"
                class="desktop1-vector21"
                />';
                }
              }
              ?>
            </div>
            <div class="desktop1-group12" style="border: 1px solid #000000;">
              <?php 
              if (isset($housecondition)) {
                if ($housecondition == "Partially Damaged") {
                  echo '<img
                    src="public/external/vector3071-8ny5.svg"
                    alt="Vector3071"
                    class="desktop1-vector22"
                  />';
                }
              }
              ?>
            </div>
            
            <?php 
            if (isset($Serial)) {
              echo '<img
              src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=\''.$Serial.'\'"
              alt="QRcodecontainer3173"
              class="desktop1-qrcodecontainer"
            />';
            }
            ?>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
<?php
}
?>