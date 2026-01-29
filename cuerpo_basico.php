<?php
/*Variables for�neas
$titulo: t�tulo de la ventana.
$imagen: im�gen representativa.
$imgcolumna: path de las im�genes a mostrar en la columna virtual.
$pagina: pagina a mostrarse.
$demo: si es 1, mostrar el link de bajar demo.
*/
?>
<?php
 require("funciones.php");
?>
<!-- Comienzo Cuerpo -->
<table align="" width="775" cellspacing="0" cellpadding="0" border="0" height="280">
  <tr>
    <td>
			<table align="right" width="100%" cellspacing="0" cellpadding="0" border="0" height="100%">
        <tr>
          <td bgcolor="#ff3366" width="1"></td>
          <td valign="top">
					  <table cellpadding="0" cellspacing="0" width="171">
						<tr>
  						<td valign="top" ><?php print("<img src=\"img/diseno/$imagen\" border=\"0\" width=\"171\">");?></td>
						</tr>
            <?php
                If($demo == "1") {
                    print("<tr>");
                    print("<td valign=\"middle\">");
										print("<br>");
                    print("<table border=\"0\">");
                    print("<tr><td>");
                    	print("<table Border=\"0\">");
                        print("<tr>");
                        	print("<td>");
                            print("<a href=\"windemo.zip\"><img src=\"img/diseno/zip.jpg\" border=0 alt=\"Demostraci�n animada\"></a>");
                          print("</td>");
                    			print("<td>");
                    					print("<a href=\"windemo.zip\">Descargar demostraci�n animada (5,04Mb)</a>");
                    			print("</td>");
                      	print("</tr>");
                        print("<tr>");
                        	print("<td>");
    												print("<br>");
                            print("<a href=\"winultrademo.pdf\"><img src=\"img/diseno/pdf.jpg\" border=0 alt=\"Demostraci�n versi�n PDF\"></a>");
                          print("</td>");
                    			print("<td>");
    												print("<br>");
                    					print("<a href=\"winultrademo.pdf\">Versi�n PDF (850kb)</a>");
                    			print("</td>");
                      	print("</tr>");
                    	print("</table>");				
                    print("</td></tr>");
                    print("</table>");
                    print("</td>");
                    print("</tr>");
								}
						?>
						<tr>
  						<td align="center" valign="middle">
                <br>
								<p class="gris7">
    						<br><br>
                <?php include("textos/contacto.php"); ?>
     						<br><br>
                </p>
  						</td>
            </tr>
							<?php
							  if(isset($imgcolumna) && $imgcolumna != "") {
    								print("<tr>");
    								print("<td>");
										print("<br><br>");
										print("<hr>");
    								print("<tr>");
    								print("<td bgcolor=\"#f0f0f0\">");
										print("<center>Im�genes de muestra</center>");
    								print("</tr>");
    								print("</td>");
                    imgs("",$imgcolumna,1,"expandir");    						 
    						 		print("</td>");
    						 		print("</tr>");
								}
						  ?>
					  </table>
					</td>
          <td bgcolor="#ffffff" width="1" background="img/diseno/punteada.gif"></td>					
					<td valign="top">  
						<table cellspacing="0%" border="0" cellpadding="0%" width="100%">
              <tr>
								<td>
                  <table cellpadding="0%" border="0" width="604"><tr><td>
                  <?php include("textos/$pagina"); ?>
									</td></tr></table>
				        </td>
              </tr>
              <tr>
								<td>
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

