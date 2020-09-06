<?php


if(isset($_POST))
{
    require_once './includes/Conexion.php';
    
    
    //recoger los campos
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion,$_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion,$_POST['descripcion']) : FALSE;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : FALSE;
    $usuario =  $_SESSION['usuario']['id'];
    
    //validacion
    $errores = array();
    
    
    //validar si estan llenos los campos
    if(empty($titulo))
    {
        $errores['titulo'] = "El titulo no es valido";
        
    }
     if(empty($descripcion))
    {
        $errores['descripcion'] = "La descripcion no es valida";
        
    }
    if(empty($categoria) && !is_numeric($categoria) )
    {
        $errores['categoria'] = "La categoria no es valida";
    }
    
    //contar el array de los errores y si es 0 se cumpla para su respectivo guardado en la db
    if(count($errores) == 0)

    {
        if(isset($_GET['editar']))
        {
            $id_entrada = $_GET['editar'];
            $id_usuario = $_SESSION['usuario']['id'];
            //que el id de la entrada corresponda con el de la URL y el usuario sea el dueño
            $sql = "UPDATE entrada SET titulo='$titulo', descripcion='$descripcion', id_categoria=$categoria".
                    " WHERE id=$id_entrada AND id_usuario=$id_usuario";
        }  else {
            $sql = "INSERT INTO entrada VALUES(null,$usuario,$categoria,'$titulo','$descripcion', CURDATE());";
        }
        
        
        
        $guardar = mysqli_query($conexion, $sql);
     header("Location: index.php");
       
    }else
    {
        $_SESSION["errores_entrada"] = $errores;
        
        //si se presenta un fallo que entre de nuevo a la condicion y me redireccione de nuevo a la pagina correspondiente y si no a crear entradas
        if(isset($_GET['editar']))
            {
            header("Location: editar_entrada.php?id=".$_GET['editar']);
        }  else {
             header("Location: crear_entradas.php");
        }
        
        
        
    }
    
}

