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
                <div class="row container-fluid" style="background-color: rgb(32, 29, 29); padding:15px; margin:auto;">

                    <div class="btn-group">
                        <!-- PANEL PPAL </a> -->
                        <a type="button" class="btn btn-warning" href="#" data-toggle="modal" data-target="#" style="color:white;">PANEL PRINCIPAL</a>
                    </div>

                </div>
                <!--FIN DIV TITULOS--->
                <!--DIV CONTENIDO SCROLL --->
                <div class="boxscrollhome" style="padding:0px;">
                    <!--ALERTA WARNING DOCUMENTOS 10DIAS --->
                    <div class="container col-6 alert alert-warning">
                        <center>
                            <h4 class="alert-heading">BIENVENIDO A PRODOWORK </h4>
                        </center>
                        <center>Lista de Colabroadores y Servicios !<center>
                    </div>
                    <center>
                        <!--ALERTA DANGER DOCUMENTOS VENCIDOS --->
                        <img src="images/make.jpg" />
                        <center>
                </div>
            </div>

            <div style="margin-top: 8px;"></div>
            <!----FIN DE ROW ppal --->
            <!----DIV DE FOOTER ppal --->
            <?php include("include/footer.php"); ?>
            <!----FIN DIV DE FOOTER--->

        </div>
        <!----FIN DE CONTAINER FLUID MAYOR--->

    </body>

    </html>