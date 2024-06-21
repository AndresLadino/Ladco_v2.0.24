<?php
require_once '../../src/php/connect.php';
session_start();

function procesarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion, $accion, $id = null)
{
    // Escapa los valores para prevenir inyección de SQL
    $nombre = $conexion->proteger_text($nombre);
    $apellido = $conexion->proteger_text($apellido);
    $telefono = $conexion->proteger_text($telefono);
    $correo = $conexion->proteger_text($correo);
    $empresa = $conexion->proteger_text($empresa);

    if ($accion == "insertar") {
        insertarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion);
    } elseif ($accion == "actualizar" && $id !== null) {
        actualizarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion, $id);
    } else {
        // Manejo de error o redirección en caso de acción desconocida o falta de ID
        echo "Acción desconocida o falta de ID";
    }
}

function insertarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion)
{
    // Crea la consulta SQL para insertar los datos
    $sql = "INSERT INTO tblclientes (nombre, apellido, telefono, correo, empresa, creado_en, actualizado_en)
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())";

    ejecutarConsulta($sql, "sssss", $nombre, $apellido, $telefono, $correo, $empresa);
}

function actualizarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion, $id)
{
    // Crea la consulta SQL para actualizar los datos
    $sql = "UPDATE tblclientes 
            SET nombre=?, apellido=?, telefono=?, correo=?, empresa=?, actualizado_en=NOW()
            WHERE id=?";

    ejecutarConsulta($sql, "sssssi", $nombre, $apellido, $telefono, $correo, $empresa, $id);
}
// Verifica si se ha enviado un formulario para eliminar un cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete-client-id"])) {
    // Obtiene el ID del cliente a eliminar
    $clientId = $_POST["delete-client-id"];

    // Llama a la función para eliminar el cliente
    eliminarCliente($clientId, $conexion);
}

// Función para eliminar el cliente por su ID
function eliminarCliente($clientId, $conexion)
{
    // Prepara la consulta SQL para eliminar el cliente
    $sql = "DELETE FROM tblclientes WHERE id = ?";

    // Ejecuta la consulta
    ejecutarConsulta($sql, "i", $clientId);

    // Establece un mensaje de éxito
    $_SESSION['success'] = '¡El cliente se ha eliminado correctamente!';
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
                $_SESSION['success'] = '¡El cliente se ha eliminado correctamente!';
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

    // Redirige al usuario a otra página después de insertar o actualizar los datos
    header("Location: index.php");
    exit();  // Asegura que el script se detenga después de redirigir
}
function obtenerTipoConsulta($sql)
{
    $firstWord = strtoupper(trim(explode(" ", $sql)[0]));
    return $firstWord;
}
function obtenerDatosPorId($id, $conexion)
{
    $id = $conexion->proteger_text($id);

    $sql = "SELECT * FROM tblclientes WHERE id = ?";

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

// Verifica si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["teléfono"];
    $correo = $_POST["correo"];
    $empresa = $_POST["empresa"];
    $id = isset($_POST["id"]) ? $_POST["id"] : null;

    // Obtén la acción del formulario
    $accion = isset($_POST["accion"]) ? $_POST["accion"] : "";

    // Llama a la función para procesar los datos
    procesarDatos($nombre, $apellido, $telefono, $correo, $empresa, $conexion, $accion, $id);
}