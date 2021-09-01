<?php
session_start ();
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
}
?>

<?php
require 'conexion.php';


//session_start();
//$itnrNum=$_SESSION['inputItinerario'];






//(  $loquesea = isset($_GET['loquesea']) ? $_GET['loquesea'] : null )


//SELECT EXISTS(SELECT * FROM datos WHERE numItnr = 1 )

////////////////////CHECK IF NUMERO DE ITINERARIO EXISTS///////
if (isset($_POST['Submit1'])){

    //session_start ();
    
    $hName    = $_POST['hName'];
//$hName = $_POST['hName'];
$fechaIni = $_POST['datepicker'];
$fechFin = $_POST['trip-end'];
//$fechFin  = $_SESSION['trip-end'] = $_POST;
$_SESSION['trip-end'] = $_POST['trip-end']; 
$_SESSION['datepicker'] = $_POST['datepicker'];
//$adress   = $_POST['inputAdress'];
$itnrNum  = $_POST['inputItinerario'];
$_SESSION['inputItinerario'] = $_POST['inputItinerario'];
$status = $_POST['inputEstatus'];

$slctAdult = $_POST['inputState'];
$numFields = $_POST['numFields'];
$numFields2 = $_POST['numFields2'];
$numFields3 = $_POST['numFields3'];
$numFields4 = $_POST['numFields4'];
$numFields5 = $_POST['numFields5'];
$numFields6 = $_POST['numFields6'];
$numFields7 = $_POST['numFields7'];
$numFields8 = $_POST['numFields8'];
$numFields9 = $_POST['numFields9'];
$numFields10 = $_POST['numFields10'];

$slctMenork = $_POST['inputStatek'];
$numFieldsk = $_POST['numFieldsk'];
$numFields2k = $_POST['numFields2k'];
$numFields3k = $_POST['numFields3k'];
$numFields4k = $_POST['numFields4k'];
$numFields5k = $_POST['numFields5k'];
$numFields6k = $_POST['numFields6k'];
$numFields7k = $_POST['numFields7k'];
$numFields8k = $_POST['numFields8k'];
$numFields9k = $_POST['numFields9k'];
$numFields10k = $_POST['numFields10k'];

setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
$date = $date = str_replace("/","-",$fechaIni);
setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
$date2 = $date2 = str_replace("/","-",$fechFin);
// 08 julio 2016
               
    $sqlchk = "SELECT * FROM datos WHERE numItnr LIKE '".$itnrNum."' LIMIT 1";

    //echo '<script>alert("cheked if itinerario exists")</script>';
   

    
    $reschk = $conn->query($sqlchk);
    $num_rows = mysqli_num_rows($reschk);



           
            if (isset($_POST['Submit1']) && $num_rows === 1 ) {
                
                echo '<script>alert("itinerario exists")</script>';
                //header('location: ../regInfo.php');
                

                

                
            } 
            
            if(isset($_POST['Submit1']) && $num_rows != 1){
                



                echo '<script>alert("itinerario does not exists")</script>';
                echo $num_rows;
               
                
                    // Enter the code you want to execute after the form has been submitted
                    echo '<script>alert("Its In")</script>';
                    // Display Success or Failure message (if any)
                  

                   echo $hName;
                       
                            /******insert data if file OK */
                            $sql = "INSERT INTO datos VALUES ('', '$hName', '".$fechaIni."', '".$fechFin."','".$itnrNum."','1212','".$status."')";
                            echo $sql ;
                            
                            
                            
                            if(mysqli_query($conn, $sql)){
                                echo "successInsert";
                               
        
                                
                            }else{
                                echo '<script>alert("Numero De Itinerario no valido")</script>';
                                
                            }
                           

                                $prefix = '1000001';
                    
                                $sqlsrc = "SELECT id FROM datos WHERE numItnr= '$itnrNum'";
                                
                                    
                                    $result = $conn->query($sqlsrc);
                                
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_row()) {
                                            $name = $row[0];
                                
                                
                                            echo "<tr><td>'".$name."'</td>";
                                            
                                           
                                        }
                                    }

                                    $folio = "EXP-".$name;
/**************************************************************** */
/************************************************IMAGE UPLOAD 2************ */
                      









                                    
                                
                                $sqlUp ="UPDATE datos SET Folio = '$folio'  WHERE numItnr = '$itnrNum' ";
                                echo $sqlUp;
                                
                                
                                
                                
                                if(mysqli_query($conn, $sqlUp)){
                                    echo "success Update";
                                    
                                }else{
                                    echo "nothing";
                                }

                               
                            
                        
                   
                
                  
                    
                    
                    
                    ///////////////////////SELECT CONDITION
                    if($_POST["inputState"] == "one"){
                        $edad = 'Adult';
                       
                        $sqlopt1 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 1")</script>';
                        echo $sqlopt1;
                        
                        $resone = $conn->query($sqlopt1);
                
                    }
                    if($_POST["inputState"] == "two"){
                        $edad = 'Adult';
                       
                        $sqlopt2 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 2")</script>';
                        echo $sqlopt2;
                        
                        $restwo = $conn->query($sqlopt2);
                
                    }
                    if($_POST["inputState"] == "three"){
                        $edad = 'Adult';
                       
                        $sqlopt3 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 3")</script>';
                        echo $sqlopt3;
                        
                        $resthree = $conn->query($sqlopt3);
                
                    }
                    if($_POST["inputState"] == "four"){
                        $edad = 'Adult';
                       
                        $sqlopt4 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt4;
                        
                        $resfour = $conn->query($sqlopt4);
                
                    }
                    if($_POST["inputState"] == "five"){
                        $edad = 'Adult';
                       
                        $sqlopt5 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt5;
                        
                        $resfive = $conn->query($sqlopt5);
                
                    }
                    if($_POST["inputState"] == "six"){
                        $edad = 'Adult';
                       
                        $sqlopt6 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields6."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt6;
                        
                        $ressix = $conn->query($sqlopt6);
                
                    }
                    if($_POST["inputState"] == "seven"){
                        $edad = 'Adult';
                       
                        $sqlopt7 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields6."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields7."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 7")</script>';
                        echo $sqlopt7;
                        
                        $resseven = $conn->query($sqlopt7);
                
                    }
                    if($_POST["inputState"] == "eight"){
                        $edad = 'Adult';
                       
                        $sqlopt8 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields6."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields7."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields8."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 8")</script>';
                        echo $sqlopt8;
                        
                        $reseight = $conn->query($sqlopt8);
                
                    }
                    if($_POST["inputState"] == "nine"){
                        $edad = 'Adult';
                       
                        $sqlopt9 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields6."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields7."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields8."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields9."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 9")</script>';
                        echo $sqlopt9;
                        
                        $resnine = $conn->query($sqlopt9);
                
                    }
                    if($_POST["inputState"] == "ten"){
                        $edad = 'Adult';
                       
                        $sqlopt10 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields2."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields3."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields4."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields5."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields6."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields7."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields8."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields9."', '".$edad."', '".$folio."' ),
                        ('', '".$numFields10."', '".$edad."', '".$folio."' )";
                        echo '<script>alert("Selected 10")</script>';
                        echo $sqlopt10;
                        
                        $resten = $conn->query($sqlopt10);
                
                    }
                     ///////////////////////SELECT CONDITION
                    if($_POST["inputStatek"] == "onek"){
                        $edadk = 'Menor';
                       
                        $sqlopt1k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 1")</script>';
                        echo $sqlopt1k;
                        
                        $resonek = $conn->query($sqlopt1k);
                
                    }
                    if($_POST["inputStatek"] == "twok"){
                        $edadk = 'Menor';
                       
                        $sqlopt2k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 2")</script>';
                        echo $sqlopt2k;
                        
                        $restwok = $conn->query($sqlopt2k);
                
                    }
                    if($_POST["inputStatek"] == "threek"){
                        $edadk = 'Menor';
                       
                        $sqlopt3k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 3")</script>';
                        echo $sqlopt3k;
                        
                        $resthreek = $conn->query($sqlopt3k);
                
                    }
                    if($_POST["inputStatek"] == "fourk"){
                        $edadk = 'Menor';
                       
                        $sqlopt4k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt4k;
                        
                        $resfourk = $conn->query($sqlopt4k);
                
                    }
                    if($_POST["inputStatek"] == "fivek"){
                        $edadk = 'Menor';
                       
                        $sqlopt5k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt5k;
                        
                        $resfivek = $conn->query($sqlopt5k);
                
                    }
                    if($_POST["inputStatek"] == "sixk"){
                        $edadk = 'Menor';
                       
                        $sqlopt6k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields6k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 4")</script>';
                        echo $sqlopt6k;
                        
                        $ressixk = $conn->query($sqlopt6k);
                
                    }
                    if($_POST["inputStatek"] == "sevenk"){
                        $edadk = 'Menor';
                       
                        $sqlopt7k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields6k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields7k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 7")</script>';
                        echo $sqlopt7k;
                        
                        $ressevenk = $conn->query($sqlopt7k);
                
                    }
                    if($_POST["inputStatek"] == "eightk"){
                        $edadk = 'Menor';
                       
                        $sqlopt8k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields6k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields7k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields8k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 8")</script>';
                        echo $sqlopt8k;
                        
                        $reseightk = $conn->query($sqlopt8k);
                
                    }
                    if($_POST["inputStatek"] == "ninek"){
                        $edadk = 'Menor';
                       
                        $sqlopt9k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields6k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields7k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields8k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields9k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 9")</script>';
                        echo $sqlopt9k;
                        
                        $resninek = $conn->query($sqlopt9k);
                
                    }
                    if($_POST["inputStatek"] == "tenk"){
                        $edadk = 'Menor';
                       
                        $sqlopt10k = "INSERT INTO names VALUES ('', '".$numFieldsk."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields2k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields3k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields4k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields5k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields6k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields7k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields8k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields9k."', '".$edadk."', '".$folio."' ),
                        ('', '".$numFields10k."', '".$edadk."', '".$folio."' )";
                        echo '<script>alert("Selected 10")</script>';
                        echo $sqlopt10k;
                        
                        $restenk = $conn->query($sqlopt10k);
                
                    }
                   /********HEADER TO CHECK IF DATA GOES IN */
                    header('Location: ../dateRanger.php');
                    $_SESSION['folio'] = $folio ;
                }
                
                
            else{
                echo '<script>alert("Image FILE 1DONE ERROR DATA TEMPLATE TO SHOW")</script>';
                $sqlnodata = "SELECT * FROM `imgs` WHERE folio_dir = 'EXP-1000229' AND name = 'paisaje'";
                $sqlnodata = "SELECT * FROM `imgs` WHERE folio_dir = 'EXP-1000229' AND name = 'habitacion'";
                $sqlnodata = "SELECT * FROM datos ORDER BY id DESC LIMIT 1";
                $sqlnodata = "SELECT * FROM names WHERE Folio = 'EXP-1000231' AND edad ='Adult' ORDER BY id ASC";
                $sqlnodata = "SELECT * FROM names WHERE Folio = 'EXP-1000231' AND edad ='Menor' ORDER BY id ASC";
                $sqlnodata = "";
               //header('Location: ../dateRanger.php');

            }
                    /*******************************UPLOAD IMAGE PAISAJE */
    /*            if (isset($_POST['Submit1']) && isset($_FILES['imgBanner'])){
                    echo '<script>alert("Image FILE 1")</script>';
                    echo "<pre>";
                    print_r($_FILES['imgBanner']);
                    echo "</pre>";

                    $img_name = $_FILES['imgBanner']['name'];
                    $img_size = $_FILES['imgBanner']['size'];
                    $tmp_name = $_FILES['imgBanner']['tmp_name'];
                    $error = $_FILES['imgBanner']['error'];

                    if($error === 0){
                        if($img_size > 300000){
                            $em = "Sorry file too large";
                            echo '<script>alert("Image FILE too large")</script>';
                            header("Location: reginfo.php?error=$em");

                        }else{
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if (in_array($img_ex_lc, $allowed_exs)){
                                $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                                $img_upload_path = '../insertImgs/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                /******UPLOAD TO DB QUERY 
                                $sqlimg1 = "INSERT INTO imgs
                                            VALUES ('', 'paisaje', '$new_img_name', '".$folio."')";
                                mysqli_query($conn, $sqlimg1);
                            }
                            else{
                                echo '<script>alert("Image FILE 1 ERROR EXTENSION")</script>';
                            }
                        }

                    }else{
                        echo '<script>alert("Image FILE 1 ERROR")</script>';

                    }

                }else{
                    echo '<script>alert("No Image uploaded")</script>';
                }*/
/*********************************UPLOAD IMAGE HABITACION******************** */ 

                
                    
                   
                

                    /*********************IMAGES UPLOAD **************************/
/*
                    if (isset($_POST['Submit1']) && isset($_FILES['imgBanner'])){
                        echo '<script>alert("Image FILE 1")</script>';

                    }else{
                        echo '<script>alert("No Image uploaded")</script>';
                    }*/

                    
                    ///////////////END OF THE CONDITIONS
                 }
                /*******************IF IT REFRESHES */
                 else {
                    $sqlsrc = "SELECT id FROM datos WHERE numItnr= '$itnrNum'";
                    
                        
                    $result = $conn->query($sqlsrc);
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_row()) {
                            $name = $row[0];
                
                
                            echo "<tr><td>'".$name."'</td>";
                            
                           
                        }
                    }
                    $folio = "EXP-". $name;
                    echo '<div id="specify" style="display:hidden">If Other, Please Specify</div>';
                    echo '<script>alert("NO Data was Entered")</script>';
                    echo $itnrNum;
                    echo $folio;
                    //header('Location: ../regInfo.php');

                    // Display the Form and the Submit Button
                }

                

            /*
if( isset($_POST['Submit1'])) {
    // Enter the code you want to execute after the form has been submitted
    echo '<script>alert("Its In")</script>';
    // Display Success or Failure message (if any)
   

    $sql = "INSERT INTO datos VALUES ('', '".$hName."', '".$fechaIni."', '".$fechFin."','".$adress."','".$itnrNum."','".$tmCheckInStr."','".$tmCheckInEnd."','1212')";
    echo $sql ;
    
    
    
    if(mysqli_query($conn, $sql)){
        echo "successInsert";
        if($_POST["inputState"] == "one") {
            $edad = 'Adult';
           
            $sqlopt1 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' )";
            echo '<script>alert("Selected 1")</script>';
            echo $sqlopt1;
            
            $resone = $conn->query($sqlopt1);
    
        }
        
    }else{
        echo '<script>alert("Numero De Itinerario no valido")</script>';
        
    }
    
    
    $prefix = '1000001';
    
    $sqlsrc = "SELECT id FROM datos WHERE numItnr= '$itnrNum'";
    
        
        $result = $conn->query($sqlsrc);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_row()) {
                $name = $row[0];
    
    
                echo "<tr><td>'".$name."'</td>";
                
               
            }
        }
        $folio = "EXP-". $name;
    
    $sqlUp ="UPDATE datos SET Folio = '$folio'  WHERE numItnr = '$itnrNum' ";
    echo $sqlUp;
    
    
    
    
    if(mysqli_query($conn, $sqlUp)){
        echo "success Update";
        
    }else{
        echo "nothing";
    }
    
    ///////////////////////SELECT CONDITION
    if($_POST["inputState"] == "one"){
        $edad = 'Adult';
       
        $sqlopt1 = "INSERT INTO names VALUES ('', '".$numFields."', '".$edad."', '".$folio."' )";
        echo '<script>alert("Selected 1")</script>';
        echo $sqlopt1;
        
        $resone = $conn->query($sqlopt1);

    }if($_POST["inputState"] == "two"){
        echo '<script>alert("Selected 2")</script>';
    }
    
    else{
        echo '<div id="specify" style="display:hidden">If Other, Please Specify</div>';
    }

    
    ///////////////END OF THE CONDITIONS
 } else {

    echo '<script>alert("NOT PRESSED")</script>';
    // Display the Form and the Submit Button
}





//echo $hName,$fechFin,$fechFin,$adress,$itnrNum;
*/

?>


