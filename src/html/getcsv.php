<?php

$server_name="localhost";

$username="root";

$password="";

$database_name="dafac";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

// $nulltest = '';
function sqlresgetter($sql, $conn)
        {
          $result = $conn->query($sql);
          return $result;
        }
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

$sql = "SELECT `barangay`.`Barangay_ID`, `barangay`.`Barangay_Name` AS Barangay, `family`.`Serial_No.` AS Serial, CONCAT(`family`.`Head_firstName`, ' ', `family`.`Head_midName`, ' ', `family`.`Head_lastName`) AS NAME_OF_FAMILY_HEAD, `family`.`4Ps Beneficiary` AS 4ps_Yes_or_No, `damages`.`Housing_Condition` AS Totally_or_Partially_Damaged, 'Inside' AS Inside_or_Outside_Evacuation FROM `barangay` INNER JOIN `family` ON `family`.`Barangay_ID` = `barangay`.`Barangay_ID` INNER JOIN `damages` ON `damages`.`Serial_No.` = `family`.`Serial_No.` ORDER BY `barangay`.`Barangay_ID` ASC;";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }
                    $indexno = 0;
          while ($row = $result->fetch_assoc()) {
            $indexno += 1;
            $familyserial = $row["Serial"];

            $memsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial;";
            $malesql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Gender` = 'Male';";
            $femalesql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Gender` = 'Female';";
            $seniorsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = $familyserial AND `Age` > 59;";
            $PWDsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$familyserial' AND `Remarks` LIKE '%C%';";
            $Pregsql = "SELECT * FROM `family_members` WHERE `Serial_No.` = '$familyserial' AND `Remarks` LIKE '%D%';";

            $memres = sqlresgetter($memsql,$conn);
            $maleres = sqlresgetter($malesql,$conn);
            $femaleres = sqlresgetter($femalesql,$conn);
            $seniorres = sqlresgetter($seniorsql,$conn);
            $pwdres = sqlresgetter($PWDsql,$conn);
            $pregres = sqlresgetter($Pregsql,$conn);

            $memcount = mysqli_num_rows($memres);
            $malecount = mysqli_num_rows($maleres);
            $femalecount = mysqli_num_rows($femaleres);
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


function convertTableToCsv($html, $filename = 'output.csv') {
    $dom = new DOMDocument();
    $dom->loadHTML($html);

    $table = $dom->getElementsByTagName('table')->item(0);
    $thead = $table->getElementsByTagName('thead')->item(0);
    $tbody = $table->getElementsByTagName('tbody')->item(0);

    $columnNames = [];
    foreach ($thead->getElementsByTagName('th') as $th) {
        $columnNames[] = trim($th->nodeValue);
    }

    $rows = [];
    foreach ($tbody->getElementsByTagName('tr') as $row) {
        $rowData = [];
        foreach ($row->getElementsByTagName('td') as $cell) {
            $rowData[] = trim($cell->nodeValue);
        }
        $rows[] = $rowData;
    }

    $csvContent = implode(',', $columnNames) . PHP_EOL;
    foreach ($rows as $row) {
        $csvContent .= implode(',', $row) . PHP_EOL;
    }

    // Send headers to force download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Output CSV content
    echo $csvContent;

    // Terminate the script
    exit();
}

convertTableToCsv($htmltable, 'output.csv');
echo $htmltable;
?>