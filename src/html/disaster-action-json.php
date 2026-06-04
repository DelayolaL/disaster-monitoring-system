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
			  $upDis = $_POST['upEvac'];
			  $upOccur = $_POST['upAdd'];

			  $sql = "SELECT * FROM `disaster` WHERE `Disaster_ID` = '$theID';";
			   $result = $conn->query($sql);
			   if ($result) {
			    // Fetch the result as an associative array
			    $row = mysqli_fetch_assoc($result);

			    // Check if a row was found
			    if ($row) {
			        // Access the value of the Evac_Center_Name column
			        $DisasterName = $row['Disaster'];

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
			  
			  $sql_query = "UPDATE `disaster` SET `Disaster` = COALESCE(NULLIF('$upDis',''), `Disaster`), `Occurred` = COALESCE(NULLIF('$upOccur',''), `Occurred`) WHERE `disaster`.`Disaster_ID` = '$theID';";

        if ($conn->query($sql_query) === TRUE) {
        		$recentact = "Disaster [".$DisasterName."] Has Been Updated";


						$recentsql = "INSERT INTO `recent activity` (`Act_ID`, `Activity`, `Activity_Type`, `Account_Used`) VALUES (NULL, '$recentact', 'UPDATE', '$profile');";
						mysqli_query($conn, $recentsql);

						
            $response = ['success' => true, 'message' => 'Data successfully updated'];
            $sql = "SELECT * FROM `disaster` WHERE `disaster`.`Disaster_ID` = $theID;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $brgyID = $row["Disaster_ID"];
                $Chair = $row["Disaster"];
                $Contno = $row["Occurred"];
            }

            $response = [
                'success' => true,
                'message' => 'Data successfully updated',
                'updatedData' => [
                    'brgyID' => $brgyID,
                    'Chair' => $Chair,
                    'Contno' => $Contno
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

