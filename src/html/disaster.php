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
  <title>Disaster Management</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/ds.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            
            <?php
            $priviledge = $_SESSION['Priviledge'];
            if ($priviledge == "Admin") {
            echo
            '<li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admin</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./accounts.php" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Account Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="recent actiivty.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Recent Activity</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./barangay.php" aria-expanded="false">
                <span>
                  <i class="ti ti-basket"></i>
                </span>
                <span class="hide-menu">Barangay Records</span>
              </a>
            </li>';
            }
?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./masterlist.php" aria-expanded="false">
                <span>
                  <i class="ti ti-receipt"></i>
                </span>
                <span class="hide-menu">Masterlist</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="evacuation.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Manage Evac Centers</span>
              </a>
            </li>
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="disaster.php" aria-expanded="false">
                <span>
                  <i class="ti ti-bolt"></i>
                </span>
                <span class="hide-menu">Disaster Management</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">COMPONENTS</span>
            </li>
            <?php
            include 'mobilechecker.php';
              if (isMobileDevice()) {
                echo '
                <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-alerts-alt.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">QR Code Scanner</span>
                </a>
              </li>';
            }
            else{
              ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Add new Resident</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Generate QR Code</span>
              </a>
            </li>
            <li class="sidebar-item">
                <script>
              function assistme() {
                  if (document.getElementById("assistthis").style.display == "none") {
                    document.getElementById("assistthis").style.display = "block";
                    document.getElementById("assistingarrow").style.transform = "rotate(180deg)";
                  }
                    else{
                    document.getElementById("assistthis").style.display = "none";
                    document.getElementById("assistingarrow").style.transform = "rotate(0deg)";
                  }
                  
                }
                </script>
              <a class="sidebar-link" onclick="assistme()" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Assistance Form</span>
                <span class="rotate" id="assistingarrow" style="margin-right: 0px; margin-left: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                </span>
              </a>
              <span id="assistthis" style="display: none;margin-left: 50px;margin-right: auto;">
              <ul class="sidebar-submenu"> 
                <li class="sidebar-item">
                  <a class="sidebar-link" href="assistance.php" aria-expanded="false">
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="relief.php" aria-expanded="false">
                    <span>Relief Distribution</span>
                  </a>
                </li>
              </ul>
              </span>
            </li>
            <?php
                }
            ?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Records</span>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-card.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-user"></i>
                    </span>
                    <span>Family</span>
                  </a>
                </li> 
                <li class="sidebar-item">
                  <a class="sidebar-link" href="damages.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-flag"></i>
                    </span>
                    <span>Damage</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="relief-records.php" aria-expanded="false">
                    <span>
                      <i class="ti ti-package"></i>
                    </span>
                    <span>Relief Distribution</span>
                  </a>
                </li>
            <li class="sidebar-item">
              
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link logout" href="./logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login" style="color: red;"></i>
                </span>
                <span class="hide-menu" style="color: red;">Logout</span>
              </a>
            </li>
            <li style="color: white;">
              <div style="height: 50px;"></div>
            </li>
<style>
  .sidebar-nav ul .sidebar-item .logout:hover {
    background-color: rgba(93,135,255,0.1);
    color: red;
  }
  .me-2 {
    margin-right: 0.5rem!important;
  }
  .nopadd{
    padding: 0;
  }
  .row{
    padding-left: 35px;
    padding-right: 35px;
  }
  .btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
  }
  .btn-default:focus {
      color: #333;
      background-color: #e6e6e6;
      border-color: #8c8c8c;
  }
  .btn-default:hover {
      color: #333;
      background-color: #e6e6e6;
      border-color: #adadad;
  }
  .btn-default:active {
      color: #333;
      background-color: #e6e6e6;
      border-color: #adadad;
  }
</style>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header" style="border-bottom: 1px solid lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a> -->
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                </a> -->
                <span><?php echo $profile; ?></span>
                <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="./logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
<head>
  <link rel="stylesheet" href="tablestyle.css">
  <style>
  .truncate-text {
    max-width: 120px; /* Set the maximum width of the cell */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; /* Display an ellipsis (...) to indicate truncated text */
  }
  table.dataTable thead th, table.dataTable thead td {
    padding: 7.5px;
  }
</style>
</head>
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="formbold-main-wrapper">

<form method="post" action="disaster-edit.php">

<h3 class="center">DISASTERS</h3>
  <div class="account-details">
    <div>
      <div class="container">
  </div>
  <table id="disastertable" class="fl-table">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;">Action</th>
        <th style="text-align: center; vertical-align: middle;">Disaster</th>
        <th style="text-align: center; vertical-align: middle;">Occured</th>
      </tr>
    </thead>
    <tbody id="data-table">
        <?php
          $sql = "SELECT * FROM `disaster`;";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query: " . $connection
                          ->error);
                    }

          while ($row = $result->fetch_assoc()) {

              echo "
                <tr data-row-id='" . $row["Disaster_ID"] . "'>
                    <td class='edit-btn-container' style='vertical-align: middle;'>
                      <button type=\"button\" class=\"btn btn-primary btn-sm edit-btn\" data-toggle=\"modal\" name='Edit' value='" . $row["Disaster_ID"] . "'><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></button>
                      <button type=\"submit\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" name='Delete' value='" . $row["Disaster_ID"] . "'><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></button>
                    </td>
                    <td class='chairman-cell' style='vertical-align: middle;'>" . $row["Disaster"] . "</td>
                    <td class='contact-no-cell' style='vertical-align: middle;'>" . $row["Occurred"] . "</td>
                </tr>";

            }
        ?>
    </tbody>
  </table>
</form>
        </div>

          <form method="post" action="evactest.php">
            <center>
              <button class="btn btn-primary" type="submit" name="disaster-add">Add</button>
            </center>
          </form>

      </div>
    </div>
  </div>
</div>

<script>
   $(document).ready(function () {
      $("#disastertable").dataTable({
        "lengthMenu": [5, 10, 15, 20, 50],
        "pageLength": 5,
        "ordering": false
      });
    });

    </script>

<!-- Edit function Starts Here -->

<script>
  // Declare variables in a higher scope
var originalChairmanContent, originalContactNoContent;

// Variable to store the currently edited row
var currentlyEditedRow = null;

// Function to restore the original content of the edited row
function restoreOriginalContent() {
  if (currentlyEditedRow) {
    var chairmanCell = currentlyEditedRow.find('.chairman-cell');
    var contactNoCell = currentlyEditedRow.find('.contact-no-cell');

    // Retrieve the original content and replace the input fields
    chairmanCell.html(originalChairmanContent);
    contactNoCell.html(originalContactNoContent);

    // Change the button class and icon back to "Edit"
    currentlyEditedRow.find('.edit-btn').removeClass('btn-danger').addClass('btn-primary');
    currentlyEditedRow.find('.edit-btn i').text('');
    // Remove the "Check" button
    currentlyEditedRow.find('.check-btn').remove();

    // Reset the currently edited row
    currentlyEditedRow = null;
  }
}


// Event delegation for edit action
$('#data-table').on('click', '.btn-primary', function () {

   // If there's an ongoing edit, restore its original content first
  restoreOriginalContent();

  // Save the currently edited row
  currentlyEditedRow = $(this).closest('tr');
  
  // Save the original innerHTML before turning into input
  var chairmanCell = $(this).closest('tr').find('.chairman-cell');
  var contactNoCell = $(this).closest('tr').find('.contact-no-cell');

  originalChairmanContent = chairmanCell.html();
  originalContactNoContent = contactNoCell.html();

  // Create input fields with current values
    var chairmanInput = $('<input type="text" name="upEvac" class="form-control" value="' + chairmanCell.text() + '">');
    var contactNoInput = $('<input type="date" name="upAdd" class="form-control" value="' + contactNoCell.text() + '">');

    // Replace cell content with input fields
    chairmanCell.html(chairmanInput);
    contactNoCell.html(contactNoInput);

  // Change button class and icon to cancel
  $(this).removeClass('btn-primary').addClass('btn-danger btn-wagna');
  $(this).find('i').text('close');

  // Append a "Check" button with a check icon
var editButtonValue = $(this).val();
var checkButton = $('<button>', {
  type: 'button',
  class: 'btn btn-success btn-sm check-btn',
  value: editButtonValue,
  html: '<i class="material-icons">check</i>',
  click: function () {
    // Get the input values
    var upCapValue = document.getElementsByName('upEvac')[0].value;
    var upNoValue = document.getElementsByName('upAdd')[0].value;

    // Get the value of the button (theID)
    var theIDValue = editButtonValue; // Use the value of the "Edit" button

    // Create a FormData object to send the values as a form
    var formData = new FormData();
    formData.append('upEvac', upCapValue);
    formData.append('upAdd', upNoValue);
    formData.append('Update', theIDValue);  // Include theID in the FormData

    // Use the fetch API to send a POST request
    fetch('disaster-action-json.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())  // Assuming the response is in JSON format
    .then(data => {
      // Handle the response data, e.g., show a success message
      console.log(data);

      // Assuming 'data' contains the updated values from the server response
      var updatedRowId = data.updatedData.brgyID;
      var updatedChairman = data.updatedData.Chair;
      var updatedContactNo = data.updatedData.Contno;

      // Update the corresponding <td> elements in the specific row
      var chairmanCell = document.querySelector('[data-row-id="' + updatedRowId + '"] .chairman-cell');
      var contactNoCell = document.querySelector('[data-row-id="' + updatedRowId + '"] .contact-no-cell');

      chairmanCell.innerText = updatedChairman;
      contactNoCell.innerText = updatedContactNo;

      // Restore the "Edit" button
    var rowId = $(this).val();
    restoreEditButton(rowId);
    })
    .catch(error => {
      // Handle errors
      console.error('Error:', error);
    });


    // Change button class and icon back to edit
    function restoreEditButton(rowId) {
  // Restore the "Edit" button
  var editButton = $('<button>', {
    type: 'button',
    class: 'btn btn-primary btn-sm edit-btn',
    value: rowId,
    html: '<i class="material-icons">&#xE254;</i>',
    click: function () {
          // Your existing code for handling the "Edit" button click
        }
      });

  // Remove the button with the class "btn-wagna"
  $('[data-row-id="' + rowId + '"] .btn-wagna').remove();
      // Replace only the "Check" button with the restored "Edit" button
  $('[data-row-id="' + rowId + '"] .check-btn').replaceWith(editButton);

  // Reset the currently edited row
      currentlyEditedRow = null;

    }


  }
});

  // Insert the "Check" button after the "Cancel" button
  $(this).after(checkButton); 
});

// Event delegation for cancel action
$('#data-table').on('click', '.btn-danger', function () {
  var chairmanCell = $(this).closest('tr').find('.chairman-cell');
  var contactNoCell = $(this).closest('tr').find('.contact-no-cell');

  // Retrieve the original content and replace the input fields
  chairmanCell.html(originalChairmanContent);
  contactNoCell.html(originalContactNoContent);

  // Change button class and icon back to edit
  $(this).removeClass('btn-danger').addClass('btn-primary');
  $(this).find('i').text('');
  // Remove the "Check" button
  $(this).closest('tr').find('.btn-success').remove();


});


</script>

<?php
}
?>
</body>
</html>