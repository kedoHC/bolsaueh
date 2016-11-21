<?php include '../inc/cabecera_comun_grales.inc'; ?>

<div id="olvide-contra">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center">¿Olvidaste tu contraseña?</h1>
            	<div class="row">
            		<div class="col-xs-4"></div>
            		<div class="col-xs-4">
            			<p class="text-justify">Te enviamos un correo electronico con tu nueva contraseña que podras cambiar una vez que inicies sesión de nuevo con nostros en un periodo no mayor a 24 hrs. ¡Gracias!</p>
            			<p class="text-center">Atte. La administración</p>
            		</div>
            		<div class="col-xs-4"></div>
            	</div>
            	<div class="row">
            		<div class="col-xs-4"></div>
            		<div class="col-xs-4">
            			<form name="form_perdi_contra" method="POST" action="contra_temporal.php" autocomplete="off" >
            		<input type="email" name="email" placeholder="Tu correo electronico"><br><br>
            		<input type="email" name="email_confirm" placeholder="Confirma tu correo electronico"><br><br>
            		<input class="center-block" type="submit" value="Solicitar contraseña">
            	</form>	
            		</div>
            		<div class="col-xs-4"></div>
            	</div>     
            </div>
        </div>
    </div>
</div>
<?php include '../inc/pie_comun_grales.inc'; ?>
