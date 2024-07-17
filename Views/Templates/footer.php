<div id="cambiarClave" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="my-modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" id="frmCambiarPass" onsubmit="modificarClave(event)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="clave_actual">Contraseña Actual</label>
                        <input id="clave_actual" class="form-control" type="password" name="clave_actual" id="clave_actual" placeholder="Contraseña actual" required>
                    </div>
                    <div class="form-group">
                        <label for="clave_nueva">Nueva Contraseña</label>
                        <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Contraseña nueva" id="clave_nueva" required>
                    </div>
                    <div class="form-group">
                        <label for="clave_confirmar">Confirmar Contraseña</label>
                        <input id="clave_confirmar" class="form-control" type="password" name="clave_confirmar" id="clave_confirmar" placeholder="Confirmar contraseña" required>
                    </div>
                    <!-- <button class="btn btn-primary" type="button" onclick="registrarLibro(event);" id="btnAccion">Registrar</button> -->
                    <button class="btn btn-primary" type="submit">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<footer class="main-footer">
    <a href="https://www.facebook.com/cepjuanmejiabaca.edu" target="_blank"><strong>&copy; <?php echo date('Y'); ?> I.E "Juan Mejia Bacca"</strong></a>
    <a href="https://www.instagram.com/cepjuanmejiabaca/?hl=es" target="_blank"><strong>&copy; <?php echo date('Y'); ?> I.E "Juan Mejia Bacca"</strong></a>
</footer>
</div>
<script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>Assets/js/main.js"></script>
<script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
<script src="<?php echo base_url; ?>Assets/js/pace.min.js"></script>
<!-- <script src="< ?php echo base_url; ?>Assets/js/Chart.min.js" crossorigin="anonymous"></script> -->

<!-- <script src="< ?php echo base_url; ?>Assets/demo/datatables-demo.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="<?php echo base_url; ?>Assets/js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>


<script>
    const base_url = "<?php echo base_url; ?>";
</script>

<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
<script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
<script src="<?php echo base_url; ?>Assets/Plantilla/dist/js/adminlte.js"></script>
<script type="text/javascript" src="<?php echo base_url; ?>Assets/js/datatables.min.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url; ?>Assets/Plantilla/dist/js/pages/dashboard.js"></script>
<script>
    $(document).on('click', '.btn-logaut', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            width: 450,
            // title: 'Confirmación',
            text: "¿Está seguro que desea salir del sistema?",
            // icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#ec217c',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar'
        }).then((resultado) => {
            if (resultado.value) {
                let timerInterval;
                Swal.fire({
                    // title: 'Saliendo del Sistema',
                    html: 'Saliendo en <b></b> milisegundos.',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                    // Redirige al usuario después de mostrar la alerta de "Auto close alert!"
                    document.location.href = href;
                });
            }
        })
    });


    $(document).ready(function() {
        // Obtiene la URL actual
        var currentUrl = window.location.href;

        // Itera sobre los elementos de menú
        $('.nav-link').each(function() {
            var menuUrl = $(this).attr('href');

            // Compara la URL actual con la URL del menú
            if (currentUrl.indexOf(menuUrl) !== -1) {
                // Agrega la clase "active" al elemento de menú correspondiente
                $(this).addClass('active');

                // Expande los elementos de menú padres si hay menús desplegables
                $(this).parents('.has-treeview').addClass('menu-open');

                // Cambia el fondo del menú activo a un color específico (por ejemplo, naranja)
                $(this).css('background-color', '#FFA500'); // Naranja
            }
        });

        // Agrega un evento clic a todos los enlaces con clase "nav-link" y atributo "data-toggle" igual a "treeview"
        $('.nav-link[data-toggle="treeview"]').click(function(event) {
            // Evita que se siga el enlace
            event.preventDefault();

            // Obtiene el elemento padre con clase "has-treeview" y su submenú
            var parentMenu = $(this).parent();
            var subMenu = parentMenu.find('.nav-treeview');

            // Cierra otros menús desplegados excepto si el menú actual ya está abierto
            $('.has-treeview').not(parentMenu).removeClass('menu-open');
            $('.nav-treeview').not(subMenu).removeClass('menu-open');

            // Cambia el estado del menú actual
            parentMenu.toggleClass('menu-open');
            subMenu.toggleClass('menu-open');
        });
    });
</script>

</body>

</html>