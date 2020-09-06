<?php

//Iniciar sesion y conexion DB
include_once './includes/Conexion.php';




if(isset($_POST))
{
    //borrar error antiguo
      if(isset($_SESSION['error_login']))
                {
                unset($_SESSION['error_login']);
            }
    
    //recoger datos del formulario
    $email = trim($_POST['email']);
    $password=$_POST['password'];
    
    
//Consulta email y contraseña coincide 
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$login = mysqli_query($conexion, $sql);


if($login && mysqli_num_rows($login)==1) //que me devuelva los numeros de filas y si es uno lo que me devuelve entra a la condicion
{
    $usuario = mysqli_fetch_assoc($login); //nos saca array asociativo correspondiente
  
   //comprobar contraseña / cifrar
   $verify =password_verify($password, $usuario['password']);
    
        if($verify)
        {
           //Utilizar sesion para guardar los datos del usuario logueado 
            $_SESSION['usuario']=$usuario;
            
          
            
        }  else {
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] ="Login Incorrecto...";
        }
   
}  
else 
    {
//mensaje error
     $_SESSION['error_login'] ="Login Incorrecto!";
}
    

}


//redirigir Index.php
header('location: index.php');