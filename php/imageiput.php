/********************IMAGES DATA */
                    echo '<script>alert("Image FILE 1")</script>';
                    echo "<pre>";
                    print_r($_FILES['imgBanner']);
                    echo "</pre>";

                    $img_name = $_FILES['imgBanner']['name'];
                    $img_size = $_FILES['imgBanner']['size'];
                    $tmp_name = $_FILES['imgBanner']['tmp_name'];
                    $error = $_FILES['imgBanner']['error'];

                    echo '<script>alert("Image FILE 2")</script>';
echo "<pre>";
print_r($_FILES['imgHotel']);
echo "</pre>";

$img_nameh = $_FILES['imgHotel']['name'];
$img_sizeh = $_FILES['imgHotel']['size'];
$tmp_nameh = $_FILES['imgHotel']['tmp_name'];
$errorh = $_FILES['imgHotel']['error'];
/*******************IMAGES DATA */



if($error === 0){
}

if($img_size > 300000 && $img_nameh > 300000){
                            echo '<script>alert("Image FILE 2 ERROR")</script>';

                           

                        }



                        /***** */
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc, $allowed_exs)){
                                $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                                $img_upload_path = '../insertImgs/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                /******UPLOAD TO DB QUERY */


                                if($errorh === 0){
    if($img_sizeh > 300000){
        $em = "Sorry file too large";
        header("Location: reginfo.php?error=$em");
        echo '<script>alert("Image FILE 2 too large")</script>';


    }else{
        $img_ex = pathinfo($img_nameh, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)){
            $new_img_nameh = uniqid('IMG-', true).'.'.$img_ex_lc;
            $img_upload_path = '../insertImgs/'.$new_img_nameh;
            move_uploaded_file($tmp_nameh, $img_upload_path);
            /******UPLOAD TO DB QUERY */
            $sqlimg2 = "INSERT INTO imgs
                        VALUES ('', 'habitacion', '$new_img_nameh', '".$folio."')";
            mysqli_query($conn, $sqlimg2);
        }
        else{
            echo '<script>alert("Image FILE 2 ERROR EXTENSION")</script>';
        }
                            }}

else{
    echo '<script>alert("Image FILE 2 ERROR")</script>';}


    $sqlimg1 = "INSERT INTO imgs
                                            VALUES ('', 'paisaje', '$new_img_name', '".$folio."')";
                                mysqli_query($conn, $sqlimg1);






                                <div class="form-group col-md-6">
                <label>
                  <h5>Imagen Paisaje</h5>
                </label>
                <input type="file" id="imgBanner" name="imgBanner" >


              </div>
              <div class="form-group col-md-6">
                <label>
                  <h5>imagen Hotel</h5>
                </label>
                <input type="file" id="imgHotel" name="imgHotel" >


              </div>













              /****************************************BACK UP DATA INSERT HTML CODE************* */



              <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="../styles/style.css">
    <title>Bare - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../pdf.css" />
    <script src="../pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img src="../imgs/logoDemo.jpg" alt="logotipo" width="50px" height="50px">
            <a class="navbar-brand" href="#">Nombre de la empresa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
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
                        <img src="../imgs/logoDemo.jpg" alt="" width="150" height="130">
                        <img src="../imgs/info.jpg" width="80%" height="130">


                    </div>



                    <div class="card-body pt-0 pb-0">


                        <div class="row justify-content-center"
                            style="margin: auto; padding-left: 10px; padding-right: 10px;">

                            <!----------------------------------UPLOAD PAISAJE IMAGE-->
                            <?php
                        $namefirst = 'name';
                         $sqlgi1 = " SELECT * FROM imgs WHERE  $namefirst = 'paisaje' 
                                     AND folio_dir = '$folio' ORDER BY id DESC LIMIT 1 ";
                        
                         //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                        // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                        $respai = mysqli_query($conn, $sqlgi1);

                        if(mysqli_num_rows($respai)){ 
                        while ($imageP = mysqli_fetch_assoc($respai)) {
                            //$name = $row[0];
 ?>
                            <img src="../insertImgs/<?=$imageP['img_dir']?>" height="400px"
                                width="100% object-fit: cover;">


                            <?php } }
                        
                        ?>





                        </div>
                    </div>
                    <!--/**********************************NEW ONE****************************************************************-->
                    <div class="card-body pt-10">


                        <div class="row " style="margin: auto; padding-left: 10px; padding-right: 10px;">
                            <div class="col-md-6 pl-0">
                                <div class=" " style="width: 424.9">


                                    <!--<img src="imgs/sunrise.jpg" style="width: 100%; height: 270px;">-->
                                    <!----------------------------------UPLOAD HABITACION IMAGE-->
                                    <?php
           $newfolio = $folio;
                        $namesecond = 'name';
                         $sqlgi2 = " SELECT * FROM imgs WHERE  $namesecond = 'habitacion' 
                                     AND folio_dir = '$newfolio' ORDER BY id DESC LIMIT 1 ";
                        
                         //SELECT TOP 1 * FROM Table ORDER BY ID DESC
                        // SELECT * FROM `imgs` WHERE name = 'paisaje' AND folio_dir = 'EXP-1000014'
                        $reshab = mysqli_query($conn, $sqlgi2);

                        if(mysqli_num_rows($reshab)){ 
                        while ($imageh = mysqli_fetch_assoc($reshab)) {
                            //$name = $row[0];
 ?>
                                    <img src="../insertImgs/<?=$imageh['img_dir']?>" height="400px"
                                        width="100% object-fit: cover;">


                                    <?php } }
                        
                        ?>

                                </div>
                            </div>
                            <div class="col-md-6 mt-1 "
                                style="background-color: rgba(151, 204, 211, 0.1);  border-radius: 15px;">
                                <div class=" mr-1">
                                    <h6 class="my-2" style="text-align: center; font-size: 1.4em;"><?php echo $hName ?>
                                    </h6>
                                    <div class="d-flex justify-content-around pl-1">

                                        <ul class="list list-inline mb-0 text-left " style="width: fit-content;">
                                            <li><span class="font-weight-bold"
                                                    style="text-align: center; font-size: 1.4em;"> Fecha:</span></li>
                                            <li><Span class="font-weight-bold" style="color: green;">CONFIRMADA</Span>
                                            </li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    confirmación:</span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    itinerario</span></li>




                                        </ul>
                                        <ul class="list list-inline mb-0 text-right">
                                            <li><span class="font-weight-bold"
                                                    style="font-size: 1.2em;"><?php  echo strftime('%d %B %Y',strtotime($date)); ?>
                                                    - <?php  echo strftime('%d %B %Y',strtotime($date2)); ?> </span>
                                            </li>
                                            <li><br></li>
                                            <li><Span class="font-weight-bold"
                                                    style=" color: rgb(5, 99, 99); font-size: 1.2em ;">
                                                    EXP-71-2852421</Span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">
                                                    72142558240270</span></li>

                                        </ul>

                                    </div>
                                    <div style="text-align: left;">
                                        <span style="font-size: 1.2em;">Hemos confirmado tu reservación de hotel con el
                                            establecimiento.</span>

                                    </div>
                                    <div style="text-align: left;">
                                        <span><?php echo $adress ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body pt-10 pb-0">


                        <div class="row ">
                            <div class="col-md-6 mt-1 "
                                style="background-color: rgba(151, 204, 211, 0.1);  border-radius: 15px;">
                                <div class=" mr-1">
                                    <h6 class="my-2" style="text-align: center; font-size: 1.4em;">Desglose</h6>
                                    <div class="d-flex justify-content-around pl-1">

                                        <ul class="list list-inline mb-0 text-left " style="width: fit-content;">
                                            <li><span class="font-weight-bold"
                                                    style="text-align: center; font-size: 1.4em;"> Fecha:</span></li>
                                            <li><Span class="font-weight-bold" style="color: green;">CONFIRMADA</Span>
                                            </li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    confirmación:</span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">No. de
                                                    itinerario</span></li>





                                        </ul>
                                        <ul class="list list-inline mb-0 text-right">
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">13 Agosto 2021
                                                    - 20 Agosto 2021 </span></li>
                                            <li><br></li>
                                            <li><Span class="font-weight-bold"
                                                    style=" color: rgb(5, 99, 99); font-size: 1.2em ;">
                                                    EXP-71-2852421</Span></li>
                                            <li><span class="font-weight-bold" style="font-size: 1.2em;">
                                                    72142558240270</span></li>

                                        </ul>

                                    </div>
                                    <div style="text-align: left;">
                                        <span style="font-size: 1.2em;">Hemos confirmado tu reservación de hotel con el
                                            establecimiento.</span>

                                    </div>
                                    <div style="text-align: left;">
                                        <span>Dr. Barragán No. 79, México City, CDMX, 06720 México
                                             Tel: 52 (55) 55788933 Fax: 52 (55) 55788933</span>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <ul class="list list-inline mb-0 text-left">
                                    <li class="list-inline-item">
                                        <h5 style="font-size: 1.2em;">
                                            Reservado para:<br>

                                        </h5>
                                    </li>



                                </ul>



                                <div class="d-flex justify-content-around pl-1">

                                    <ul class="list list-inline mb-0 text-left " style="width: fit-content;">
                                        <li><span class="font-weight-bold"
                                                style="text-align: center; font-size: 1.2em;"> 1 Adulto:</span></li>






                                    </ul>
                                    <ul class="list list-inline mb-0 text-right">
                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>

                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>

                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>



                                    </ul>

                                </div>

                                <div class="d-flex justify-content-around pl-1">

                                    <ul class="list list-inline mb-0 text-left " style="width: fit-content;">
                                        <li><span class="font-weight-bold"
                                                style="text-align: center; font-size: 1.2em;"> 1 Menor:</span></li>






                                    </ul>
                                    <ul class="list list-inline mb-0 text-right">
                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>

                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>

                                        <li><span class="font-weight-bold" style="font-size: 1.2em;">KATHERINE LISSETTE
                                                DIAZ SAILEMA </span></li>



                                    </ul>

                                </div>



                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-10 pb-0">


                        <div class="row justify-content-center">

                            <div class="col-md-6 ">
                                <p class="mb-0" style="text-align: left;">
                                    <span style="font-size: 1.2em;">Hora de inicio de check-in: </span><span
                                        style="font-size: 1.2em;">15:00</span><br>
                                    <span style="font-size: 1.2em;">Hora de finalización de check-in: </span><span
                                        style="font-size: 1.2em;">medianoche</span><br>
                                    <span style="font-size: 1.2em;">El personal de recepción recibirá a los huéspedes al
                                        momento de su llegada.</span><br>
                                    <span style="font-size: 1.2em;">Si piensas llegar tarde, comunícate directamente al
                                        establecimiento para obtener información
                                        sobre su política de check-in posterior al horario previsto</span>
                                </p>



                            </div>
                            <div class="col-md-6 ">
                                <p class="mb-0" style="text-align: left;">
                                    <span style="font-size: 1.2em;">Hora de inicio de check-in: </span><span
                                        style="font-size: 1.2em;">15:00</span><br>
                                    <span style="font-size: 1.2em;">Hora de finalización de check-in: </span><span
                                        style="font-size: 1.2em;">medianoche</span><br>
                                    <span style="font-size: 1.2em;">El personal de recepción recibirá a los huéspedes al
                                        momento de su llegada.</span><br>
                                    <span style="font-size: 1.2em;">Si piensas llegar tarde, comunícate directamente al
                                        establecimiento para obtener información
                                        sobre su política de check-in posterior al horario previsto</span>
                                </p>



                            </div>

                        </div>

                    </div>
                    <div class="card-footer pb-10 pt-10">
                        <div class="row" style="text-align: center;">

                            <div class="col-md-4"><span>Text Aqui</span></div>
                            <div class="col-md-4"><span>Text Aqui</span></div>
                            <div class="col-md-4"><span>Text Aqui</span></div>

                        </div>

                    </div>






                    <!--/*********************************************************************************************************/-->








                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>