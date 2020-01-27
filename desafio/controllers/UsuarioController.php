<?php
require_once "models/usuario.php";
class usuarioController
{
    public function index()
    {
        echo "controlador usuarios";
    }
    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
    public function save()
    {
      if (isset($_POST)) {
        $usuario = new Usuario();
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellido']);
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $save = $usuario->save();
       
        if ($save) {
            $_SESSION['register'] = "complete";
        }else {
            $_SESSION['register'] = "Failed";
        }
      }else {
        $_SESSION['register'] = "failed";
       
      }
      header("Location:".base_url."usuario/registro");
    }


 
}
