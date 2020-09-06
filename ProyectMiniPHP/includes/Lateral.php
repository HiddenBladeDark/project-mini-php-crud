


<aside id="sidebar">
    
        <div id="buscardor" class="block-aside">
            
            <h3>buscar</h3>
           
            <form action="buscar.php" method="POST">
                <input type="text" name="busquedas">
                    <input type="submit" value="buscar">
                </form>
        </div>  
    
    
    
    
    
            <!--se habilitara cuando la condicion se cumpla si hay una session activa usuario-->
            <?php if(isset($_SESSION['usuario'])): ?>
         <div id="usuario_logueado" class="block-aside">
             <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']; ?></h3>
            <!--boton-->
             <a href="crear_entradas.php" class="boton boton-verde" >Crear Entradas</a>
             <a href="crear_categoria.php" class="boton boton-azul" >Crear Categoria</a>
            <a href="misdatos.php" class="boton boton-naranja" >Editar mis datos</a>
            <a href="cerrar.php" class="boton boton-rojo" >Cerrar sesión</a>
           
        </div>
        <?php endif;?>
    
         <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="block-aside">
            
            <h3>INGRESAR</h3>
            
                 <?php if(isset($_SESSION['error_login'])): ?>
                  <div class="alertaerrores">
             <?=($_SESSION['error_login']); ?>
                        </div>
        <?php endif;?>
            
            
            <form action="login.php" method="POST">
                   <label for="email">Email</label>
                    <input type="email" name="email">    
                   <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" name="submit" value="Ingresar">
                </form>
        </div>
        <div id="register" class="block-aside">
            
            
            <h3>REGISTRARSE</h3>
            
            
            <!--Mostrar errores-->
            
            <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta-exito">
                <?=$_SESSION['completado']?>
            </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta-error">
                <?=$_SESSION['errores']['general']?>
            <?php endif;?>
                
                
                <form action="register.php" method="POST">
                <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">   
                    
                   <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre'): '' ; ?>
                    
                    
                <label for="Apellido">Apellido</label>
                    <input type="text" name="apellido">

                    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'apellido'): '' ; ?>
                    
                    <label for="email">Email</label>
                    <input type="email" name="email">    
                    
                    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'email'): '' ; ?>
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    
                    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'password'): '' ; ?>

                    <input type="submit" name="submit" value="Registrarse">
                    
                </form>   
            <?php BorrarErrores(); ?>
                </div>
            <?php endif; ?>
    </aside>
