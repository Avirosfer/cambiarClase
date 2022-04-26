<?php

    if(!isset($_POST['oculto'])){
        header('Location: formulariobuscarpaciente.php');
    }


    include 'conexion.php';

//INFORMACIÓN ENVIADA POR EL FORMULARIO//

    $hisCli2 = $_POST['hisCli2'];
    $nomPac = $_POST['nomPac'];
    $espPac = $_POST['espPac'];
    $sexPac = $_POST['sexPac'];
    $razPac = $_POST['razPac'];
    $fecNam = $_POST['fecNam'];
    $colPac = $_POST['colPac'];
    $ultAte = $_POST['ultAte'];

    $hisCli3 = $_POST['hisCli3'];
    $nomPro = $_POST['nomPro'];
    $apePro = $_POST['apePro'];
    $tipDoc = $_POST['tipDoc'];
    $docPro = $_POST['docPro'];
    $dirPro = $_POST['dirPro'];
    $munPro = $_POST['munPro'];
    $celPro = $_POST['celPro'];
    $emaPro = $_POST['emaPro'];
    
    
//ACTUALIZAR TABLA//

    $sentencia = $bd->prepare ("UPDATE pacientes SET nomPac=?, espPac=?, sexPac=?, razPac=?,  fecNam=?, colPac=?, ultAte=? WHERE `hisCli`= ?;");
    $resultado = $sentencia->execute([$nomPac, $espPac, $sexPac, $razPac, $fecNam, $colPac, $ultAte, $hisCli2]);

    $query = $bd->prepare("UPDATE propietarios SET nomPro=?, apePro=?, tipDoc=?, docPro=?,  dirPro=?, munPro=?, celPro=?, emaPro=? WHERE `hisCli`= ?;");
    $register = $query->execute([$nomPro, $apePro, $tipDoc, $docPro, $dirPro, $munPro, $celPro, $emaPro, $hisCli3]);


    if($resultado){
        header('Location:formulariobuscarpaciente.php');
    }else{
        echo "ERROR al MODIFICAR registro";
    }

     if($register){
        header('Location:formulariobuscarpaciente.php');
    }else{
        echo "ERROR al MODIFICAR registro";
    }

?>