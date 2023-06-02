<html lang="en">

<head>
    <?php
    //$spinner = "";
    include('include/header.php');
    include("conf/sessionstart.php");
    include("conf/connexion.php");
    $con = $conn;
    ?>
    <title>Ofertas</title>
    <!--RESALTAR TITULO DE SECCION ACTIVE--->
    <!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('a[href="oferts.php"]').addClass('active');
        });
    </script>
</head>

<body>
    <div class="container-fluid" style="margin: auto; max-width: 100%; max-height:100%; padding: 0 10px;">
        <!-- contenido del contenedor aquí -->
        <!----INICIO DE DIV BANNER --->
        <?php include('include/banner.php'); ?>
        <!----FIN DE DIV BANNER --->
        <div class="container-fluid col-11" style="background-color:white; margin: 0; max-width: 100%; max-height: 100%; padding:0; margin-top: 8px;">
            <!--DIV TITULOS PANEL CENTRO --->
            <div class="row container-fluid" style="background-color: rgb(255, 255, 255, 0.3); padding-top:15px; margin:auto;">
                <b>
                    <h4>Panel Ofertas </h4>
                </b>
                <div class="col-6 btn-group">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#nuevo">Crear Oferta +</button>
                </div>
                <form class="form row" method="post">
                    <div class="btn has-warning">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                    <div class="btn-group">
                        <input class="form-control" required name="PalabraClave" id="q" type="text" placeholder="Ofertas" onkeyup='load(1);'>
                    </div>


                </form>
                </form>

            </div>
            <!--FIN DIV TITULOS--->

            <?php
            include("crudoferts/procesaofertdb.php");
            include("ajax/pagination.php");
            include("crudoferts/formnewofert.php");
            ?>
            <div id="tabla">
                <?php
                include("include/pagoferts.php");
                ?>
            </div>
            <!--DIV CONTENIDO SCROLL --->
        </div>
    </div>
    <!----FIN DE CONTAINER FLUID MAYOR--->

</body>

</html>

<script src="js/funcionesoferts.js"></script>

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