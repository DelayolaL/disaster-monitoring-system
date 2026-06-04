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
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Style for the first div */
    #div1 {
      position: absolute;
      top: 50px;
      left: 50px;
      background-color: #e0e0e0;
      padding: 10px;
      z-index: 2;
    }

    /* Style for the second div */
    #div2 {
      position: absolute;
      top: 70px;
      left: 70px;
      background-color: #b0b0b0;
      padding: 10px;
      z-index: 1;
    }
  </style>
</head>
<body>
  <!-- First Div -->
  <div id="div1">
    <p>This is the first div.</p>
  </div>

  <!-- Second Div -->
  <div id="div2">
    <p>This is the second div. It overlaps with the first div.</p>
  </div>
</body>
<?php 
}
?>
</html>