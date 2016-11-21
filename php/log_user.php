<?php 
include '../inc/cabecera_comun_grales.inc';
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
				window.location.href = '../index.php#titulo-log';
		}
		});
	</script>
	<?php
	exit;
}
$peticion_egresados = "SELECT * FROM alumno WHERE usuario_alumno = '$usuario' ";
$resultado_egresados = mysqli_query($conexion, $peticion_egresados);

if(mysqli_num_rows($resultado_egresados)){
	while($fila_egresados = mysqli_fetch_array($resultado_egresados)){
		if (password_verify($contra, $fila_egresados["contra_alumno"])){
			switch ($fila_egresados['status']) {
				case 'ACTIVA':
					session_start();
					$_SESSION["session-egresado"] = 1;
					$_SESSION["id_egresado"] = $fila_egresados["id_alumno"];
					$_SESSION["usuario_egresado"] = $fila_egresados["usuario_alumno"];
					$_SESSION["contra_egresado"] = $fila_egresados["contra_alumno"];
					
					$id_alumno = $fila_egresados["id_alumno"];
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Egresado Bienvenido!",
						  text: "Sistema de Bolsa de Trabajo UEH.",
						  type: "success",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = 'egresado/index.php';
						}
						});
					</script>
					<?php
				break;
				case 'PENDIENTE':
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Estado de cuenta PENDIENTE!",
						  text: "Estaremos en contacto muy pronto. ¡Gracias!",
						  type: "warning",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = '../index.php';
						}
						});
					</script>
					<?php
				break;
				case 'CANCELADA':
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Cuenta CANCELADA!",
						  text: "Contacta con el administrador del sistema.",
						  type: "error",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = '../index.php';
						}
						});
					</script>
					<?php
				break;
			}
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
						window.location.href = '../index.php#titulo-log';
				}
				});
			</script>
			<?php
		}
	}
}
$peticion_empresas = "SELECT * FROM empresas WHERE usuario_empresa = '$usuario' ";
$resultado_empresas = mysqli_query($conexion, $peticion_empresas);
if(mysqli_num_rows($resultado_empresas)){
	while($fila_empresas = mysqli_fetch_array($resultado_empresas)){
		if (password_verify($contra, $fila_empresas["contra_empresa"])){
			switch ($fila_empresas['status']) {
				case 'ACTIVA':
					session_start();
					$_SESSION["session-empresa"] = 1;
					$_SESSION["id_empresa"] = $fila_empresas["id_empresa"];
					$_SESSION["empresa"] = $fila_empresas["empresa"];
					$_SESSION["rfc"] = $fila_empresas["rfc"];
					$_SESSION["direccion"] = $fila_empresas["direccion_empresa"];
					$_SESSION["estado"] = $fila_empresas["estado_empresa"];
					$_SESSION["ciudad"] = $fila_empresas["ciudad_empresa"];
					$_SESSION["sector"] = $fila_empresas["sector"];
					$_SESSION["giro"] = $fila_empresas["giro"];
					$_SESSION["contacto"] = $fila_empresas["contacto"];
					$_SESSION["puesto_contacto"] = $fila_empresas["puesto_contacto"];
					$_SESSION["telefono"] = $fila_empresas["telefono_empresa"];
					$_SESSION["email"] = $fila_empresas["email_empresa"];
					$_SESSION["facebook"] = $fila_empresas["facebook_empresa"];
					$_SESSION["usuario_empresa"] = $fila_empresas["usuario_empresa"];
					/*$_SESSION["contra_empresa"] = $fila_empresas["contra_empresa"];*/
					$id_empresa = $fila_empresas["id_empresa"];
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Empresa Bienvenida!",
						  text: "Sistema de Bolsa de Trabajo UEH",
						  type: "success",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = 'empresa/index.php';
						}
						});
					</script>
					<?php
				break;
				case 'PENDIENTE':
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Estado de cuenta PENDIENTE!",
						  text: "Estaremos en contacto muy pronto. ¡Gracias!",
						  type: "warning",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = '../index.php';
						}
						});
					</script>
					<?php
				break;
				case 'CANCELADA':
					?>
					<script type="text/javascript">
						swal({
						  title: "¡Cuenta CANCELADA!",
						  text: "Contacta con el administrador del sistema.",
						  type: "error",
						  allowEscapeKey: false,
						  allowOutsideClick: false
						 },
						function (confirmado) {
							if(confirmado){
								window.location.href = '../index.php';
						}
						});
					</script>
					<?php
				break;
			}
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
						window.location.href = '../index.php#titulo-log';
				}
				});
			</script>
			<?php
		}
	}
}
if(!mysqli_num_rows($resultado_egresados) && !mysqli_num_rows($resultado_empresas)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡No existe Usuario!",
		  text: "Si eres egresado UEH ¡Registrate!.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = '../index.php#titulo-log';
		}
		});
	</script>
	<?php
}

include '../inc/pie_comun_grales.inc'; ?>