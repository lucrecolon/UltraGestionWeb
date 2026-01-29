<?php
print "<table border=0 cellpadding=\"1%\" cellspacing=0 bgcolor=\"#efefef\">";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "<tr>";
print "<td bgcolor=\"#dddddd\" align=\"left\"><b>Actualizaciones del Sistema</b></td>";
print "</tr>";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "<tr><td>";
print "<br>Bienvenido a la sección de actualizaciones del sistema. ";
print "El propósito de este servicio es mantener el sistema a la última revisión.<br>"; 
print "</td></tr>";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "</table>";
print "<center>";
print "<br>";
print "<table border=0 width=\"100%\">";
print "<tr><td>";
print "</td>";
print "<td>";
print "</td>";
print "<td>";
// print "<center><table border=1 bgcolor=\"#669999\" bordercolor=\"#ffffff\" cellspacing=3 cellpadding=3>";
// print "<tr>";
// print "<td bordercolor=\"#ffffff\" bgcolor=\"#669999\"><a href=\"\"><font color=\"#ffffff\">Descargar archivo de actualización</font></a></td>"; 
// print "</table></center>";

if (strtolower($session_usr_estado)=="2" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
      $_SESSION["session_ruta_descarga"] = "/scdcus/revision";
      include("s_clientes.php");
	} else { 
    $_SESSION["loginOK"]=0;
  	header("location:index.php");
	}
} else {
  $_SESSION["loginOK"]=0;
	header("location:index.php");
}

print "</td>";
print "</tr>";
print "</table>";


print "</center>";
?>

