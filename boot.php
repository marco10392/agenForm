<?php
require_once 'php/conexion.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
  }
$folioGlobal1 = $_SESSION['folio'];
setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');


?>

<?php
$namefirst = 'name';
//$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
//          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
$sqlgi1 = "SELECT * FROM datos left join hoteles ON datos.nameHotel = hoteles.id WHERE datos.Folio = '" . $folioGlobal1 . "'";

//SELECT TOP 1 * FROM Table ORDER BY ID DESC
// SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
$respai = mysqli_query($conn, $sqlgi1);


if (mysqli_num_rows($respai)) {
    while ($imageP = mysqli_fetch_row($respai)) {
        $data = $imageP;
        //echo $data[0];



    }
}

?>
<?php
$namefirst = 'name';
//$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
//          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
$sqlgi1 = "SELECT * FROM `desglodays` WHERE folioDes = '" . $folioGlobal1 . "' AND concepto = 'Habitacion'";

//SELECT TOP 1 * FROM Table ORDER BY ID DESC
// SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
$resdes = mysqli_query($conn, $sqlgi1);

if (mysqli_num_rows($resdes)) {
    while ($amount = mysqli_fetch_row($resdes)) {
        $price = $amount;
        // echo "<br><tr><td>".strftime('%A %d de %B %Y',strtotime($price[2]))."</td><td>'$ ".$price[3]."'</td></tr><br>";




    }
}

?>
<html lang="en">

<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="styles/style.css">
    <title>Bare - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="barePages/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="barePages/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        crossorigin="anonymous">

    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>


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

    <div class="container d-flex justify-content-center  mb-50">
        <div class="row">
            <div class="col-md-12">


                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline"
                        style=" padding-left: 30px; padding-right: 30px;">
                        <img src="imgs/logoDemo.png" alt="" width="150" height="130">
                        <img src="imgs/info.jpg" width="80%" height="130">


                    </div>

                    <div class="card-body  pt-0 pb-0">
                        <div class="row justify-content-center" style="margin: auto; ">

                            <!----------------------------------UPLOAD PAISAJE IMAGE-->
                            <?php
                            $namefirst = 'name';
                            //$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                            //          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
                            $sqlgi1 = "SELECT * FROM datos left join hoteles ON datos.nameHotel = hoteles.id WHERE datos.Folio = '" . $folioGlobal1 . "'";

                            //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                            // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                            $respai = mysqli_query($conn, $sqlgi1);

                            if (mysqli_num_rows($respai)) {
                                while ($imageP = mysqli_fetch_assoc($respai)) {
                                    // $name = $row[0];
                            ?>
                            <img src="insertImgs/<?= $data[10] ?>" height="330px" width="100%">


                            <?php }
                            }

                            ?>


                        </div>
                    </div>


                    <div class="card-body pt-2 pb-0">


                        <div class="row " style="margin: auto; padding-left: 10px; padding-right: 10px;">
                            <div class="col pl-0">
                                <div class=" " style="width: 424.9px">


                                    <!--<img src="imgs/sunrise.jpg" style="width: 100%; height: 270px;">-->
                                    <!----------------------------------UPLOAD HABITACION IMAGE-->
                                    <?php

                                    $newfolio = $folioGlobal1;


                                    ?>
                                    <?php
                                    $namefirst = 'name';
                                    //$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                                    //          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
                                    $sqlgi1 = "SELECT * FROM datos left join hoteles ON datos.nameHotel = hoteles.id WHERE datos.Folio = '" . $folioGlobal1 . "'";

                                    //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                                    // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                                    $respai = mysqli_query($conn, $sqlgi1);

                                    if (mysqli_num_rows($respai)) {
                                        while ($imageh = mysqli_fetch_assoc($respai)) {
                                            // $name = $row[0];
                                    ?>
                                    <img src="insertImgs/<?= $data[11] ?>" height="240px" width="100%">

                                    <?php }
                                    }
                                    if ($data[6] === 'aprovado') {
                                        $confirm = 'CONFIRMADA';
                                    }
                                    if ($data[6] === 'negado') {
                                        $confirm = 'Por Aprovar';
                                    }
                                    if ($data[6] === 'none') {
                                        $confirm = 'Sin Estatus';
                                    }

                                    ?>

                                </div>
                                <div style="text-align: left; margin-left:10px;">

                                    <ul style="padding: 0px; margin-bottom:0px">
                                        <li>
                                            <h6 style="margin-bottom:0px;">El personal de recepción recibirá a los
                                                huespedes al momento de su llegada.</h6>
                                        </li>
                                        <li>
                                            <h6>Si piensas llegar tarde, comunicate directamente al establecimiento para
                                                obtener información sobre su
                                                política de check-in posterior al horario previsto.</h6>
                                        </li>
                                    </ul>


                                </div>
                            </div>




                            <div class="col mt-1  "
                                style="margin-bottom: auto; background-color: rgba(151, 204, 211, 0.1);  border-radius: 15px;">
                                <div class=" mr-1">
                                    <h6 class="my-2" style="text-align: center; font-size: 1.4em;">
                                        <?= $data[8] ?>
                                    </h6>
                                    <div class="row" style="text-align:center;">
                                    <span class="font-weight-bold" style="font-size: 1.2em;">
                                                    <?php echo strftime('%d %B %Y', strtotime($data[2])); ?> -
                                                    <?php echo strftime('%d %B %Y', strtotime($data[3])); ?>
                                                </span>
                                    </div>
                                    <div class="d-flex justify-content-around pl-1">

                                        <ul class="list list-inline mb-0 text-left " style="width: fit-content;">
                                            
                                            <li><Span class="font-weight-bold" style="color: green;">
                                                    <?= $confirm ?>
                                                </Span>
                                            </li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    confirmación:</span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    itinerario</span></li>





                                        </ul>
                                        <ul class="list list-inline mb-0 text-right">
                                            
                                            <li><br></li>
                                            <li><Span class="font-weight-bold"
                                                    style=" color: rgb(5, 99, 99); font-size: 1.2em ;">
                                                    <?php echo $newfolio ?>
                                                </Span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">
                                                    <?= $data[4] ?>
                                                </span></li>

                                        </ul>

                                    </div>
                                    <div style="text-align: left; margin-left:10px;">
                                        <span style="font-size: 1.4em;">
                                            <h6>Hemos confirmado tu reservación de hotel con el
                                                establecimiento.</h6>
                                        </span>

                                    </div>
                                    <div style="text-align: left; margin-left:10px;">
                                        <span>
                                            <h6>
                                                <?= $data[9] ?>
                                            </h6>
                                        </span>


                                    </div>
                                    <div style="text-align: left; margin-left:10px;">
                                        <span>
                                            <h6 style="margin-bottom:0px;">Hora de inicio de check-in: 15:00</h6>
                                        </span>
                                        <span>
                                            <h6>Hora de Finalizacion de check-in: Medianoche</h6>
                                        </span>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0 pb-0 col-md-12 col-sm-12">

                        <div class="row">
                            <div class=" " style="background-color: rgba(151, 204, 211, 0.1);  border-radius: 15px;">





                                <h6 style="text-align: center; font-size: 1.4em;">Reservado para:</h6>







                                <?php

                                $sqlcnt = "SELECT edad, COUNT(*) FROM `names` WHERE Folio = '" . $folioGlobal1 . "' AND edad = 'Adult'";
                                $resCnt = mysqli_query($conn, $sqlcnt);
                                $adlCnt = mysqli_fetch_row($resCnt);
                                $adlCntp = COUNT($adlCnt);

                                // echo $adlCnt[1];


                                if ($adlCnt[1] == '1') {
                                    $adlname = 'Adulto';
                                } else {
                                    $adlname = 'Adultos';
                                }


                                ?>





                                <div class="d-flex  flex-wrap">

                                    <span class="font-weight-bold" style="text-align: center; font-size: 1.2em;">
                                        <?= $adlCnt[1] ?>
                                        <?= $adlname ?>
                                    </span>





                                    <?php
                                    $namefirst = 'name';
                                    //$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                                    //          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
                                    $sqlAdl = "SELECT * FROM `names` WHERE Folio = '" . $folioGlobal1 . "' AND edad = 'Adult'";

                                    //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                                    // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                                    $resPas = mysqli_query($conn, $sqlAdl);

                                    ?>

                                    <?php

                                    while ($adl = mysqli_fetch_row($resPas)) {
                                        $pasajero = $adl;
                                        // echo "<br><tr><td>".strftime('%A %d de %B %Y',strtotime($price[2]))."</td><td>'$ ".$price[3]."'</td></tr><br>";
                                        // echo "<li><span class='font-weight-bold' style='font-size: 1.2em;'>$pasajero[1]</span></li>"; 
                                        // echo "<span class='font-weight-bold' style='font-size: 1.2em;'>$pasajero[1]</span>";  
                                        echo "<div class='flex-grow pl-4' style='text-align:left;';><span style='font-size: 1.2em';>$pasajero[1]</span></div>";
                                    }

                                    ?>





                                </div>





                                <div class="d-flex flex-wrap">

                                    <?php

                                    $sqlcntm = "SELECT edad, COUNT(*) FROM `names` WHERE Folio = '" . $folioGlobal1 . "' AND edad = 'Menor'";
                                    $resCntm = mysqli_query($conn, $sqlcntm);
                                    $adlCntm = mysqli_fetch_row($resCntm);
                                    $adlCntpm = COUNT($adlCntm);

                                    // echo $adlCnt[1];


                                    if ($adlCntm[1] == '1') {
                                        $adlnamem = 'Menor';
                                    } else {
                                        $adlnamem = 'Menores';
                                    }


                                    ?>

                                    <span class="font-weight-bold" style="text-align: center; font-size: 1.2em;">
                                        <?= $adlCntm[1] ?>
                                        <?= $adlnamem ?>
                                    </span>



                                    <?php
                                    $namefirst = 'name';
                                    //$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                                    //          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
                                    $sqlMnr = "SELECT * FROM `names` WHERE Folio = '" . $folioGlobal1 . "' AND edad = 'Menor'";

                                    //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                                    // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                                    $resPasm = mysqli_query($conn, $sqlMnr);


                                    while ($adlm = mysqli_fetch_row($resPasm)) {
                                        $pasajerom = $adlm;
                                        // echo "<br><tr><td>".strftime('%A %d de %B %Y',strtotime($price[2]))."</td><td>'$ ".$price[3]."'</td></tr><br>";
                                        echo "<div class='flex-grow pl-4' style='text-align:left;';><span style='font-size: 1.2em';>$pasajerom[1]</span></div>";
                                    }

                                    ?>


                                </div>















                            </div>

                        </div>


                    </div>



                    <div class="card-body pt-2 col-md-12 col-sm-12">
                        <div class="row">

                            <div class="col-md-4 col-sm-4">
                                <div class=" "
                                    style="background-color: rgba(151, 204, 211, 0.1);  border-radius: 15px; text-align:left">
                                    <h6 class="my-2" style=" text-align: center; font-size: 1.4em;">Desglose</h6>


                                    <tr>
                                        <div style="text-align: left;"></div>




                                        <?php
                                        $namefirst = 'name';
                                        //$sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                                        //          AND folio_dir = '".$folioGlobal1."' ORDER BY id DESC LIMIT 1 ";
                                        $sqlgi1 = "SELECT * FROM `desglodays` WHERE folioDes = '" . $folioGlobal1 . "' AND concepto = 'Habitacion' ORDER BY dia ASC";

                                        //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                                        // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                                        $resdes = mysqli_query($conn, $sqlgi1);

                                        if (mysqli_num_rows($resdes)) {
                                            $subtTotal = 0;

                                            while ($amount = mysqli_fetch_row($resdes)) {
                                                $price = $amount;
                                                $priceRoom = $price[3];

                                                $subtTotal += $priceRoom;

                                                echo "<td>" . utf8_encode(strftime('%A, %d de %B %Y', strtotime($price[2]))) . "</td><td> : $" . $price[3] . "</td><br>";
                                            }

                                            // echo $subtTotal;
                                        }
                                        $sqlgi2 = "SELECT * FROM `desglodays` WHERE folioDes = '" . $folioGlobal1 . "' AND concepto = 'Impuesto'";
                                        $resdesimp = mysqli_query($conn, $sqlgi2);
                                        while ($impuesto = mysqli_fetch_row($resdesimp)) {
                                            $tax = $impuesto[3];
                                        }
                                        $sqlexists = "SELECT EXISTS(SELECT * FROM desglodays WHERE folioDes = '".$folioGlobal1."' AND concepto = 'ImpHabAdic')";
                                        $reschk2 = $conn->query($sqlexists);
                                        $num_rows2 = mysqli_fetch_row($reschk2);
                                       //echo $num_rows2[0];
                                       

                                        if($num_rows2[0] == 1){
                                            $sqlhabadd = "SELECT * FROM `desglodays` WHERE folioDes = '" . $folioGlobal1 . "' AND concepto = 'ImpHabAdic'";
                                        $reshabadd = mysqli_query($conn, $sqlhabadd);
                                            while ($impuestoadd = mysqli_fetch_row($reshabadd)) {
                                                $taxadd = $impuestoadd[3];
                                            }
                                            // echo $taxadd;
                                            //$taxadd = $impuestoadd[3];
                                            $subTotalAll = $subtTotal + $tax;
                                            echo "<td><span style=' color: rgb(94, 119, 242); margin-bottom:0px;'>Impuestos y cargos: </span><span>$" . $tax . "</span></td></tr><br>";
                                            echo "<td><span style=' color: rgb(94, 119, 242); margin-bottom:0px;'>habitacion Adicional: </span><span>$" . $taxadd . "</span></td></tr><br>";
                                            echo "<tr><td><span><h6 style='margin-bottom:0px;font-size: 1.2em;'>Total: $" . $subTotalAll . "</h6></span>
                                            
                                           <span>Cobrado por el hotel</span>
                                           </td></tr>";
                                            

                                        }if($num_rows2[0] == 0){
                                            $subTotalAll = $subtTotal += $tax;
                                            echo "<td><span style=' color: rgb(94, 119, 242); margin-bottom:0px;'>Impuestos y cargos: </span><span>$" . $tax . "</span></td></tr><br>";
                                            echo "<tr><td><span><h6 style='margin-bottom:0px;font-size: 1.2em;'>Total: $" . $subTotalAll . "</h6></span>
                                            
                                           <span>Cobrado por el hotel</span>
                                           </td></tr>";
                                        }

                                       

                                      
                                       



                                        ?>







                                </div>




                            </div>
                            <div class="col-md-8 col-sm-8">

                                <img src="mapsImg/<?= $data[12] ?>"
                                    style="object-fit: cover; height:auto; width: 590px;">






                            </div>
                        </div>

                    </div>



















                </div>
            </div>
        </div>
    </div>




</body>
<?php
$us3lat = '19.421088729441';
$us3lon = '-99.144647392064';

/**********API KEY */
/**  AIzaSyD242ZWUvsgDaiLxC00DGlvSH9IOs9uI8s */
?>








</html>