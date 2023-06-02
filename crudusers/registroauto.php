<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">


            <div class="modal-header">
                <h5>NUEVO REGISTRO </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="content modal-body">


                <form class="form alert alert-warning" action="" method="post">

                    
                    <div class="form-group">
                        <input type="hidden" name="estado" value="Activo">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 content-justify">
                            <label for="">Nombres</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off" required name="firstname">
                        </div>
                        <div class="form-group col-md-4 content-justify">
                            <label for="">Apellidos</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off" required name="lastname">
                        </div>
                        <div class="form-group col-md-4 content-justify">
                            <label for="">Usuario</label>
                            <input class="form-control form-control-lg" type="text" autocomplete="off" required name="user_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="">Correo</label><br>
                            <input class="form-control form-control-lg" type="email" autocomplete="off" required name="user_email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Contraseña</label><br>
                            <input class="form-control " autocomplete="off" required type="password" pattern=".{6,}" title="New Password ( min . 6 caracteres)" name="user_password_hash">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4 ">
                            <label for="" type="hidden">Perfil</label><br>
                            <!--<input type="text" required name="id_tipo" value="< ?php echo $rol; ?>"> -->
                            <select name="id_tipo" class="form-control form-control-lg" required>
                                <option disabled selected value>Seleccionar</option>
                                <option required value="2">Prestador De Servicio</option>
                                <option required value="3">Contratista</option>
                            </select>
                        </div>
                        <input class="form-control form-control-lg" type="hidden" required name="date_added" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <input Class="btn btn-warning btn-sm" name="procesanuevo" type="submit" value="Registrar">
                </form>
            </div>
        </div>

    </div>
</div>