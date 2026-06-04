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
        $upCap = $_POST['upCap'];
        $updateNo = $_POST['upNo'];

        // Check connection
        if ($conn->connect_error) {
            $response = ['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error];
            echo json_encode($response);
            exit();
        }

        // Prepare and execute the SQL query
        $sql_query = "UPDATE `barangay` SET `Barangay_Chairman` = COALESCE(NULLIF('{$upCap}',''), `Barangay_Chairman`), `Contact_Number` = COALESCE(NULLIF('{$updateNo}',''), `Contact_Number`) WHERE `barangay`.`Barangay_ID` = '{$theID}'";

        if ($conn->query($sql_query) === TRUE) {
            $response = ['success' => true, 'message' => 'Data successfully updated'];

            

            
            $sql = "SELECT * FROM `barangay` WHERE `Barangay_ID` = $theID;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $brgyID = $row["Barangay_ID"];
                $Chair = $row["Barangay_Chairman"];
                $Contno = $row["Contact_Number"];
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
