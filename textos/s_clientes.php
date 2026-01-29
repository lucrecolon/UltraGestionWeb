<?
include("common/cls_updates.php");

$act=new actualizaciones;
$act->ruta="/home/soporte3/public_html";
$_SESSION ['rutalocal']=$act->ruta;
$act->ruta=$act->ruta . $_SESSION ['session_ruta_descarga'];
$act->listar(1);
while ($act->archivo != "") {
  echo "<table width=\"500\" border=1 cellpadding=\"0\" cellspacing=\"0\">";
  echo "<tr bordercolor=\"#ffffff\" bgcolor=\"#ccffff\">";
  echo "<td width=\"75%\"><b>$act->archivo</b></td>";
  echo "<td width=\"25%\"><font color=\"#3300ff\"><u><a href=\"bajar.php?archivo=$act->archivo\">Descargar</a></u></font></td>";
  echo "</tr>";
  echo "<tr bordercolor=\"#ffffff\">";
  echo "<td><br>";
  echo $act->descripcion;
  echo "</td>";
  echo "<td bordercolor=\"#aaaaaa\"><center><a href=\"bajar.php?archivo=$act->archivo\">$act->archivo</a><br><br>Tamaño:<br>". number_format($act->tamano,0,"",".")." bytes.</center></td>";
  echo "</tr>";
  echo "</table>";
  echo "<br><br>";
	$act->listar();
}
?>
