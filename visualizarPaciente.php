<?php

    include 'conexion.php';

    $hisCli = $_GET['hisCli'];

    $sentencia = $bd->prepare("SELECT * FROM pacientes WHERE hisCli = ?;");
    $sentencia->execute([$hisCli]);
    $registro = $sentencia->fetch(PDO::FETCH_OBJ);


    $query = $bd->prepare("SELECT * FROM propietarios WHERE hisCli = ?;");
    $query->execute([$hisCli]);
    $register = $query->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Pet Software</title>
    
    <link rel="preload" href="css/normalize.css" as="style"><link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="preload" href="css/buscarpaciente.css" as="style">
    <link rel="stylesheet" href="css/buscarpaciente.css">
    <link rel="stylesheet" href="css/onOff.css">
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/convertirPDF.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        input:focus {
        outline: 2px;
        background-color: #fff7bb;
        border: solid 0.2rem #f6bc00;
        border-radius: 15px;
        }
    </style>
</head>

<body class="agrupar">

<!--------------3. POP UP "VISUALIZAR PACIENTE" - 3.1. CONTENEDOR MASCOTA----------------------------->

    
                            <form class="fechayhora">
                                           
                                    <div class="fecha-vis-pac">
                                            <label>Fecha:</label>
                                            <input class="input-date" type="date" value="<?php echo date("Y-m-d");?>" readonly>
                                    </div>        
                                        
                            </form> 
                  

                            <div class="contenedorhc">
                

                                    <form class="historiaclinica">
                                            <div>
                                                <label>Historia Clínica</label><br>
                                                <input type="" name="visHistoria" value="<?php echo $registro->hisCli;  ?>" readonly>
                                            </div>
                                    </form>

                            </div>

                            <div class="paciente-vis-pac">

                                    <div class="datos-paciente-vis-pac">

                                        <h2>Datos Paciente</h2>

                                    </div>


                                    <form class="formulario1">

                                            <div class="contenedor-infopaciente-vis-pac">   

                                                        <div class="contenedor-imagen flex">

                                                                <figure >
                                                                    <img  class="fotoMascota" src="data:image/jpg;base64,<?php echo base64_encode($registro->fotPac); ?>" readonly>
                                                                </figure>

                                                        </div>

                                                        <div class="campo1">
                                                            <label>Nombre:</label>
                                                            <input class="input-text" type="text" name="visNombre" value="<?php echo $registro->nomPac;  ?>" readonly>
                                                        </div>

                                                        <div class="campo1">
                                                            <label>Especie:</label>
                                                            <input class="input-text" type="text" name="visEspecie" value="<?php echo $registro->espPac;  ?>" readonly>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Raza:</label>
                                                            <input class="input-text" type="text" name="visRaza" value="<?php echo $registro->razPac;  ?>" readonly>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Sexo:</label>
                                                            <input class="input-text" type="text" name="sexo" value="<?php echo $registro->sexPac;  ?>" readonly>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Fecha de Nacimiento:</label>
                                                            <input class="input-text" type="date" name="visNacimiento" value="<?php echo $registro->fecNam;  ?>" readonly>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Color:</label>
                                                            <input class="input-text" type="text" name="visColor" value="<?php echo $registro->colPac;  ?>" readonly>
                                                        </div>
                                                        <div class="campo1">
                                                            <label>Última atención:</label>
                                                            <input class="input-text" type="date" name="visUltAtencion" value="<?php echo $registro->ultAte;  ?>" readonly>
                                                        </div>

                                                
                                            </div> <!--Contenedor-infopaciente--> 
                  
                                    </form>

                            </div>
                   

<!----------3. POP UP "VISUALIZAR PACIENTE - 3.2. CONTENEDOR PROPIETARIO"---------->

                            <div class="propietario-vis-pac">


                                        <div class="datos-propietario-vis-pac">
                                            <h2>Datos Propietario</h2>
                                        </div>

                                                <form class="formulario2">


                                                        <div class="contenedor-infopropietario-vis-pac">  

                                                            <div class="campo2">
                                                                <label>Nombres:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->nomPro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Apellidos:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->apePro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Tipo de documento:</label>
                                                                <input class="input-text" type="text" placeholder=" "value="<?php echo $register->tipDoc;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Número de documento:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->docPro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Dirección:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->dirPro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Municipio:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->munPro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>Celular:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->celPro;  ?>" readonly>
                                                            </div>

                                                            <div class="campo2">
                                                                <label>E-mail:</label>
                                                                <input class="input-text" type="text" placeholder="" value="<?php echo $register->emaPro;  ?>" readonly>
                                                            </div>
                                                            
                                                        </div> <!--contenedor-infopropietario-->
                                                </form>

                                        <div class="contenedor-logo-vis-pac" id="element-to-print">
                                            <img src="img/logohospital.png" alt="" class="imagen1"/>
                                            <img src="img/leyenda.png" alt=""class="imagen2"/>
                                        </div>


                                        <div class="contenedor-info-veterinaria">
                                            <p class="parrafo-info-vet">
                                                    Dirección: Transversal 23 b - Bis N° 26 -23 <br>
                                                    Manila II Sector - Fusagasugá <br>
                                                    Contacto 300 767 2316   -  311 441 2405 <br>
                                            </p>
                                        </div>


                                        <div class="contenedor-btns-vis-pac">

                                                <form action="" method="POST">
                                                    <div class="btn2">
                                                        <button type="submit" id="btnCrearExcel">Excel</button>
                                                    </div>
                                                </form>

                                                    <div class="btn2">
                                                        <button type="submit" id="btnCrearPdf">PDF</button>
                                                    </div>
                                    
                                        </div>

                        </div>           



</body>
</html>
