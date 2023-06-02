<?php
$id = '';
$nombre = '';
$apellido = '';
$usuario = '';
$email = '';
$rol = '';
$dateadd = '';
$estado = '';
$pass = '';


$time = date_default_timezone_set("America/Bogota");
$hoy = date("Y-m-d");


?>
<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">


            <div class="modal-header">
                <h5>NUEVO REGISTRO </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="content modal-body">


                <form class="form alert alert-success" action="" method="post">

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="estado" value="Activo">
                    </div>
                    <div class="row">
                        <div class="form-group col-4 content-justify">
                            <label for="">Nombres</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off"  required name="firstname" value="<?php echo $nombre ?>">
                        </div>
                        <div class="form-group col-4 content-justify">
                            <label for="">Apellidos</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off" required name="lastname" value="<?php echo $apellido ?>">
                        </div>
                        <div class="form-group col-4 content-justify">
                            <label for="">Usuario</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off" required name="user_name" value="<?php echo $usuario ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="">Correo</label><br>
                            <input class="form-control form-control-lg" type="email" autocomplete="off" required name="user_email" value="<?php echo $email; ?>" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Contraseña</label><br>
                            <input class="form-control " autocomplete="off" required type="password" pattern=".{6,}" title="New Password ( min . 6 caracteres)" name="user_password_hash" value="<?php echo $pass ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4 ">
                            <label for="">Perfil</label><br>
                            <!--<input type="text" required name="id_tipo" value="< ?php echo $rol; ?>"> -->
                            <select name="id_tipo" class="form-control form-control-lg" required>
                                <!--the "value" below here-->
                                <option disabled selected value>Seleccionar</option>
                                <option required value="1">Admin</option>
                                <option required value="2">Colaborador</option>
                                <option required value="3">Usuario</option>
                            </select>
                        </div>
                            <input class="form-control form-control-lg" type="hidden" required name="date_added" value="<?php echo $hoy; ?>" max="<?php echo date('Y-m-d'); ?>">

                    </div>
                    <input Class="btn btn-primary btn-sm" name="proces" type="submit" value="Registrar">
                </form>
            </div>
        </div>

    </div>
</div>

