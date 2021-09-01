<!DOCTYPE html>

<?php
session_start ();
if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
?>





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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <a class="navbar-brand" href="#">D'CHAMPS TRAVEL AGENCY <?php echo $_SESSION['username'];?></a>
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
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <div class="card-3">

                <Form action="php/dataInsert.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="inputName">
                                <h5>Hotel</h5>
                            </label>
                           



                            <?php
include_once 'php/conexion.php';
//include 'php/dataInsert.php';



                     $sqlsrcH = "SELECT id,nameHotel FROM hoteles";

                      $result = mysqli_query($conn, $sqlsrcH);                          
                                    
                     echo" <select class='form-control form-control-lg selectpicker' name='hName' placeholder='Nombre del Hotel'  data-live-search='true' data-width='auto'>  ";
                     echo " <option value='none' selected>Nombre del Hotel...</option>";

                     while($row = mysqli_fetch_assoc($result)) {
 
                   echo '<option   value="'.$row['id'].'">'.$row['nameHotel'].'</option>';
}
                   echo "</select>";

?>
                        </div>
                        <div class="form-group col-md-4">


                            <label for="start">
                                <h5>Fecha Inicio:</h5>
                            </label>

                            <input class="form-control form-control-lg" type="date" id="datepicker" name="datepicker"
                                min="2020-01-01" max="2025-12-31" required>
                        </div>
                        <div class="form-group col-md-4">


                            <label for="start">
                                <h5>Fecha Fin:</h5>
                            </label>

                            <input class="form-control form-control-lg" type="date" id="start" name="trip-end"
                                min="2020-01-01" max="2025-12-31" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputItinerario">
                                <h5>Numero de Itinerario</h5>
                            </label>
                            <input type="text"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                class="form-control form-control-lg" id="inputItinerario" name="inputItinerario"
                                placeholder="123456" required>

                            <label for="inputEstatus">
                                <h5>Estatus</h5>
                            </label>
                            <select class="form-control form-control-lg" id="inputEstatus" name="inputEstatus">
                                <option value="none" selected>Selecciona...</option>
                                <option value="aprovado">Aprovado</option>
                                <option value="negado">Por Aprovar</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">
                                <h5>Adultos</h5>
                            </label>
                            <select onchange="numAdult()" id="inputState" name="inputState"
                                class="form-control form-control-lg">
                                <option value="none" selected>Selecciona...</option>
                                <option value="one">1</option>
                                <option value="two">2</option>
                                <option value="three">3</option>
                                <option value="four">4</option>
                                <option value="five">5</option>
                                <option value="six">6</option>
                                <option value="seven">7</option>
                                <option value="eight">8</option>
                                <option value="nine">9</option>
                                <option value="ten">10</option>
                            </select>

                            <div id="nomList">



                                <label for="inputAddress">
                                    <h5>Nombre de Adultos</h5>
                                </label>
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields" name="numFields"
                                    placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields2"
                                    name="numFields2" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields3"
                                    name="numFields3" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields4"
                                    name="numFields4" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields5"
                                    name="numFields5" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields6"
                                    name="numFields6" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields7"
                                    name="numFields7" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields8"
                                    name="numFields8" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields9"
                                    name="numFields9" placeholder="Nombre">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields10"
                                    name="numFields10" placeholder="Nombre">





                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">
                                <h5>Menores</h5>
                            </label>
                            <select onchange="numKid()" id="inputStatek" name="inputStatek"
                                class="form-control form-control-lg">
                                <option value="none" selected>Selecciona...</option>
                                <option value="onek">1</option>
                                <option value="twok">2</option>
                                <option value="threek">3</option>
                                <option value="fourk">4</option>
                                <option value="fivek">5</option>
                                <option value="sixk">6</option>
                                <option value="sevenk">7</option>
                                <option value="eightk">8</option>
                                <option value="ninek">9</option>
                                <option value="tenk">10</option>
                            </select>
                            <div id="nomListk">



                                <label for="inputAddress">
                                    <h5>Nombre de Menores</h5>
                                </label>
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFieldsk"
                                    name="numFieldsk" placeholder="Nombre1">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields2k"
                                    name="numFields2k" placeholder="Nombre2">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields3k"
                                    name="numFields3k" placeholder="Nombre3">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields4k"
                                    name="numFields4k" placeholder="Nombre4">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields5k"
                                    name="numFields5k" placeholder="Nombre5">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields6k"
                                    name="numFields6k" placeholder="Nombre6">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields7k"
                                    name="numFields7k" placeholder="Nombre7">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields8k"
                                    name="numFields8k" placeholder="Nombre8">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields9k"
                                    name="numFields9k" placeholder="Nombre9">
                                <input style="text-transform: uppercase;" type="text" class="form-control form-control-lg" id="numFields10k"
                                    name="numFields10k" placeholder="Nombre10">





                            </div>
                        </div>

                    </div>
                    <div class="form-row">






                    </div>
                    <div class="form-row">

                    </div>

                    <button type="submit" class="btn btn-primary" name="Submit1" value="Register">Sign in</button>
                </form>

            </div>

        </div>
    </div>

    <!----------------------------------------SCRIPT TO SHOW INPUT AFTER SELECT------------------------------>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Core theme JS-->
    <script src="barePages/js/scripts.js"></script>
    <!--
  <script>
          function numAdult(numFields, elementValue) {
            
             document.getElementById(numFields).style.display = elementValue.value == "one" ? 'block' : 'none';
          }
       </script>
-->

    <script>
    function myFunction() {

        document.getElementById("nomList").style.display = "none";
        document.getElementById("nomListk").style.display = "none";
    }
    </script>



    <script>
    function numAdult() {

        var status = document.getElementById("inputState");




        if (status.value == "one") {

            var res = document.querySelectorAll(" #numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }
            var res = document.querySelectorAll(
                "#numFields10 , #numFields9, #numFields8,#numFields7,#numFields6,#numFields5,#numFields4,#numFields3,#numFields2"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "two") {

            var res = document.querySelectorAll(" #numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll(
                "#numFields10 , #numFields9, #numFields8,#numFields7,#numFields6,#numFields5,#numFields4,#numFields3"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "three") {

            var res = document.querySelectorAll(" #numFields3,#numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll(
                "#numFields10 , #numFields9, #numFields8,#numFields7,#numFields6,#numFields5,#numFields4");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "four") {

            var res = document.querySelectorAll(" #numFields4,#numFields3,#numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }
            var res = document.querySelectorAll(
                "#numFields10, #numFields9, #numFields8,#numFields7,#numFields6,#numFields5");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "five") {

            var res = document.querySelectorAll(" #numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10, #numFields9, #numFields8,#numFields7,#numFields6");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "six") {

            var res = document.querySelectorAll(
                " #numFields6,#numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10, #numFields9, #numFields8,#numFields7");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "seven") {

            var res = document.querySelectorAll(
                " #numFields7,#numFields6,#numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }


            var res = document.querySelectorAll("#numFields10 , #numFields9, #numFields8");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "eight") {
            var res = document.querySelectorAll(
                " #numFields8,#numFields7,#numFields6,#numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10, #numFields9");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "nine") {
            var res = document.querySelectorAll(
                " #numFields9, #numFields8,#numFields7,#numFields6,#numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            document.getElementById("numFields10").style.display = "none";
        }
        if (status.value == "ten") {

            var res = document.querySelectorAll(
                "#numFields10 , #numFields9, #numFields8,#numFields7,#numFields6,#numFields5,#numFields4,#numFields3,#numFields2,#numFields,#nomList"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

        }



    };

    function numKid() {

        var status = document.getElementById("inputStatek");




        if (status.value == "onek") {

            var res = document.querySelectorAll(" #numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }
            var res = document.querySelectorAll(
                "#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "twok") {

            var res = document.querySelectorAll(" #numFields2k,#numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll(
                "#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "threek") {

            var res = document.querySelectorAll(" #numFields3k,#numFields2k,#numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll(
                "#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "fourk") {

            var res = document.querySelectorAll(" #numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }
            var res = document.querySelectorAll(
                "#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "fivek") {

            var res = document.querySelectorAll(
                " #numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "sixk") {

            var res = document.querySelectorAll(
                " #numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10k , #numFields9k, #numFields8k,#numFields7k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "sevenk") {

            var res = document.querySelectorAll(
                " #numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }


            var res = document.querySelectorAll("#numFields10k , #numFields9k, #numFields8k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "eightk") {
            var res = document.querySelectorAll(
                " #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            var res = document.querySelectorAll("#numFields10k , #numFields9k");
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'none'
            }
        }
        if (status.value == "ninek") {
            var res = document.querySelectorAll(
                " #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

            document.getElementById("numFields10k").style.display = "none";
        }
        if (status.value == "tenk") {

            var res = document.querySelectorAll(
                "#numFields10k , #numFields9k, #numFields8k,#numFields7k,#numFields6k,#numFields5k,#numFields4k,#numFields3k,#numFields2k,#numFieldsk,#nomListk"
                );
            for (var i = 0; i < res.length; i++) {
                res[i].style.display = 'block'
            }

        }



    }
    </script>

    <!-----------------------------TIME JS-->
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />




</body>

</html>