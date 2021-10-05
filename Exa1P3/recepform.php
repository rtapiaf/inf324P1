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

				$sqlpersona="select nombre,apellido,tipo from persona WHERE ci=".$fila["ci"];
				$resultadopersona=mysqli_query($conexion,$sqlpersona);
				$filapersona=mysqli_fetch_array($resultadopersona);
				
				if($filapersona["tipo"]=="estudiante")
				{
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
							?>
						</tbody>
					</table>
		<?php
				} 
				else
				{
					echo "<h3>Docente: ".$filapersona["nombre"]." ".$filapersona["apellido"]."</h3>";
					$CCH=0;
					$CLP=0;
					$CCB=0;
					$COR=0;
					$CPT=0;
					$CTJ=0;
					$CSC=0;
					$CBE=0;
					$CPD=0;
					$SCH=0;
					$SLP=0;
					$SCB=0;
					$SOR=0;
					$SPT=0;
					$STJ=0;
					$SSC=0;
					$SBE=0;
					$SPD=0;
					$sqlestudiante="select ci,departamento from persona WHERE tipo='estudiante'";
					$resultadoest=mysqli_query($conexion,$sqlestudiante);
					while($filaest=mysqli_fetch_array($resultadoest))
						{
							//print_r($filaest);
							
							$sqlnotaest="select notafinal from nota WHERE ci=".$filaest['ci'];
							$resultadonotaest=mysqli_query($conexion,$sqlnotaest);
							while($filanotaest=mysqli_fetch_array($resultadonotaest))
							{
								//print($filaest['ci']);
								//print_r($filanotaest);
								//print($filaest['departamento']);
								/*if($filaest['departamento']=='01')
								{
									$SCH=$SCH+$filanotaest['notafinal'];
									$CCH=$CCH+1;
								}*/
								switch($filaest['departamento'])
								{
									case '01':
										$SCH=$SCH+$filanotaest['notafinal'];
										$CCH=$CCH+1;
										break;
									case '02':
										$SLP=$SLP+$filanotaest['notafinal'];
										$CLP=$CLP+1;
										break;
									case '03':
										$SCB=$SCB+$filanotaest['notafinal'];
										$CCB=$CCB+1;
										break;
									case '04':
										$SOR=$SOR+$filanotaest['notafinal'];
										$COR=$COR+1;
										break;
									case '05':
										$SPT=$SPT+$filanotaest['notafinal'];
										$CPT=$CPT+1;
										break;
									case '06':
										$STJ=$STJ+$filanotaest['notafinal'];
										$CTJ=$CTJ+1;
										break;
									case '07':
										$SSC=$SSC+$filanotaest['notafinal'];
										$CSC=$CSC+1;
										break;
									case '08':
										$SBE=$SBE+$filanotaest['notafinal'];
										$CBE=$CBE+1;
										break;
									case '09':
										$SPD=$SPD+$filanotaest['notafinal'];
										$CPD=$CPD+1;
										break;
								}
								
							}
							$CCH = $CCH ==0 ? 1 : $CCH;
							$CLP = $CLP ==0 ? 1 : $CLP;
							$CCB = $CCB ==0 ? 1 : $CCB;
							$COR = $COR ==0 ? 1 : $COR;
							$CPT = $CPT ==0 ? 1 : $CPT;
							$CTJ = $CTJ ==0 ? 1 : $CTJ;
							$CSC = $CSC ==0 ? 1 : $CSC;
							$CBE = $CBE ==0 ? 1 : $CBE;
							$CPD = $CPD ==0 ? 1 : $CPD;
								
							$CH=$SCH/$CCH;
							$LP=$SLP/$CLP;
							$CB=$SCB/$CCB;
							$OR=$SOR/$COR;
							$PT=$SPT/$CPT;
							$TJ=$STJ/$CTJ;
							$SC=$SSC/$CSC;
							$BE=$SBE/$CBE;
							$PD=$SPD/$CPD;
							//print($CCH);
							//print($SCH);
							//print($SCH/$CCH);
							
						}
				?>
				<table>
					<thead>
						<tr>
							<th>CH</th>
							<th>LP</th>
							<th>CB</th>
							<th>OR</th>
							<th>PT</th>
							<th>TJ</th>
							<th>SC</th>
							<th>BE</th>
							<th>PD</th>
						</tr>
					</thead>
					<tbody>
						<?php
							echo "<tr>";
								echo 	"<td>".$CH."</td>";
								echo 	"<td>".$LP."</td>";
								echo 	"<td>".$CB."</td>";
								echo 	"<td>".$OR."</td>";
								echo 	"<td>".$PT."</td>";
								echo 	"<td>".$TJ."</td>";
								echo 	"<td>".$SC."</td>";
								echo 	"<td>".$BE."</td>";
								echo 	"<td>".$PD."</td>";
							echo "</tr>";
						?>
					</tbody>
				</table>
				<?php
				}
										
			}
		}
		if($existe=="no")
		{
			//print("volver");
			header("Location: index.php");
		}
		?>
		
		</div>
	</body>
</html>