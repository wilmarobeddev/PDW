<div id="verdocu" tabindex="-1" role="dialog" class="modal fade" role="dialog" aria-labelledby="verdocu" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                VER REGISTRO
                <a href="documentos.php" type="button" class="close"><span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">

                <form class="form alert alert-success" role="form">
                    <input type="hidden" id="Id_doc">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Placa Vehiculo</label>
                            <input style="color:black; background:beige;" readonly class="form-control" id="Placa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre Documento</label>
                            <input style="color:black; background:beige;" readonly class="form-control" required id="nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Fecha Vence</label>
                            <input style="color:black; background:beige;" readonly class="form-control" required id="vence">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Notas</label>
                            <input style="color:black; background:beige;" readonly class="form-control" required id="notas">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>