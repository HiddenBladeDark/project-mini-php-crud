  <?php require_once './includes/Conexion.php'; ?>

<?php require_once './includes/helpers.php'; ?>

<?php
  
    $categoria_actual= ConseguirCategorias($conexion, $_GET['id']);
    if(!isset($categoria_actual['id']))
    {
        header("Location: index.php");
        
    }
    
    ?>


<?php require_once './includes/Header.php'; ?>


<?php require_once './includes/Lateral.php';?>


    
    



<div id="principal">
    
   
    <!--recorrer categorias con su respectivo datos-->
    <h1>Entradas de <?=$categoria_actual['Nombre']?></h1>
    
    
    
        <?php 
    //listar entradas correspondientes a sus categorias
    $entradas = ConseguirTodasEntradas($conexion,NULL,$_GET['id']);
    
    if(!empty($entradas)&& mysqli_num_rows($entradas)>=1): //si es mayor a 1 las filas a recorre se cumple al igual si no es esta vacia se cumple
        while ($entrada =  mysqli_fetch_assoc($entradas)): //recorrer con array recogido
        ?>
    <article class="entrada">
        
             <a href="entrada.php?id=<?=$entrada['id']?>"> <!--Recorrer entradas con el indice ID-->
            <h2><?=$entrada['titulo'] ?></h2>
            <span class="fechas"><?=$entrada['Categoria'].' | '.$entrada['fecha'] ?></span>
            <p>
                <?=$entrada{'descripcion'}?>
            </p> 
             </a>
        </article>
    <?php
        endwhile;
        else:
    ?>
    <div class="alerta-error">No hay entradas en esta categoria</div>
    <?php
    endif;
    ?>
</div>

           
    
    
   
    
</div>

<?php include_once './includes/footer.php';?>;
