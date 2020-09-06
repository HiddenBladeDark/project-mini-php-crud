<?php require_once './includes/Header.php'; ?>


<?php require_once './includes/Lateral.php';?>


    
    
<div id="principal">
    <h1>TODAS LAS ENTRADAS</h1>

    
    <?php 
    
    $entradas = ConseguirTodasEntradas($conexion);
    
    if(!empty($entradas)):
        while ($entrada =  mysqli_fetch_assoc($entradas)): //recorrer con array recogido
        ?>
    <article class="entrada">
        
             <a href="entrada.php?id=<?=$entrada['id']?>"> <!--Recorrer entradas con el indice ID-->
            <h2><?=$entrada['titulo'] ?></h2>
            <span class="fechas"><?=$entrada['Categoria'].' | '.$entrada['fecha'] ?></span>
            <p>
                <?=  substr($entrada['descripcion'],0,180)."..."?>
            </p> 
             </a>
        </article>
    <?php
        endwhile;
    endif;
    ?>
       

           
    
    
   
    
</div>

<?php include_once './includes/footer.php';?>;