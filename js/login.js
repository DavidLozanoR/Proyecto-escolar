$(document).ready(function() {
    // Alternar entre formularios
    $('#toggle-form').click(function() {
        if ($('#login-form').is(':visible')) {
            $('#login-form').hide();
            $('#register-form').show();
            $('#form-title').text('Regístrate');
            $('#toggle-form').text('¿Ya tienes cuenta? Inicia sesión aquí');
        } else {
            $('#register-form').hide();
            $('#login-form').show();
            $('#form-title').text('¡Bienvenido de nuevo!');
            $('#toggle-form').text('¿No tienes cuenta? Regístrate aquí');
        }
    });

    // Enviar formulario de inicio de sesión
    $('#login-form').submit(function(event) {
        event.preventDefault();
        // Llamada a tu función asyncProcessForm
        asyncProcessForm(this, "/php/workspace/_controller/LoginAsync.php", //this->el formulario que desencadeno el evento
            "Procesando los datos", "Espere un momento...", "Resultado del procesamiento",regresaPrincipal);
    });

    // Enviar formulario de registro
    $('#register-form').submit(function(event) {
        event.preventDefault();
        // Llamada a tu función asyncProcessForm
        asyncProcessForm(this, "/php/workspace/_controller/RegisterAsync.php", //this->el formulario que desencadeno el evento
            "Procesando los datos", "Espere un momento...", "Resultado del procesamiento",regresaPrincipal);
    });
    function regresaPrincipal() {
        location.replace("");
    }
});