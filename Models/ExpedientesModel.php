<?php

class ExpedientesModel extends Query
{

    private $id_persona, $id, $estado, $arch, $estanteria, $archivador, $pdf1, $id_estanteria, $id_archivador, $archivo;

    public function __construct()
    {
        parent::__construct();
    }

    public function getEstanteria()
    {
        $sql = "SELECT * FROM estanteria";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function getArchivador()
    {
        $sql = "SELECT * FROM archivador";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getDocumentos()
    {
        $sql = "SELECT * FROM documento";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getPersona()
    {
        $sql = "SELECT * FROM persona";
        $data = $this->selectAll($sql);
        return $data;
    }

   

    public function getExpediente()
{
    $sql = "SELECT d.*,
                   p.id AS persona_id,
                   p.apellido_pat AS persona_apellido_pat,
                   p.apellido_mat AS persona_apellido_mat,
                   p.nombres AS persona_nombres,
                   e.id AS estanteria_id,
                   e.descripcion AS estanteria_descripcion,
                   a.id AS archivador_id,
                   a.id_letra AS archivador_letra,
                   a.numero AS archivador_numero
            FROM expediente d
             INNER JOIN persona p ON d.id_persona = p.id
            INNER JOIN estanteria e ON d.id_estanteria = e.id
            INNER JOIN archivador a ON d.id_archivador = a.id";
    
    $data = $this->selectAll($sql);
    return $data;
}
   

    public function getDetalleExpediente($id)
    {
        $sql = "SELECT de.*, d.descripcion 
            FROM detalle_expediente de
            INNER JOIN documento d ON de.id_documento = d.id
            WHERE de.id_expediente = ?";
        $data = $this->selectAll($sql, [$id]);
        return $data;
    }

    public function registrarExpedente($id_persona, $id_estanteria, $id_archivador, $id)
    {
        $sql = "INSERT INTO expediente(id_estanteria, id_archivador) VALUES(?,?,?)";
        $datos = array($id_estanteria, $id_archivador);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function registrarExped($id_persona, $id_estanteria, $id_archivador)
    {
        $this->id_persona = $id_persona;
        $this->id_estanteria = $id_estanteria; 
        $this->id_archivador = $id_archivador; 
    
        $verificar = "SELECT * FROM expediente WHERE id = '$this->id'";
        $verificar = "SELECT * FROM expediente WHERE id_persona = '$this->id_persona'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO expediente(id_persona, id_estanteria, id_archivador) VALUES(?,?,?)";
            $datos = array($this->id_persona, $this->id_estanteria, $this->id_archivador);
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

    public function editarExpediente(int $id)
    {
        $sql = "SELECT * FROM expediente WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    

    public function modificarExped($id_persona, $id_estanteria, $id_archivador, int $id)
    {
        $this->id_persona = $id_persona;
        $this->id_estanteria  = $id_estanteria;
        $this->id_archivador  = $id_archivador;
        $this->id = $id;

        $sql = "UPDATE expediente SET  id_persona = ?, id_estanteria = ?, id_archivador = ? WHERE id = ?";
        $datos = array($this->id_persona, $this->id_estanteria, $this->id_archivador, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }                   
        return $res;
    }

    public function accionExpediente(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE expediente SET estado = ? WHERE id = ?";
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


    // public function buscarDni($valor)
    // {
    //     $sql = "SELECT id, numero_doc AS text FROM persona WHERE numero_doc LIKE '%" . $valor . "%' AND estado = 1 LIMIT 10";
    //     $data = $this->selectAll($sql);
    //     return $data;
    // }
}
