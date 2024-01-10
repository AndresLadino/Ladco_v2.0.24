<?php require 'connect.php';
class accesos extends conexion{
    function __construct(){
        parent::__construct();

        return $this;
    }
    public function createPassword($pass){ 

        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public function login(){
        $data = (count(func_get_args()) > 0 ? func_get_args()[0]: func_get_args());
    
        $sql = "SELECT tbluser.nombre, tbluser.email, tbluser.password FROM tbluser WHERE email = ?;";
        $consulta = $this->prepare($sql);
    
        $consulta->bind_param('s', $correo);
    
        $correo = $data['correo'];
        $pass = $data['pass'];
        $this->execute($consulta);
    
        // Almacena los resultados en variables separadas
        $consulta->bind_result($nombre, $email, $password);
        $consulta->fetch();
    
        // Crea un array con los resultados
        if(password_verify($pass, $password)){
            $info = array(
                'estado' => true,
                'nombre' => $nombre,
                'email' => $email,
                'pass' => $password
            );
        }else{
            $info = array(
                'estado' => false,
                'mensaje' => 'El usuario o contraseña es incorrecto. Por favor, intente de nuevo.'
            );
        }
    
        return json_encode($info);
    }
}
$accesos = new accesos;
?>