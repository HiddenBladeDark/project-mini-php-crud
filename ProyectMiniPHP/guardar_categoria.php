<?php

if(isset($_POST))
    {
    //conexion base de datos
    include_once 'includes/Conexion.php';
    
    
        $nombre=    isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false; /*si existe el post nombre
                                                                                                              *para limpiar los simbolos raros
             
                                                                                                               y si no false                             */
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
            header("Location: crear_categoria.php");
            
            if(count($errores)== 0)
            {
                $sql = "INSERT INTO categoria VALUES(NULL,'$nombre');";
                $guardar = mysqli_query($conexion, $sql); 
                 header("Location: index.php");
            }
            
    }
    
   
