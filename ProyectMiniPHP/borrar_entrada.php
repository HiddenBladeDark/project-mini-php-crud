<?php
require_once './includes/Conexion.php';





if(isset($_SESSION['usuario']) && isset($_GET['id']))
{
    //recoger el id de la entrada/categoria por url
    $entrada_id = $_GET['id']; 
    //recoger el usuario con su id
    $usuario_id = $_SESSION['usuario']['id'];
    
    
    $sql="DELETE FROM entrada WHERE id_usuario = $usuario_id AND id = $entrada_id;";
    
    $borrar=mysqli_query($conexion, $sql);
    
  
}

header("Location: index.php");