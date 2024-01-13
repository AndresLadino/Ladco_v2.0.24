<?php
require '../../vendor/autoload.php';
$resend = Resend::client('re_cb6QmFFr_6ZBsUNizcnd4k38XUz4Gpzwn');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST["nombreCliente"];
    $correoCliente = $_POST["correoCliente"];
    $telefono = $_POST["telCliente"];
    $mensaje = $_POST["msgCliente"];

    // Verificar si se adjuntaron archivos
    if (isset($_FILES['archivos']) && is_array($_FILES['archivos']['name'])) {
        $attachments = [];

        // Iterar sobre cada archivo adjunto
        for ($i = 0; $i < count($_FILES['archivos']['name']); $i++) {
            // Agregar declaraciones de depuración
            echo "Nombre del archivo: " . $_FILES['archivos']['name'][$i] . "<br>";
            echo "Tamaño del archivo: " . $_FILES['archivos']['size'][$i] . " bytes<br>";
            // Verificar el código de error

            if ($_FILES['archivos']['error'][$i] == UPLOAD_ERR_OK) {
                // Obtener el contenido del archivo
                $invoiceBuffer = file_get_contents($_FILES['archivos']['tmp_name'][$i]);


                // Configurar cada archivo como adjunto
                $attachments[] = [
                    'filename' => $_FILES['archivos']['name'][$i],
                    'content' => base64_encode($invoiceBuffer),
                    'encoding' => 'base64',
                    'type' => 'application/pdf',
                ];
            } else {
                // Imprimir el código de error
                echo "Error al adjuntar el archivo " . $_FILES['archivos']['name'][$i] . ": " . $_FILES['archivos']['error'][$i] . "<br>";
            }
        }

        // Configurar el envío de correo con múltiples archivos adjuntos
        $resend->emails->send([
            'from' => 'Ladco Steel S.A.S <no-reply@ladcosteel.com.co>',
            'to' => ['theuhmc@gmail.com'],
            'subject' => 'Nos han contactado desde la página, ¡Revisame! 😀',
            'text' => 'Nombre: ' . $nombre . "\nCorreo electrónico: " . $correoCliente . "\nTeléfono: " . $telefono . "\nMensaje: " . $mensaje,
            'attachments' => $attachments,
            'headers' => [
                'X-Entity-Ref-ID' => '123456789',
            ],
            'tags' => [
                [
                    'name' => 'category',
                    'value' => 'confirm_email',
                ],
            ],
        ]);

        header("Location: ../contacto.html?resultado=exito");
        exit();
    } else {
        echo "Error al adjuntar archivos.";
    }
}
