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

    <title>Usuarios</title>

    <!--RESALTAR TITULO DE SECCION ACTIVE--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href="users.php"]').addClass('active');
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
            <b><h4>Panel Usuarios </h4></b>
                <div class="col-6 btn-group">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#nuevo">Agregar Usuario +</button>

                </div>

                <form class="form row" method="post">
                <div class="btn has-warning">
                        <span class="glyphicon glyphicon-search"></span></div>
                    <div class="btn-group">
                        <input class="form-control" required name="PalabraClave" id="q" type="text" placeholder="username o nombres a buscar" onkeyup='load(1);'>
                    </div>
                </form>

            </div>
            <!--FIN DIV TITULOS--->

            <!-- Modales CRUD-->
            <?php
            include("crudusers/formnuevouser.php");
            //include("crudusers/editaruser.php");
            include("crudusers/leeruser.php");
            include("ajax/pagination.php");
            ?>
            <div id="tabla">
                <?php
                include("include/paginadousers.php");
                ?>
            </div>

        </div>
        <!----FIN DE ROW ppal --->
        <div style="margin-top: 8px;"></div>
        <!----DIV DE FOOTER ppal --->

    </div>
    <!----FIN DE CONTAINER FLUID MAYOR--->
</body>

</html>


<script src="js/funcionesusers.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#guardar').click(function() {

            var placa = $('#placa').val();
            var nomdoc = $('#nombredoc').val();
            var vence = $('#vence').val();
            // Obtener la fecha actual
            var fechaActual = new Date();
            fechaActual.setDate(fechaActual.getDate() - 1);

            // Convertir la fecha de vencimiento a un objeto Date
            var fechaVencimiento = new Date(vence);

            // Validar que los campos estén seleccionados
            if (placa === '') {
                alertify.error('Por favor, complete el campo Placa.');
                $('#placa').focus(); // Enfocar el campo Placa
                return false
            } else if (nomdoc === '') {
                alertify.error('Por favor Selecione un documento.');
                $('#nombredoc').focus(); // Enfocar el campo Kilometraje
                return false
            } else if (vence === '') {
                alertify.error('Por favor Selecione una fecha de vencimiento.');
                $('#vence').focus(); // Enfocar el campo Kilometraje
                return false
            } else if (fechaVencimiento < fechaActual) {
                alertify.error('La fecha de vencimiento debe ser mayor o igual a la fecha actual.');
                return false;
            } else {
                // Los campos están seleccionados, puedes ejecutar la acción
                agregar();
            }
        });

        $('#update').click(function() {

            let placa = $('#placa_e').val();
            var vence = $('#vence_e').val();
            // Obtener la fecha actual
            var fechaActual = new Date();
            fechaActual.setDate(fechaActual.getDate() - 1);

            // Convertir la fecha de vencimiento a un objeto Date
            var fechaVencimiento = new Date(vence);


            if (placa === '') {
                alertify.error('Por favor, complete el campo Placa.');
                $('#placa_e').focus(); // Enfocar el campo Placa
                return false
            } else if (fechaVencimiento < fechaActual) {
                alertify.error('La fecha de vencimiento debe ser mayor o igual a la fecha actual.');
                return false;
            } else {
                update();
            }
        });
    });
</script>