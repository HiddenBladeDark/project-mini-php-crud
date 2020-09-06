<?php
include_once './includes/Header.php';
include_once './includes/Lateral.php';
include_once './includes/redireccion.php';
?>

<div id="principal">
    <h1>MIS DATOS</h1>
    
     <!--Mostrar errores-->
            
            <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta-exito">
                <?=$_SESSION['completado']?>
            </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta-error">
                <?=$_SESSION['errores']['general']?>
            <?php endif;?>
                
                
                <form action="actualizarUsuario.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>">   
                    
                   <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre'): '' ; ?>
                    
                    
                <label for="Apellido">Apellido</label>
                <input type="text" name="apellido" value="<?=$_SESSION['usuario']['apellido']?>">

                    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'apellido'): '' ; ?>
                    <br/>
                  <label for="email">Email</label>
                  <input type="email" name="email" value="<?=$_SESSION['usuario']['email']?>">    
                    
                    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'email'): '' ; ?>
                    
                    <input type="submit" name="submit" value="Actualizar">
                    
                </form>   
    
    
</div>