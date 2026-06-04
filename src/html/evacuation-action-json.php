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
  // Get the values from the POST request
  $theID = $_POST['Update'];
  $upEvac = $_POST['upEvac'];
  $upAdd = $_POST['upAdd'];

  $sql = "SELECT Evac_Center_Name FROM evac_center WHERE Evac_ID = '$theID';";
   $result = $conn->query($sql);
   if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Check if a row was found
    if ($row) {
        // Access the value of the Evac_Center_Name column
        $evacCenterName = $row['Evac_Center_Name'];

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
  
  

        // Check connection
        if ($conn->connect_error) {
            $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
            echo json_encode($response);
            exit();
        }

        // Prepare and execute the SQL query
        $sql_query = "UPDATE `evac_center` SET `Evac_Center_Name` = COALESCE(NULLIF('$upEvac',''), `Evac_Center_Name`), `Address` = COALESCE(NULLIF('$upAdd',''), `Address`) WHERE `evac_center`.`Evac_ID` = '$theID';";
  

        if ($conn->query($sql_query) === TRUE) {
            $recentact = "Evacuation Center [".$evacCenterName."] Has Been Updated";


            $recentsql = "INSERT INTO `recent activity` (`Act_ID`, `Activity`, `Activity_Type`, `Account_Used`) VALUES (NULL, '$recentact', 'UPDATE', '$profile');";
            mysqli_query($conn, $recentsql);

            $response = ['success' => true, 'message' => 'Data successfully updated'];
            $sql = "SELECT * FROM `evac_center` WHERE `evac_center`.`Evac_ID` = $theID;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $brgyID = $row["Evac_ID"];
                $Chair = $row["Evac_Center_Name"];
                $Contno = $row["Address"];
            }

            $response = [
                'success' => true,
                'message' => 'Data successfully updated',
                'updatedData' => [
                    'brgyID' => $theID,
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


