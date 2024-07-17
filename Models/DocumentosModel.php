<?php

class DocumentosModel extends Query
{

    private $descripcion, $id, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getDocumentos()
    {
        $sql = "SELECT * FROM documento";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarDocumento(string $descripcion)
    {
        $this->descripcion = $descripcion;

        $verificar = "SELECT * FROM documento WHERE id = '$this->id'";
        $verificar = "SELECT * FROM documento WHERE descripcion = '$this->descripcion'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO documento(descripcion) VALUES(?)";
            $datos = array($this->descripcion);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }

    public function modificarDocumento(string $descripcion, int $id)
    {
        $this->descripcion = $descripcion;
        $this->id = $id;

        $sql = "UPDATE documento SET descripcion = ?WHERE id = ?";
        $datos = array($this->descripcion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarDocumento(int $id)
    {
        $sql = "SELECT * FROM documento WHERE id= $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionDocumento(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE documento SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    
    public function verificarPermisos($id_usuario, $permiso)
    {

        $tiene = false;
        $sql = "SELECT p.*, d.* FROM roles p INNER JOIN detalle_roles d ON p.id = d.id_rol WHERE d.id_usuario = $id_usuario AND p.nombre_rol = '$permiso'";
        $existe = $this->select($sql);
        if ($existe != null || $existe != "") {
            $tiene = true;
        }
        return $tiene;
    }
}
