
<?php
$server_name="localhost";

$username="root";

$password="";

$database_name="dafac";

// Check if the session variable is set and determine the database name
if (isset($_SESSION['useBackup']) && $_SESSION['useBackup'] == true) {
    $database_name = "backupdafac";
} else {
    $database_name = "dafac";
}

$conn=mysqli_connect($server_name,$username,$password,$database_name);

?>
