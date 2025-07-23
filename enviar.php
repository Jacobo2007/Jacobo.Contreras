<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefono = htmlspecialchars($_POST["phone"]);
    $mensaje = htmlspecialchars($_POST["message"]);

    // Destinatario
    $para = "jacobo.granados26@gmail.com";
    $asunto = "Nuevo mensaje del formulario de contacto";

    // Contenido del mensaje
    $contenido = "Has recibido un nuevo mensaje desde tu sitio web:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Cabecera
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Enviar correo
    if (mail($para, $asunto, $contenido, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje. Intenta más tarde.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
