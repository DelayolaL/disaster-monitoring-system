<?php
session_start();

// Set a session variable to indicate whether to use the backup database

if ($_SESSION['useBackup'] == false) {
	$_SESSION['useBackup'] = true;
	echo "backup is now true";
}
else{
	$_SESSION['useBackup'] = false;
	echo "backup is now false";
}
$_SESSION['switching'] = true;
// Redirect to some page or display a message indicating the switch
header("Location: index.php"); // Redirect to your home page or any other page
exit();
?>
