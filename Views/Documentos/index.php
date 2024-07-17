<?php include "Views/Templates/header.php"; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestión de Documentos</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmDocumento();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Documentos</h3>
            </div>
            <div class="card-body">
                <table id="tblDocumentos" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="nuevo_documento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Documento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="frmDocumento">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="hidden" id="id" name="id">
                        <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Ingrese Descripción" required></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <label for="certificado_estudios">Certificado de Estudios (PDF)</label>
                        <input type="file" id="certificado_estudios" name="certificado_estudios" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ficha_matricula">Ficha Matricula (PDF)</label>
                        <input type="file" id="ficha_matricula" name="ficha_matricula" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="copia_dni_estudiante">C. Dni Estudiante (PDF)</label>
                        <input type="file" id="copia_dni_estudiante" name="copia_dni_estudiante" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="boleta_notas">C. Boleta de Notas</label>
                        <input type="file" id="boleta_notas" name="boleta_notas" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="copia_dni_apoderado">C. Dni Apoderado (PDF)</label>
                        <input type="file" id="copia_dni_apoderado" name="copia_dni_apoderado" class="form-control" required>
                    </div> -->

                    <button class="btn btn-primary" type="button" onclick="registrarDocu(event);" id="btnAccion">Registrar</button>
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