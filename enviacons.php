<?php
$titulo="Consulta Enviada"; 
include ("encabezado.php");
?>

<section class="contact-section" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container">
        <div class="form-card" style="text-align: center; max-width: 600px;">
            
            <?php
            $empresa    = $_POST["empresa"];
            $email      = $_POST["email"];
            $nombre     = $_POST["nombre"]; 
            $telefono   = $_POST["telefono"];
            $localidad  = $_POST["localidad"];
            $pais       = $_POST["pais"];
            $consulta   = $_POST["consulta"];
            $btnconsulta= $_POST["btnconsulta"];
            
            $to = "ventas@ultragestion.com.ar";
            
            $subject = "Nueva Consulta Web - Ultra Gestión";

            if ($btnconsulta == 'Enviar Consulta') {
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    if ($consulta != '') {
                        
                        $message = "Consulta enviada por un visitante del sitio web:\n\n";
                        $message .= "Nombre: $nombre\n";
                        $message .= "Empresa: $empresa\n";
                        $message .= "Email: $email\n";
                        $message .= "Teléfono: $telefono\n";
                        $message .= "Ubicación: $localidad, $pais\n\n";
                        $message .= "Consulta:\n$consulta\n";

                        $headers = "From: $email\r\n";
                        $headers .= "Reply-To: $email\r\n";
                        $headers .= "X-Mailer: PHP/" . phpversion();

                        if (@mail($to, $subject, $message, $headers)) {
                            echo "<h2 style='color: green; font-size: 2rem;'>¡Consulta Enviada!</h2>";
                            echo "<p style='font-size: 1.2rem; margin: 20px 0;'>Muchas gracias por contactarse con nosotros.<br>Su consulta será respondida a la brevedad.</p>";
                            echo "<a href='index.php' class='btn-submit' style='display:inline-block; text-decoration:none; width:auto;'>Volver al Inicio</a>";
                        } else {
                            echo "<h2 style='color: orange;'>Mensaje generado</h2>";
                            echo "<p>Como estás en modo local (tu PC), es probable que el mail no salga real, pero el código funcionó.</p>";
                            echo "<p style='font-size: 0.9rem; color: #666;'>Si esto estuviera online, se habría enviado a: <strong>$to</strong></p>";
                            echo "<a href='index.php' class='btn-submit' style='display:inline-block; text-decoration:none; width:auto;'>Volver</a>";
                        }

                    } else {
                        echo "<h3 style='color: red;'>Falta la consulta</h3>";
                        echo "<p>Por favor, escribe tu mensaje.</p>";
                        echo "<button onclick='history.back()' class='btn-submit' style='background-color:#666;'>Volver e intentar de nuevo</button>";
                    }

                } else {
                    echo "<h3 style='color: red;'>Email inválido</h3>";
                    echo "<p>Por favor, verifica tu dirección de correo electrónico.</p>";
                    echo "<button onclick='history.back()' class='btn-submit' style='background-color:#666;'>Corregir Email</button>";
                }

            } else {
                echo "<p>No has enviado ningún formulario.</p>";
                echo "<a href='consultas.php'>Ir a Contacto</a>";
            }
            ?>
        </div>
    </div>
</section>

<?php
include ("pie.php");
?>