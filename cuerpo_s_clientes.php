<?php
//Variables
//$titulo: t�tulo de la ventana.
//$imagen: im�gen representativa.
//$texto1: texto del cuerpo.
//$imgcolumna: path de las im�genes a mostrar en la columna virtual.
//$cuerpo: nombre del archivo php que contiene el cuerpo. 
$titulo="Servicios a clientes";
$imagen="servicios.jpg";
$pagina="servcli.php";
$demo="1";
include("encabezado.php");
$estado=$_SESSION["session_usr_estado"];
if ($_SESSION["loginOK"]==0) {
  echo "<SCRIPT>javascript:location.href = 'index.php'</SCRIPT>";
}

require("funciones.php");
include("common/funciones.php");

if (isset($_GET["fecha"])) {
  $fecha_act=$_GET["fecha"];
}

switch ($servicio) {
  case "actualizar":
  	if ($estado == 1 || $estado == 2) {
		  $cuerpo="textos/s_clientes_actualizar.php";
	    break;
			}
  case "setup":
  	if ($estado == 1 || $estado == 5) {
  	  $cuerpo="textos/s_clientes_setup.php";
	    break;
		}
  case "precios":
    // 1. CONFIGURACIÓN: La carpeta donde suben los archivos FTP
    $directorio_descargas = "descargas_clientes/";

    // Busca todos los archivos
    $archivos = glob($directorio_descargas . "*");

    // Ordenamos para que los más nuevos aparezcan primero (Opcional, pero recomendado)
    // Esto ordena por nombre descendente (ideal si los archivos tienen fecha en el nombre como TR2026...)
    if ($archivos) {
        rsort($archivos); 
    }
    ?>

    <div class="content-header">
        <h2>Actualizaciones de Precios</h2>
        <p style="color:#666; margin-bottom: 20px;">
            Archivos disponibles para descargar. Haga clic en el nombre para bajarlo.
        </p>
    </div>

    <?php if (count($archivos) > 0) { ?>
        
        <table class="download-table">
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Fecha de Subida</th>
                    <th>Tamaño</th>
                    <th style="text-align: center;">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($archivos as $ruta_archivo) {
                    // Ignoramos si es una carpeta, solo queremos archivos
                    if (is_file($ruta_archivo)) {
                        
                        // Obtenemos datos reales del archivo
                        $nombre_archivo = basename($ruta_archivo);
                        $fecha_archivo  = date("d/m/Y H:i", filemtime($ruta_archivo));
                        $peso_bytes     = filesize($ruta_archivo);
                        
                        // Función rápida para mostrar el peso (KB o MB)
                        if ($peso_bytes >= 1048576) {
                            $peso_visual = number_format($peso_bytes / 1048576, 2) . ' MB';
                        } elseif ($peso_bytes >= 1024) {
                            $peso_visual = number_format($peso_bytes / 1024, 2) . ' KB';
                        } else {
                            $peso_visual = $peso_bytes . ' bytes';
                        }
                        ?>
                        <tr>
                            <td>
                                <?php 
                                    $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
                                    if(strtolower($ext) == 'zip' || strtolower($ext) == 'rar') echo '<i class="fas fa-file-archive" style="color:orange"></i> ';
                                    elseif(strtolower($ext) == 'pdf') echo '<i class="fas fa-file-pdf" style="color:red"></i> ';
                                    else echo '<i class="fas fa-file-alt" style="color:#555"></i> ';
                                ?>
                                <strong><?php echo $nombre_archivo; ?></strong>
                            </td>
                            <td><?php echo $fecha_archivo; ?></td>
                            <td><?php echo $peso_visual; ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo $ruta_archivo; ?>" class="file-link" download>
                                    <i class="fas fa-download"></i> Descargar
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

    <?php } else { ?>
        
        <div style="padding: 30px; text-align: center; background: #fff3cd; border-radius: 10px; color: #856404;">
            <i class="fas fa-exclamation-triangle"></i> No hay archivos de actualización disponibles en este momento.
        </div>

    <?php } ?>

    <?php
    break;
  case "utilidades":
  	if ($estado == 1 || $estado == 7) {
      $cuerpo="textos/s_clientes_utilidades.php";
      break;
		}
  default:
    $cuerpo="textos/s_clientes_cuerpo.php";	
	  break;	
}
?>
<!-- Comienzo Cuerpo -->
<table align="center" width="775" cellspacing="0" cellpadding="0" border="0" height="280">
  <tr>
    <td>
			<table align="center" width="100%" cellspacing="0" cellpadding="0" border="0" height="100%">
        <tr>
          <td bgcolor="#ff3366" width="1"></td>
          <td valign="top">
					  <table cellpadding="0" cellspacing="0" width="171">
						<tr>
  						<td valign="top" ><?php print("<img src=\"img/diseno/$imagen\" border=\"0\" width=\"171\">");?></td>
						</tr>
						<tr>
  						<td align="center" valign="middle">
                <br><br>
								<p class="gris7">
    						<br><br>
                <?php include("textos/contacto.php"); ?>
     						<br><br>
                </p>
  						</td>
            </tr>
					  </table>
					</td>
          <td bgcolor="#ffffff" width="1" background="img/diseno/punteada.gif"></td>					
					<td valign="top">  
						<table cellspacing="0%" border="0" cellpadding="0%" width="100%">
              <tr>
								<td>
                  <table cellpadding="10%" border="0" ><tr><td>
                  <?php include("textos/s_clientes_titulo.php"); ?>
									</td>
									</table>
				        </td>
              </tr>
              <tr>
								<td>
                  <table cellpadding="12%" border="0" width="100%" ><tr><td>
                  <?php include("$cuerpo"); ?>
									</td></tr>
									</table>								
                </td>								
              </tr>
            </table>
          </td>
				</tr>
      </table>
		</td>
  </tr>
</table>

<!-- Fin Cuerpo -->
<?php include("pie.php"); ?>

