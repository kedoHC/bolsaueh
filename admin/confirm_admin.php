<?php 
include '../inc/cabecera_comun_admin.inc';
include '../inc/config.inc';

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

if(empty($usuario) || empty($contra)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos esta vacio.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'log_admin.php';
		}
		});
	</script>
	<?php
	exit;
}
$peticion_egresados = "SELECT * FROM admin WHERE usuario_admin = '$usuario' ";
$resultado_egresados = mysqli_query($conexion, $peticion_egresados);

if(mysqli_num_rows($resultado_egresados)){
	while($fila_egresados = mysqli_fetch_array($resultado_egresados)){
		if (password_verify($contra, $fila_egresados["contra_admin"])){
			?>
			<script type="text/javascript">
				swal({
				  title: "¡Bienvenido Aministrador!",
				  text: "Sistema de Bolsa de Trabajo Universidad Euro Hispanoamericana.",
				  type: "succes",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'index.php';
				}
				});
			</script>
			<?php
			exit;
		}
		else{
			?>
			<script type="text/javascript">
				swal({
				  title: "¡Acceso denegado!",
				  text: "Verifica que los datos esten bien escritos.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'log_admin.php';
				}
				});
			</script>
			<?php
		}
	}
}
include '../inc/pie_comun_admin.inc'; ?>