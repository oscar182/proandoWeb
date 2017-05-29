<?php 
	
	//Se definen variables
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";
	
	// Create connection
	$conn = mysql_connect($host_db, $user_db,$pass_db,$db_name) or die ('No se pudo conectar a la base de datos');
	mysql_select_db("users") or die("no se encuentra la tabla");

	$id=$_GET['id'];
	$codigo=$_GET['codigo'];
	


	if($id&&$codigo){
		$sql = mysql_query("SELECT * FROM usuario WHERE idUsuario='$id' AND random = '$codigo'");
		$checquear_sql=mysql_num_rows($sql);
		if($checquear_sql==1){

			$acti=mysql_query("UPDATE usuario SET activacion='1' WHERE idUsuario='$id'");
			die("Tu cuenta esta activada ahora,  logueate");

		}else
			die("Id Invalido or numero de activacion incorrecto");

	}else
		die("no se encontraron datos");


		
/*
//-------------------------------------------------------------------------------		

	if ($row=mysql_num_rows($result)){
		while($row=mysql_fetch_array($result)){
			if ($row['idUsuario'] == $id){ 
				echo "Este correo ya está registrado.\n¿Olvidaste la contraseña?";
				echo "<br><a href='index.php'>Vuelva a intentarlo click aqui</a> <br>";
				echo $row['EmailUser'];
				$correoExistente=$row['EmailUser'];

				break;
			}
		}
	}
*/
?>