<!DOCTYPE html>
<?php


include 'php/conexion.php';
/*
if (isset($_POST['username']) && isset($_POST['password']) && $_POST['password'] != "") {

    $squlito = "SELECT username,password from users where username ='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'";
   
    $result = $conn->query($squlito);
//echo $result;
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_row()) {
            $uss = $row[0];
            $number = $row[1];
            echo $uss;
            //header('location:regInfo.php');
            //echo "<script>alert('is statement');</script>";
        }
        
        session_start();
        $_SESSION['username'] = isset($_POST['username']);
        $_SESSION['password'] = isset($_POST['password']);

        
       
       // header('location:regInfo.php');
    } else {
        echo "<script>alert('Alguno de los campos no es válido.');</script>";
        header('location:index.php');
    }
}
*/


    session_start();
    include('php/conexion.php');
    if (isset($_POST['login']) && isset($_POST['password']) && $_POST['password'] != "") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query ="SELECT * FROM users WHERE username='".$_POST['password']."' AND password = '" . md5($_POST['password']) . "'";
        echo $query;
        
        $result = $conn-> query($query);
        $row = $result -> fetch_assoc();


        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if ($password = $row) {
                $_SESSION['username'] = $row['username'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location: regInfo.php');
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
                echo $query[0];
            }
        }
    }
?>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Dchamp´s Travel Log-in</title>

    <!-- Icons font CSS-->
    <link href="colorlib-regform-3/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    

    <!-- Main CSS-->
    <link href="colorlib-regform-3/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3" style="background-color: aliceblue;">
                <div class="card-heading">
                   <div class="logo" style="position: absolute; margin-top: 80px; margin-left: 90px; "><img src="imgs/logoDemo.png" style="height: 150px; border-radius: 15px;"> </div> 
                </div>
                <div class="card-body">
                    <h2 class="title">Log-in</h2>
                  
                    <form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
  </div>
  <button type="submit" name="login" value="login">Log In</button>
</form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="colorlib-regform-3/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="colorlib-regform-3/vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-3/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-3/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->


