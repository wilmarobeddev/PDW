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
    <div class="container-fluid" style="margin: auto; max-width: 100%; max-height:100%; padding: 0 10px;" bac>
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
                        echo '<a href="profile.php" style="color:black;">' . $saludo . '</a>';
                        ?> &nbsp; | Bienvenido a Prodowork
                    </b>
                </div>
            </div>
            <div class="boxscroll">
                <!--FIN DIV TITULOS--->
                <!--DIV CONTENIDO SCROLL --->
                <!-- fondo de inicio con mini imagenes cambiar por carrusel o cargar los servicios que se van creando-->

                <!-- fondo de inicio con mini imagenes cambiar por carrusel o cargar los servicios que se van creando-->
                <?php
                // Establece la conexión con la base de datos (reemplaza los valores según tu configuración)
                $conexion = new PDO("mysql:host=localhost;dbname=prodowork", "root", "");

                // Realiza la consulta a la base de datos para obtener los datos de la tabla "oferts"
                $query = $conexion->query("SELECT descripcion, tipo FROM oferts");

                // Almacena los resultados en un array
                $ofertas = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="card" style=" justify-content: center">
                    <?php foreach ($ofertas as $oferta) : ?>
                        <div class="card bg-light">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $oferta['tipo']; ?></h5>
                                    <p class="card-text"><?php echo $oferta['descripcion']; ?></p>
                                    <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-primary">Contactar</a></small></p>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!----FIN DE ROW ppal --->
                <!----DIV DE FOOTER ppal --->
                <!---< ?php include("include/footer.php"); ?> -->
                <!----FIN DIV DE FOOTER--->

                <!----FIN DE CONTAINER FLUID MAYOR--->
            </div>
        </div>
    </div>

</body>
</head>

</html>