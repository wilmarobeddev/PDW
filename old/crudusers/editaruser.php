<div id="editarmodal" tabindex="-1" role="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                    <a href="" type="button" class="close"><span aria-hidden="true">&times;</span></a>
                </div>
            <div class="modal-body row">
                <div class="col-8">
                    <CENTER><b>FORMULARIO EDITAR DATOS GENERAL</b></CENTER>
                    <form class="form alert alert-success" action="" method="POST" role="form">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" id="id">
                        </div>
                        <div class="row">
                            <div class="form-group content-justify col-6">
                                <label for="">Usuario</label>
                                <input style="color:black; background:beige;" readonly class="form-control" required type="text" name="user_name" id="usuario">
                            </div>

                            <div class="form-group content-justify col-6">
                                <label for="">Fecha Creacion</label>
                                <input style="color:black; background:beige;" readonly class="form-control" type="text" name="date_added" id="fecha">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group content-justify col-6">
                                <label for="">Nombres</label>
                                <input class="form-control" required type="text" name="firstname" id="nombre">
                            </div>

                            <div class="form-group content-justify col-6">
                                <label for="">Apellidos</label>
                                <input class="form-control" required type="text" name="lastname" id="apellido">
                            </div>
                        </div>

                        <div class="form-group content-justify">
                            <label for="">Email</label>
                            <input class="form-control" required type="email" name="user_email" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                       
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Perfil</label><br>
                                <select name="id_tipo" class="form-control form-control-lg" required id="role">
                                    <option required value="1">Admin</option>
                                    <option required value="2">Auditor</option>
                                    <option required value="3">Inspector</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Estado</label>
                                <select name="estado" class="form-control form-control-lg" required id="estado">
                                    <!--the "value" below here-->
                                    <option required value="Activo">Activo</option>
                                    <option required value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <input Class="btn btn-primary" name="procesaeditar" type="submit" value="Actualizar Datos">
                    </form>

                </div>

                <div class="col-4">
                    <CENTER><b>FORMULARIO EDITAR PASS</b></CENTER>
                    <form class="form alert alert-success" action="" method="POST" role="form">
                        <input class="form-control" type="hidden" name="id" id="id2">
                        <div class="form-group content-justify">
                            <label for="">New Password</label>
                            <input class="form-control" required type="password" name="newpass" pattern=".{6,}" title="New Password ( min . 6 caracteres)">
                            <hr>
                            <label for="">Repetir Password</label>
                            <input class="form-control" required type="password" name="repeatpass2" pattern=".{6,}" title="Repite Password ( min . 6 caracteres)">
                        </div>
                        <input Class="btn btn-primary" name="postpw" type="submit" value="Cambiar contraseña">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
//VALIDAR Y CAMBIO DE CONTRASEÑA
if (isset($_POST['postpw'])) {

    if (empty($_POST['id'])) {
        $errors[] = "ID vacío";
    } elseif (empty($_POST['newpass']) || empty($_POST['repeatpass2'])) {
        $errors[] = "Contraseña vacía";
    } elseif ($_POST['newpass'] !== $_POST['repeatpass2']) {
        $errors[] = "la contraseña y la repetición de la contraseña No coinciden!";
    } elseif (
        !empty($_POST['id'])
        && !empty($_POST['newpass'])
        && !empty($_POST['repeatpass2'])
        && ($_POST['newpass'] === $_POST['repeatpass2'])
    ) {
        $user_id = intval($_POST['id']);
        $user_password = $_POST['newpass'];
        $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

        // write new user's data into database
        $sql = "UPDATE users SET user_password_hash='" . $user_password_hash . "' WHERE user_id='" . $user_id . "'";
        $querypass = mysqli_query($mysqli, $sql);

        // if user has been added successfully
        if ($querypass) {
            $message = "contraseña ha sido modificada con éxito.";
        } else {
            $error = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
        }
    } else {
        $error = "Un error desconocido ocurrió.";
    }

    if (isset($error)) {

?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong>
            <?php
            echo $error;
            ?>
        </div>
    <?php
    }
    if (isset($message)) {

    ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Bien hecho!</strong>
            <?php
            echo $message;
            ?>
        </div>
<?php
    }
}

?>