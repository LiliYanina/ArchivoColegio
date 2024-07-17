<?php

class ArchivadoresModel extends Query
{

    private $id_letra, $numero, $id, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getArchivadores()
    {
        $sql = "SELECT * FROM archivador";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarArchivador(string $id_letra, string $numero)
    {
        $this->id_letra = $id_letra;
        $this->numero = $numero;

        $verificar = "SELECT * FROM archivador 
        WHERE id_letra = '$this->id_letra' 
        AND numero = '$this->numero'";

        // $verificar = "SELECT * FROM archivador WHERE id = '$this->id'";
        // $verificar = "SELECT * FROM archivador WHERE id_letra = '$this->id_letra'";
        
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO archivador(id_letra,numero) VALUES(?,?)";
            $datos = array($this->id_letra, $this->numero);
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

    public function modificarArchivador(string $id_letra, string $numero, int $id)
    {
        $this->id_letra = $id_letra;
        $this->numero = $numero;
        $this->id = $id;

        $sql = "UPDATE archivador SET id_letra = ?, numero = ? WHERE id = ?";
        $datos = array($this->id_letra, $this->numero,  $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarArchivador(int $id)
    {
        $sql = "SELECT * FROM archivador WHERE id= $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionArchivador(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE archivador SET estado = ? WHERE id = ?";
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
