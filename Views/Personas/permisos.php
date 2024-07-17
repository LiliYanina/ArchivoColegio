<?php include "Views/Templates/header.php"; ?>

<div class="row">
    <div class="col-md-5 mx-auto" style="margin-top: 40px;"> <!-- Aumentar el margen en la parte superior del contenido principal -->
        <div class="card">
            <div class="card-header text-center bg-primary">
                <h4 class="text-white">No tienes permisos</h4>
            </div>
            <div class="card-body">
                <a href="<?php echo base_url; ?>Dashboard/index" class="btn btn-danger btn-block">Regresar</a>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php"; ?>