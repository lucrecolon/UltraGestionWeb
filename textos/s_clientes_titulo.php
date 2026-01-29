<?php
$session_usr_estado=$_SESSION["session_usr_estado"];
$session_usr_licso=$_SESSION["session_usr_licso"];
$session_usr_vto=$_SESSION["session_usr_vto"];
$session_usr_licso=$_SESSION["session_usr_licso"];
$session_usr_updsis=$_SESSION["session_usr_updsis"];
$session_usr_fecsis=$_SESSION["session_usr_fecsis"];
$session_usr_updsus=$_SESSION["session_usr_updsus"];
$session_usr_fecsus=$_SESSION["session_usr_fecsus"];
$session_usr_fechaingreso=$_SESSION["session_usr_fechaingreso"];
$session_usr_mensaje=$_SESSION["session_usr_mensaje"];

echo "<table width=\"580\" border=1 cellspacing=0 cellpadding=0 bordercolor=\"#ffffff\">";
echo "<tr bgcolor=\"navy\" height=\"3\">";
echo "<td colspan=\"2\"></td>";
echo "</tr>";
echo "<tr bgcolor=\"#e0e0e0\" bordercolor=\"#e0e0e0\">";
echo "<td align=\"left\" class=\"titulo12i\"><b>Servicios a clientes</b></td>";
echo "<td align=\"right\" class=titulo12i>Usuario: $session_usr_nombre</td>"; 
echo "</tr>";
echo "<tr bgcolor=\"navy\" height=\"3\">";
echo "<td colspan=\"2\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td align=\"left\">Estado: $array_usr_estado[$session_usr_estado]</td>";
echo "<td align=\"right\">Licencia: $session_usr_licso</td>";
echo "</tr>";

echo "<tr>";
if (strtolower($session_usr_updsis)=="si") {
  echo "<td align=\"left\">Última actualización software: " . FechaDMA($session_usr_fecsis)."</td>";
}
if (strtolower($session_usr_updsus)=="si") {
  echo "<td align=\"right\">Última actualización precios: ".FechaDMA($session_usr_fecsus)."</td>";
}
echo "</tr>";

echo "<tr bgcolor=\"navy\" height=\"3\">";
echo "<td colspan=\"2\"></td>";
echo "</tr>";
echo "<tr>";
$fecha = FechaDMA(substr($session_usr_fechaingreso,0,10)) . " " . substr($session_usr_fechaingreso,11,5);
echo "<td>Fecha de último ingreso: " . $fecha . "hs.</td>";
echo "</tr>";
echo "<tr bgcolor=\"navy\" height=\"3\">";
echo "<td colspan=\"2\"></td>";
echo "</tr>";
echo "</table>";
?>
