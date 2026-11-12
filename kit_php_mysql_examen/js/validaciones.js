// Validación sencilla del lado del navegador.
// La validación de JavaScript mejora la experiencia, pero PHP también debe validar los datos.
document.addEventListener("DOMContentLoaded", function () {
    const formularios = document.querySelectorAll("form[data-validar]");

    formularios.forEach(function (formulario) {
        formulario.addEventListener("submit", function (evento) {
            if (!formulario.checkValidity()) {
                evento.preventDefault();
                formulario.reportValidity();
                alert("Revisa los campos obligatorios.");
            }
        });
    });
});
