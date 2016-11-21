<?php
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc';
include '../../inc/config.inc';

$id = $_SESSION["id_egresado"];
$contra_egresado = $_SESSION["contra_egresado"];

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

$contra_antes = $_POST['contra_antes'];
$contra_antes_confirm = $_POST['contra_antes_confirm'];
$contra_nueva = $_POST['contra_nueva'];
if(empty($contra_antes) || empty($contra_antes_confirm) || empty($contra_nueva)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos esta vacio. Todos los campos son requeridos.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'editar_contra.php';
		}
		});
	</script>
	<?php
}else{
	if($contra_antes != $contra_antes_confirm){
		?>
	<script type="text/javascript">
		swal({
		  title: "¡Las contrasenas no coinciden!",
		  text: "Verifica que esten bien escritas y que se tu contraseña anterior.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'editar_contra.php';
		}
		});
	</script>
	<?php
	exit;
	}
	if(!password_verify($contra_antes, $contra_egresado) || !password_verify($contra_antes_confirm, $contra_egresado)){
		?>
	<script type="text/javascript">
		swal({
		  title: "¡Las contrasenas no coinciden con tu contraseña actual!",
		  text: "Verifica que esten bien escritas y que se tu contraseña anterior.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'editar_contra.php';
		}
		});
	</script>
	<?php
	exit;
	}
	else{
		$contra_nueva = password_hash($contra_nueva,  PASSWORD_DEFAULT, ['cost' => 10]);
		$peticion = "UPDATE alumno SET contra_alumno = '$contra_nueva' WHERE id_alumno = '$id'  ";
		$resultado = mysqli_query($conexion, $peticion);
		if($resultado){
			?>
			<script type="text/javascript">
				swal({
				  title: "¡Contraseña actualizada!",
				  text: "Se ha modificado tu contraseña. ¡Gracias!.",
				  type: "success",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'editar_contra.php';
				}
				});
			</script>
			<?php
			$_SESSION["contra_egresado"] = $contra_nueva; 
		}
		else{
			?>
			<script type="text/javascript">
				swal({
				  title: "¡Contraseña NO actualizada!",
				  text: "No fue posible actualizar tu contraseña. Vuele a intentarlo por favor.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'editar_contra.php';
				}
				});
			</script>
			<?php
		}
	}
}
?>
<?php include '../../inc/pie_comun_egresado.inc'; ?>
