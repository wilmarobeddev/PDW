<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <b>NUEVO REGISTRO</b>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="myForm">
          <div class="form alert alert-success">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Placa</label>
                <input placeholder="ABC123" class="form-control form-control-lg" type="text" required id="placa" name="placa">
              </div>
              <div class="form-group col-md-6">
                <label for="">Nombre Documento</label><br>
                <select name="nombredoc" id="nombredoc" class="form-control form-control-lg" required>
                  <option selected required value="">Seleccionar</option>
                  <option required value="SOAT">SOAT</option>
                  <option required value="TO">TARJETA OPERACION</option>
                  <option required value="CDA">CDA</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Fecha Vence</label>
                <input class="form-control form-control-lg" type="date" required name="vence" id="vence">
              </div>
              <div class="form-group col-md-6">
                <label for="">Notas</label>
                <input class="form-control form-control-lg" type="text" name="notas" id="notas">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <button class="btn btn-success" id="guardar" data-dismiss="modal">Guardar</button>
            <!-- <a href="propietarios.php" class="btn btn-danger">Cancelar</a> -->
            <button type="reset" class="btn btn-default">Limpiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>