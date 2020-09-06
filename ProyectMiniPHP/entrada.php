  <?php require_once './includes/Conexion.php'; ?>

<?php require_once './includes/helpers.php'; ?>

<?php
  
    $entrada_actual= conseguirEntrada($conexion, $_GET['id']);
    if(!isset($entrada_actual['id']))
    {
        header("Location: index.php");
        
    }
    
    ?>


<?php require_once './includes/Header.php'; ?>
<?php require_once './includes/Lateral.php';?>


    
    



<div id="principal">
    
   
    <!--recorrer categorias-->
    <h1><?=$entrada_actual['titulo']?></h1>
    
    <!--Enlace que me lleva a su categoria correspondiente-->
    <a href="categoria.php?id=<?=$entrada_actual['id_categoria']?>">
    <h2><?=$entrada_actual['categoria']?></h2>
    
    </a>
    <!--Saber el autor que creo la entrada-->
    <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>
    <p>
        <?=$entrada_actual['descripcion']?>
    </p>
    
    <!--Condicion si esta el usuario logueado-->
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['id_usuario']):?>
    <br/>
    <a href="editar_entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde" >Editar Entradas</a> 
    <a href="borrar_entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-azul" >Borrar Entradas</a> <!--imprimir id de la entrada por la barra de busqueda-->
    
    <?php endif;?>
    
</div>

<?php include_once './includes/footer.php';?>;



