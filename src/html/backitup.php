<?php
session_start();
require "connection.php";

$server_name="localhost";

$username="root";

$password="";

$database_name="dafac";


// $host = $server_name;
// $user = $username;
// $pass = $password;
// $db = $database_name;
// $sqlFile = 'backup_database-function.sql';

// // Read the content of the SQL file
// $sqlContent = file_get_contents($sqlFile);

// // Create a MySQLi connection
// $mysqli = new mysqli($host, $user, $pass, $db);

// // Check the connection
// if ($mysqli->connect_error) {
//     die('Connection failed: ' . $mysqli->connect_error);
// }

// // Execute the queries
// if ($mysqli->multi_query($sqlContent)) {
//     do {
//         // Consume the result set
//         if ($result = $mysqli->store_result()) {
//             $result->free();
//         }
//     } while ($mysqli->more_results() && $mysqli->next_result());

//     echo "SQL file executed successfully.";
// } else {
//     echo "Error executing SQL file: " . $mysqli->error;
// }

// // Close the connection
// $mysqli->close();


function backupDatabase($host, $user, $password, $database, $outputFile)
{
    // Construct the mysqldump command
    $command = "mysqldump -h $host -u $user -p'$password' $database > $outputFile";

    // Execute the command
    $output = shell_exec($command);

    // Check for errors
    if ($output === null) {
        return false; // Command execution failed
    }

    // Check for mysqldump errors in the output
    if (stripos($output, 'mysqldump: [Warning] Using a password on the command line interface can be insecure.') !== false) {
        return false; // Warning about password in the command line
    }

    return true; // Backup successful
}

// Example usage
$host = $server_name;
$user = $username;
$password = $password;
$database = $database_name;
$outputFile = "dafacbackup.sql";


// error_reporting(0);
function backDb($host, $user, $pass, $dbname, $tables = '*'){
 
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
 
    if($tables == '*'){
        $tables = array();
        $sql = "SHOW TABLES";
        $query = $conn->query($sql);
        while($row = $query->fetch_row()){
            $tables[] = $row[0];
        }
    }
    else{
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
 
 
    $outsql = '';
    foreach ($tables as $table) {
 
 
        $sql = "SHOW CREATE TABLE `$table`";
        $query = $conn->query($sql);
        $row = $query->fetch_row();
 
        $outsql .= "\n\n" . $row[1] . ";\n\n";
 
        $sql = "SELECT * FROM `$table`";
        $query = $conn->query($sql);
 
        $columnCount = $query->field_count;
 
 
        for ($i = 0; $i < $columnCount; $i ++) {
            while ($row = $query->fetch_row()) {
                $outsql .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j ++) {
                    $row[$j] = $row[$j];
 
                    if (isset($row[$j])) {
                        $outsql .= '"' . $row[$j] . '"';
                    } else {
                        $outsql .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $outsql .= ',';
                    }
                }
                $outsql .= ");\n";
            }
        }
 
        $outsql .= "\n"; 
    }
 
 
    $backup_file_name = (time()).'_'.$dbname . '_database.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    fwrite($fileHandler, $outsql);
    fclose($fileHandler);
 
 
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    readfile($backup_file_name);
    exec('rm ' . $backup_file_name);
 
}

if (backDb($host, $user, $password, $database)) {
    // Backup successful, show JavaScript alert
    echo "<script>alert('Backup successful!'); 

    window.location.replace('switcher.php');</script>";
} else {
    // Backup failed
    echo "Backup failed!";
}


?>