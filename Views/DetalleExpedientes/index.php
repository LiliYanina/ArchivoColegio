<?php include "Views/Templates/header.php"; ?>

<style>
    /* Oculta la primera columna de la tabla */
    #tblDetalleExpedientes td:first-child,
    #tblDetalleExpedientes th:first-child {
        display: none;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalle de Expedientes</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmDetalleExpedientes();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Expedientes</h3>
            </div>
            <div class="card-body">
                <table id="tblDetalleExpedientes" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Id Expediente</th>
                            <th>Id Documento</th>
                            <th>Archivo Pdf</th>
                            <th>Fecha Ingreso</th>
                            <th>Observacion</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="nuevo_detalle_expediente" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Nuevo expediente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="frmDetalleExpedientes" >
                    <div class="form-group">
                        <label for="expediente">Id Expediente:</label>
                        <input type="hidden" id="id" name="id">
                        <select id="expediente" class="form-control" name="expediente">
                        <option value="" disabled selected>Seleccione Expediente</option>
                            <?php foreach ($data['expedientes'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipoDocumento">Documento:</label>
                        <select id="tipoDocumento" class="form-control" name="tipoDocumento">
                        <option value="" disabled selected>Seleccione Documento</option>
                            <?php foreach ($data['documentos'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['descripcion']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="archivo">Subir archivo PDF:</label>
                        <input type="file" id="archivo" name="archivo" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="fecha_ingreso">Fecha de Ingreso:</label>
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="observacion">Observaciones:</label>
                        <textarea id="observacion" name="observacion" class="form-control" rows="3"></textarea>
                    </div>


                    <button class="btn btn-primary" type="button" onclick="registrarDetalleExpedi(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function inicializarSelect2() {
        $('#numero_doc').select2({
            placeholder: 'Buscar dni',
            minimumInputLength: 2,
            ajax: {
                url: base_url + 'DetalleExpedientes/buscarDni',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        lb: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: false // Desactiva el cache
            }
        });
    }

    function recargarSelect2() {
        $('#numero_doc').val(null).trigger('change'); // Resetea el valor seleccionado
        $('#numero_doc').select2('destroy'); // Destruye la instancia actual de Select2
        inicializarSelect2(); // Vuelve a inicializar Select2
    }

    // Inicializar Select2 al cargar la página
    $(document).ready(function() {
        inicializarSelect2();
    });

    // Llama a recargarSelect2 en el momento necesario, por ejemplo, después de enviar un formulario
    // recargarSelect2();
</script>

<?php include "Views/Templates/footer.php"; ?>
