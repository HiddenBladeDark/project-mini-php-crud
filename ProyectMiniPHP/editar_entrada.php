  <?php require_once './includes/Conexion.php'; ?>
<?php include_once './includes/redireccion.php'; ?>
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
    <h1>EDITAR ENTRADA</h1>
    <p>Edita tu entrada de <?=$entrada_actual['titulo']?></p> <!--nos muestra el titulo de la entrada correspndiente-->
    <br/>
    
    <!--utilizamos en el action un flag para reutilizar el mismo script php-->
    <form action="guardar_entrada?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Titulo</label>
        
        <br/>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>" />
        <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'titulo'): '' ; ?>
        <br/>
        <label for="descripcion">Descripcion</label>
        <br/>
        <textarea type="text" name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'descripcion'): '' ; ?>
        <br/>
        <br/>
        <label for="categoria">Categoria</label>
        
        <!--Listar todas las categorias para listar-->
        <select name="categoria">
            <?php $categorias= ConseguirCategoria($conexion);
            if(!empty($categorias)):   
            while ($categoria =  mysqli_fetch_assoc($categorias)): //para conseguir array asociativos de categorias
            ?>
            
            
              <!-- si se cumple su categoria correspondiente quede selecionada-->
            <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['id_categoria']) ? 'selected="selected"'  : '' ?>> 
                    
               
            
            
                    
                
                
                    <?=$categoria['Nombre']?>
           
            </option>
            


                <?php
                endwhile;
                endif; 
                ?>   
                    </select>
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'categoria'): '' ; ?>
        <input type="submit" value="Guardar">
        
    </form>   
    <?php BorrarErrores(); ?>
    



