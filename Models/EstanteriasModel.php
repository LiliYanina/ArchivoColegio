<?php

class EstanteriasModel extends Query
{

    private $descripcion, $id , $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getEstanterias()
    {
        $sql = "SELECT * FROM estanteria";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarEstanteria(string $descripcion)
    {
        $this->descripcion = $descripcion;
        // $verificar = "SELECT * FROM estanteria WHERE id = '$this->id'";
        $verificar = "SELECT * FROM estanteria WHERE descripcion = '$this->descripcion'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO estanteria(descripcion) VALUES(?)";
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

    public function modificarEstanteria(string $descripcion, int $id)
    {
        $this->descripcion = $descripcion;
        $this->id  = $id;

        $sql = "UPDATE estanteria SET descripcion = ? WHERE id = ?";
        $datos = array($this->descripcion, $this->id );
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarEstanteria(int $id)
    {
        $sql = "SELECT * FROM estanteria WHERE id= $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionEstanteria(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE estanteria SET estado = ? WHERE id  = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }


    // public function accionUser(int $estado, int $id)
    // {
    //    $this->id = $id;
    //    $this->estado = $estado;
    //    $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
    //    $datos = array($this->estado, $this->id);
    //    $data = $this->save($sql, $datos);
    //    return $data;
    // }
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
