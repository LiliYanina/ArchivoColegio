<?php

class DetalleExpedientes extends Controller
{

    protected $views, $model, $perm;

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "Archivadores");
        // $perm = $this->model->verificarPermisos($id_user, "Expedientes");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
        //    $this->views->getView($this, "index");
        // $data['estanterias'] = $this->model->getEstanteria();
        // $data['archivadores'] = $this->model->getArchivador();
        $data['documentos'] = $this->model->getTipoDocumento();
        $data['expedientes'] = $this->model->getExpediente();
        $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }

        $data = $this->model->getDetalleExpediente();
        if (!empty($data) && isset($data[0]['archivo'])) {
            $_SESSION['archivo'] = $data[0]['archivo'];
        }

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['id_expediente'] = $data[$i]['expediente_id'];
            $data[$i]['id_documento'] = $data[$i]['documento_descripcion'];

            $data[$i]['archivo'] = '<div class="column"><a href="' . base_url . "Assets/documentos/Archivo/" . $data[$i]['archivo'] . '" target="_blank"><img class="pdf-icon" src="' . base_url . 'Assets/pdf.png" width="25"></a> <span class="eye-container"><a href="' . base_url . "Assets/documentos/Archivo/" . $data[$i]['archivo'] . '" target="_blank"><img class="eye-icon" src="' . base_url . 'Assets/eye.png" width="25"></a></span></div>';
            
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnDetalleEditarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnDetalleEliminarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
            </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnDetalleReingresarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-left"></i></button>
            </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }



    public function registrar()
    {
        $expediente = $_POST['expediente'];
        $tipoDocumento = $_POST['tipoDocumento'];

        $pdf1 = $_FILES['archivo'];
        $nameuno = $pdf1['name'];
        $tmp_name1 = $pdf1['tmp_name'];
        $destino1 = "Assets/documentos/Archivo/" . $nameuno;
        if (empty($nameuno)) {
            $nameuno = "default.pdf";
        }

        $fecha_ingreso = $_POST['fecha_ingreso'];
        $observacion = $_POST['observacion'];
        $id = $_POST['id'] ?? "";


        if (empty($expediente)  || empty($tipoDocumento) || empty($fecha_ingreso) ) {
            $msg = "Todos los campos son obligatorios!";
        } else {
            if ($id == "") {
                $data = $this->model->registrarDetalleExpediente($expediente, $tipoDocumento, $nameuno, $fecha_ingreso, $observacion);
                if ($data == "ok") {
                    $msg = "si";
                    move_uploaded_file($tmp_name1, $destino1);
                } else if ($data == "existe") {
                    $msg = "El expediente ya existe";
                } else {
                    $msg = "Error al registrar el expediente";
                }
            } else {
                $data = $this->model->modificarDetalleExpediente($expediente, $tipoDocumento, $nameuno, $fecha_ingreso, $observacion, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                    move_uploaded_file($tmp_name1, $destino1);
                } else {
                    $msg = "Error al modificar el expediente";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id)
    {
        $data = $this->model->editarDetalleExpediente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionDetalleExpediente(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el detalle expediente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionDetalleExpediente(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el detalle expediente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function buscarDni()
    {
        if (isset($_GET['lb'])) {
            $valor = $_GET['lb'];
            $data = $this->model->buscarDni($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function permisos($id)
    {
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "roles");
        if (!$perm && $id_user != 1) {
            echo '<div class="card">
                    <div class="card-body text-center">
                        <span class="badge badge-danger">No tienes permisos</span>
                    </div>
                </div>';
            exit;
        }
        $data = $this->model->getPermisos();
        $asignados = $this->model->getDetallePermisos($id);
        $datos = array();
        foreach ($asignados as $asignado) {
            $datos[$asignado['id_rol']] = true;
        }
        echo '<div class="row">
        <input type="hidden" name="id_usuario" value="' . $id . '">';
        foreach ($data as $row) {
            echo '<div class="d-inline mx-3 text-center">
                    <hr>
                    <label for="" class="font-weight-bold text-capitalize">' . $row['nombre_rol'] . '</label>
                        <div class="center">
                            <input type="checkbox" name="permisos[]" value="' . $row['id'] . '" ';
            if (isset($datos[$row['id']])) {
                echo "checked";
            }
            echo '>
                        
                    </div>
                </div>';
        }
        echo '</div>
        <button class="btn btn-primary mt-3 btn-block" type="button" onclick="registrarPermisos(event);">Actualizar</button>';
        die();
    }

    public function registrarPermisos()
    {
        $id_user = $_POST['id_usuario'];
        $permisos = $_POST['permisos'];
        $this->model->deletePermisos($id_user);
        if ($permisos != "") {
            foreach ($permisos as $permiso) {
                $this->model->actualizarPermisos($id_user, $permiso);
            }
        }
        echo json_encode("ok");
        die();
    }
}
