<?php include "Views/Templates/header.php"; ?>

<!-- Agrega los archivos CSS de Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .hidden {
        display: none;
    }
    .select2-container--default .select2-selection--single {
        height: 38px; /* Ajusta el alto del campo para que sea igual a los otros campos */
        padding: 6px 12px; /* Ajusta el padding para alinear el texto */
        font-size: 14px; /* Ajusta el tamaño de la fuente si es necesario */
        line-height: 1.42857143;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%; /* Asegura que el campo ocupe todo el ancho disponible */
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px; /* Ajusta la alineación vertical del texto */
    }
    .select2-container {
        width: 100% !important; /* Asegura que el contenedor de Select2 ocupe todo el ancho disponible */
    }
</style>

<style>
    .hidden {
        display: none;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestión de Expedientes</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmExpedientes();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Expedientes</h3>
                <div class="card-tools">
                    <a href="<?php echo base_url; ?>Expedientes/generarReporte/excel" class="btn btn-success" target="_blank"><i class="fas fa-file-excel"></i> Descargar Excel</a>
                    <a href="<?php echo base_url; ?>Expedientes/generarReporte/pdf" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Descargar PDF</a>
                </div>
            </div>
            <div class="card-body">
                <table id="tblExpedientes" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Persona</th>
                            <th>Estanteria</th>
                            <th>Archivador</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead tbody id="tablaRegistrosDocumento">
                </table>
            </div>
        </div>
    </section>
</div>

<div id="nuevo_expediente" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Nuevo expediente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="get" id="frmExpedientes">
                    <div class="form-group">
                        <label for="persona">Id Persona</label>
                        <input type="hidden" id="id" name="id">
                        <select id="persona" class="form-control" name="persona">
                            <option value="" disabled selected>Seleccione Persona</option>
                            <?php foreach ($data['personas'] as $row) : ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['apellido_pat'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['apellido_mat']. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['nombres']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre_estanterias">Tipo de Estanteria</label>
                        <select id="nombre_estanterias" class="form-control" name="nombre_estanterias">
                            <option value="" disabled selected>Seleccione el tipo de estanteria</option>
                            <?php foreach ($data['estanterias'] as $row) : ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['descripcion']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre_archivadores">Tipo de Archivador</label>
                        <select id="nombre_archivadores" class="form-control" name="nombre_archivadores">
                            <option value="" disabled selected>Seleccione el tipo de archivador</option>
                            <?php foreach ($data['archivadores'] as $row) : ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['id_letra'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['numero']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="button" onclick="registrarExpedi(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ingresar una nueva persona -->
<div id="nueva_persona" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Nueva Persona</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="frmNuevaPersona" method="post">
                    <div class="form-group">
                        <label for="apellido_pat">Apellido Paterno</label>
                        <input type="text" id="apellido_pat" name="apellido_pat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_mat">Apellido Materno</label>
                        <input type="text" id="apellido_mat" name="apellido_mat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" required>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarNuevaPersona(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Agrega los archivos JS de Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicializa Select2 en el campo de selección de personas
        $('#persona').select2({
            placeholder: "Seleccione Persona",
            allowClear: true
        });
    });

    function mostrarFormularioNuevaPersona() {
        $('#nuevo_expediente').modal('hide');
        $('#nueva_persona').modal('show');
    }

    function registrarNuevaPersona(event) {
        event.preventDefault();
        // Aquí agrega el código para registrar la nueva persona en tu base de datos y luego actualizar la lista de personas
        $('#nueva_persona').modal('hide');
        $('#nuevo_expediente').modal('show');
    }

    function frmExpedientes() {
        $('#nuevo_expediente').modal('show');
    }

    function registrarExpedi(event) {
        event.preventDefault();
        // Aquí agrega el código para registrar el nuevo expediente en tu base de datos
    }
</script>

<div id="permisos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Asignar Permisos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmPermisos">
                </form>
            </div>
        </div>
    </div>
</div>

<div id="nuevo_detalle_expediente" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Detalle del Expediente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDetalleExpedientes" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="id_documento">Seleccione tipo de Documento:</label>
                        <input type="hidden" id="id" name="id">
                        <select id="id_documento" class="form-control" name="id_documento">
                            <?php foreach ($data['documentos'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['descripcion']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_ingreso">Fecha Ingreso</label>
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="observacion">Observación</label>
                        <textarea id="observacion" name="observacion" class="form-control" rows="3" required></textarea>
                    </div>

                    <button class="btn btn-primary" type="button" onclick="registrarDetalleExpedi(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>