<?php
$code = mysql_real_escape_string($_GET['code']);
	$sql = mysql_query("SELECT * FROM activacion WHERE code='".$code."';");
	if(mysql_num_rows()==0) {
	echo "Lo siento, el codigo de activacion no existe";
	} else {
	$codigo = mysql_fetch_array($sql);
	mysql_query("UPDATE usuarios SET activate = '1' WHERE id = ".$codigo['userid']." LIMIT 1;");
	echo "Se activo con exito!";
	}

?>