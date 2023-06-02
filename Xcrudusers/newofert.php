<?php
$descripcion = '';
$usuario = '';
$tipo = '';

?>
<div id="nuevo" tabindex="-1" role="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">


            <div class="modal-header">
                <h5>Registrar Tarea </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="content modal-body">


                <form class="form alert alert-success" action="" method="post">

                    <div class="row">
                        <div class="form-group col-4 ">
                            <label for="">Tipo Oferta</label><br>
                            <select name="id_tipo" class="form-control form-control-lg" required>
                                <option disabled selected value>Seleccionar</option>
                                <option required value="Obras Domesticas">Obras domésticas</option>
                                <option required value="Diligencias Personales">Diligencias Personales</option>
                                <option required value="Trabajos Informática">Trabajos de Informática</option>
                                <option required value="Oficios Varios">Oficios Varios</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4 content-justify">
                            <label for="">Describa su tarea</label><br>
                            <textarea name="descripcion" rows="10"  cols="40" value="<?php echo $descripcion ?>"></textarea>
                        </div>
                    </div>  
                             
                    <input Class="btn btn-primary btn-sm" name="PROCESS" type="submit" value="Registrar">
                </form>
            </div>
        </div>

    </div>
</div>