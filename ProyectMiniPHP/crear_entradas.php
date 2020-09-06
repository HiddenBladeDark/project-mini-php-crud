<?php
include_once './includes/Header.php';
include_once './includes/Lateral.php';
include_once './includes/redireccion.php';
?>

<div id="principal">
    <h1>CREAR CATEGORIAS</h1>
    <p>Añade nuevas Entradas para que los usuarios puedan leerlas y disfrutas de las nuevas entregas.
    entradas.</p>
    <br/>
    <form action="guardar_entrada" method="POST">
        <label for="titulo">Titulo</label>
        
        <br/>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'titulo'): '' ; ?>
        <br/>
        <label for="descripcion">Descripcion</label>
        <br/>
        <textarea type="text" name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'descripcion'): '' ; ?>
        <br/>
        <br/>
        <label for="categoria">Categoria</label>
        
        <!--Listar todas las categorias-->
        <select name="categoria">
            <?php $categorias= ConseguirCategoria($conexion);
            if(!empty($categorias)):   
            while ($categoria =  mysqli_fetch_assoc($categorias)): //para conseguir array asociativos de categorias
            ?>
            
            <option value="<?=$categoria['id']?>"><?=$categoria['Nombre']?></option>
            <?php
                endwhile;
                endif; 
                ?>   
                    </select>
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'categoria'): '' ; ?>
        <input type="submit" value="Guardar">
        
    </form>   
    <?php BorrarErrores(); ?>
    


<?php include_once './includes/footer.php'?>
