<?php include '../../inc/cabecera_comun_egresado.inc'; ?>

<div id="olvide-contra">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center">¿Quieres cambiar tu contraseña?</h1>
            	<div class="row">
            		<div class="col-xs-4"></div>
            		<div class="col-xs-4">
            			<p class="text-justify">No puedes solicitar cambio de contraseña en un perido menor a 24 hrs. por cambio. ¡Gracias!</p>
            			<p class="text-center">Atte. La administración</p>
            		</div>
            		<div class="col-xs-4"></div>
            	</div>
            	<div class="row">
            		<div class="col-xs-4"></div>
            		<div class="col-xs-4">
            			<form name="form_perdi_contra" method="POST" action="actualizar_contra.php" autocomplete="off" >
            		<input type="password" name="contra_antes" placeholder="Contraseña anterior"><br><br>
            		<input type="password" name="contra_antes_confirm" placeholder="Confirma tu contraseña anterior"><br><br>
                    <h2>Nueva contraseña:</h2>
                    <input type="password" name="contra_nueva" placeholder="Nueva contraseña"><br><br>
            		<input class="center-block" type="submit" value="Cambiar contraseña">
            	</form>	
            		</div>
            		<div class="col-xs-4"></div>
            	</div>     
            </div>
        </div>
    </div>
</div>
<?php include '../../inc/pie_comun_egresado.inc'; ?>
