// Validaciones de Formularios - Sistema de Soporte Técnico UPQ

document.addEventListener("DOMContentLoaded", function () {

    // 1. Validación Formulario Registrar Usuario (Módulo 1)
    const formUsuario = document.querySelector("form[action=''][method='POST'] input[name='nombre']")?.closest("form");
    if (formUsuario && formUsuario.querySelector("button[name='guardar_usuario']")) {
        formUsuario.addEventListener("submit", function (e) {
            const nombre = formUsuario.querySelector("input[name='nombre']").value.trim();
            const correo = formUsuario.querySelector("input[name='correo']").value.trim();

            if (nombre === "" || correo === "") {
                e.preventDefault();
                alert("⚠️ Por favor, complete todos los campos del usuario.");
                return false;
            }

            // Validar formato simple de correo
            const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexCorreo.test(correo)) {
                e.preventDefault();
                alert("⚠️ Ingrese un correo electrónico válido.");
                return false;
            }
        });
    }

    // 2. Validación Formulario Registrar Equipo (Módulo 1)
    const formEquipo = document.querySelector("form[action=''][method='POST'] input[name='nombre_equipo']")?.closest("form");
    if (formEquipo && formEquipo.querySelector("button[name='guardar_equipo']")) {
        formEquipo.addEventListener("submit", function (e) {
            const nombreEq = formEquipo.querySelector("input[name='nombre_equipo']").value.trim();
            const descEq = formEquipo.querySelector("textarea[name='descripcion_equipo']").value.trim();

            if (nombreEq === "" || descEq === "") {
                e.preventDefault();
                alert("⚠️ Debe ingresar el nombre y la descripción del equipo.");
                return false;
            }
        });
    }

    // 3. Validación Formulario Nueva Solicitud (Módulo 2)
    const formSolicitud = document.querySelector("form button[name='registrar_solicitud']")?.closest("form");
    if (formSolicitud) {
        formSolicitud.addEventListener("submit", function (e) {
            const usuario = formSolicitud.querySelector("select[name='id_usuario']").value;
            const equipo = formSolicitud.querySelector("select[name='id_equipo']").value;
            const problema = formSolicitud.querySelector("textarea[name='descripcion_problema']").value.trim();

            if (usuario === "" || equipo === "") {
                e.preventDefault();
                alert("⚠️ Debe seleccionar un usuario y un equipo de las listas desplegables.");
                return false;
            }

            if (problema === "") {
                e.preventDefault();
                alert("⚠️ Por favor, describa el problema antes de registrar la solicitud.");
                return false;
            }
        });
    }

    // 4. Validación Formulario Seguimiento (Módulo 3)
    const formSeguimiento = document.querySelector("form button[name='guardar_seguimiento']")?.closest("form");
    if (formSeguimiento) {
        formSeguimiento.addEventListener("submit", function (e) {
            const solicitud = formSeguimiento.querySelector("select[name='id_solicitud']").value;
            const estado = formSeguimiento.querySelector("select[name='estado']").value;
            const obs = formSeguimiento.querySelector("textarea[name='observaciones']").value.trim();

            if (solicitud === "") {
                e.preventDefault();
                alert("⚠️ Seleccione una solicitud válida para actualizar.");
                return false;
            }

            if (estado === "") {
                e.preventDefault();
                alert("⚠️ Seleccione el estado de la solicitud.");
                return false;
            }

            if (obs === "") {
                e.preventDefault();
                alert("⚠️ Ingrese las observaciones de atención.");
                return false;
            }
        });
    }

});