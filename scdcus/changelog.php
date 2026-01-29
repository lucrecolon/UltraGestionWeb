<?php

print "<br>";
print "<table border=0 cellpadding=0 cellspacing=0";
print "<tr>";
print "<td>";
print "</td>";
print "<td><img src=\"img/diseno/l-diag2.gif\" align=\"right\"></td>";
print "</tr>";


print "<table border=0 cellpadding=0 cellspacing=0>";
print "<tr>";
print "<td background=\"img/diseno/l-vert.gif\">&nbsp;</td>";
print "<td>";


Function f_header() {
  print "<table border=0 \"width=100%\">";
  print "<tr>";
  print "<td width=\"10%\" valign=top>";
  print "<font color=\"#c0c0c0\" size=5>.:</font>";
  print "</td>";
  print "<td>";
  print "<font color=\"#111111\">";
  print "<p align=\"justify\">";
}

Function f_bottom() {
  print "<br><br><br><br>";
  print "</p>";
  print "</font>";
  print "</td>";
  print "</tr>";
  print "</table>";
}
?>
<table border=0 cellpadding=0 cellspacing=5>
<tr>
<td>
<br>
<font color="#cc0033" size=2><b>.: Lista de Cambios 02-03-2018:</b></font><br><br>

<?php f_header();?>
- Incremento en la cantidad de cuentas participantes
 en el asiento de Cierre y apertura contable 

<br><br>

-Mejora en el tratamiento en Planes de Cuenta con asignacion
 de Centros de Costos

<br><br>

-Nuevas Validaciones en la interface de Cobranzas
 al invocar Imputacion Manual

<br><br>

-Nuevo tratamiento de cheques recibidos en la eliminacion
 de Recibos de Cobranzas

<br><br>

-Rediseño en interface de Ingreso de Facturas Proveedor

<br><br>

-Nueva aplicacion interface ARBA percepciones Ingresos Brutos

<br><br>

-Mejoras en la construccion del archivo AFIP 3685

<?php f_bottom(); ?>


</td>
</tr>
</table>
<?php
print "</td>";
print "</tr>";

print "</table>";
?>
