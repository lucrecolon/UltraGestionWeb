<?php
print "<center><table border=0 cellpadding=\"1%\" cellspacing=0 bgcolor=\"#efefef\">";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "<tr>";
print "<td bgcolor=\"#dddddd\" align=\"left\"><b>Instalación del sistema</b></td>";
print "</tr>";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "<tr><td>";
print "<br>En esta sección podrá descargar los componentes necesarios para la instalación del sistema.";
print "<br><br>RECUERDE ACTIVAR LA LICENCIA DE USO";
print "<br>";
print "</td></tr>";
print "<tr bgcolor=\"navy\" height=\"1\">";
print "<td colspan=\"1\"></td>";
print "</tr>";
print "</table></center><br><br>";

if (strtolower($session_usr_estado)=="5" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
      $_SESSION["session_ruta_descarga"] = "/scdcus/setup";
      include("s_clientes.php");
	} else { 
    $_SESSION["loginOK"]=0;
  	header("location:index.php");
	}
} else {
  $_SESSION["loginOK"]=0;
	header("location:index.php");
}
?>
