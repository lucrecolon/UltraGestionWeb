<?php
error_reporting(0);
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Gestión - Soluciones Editoriales</title>
    
    <link rel="stylesheet" href="css/estilos_modernos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header style="background-color: white; padding: 15px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            
            <div class="logo">
                <a href="index.php">
                    <img src="img/logos/logo_sin_fondo.png" alt="Ultra Gestión" class="logo-img">
                </a>
            </div>

            <ul class="nav-list">
                
                <li class="dropdown-item">
                    <a href="index.php" class="nav-link">Home ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php#soluciones">Nuestros servicios</a></li>
                        <li><a href="index.php#tutoriales">Tutoriales</a></li>
                        <li><a href="index.php#novedades">Novedades</a></li>
                    </ul>
                </li>

                <li><a href="laempresa.php" class="nav-link">La Empresa</a></li>
                
                <li><a href="servicios.php" class="nav-link">Servicios</a></li>

                <li class="dropdown-item">
                    <a href="productos.php" class="nav-link">Productos ▾</a>
                    <ul class="dropdown-menu" style="min-width: 260px;">
                        <li><a href="productos.php#general">Generalidades del producto</a></li>
                        <li><a href="productos.php#minorista">Gestión punto de venta librerías</a></li>
                        <li><a href="productos.php#editoriales">Gestión editoriales</a></li>
                        <li><a href="productos.php#distribuidoras">Distribuidoras</a></li>
                        <li><a href="productos.php#contable">Administración contable</a></li>
                    </ul>
                </li>

                <li class="dropdown-item">
                    <a href="javascript:void(0)" class="nav-link dropdown-trigger">Contacto ▾</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="https://wa.me/5491153748636" target="_blank">
                                <i class="fab fa-whatsapp" style="color:green; margin-right:5px;"></i> WhatsApp
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/ultra_gestion" target="_blank"> <i class="fab fa-instagram" style="color:#E1306C; margin-right:5px;"></i> Instagram
                            </a>
                        </li>
                        <li class="separator"></li>
                        <li><a href="consultas.php">Formulario de consulta</a></li>
                    </ul>
                </li>

                <li><a href="clientes.php" class="nav-link">Clientes</a></li>
                
                <li><a href="#" class="btn-nav" onclick="abrirLogin(event)">Ingresar</a></li>
            </ul>
        </div>
    </header>


    <div id="modalLogin" class="modal-overlay">
        <div class="modal-box">
            <span class="close-btn" onclick="cerrarLogin()">&times;</span>
            
            <h3>Acceso Clientes</h3>
            <p>Ingrese sus credenciales para acceder al área de descargas.</p>
            
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" required placeholder="Su usuario...">
                </div>
                
                <div class="input-group">
                    <label>Contraseña</label>
                    <input type="password" name="contrasena" required placeholder="••••••">
                </div>
                
                <button type="submit" class="btn-submit">Entrar al Sistema</button>
            </form>
        </div>
    </div>

    <script>
        function abrirLogin(e) {
            if(e) e.preventDefault(); // Evita que el link recargue la página
            document.getElementById('modalLogin').style.display = 'flex';
        }

        function cerrarLogin() {
            document.getElementById('modalLogin').style.display = 'none';
        }

        // Cerrar si hacen click afuera de la cajita
        window.onclick = function(event) {
            const modal = document.getElementById('modalLogin');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.dropdown-trigger');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault(); 

                const parent = this.parentElement;

                if (parent.classList.contains('activo')) {
                    parent.classList.remove('activo');
                } else {
                    document.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('activo'));
                    parent.classList.add('activo');
                }
            });
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-item')) {
                document.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('activo'));
            }
        });
    });
    </script>
</body>