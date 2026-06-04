<!doctype html>
<html lang="en">
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
  $profile = $_SESSION['Username'];
  $priviledge = $_SESSION['Priviledge'];
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barangay Management</title>
</head>
<body>
<?php
if (isset($_POST['Update'])) {

	$theID = $_POST['Update'];
	$upCap = $_POST['upCap'];
	$updateNo = $_POST['upNo'];

	$sql_query = "UPDATE `barangay` SET `Barangay_Chairman` = COALESCE(NULLIF('$upCap',''), `Barangay_Chairman`), `Contact_Number` = COALESCE(NULLIF('$updateNo',''), `Contact_Number`) WHERE `barangay`.`Barangay_ID` = '$theID';";

if (mysqli_query($conn, $sql_query)){
	echo "<script>
		window.alert('Successfully Updated!');
		window.location.replace('barangay.php')
	</script>";

}
else{
	echo "<script>
		window.alert('SQL script error');
		window.location.replace('barangay.php')
	</script>";
}



}
else{
	echo "<script>
		window.alert('Something Went Wrong');
		window.location.replace('barangay.php')
	</script>";
}
}
?>
</body>
</html>
