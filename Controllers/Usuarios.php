<?php

class Usuarios extends Controller
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
        $perm = $this->model->verificarPermisos($id_user, "Usuarios");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
        $this->views->getView($this, "index");
    }

    public function listar()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        $data = $this->model->getUsuarios();

        if (!empty($data) && isset($data[0]['imagen'])) {
            // Agrega la línea que establece $_SESSION['imagen']
            $_SESSION['imagen'] = $data[0]['imagen'];
        }

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . base_url . "Assets/imagenes/" . $data[$i]['imagen'] . '" width="40">';
            if ($data[$i]['estado'] == 1) {
                if ($data[$i]['id'] != 1) {
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarUser(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>';

                    // Verificar si el usuario es un administrador (id 1) antes de mostrar los botones
                    if ($_SESSION['id_usuario'] == 1) {
                        $data[$i]['acciones'] .= '
                        <button class="btn btn-danger" type="button" onclick="btnEliminarUser(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                        <button class="btn btn-dark" onclick="btnRolesUser(' . $data[$i]['id'] . ')"><i class="fa fa-key"></i></button>';
                    }

                    $data[$i]['acciones'] .= '</div>';
                } else {
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                    $data[$i]['acciones'] = '<div class"text-center">
                <span class="badge-primary p-1 rounded">Administrador</span>
                </div>';
                }
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div><button class="btn btn-success" type="button" onclick="btnReingresarUser(' . $data[$i]['id'] . ');"><i class="fas fa-undo"></i></button>
            <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function validar()
    {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "Los campos estan vacios";
        } else {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            // $data = $this->model->getUsuario($usuario, $clave);
            $data = $this->model->getUsuario($usuario, $hash);
            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            } else {
                $msg = "Usuario o Contraseña incorrecta!";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        // print_r($_POST);
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $dni = $_POST['dni'];
        $id = $_POST['id'];

        //imagen
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmp_name = $img['tmp_name'];
        $destino = "Assets/imagenes/" . $name;
        if (empty($name)) {
            $name = "default.png";
        }

        $hash = hash("SHA256", $clave);
        if (empty($usuario) || empty($nombre)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($id == "") {
                if ($clave != $confirmar) {
                    $msg = "Las contraseñas no coinciden";
                } else {
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $dni, $name, $id);
                    if ($data == "ok") {
                        $msg = "si";
                        move_uploaded_file($tmp_name, $destino);
                    } else if ($data == "existe") {
                        $msg = "El usuario ya existe";
                    } else {
                        $msg = "Error al registrar el usuario";
                    }
                }
            } else {
                if ($_POST['foto_actual'] != $_POST['foto_delete']) {
                    $imgDelete = $this->model->editarUser($id);
                    if ($imgDelete['imagen'] != 'default.png' || $imgDelete['imagen'] != "") {
                        if (file_exists($destino . $imgDelete['imagen'])) {
                            unlink($destino . $imgDelete['imagen']);
                        }
                    }
                }
                $data = $this->model->modificarUsuario($usuario, $nombre, $dni, $name, $id);
                if ($data == "modificado") {
                    move_uploaded_file($tmp_name, $destino);
                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar el usuario";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id)
    {
        $data = $this->model->editarUser($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionUser(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionUser(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: " . base_url);
    }

    
    public function permisos($id)
    {
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "roles");
        if (!$perm && $id_user != 1) {
            echo '<div class="card">
                    <div class="card-body text-center">
                        <span class="badge badge-danger">No tienes permisos</span>
                    </div>
                </div>';
            exit;
        }
        $data = $this->model->getPermisos();
        $asignados = $this->model->getDetallePermisos($id);
        $datos = array();
        foreach ($asignados as $asignado) {
            $datos[$asignado['id_rol']] = true;
        }
        echo '<div class="row">
        <input type="hidden" name="id_usuario" value="' . $id . '">';
        foreach ($data as $row) {
            echo '<div class="d-inline mx-3 text-center">
                    <hr>
                    <label for="" class="font-weight-bold text-capitalize">' . $row['nombre_rol'] . '</label>
                        <div class="center">
                            <input type="checkbox" name="permisos[]" value="' . $row['id'] . '" ';
            if (isset($datos[$row['id']])) {
                echo "checked";
            }
            echo '>
                        
                    </div>
                </div>';
        }
        echo '</div>
        <button class="btn btn-primary mt-3 btn-block" type="button" onclick="registrarPermisos(event);">Actualizar</button>';
        die();
    }

    public function registrarPermisos()
    {
        $id_user = $_POST['id_usuario'];
        $permisos = $_POST['permisos'];
        $this->model->deletePermisos($id_user);
        if ($permisos != "") {
            foreach ($permisos as $permiso) {
                $this->model->actualizarPermisos($id_user, $permiso);
            }
        }
        echo json_encode("ok");
        die();
    }

    public function generarReporte($formato)
    {
        $data = $this->model->getUsuarios();

        if ($formato === 'pdf') {
            require('Libraries/fpdf/fpdf.php');
            $pdf = new FPDF('L', 'mm', 'A4');
            $pdf->AddPage();
            $pdf->Image('Assets/img/colegio.png', 10, 10, 30);
            $pdf->Ln(15);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'REPORTE DE USUARIOS', 0, 1, 'C');
            $pdf->Image('Assets/img/colegio.png', 245, 10, 30);
            $pdf->Ln(20);
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(15, 10, 'Id', 1, 0, 'C');
            $pdf->Cell(60, 10, 'Usuario', 1, 0, 'C');
            $pdf->Cell(100, 10, 'Nombre Completo', 1, 0, 'C');
            $pdf->Cell(100, 10, 'Dni', 1, 1, 'C');
            $pdf->SetFont('helvetica', '', 12);
            foreach ($data as $row) {
                $pdf->Cell(15, 10, $row['id'], 1, 0, 'C');
                $pdf->Cell(60, 10, utf8_decode($row['usuario']), 1, 0, 'C');
                $pdf->Cell(100, 10, utf8_decode($row['nombre']), 1, 0, 'C');
                $pdf->Cell(100, 10, utf8_decode($row['dni']), 1, 1, 'C');
                // $pdf->Cell(100, 10, utf8_decode($row['correo']), 1, 1, 'C');
            }
            $pdf->Output();
        } elseif ($formato === 'excel') {
            require 'vendor/autoload.php';
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $worksheet = $spreadsheet->getActiveSheet();
            // Asigna los valores a las celdas
            $worksheet->setCellValue('A1', 'Id');
            $worksheet->setCellValue('B1', 'Usuario');
            $worksheet->setCellValue('C1', 'Nombre Completo');
            $worksheet->setCellValue('D1', 'Dni');

            // Obtén el estilo de negrita
            $style = array(
                'font' => array(
                    'bold' => true,
                )
            );

            // Aplica el estilo de negrita a las celdas A1:D1
            $worksheet->getStyle('A1:D1')->applyFromArray($style);
            $row = 2;
            foreach ($data as $row_data) {
                $worksheet->setCellValue('A' . $row, $row_data['id']);
                $worksheet->setCellValue('B' . $row, $row_data['usuario']);
                $worksheet->setCellValue('C' . $row, $row_data['nombre']);
                $worksheet->setCellValue('D' . $row, $row_data['dni']);
                $row++;
            }

            foreach (range('A', 'D') as $column) {
                $worksheet->getColumnDimension($column)->setAutoSize(true);
            }
            $excelFileName = 'reporte_usuarios.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
            header('Cache-Control: max-age=0');
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            ob_end_clean();
            $writer->save('php://output');
            exit();
        } else {
            echo "Formato no admitido";
        }
        echo json_encode(JSON_UNESCAPED_UNICODE);
        die();
    }

}
