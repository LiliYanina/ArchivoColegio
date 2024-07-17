<?php
class UsuariosModel extends Query
{

    private $usuario, $nombre, $clave, $dni, $id, $estado, $img;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
        $data = $this->select($sql);
        return $data;
    }

    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarUsuario(string $usuario, string $nombre, string $clave, string $dni, string $img)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->dni = $dni;
        $this->img = $img;

        $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO usuarios(usuario, nombre, clave, dni, imagen) VALUES(?,?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->dni, $this->img);
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

    public function editarUser(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificarUsuario(string $usuario, string $nombre, string $dni, string $img, int $id)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->img = $img;
        $this->id = $id;

        $sql = "UPDATE usuarios SET usuario = ?, nombre = ?,  dni = ?, imagen = ? WHERE id = ?";
        $datos = array($this->usuario, $this->nombre, $this->dni, $this->img, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function accionUser(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }


    public function getPermisos()
    {
        $sql = "SELECT * FROM roles";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getDetallePermisos($id)
    {

        $sql = "SELECT * FROM detalle_roles WHERE id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function deletePermisos($id)
    {

        $sql = "DELETE FROM detalle_roles WHERE id_usuario = ?";
        $datos = array($id);
        $data = $this->save($sql, $datos);
        return $data;
    }

    public function actualizarPermisos($usuario, $permiso)
    {

        $sql = "INSERT INTO detalle_roles(id_usuario,id_rol) VALUES (?,?)";
        $datos = array($usuario, $permiso);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
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

    public function actualizarPass($clave, $id)
    {
        $sql = "UPDATE usuarios SET clave = ? WHERE id = ?";
        $datos = array($clave, $id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

}
