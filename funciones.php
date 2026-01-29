<?php
//Esta funcion usa los parametros:
//$txtmuestra: listado separado por comas de los titulos de las imagenes
//$columnas: cantidad de columnas a mostrarse.
//$txtpath: donde esta el path de las imagenes a mostrar (deben llamarse img_ch##.jpg
//donde ## es el numero correlativo de imagen a mostrar conemzando por 0.
//El tercer parametro, si es "expandir" agranda las imagenes con un click (en este caso
//debe haber un archivo alternativo que se debe llamar img##.jpg)
//ejemplo: imgs("uno,dos","img/clientes",3,"expandir")

function imgs($titulos,$txtpath,$columnas=3,$expandir="no-expandir") {
print("<table align=\"center\" cellpadding=\"5%\" cellspacing=\"5%\">");
$txtmuestra = explode(",",$titulos);
//$txtpath="img/clientes";
$nromuestra = 0;
//for ($tr=1;$tr<=10;$tr++) {
$detener=0;
while($detener==0) {
/* Imagenes */
		print ("<tr border=\"1\">");
		for ($td=1;$td<=$columnas;$td++) {
				print ("<td align=\"center\">");
			  if(file_exists("$txtpath/img_ch$nromuestra.jpg"))
				{
            if($expandir=="expandir") {										
  				    print("<a href=\"javascript:;\" onClick=\"w = window.open('verimagen.php?imagen=$txtpath/img$nromuestra.jpg','TpWebWizImage','width=800,height=600,menubar=no,resizable=no,scrollbars=yes,status=no,toolbar=no'); w.resizeTo(700,600); w.focus()\" style=\"cursor:hand\"><img src=\"$txtpath/img_ch$nromuestra.jpg\" border=\"0\"></a>");							
						}
	  				else {
		  				print("<img src=\"$txtpath/img_ch$nromuestra.jpg\" STYLE=\"border: 3;border-color: #cc0033\"\">");
						}
        }
				else {
				    $detener=1;
				}
				$nromuestra++;
				print ("</td>");								
		}
		print ("</tr>");
    $nromuestra = $nromuestra - $columnas;
/* Leyendas */
  	print ("<tr>");
		for ($td=1;$td<=$columnas;$td++) {
				print ("<td align=\"center\">");
			  if(isset($txtmuestra[$nromuestra])) {
				  print("<font size=\"2\">$txtmuestra[$nromuestra]</font>");
				}
				$nromuestra++;
				print ("</td>");								
		}
		print ("</tr>");
}
print("</table>");
}
?>
