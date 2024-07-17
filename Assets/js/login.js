// function frmLogin(e) {
//     e.preventDefault();
//     const usuario = document.getElementById('usuario');
//     const clave = document.getElementById('clave');
//     if (usuario.value == "") {
//         clave.classList.remove('is-invalid');
//         usuario.classList.add('is-invalid');
//         usuario.focus();
//     } else if (clave.value == "") {
//         usuario.classList.remove('is-invalid');
//         clave.classList.add('is-invalid');
//         clave.focus();
//     } else {
//         const url = base_url + "Usuarios/validar";
//         const frm = document.getElementById("frmLogin");
//         const http = new XMLHttpRequest();
//         http.open("POST", url, true);
//         http.send(new FormData(frm));
//         http.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 // console.log(this.responseText);
//                 const res = JSON.parse(this.responseText);
//                 if (res == "ok") {
//                     window.location = base_url + "Usuarios";
//                 } else {
//                     document.getElementById("alerta").classList.remove("d-none");
//                     document.getElementById("alerta").innerHTML = res;
//                 }
//             }

//         }
//     }
// }

function frmLogin(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    // usuario.setCustomValidity("");
    // clave.setCustomValidity("");

    if (usuario.value == "") {
        clave.setCustomValidity("Por favor, ingresa tu usuario.");
        usuario.reportValidity();
        usuario.focus();
    } else if (clave.value == "") {
        usuario.setCustomValidity("Por favor, ingresa tu contraseña.");
        clave.reportValidity();
        clave.focus();
    } else {
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    // Mostrar SweetAlert de éxito
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'Acceso concedido'
                    });
                    // Redireccionar después de 3 segundos
                    setTimeout(() => {
                        window.location.href = base_url + "Usuarios";
                    }, 4000);
                } else {
                    // Mostrar SweetAlert de error
                    // Mostrar SweetAlert de error con tamaño pequeño
                    Swal.fire({
                        icon: 'error',
                        title: 'Credenciales incorrectas',
                        text: 'Usuario o contraseña incorrectos',
                    });

                    // Limpiar campos y eliminar mensajes de error
                    usuario.value = "";
                    clave.value = "";
                    usuario.classList.remove("is-invalid");
                    clave.classList.remove("is-invalid");
                }
            }
        };
    }
}
