<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y limpiar datos del formulario
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = strip_tags(trim($_POST["mensaje"]));

    // Validar campos
    if (empty($nombre) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor complete el formulario correctamente.";
        exit;
    }

    // Destinatario
    $destinatario = "destinatario@ejemplo.com"; // Cambia esta dirección por la tuya

    // Asunto del correo
    $asunto = "Nuevo mensaje de $nombre";

    // Cuerpo del correo
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo: $email\n\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Encabezados
    $headers = "From: $nombre <$email>";

    // Enviar correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "¡Correo enviado exitosamente!";
    } else {
        echo "Error al enviar el correo. Inténtalo más tarde.";
    }
header("Location: https://www.google.com");
    exit();
} else {
    // Si no es método POST, denegar acceso
    header("HTTP/1.1 403 Forbidden");
    echo "Acceso no permitido.";
}
?>
