<?php
include('accesos.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $params = array(
        'correo' => $email,
        'pass' => $password
    );

    $login = json_decode($accesos->login($params));

    if ($login->estado == true) {
        // Inicio de sesión correcto
        echo 'Se inició sesión correctamente.';
        //print_r($login);
        //Puedes redirigir al usuario a otra página si es necesario
        session_start();
        $_SESSION['usuario'] = $email; // Almacena el usuario en la sesión
        $_SESSION['nombre'] = $login->nombre; // Almacena el nombre en la sesión
        header('Location: ../../views/dashboard.php');
    } else {
        // Codificar el mensaje de error en la URL y redirigir de nuevo a la página de inicio de sesión
        $error_message = urlencode($login->mensaje);
        header('Location: ../../views/login.html?error=' . $error_message);
        exit();
    }
}
