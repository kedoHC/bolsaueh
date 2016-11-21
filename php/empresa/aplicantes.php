<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc'; 
include '../../inc/config.inc'; 

$id = $_GET["id_oferta"];

$peticion_ofertas = "SELECT puesto FROM ofertas WHERE id_oferta = '$id' ";
$resultado_ofertas = mysqli_query($conexion, $peticion_ofertas);
?>
<div id="puesto">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <?php 
            while($fila_ofertas = mysqli_fetch_array($resultado_ofertas)){
				echo '
            	<h2 class="text-center">APLICANTES PARA EL PUESTO DE</h2>
 				<h1 class="text-center">'.$fila_ofertas["puesto"].'</h1>                           
 				';
 				}
 				?>
            </div>
        </div>
    </div>
</div>
<div id="aplicantes">
	<div class="container">
		<?php 
		$peticion_aplicantes = "SELECT id_alumno_a FROM aplicantes  WHERE id_oferta_a = '$id' ";
		$resultado_aplicantes = mysqli_query($conexion, $peticion_aplicantes);

		while($fila_ofertas = mysqli_fetch_array($resultado_aplicantes)){
			$id_aplicante_oferta = $fila_ofertas["id_alumno_a"];
			$peticion_aplicante_oferta = "SELECT id_alumno, nombre, titulo FROM alumno  WHERE id_alumno = '$id_aplicante_oferta' AND status = 'ACTIVA'  ";
			$resultado_aplicante_oferta = mysqli_query($conexion, $peticion_aplicante_oferta);
			while($fila_aplicante_oferta = mysqli_fetch_array($resultado_aplicante_oferta)){
				echo '
					<div class="row aplicante">
						<div id="foto" class="col-xs-4">
							<img class="img-responsive center-block img-circle" src="../../img/egresados/foto-egresado-1.png">
						</div>
						<div id="datos-aplicante" class="col-xs-8">
							<h3>'.$fila_aplicante_oferta["nombre"].'</h3><br>
							<p>'.$fila_aplicante_oferta["titulo"].'</p><br>
							<div class="row">
								<div class="col-xs-4">
									<a href="perfil_aplicante.php?id_aplicante='.$fila_aplicante_oferta["id_alumno"].'"><button class="btn center-block">Ver Perfil</button></a>
								</div>
								<div class="col-xs-4">
									<a href="considerar.php?id_aplicante='.$fila_aplicante_oferta["id_alumno"].'&id_oferta='.$id.'"><button class="btn center-block">Considerar</button></a>
								</div>
								<div class="col-xs-4">
									<a href="descartar.php?id_aplicante='.$fila_aplicante_oferta["id_alumno"].'&id_oferta='.$id.'"><button class="btn center-block">Descartar</button></a>
								</div>
							</div>
						</div>
					</div>
				';
			}
		}
		if(!mysqli_num_rows($resultado_aplicantes)){
				echo'
				<div id="sin-aplicantes">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="text-center">No hay aplicantes</h1>
							<img class="img-responsive center-block" src="../../img/escudoN.png">
						</div>
					</div>
				</div>					
				';
			}
		 ?>
	</div>
</div>
<?php include '../../inc/pie_comun_empresa.inc'; ?>