<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
	<title>inicio</title>
</head>
<?php  
   $mysqli = new mysqli('localhost', 'root', '','laboratorio');
    session_start();
 
   

   if (isset($_POST['guardar'])) {
   	   $nombre = $_POST['nombre'];
   	   $laboratorio = $_POST['laborGuar'];
   	   $stock = $_POST['stock'];
   	   $precio = $_POST['precio'];
   	   $observa = $_POST['observa'];
   	   $query = "INSERT INTO `farmaco`(`Id`, `nombre`, `laboratorio`, `stock`, `precio`,`observacion`) VALUES (null,'$nombre','$laboratorio',$stock,$precio,'$observa')";
   	   $agregar = $mysqli->query($query);
   	   if (!$agregar) 
   	        echo "<script> alert('no agrego el elemento');</script>";
        else 
        	echo "<script> alert('se agrego correctamente');</script>";
   	   }
    
   

?>
<body>
<form method="post" name="form1" id="form1" action="index.php">
<?php 

if (isset($_GET['id'])) {
    	$id = $_GET['id'];
    	$query =  "delete from farmaco where Id = '$id' ";
    	$eliminar = $mysqli->query($query);
    	if (!$eliminar) 
    		  echo "<script> alert('no elimino el elemento');</script>";
        else 
        	echo "<script> alert('se elimino correctamente');</script>";
    	
    }
?>
	<div id="Busqueda">
	<div><h2>BUSQUEDA DE FARMACOS</h2></div>
	<div>
		<label>Laboratorio : </label>
		<select name="laborBus">
			<option class="option" value="Bayer">Bayer</option>
			<option class="option" value="Chile">Chile</option>
			<option class="option" value="Ferre">Ferre</option>
			<option class="option" value="Pharma">Pharma</option>
		</select>
		<input type="submit" name="buscar" value="Buscar">
	</div>
	</div>
	<?php  if ( (isset($_POST['buscar'])) || (isset($_GET['id'])) )  {
 ?>
    <div id="Lista">
		<div><h2>LISTADO DE FARMACOS</h2></div>
		<div>
			<label class="infoLista">NOMBRE</label>
			<label class="infoLista">LABORATORIO</label>
			<label class="infoLista">STOCK</label>
			<label class="infoLista">PRECIO</label>
		</div>

	
          <?php
        if (isset($_POST['laborBus'])) {
              
               $_SESSION['laboratorio'] = $_POST['laborBus'];
        	
        }
        $laboratorio =  $_SESSION['laboratorio'];
        $query = "select * from farmaco where laboratorio = '$laboratorio' ";
        $buscar = $mysqli->query($query);
        $numero = $buscar->num_rows;
        if ($numero == 0) echo "<script> alert('no hay farmacos asociados a este laboratorio');</script>";
        else
        {
           while ($registro = $buscar ->fetch_array()) {
           echo "<div>";
          ?> <a class="infoLista" href="index.php? id=<?php echo $registro['Id']; ?>"> <?php echo $registro['nombre']; ?>  </a>
		  <?php echo	"<label class='infoLista'>".$registro['laboratorio']."</label>";
		   echo	"<label class='infoLista'>".$registro['stock']."</label>";
		   echo	"<label class='infoLista'>".$registro['precio']."</label>";
		   echo "</div>";  

           }
        } 
      ?> </div>  
      <?php } ?>
       
   	
	</div>
   
	
	<div id="Agregar">
	 	<div><h2>AGREGAR UN NUEVO FARMACO</h2></div>
	 	<div>
	 		<label class="formAgre">NOMBRE : </label>
	 		<input class="formAgre" type="text" name="nombre">
	 	</div>
	 	<div>
	 		<label class="formAgre">LABORATORIO : </label>
	 		<select class="formAgre" name="laborGuar">
				<option class="option" value="Bayer">Bayer</option>
				<option class="option" value="Chile">Chile</option>
				<option class="option" value="Ferre">Ferre</option>
				<option class="option" value="Pharma">Pharma</option>
			</select>
	 	</div>
	 	<div>
	 		<label class="formAgre">STOCK : </label>
	 		<input class="formAgre" type="text" name="stock">
	 	</div>
	 	<div>
	 		<label class="formAgre">PRECIO : </label>
	 		<input class="formAgre" type="text" name="precio">
	 	</div>
	 	<div>
	 		<label class="formAgre">OBSERVACION : </label>
	 		<textarea class="formAgre" name="observa" cols="30" rows="10"></textarea>
	 	</div>
	 	<div>
	 		<input class="formAgre" type="submit" name="guardar" value="Guardar">
	 	</div>
	</div>
</form>
</body>
</html>