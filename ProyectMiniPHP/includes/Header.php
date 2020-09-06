<?php require_once 'Conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>
<!DOCTYPE html>


<html lang="es">
    <head>

         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./Assets/css/estilo.css" rel="stylesheet" type="text/css" media="all"/>
   
    <title>Video Juegos</title>
    </head>
    <body>
         <header id="header" >
<div id="Logo" >
<a href="index.php">
FenixZone
</a>
</div>

<nav id="menus">

<ul>
    <li>
        <a href="index.php">Inicio</a>    
    </li>
    <!--recorrer categorias menu-->
      <?php $categorias=ConseguirCategoria($conexion); 
      
          if(!empty($categorias)):
      
             while($categoria = mysqli_fetch_assoc($categorias)): ?>   <!--sacar array de consultas hechas-->
             <li>
                  <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['Nombre']?></a>    
             </li>
           <?php 
        
    endwhile;
    endif;?>
    <li>
        <a href="Sobre_Nosotros.php">Sobre Nosotros</a>    
    </li>
    <li>
        <a href="contactenos.php">Contacto</a>    
    </li>
</ul>
</nav>
    </header>
        
        <div id="container">
