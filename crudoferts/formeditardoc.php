<!-- Modal para edicion de datos -->

<div id="editar" tabindex="-1" role="dialog" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <b> EDITAR REGISTRO </b>
        <a href="?" type="button" class="close"><span aria-hidden="true">&times;</span></a>
      </div>
      <div class="modal-body">

        <form id="myFormedit">
          <div class="form alert alert-success">
            <div class="form-group">
              <input type="hidden" name="id" id="id_e">
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Placa</label>
                <input class="form-control form-control-lg" type="text" readonly name="placa" id="placa_e">
              </div>
              <div class="form-group col-md-6 ">
                <label for="">Nombre Documento</label><br>
                <!--<input type="text" required name="id_tipo" value="< ?php echo $rol; ?>"> -->
                <select name="nombredoc" id="nombre_e" class="form-control form-control-lg" required>
                  <!--the "value" below here-->
                  <option required value="SOAT">SOAT</option>
                  <option required value="TO">TARJETA OPERACION</option>
                  <option required value="CDA">CDA</option>
                </select>
              </div>
              <div class="form-group col-md-6 ">
                <label>Fecha Vence</label>
                <input class="form-control form-control-lg" type="date" required name="vence" id="vence_e">
              </div>
              <div class="form-group col-md-6">
                <label for="">Notas</label>
                <input class="form-control form-control-lg" type="text" name="notas" id="notas_e">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <button class="btn btn-success" id="update" data-dismiss="modal">Editar</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>