<?php

class Dashboard extends Controller
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
        $perm = $this->model->verificarPermisos($id_user, "Dashboard");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
        $data['usuarios'] = $this->model->getDatos('usuarios');
        $data['persona'] = $this->model->getDatos('persona');
        $data['tipo_documento_identidad'] = $this->model->getDatos('tipo_documento_identidad');
        $data['archivador'] = $this->model->getDatos('archivador');
        $data['estanteria'] = $this->model->getDatos('estanteria');
        $data['documento'] = $this->model->getDatos('documento');
        $data['expediente'] = $this->model->getDatos('expediente');
        $data['detalle_expediente'] = $this->model->getDatos('detalle_expediente');
        
        
        $this->views->getView($this, "index",$data);
    }
}
