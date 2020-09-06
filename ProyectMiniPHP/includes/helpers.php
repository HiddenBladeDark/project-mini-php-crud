
<?php
//Mostrar errores
function MostrarError($errores, $campo)
{
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alertaerrores'>".$errores[$campo]."</div>";
    }    
       return $alerta;
}



//borrar los errores como exitos
function BorrarErrores(){
   
   $borrado=false;
   
   
if(isset($_SESSION['errores']))
    {
    $_SESSION['errores'] = null;
   $borrado =TRUE;
}



if(isset($_SESSION['errores_entrada']))
    {
    $_SESSION['errores_entrada'] = null;
    $borrado=TRUE;
}
   


   
   if(isset($_SESSION['completado']))
   {
       $_SESSION['completado']=null;
       $borrado = TRUE;
   }
   return $borrado;
}





//Recorrer las categorias
function ConseguirCategoria($conexion)
{
    $sql="SELECT * FROM categoria ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
   
    
    if($categorias && mysqli_num_rows($categorias) >=1)
    {
        $result = $categorias;
        
    }
    return $result;
}
//recorrer las ultimas entradas
function ConseguirUltimasEntradas($conexion)
{
    $sql="SELECT e.*,c.nombre AS 'Categoria' FROM entrada e ".
            "Inner Join categoria c ON e.id_categoria=c.id ".
            "ORDER BY e.id DESC LIMIT 4";
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    
    if($entradas && mysqli_num_rows($entradas) >=1)
    {
        $resultado=$entradas;
    }
    return $entradas;
}
//nota: si siempre se va concatenar, poner el order by a lo ultimo para evitar errores
//conseguir todas las entradas, mejor funcion que la de arriba
function ConseguirTodasEntradas($conexion, $limit= null,$categoria=null,$busqueda=NULL)
{
    $sql="SELECT e.*,c.nombre AS 'Categoria' FROM entrada e ".
            "Inner Join categoria c ON e.id_categoria=c.id ";            

    if(!empty($categoria)){
        
        $sql.=" WHERE e.id_categoria = $categoria ";
    }
    
    
    if(!empty($busqueda)){
        $sql.="WHERE e.titulo LIKE '%$busqueda%'";
        
    }
    $sql .=" ORDER BY e.id DESC ";
    
    
    if($limit){
        
     $sql .="LIMIT 4";  //concatenar con la variable de arriba "sql
   
}

    $entradas = mysqli_query($conexion, $sql);
    
    
    
    
    
    $resultado = array();
    
    if($entradas && mysqli_num_rows($entradas) >=1)
    {
        $resultado=$entradas;
    }
    return $entradas;
}





function conseguirEntrada($conexion,$id)
{
    $sql="SELECT e.*,c.Nombre as'categoria', CONCAT(u.nombre, ' ', u.apellido) AS 'usuario' ".
       " FROM entrada e ".
        "INNER JOIN categoria c ON e.id_categoria=c.id ". 
        "INNER JOIN usuarios u ON e.id_usuario=u.id ".
        "WHERE e.id = $id";
    
    $entrada = mysqli_query($conexion, $sql);
    
    $resultado =array();
    
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado =  mysqli_fetch_assoc($entrada);
                
                
    }
    return $resultado;
}





function ConseguirCategorias($conexion,$id)
{
    $sql="SELECT * FROM categoria WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    
   
    $result =array();
    if($categorias && mysqli_num_rows($categorias) >=1)
    {
        $result = mysqli_fetch_assoc($categorias);
        
    }
    
    return $result;
}


function BusquedaIndi($conexion,$busqueda=NULL)
{
    
     
    if(!empty($busqueda))
    {
       $sql="SELECT e.*,c.nombre AS 'Categoria' FROM entrada e Inner Join categoria c ON e.id_categoria=c.id WHERE e.titulo LIKE '%$busqueda%';";   //nos devolvera los resultados buscados  
    
           $entradas = mysqli_query($conexion, $sql);
    }
    
    
    
}


