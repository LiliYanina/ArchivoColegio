let tblUsuarios, tblTipoDocumento, tblPersonas, tblEstanterias, tblArchivadores, tblExpedientes, tblDocumentos, tblDetalleExpedientes;
document.addEventListener('DOMContentLoaded', function () {
    //COMIENZO DE TABLA USUARIOS
    document.querySelector("#modalPass").addEventListener("click", function () {
        document.querySelector('#frmCambiarPass').reset();
        $('#cambiarClave').modal('show');
    });

    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },
            {
                'data': 'usuario'
            },
            {
                'data': 'nombre'
            },
            {
                'data': 'dni'
            },
            {
                'data': 'imagen'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
    });

    //COMIENZO DE TABLA TIPO DOCUMENTO
    tblTipoDocumento = $('#tblTipoDocumento').DataTable({
        ajax: {
            url: base_url + "Tipos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },

            {
                'data': 'tipoDocumento'
            },

            {
                'data': 'estado'
            },

            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',

        },
    });

    //COMIENZO DE TABLA TIPO DOCUMENTO
    tblPersonas = $('#tblPersonas').DataTable({
        ajax: {
            url: base_url + "Personas/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },

            {
                'data': 'tipoDocumento'
            },

            {
                'data': 'numero_doc'
            },

            {
                'data': 'codigo_estudiante'
            },

            {
                'data': 'apellido_pat'
            },

            {
                'data': 'apellido_mat'
            },

            {
                'data': 'nombres'
            },

            {
                'data': 'estado'
            },

            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',

        },
    });

    //COMIENZO DE TABLA ESTANTERIA
    tblEstanterias = $('#tblEstanterias').DataTable({
        ajax: {
            url: base_url + "Estanterias/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'estado'
            },

            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
    });

    //COMIENZO DE TABLA ESTANTERIA
    tblArchivadores = $('#tblArchivadores').DataTable({
        ajax: {
            url: base_url + "Archivadores/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },

            {
                'data': 'id_letra'
            },

            {
                'data': 'numero'
            },

            {
                'data': 'estado'
            },

            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',

        },
    });

    // tblUbicaciones = $('#tblUbicaciones').DataTable({
    //     ajax: {
    //         url: base_url + "Ubicaciones/listar",
    //         dataSrc: ''
    //     },
    //     columns: [
    //         {
    //             'data': 'id'
    //         },

    //         {
    //             'data': 'id_letra'
    //         },

    //         {
    //             'data': 'descripcion'
    //         },

    //         {
    //             'data': 'estado'
    //         },

    //         {
    //             'data': 'acciones'
    //         }
    //     ],
    //     responsive: true,
    //     language: {
    //         url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',

    //     },
    // });

    tblDocumentos = $('#tblDocumentos').DataTable({
        ajax: {
            url: base_url + "Documentos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'estado'
            },

            {
                'data': 'acciones'
            }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
    });

    // // Inicialización de Select2
    // $('.numero_doc').select2({
    //     placeholder: 'Buscar dni',
    //     minimumInputLength: 2,
    //     ajax: {
    //         url: base_url + 'Expedientes/buscarDni',
    //         dataType: 'json',
    //         delay: 250,
    //         data: function (params) {
    //             return {
    //                 lb: params.term
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: data
    //             };
    //         },
    //         cache: true
    //     }
    // });


    tblExpedientes = $('#tblExpedientes').DataTable({
        ajax: {
            url: base_url + "Expedientes/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'id' },
            { 'data': 'id_persona' }, // Aquí debe coincidir con el alias en el SQL
            { 'data': 'id_estanteria' },
            { 'data': 'id_archivador' },
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        }
    });


    tblDetalleExpedientes = $('#tblDetalleExpedientes').DataTable({
        ajax: {
            url: base_url + "DetalleExpedientes/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'id' },
            { 'data': 'id_expediente' }, // Mostrar el número de documento en lugar de id_persona
            { 'data': 'id_documento' }, // Mostrar la descripción en lugar de id_documento
            { 'data': 'archivo' },
            { 'data': 'fecha_ingreso' },
            { 'data': 'observacion' },
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        }
    });


})

/*COMIENZO DE USUARIOS*/
function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
    eliminacionImage();
}

function registrarUser(e) {
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const nombre = document.getElementById('nombre');
    const clave = document.getElementById('clave');
    const confirmar = document.getElementById('confirmar');
    // const caja = document.getElementById('caja');
    if (usuario.value == "" || nombre.value == "") {
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Usuario registrado con exito",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Usuario modificado con exito",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        }
    }
}

function btnEditarUser(id) {
    document.getElementById("title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Usuarios/editar/" + id;
    // const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("dni").value = res.dni;
            document.getElementById("claves").classList.add("d-none");
            document.getElementById("img-preview").src = base_url + 'Assets/imagenes/' + res.imagen;
            document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="eliminacionImage()">
            <i class="fas fa-times"></i></button>`;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("foto_actual").value = res.imagen;
            $("#nuevo_usuario").modal("show");
        }
    }
}

function btnEliminarUser(id) {
    Swal.fire({
        title: "Esta seguro de eliminar?",
        text: "El usuario no se eliminara de forma permanente, solo cambiara el estado a inactivo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            // document.getElementById("title").innerHTML = "Actualizar Usuario";
            // document.getElementById("btnAccion").innerHTML = "Modificar";
            const url = base_url + "Usuarios/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Usuario eliminado con exito.",
                            icon: "success"
                        });
                        tblUsuarios.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}

function btnReingresarUser(id) {
    Swal.fire({
        title: "Esta seguro de reingresar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            // document.getElementById("title").innerHTML = "Actualizar Usuario";
            // document.getElementById("btnAccion").innerHTML = "Modificar";
            const url = base_url + "Usuarios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Usuario reingresado con exito.",
                            icon: "success"
                        });
                        tblUsuarios.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}
/*FIN DE USUARIOS*/


/*COMIENZO DE TIPO DE DOCUMENTO*/
function frmTipoDocumento() {
    document.getElementById("title").innerHTML = "Nuevo Documento";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmTipoDocumento").reset();
    $("#nuevo_tipo_documento").modal("show");
    document.getElementById("id").value = "";
}

function registrarDocumento(e) {
    e.preventDefault();
    const tipoDocumento = document.getElementById("tipoDocumento");
    // const descripcion = document.getElementById("descripcion");
    if (tipoDocumento.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Tipos/registrar";
        const frm = document.getElementById("frmTipoDocumento");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Documento Registrado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nuevo_tipo_documento").modal("hide");
                    tblTipoDocumento.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Documento Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_tipo_documento").modal("hide");
                    tblTipoDocumento.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarTipoDocumento(id) {
    document.getElementById("title").innerHTML = "Actualizar Documento";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Tipos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("tipoDocumento").value = res.tipoDocumento;
            // document.getElementById("descripcion").value = res.descripcion;
            $("#nuevo_tipo_documento").modal("show");
        }
    }
}

function btnEliminarTipoDocumento(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "El documento no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Tipos/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Documento eliminado correctamente.',
                            'success'
                        )
                        tblTipoDocumento.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarTipoDocumento(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Tipos/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Documento reingresado correctamente!',
                            'success'
                        )
                        tblTipoDocumento.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


/*COMIENZO DE PERSONAS*/
function frmPersonas() {
    document.getElementById("title").innerHTML = "Nueva Persona";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmPersonas").reset();
    $("#nueva_persona").modal("show");
    document.getElementById("id").value = "";
}

function registrarPersona(e) {
    e.preventDefault();
    const tipoDocumento = document.getElementById("tipoDocumento");
    const numero_doc = document.getElementById("numero_doc");
    const codigo_estudiante = document.getElementById("codigo_estudiante");
    const apellido_pat = document.getElementById("apellido_pat");
    const apellido_mat = document.getElementById("apellido_mat");
    const nombres = document.getElementById("nombres");
    if (apellido_pat.value == "" || apellido_mat.value == "" || nombres.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        const url = base_url + "Personas/registrar";
        const frm = document.getElementById("frmPersonas");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Persona Registrada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Persona Actualizada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarPersona(id) {
    document.getElementById("title").innerHTML = "Actualizar Persona";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Personas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("tipoDocumento").value = res.id_tipodoc;
            document.getElementById("numero_doc").value = res.numero_doc;
            document.getElementById("codigo_estudiante").value = res.codigo_estudiante;
            document.getElementById("apellido_pat").value = res.apellido_pat;
            document.getElementById("apellido_mat").value = res.apellido_mat;
            document.getElementById("nombres").value = res.nombres;
            $("#nueva_persona").modal("show");
        }
    }
}

function btnEliminarPersona(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "La persona no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Personas/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Persona eliminada correctamente.',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarPersona(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Personas/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Persona reingresado correctamente!',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

/*COMIENZO DE ESTANTERIA*/
function frmEstanteria() {
    document.getElementById("title").innerHTML = "Nueva Estanteria";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmEstanteria").reset();
    $("#nuevo_estanteria").modal("show");
    document.getElementById("id").value = "";
}

function registrarEstanteria(e) {
    e.preventDefault();
    const descripcion = document.getElementById("descripcion");
    // const descripcion = document.getElementById("descripcion");
    if (descripcion.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Estanterias/registrar";
        const frm = document.getElementById("frmEstanteria");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Estanteria Registrado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nuevo_estanteria").modal("hide");
                    tblEstanterias.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Estanteria Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_estanteria").modal("hide");
                    tblEstanterias.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarEstanteria(id) {
    document.getElementById("title").innerHTML = "Actualizar Estanteria";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Estanterias/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("descripcion").value = res.descripcion;
            $("#nuevo_estanteria").modal("show");
        }
    }
}

function btnEliminarEstanteria(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "La estanteria no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Estanterias/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Estanteria eliminada correctamente.',
                            'success'
                        )
                        tblEstanterias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarEstanteria(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Estanterias/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Estanteria reingresada correctamente!',
                            'success'
                        )
                        tblEstanterias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


/*COMIENZO DE ARCHIVADORES*/
function frmArchivador() {
    document.getElementById("title").innerHTML = "Nuevo Archivador";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmArchivador").reset();
    $("#nuevo_archivador").modal("show");
    document.getElementById("id").value = "";
}

function registrarArchivador(e) {
    e.preventDefault();
    const id_letra = document.getElementById("id_letra");
    const numero = document.getElementById("numero");
    // const descripcion = document.getElementById("descripcion");
    if (numero.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Archivadores/registrar";
        const frm = document.getElementById("frmArchivador");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Archivador Registrado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nuevo_archivador").modal("hide");
                    tblArchivadores.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Archivador Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_archivador").modal("hide");
                    tblArchivadores.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarArchivador(id) {
    document.getElementById("title").innerHTML = "Actualizar Archivador";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Archivadores/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("id_letra").value = res.id_letra;
            document.getElementById("numero").value = res.numero;
            $("#nuevo_archivador").modal("show");
        }
    }
}

function btnEliminarArchivador(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "La estanteria no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Archivadores/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Archivador eliminado correctamente.',
                            'success'
                        )
                        tblArchivadores.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarArchivador(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Archivadores/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Archivador reingresado correctamente!',
                            'success'
                        )
                        tblArchivadores.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


function previsualizacionImage(e) {
    // console.log(e.target.files);
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none"); //icono para seleccionar imagen
    document.getElementById("icon-cerrar").innerHTML = `           
    <button class="btn btn-danger" onclick="eliminacionImage()"><i class="fas fa-times"></i></button>
    ${url['name']}`; //eliminacion de imagen
}

function eliminacionImage() {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById("imagen").value = '';
    document.getElementById("foto_delete").value = '';
}

/*COMIENZO DE UBICACIONES*/
function frmUbicacion() {
    document.getElementById("title").innerHTML = "Nueva Ubicacion";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUbicacion").reset();
    $("#nueva_ubicacion").modal("show");
    document.getElementById("id").value = "";
}

function registrarubicacion(e) {
    e.preventDefault();
    const id_archi = document.getElementById("id_archi");
    const id_estan = document.getElementById("id_estan");

    if (id_archi.value == "" || id_estan.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        const url = base_url + "Ubicaciones/registrar";
        const frm = document.getElementById("frmUbicacion");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Ubicacion Registrada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nueva_ubicacion").modal("hide");
                    tblUbicaciones.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Ubicacion Actualizada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nueva_ubicacion").modal("hide");
                    tblUbicaciones.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarUbicaciones(id) {
    document.getElementById("title").innerHTML = "Actualizar Ubicacion";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Ubicaciones/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("id_archi").value = res.id_archivador;
            document.getElementById("id_estan").value = res.id_estanteria;
            $("#nueva_ubicacion").modal("show");
        }
    }
}

function btnEliminarUbicaciones(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "La ubicacion no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ubicaciones/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Ubicacion eliminada correctamente.',
                            'success'
                        )
                        tblUbicaciones.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarUbicaciones(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ubicaciones/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Ubicacion reingresada correctamente!',
                            'success'
                        )
                        tblUbicaciones.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


function btnRolesUser(id) {
    const http = new XMLHttpRequest();
    const url = base_url + "Usuarios/permisos/" + id;
    http.open("GET", url);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("frmPermisos").innerHTML = this.responseText;
            $("#permisos").modal("show");
        }
    }
}


function registrarPermisos(e) {
    e.preventDefault();
    const http = new XMLHttpRequest();
    const frm = document.getElementById("frmPermisos");
    const url = base_url + "Usuarios/registrarPermisos";
    http.open("POST", url);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            $("#permisos").modal("hide");
            if (res == 'ok') {
                // alertas('Permisos Asignado', 'success');
                Swal.fire({
                    position: 'top-star',
                    icon: 'success',
                    title: 'Permisos Asignado Correctamente!',
                    showConfirmButton: false,
                    timer: 3000
                })
            } else {
                // alertas('Error al asignar los permisos', 'error');
                Swal.fire({
                    position: 'top-star',
                    icon: 'error',
                    title: 'Error al asignar los permisos!',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }
    }
}

/*COMIENZO DE DOCUMENTOS*/
function frmDocumento() {
    document.getElementById("title").innerHTML = "Nuevo Documento";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmDocumento").reset();
    $("#nuevo_documento").modal("show");
    document.getElementById("id").value = "";
}

function registrarDocu(e) {
    e.preventDefault();
    const descripcion = document.getElementById("descripcion");

    if (descripcion.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Documentos/registrar";
        const frm = document.getElementById("frmDocumento");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Descripcion Registrada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $("#nuevo_documento").modal("hide");
                    tblDocumentos.ajax.reload(); //refrescando modals
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Descripcion Actualizada Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_documento").modal("hide");
                    tblDocumentos.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarDocu(id) {
    document.getElementById("title").innerHTML = "Actualizar Documento";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Documentos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("descripcion").value = res.descripcion;
            $("#nuevo_documento").modal("show");
        }
    }
}

function btnEliminarDocu(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "El documento no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Documentos/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Documento eliminado correctamente.',
                            'success'
                        )
                        tblDocumentos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarDocu(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Documentos/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Documento reingresado correctamente!',
                            'success'
                        )
                        tblDocumentos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

/*COMIENZO DE EXPEDIENTES*/
function frmExpedientes() {
    document.getElementById("title").innerHTML = "Nuevo Expediente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmExpedientes").reset();
    $("#nuevo_expediente").modal("show");
    document.getElementById("id").value = "";
    $('.persona').val(null).trigger('change');
}

function registrarExpedi(e) {
    e.preventDefault();
    const persona = document.getElementById("persona");
    const nombre_estanterias = document.getElementById("nombre_estanterias");
    const nombre_archivadores = document.getElementById("nombre_archivadores");

    if (persona.value == "" || nombre_estanterias.value == "" || nombre_archivadores.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        const url = base_url + "Expedientes/registrar";
        const frm = document.getElementById("frmExpedientes");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Expediente registrado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('.persona').val(null).trigger('change');
                    $("#nuevo_expediente").modal("hide");
                    tblExpedientes.ajax.reload();

                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Expediente Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_expediente").modal("hide");
                    tblExpedientes.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnEditarExpe(id) {
    document.getElementById("title").innerHTML = "Actualizar Expediente";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Expedientes/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("persona").value = res.id_persona;
            document.getElementById("nombre_estanterias").value = res.id_estanteria;
            document.getElementById("nombre_archivadores").value = res.id_archivador;
            $("#nuevo_expediente").modal("show");
            $('.persona').val(null).trigger('change');
        }
    }
}

function btnEliminarExpe(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "El expediente no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Expedientes/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Expediente eliminado correctamente.',
                            'success'
                        )
                        tblExpedientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnReingresarExpe(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Expedientes/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Expediente reingresado correctamente!',
                            'success'
                        )
                        tblExpedientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


/*COMIENZO DE DETALLE DE EXPEDIENTES*/
function frmDetalleExpedientes() {
    document.getElementById("title").innerHTML = "Nuevo Detalle Expediente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmDetalleExpedientes").reset();
    $("#nuevo_detalle_expediente").modal("show");
    document.getElementById("id").value = "";
    $('.expediente').val(null).trigger('change');
}

function registrarDetalleExpedi(e) {
    e.preventDefault();
    const expediente = document.getElementById("expediente");
    const tipoDocumento = document.getElementById("tipoDocumento");
    const archivo = document.getElementById("archivo");
    const fecha_ingreso = document.getElementById("fecha_ingreso");
    const observacion = document.getElementById("observacion");

    if (expediente.value == "" || tipoDocumento.value == "" || fecha_ingreso.value == "") {
        Swal.fire({
            position: 'top-star',
            icon: 'error',
            title: 'Todos los Campos son obligatorios!',
            showConfirmButton: false,
            timer: 3000
        });
    } else {
        const url = base_url + "DetalleExpedientes/registrar";
        const frm = document.getElementById("frmDetalleExpedientes");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Expediente registrado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset(); //receteando formulario
                    $('.expediente').val(null).trigger('change');
                    $("#nuevo_detalle_expediente").modal("hide");
                    tblDetalleExpedientes.ajax.reload(); //refrescando modals

                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'success',
                        title: 'Expediente Actualizado Correctamente!',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_detalle_expediente").modal("hide");
                    tblDetalleExpedientes.ajax.reload(); //refrescando modals
                } else {
                    Swal.fire({
                        position: 'top-star',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

function btnDetalleEditarExpe(id) {
    document.getElementById("title").innerHTML = "Actualizar Expediente";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "DetalleExpedientes/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("expediente").value = res.id_expediente;
            document.getElementById("tipoDocumento").value = res.id_documento;
            // document.getElementById("archivo").value = res.archivo;
            document.getElementById("fecha_ingreso").value = res.fecha_ingreso;
            document.getElementById("observacion").value = res.observacion;
            $("#nuevo_detalle_expediente").modal("show");
            $('.expediente').val(null).trigger('change');
        }
    }
}

function btnDetalleEliminarExpe(id) {
    Swal.fire({
        title: 'Esta Seguro de Eliminar?',
        text: "El detalle expediente no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "DetalleExpedientes/eliminar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Detalle Expediente eliminado correctamente.',
                            'success'
                        )
                        tblDetalleExpedientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function btnDetalleReingresarExpe(id) {
    Swal.fire({
        title: 'Esta Seguro de Reingresar?',
        //text: "El usuario no se eliminara de forma permanente, solo cambiara al estado inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "DetalleExpedientes/reingresar/" + id;
            //const frm = document.getElementById("frmUsuario");
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Detalle de Expediente reingresado correctamente!',
                            'success'
                        )
                        tblDetalleExpedientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}


function btnDetalleExpediente(id) {
    $.ajax({
        url: 'Expedientes/detalleExpediente/' + id,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.length > 0) {
                mostrarDetallesExpediente(response);
            } else {
                alert('No se encontraron detalles para este expediente.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener detalles del expediente:', xhr.responseText);
        }
    });
}

function mostrarDetallesExpediente(detalles) {
    var modalContent = '<table id="tblDetalleExpedientes" class="table table-bordered table-striped display nowrap">';
    modalContent += '<thead class="thead-dark">';
    modalContent += '<th>ID Expediente</th>';
    modalContent += '<th>ID Documento</th>';
    modalContent += '<th>Archivo Pdf</th>';
    modalContent += '<th>Fecha de Ingreso</th>';
    modalContent += '<th>Observación</th>';
    modalContent += '</tr>';
    modalContent += '</thead>';
    modalContent += '<tbody>';

    detalles.forEach(function (detalle) {
        modalContent += '<td>' + detalle.id_expediente + '</td>';
        modalContent += '<td>' + detalle.id_documento + '</td>';
        modalContent += '<td><a href="' + base_url + 'Assets/documentos/Archivo/' + detalle.archivo + '" target="_blank"><img class="eye-icon" src="' + base_url + 'Assets/eye.png" width="25" alt="Ver Documento"></a></td>';
        modalContent += '<td>' + detalle.fecha_ingreso + '</td>';
        modalContent += '<td>' + detalle.observacion + '</td>';
        modalContent += '</tr>';
    });



    modalContent += '</tbody>';
    modalContent += '</table>';

    $('#nuevo_detalle_expediente .modal-body').html(modalContent);

    // Inicializa la tabla dentro del modal
    $('#tblDetalleExpedientes').DataTable({
        responsive: true,
        paging: true,  // Desactiva la paginación para que no haya scroll
        searching: true,  // Desactiva la búsqueda
        info: true,  // Desactiva la información de la tabla
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        }
    });

    $('#nuevo_detalle_expediente').modal('show');


}
