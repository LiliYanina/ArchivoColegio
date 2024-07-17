<?php include "Views/Templates/header.php"; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestión de Usuarios</h1>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mb-2 ml-2" type="button" onclick="frmUsuario();"><i class="fas fa-plus"></i> Nuevo Registro</button>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
                <div class="card-tools">
                    <a href="<?php echo base_url; ?>Usuarios/generarReporte/excel" class="btn btn-success" target="_blank"><i class="fas fa-file-excel"></i> Descargar Excel</a>
                    <a href="<?php echo base_url; ?>Usuarios/generarReporte/pdf" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Descargar PDF</a>
                </div>
            </div>
            <div class="card-body">
                <table id="tblUsuarios" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Dni</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="frmUsuario" autocomplete="off">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="hidden" id="id" name="id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ingrese Usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre del Usuario" required>
                    </div>

                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Ingrese Contraseña" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" class="form-control" type="text" name="dni" placeholder="Ingrese DNI" pattern="\d{8}" title="El DNI debe contener exactamente 8 dígitos" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="if(this.value.length > 8) this.value = this.value.slice(0, 8);">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <div class="card border-primary">
                            <div class="card-body">
                                <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                <span id="icon-cerrar"></span>
                                <input id="imagen" class="d-none" type="file" name="imagen" onchange="previsualizacionImage(event)">
                                <input type="hidden" id="foto_actual" name="foto_actual">
                                <input type="hidden" id="foto_delete" name="foto_delete">
                                <img class="img-thumbnail" id="img-preview">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="permisos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xll" role="document">
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