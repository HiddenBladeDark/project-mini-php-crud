<?php
    //Validar los datos si fueron ingresados
        if(isset($_POST)){
            
            include_once './includes/Conexion.php';

            
            //iniciar sesion
            
            if(!isset($_SESSION))
            {
                session_start();
            }
            
//Funcion boton registro
//mysqli_escape nos da seguridad sin que metan comillas 
            
              $nombre = isset ($_POST['nombre']) ? mysqli_escape_string ($conexion, $_POST['nombre']) : FALSE;    
       
        $apellido = isset($_POST['apellido']) ? mysqli_escape_string($conexion, $_POST['apellido']) : FALSE;

        $email = isset($_POST['email']) ? mysqli_escape_string($conexion, trim($_POST['email'])) : FALSE;
        
        $password = isset($_POST['password']) ? mysqli_escape_string($conexion, $_POST['password']) : FALSE; 
            
            
            
            
            
            
    
            //array de errores
        
        $errores = array();
    
            //Validar datos antes de guardar en la DB
        //validar nombre
            if(!empty($nombre)&& !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre))
            {
                $nombre_validate = true;
                
            }  else {
                $nombre_validate = false;
            $errores['nombre'] = "El nombre no es valido";    
            }
            //validar campo apellido
          if(!empty($apellido)&& !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)) 
          {
              $apellido_validate = true;
          }  else {
              $apellido_validate=false;
              $errores['apellido'] = "El apellido no es valido";
          }
            //validar campo email 
          if(!empty($email && filter_var($email, FILTER_VALIDATE_EMAIL)))
          {
          $email_validate = true;    
          }  else {
              $email_validate = false;
              $errores['email'] = "No se ingreso correo electronico";
          }
          //validar campo password
          if(!empty($password))
          {
          $password_validate = true;    
          }  else {
              $password_validate=false;
              $errores['password'] = "No se ingreso contraseña";
          }
          
          
          
          
          
         
          
          
          //insertar a la base de datos
          $guardar_usuario = false;
          if(count($errores)== 0)
          {
              $guardar_usuario = true;
              
              //cifrar contraseña
          
          $password_secured = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]); //cifrar contraseña 4 veces cost
          
          
          
          //insertar datos
          $sql = "insert into usuarios VALUES(null, '$nombre','$apellido','$email','$password_secured', CURDATE());";
          $guardar = mysqli_query($conexion, $sql);
              
         
          
          if($guardar)
          {
              $_SESSION['completado'] = "El registro se guardo correctamente";
          }  else {
              //error general
              $_SESSION['errores']['general']="Fallo al guardar el usuario";
              
              
              
          }
          
          }  else {
          $_SESSION['errores'] =$errores;
         
          }
          
          
          

}
 header('Location: index.php');





