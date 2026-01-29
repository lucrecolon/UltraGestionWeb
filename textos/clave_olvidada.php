<?php
include("common/funciones.php");
$mostrar_ingreso = 0;
$mostrar_error_mail=0;
if (isset($enviar)) {
  if ( eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
    //buscar email del usuario
		$db->sql("select *, (@a:=DECODE(CLAVE,'PASSWD')) as password from usuarios where EMAIL = '$email';");    
    if ($db->hay_resultados()) {
      $r_usuario=$db->campo("usuario");
      $r_clave=$db->campo("password");
			$r_email=$db->campo("email");
      if (fn_EnviarMail($inf_email_empresa,$r_email,$r_usuario,$r_clave)==1) {
			print "<center><br>Su contraseña ha sido enviada a la dirección e-mail registrada.<br>";
      print "El email puede tardar hasta unos minutos en llegar. ";
      print "Luego intente ingresar nuevamente.<br><br>";
      print "Si tiene algun inconveniente, contáctese telefónicamente con nuestro centro de atención.<br>";
      print "Muchas gracias.</center>";
			log_usr($r_usuario,"CLAVE OLVIDADA. Se envió mail solicitado a $r_email, USUARIO: $r_usuario, CLAVE: $r_clave");
			} else {
			Print "Hubo un inconveniente al intentar enviar el email.<br>Por favor comuníquese con nuestro centro de atención.<br>Muchas gracias.";
			}
    }else{
      $mostrar_ingreso=1;
      $mostrar_error_mail=1;
    }	   
	}else{
    $mostrar_ingreso=1;
    $mostrar_error_mail=1;
	}
} else {
	  $mostrar_ingreso=1;  
}

if ($mostrar_ingreso==1) {
?>
    <center>
    <br>Si Usted olvidó la contraseña de acceso al sistema. Nosotros se la
    podemos enviar por email.<br>Ingrese su dirección de e-mail 
    registrada para que el sistema pueda enviarle la contraseña.<br><br><br>
      
    <form action="clave_olvidada.php" method="post">
    			<table border=1 frame="box" cellpadding='10%' cellspacing='0%'>
    		<tr bordercolor="#000000"><td bgcolor="#e0e0e0">
    		Dirección de mail: <input type="text" name="email" size="40">
    		<?php if ($mostrar_error_mail==1) {
    		        print "<br><center><font color='#ff3333'>No se encontró la dirección de mail.<br>";
    						print "Verifique que esté escrita correctamente</font></center>";
    		      }
    		?> 
    		</td></tr>
    		</table>
    		<br>
    		<input type="submit" name="enviar" value="Enviar">
    </form>
    </center>
<?php
}
function fn_EnviarMail($inf_email_empresa,$email,$usuario,$clave) {
  $to = $email;
  $subject = "Recuperación de contraseña";
  $message = "Estimado cliente:\n\nDe acuerdo a su solicitud al sitio www.ultragestion.com.ar, ";
  $message .= " le enviamos los datos para el recupero de contraseña.\n\n";
  $message .= "Usuario: $usuario\nContraseña: $clave\n\n";
  $message .= "Muchas gracias.\n";
  $message .= "El equipo de Ultra gestión.";
  // Cabecera del mensaje. No se verá, pero es necesario
  // para que nos funcione todo bien
  $headers = "From: $inf_email_empresa\nTo:\nReply-To: $inf_email_empresa\nDate: " . date("D, d M Y H:i:s -0300");
  // Envío del mensaje
  if (mail($to, $subject, $message, $headers))
  {
      return(1);
  }
  else
  {
      return(0);
  }
}
?>
