<?php
header('Content-Type: application/json');
require "connection.php";
session_start();

if (!isset($_SESSION['Username']) || !isset($_SESSION['Email']) || !isset($_SESSION['Password'])) {
    $response = ['success' => false, 'message' => 'Please Login first'];
    echo json_encode($response);
    exit;
} else {
    $profile = $_SESSION['Username'];
    $priviledge = $_SESSION['Priviledge'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


    	// Check connection
        if ($conn->connect_error) {
            $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
            echo json_encode($response);
            exit();
        }

        // Get the values from the POST request
         $theID = $_POST['Update'];
          $upevacsite = $_POST['upEvac'];
          $upDuring = $_POST['upDuring'];
          $upDate = $_POST['upDate'];
          $upHouseCond = $_POST['upCondition'];

			  $sql = "SELECT * FROM `damages` INNER JOIN `family` ON `damages`.`Serial_No.` = `family`.`Serial_No.` WHERE `damages`.`damage_ID` = '$theID';";
			   $result = $conn->query($sql);
			   if ($result) {
			    // Fetch the result as an associative array
			    $row = mysqli_fetch_assoc($result);

			    // Check if a row was found
			    if ($row) {
			        // Access the value of the Evac_Center_Name column
			        $FamilyName = $row['Family_Name'];

			    } else {
			        // No row found for the specified Evac_ID
			        echo "Nothing was found for the specified ID";
			    }

			    // Free the result set
			    mysqli_free_result($result);
			    } else {
			        // Query failed
			        echo "Error executing query: " . mysqli_error($conn);
			    }
			  
			  $sql_query = "UPDATE `damages` SET `Evac_Cent_ID` = COALESCE(NULLIF('$upevacsite',''), `Evac_Cent_ID`), `Date` = COALESCE(NULLIF('$upDate',''), `Date`), `Assistance During:` = COALESCE(NULLIF('$upDuring',''), `Assistance During:`), `Housing_Condition` = COALESCE(NULLIF('$upHouseCond',''), `Housing_Condition`) WHERE `damages`.`damage_ID` = '$theID';";

        if ($conn->query($sql_query) === TRUE) {
        		$recentact = "Damage of Family [".$FamilyName."] Has Been Updated";


						$recentsql = "INSERT INTO `recent activity` (`Act_ID`, `Activity`, `Activity_Type`, `Account_Used`) VALUES (NULL, '$recentact', 'UPDATE', '$profile');";
						mysqli_query($conn, $recentsql);

						
            $response = ['success' => true, 'message' => 'Data successfully updated'];
            $sql = "SELECT * FROM `damages` INNER JOIN `evac_center` ON `damages`.`Evac_Cent_ID` = `evac_center`.`Evac_ID` WHERE `damage_ID` = $theID;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $DmgID = $row["damage_ID"];
                $EvacuationCenter = $row["Evac_Center_Name"];
                $HousingCondition = $row["Housing_Condition"];
                $AssistanceDuring = $row["Assistance During:"];
                $Date = $row["Date"];
            }

            $response = [
                'success' => true,
                'message' => 'Data successfully updated',
                'updatedData' => [
                    'DmgID' => $DmgID,
                    'EvacuationCenter' => $EvacuationCenter,
                    'HousingCondition' => $HousingCondition,
                    'AssistanceDuring' => $AssistanceDuring,
                    'Date' => $Date
                ]
            ];
            echo json_encode($response);
        } else {
            $response = ['success' => false, 'message' => 'Error updating data: ' . $conn->error];
            echo json_encode($response);
        }

        // Close the database connection
        $conn->close();
    } else {
        $response = ['success' => false, 'message' => 'Invalid request'];
        echo json_encode($response);
    }
}
?>

