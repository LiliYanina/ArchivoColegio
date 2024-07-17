<?php 

class Tipos extends Controller{

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
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
       $this->views->getView($this, "index");
    }

    public function listar()
    {
        $data = $this->model->getTipoDocumento();
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarTipoDocumento(' .$data[$i]['id']. ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarTipoDocumento(' .$data[$i]['id']. ');"><i class="fas fa-trash-alt"></i></button>  
                </div>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarTipoDocumento('.$data[$i]['id']. ');"><i class="fas fa-arrow-left"></i></button>
                </div>';
            }  
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function registrar()
    {
        $tipoDocumento = $_POST['tipoDocumento'];
        // $descripcion = $_POST['descripcion'];
        $id = $_POST['id'];
        
        if (empty($tipoDocumento)){
            $msg = "Todos los campos son obligatorios!";
        }else{
           if($id == ""){
                    $data = $this->model->registrarTipoDocumento($tipoDocumento); 
                    if ($data == "ok") {
                        $msg = "si";
                     }else if($data == "existe"){
                        $msg = "La caja ya existe";
                    }else{
                        $msg = "Error al registrar el tipo de documento";
                    }
                
           }else{
                $data = $this->model->modificarTipoDocumento($tipoDocumento, $id); 
                if ($data == "modificado") {
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el tipo de documento";
                }
           }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id){
        //print_r($id);
        $data = $this->model->editarTipoDocumento($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function eliminar(int $id){
        //print_r($id);
        $data = $this->model->accionTipoDocumento(0, $id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el tipo de documento";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id){
        //print_r($id);
        $data = $this->model->accionTipoDocumento(1, $id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el tipo de documento";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
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
?>



