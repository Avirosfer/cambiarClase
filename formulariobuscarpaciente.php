
<?php

   include 'conexion.php';
   $sentencia = $bd->query("SELECT * FROM pacientes;");
   $registros = $sentencia->fetchall(PDO::FETCH_OBJ);

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="css/buscarpaciente.css" as="style">
    <link rel="stylesheet" href="css/buscarpaciente.css">
    <link rel="stylesheet" href="css/onOff.css">
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/convertirPDF.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body class="agrupar">

       <div class="seccion-buscar">

            <div class="seccion-lupa">

                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#536471" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
                    
                <input class="busqueda" type="text" placeholder="Buscar en VetPet">

                <div class="btn1">
                    <button class="btnBuscar">Buscar</button>
                </div>
                
            </div>

            <div class="seccion-botones">


                <div class="btn2">
                    <form action="nuevoPaciente.php" method="POST">
                        <button class="btnCrear" id="btnCrear">Crear</button>
                    </form>
                </div>
                <div class="btn3">
                    <button class="btnReporte">Reporte</button>
                </div>

            </div>
                
       </div>

       <div class="listado-pacientes">

            <h3>Pacientes</h3>

            <div>

                <table class="tabla">

                    <tr class="primaFila"><!--fila-->
                             <th class="historia">Historia Clínica</th><!--columna-->
                             <th class="nombre">Nombre</th><!--columna-->
                             <th class="sexo">Sexo</th><!--columna-->
                             <th class="especie">Especie</th><!--columna-->
                             <th class="raza">Raza</th><!--columna-->
                             <th class="ultAtencion">Fecha Ultima Atención</th><!--columna-->
                             <th class="propietario">Propietario</th><!--columna-->
                             <th class="observaciones">Observaciones</th><!--columna-->
                             <th class="acciones">Acciones</th><!--columna--> 
                    </tr>

                    <?php
                        foreach ($registros as $dato) { ?>

                            <tr class="fila"><!--fila-->
                                 <td name="tdHistoria"><?php echo $dato->hisCli; ?></td><!--columna-->
                                 <td name="tdNombre"><?php echo $dato->nomPac; ?></td><!--columna-->
                                 <td name="tdSexo"><?php echo $dato->sexPac; ?></td><!--columna-->
                                 <td name="tdEspecie"><?php echo $dato->espPac; ?></td><!--columna-->
                                 <td name="tdRaza"><?php echo $dato->razPac; ?></td><!--columna-->
                                 <td name="tdUltAtencion"><?php echo $dato->ultAte; ?></td><!--columna-->
                                 <td name="tdPropietario"><?php echo $dato->proPac; ?></td><!--columna-->
                                 <td name="tdObservaciones"><?php echo $dato->obsPac; ?></td><!--columna-->
                                 <td name="tdAcciones" class="contenedor-acciones">
                                 <input type="hidden" name="oculto" value="1">

                                    <form action="" method="POST">

                                        <a href="visualizarPaciente.php?hisCli=<?php echo $dato->hisCli;?>">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                  <circle cx="12" cy="12" r="2" />
                                                  <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                            </svg>

                                        </a>

                                    </form>

                                    <form action="" method="POST">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                  <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                                  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                            </svg>

                                    </form>

                                    <div class="switch-button">
                                        <!-- Checkbox -->
                                        <input type="checkbox" name="switch-button"  id="switch-label" class="switch-button__checkbox">
                                        <!-- Botón -->
                                        <label for="switch-label" class="switch-button__label"></label>
                                    </div>


                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="9" />
                                          <line x1="9" y1="12" x2="15" y2="12" />
                                          <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </td><!--columna-->
                            </tr>

                            <?php
                        }
                    ?>
                    
                </table>

            </div>

       </div>


<!----------------------1. POP UP ALERT EDITAR------------------------->


            <div class="alert-editar-pop-up">
            
                <div class="alert-editar-pop-wrap">

                        <h3>¿Desea EDITAR la información del paciente/propietario?</h3>


                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="112" height="112" viewBox="0 0 24 24" stroke-width="1.5" stroke="#81D7F0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                

                        <div class="contenedor-inactivar-pac-btns">

                                <form action="editarPaciente.php?hisCli=<?php echo $dato->hisCli;?>" method="POST">

                                        <div class="btn5">

                                                 <button type="submit" class="siEditar">Sí</button>

                                        </div>

                                </form>

                                <form action="" method="POST">
                                        
                                        <div class="btn6 close-alert-editar">

                                                <button>No</button>
                                        </div>

                                </form>
                                    
                        </div>

                </div>

            </div>


<!----------------------8. POP UP INACTIVAR PACIENTE------------------------->


            <div class="inactivar-pac-pop-up">
            
                <div class="inactivar-pac-pop-wrap">

                        <div class="close-inactivar-pac flex alinear-derecha">
                                
                                <form action="" method="POST">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" id="close-inactivar-pac" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                              <circle cx="12" cy="12" r="9" />
                                              <path d="M10 10l4 4m0 -4l-4 4" />
                                        </svg>
                                    </a>
                                </form>

                        </div>

                        <h3>Ha INACTIVADO al paciente</h3>

                
                            <a href="#">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="112" height="112" viewBox="0 0 24 24" stroke-width="1.5" stroke="#81D7F0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </a>
                    
                </div>

            </div>

<!----------------------9. POP UP ACTIVAR PACIENTE------------------------->


            <div class="activar-pac-pop-up">
            
                <div class="activar-pac-pop-wrap">

                         <div class="close-activar-pac flex alinear-derecha">
                                
                                <form action="" method="POST">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" id="close-activar-pac" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                              <circle cx="12" cy="12" r="9" />
                                              <path d="M10 10l4 4m0 -4l-4 4" />
                                        </svg>
                                    </a>
                                </form>

                        </div>

                        <h3>Ha REACTIVADO al paciente</h3>

                
                            <a href="#">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="112" height="112" viewBox="0 0 24 24" stroke-width="1.5" stroke="#81D7F0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </a>

                    
                </div>

            </div>


<!--------------10. POP UP "REPORTES"----------------------------->

        <div class="reportes-pop-up">

            <div class="reportes-pop-wrap">

                    <div class="close-reportes flex alinear-derecha">
                            
                            <form action="" method="POST">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" id="close-reportes" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="9" />
                                          <path d="M10 10l4 4m0 -4l-4 4" />
                                    </svg>
                                </a>
                            </form>

                    </div>


        <div class="listado-pacientes">

          <div id="element-to-print-reportes"><!--INICIO IMPRIMIR PDF-->

                        <div class="titulo-reportes">
                            <h3>Pacientes</h3>
                        </div>

                    <div>

                        <table class="tabla">

                            <tr class="fila"><!--fila-->
                                     <th class="historia">Historia Clínica</th><!--columna-->
                                     <th class="nombre">Nombre</th><!--columna-->
                                     <th class="sexo">Sexo</th><!--columna-->
                                     <th class="especie">Especie</th><!--columna-->
                                     <th class="raza">Raza</th><!--columna-->
                                     <th class="ultima">Fecha Ultima Atención</th><!--columna-->
                                     <th class="propietario">Propietario</th><!--columna-->
                                     <th class="observaciones">Observaciones</th><!--columna-->
                                     <th class="acciones">Acciones</th><!--columna--> 
                            </tr>

                            <tr class="fila"><!--fila-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->

                                 <td class="contenedor-acciones">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="2" />
                                          <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                          <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                    </svg>

                                    <!--<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-toggle-left-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="8" cy="12" r="2" />
                                          <rect x="2" y="6" width="20" height="12" rx="6" />
                                    </svg>-->

                                    <div class="switch-button">
                                        <!-- Checkbox -->
                                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                                        <!-- Botón -->
                                        <label for="switch-label" class="switch-button__label"></label>
                                    </div>


                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="9" />
                                          <line x1="9" y1="12" x2="15" y2="12" />
                                          <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </td><!--columna-->
                            </tr>

                            <tr class="fila"><!--fila-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->
                                 <td></td><!--columna-->

                                 <td class="contenedor-acciones">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="2" />
                                          <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                          <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                    </svg>

                                    <!--<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-toggle-left-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="8" cy="12" r="2" />
                                          <rect x="2" y="6" width="20" height="12" rx="6" />
                                    </svg>-->

                                    <div class="switch-button">
                                        <!-- Checkbox -->
                                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                                        <!-- Botón -->
                                        <label for="switch-label" class="switch-button__label"></label>
                                    </div>


                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus-pac" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0D4251" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                          <circle cx="12" cy="12" r="9" />
                                          <line x1="9" y1="12" x2="15" y2="12" />
                                          <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </td><!--columna-->
                            </tr>
                            
                        </table>

                    </div>

               </div> <!-- Fin de Imprimir PDF-->

                        <div class="contenedor-reportes-btns">

                                 <form action="" method="POST">
                                        <div class="btn2">
                                                <button type="submit" id="btnCrearExcel">Excel</button>
                                        </div>
                                </form>

                                        <div class="btn2">
                                                <button type="submit" id="btnCrearPdfReportes">PDF</button>
                                        </div>
                                            
                        </div>


    </div>

</div>


</body>
</html>