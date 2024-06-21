<?php
require_once '../../src/php/connect.php';
session_start();

function procesarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $accion, $conexion, $id)
{
    // Escapa los valores para prevenir inyección de SQL
    $titulo = $conexion->proteger_text($titulo);
    $parrafoPrincipal = $conexion->proteger_text($parrafoPrincipal);
    $parrafoSecundario = $conexion->proteger_text($parrafoSecundario);

    if ($accion == "insertar") {
        insertarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $conexion);
    } elseif ($accion == "actualizar" && $id !== null) {
        actualizarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $conexion, $id);
    } elseif ($accion == "eliminar" && $id !== null) {
        eliminarPost($id, $conexion);
    } else {
        // Manejo de error o redirección en caso de acción desconocida o falta de ID
        echo "Acción desconocida o falta de ID";
    }
}


function insertarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $conexion)
{
    // Subir las imágenes y obtener las rutas
    $rutaImagenFondo = subirImagen($imagenFondo, 'imagen_fondo');
    $rutaImagenPrincipal = subirImagen($imagenPrincipal, 'imagen_1');
    $rutaImagenSecundaria = subirImagen($imagenSecundaria, 'imagen_2');

    // Verificar que todas las imágenes se subieron correctamente
    if ($rutaImagenFondo && $rutaImagenPrincipal && $rutaImagenSecundaria) {
        // Crea la consulta SQL para insertar los datos
        $sql = "INSERT INTO tblblog (titulo, parrafoPrincipal, parrafoSecundario, imagenFondo, imagenPrincipal, imagenSecundaria, creado_en, actualizado_en)
                VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";

        ejecutarConsulta($sql, "ssssss", $titulo, $parrafoPrincipal, $parrafoSecundario, $rutaImagenFondo, $rutaImagenPrincipal, $rutaImagenSecundaria);
    } else {
        // Manejar el caso en el que haya problemas con la subida de imágenes
        if ($_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            $error_message = 'Error al subir las imágenes: ';
        
            switch ($_FILES['imagen']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $error_message .= 'El archivo subido excede la directiva upload_max_filesize en php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $error_message .= 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $error_message .= 'El archivo subido solo se ha subido parcialmente.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $error_message .= 'No se ha subido ningún archivo.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $error_message .= 'Falta la carpeta temporal.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $error_message .= 'Error al escribir el archivo en el disco.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $error_message .= 'Una extensión de PHP detuvo la carga del archivo.';
                    break;
                default:
                    $error_message .= 'Error desconocido al subir el archivo.';
                    break;
            }
        
            echo $error_message;
        } 
    }
}

function actualizarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagen1, $imagen2, $conexion, $id)
{
    // Verificar si se proporcionaron nuevas imágenes
    $actualizarImagenFondo = !empty($imagenFondo['name']);
    $actualizarImagen1 = !empty($imagen1['name']);
    $actualizarImagen2 = !empty($imagen2['name']);

    // Subir las imágenes y obtener las rutas solo si se proporcionaron nuevas imágenes
    $rutaImagenFondo = $actualizarImagenFondo ? subirImagen($imagenFondo, 'imagen_fondo') : null;
    $rutaImagen1 = $actualizarImagen1 ? subirImagen($imagen1, 'imagen_1') : null;
    $rutaImagen2 = $actualizarImagen2 ? subirImagen($imagen2, 'imagen_2') : null;

    // Crea la consulta SQL para actualizar los datos
    $sql = "UPDATE tblblog 
            SET titulo=?, parrafoPrincipal=?, parrafoSecundario=?";

    // Agrega las columnas de imágenes solo si se proporcionaron nuevas imágenes
    if ($actualizarImagenFondo) {
        $sql .= ", imagenFondo=?";
    }
    if ($actualizarImagen1) {
        $sql .= ", imagenPrincipal=?";
    }
    if ($actualizarImagen2) {
        $sql .= ", imagenSecundaria=?";
    }

    $sql .= ", actualizado_en=NOW()
            WHERE id=?";

    // Crea un array con los tipos y parámetros para bind_param
    $tipos = "sssi";
    $params = array($titulo, $parrafoPrincipal, $parrafoSecundario, $id);

    // Agrega los parámetros de imágenes solo si se proporcionaron nuevas imágenes
    if ($actualizarImagenFondo) {
        $tipos .= "s";
        $params[] = $rutaImagenFondo;
    }
    if ($actualizarImagen1) {
        $tipos .= "s";
        $params[] = $rutaImagen1;
    }
    if ($actualizarImagen2) {
        $tipos .= "s";
        $params[] = $rutaImagen2;
    }

    // Ejecuta la consulta
    ejecutarConsulta($sql, $tipos, ...$params);
}

function eliminarPost($id, $conexion)
{
    // Obtener las rutas de las imágenes antes de eliminar el registro
    $datos = obtenerDatosPorId($id, $conexion);
    $imagenFondo = $datos['imagen_fondo'];
    $imagen1 = $datos['imagen_1'];
    $imagen2 = $datos['imagen_2'];

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM tblblog WHERE id = ?";
    ejecutarConsulta($sql, "i", $id);

    // Eliminar las imágenes asociadas al registro
    eliminarImagen($imagenFondo);
    eliminarImagen($imagen1);
    eliminarImagen($imagen2);

    // Establecer un mensaje de éxito
    $_SESSION['success'] = '¡La publicación se ha eliminado correctamente!';
}
function obtenerTipoConsulta($sql)
{
    $sql = strtoupper(trim($sql));
    
    if (strpos($sql, 'INSERT') === 0) {
        return 'INSERT';
    } elseif (strpos($sql, 'UPDATE') === 0) {
        return 'UPDATE';
    } elseif (strpos($sql, 'DELETE') === 0) {
        return 'DELETE';
    } else {
        return 'UNKNOWN';
    }
}
function ejecutarConsulta($sql, $tipos, ...$params)
{
    global $conexion;

    // Prepara la consulta
    $stmt = $conexion->getConexion()->prepare($sql);
    if (!$stmt) {
        die("Falló la preparación: (" . $conexion->getConexion()->errno . ")" . $conexion->getConexion()->error);
    }

    // Bindea los parámetros
    $stmt->bind_param($tipos, ...$params);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        $consultaType = obtenerTipoConsulta($sql);

        // Establece el mensaje de éxito según el tipo de consulta
        switch ($consultaType) {
            case 'INSERT':
                $_SESSION['success'] = '¡Los registros se han añadido correctamente!';
                break;
            case 'UPDATE':
                $_SESSION['success'] = '¡Los registros se han actualizado correctamente!';
                break;
            case 'DELETE':
                $_SESSION['success'] = '¡La publicación se ha eliminado correctamente!';
                break;
            default:
                $_SESSION['success'] = '¡Acción realizada correctamente!';
                break;
        }
    } else {
        echo "Error al procesar datos: " . $stmt->error;
    }

    // Cierra la sentencia
    $stmt->close();

    // Redirige al usuario a otra página después de insertar, actualizar o eliminar los datos
    header("Location: index.php");
    exit();  // Asegura que el script se detenga después de redirigir
}

function obtenerDatosPorId($id, $conexion)
{
    $id = $conexion->proteger_text($id);

    $sql = "SELECT * FROM tblblog WHERE id = ?";

    $stmt = $conexion->getConexion()->prepare($sql);
    if (!$stmt) {
        die("Falló la preparación: (" . $conexion->getConexion()->errno . ")" . $conexion->getConexion()->error);
    }

    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // Verifica si hay al menos una fila de resultados
        if ($result->num_rows > 0) {
            $datos = $result->fetch_assoc();
            $stmt->close();
            return $datos;
        } else {
            // Si no hay resultados, puedes manejarlo de alguna manera, por ejemplo, retornando un array vacío
            return array();
        }
    } else {
        echo "Error al obtener datos por ID: " . $stmt->error;
    }

    $stmt->close();

    return null;
}
function subirImagen($imagen, $tipo)
{
    // Directorio de destino para las imágenes
    $directorioDestino = '../../src/image/blog';

    // Verificar si se subió el archivo sin errores
    if ($imagen['error'] === UPLOAD_ERR_OK) {
        // Obtener información sobre el archivo
        $nombreArchivo = basename($imagen['name']);
        $rutaCompleta = $directorioDestino . '/' . $nombreArchivo;

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($imagen['tmp_name'], $rutaCompleta)) {
            // Aquí podrías realizar otras acciones, como actualizar la base de datos con la ruta de la imagen
            return $rutaCompleta;
        } else {
            // Manejar el caso en el que la subida del archivo no sea exitosa
            echo 'Error al subir la imagen.';
        }
    } else {
        // Manejar el caso en el que ocurra un error durante la subida del archivo
        echo 'Error en la subida del archivo: ' . $imagen['error'];
    }

    // En caso de error, retorna un valor por defecto o maneja según tu necesidad
    return null;
}
function eliminarImagen($rutaImagen)
{
    // Verificar si la ruta de la imagen no está vacía y si el archivo existe
    if (!empty($rutaImagen) && file_exists($rutaImagen)) {
        // Eliminar el archivo
        unlink($rutaImagen);
    }
}

// Verifica si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $titulo = $_POST["titulo"];
    $parrafoPrincipal = $_POST["parrafoPrincipal"];
    $parrafoSecundario = $_POST["parrafoSecundario"];
    $imagenFondo = $_FILES["imagenFondo"];
    $imagenPrincipal = $_FILES["imagenPrincipal"];
    $imagenSecundaria = $_FILES["imagenSecundaria"];
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $accion = isset($_POST["accion"]) ? $_POST["accion"] : "";

    // Agrega mensajes de depuración
    echo "Acción: $accion, ID: $id";
    
    // Llama a la función para procesar los datos
    procesarDatos($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $accion, $conexion, $id);
    echo "Después de procesarDatos";
    var_dump($titulo, $parrafoPrincipal, $parrafoSecundario, $imagenFondo, $imagenPrincipal, $imagenSecundaria, $accion, $conexion, $id);

}
?>
