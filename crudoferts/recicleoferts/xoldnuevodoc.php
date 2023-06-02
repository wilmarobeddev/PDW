<?php
$id = '';
$placa = '';
//$nombre = '';
$vence = '';
$notas = '';
?>
<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                NUEVO REGISTRO
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="content modal-body">
                <form class="form alert alert-success" action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Placa</label>
                            <input placeholder="ABC123" class="form-control form-control-lg" type="text" required name="placa" value="<?php echo $placa ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre Documento</label><br>
                            <select name="nombredoc" class="form-control form-control-lg" required>
                                <option selected required value="">Seleccionar</option>
                                <option required value="SOAT">SOAT</option>
                                <option required value="TO">TARJETA OPERACION</option>
                                <option required value="CDA">CDA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fecha Vence</label>
                            <input class="form-control form-control-lg" type="date" required name="vence" value="<?php echo $vence; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Notas</label>
                            <input class="form-control form-control-lg" type="text" name="notas" value="<?php echo $notas ?>">
                        </div>
                    </div>
                    <input Class="btn btn-primary btn-sm" type="submit" name="procesar" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</div>