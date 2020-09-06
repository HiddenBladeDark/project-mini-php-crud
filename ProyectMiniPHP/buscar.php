<?php
  

    
    //si existe datos ingresados por POST
    if(!isset($_POST['busquedas']))
    {
             header("Location: index.php");
    }

    
    ?>


<?php require_once './includes/Header.php'; ?>


<?php require_once './includes/Lateral.php';?>


    
    



<div id="principal">
    
   
    <!--recorrer categorias con su respectivo datos-->
    <h1>Busqueda: <?=$_POST['busquedas']?></h1>
    
    
    
        <?php 
    //Busqueda
     $entradas= ConseguirTodasEntradas($conexion, null, null, $_POST['busquedas']);

    
    if(!empty($entradas)&& mysqli_num_rows($entradas)>=1): //si es mayor a 1 las filas a recorre se cumple al igual si no es esta vacia se cumple
        while ($entrada =  mysqli_fetch_assoc($entradas)): //recorrer con array recogido
        ?>
    <article class="entrada">
        
             <a href="entrada.php?id=<?=$entrada['id']?>"> <!--Recorrer entradas con el indice ID-->
                 
                 
            <h2><?=$entrada['titulo'] ?></h2>
            <span class="fechas"><?=$entrada['Categoria'].' | '.$entrada['fecha'] ?></span>
            <p>
                <?= substr($entrada['descripcion'],0,180)."..."?>
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


