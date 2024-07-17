<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema I.E "Juan Mejia Bacca"</title>
    <link rel="shortcut icon" href="<?php echo base_url; ?>Assets/Login/assets/images/fav.jpg">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Login/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Login/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Login/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Login/assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Login/assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/Login/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/Login/assets/css/personalizados.css" />
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/favicon.ico" rel="stylesheet" />
</head>

<body class="form-login-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">

                <form id="frmLogin" autocomplete="off">
                    <div class="row">
                        <div class="col-md-7 detail-box">

                            <div class="detailsh">
                                <img class="help" src="<?php echo base_url; ?>Assets/Login/assets/images/help.png" alt="">
                                <h3>Sistema I.E "Juan Mejia Bacca"</h3>
                            </div>
                        </div>


                        <div class="col-md-5 loginform">
                            <h4>Inicie Sesion</h4>

                            <div class="login-det">
                                <div class="form-row">
                                    <label for="usuario">Usuario</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Ingrese Usuario" aria-label="Username" aria-describedby="basic-addon1" id="usuario" name="usuario" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="clave">Contraseña</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-dark text-white" id="basic-addon1">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" aria-label="Password" aria-describedby="basic-addon1" id="clave" name="clave" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="togglePassword">
                                                <i class="fas fa-eye text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>



                                <p class="forget"><a href="">Forget Password?</a></p>

                                <button class="btn btn-sm btn-danger" type="submit" onclick="frmLogin(event); ">Acceder</button>

                                <div class="social-link">
                                    <ul class="socil-icon">
                                        <li>
                                            <a href="https://www.facebook.com/cepjuanmejiabaca.edu" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/cepjuanmejiabaca/?hl=es" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url; ?>Assets/Login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/Login/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/Login/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/Login/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="<?php echo base_url; ?>Assets/Login/assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/Login/assets/js/script.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/password.js"></script>

</body>

</html>