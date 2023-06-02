<html lang="en">

<head>
    <?php
    include('include/header.php');
    include("conf/sessionstart.php");
    include("conf/connexion.php");
    $con = $conn;

    // Validar si el usuario está autenticado y tiene el rol de administrador
    if (!isset($_SESSION['loginuser']) || empty($_SESSION['loginuser']) || $_SESSION['rol'] !== 1) {
    ?>
        <a onclick="return confirm('Sin permisos para acceder aqui!!')"></a>
    <?php
        header('Location: home.php');
        exit();
    }
    ?>

    <title>Ofertas</title>

    <!--RESALTAR TITULO DE SECCION ACTIVE--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href="createof.php"]').addClass('active');
        });
    </script>
</head>

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
            <div class="row container-fluid" style="background-color: rgb(255, 255, 255, 0.3); padding-top:15px; margin:auto;">
            
                <div class="col-6 btn-group">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#nuevo">Crear Oferta +</button>

                </div>

                <form class="form row" method="post">
                <div class="btn has-warning">
                        <span class="glyphicon glyphicon-search"></span></div>
                    <div class="btn-group">
                        <input class="form-control" required name="PalabraClave" id="q" type="text" placeholder="Ofertas" onkeyup='load(1);'>
                    </div>

                   
                </form>

            </div>
            <!--FIN DIV TITULOS--->

            <!-- Modales CRUD-->
            <?php
            //include("crudusers/procesauser.php");
            include("crudusers/newofert.php");
            //include("crudusers/editaruser.php");
            //include("crudusers/leeruser.php");
            include("ajax/pagination.php");
            include("include/ofertstable.php");
            ?>

        </div>
        <!----FIN DE ROW ppal --->
        <div style="margin-top: 8px;"></div>
        <!----DIV DE FOOTER ppal --->

    </div>
    <!----FIN DE CONTAINER FLUID MAYOR--->
</body>

</html>