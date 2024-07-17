<?php

class PersonasModel extends Query
{

    private $id_tipodoc, $numero_doc, $codigo_estudiante, $apellido_pat, $apellido_mat, $nombres, $id, $estado;

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

    public function getPersonas()
    {
        $sql = "SELECT u.*, c.id as id_tipodoc, c.tipoDocumento FROM persona u INNER JOIN tipo_documento_identidad c WHERE u.id_tipodoc = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }   

    public function registrarPersona(int $id_tipodoc, string $numero_doc, string $codigo_estudiante, string $apellido_pat, string $apellido_mat, string $nombres)
    {
        $this->id_tipodoc = $id_tipodoc;
        $this->numero_doc = $numero_doc;
        $this->codigo_estudiante = $codigo_estudiante;
        $this->apellido_pat = $apellido_pat;
        $this->apellido_mat = $apellido_mat;
        $this->nombres = $nombres;

        // $verificar = "SELECT * FROM persona WHERE id = '$this->id'";
        // $verificar = "SELECT * FROM persona WHERE numero_doc = '$this->numero_doc'";
        
        $verificar = "SELECT * FROM persona 
        WHERE numero_doc = '$this->numero_doc' 
        AND nombres = '$this->nombres' 
        AND apellido_pat = '$this->apellido_pat' 
        AND apellido_mat = '$this->apellido_mat'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO persona(id_tipodoc, numero_doc, codigo_estudiante, apellido_pat, apellido_mat,nombres) VALUES(?,?,?,?,?,?)";
            $datos = array($this->id_tipodoc, $this->numero_doc, $this->codigo_estudiante, $this->apellido_pat, $this->apellido_mat, $this->nombres);
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

    public function editarPersona(int $id)
    {
        $sql = "SELECT * FROM persona WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificarPersona(int $id_tipodoc, string $numero_doc, string $codigo_estudiante, string $apellido_pat, string $apellido_mat, string $nombres, int $id)
    {
        $this->id_tipodoc = $id_tipodoc;
        $this->numero_doc = $numero_doc;
        $this->codigo_estudiante = $codigo_estudiante;
        $this->apellido_pat = $apellido_pat;
        $this->apellido_mat = $apellido_mat;
        $this->nombres = $nombres;
        $this->id = $id;
        // $this->usuario = $usuario;
        // $this->nombre = $nombre;
        // $this->id = $id;
        // $this->id_caja = $id_caja;
        // $sql = "UPDATE persona SET id_tipodoc = ?, numero_doc = ?, codigo_estudiante = ?, apellido_pat = ?, apellido_mat, nombres = ?  WHERE id = ?";
        $sql = "UPDATE persona SET id_tipodoc = ?, numero_doc = ?, codigo_estudiante = ?, apellido_pat = ?, apellido_mat = ?, nombres = ?  WHERE id = ?";

        $datos = array($this->id_tipodoc, $this->numero_doc, $this->codigo_estudiante, $this->apellido_pat, $this->apellido_mat, $this->nombres, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function accionPersona(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE persona SET estado = ? WHERE id = ?";
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
