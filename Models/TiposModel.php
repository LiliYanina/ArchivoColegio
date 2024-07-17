<?php

class TiposModel extends Query
{

    private $tipoDocumento, $id, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoDocumento()
    {
        $sql = "SELECT * FROM tipo_documento_identidad WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarTipoDocumento(string $tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        $verificar = "SELECT * FROM tipo_documento_identidad WHERE id = '$this->id'";
        $verificar = "SELECT * FROM tipo_documento_identidad WHERE tipoDocumento= '$this->tipoDocumento'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO tipo_documento_identidad(tipoDocumento) VALUES(?)";
            $datos = array($this->tipoDocumento);
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

    public function modificarTipoDocumento(string $tipoDocumento, int $id)
    {
        $this->tipoDocumento = $tipoDocumento;
        $this->id = $id;

        $sql = "UPDATE tipo_documento_identidad SET tipoDocumento = ? WHERE id = ?";
        $datos = array($this->tipoDocumento, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarTipoDocumento(int $id)
    {
        $sql = "SELECT * FROM tipo_documento_identidad WHERE id= $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionTipoDocumento(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE tipo_documento_identidad SET estado = ? WHERE id = ?";
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
