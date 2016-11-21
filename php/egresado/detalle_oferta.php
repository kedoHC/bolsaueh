<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc';
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
                </div>
                <div class="col-xs-4">
                    <a href="aplicar.php?id_oferta='.$fila_oferta["id_oferta"].'"><button id="btn-aplicantes" class="btn center-block">Aplicar para esta oferta</button></a>
                </div>
                <div class="col-xs-4">
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
                  <p>$ '.$fila_oferta["sueldo_baja"].' - $ '.$fila_oferta["sueldo_alta"].' (MX)</p>
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
                  <p class="text-center"><span class="fa fa-user"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["contacto"].', '.$fila_oferta["puesto_contacto"].' </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-phone"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["telefono_empresa"].'</p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-2">
                  <p class="text-center"><span class="fa fa-envelope"></span></p>
                </div>
                <div class="col-xs-10">
                  <p>'.$fila_oferta["email_empresa"].'</p>
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
             
            </div>
        </div>
      ';
    }
     ?>
    </div>
</div>
<?php include '../../inc/pie_comun_egresado.inc'; ?>