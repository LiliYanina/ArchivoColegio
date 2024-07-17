<?php

class DetalleExpedientesModel extends Query
{

    private $id_expediente, $expediente, $id_documento, $id, $estado, $fecha_ingreso, $estanteria, $archivador, $pdf1, $id_estanteria, $id_archivador, $archivo, $observacion;

    public function __construct()
    {
        parent::__construct();
    }
    public function getExpediente()
    {
        $sql = "SELECT * FROM expediente WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getTipoDocumento()
    {
        $sql = "SELECT * FROM documento WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
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

    public function getDetalleExpediente()
    {
        $sql = "SELECT 
                de.id, 
                e.id AS expediente_id, 
                de.archivo, 
                de.fecha_ingreso, 
                de.observacion, 
                doc.descripcion AS documento_descripcion, 
                de.estado
            FROM 
                detalle_expediente de
            INNER JOIN 
                expediente e ON de.id_expediente = e.id
            INNER JOIN 
                documento doc ON de.id_documento = doc.id";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function registrarDetalleExpedi($id_documento, $fecha_ingreso, $observacion, $id)
    {
        $sql = "INSERT INTO detalle_expediente (id_documento, fecha_ingreso, observacion) VALUES (?, ?, ?)";
        $datos = array($id_documento, $fecha_ingreso, $observacion);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            return "ok";
        } else {
            return "error";
        }
    }


    public function registrarDetalleExpediente($id_expediente, $id_documento, $pdf1, $fecha_ingreso, $observacion)
    {
        $this->id_expediente = $id_expediente;
        $this->id_documento = $id_documento;
        $this->pdf1 = $pdf1;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->observacion = $observacion;

        $verificar = "SELECT * FROM detalle_expediente 
        WHERE id_expediente = '$this->id_expediente' 
        AND id_documento = '$this->id_documento'";
        $existe = $this->select($verificar);

        // $verificar = "SELECT * FROM detalle_expediente WHERE id = '$this->id'";
        // $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO detalle_expediente(id_expediente, id_documento, archivo, fecha_ingreso, observacion) VALUES(?,?,?,?,?)";
            $datos = array($this->id_expediente, $this->id_documento, $this->pdf1, $this->fecha_ingreso, $this->observacion);
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

    public function editarDetalleExpediente(int $id)
    {
        $sql = "SELECT * FROM detalle_expediente WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificarDetalleExpediente($id_expediente, $id_documento, $pdf1, $fecha_ingreso, $observacion, int $id)
    {
        $this->id_expediente = $id_expediente;
        $this->id_documento = $id_documento;
        $this->pdf1 = $pdf1;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->observacion = $observacion;
        $this->id = $id;

        $sql = "UPDATE detalle_expediente SET  id_expediente = ?, id_documento = ?, archivo = ?, fecha_ingreso = ?, observacion = ? WHERE id = ?";
        $datos = array($this->id_expediente, $this->id_documento, $this->pdf1, $this->fecha_ingreso, $this->observacion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function accionDetalleExpediente(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE detalle_expediente SET estado = ? WHERE id = ?";
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


    public function buscarDni($valor)
    {
        $sql = "SELECT id, expediente AS text FROM expediente WHERE expediente LIKE '%" . $valor . "%' AND estado = 1 LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
}
