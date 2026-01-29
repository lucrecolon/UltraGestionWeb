<?php
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
    $directorio_descargas = "descargas_clientes/";

    $archivos = glob($directorio_descargas . "*");

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
                    if (is_file($ruta_archivo)) {
                        
                        // Obtenemos datos reales del archivo
                        $nombre_archivo = basename($ruta_archivo);
                        $fecha_archivo  = date("d/m/Y H:i", filemtime($ruta_archivo));
                        $peso_bytes     = filesize($ruta_archivo);
                        
                        // Función para mostrar el peso (KB o MB)
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

<?php include("pie.php"); ?>

