<?php include "Views/Templates/header.php"; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestion de Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p><b>Usuarios</b></p>
                            <b><span class="text-white">Total: <?php echo $data['usuarios']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="<?php echo base_url ?>Usuarios" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p><b>Personas</b></p>
                            <b><span class="text-white">Total: <?php echo $data['persona']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="<?php echo base_url ?>Personas" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p><b>Tipo Documento Identidad</b></p>
                            <b><span class="text-white">Total: <?php echo $data['tipo_documento_identidad']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <a href="<?php echo base_url ?>Tipos" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <p><b>Archivadores</b></p>
                            <b><span class="text-white">Total: <?php echo $data['archivador']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-archive"></i>
                        </div>
                        <a href="<?php echo base_url ?>Archivadores" class="small-box-footer"> Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p><b>Estanterias</b></p>
                            <b><span class="text-white">Total: <?php echo $data['estanteria']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="<?php echo base_url ?>Estanterias" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <p><b>Documentos</b></p>
                            <b><span class="text-white">Total: <?php echo $data['documento']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="far fa-file-alt nav-icon"></i>
                        </div>
                        <a href="<?php echo base_url ?>Documentos" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p><b>Expedientes</b></p>
                            <b><span class="text-white">Total: <?php echo $data['expediente']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card nav-icon"></i>
                        </div>
                        <a href="<?php echo base_url ?>Expedientes" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <p><b>Detalles de Expedientes</b></p>
                            <b><span class="text-white">Total: <?php echo $data['detalle_expediente']['total']; ?></span></b>
                        </div>
                        <div class="icon">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <a href="<?php echo base_url ?>DetalleExpedientes" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="tortaChart"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="barrasChart"></canvas>
                </div>
            </div>
    </section>

</div>

<?php include "Views/Templates/footer.php"; ?>

<script>
    // Datos para el gráfico de torta
    var dataTorta = {
        labels: [
            // 'Archivos (' + < ?php echo $data['archivos']['total']; ?> + ')',
            'Usuarios (' + <?php echo $data['usuarios']['total']; ?> + ')',
            'Personas (' + <?php echo $data['persona']['total']; ?> + ')',
            'Tipo Documento Identidad (' + <?php echo $data['tipo_documento_identidad']['total']; ?> + ')',
            'Archivadores (' + <?php echo $data['archivador']['total']; ?> + ')',
            'Estanterias (' + <?php echo $data['estanteria']['total']; ?> + ')',
            'Documentos (' + <?php echo $data['documento']['total']; ?> + ')',
            'Expedientes (' + <?php echo $data['expediente']['total']; ?> + ')',
            'Detalles de Expedientes (' + <?php echo $data['detalle_expediente']['total']; ?> + ')',
        ],
        datasets: [{
            data: [
                // < ?php echo $data['archivos']['total']; ?>,
                <?php echo $data['usuarios']['total']; ?>,
                <?php echo $data['persona']['total']; ?>,
                <?php echo $data['tipo_documento_identidad']['total']; ?>,
                <?php echo $data['archivador']['total']; ?>,
                <?php echo $data['estanteria']['total']; ?>,
                <?php echo $data['documento']['total']; ?>,
                <?php echo $data['expediente']['total']; ?>,
                <?php echo $data['detalle_expediente']['total']; ?>,
            ],

            backgroundColor: [

                'rgba(255, 192, 203, 0.6)',
                'rgba(144, 238, 144, 0.6)',
                'rgba(255, 255, 102, 0.6)',
                'rgba(173, 216, 230, 0.6)',
                'rgba(218, 112, 214, 0.6)',
                'rgba(255, 165, 0, 0.6)',
                'rgba(127, 255, 212, 0.6)',
                'rgba(135, 206, 235, 0.6)',
                'rgba(255, 127, 80, 0.6)',

            ]
        }]
    };

    // Opciones para el gráfico de torta
    var optionsTorta = {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'right', // Cambiar la posición de las leyendas
            }
        }
    };

    // Datos para el gráfico de barras
    var dataBarras = {
        labels: [
            'Usuarios (' + <?php echo $data['usuarios']['total']; ?> + ')',
            'Personas (' + <?php echo $data['persona']['total']; ?> + ')',
            'Tipo Documento Identidad (' + <?php echo $data['tipo_documento_identidad']['total']; ?> + ')',
            'Archivadores (' + <?php echo $data['archivador']['total']; ?> + ')',
            'Estanterias (' + <?php echo $data['estanteria']['total']; ?> + ')',
            'Documentos (' + <?php echo $data['documento']['total']; ?> + ')',
            'Expedientes (' + <?php echo $data['expediente']['total']; ?> + ')',
            'Detalles de Expedientes (' + <?php echo $data['detalle_expediente']['total']; ?> + ')',
        ],
        datasets: [{
            label: 'Totales',
            data: [
                <?php echo $data['usuarios']['total']; ?>,
                <?php echo $data['persona']['total']; ?>,
                <?php echo $data['tipo_documento_identidad']['total']; ?>,
                <?php echo $data['archivador']['total']; ?>,
                <?php echo $data['estanteria']['total']; ?>,
                <?php echo $data['documento']['total']; ?>,
                <?php echo $data['expediente']['total']; ?>,
                <?php echo $data['detalle_expediente']['total']; ?>,
            ],
            backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
    };

    // Opciones para el gráfico de barras
    var optionsBarras = {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top', // Cambiar la posición de las leyendas
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Obtén el contexto de los gráficos
    var ctxTorta = document.getElementById('tortaChart').getContext('2d');
    var ctxBarras = document.getElementById('barrasChart').getContext('2d');

    // Crea los gráficos
    var tortaChart = new Chart(ctxTorta, {
        type: 'doughnut',
        data: dataTorta,
        options: optionsTorta
    });

    var barrasChart = new Chart(ctxBarras, {
        type: 'bar',
        data: dataBarras,
        options: optionsBarras
    });

</script>