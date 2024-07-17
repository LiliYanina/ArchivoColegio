<?php include "Views/Templates/header.php"; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestión Tipo de Doc Identidad</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmTipoDocumento();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Tipo de Documento Identidad</h3>
            </div>
            <div class="card-body">
                <table id="tblTipoDocumento" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Tipo Documento</th>
                            <!-- <th>Descripcion</th> -->
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>


<div id="nuevo_tipo_documento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Documento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="frmTipoDocumento">
                    <div class="form-group">
                        <label for="tipoDocumento">Tipo Documento</label>
                        <input type="hidden" id="id" name="id">
                        <input id="tipoDocumento" class="form-control" type="text" name="tipoDocumento" placeholder="Tipo de Documento">
                    </div>

                    <!-- <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Ingrese Descripcion">
                    </div> -->

                    <button class="btn btn-primary" type="button" onclick="registrarDocumento(event);" id="btnAccion">Registrar</button>
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