<?php

class Personas extends Controller
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
        $perm = $this->model->verificarPermisos($id_user, "Archivadores");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
        //    $this->views->getView($this, "index");
        $data['documentos'] = $this->model->getTipoDocumento();
        $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getPersonas();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPersona(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarPersona(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>  
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarPersona(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function registrar()
    {
        // print_r($_POST);
        $tipoDocumento = $_POST['tipoDocumento'];
        $numero_doc = $_POST['numero_doc'];
        $codigo_estudiante = $_POST['codigo_estudiante'];
        $apellido_pat = $_POST['apellido_pat'];
        $apellido_mat = $_POST['apellido_mat'];
        $nombres = $_POST['nombres'];

        $id = $_POST['id'];
        if ( empty($apellido_pat) || empty($apellido_mat) || empty($nombres)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarPersona($tipoDocumento, $numero_doc, $codigo_estudiante, $apellido_pat, $apellido_mat, $nombres);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "La persona ya existe ";
                } else {
                    $msg = "Error al registrar la persona";
                }
            } else {
                $data = $this->model->modificarPersona($tipoDocumento, $numero_doc, $codigo_estudiante, $apellido_pat, $apellido_mat, $nombres, $id);
                if ($data == "modificado") {
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
        $data = $this->model->editarPersona($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionPersona(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar la persona";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionPersona(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar la persona";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
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
        $data = $this->model->getPersonas();

        if ($formato === 'pdf') {
            require('Libraries/fpdf/fpdf.php');
            $pdf = new FPDF('L', 'mm', 'A4');
            $pdf->AddPage();
            $pdf->Image('Assets/img/colegio.png', 10, 10, 30);
            $pdf->Ln(15);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, 'REPORTE DE PERSONAS', 0, 1, 'C');
            $pdf->Image('Assets/img/colegio.png', 258, 10, 30);
            $pdf->Ln(20);
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(10, 10, 'Id', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Tipo Doc', 1, 0, 'C');
            $pdf->Cell(45, 10, utf8_decode('N° de Doc'), 1, 0, 'C');
            $pdf->Cell(40, 10, 'Codigo Estudiante', 1, 0, 'C');
            $pdf->Cell(45, 10, 'Apellido Paterno', 1, 0, 'C');
            $pdf->Cell(45, 10, 'Apellido Materno', 1, 0, 'C');
            $pdf->Cell(55, 10, 'Nombres', 1, 1, 'C');
            $pdf->SetFont('helvetica', '', 10);

            // $tipoDocumento, $numero_doc, $codigo_estudiante, $apellido_pat, $apellido_mat, $nombres, $id
            foreach ($data as $row) {
                $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
                $pdf->Cell(40, 10, utf8_decode($row['tipoDocumento']), 1, 0, 'C');
                $pdf->Cell(45, 10, utf8_decode($row['numero_doc']), 1, 0, 'C');
                $pdf->Cell(40, 10, utf8_decode($row['codigo_estudiante']), 1, 0, 'C');
                $pdf->Cell(45, 10, utf8_decode($row['apellido_pat']), 1, 0, 'C');
                $pdf->Cell(45, 10, utf8_decode($row['apellido_mat']), 1, 0, 'C');
                $pdf->Cell(55, 10, utf8_decode($row['nombres']), 1, 1, 'C');
                // $pdf->Cell(100, 10, utf8_decode($row['correo']), 1, 1, 'C');
            }
            $pdf->Output();
        } elseif ($formato === 'excel') {
            require 'vendor/autoload.php';
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $worksheet = $spreadsheet->getActiveSheet();
            // Asigna los valores a las celdas
            $worksheet->setCellValue('A1', 'Id');
            $worksheet->setCellValue('B1', 'T. Doc');
            $worksheet->setCellValue('C1', utf8_decode('N° de Doc'));
            $worksheet->setCellValue('D1', 'Codigo Estudiante');
            $worksheet->setCellValue('E1', 'Apellido Paterno');
            $worksheet->setCellValue('F1', 'Apellido Materno');
            $worksheet->setCellValue('G1', 'Nombres');

            // Obtén el estilo de negrita
            $style = array(
                'font' => array(
                    'bold' => true,
                )
            );

            // Aplica el estilo de negrita a las celdas A1:D1
            $worksheet->getStyle('A1:G1')->applyFromArray($style);
            $row = 2;
            foreach ($data as $row_data) {
                $worksheet->setCellValue('A' . $row, $row_data['id']);
                $worksheet->setCellValue('B' . $row, $row_data['tipoDocumento']);
                $worksheet->setCellValue('C' . $row, $row_data['numero_doc']);
                $worksheet->setCellValue('D' . $row, $row_data['codigo_estudiante']);
                $worksheet->setCellValue('E' . $row, $row_data['apellido_pat']);
                $worksheet->setCellValue('F' . $row, $row_data['apellido_mat']);
                $worksheet->setCellValue('G' . $row, $row_data['nombres']);
                $row++;
            }

            foreach (range('A', 'G') as $column) {
                $worksheet->getColumnDimension($column)->setAutoSize(true);
            }
            $excelFileName = 'reporte_personas.xlsx';
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
