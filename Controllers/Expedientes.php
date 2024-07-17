<?php

class Expedientes extends Controller
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
        // $perm = $this->model->verificarPermisos($id_user, "estanterias");
        // $perm = $this->model->verificarPermisos($id_user, "documentos");
        // $perm = $this->model->verificarPermisos($id_user, "personas");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
        //    $this->views->getView($this, "index");
        $data['estanterias'] = $this->model->getEstanteria();
        $data['archivadores'] = $this->model->getArchivador();
        $data['documentos'] = $this->model->getDocumentos();
        $data['personas'] = $this->model->getPersona();
        $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }

        $data = $this->model->getExpediente();
        if (!empty($data) && isset($data[0]['archivo'])) {
            $_SESSION['archivo'] = $data[0]['archivo'];
        }

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['id_estanteria'] = $data[$i]['estanteria_descripcion'];
            $data[$i]['id_archivador'] = $data[$i]['archivador_letra'] . $data[$i]['archivador_numero'];
            $data[$i]['id_persona'] = $data[$i]['persona_apellido_pat'] . '  ' . $data[$i]['persona_apellido_mat'] . '  ' . $data[$i]['persona_nombres'];
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-info" type="button" onclick="btnDetalleExpediente(' . $data[$i]['id'] . ');"><i class="fas fa-eye"></i></button>
            </div>';
            
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarExpe(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-left"></i></button>
            </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function obtenerDetalleExpediente(int $id_documento)
    {
        $data = $this->model->getDetalleExpediente($id_documento);
        return $data;
    }


    public function detalleExpediente(int $id_documento)
    {
        // Aquí puedes agregar la lógica para obtener los detalles del expediente
        $detalles = $this->model->getDetalleExpediente($id_documento);

        // Lógica adicional para procesar los detalles obtenidos
        $response = [];
        foreach ($detalles as $detalle) {
            // Aquí puedes procesar cada detalle según tus necesidades
            // Por ejemplo, agregarlos a un array de respuesta
            $response[] = [
                
                'id_expediente' => $detalle['id_expediente'],
                'id_documento' => $detalle['descripcion'],
                'archivo' => $detalle['archivo'],
                'fecha_ingreso' => $detalle['fecha_ingreso'],
                'observacion' => $detalle['observacion'],
                'estado' => $detalle['estado']
            ];
        }

        // Devolver la respuesta como JSON
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }




    public function registrarDetalleExpedi()
    {
        $id_documento = $_POST['id_documento'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $observacion = $_POST['observacion'];
        $id = $_POST['id'];

        if (empty($id_documento) || empty($fecha_ingreso) || empty($observacion)) {
            $msg = "Todos los campos son obligatorios!";
        } else {
            $data = $this->model->registrarDetalleExpedi($id_documento, $fecha_ingreso, $observacion, $id);
            if ($data == "ok") {
                $msg = "ok";
            } else {
                $msg = "Error al registrar el detalle del expediente";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function registrar()
    {
        $persona = $_POST['persona'];
        $nombre_estanterias = $_POST['nombre_estanterias'];
        $nombre_archivadores = $_POST['nombre_archivadores'];
        $id = $_POST['id'] ?? "";

        if (empty($persona) || empty($nombre_estanterias) || empty($nombre_archivadores)) {
            $msg = "Todos los campos son obligatorios!";
        } else {
            if ($id == "") {
                $data = $this->model->registrarExped($persona, $nombre_estanterias, $nombre_archivadores);
                if ($data == "ok") {
                    $msg = "si";
                    // move_uploaded_file($tmp_name1, $destino1);
                } else if ($data == "existe") {
                    $msg = "El expediente ya existe";
                } else {
                    $msg = "Error al registrar el expediente";
                }
            } else {
                $data = $this->model->modificarExped($persona, $nombre_estanterias, $nombre_archivadores, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                    // move_uploaded_file($tmp_name1, $destino1);
                } else {
                    $msg = "Error al modificar el expediente";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id)
    {
        $data = $this->model->editarExpediente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionExpediente(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el expediente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionExpediente(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el expediente";
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

    // public function buscarDni()
    // {
    //     if (isset($_GET['lb'])) {
    //         $valor = $_GET['lb'];
    //         $data = $this->model->buscarDni($valor);
    //         echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //         die();
    //     }
    // }
    public function generarReporte($formato)
    {
        // Obtener los datos del modelo
        $data = $this->model->getExpediente();
    
        if (empty($data)) {
            echo "No se encontraron datos.";
            die();
        }
    
        if ($formato === 'pdf') {
            require('Libraries/fpdf/fpdf.php');
            $pdf = new FPDF('L', 'mm', 'A4');
            $pdf->AddPage();
            $pdf->Image('Assets/img/colegio.png', 10, 10, 30);
            $pdf->Ln(15);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'REPORTE DE EXPEDIENTES', 0, 1, 'C');
            $pdf->Image('Assets/img/colegio.png', 245, 10, 30);
            $pdf->Ln(20);
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(10, 10, 'Id', 1, 0, 'C');
            $pdf->Cell(150, 10, utf8_decode('PERSONA'), 1, 0, 'C');
            $pdf->Cell(54, 10, 'ESTANTERIAS', 1, 0, 'C');
            $pdf->Cell(50, 10, 'ARCHIVADORES', 1, 1, 'C');
    
            $pdf->SetFont('helvetica', '', 12);
    
            foreach ($data as $row) {
                $persona = utf8_decode($row['persona_apellido_pat'] . ' ' . $row['persona_apellido_mat'] . ' ' . $row['persona_nombres']);
                $estanteria = utf8_decode($row['estanteria_descripcion']);
                $archivador = utf8_decode($row['archivador_letra'] . ' ' . $row['archivador_numero']);
    
                $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
                $pdf->Cell(150, 10, $persona, 1, 0, 'C');
                $pdf->Cell(54, 10, $estanteria, 1, 0, 'C');
                $pdf->Cell(50, 10, $archivador, 1, 1, 'C');
            }
    
            ob_clean(); // Limpia el buffer de salida
            $pdf->Output();
            exit();
        } elseif ($formato === 'excel') {
            require 'vendor/autoload.php';
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $worksheet = $spreadsheet->getActiveSheet();
    
            // Asigna los valores a las celdas
            $worksheet->setCellValue('A1', 'Id');
            $worksheet->setCellValue('B1', utf8_decode('Persona'));
            $worksheet->setCellValue('C1', 'Estanterias');
            $worksheet->setCellValue('D1', 'Archivadores');
    
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
                $persona = $row_data['persona_apellido_pat'] . ' ' . $row_data['persona_apellido_mat'] . ' ' . $row_data['persona_nombres'];
                $estanteria = $row_data['estanteria_descripcion'];
                $archivador = $row_data['archivador_letra'] . ' ' . $row_data['archivador_numero'];
    
                $worksheet->setCellValue('A' . $row, $row_data['id']);
                $worksheet->setCellValue('B' . $row, utf8_decode($persona));
                $worksheet->setCellValue('C' . $row, utf8_decode($estanteria));
                $worksheet->setCellValue('D' . $row, utf8_decode($archivador));
                $row++;
            }
    
            foreach (range('A', 'D') as $column) {
                $worksheet->getColumnDimension($column)->setAutoSize(true);
            }
    
            $excelFileName = 'reporte_expedientes.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
            header('Cache-Control: max-age=0');
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            ob_end_clean(); // Limpia el buffer de salida
            $writer->save('php://output');
            exit();
        } else {
            echo "Formato no admitido";
        }
        echo json_encode(JSON_UNESCAPED_UNICODE);
        die();
    }
    

}
