

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <link href="css/soap.css" rel="stylesheet">
    <script type="text/javascript" src="js/nuevoJS.js"></script>
</head>
<body >



	<br><br><br>
	
<center>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				
			</div>
			<div class="col-sm-6">
				<h1>¿No te registraste aun?</h1>
				<form action="registrarse.php" method="post" class="form-horizontal" >
					<label>Nombre Usuario:</label><br>
					<input name="username" type="text" id="username" required>
					<br><br>

					<label>Password:</label><br>
					<input name="password" type="password" id="password" required>
					<br><br>

					<label>Repetir Password:</label><br>
					<input name="repetir_password" type="password" id="repetir_password" required>
					<br><br>

					<label>E-mail:</label><br>
					<input name="email" type="email" id="email" required placeholder="fulanito@gmail.com">
					<br><br>
					<input type="submit" name="Submit" value="Registrarse">
				</form>
<?php
	
	//esto borra el error al iniciar que no hay nada en las variables
	error_reporting(E_ALL ^ E_NOTICE);

	//Se definen variables
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";


	$username = strip_tags($_POST['username']);
	$password = md5(strip_tags($_POST['password']));
	$repetir_password = md5(strip_tags($_POST['repetir_password']));
	$email = strip_tags($_POST['email']);
	$dia = date("Y-m-d");
	$random= rand(23456789,98765432);

	// Create connection
	$conn = new mysqli($host_db,$user_db,$pass_db,$db_name);
	// Check connection
	if ($conn->connect_error) {
	    die("No se puso conectar a la base de datos: ". $conn->connect_error);
	}

	$sql0 = "SELECT * FROM usuario";
	$sql1 = "INSERT INTO usuario (nombreUser, EmailUser, PassUser, dia,random, activacion) VALUES ('$username','$email','$password','$dia','$random','0')";

	$result = $conn->query($sql0);

	if ($row=mysqli_num_rows($result)){
		while($row=mysqli_fetch_array($result)){
			if ($row['EmailUser'] == $email){ 
				echo "Este correo ya está registrado.\n¿Olvidaste la contraseña?";
				echo "<br><a href='index.php'>Vuelva a intentarlo click aqui</a> <br>";
				echo $row['EmailUser'];
				$correoExistente=$row['EmailUser'];
				
				break;
			}
		}
	}

	if ($correoExistente!=$email) {
		if ($password == $repetir_password){
			if($conn->query($sql1) === TRUE){
				
				$ultimoid=mysql_insert_id();

/*

				$header = 'From: ' . $mail . ", de la poblacion ".$poblacion."\r\n"; 
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
				$header .= "Mime-Version: 1.0 \r\n"; 
				$header .= "Content-Type: text/plain"; 

				$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n"; 
				$mensaje .= "Su e-mail es: " . $email . " \r\n"; 
				$mensaje .= "Enviado el " . date('d/m/Y', time()); 

				$para = $email; 
				$asunto = 'AKI LO Q KIERAS'; 

				mail($para, $asunto, utf8_decode($mensaje), $header); 

				echo 'mensaje enviado correctamente'; 
				
				
				;*/
				$asunto="Activacion de tu cuenta";
				$de="De: oscardamianfranco@gmail.com";

				

				$body='Hola $username,\n\nNecesitas hacer click ahi para activar tu cuenta: <a href="http://localhost/se/activacion.php?id='.$ultimoid.'&codigo='.$random.'>Activar</a>\n\n			Gracias por seguirnos';


				mail($email, $asunto, $body);

				echo "chequea tu correo para la activacion.";
				echo "<br><a href='index.php'>click aqui</a><br>";
			}else{
				echo "Error: " . $sql1 . "<br>" . $conn->error;
			}
		}else{
			echo "Los password no coinciden";
		}
	}
		
?>	
			</div>
		</div>
	</div>
</center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>