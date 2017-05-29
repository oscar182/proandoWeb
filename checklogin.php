<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
	}

	$username = $_POST['username'];
	$password = md5(strip_tags($_POST['password']));

	$sql = "SELECT * FROM usuario WHERE nombreUser = '$username' or EmailUser='$username'";

	$result = $conexion->query($sql);

	if ($result->num_rows>0) {     
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$activacion=$row['activacion'];

		if($row['PassUser']==$password AND (($row['nombreUser']==$username)or($row['EmailUser']==$username))){ 
			if ($activacion==0) {
				echo "tu cuenta no se encuentra activada todavia\n Chequeá tu correo para el link de activación";
				echo "<br><a href='index.php'>volver al Inicio<a>";
			}else{
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $row['nombreUser'];
				$_SESSION['EmailUser']= $row['EmailUser'];
				$_SESSION['idUsuario'] = $row['idUsuario'];

				header("Location: index.php");
			}
		} else { 
				echo "Password incorrecto.";

				echo "<br><a href='index.php'>Volver a Intentarlo</a>";
		}
	}else{
		echo "Usuario no válido";
		echo "<br><a href='index.php'>Volver a Intentarlo</a>";

	}
	

	mysqli_close($conexion); 
?>
</body></html>
