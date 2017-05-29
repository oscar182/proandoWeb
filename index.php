<?php

session_start();

?>
<!DOCTYPE html>

<html lang="en">


<?php
if(isset($_SESSION['username'])){
?>
<head>
 <title></title>
	<meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <script type="text/javascript" src="js/nuevoJS.js"></script>
</head>
<body  onload="banner()" >
<div class="img"></div>
</header> 
  <nav class="navbar navbar-inverse nav">
    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand letra" href="#">Alto Logo!</a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      	<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola <?php echo $_SESSION['username'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="#">Mi Cuenta</a></li>
            <li><a href="panel-control.php">Editar Perfil</a></li>
            <li><a href="#">Calificaciones</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
          </ul>


  </nav>
</div>
<?php //fin navbar?>



	<div class="container">
		<div class="row">
			<div class="col-lg-6" >
				<center>

				</center>	
			</div>
			<div class="col-lg-6">
			</div>
		</div>
	</div>
	<div class="container">
		<center>	
			
			<form action="#" method="post" class="form-inline">
				<div class="form-group">
					<input for="exampleInputName2" id="exampleInputName2" class="form-control" name="Servicio" type="text" id="servicio" required oninvalid="setCustomValidity('Es obligatorio que rellenes este campo\nGracias Mother Fucker!')" oninput="setCustomValidity('')" placeholder="Buscar" style="width: 184px;">
					<input type="Submit" name="submit" value="Buscar" class="btn btn-info ">
					
				</div>
				
			</form>
		</center>
	</div>
	<br>

	<footer>
	 	<div class="container form-inline" >
 			<div class="col-lg-4 col-ms-4"><center>asdasdasd</center></div>
 			<div class="col-lg-4 col-ms-4"><center>Creado por | Terapixel <img src=""></center></div>
 			<div class="col-lg-4 col-ms-4"><center>asdasd</center></div>
	 	</div>	 	
	</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

 </body>
<?php

}else{
?>
<head>
 <title>Logueate</title>
	<meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <link href="css/soap.css" rel="stylesheet">
    <script type="text/javascript" src="js/nuevoJS.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse nav head border">
    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand letra" href="#">Alto Logo!</a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
        	<li>
        		<form action="checklogin.php" method="post" class="navbar-form navbar-left">
					<div class="form-group">
						<input class="form-control" name="username" type="text" id="username" required oninvalid="setCustomValidity('Es obligatorio que rellenes este campo\nGracias Mother Fucker!')" oninput="setCustomValidity('')" placeholder="Nombre de Usuario o Email" style="width: 205px;height: 24px;">
						<input class="form-control" name="password" type="password" id="password" required style="width: 205px;height: 24px;" placeholder="Password">
					</div>
					<input  class="btn btn-primary headLog" type="submit" name="Submit" value="Iniciar Sesion" >
				</form>

        	</li>
        	<li>
        		<div class="form-group ">
	        		<div class="navbar-form navbar-right"> 
	        			<a href="registrarse.php"> 
	        				<button class="btn btn-primary headLog" value="Registrarse" >Registrarse</button>
	        			</a>
	        		</div>
	        	</div>
	        </li>
        </ul>



  </nav>
<br>
<br>
<br>
	<div class="container">
		<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<center>
				<a href="" id="fotocambia1"><img id="fotocambia" src="img/banner/1_728x90.png" class="col-lg-12 col-sm-12 col-xs-12"></a>
			</center>	
		</div>
		<div class="col-lg-3"></div>
		</div>
	</div>
	<footer>

	</footer>
	<script language="JavaScript">
		var cont=0
		function cambia() {
		cont = cont % 2;
		if (cont==1){
			document.getElementById("fotocambia").src="img/banner/1_728x90.png";
			document.getElementById("fotocambia1").href="https://www.google.com.ar/";
		}
		if(cont==0){
			document.getElementById("fotocambia").src="img/banner/2_728x90.gif";
			document.getElementById("fotocambia1").href="https://www.facebook.com/";
		}
		cont++;
		}
		function inicio() {
			setInterval(cambia, 8000);
		}
		window.onload=inicio;
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

 </body>
 <?php 
}
 ?>
</html>