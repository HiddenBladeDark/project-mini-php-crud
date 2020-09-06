<?php
include_once './includes/Header.php';
include_once './includes/Lateral.php';
include_once './includes/redireccion.php';
?>

<div id="principal">
    <h1>CREAR CATEGORIAS</h1>
    <p>Añade nuevas Categorias para que los usuarios puedan crear sus respectivas
    entradas.</p>
    <br/>
    <form action="guardar_categoria" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"/>
        
        <input type="submit" value="Guardar">
        
    </form>   
    
    


<?php include_once './includes/footer.php'?>
