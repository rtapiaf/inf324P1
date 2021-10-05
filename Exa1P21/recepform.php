<html>
	<head>
		<title>FCPN</title>
		<link href="miestilo.css" rel="stylesheet" type="text/css"/>
		
	</head>
	<body">
		<div id="cabecera">
			<div style="width:100;heigth:100;float:left;margin:20">
				<img src="logofcpn.png" style="width:100;heigth:100;">
			</div>
			<div style="width:500;heigth:100;float:left;margin-left:100">
				<h1>Universidad Mayor de San Andres</h1>
				<h2>Facultad de Ciencias Puras y Naturales</h2>
			</div>
		</div>
		<div class="menu">
			<ul>
				<li>
					<a href="./">Principal</a>
				</li>
				<li>
					<a href="./informatica">Informatica</a>
				</li>
				<li>
					<a href="./fisica">Fisica</a>
				</li>
				<li>
					<a href="./fisica">Matematica</a>
				</li>
			</ul>
		</div>
		<div class="cuerpo">
		
		<?php
		$usuario=$_GET["usuario"];
		$password=$_GET["password"];
		$existe="no";
		include "conexion.inc.php";
		$sqluser="SELECT * FROM usuario";
		$resultado=mysqli_query($conexion,$sqluser);
		//print($usuario);
		//print($password);
		while($fila=mysqli_fetch_array($resultado))
		{
			if($usuario == $fila["usuario"] && $password == $fila["password"])
			{
				$existe="si";

				$sqlpersona="select nombre,apellido from persona WHERE ci=".$fila["ci"];
				$resultadopersona=mysqli_query($conexion,$sqlpersona);
				$filapersona=mysqli_fetch_array($resultadopersona);
		
				echo "<h3>Estudiante: ".$filapersona["nombre"]." ".$filapersona["apellido"]."</h3>";
		?>		
				<table border="0">
					<thead>
						<tr>
							<th>sigla</th>
							<th>nota1</th>
							<th>nota2</th>
							<th>nota3</th>
							<th>notafinal</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//print("mostrar notas");
							$sqlnota="select * from nota WHERE ci=".$fila["ci"];
							$resultadonota=mysqli_query($conexion,$sqlnota);
							while($filanota=mysqli_fetch_array($resultadonota))
							{
								//print_r($filanota);
								echo "<tr>";
								echo 	"<td>".$filanota["sigla"]."</td>";
								echo 	"<td>".$filanota["nota1"]."</td>";
								echo 	"<td>".$filanota["nota2"]."</td>";
								echo 	"<td>".$filanota["nota3"]."</td>";
								echo 	"<td>".$filanota["notafinal"]."</td>";
					
								echo "</tr>";
								
							}
			}
		}
		if($existe=="no")
		{
			//print("volver");
			header("Location: index.php");
		}
						?>
					</tbody>
			</table>
			
		
		</div>
	</body>
</html>