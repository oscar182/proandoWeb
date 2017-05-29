<?php  
	//Se definen variables
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "users";
	// Create connection
	$conn = new mysqli($host_db,$user_db,$pass_db,$db_name);
	// Check connection
	if ($conn->connect_error) {
	    die("No se puso conectar a la base de datos: ". $conn->connect_error);
	}



?>