<?php include "Views/Templates/header.php"; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestión de Personas</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmPersonas();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Personas</h3>
                <div class="card-tools">
                    <a href="<?php echo base_url; ?>Personas/generarReporte/excel" class="btn btn-success" target="_blank"><i class="fas fa-file-excel"></i> Descargar Excel</a>
                    <a href="<?php echo base_url; ?>Personas/generarReporte/pdf" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Descargar PDF</a>
                </div>
            </div>
            <div class="card-body">
                <table id="tblPersonas" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Tipo Doc</th>
                            <th>N° de Doc</th>
                            <th>Cod Estudiante</th>
                            <th>A. Paterno</th>
                            <th>A. Materno</th>
                            <th>Nombres</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="nueva_persona" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Persona</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="frmPersonas" autocomplete="off">
                    <div class="form-group">
                        <label for="tipoDocumento">Seleccione tipo de Documento:</label>
                        <input type="hidden" id="id" name="id">
                        <select id="tipoDocumento" class="form-control" name="tipoDocumento">
                            <?php foreach ($data['documentos'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['tipoDocumento']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numero_doc">Número de Documento</label>
                        <input id="numero_doc" class="form-control" type="text" name="numero_doc" placeholder="Número de Documento" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>

                    <div class="form-group">
                        <label for="codigo_estudiante">Código de Estudiante</label>
                        <input id="codigo_estudiante" class="form-control" type="text" name="codigo_estudiante" placeholder="Código de Estudiante">
                    </div>
                    <div class="form-group">
                        <label for="apellido_pat">Apellido Paterno</label>
                        <input id="apellido_pat" class="form-control" type="text" name="apellido_pat" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <label for="apellido_mat">Apellido Materno</label>
                        <input id="apellido_mat" class="form-control" type="text" name="apellido_mat" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input id="nombres" class="form-control" type="text" name="nombres" placeholder="Nombres">
                    </div>

                    <button class="btn btn-primary" type="button" onclick="registrarPersona(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


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


<!-- <script src="< ?php echo base_url; ?>Assets/js/password.js"></script> -->
<?php include "Views/Templates/footer.php"; ?>