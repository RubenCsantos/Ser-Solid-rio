<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "servoluntario";
    $dbcon = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    $idEvent = $_GET['idEvent'];
    $queryEvent = "DELETE FROM eventos WHERE id = '$idEvent'";
    $resultEvent = mysqli_query($dbcon, $queryEvent);

    if($resultEvent){
        $msg = "Evento eliminado.";
        echo "<script type ='text/javascript'>alert('$msg');</script>";
        header("location: adminPage.php");
    }


    $idUser = $_GET['idUser'];
    $queryUser = "DELETE FROM users2 WHERE id = '$idUser'";
    $resultUser = mysqli_query($dbcon, $queryUser);

    if($resultUser){
        $msg = "Representante eliminado.";
        echo "<script type ='text/javascript'>alert('$msg');</script>";
        header("location: adminPage.php");
    }

    $idEnt = $_GET['idEntid'];
    $queryEnt = "DELETE FROM entidade WHERE id = '$idEnt'";
    $resultEnt = mysqli_query($dbcon, $queryEnt);

    if($resultEnt){
        $msg = "Entidade eliminada.";
        echo "<script type ='text/javascript'>alert('$msg');</script>";
        header("location: adminPage.php");
    }
    
?>
