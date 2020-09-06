<?php
    //Validar los datos si fueron ingresados
        if(isset($_POST)){
            
            include_once './includes/Conexion.php';

            
   
            
//Funcion boton actualizar
//recoger los datos
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
         
          
          
          
          
          
         
          
          
          //insertar a la base de datos
          $guardar_usuario = false;
          if(count($errores)== 0)
          {
              $usuario = $_SESSION['usuario'];
              $guardar_usuario = true;
             
          //COMPROBAR SI EXISTE EMAIL
              
              $sql= "SELECT id, email FROM usuarios WHERE email = '$email'";
              $isset_email=  mysqli_query($conexion, $sql);
              $isse_user = mysqli_fetch_assoc($isset_email); //sacar array asociativo
              
              
              
              
              if($isse_user['id'] == $usuario['id'] || empty($isse_user))
                  {
                  
                  
 
                  
              
            //Actualizar usuario de la DB
            
              //capturar el usuario que esta logueado
              $usuario = $_SESSION['usuario'];
              
          $sql = "UPDATE usuarios SET ".
                    "nombre = '$nombre', ".
                    "apellido = '$apellido', ".
                    "email = '$email' ".
                    "WHERE id=".$usuario['id']; //solo me va actualizar del usuario logueado
                  
          
          $guardar = mysqli_query($conexion, $sql);
              
          
          
          if($guardar)
          {
              //actualizar
              $_SESSION['usuario']['nombre'] =$nombre;
               $_SESSION['usuario']['apellido']=$apellido;     
               $_SESSION['usuario']['email']=$email;        
              $_SESSION['completado'] = "Tus datos se han actualizado con exito";
          }  else {
              //error general
              $_SESSION['errores']['general']="Fallo al actualizar";
 
          }
        
       }  else {
            $_SESSION['errores']['general']="El usuario ya existe";
       }    
          
 
          }  else {
          $_SESSION['errores'] =$errores;
         
          }
          
          
          

}
 header('Location: misdatos.php');


