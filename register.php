<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include "include/config.php";
    ob_start();
    session_start();

  if(isset($_POST["SignUp"]))
  {
    if(isset($_REQUEST['adminID']))
    {
      $adminID=$_REQUEST['adminID'];
    }

    if(!empty($adminID))
    {
      $adminID=$_POST['adminID'];
    }
    else
    {
      ?> <h1>Anda harus mengisi data</h1> <?php
      die("anda harus memasukkan datanya");
    }

    $adminNama = $_POST['adminNama'];
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = MD5($_POST['adminPassword']);
 
    mysqli_query($connection, "INSERT INTO `admin` (`adminID`, `adminNama`, `adminEmail`, `adminPassword` ,'adminFoto') VALUES ('$adminID', '$adminNama', '$adminEmail', '$adminPassword' ,'User.jpg');");

        //    $adminPassword = MD5($_POST["pass"]);
            $sql_login = mysqli_query($connection, "SELECT * FROM admin");

            if(mysqli_num_rows($sql_login)>0)
            {
                $row_admin = mysqli_fetch_array($sql_login);
                $_SESSION['kodeuser'] = $row_admin['adminID'];
                $_SESSION['adminEmail'] = $row_admin['adminEmail'];
                header("location:index.php");
            }

  }
?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src=https://res.cloudinary.com/deedolmlr/image/upload/v1605663844/PHP/login_d9pqpm.jpg width="455" height="100%">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="adminID" name="adminID"
                                        placeholder="admin ID" maxlength="4">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="adminNama" name="adminNama"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="adminEmail" name="adminEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="adminPassword" name="adminPassword"
                                        placeholder="Email Password">
                                </div>
                                <input type="submit" name="SignUp" class="btn btn-primary btn-user btn-block" value="SignUp">
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>