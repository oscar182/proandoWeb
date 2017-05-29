<?php

session_start();

?>
<!DOCTYPE html>

<html lang="en">

<head>
 <title>Login</title>
	<meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <script type="text/javascript" src="js/nuevoJS.js"></script>
</head>
<?php
if(isset($_SESSION['username'])){
	$sql="SELECT * FROM usuario INNER JOIN post ON data.idUsuario = usuarioId";
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
	}


	$sql = "SELECT * FROM data INNER JOIN post ON data.idUsuario = usuarioId";

	$result = $conexion->query($sql);

	if($row=mysqli_num_rows($result)){
		while($row=mysqli_fetch_array($result)){
			?>
			<center>
				<h1 for='exampleInputName2'>
					<?php echo $row['tituloPost'] ?>
				</h1>
				<br>
				<label for='exampleInputName2'>
					<b>Publicado el: <?php echo $row['fechaPost'];?></b> 
				</label>
				<br>
			<center>
			<?php echo $row['articuloPost']."<br>";
			echo $row['nombreUser'];
		}
	}else{
		echo "Usuario no válido";
		echo "<br><a href='index.php'>Volver a Intentarlo</a>";
		
	}


?>


<?php
}else{
	   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='index.php'>Login</a>";
   echo "<br><br><a href='index.php'>Registrarme</a>";

}
?>