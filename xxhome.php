    <html lang="en">

    <head>
        <?php include("include/header.php"); ?>
        <title>Home</title>
    </head>
    <?php
    include("conf/connexion.php");
    include("conf/sessionstart.php");
    ?>

    <body>
    <!----INICIO DE CONTAINER FLUID ppal --->
    <div class="container-fluid" style="margin: auto; max-width: 100%; max-height:100%; padding: 0 10px;">
        <!-- contenido del contenedor aquí -->
        <!----INICIO DE DIV BANNER --->
        <?php include('include/banner.php'); ?>
        <!----FIN DE DIV BANNER --->
        <!----INICIO DE ROW ppal --->
        <!--<div class="container-fluid row" style="background-color: transparent; margin: 0; max-width: 100%; height: 79%; padding:0;"> -->
        <!--DIV 11 COLUMNAS PANEL CENTRO --->
        <div class="container-fluid col-11" style="background-color:white; margin: 0; max-width: 100%; max-height: 100%; padding:0; margin-top: 8px;">
            <!--DIV TITULOS PANEL CENTRO --->
                <div class="container-fluid row alert alert-warning" style="padding:10px; margin:0;">

                    
                        <!-- PANEL PPAL </a> -->
                        <div class="col-3">
                           <b class="alert-heading d-flex p-6">Inicio</b>
                        </div>
                        <div class="col-6">
                        </div>

                        <div class="col-3">
                            
                        <b class="alert-heading d-flex p-6"> 
                                          <?php
                                          $saludo = $_SESSION["nombrecompleto"];
                                          echo $saludo;
                                          ?> Bienvenido a Prodowork </b>
                        </div>
                </div>
                <!--FIN DIV TITULOS--->
                <!--DIV CONTENIDO SCROLL --->
                <!-- fondo de inicio con mini imagenes cambiar por carrusel o cargar los servicios que se van creando-->

                 <!-- fondo de inicio con mini imagenes cambiar por carrusel o cargar los servicios que se van creando-->
                
            </div>

            <div style="margin-top: 8px;">
            <div class="card" style="width: 18rem;">

<div class="card-body">
  <h5 class="card-title">Título de la tarjeta</h5>
  <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
  <a href="#" class="btn btn-primary">Ir a algún lugar</a>
</div>
</div>
        
           </div>
            <!----FIN DE ROW ppal --->
            <!----DIV DE FOOTER ppal --->
            <!---< ?php include("include/footer.php"); ?> -->
            <!----FIN DIV DE FOOTER--->

        </div>
        <!----FIN DE CONTAINER FLUID MAYOR--->

    </body>

    </html>