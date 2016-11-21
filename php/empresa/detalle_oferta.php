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

$peticion_ofertas = "SELECT * FROM ofertas WHERE id_oferta = '$id' ";
$resultado_ofertas = mysqli_query($conexion, $peticion_ofertas);
?>
<div id="ofertas">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">Detalles de oferta</h1>
            </div>
        </div>
    </div>
</div>
<div id="detalle-oferta">
    <div class="container">
    <?php 
    while($fila_oferta = mysqli_fetch_array($resultado_ofertas)){
      $id_oferta_actual = $fila_oferta["id_oferta"];
      $peticion_num_apli = "SELECT * FROM aplicantes WHERE id_oferta_a = '$id_oferta_actual'";
      $resultado_num_apli = mysqli_query($conexion, $peticion_num_apli);
      $num_aplicantes = 0;
      while($fila_num_apli = mysqli_fetch_array($resultado_num_apli)){
        $num_aplicantes = $num_aplicantes + 1;
      }
      echo '
        <div class="row oferta">
            <div class="col-xs-8 descripcion">
              <h1>'.$fila_oferta["puesto"].'</h1>
              <h2>'.$fila_oferta["empresa"].'</h2>
              <p id="descripcion">'.$fila_oferta["descripcion"].'</p>
             <div class="row">
                <div class="col-xs-4">
                  <a href="aplicantes.php?id_oferta='.$fila_oferta["id_oferta"].'"><button id="btn-aplicantes" class="btn center-block">Ver Aplicantes</button></a>
                </div>
                <div class="col-xs-4">
                  <a href="editar_oferta.php?id_oferta='.$fila_oferta["id_oferta"].'"><button id="btn-editar-oferta" class="btn center-block">Editar oferta</button></a>
                </div>
                <div class="col-xs-4">
                  <a href="eliminar_oferta.php?id_oferta='.$fila_oferta["id_oferta"].'"><button id="btn-eliminar-oferta" class="btn center-block">Cerrar oferta</button></a>
                </div>
              </div>
            </div>
           <div class="col-xs-4 detalles">
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-calendar-plus-o"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["fecha_inicio"].'</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-calendar-times-o"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["fecha_caducidad"].'</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-usd"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>$ '.$fila_oferta["sueldo_baja"].' - $ '.$fila_oferta["sueldo_alta"].'</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-map-marker"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["ciudad_oferta"].', '.$fila_oferta["estado_oferta"].' </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-bullseye"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["campo"].'</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-users"></span></p>
                </div>
                <div class="col-xs-10">
                  <p class="aplicantes">Aplicantes: '.$num_aplicantes.'</p>
                </div>
              </div>
            </div>
        </div>
      ';
    }
     ?>
    </div>
</div>
<?php include '../../inc/pie_comun_empresa.inc'; ?>