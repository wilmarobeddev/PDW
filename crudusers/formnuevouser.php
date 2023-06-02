<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <b>NUEVO REGISTRO</b>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="myForm">
          <div class="alert alert-success">
            <div class="row">
              <div class="form-group">
                <input type="hidden" name="id">
              </div>
              <div class="form-group">
                <input type="hidden" name="estado" value="Activo">
              </div>
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
              <div class="form-group col-md-4 ">
                <label for="">Perfil</label><br>
                <!--<input type="text" required name="id_tipo" value="< ?php echo $rol; ?>"> -->
                <select name="id_tipo" class="form-control" required>
                  <!--the "value" below here-->
                  <option disabled selected value>Seleccionar</option>
                  <option required value="1">Administrador</option>
                  <option required value="2">Prestador De Servicio</option>
                  <option required value="3">Contratista</option>
                </select>
              </div>
              <input class="form-control form-control-lg" type="hidden" required name="date_added" value="<?php echo  date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">

            </div>

            <input Class="btn btn-primary btn-sm" name="proces" type="submit" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>