<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Registro de Hotel</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="barePages/assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="barePages/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-------------------------------CSS FOR HIDDEN TEXT INPUTS------------>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>







</head>

<body onload="myFunction()">
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img src="imgs/logoDemoNAV.png" alt="logotipo" width="60px" height="40px">
            <a class="navbar-brand" href="#">D'CHAMPS TRAVEL AGENCY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="regInfo.php">Reservaciones</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Salir</a></li>
                   
                   
                </ul>
            </div>
        </div>
    </nav>

  <div class="container">
    <div class="text-center mt-5">
      <div class="card-3">


        <form method="POST" action="">





          <?php

          session_start();

          if (!isset($_SESSION['username'])) {
            header('location:index.php');
          }
          $fechaIni = $_SESSION['datepicker'];
          $fechFin = $_SESSION['trip-end'];
          $folioGlobal1 = $_SESSION['folio'];
          $itnrNum = $_SESSION['inputItinerario'];
          //$fechaIni = $_POST['datepicker'];
          //$fechFin  = $_SESSION['trip-end'];
          include 'php/conexion.php';




          //$fechaIni ='2021-08-01';
          //$fechFin = '2021-08-08 +1 day';
          setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
          $date1 = $date1 = str_replace("/", "-", $fechaIni);
          setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
          $date2 = $date2 = str_replace("/", "-", $fechFin);



          $period = new DatePeriod(new DateTime($date1), new DateInterval('P1D'), new DateTime($date2));
          /*  foreach ($period as $date) {
        $dates = $date->format("D");

        
    
        //$sqldesglose="INSERT INTO `desglodays` (`id`, `itnrDesglo`, `dia`, `price`) VALUES ('', '1', '".$dates."', '235.29');";
      
        //mysqli_query($conn, $sqldesglose);
       
    }*/




          $i = 0;
          foreach ($period as $key =>  $date) {
            $dates = $date->format("d-M-Y");








          ?>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label><span><?php echo strftime('%d %B %Y', strtotime($dates)); ?></span></label>
              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control form-control-lg" id="numFields10" name="precioHab[]" placeholder="Monto $" value=""> <br>
              </div>
            </div>

          <?php  }








          ?>

          <?php

          if (isset($_POST['submit'])) {
            echo '<script>alert("Submit button")</script>';


            $taxhab = $_POST['taxhab'];
            $tax = $_POST['tax'];



            foreach ($period as $key => $value) {
              $i = 0;
              foreach ($period as $key =>  $date) {
                $dates = $date->format("Y-m-d");

                $lastname = $_POST['precioHab'][$key];
                $conn->query("INSERT INTO `desglodays` VALUES('', '$itnrNum', '$dates', '$lastname','$_SESSION[folio]','Habitacion' )") or die(mysqli_error($conn));

                //$checkquery = "INSERT INTO desglodays VALUES('', '12', '".$dates."', '".$lastname."')";
                //echo $checkquery;


              }
            }
            $conn->query("INSERT INTO `desglodays` VALUES('', '$itnrNum', '$dates', '$tax','$_SESSION[folio]','Impuesto' )") or die(mysqli_error($conn));


           
            //header("location:result.php");
            echo '<script>alert("Header")</script>';
            header('Location:boot.php');
            // echo $_SESSION['trip-end'];
            //echo $fechaIni; 
            if (!empty($_POST['taxhab'])) {
              $conn->query("INSERT INTO `desglodays` VALUES('', '$itnrNum', '$dates', '$taxhab','$_SESSION[folio]','ImpHabAdic' )") or die(mysqli_error($conn));
              header('Location: boot.php');
            } else {
              //echo '<script>alert("taxhab empty")</script>';
            }
            
          }
          // echo $_SESSION['datepicker'];
          // echo $_SESSION['trip-end'];
          // echo $_SESSION['folio'];
          // echo $itnrNum;

          ?>
          <div class="form-row">
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
              <label for="inputItinerario">
                <h5>Impuestos Habitacion</h5>
              </label>
              <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control form-control-lg" id="taxhab" name="taxhab" placeholder="tax">
              <label for="inputItinerario">
                <h5>Impuestos</h5>
              </label>
              <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control form-control-lg" id="tax" name="tax" placeholder="tax" required>
              <button class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-save"></span>
                Submit</button>
            </div>
          </div>



      </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>


<!--
 $result = $conn->query($sqlsrc);
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_row()) {
                                        $name = $row[0];
                            
                            
                                        echo "<tr><td>'".$name."'</td>";
                                        
                                       
                                    }
                                }


                                while($row = $dates -> fetch_row()){

$dia =$row[0];
echo "<tr><td>'".$dia."'</td>";
}


   
$sqldesglose="INSERT INTO `desglodays` (`id`, `itnrDesglo`, `dia`, `price`) VALUES ('', '1', '".$dates."', '235.29');";
      
      mysqli_query($conn, $sqldesglose);