<?php

class Query extends Conexion
{

    private $pdo, $con, $sql, $datos, $strquery, $arrvalues;

    public function __construct()
    {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conex();
    }

    public function select(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // public function selectAll(string $sql)
    // {
    //     $this->sql = $sql;
    //     $resul = $this->con->prepare($this->sql);
    //     $resul->execute();
    //     $data = $resul->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    public function selectAll(string $sql, array $params = [])
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute($params);
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function save(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        if ($data) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function update(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $update = $this->con->prepare($this->sql);
        $res = $update->execute($this->datos);
        return $res;
    }
}
