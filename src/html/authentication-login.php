<!doctype html>
<?php
session_start();
require "connection.php";
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DAFAC SYSTEM</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ds.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['loginbtn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
?>
<!-- BACKEND STARTS HERE -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/ds.png" width="180" alt="">
                </a>
                
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <?php  

                            $sql_u = "SELECT * FROM `accounts` WHERE Username = '$username' AND Password = '$password';";
                            $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));

                            if (mysqli_num_rows($res_u) > 0){
                                while ($row = $res_u->fetch_assoc()){
                                $_SESSION['Acc_ID'] = $row['Account_ID'];
                                $_SESSION['Username'] = $row['Username'];
                                $_SESSION['Email'] = $row['Email'];
                                $_SESSION['Password'] = $row['Password'];
                                $_SESSION['Priviledge'] = $row['Priviledge'];
                                $_SESSION['useBackup'] = false;
                                $_SESSION['switching'] = false;

                                if ($_SESSION['Priviledge'] != "Unapproved") {
                                
                                echo "<script>
                                      alert('Sign In Success! with ".$_SESSION['Username']." ".$_SESSION['Email']." ".$_SESSION['Password']."');
                                      </script>
                                      ";
                                header("Location: ./index.php"); 

                                }
                                else{
                                  echo "<script>
                                      alert('This Account is not yet Approved');
                                      window.location.replace('authentication-login.php')
                                      </script>";
                                }
                              }
                            }
                            else{
                              echo '<div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input style="box-shadow: 0 0 5px rgba(255, 50, 40, 1)" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="' . $username . '" name="username">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input style="box-shadow: 0 0 5px rgba(255, 50, 40, 1)" type="password" class="form-control" id="exampleInputPassword1" name="password">
                    <label for="exampleInputEmail1" class="form-label">Username or Password is Incorrect</label>
                  </div>';
                            }
                            ?>
                  

                  <div class="d-flex align-items-center justify-content-between mb-4">

                    <div class="form-check">
                      <!-- <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this Device
                      </label> -->

                    </div>

                    <!-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> -->
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="loginbtn">Sign In</button>
                  <!-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New Staff?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-register.php">Create an account</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BACKEND ENDS HERE -->
<?php
  }
  else{
    echo "Something went wrong";
  }
}
else{
?>

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/ds.png" width="180" alt="">
                </a>
                
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" required="required">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>

                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <!-- <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this Device
                      </label> -->
                    </div>

                    <!-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> -->
                  </div>
                  
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="loginbtn">Sign In</button>
                  <!-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New Staff?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-register.php">Create an account</a>
                  </div>
 -->                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php 
}
?>
</body>

</html>