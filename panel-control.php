<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='index.php'>Login</a>";
   echo "<br><br><a href='index.php'>Registrarme</a>";

exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Perfil de <?php echo $_SESSION['username']?></title>
	<meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <script type="text/javascript" src="js/nuevoJS.js"></script>
</head>

<body>
<?php
	$id=$_SESSION['idUsuario'];
	
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
	}

	$sql = "SELECT idUsuario, nombreUser, EmailUser from usuario where idUsuario='$id'";
	$result = $conexion->query($sql);

	if ($row=mysqli_num_rows($result)){
		while($row=mysqli_fetch_array($result)){
			if ($row['idUsuario']==$id){ 
				
				$Ciudad = $row['ciudad'];
				$Provincia = $row['provincia'];
				$Secundario= $row['secundario'];

				break;
			}
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<center>
				<p>Imagen del Usuario (Avatar)</p>
			</center>
		</div>
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<label for="exampleInputEmail1"> Usuario: </label><?php echo $_SESSION['username'];?><br>
			<label for="exampleInputEmail1"> Secundario: </label>
			<?php if($Secundario == 1){
					echo "Completo";	
				}else{
					echo "Incompleto";
			}?><br>
			<label for="exampleInputEmail1"> Ciudad: </label><?php echo $Ciudad;?> 
			<label for="exampleInputEmail1"> - Provincia: </label><?php echo $Provincia;?><br>
		</div>
	</div>
</div>
<h1>Panel de Control</h1>
<p>Aqui hirian los enlaces que le permitirian al usuario
editar su perfil o cualquier otra cosa que desees.</p>

<ul>
  <li>Editar Perfil</li>
  <li>Editar Preferencias</li>
  <li>Editar Configuracion</li>
  <li>etc.</li>
</ul>

<br><br>
<a href=logout.php>Cerrar Sesion X </a>
</body>
</html>
