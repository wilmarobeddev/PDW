<?php
if (!isset($conn)) {
    require_once('../conf/connexion.php');
    require_once('../include/header.php');
    //$saludo = $_SESSION["nombrecompleto"];
}

//<!--------------OFERTA--------->
if (isset($_POST['PROCESS'])) {
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['id_tipo'];



    $sql = "insert into oferts (descripcion,usuario,tipo) values ('$descripcion','$saludo','$tipo')";
    $resul = mysqli_query($conn, $sql);
    if (isset($resul)) {
        $sucessmsj = "Oferta registrada.";
    } else {
        $alerterror = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
}

    if (isset($alerterror)) {

    ?>

        <script>
            $(document).ready(function() {
                $("#myModal").modal("show")
            })
        </script>
        <!-- modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <b class="modal-title">Mensaje de Error</b>
                        <a href="index.php" class="close">&times;</a>
                    </div>
                    <div class="modal-body alert alert-danger">
                        <?php
                        echo $alerterror;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="index.php" class="btn btn-default">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php
    }
    if (isset($sucessmsj)) {

    ?>
            <script>
            $(document).ready(function() {
                $("#myModalsuc").modal("show")
            })
        </script>
        <!-- modal -->
        <div id="myModalsuc" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <b class="modal-title">¡Bien hecho!</b>
                        <a href="oferts.php" class="close">&times;</a>
                    </div>
                    <div class="modal-body alert alert-success">
                        <?php
                         echo $sucessmsj;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="oferts.php" class="btn btn-default">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
<?php
    }
?>