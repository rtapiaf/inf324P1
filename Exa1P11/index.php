<?php include "cabecera.inc.php";?>
		<div style="font-family: 'Ubuntu', sans-serif;color:#05196e;margin-left:130">
			<h1>ACCESO AL SITIO WEB</h1>
		</div>
		<form method="GET" action="recepform.php">
		<div style="font-family: 'Ubuntu', sans-serif;color:#05196e;margin-left:280">
			Usuario:
		</div>
		<div style="font-family: 'Ubuntu', sans-serif;margin-left:230;padding:10;boder-color:5;">
			<input type="text" name="nombre" value=""></div><br>
		<div style="font-family: 'Ubuntu', sans-serif;color:#05196e;margin-left:265">
			Contraseña:
		</div>
		<div style="font-family: 'Ubuntu', sans-serif;margin-left:230;padding:10;boder-color:5;">
			<input type="text" name="contrasena" value=""></div><br>
			<input type="submit" name="entrar" value="Entrar" style="height:30px;width:100px;background:#fff;border:1px solid #05196e;border-radius:20px;color: #05196e;font-family: 'Ubuntu', sans-serif;cursor:pointer;margin-left:265">
		</form>
	
<?php include "pie.inc.php";?>