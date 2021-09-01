<?php
    require_once 'connect.php';
    if(ISSET($_POST['submit'])){
        foreach($_POST['firstname'] as $key=>$value){
            $firstname = $value;
            $lastname = $_POST['lastname'][$key];
            $conn->query("INSERT INTO `person` VALUES('', '$firstname', '$lastname')") or die(mysqli_error( $conn));
        }
        header("location:result.php");
    }
?>