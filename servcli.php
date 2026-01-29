<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("common/common.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["loginOK"]) || $_SESSION["loginOK"] == 0) {
    header("Location: index.php?error=acceso_denegado");
    exit();
}

$usuario = isset($_SESSION["session_usr_nombre"]) ? $_SESSION["session_usr_nombre"] : "Cliente";
$estado  = isset($_SESSION["session_usr_estado"]) ? $_SESSION["session_usr_estado"] : 0;

$servicio_default = ($estado == 6) ? "precios" : "home";
$servicio = isset($_GET["servicio"]) ? $_GET["servicio"] : $servicio_default;

$titulo = "Panel de Clientes";
include("encabezado.php"); 
?>

<section class="dashboard-section">
    <div class="container">
        
        <div class="dashboard-top-bar">
            <div class="user-welcome">
                <i class="fas fa-user-circle"></i> Hola, <?php echo htmlspecialchars($usuario); ?>
            </div>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>

        <div class="dashboard-grid">
            
            <aside class="dashboard-sidebar">
                <div class="sidebar-menu">
                    <h4 class="sidebar-title">Menú de Cliente</h4>
                    
                    <a href="servcli.php?servicio=home" class="menu-link <?php echo ($servicio=='home')?'active':''; ?>">
                        <i class="fas fa-home"></i> Inicio
                    </a>

                    <?php if ($estado == 1 || $estado == 6) { ?>
                        <a href="servcli.php?servicio=precios" class="menu-link <?php echo ($servicio=='precios')?'active':''; ?>">
                            <i class="fas fa-download"></i> Descarga de Precios
                        </a>
                    <?php } ?>

                    <?php if ($estado == 1 || $estado == 5) { ?>
                        <a href="servcli.php?servicio=setup" class="menu-link <?php echo ($servicio=='setup')?'active':''; ?>">
                            <i class="fas fa-tools"></i> Instaladores / Setup
                        </a>
                    <?php } ?>
                    
                    <?php if ($estado == 1) { ?>
                        <div style="border-top: 1px solid #eee; margin: 10px 0;"></div>
                        <a href="servcli.php?servicio=admin_usuarios" class="menu-link <?php echo ($servicio=='admin_usuarios')?'active':''; ?>">
                            <i class="fas fa-users-cog"></i> Administrar Usuarios
                        </a>
                    <?php }?>

                    <a href="https://get.teamviewer.com/6622332" target="_blank" class="menu-link">
                        <i class="fas fa-headset"></i> Soporte Remoto
                    </a>
                </div>
            </aside>

            <main class="dashboard-content">
                
                <?php 
                switch ($servicio) {
                    // --- SECCIÓN DE DESCARGAS ---
                    case "precios":
                        ?>
                        <div class="content-header">
                            <h2 style="color: var(--azul-oscuro); border-bottom: 2px solid #eee; padding-bottom: 10px;">
                                <i class="fas fa-download"></i> Archivos de Actualización
                            </h2>
                            <p style="color:#666; margin: 15px 0;">
                                Descargue los archivos haciendo clic en el botón correspondiente. Estos archivos se actualizan automáticamente desde nuestro servidor.
                            </p>
                        </div>

                        <?php
                        // 1. DEFINICIÓN INTELIGENTE DE RUTAS
                        // Necesitamos dos cosas:
                        // $path_sistema: Dónde PHP busca los archivos (Ruta de disco)
                        // $url_web: Dónde el navegador descarga los archivos (Dirección web)

                        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
                            // --- MODO LOCAL (XAMPP) ---
                            // Buscamos saliendo de w222 hacia la carpeta scdcus
                            $path_sistema = "../PROYECTO_LIMPIO/scdcus/precios/"; 
                            $url_web      = "../PROYECTO_LIMPIO/scdcus/precios/";
                        } else {
                            // --- MODO SERVIDOR (TOWEBS) ---
                            // Ruta absoluta para que PHP encuentre los archivos sí o sí
                            $path_sistema = "/home/soporte3/public_html/w/scdcus/precios/";
                            
                            // URL Relativa para que el navegador los pueda bajar
                            // Salimos de 'w222' (..) entramos a 'w', luego 'scdcus', luego 'precios'
                            $url_web      = "../w/scdcus/precios/";
                        }

                        // Verificamos si existe el directorio (solo para no tirar error)
                        if (is_dir($path_sistema)) {
                            $archivos = glob($path_sistema . "*");
                        } else {
                            $archivos = []; // Si no encuentra la carpeta, lista vacía
                        }
                        
                        if ($archivos) rsort($archivos);

                        if ($archivos && count($archivos) > 0) { ?>
                            <table class="download-table">
                                <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th>Fecha Subida</th>
                                        <th>Tamaño</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($archivos as $ruta) {
                                        if (is_file($ruta)) {
                                            $nombre = basename($ruta); // Sacamos solo el nombre (ej: lista.pdf)
                                            $fecha = date("d/m/Y H:i", filemtime($ruta));
                                            $peso = round(filesize($ruta) / 1024, 2) . ' KB';
                                            
                                            // AQUI ESTÁ EL TRUCO: Usamos $url_web para el link
                                            $link_descarga = $url_web . $nombre;
                                            ?>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-file-alt" style="color:#FF9800; margin-right:5px;"></i> 
                                                    <strong><?php echo $nombre; ?></strong>
                                                </td>
                                                <td><?php echo $fecha; ?></td>
                                                <td><?php echo $peso; ?></td>
                                                <td>
                                                    <a href="<?php echo $link_descarga; ?>" class="file-link" download target="_blank">
                                                        <i class="fas fa-cloud-download-alt"></i> Descargar
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div style="padding: 30px; background: #fff3cd; color: #856404; border-radius: 8px; text-align: center; margin-top: 20px;">
                                <i class="fas fa-exclamation-triangle"></i> No se encontraron archivos.<br>
                                <small>Ruta buscada: <?php echo $path_sistema; ?></small>
                            </div>
                        <?php }
                    break;

                    // --- SETUP ---
                    case "setup":
                        echo "<h2>Instaladores del Sistema</h2><p>Aquí aparecerán los instaladores (Setup).</p>";
                        break;
                    
                    
                    // --- ADMIN ---
                    case "admin_usuarios":

                        if ($estado != 1) {
                            echo "<div class='alert-box error'><i class='fas fa-ban'></i> No tienes permisos.</div>";
                            break;
                        }

                        $mensaje = "";
                        
                        if (isset($_GET['accion']) && $_GET['accion'] == 'borrar' && isset($_GET['id'])) {
                            $id_borrar = intval($_GET['id']); // intval por seguridad
                            
                            $db->sql("DELETE FROM usuarios WHERE id = $id_borrar");
                            $mensaje = "<div class='alert-box success'><i class='fas fa-trash-alt'></i> Usuario eliminado correctamente.</div>";
                        }

                        $editando = false;
                        $val_id = "";
                        $val_user = "";
                        $val_pass = "";
                        
                        if (isset($_GET['accion']) && $_GET['accion'] == 'editar' && isset($_GET['id'])) {
                            $id_editar = intval($_GET['id']);
                            $db->sql("SELECT * FROM usuarios WHERE id = $id_editar");
                            if ($db->hay_resultados()) {
                                $editando = true;
                                $val_id = $id_editar;
                                $val_user = $db->campo("USUARIO");
                                $val_pass = $db->campo("CLAVE");
                            }
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_form'])) {
                            
                            $u_post = str_replace("'", "", trim($_POST['usuario_form']));
                            $c_post = str_replace("'", "", trim($_POST['clave_form']));
                            $id_post = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : "";
                            
                            if ($u_post != "" && $c_post != "") {
                                
                                if ($id_post != "") {
                                    $sql_update = "UPDATE usuarios SET USUARIO='$u_post', CLAVE='$c_post' WHERE id=" . intval($id_post);
                                    $db->sql($sql_update);
                                    $mensaje = "<div class='alert-box success'><i class='fas fa-sync'></i> Usuario <strong>$u_post</strong> actualizado.</div>";
                                    
                                    $editando = false; $val_user = ""; $val_pass = ""; $val_id = "";
                                    
                                } else {
                                    $db->sql("SELECT id FROM usuarios WHERE USUARIO = '$u_post'");
                                    if ($db->hay_resultados()) {
                                        $mensaje = "<div class='alert-box error'>El usuario ya existe.</div>";
                                    } else {
                                        $sql_insert = "INSERT INTO usuarios (USUARIO, CLAVE, estado, fec_ult_ingr) VALUES ('$u_post', '$c_post', 6, NOW())";
                                        $db->sql($sql_insert);
                                        $mensaje = "<div class='alert-box success'><i class='fas fa-check-circle'></i> Usuario creado.</div>";
                                    }
                                }
                            } else {
                                $mensaje = "<div class='alert-box error'>Faltan datos.</div>";
                            }
                        }
                        ?>

                        <div class="section-header">
                            <h2><i class="fas fa-users-cog"></i> Gestión de Usuarios</h2>
                        </div>

                        <?php echo $mensaje; ?>

                        <div class="admin-grid">
                            
                            <div class="admin-card form-card <?php echo $editando ? 'editing' : ''; ?>">
                                <h3>
                                    <?php echo $editando ? '<i class="fas fa-edit"></i> Editando Usuario' : 'Crear Nuevo Cliente'; ?>
                                </h3>
                                
                                <form method="POST" action="servcli.php?servicio=admin_usuarios">
                                    <input type="hidden" name="id_usuario" value="<?php echo $val_id; ?>">
                                    
                                    <div class="form-group">
                                        <label>Nombre de Usuario:</label>
                                        <input type="text" name="usuario_form" class="admin-input" required 
                                               value="<?php echo $val_user; ?>" autocomplete="off">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Contraseña:</label>
                                        <input type="text" name="clave_form" class="admin-input" required 
                                               value="<?php echo $val_pass; ?>">
                                    </div>
                                    
                                    <button type="submit" class="btn-save" style="<?php echo $editando ? 'background-color:#FF9800' : ''; ?>">
                                        <?php echo $editando ? '<i class="fas fa-sync"></i> Actualizar Datos' : '<i class="fas fa-plus-circle"></i> Guardar Usuario'; ?>
                                    </button>
                                    
                                    <?php if ($editando) { ?>
                                        <a href="servcli.php?servicio=admin_usuarios" style="display:block; text-align:center; margin-top:10px; color:#666; font-size:0.9rem;">Cancelar Edición</a>
                                    <?php } ?>
                                </form>
                            </div>

                            <div class="admin-card">
                                <h3>Usuarios Registrados</h3>
                                
                                <table class="download-table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Clave</th>
                                            <th style="text-align:center;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $db->sql("SELECT * FROM usuarios ORDER BY id DESC");
                                        
                                        if ($db->hay_resultados()) {
                                            for ($i=0; $i <= $db->ultimo_registro; $i++) { 
                                                $db->ir($i);
                                                $u_id   = $db->campo("id");
                                                $u_nom  = $db->campo("USUARIO");
                                                $u_pass = $db->campo("CLAVE");
                                                ?>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-user" style="color:#aaa; margin-right:5px;"></i>
                                                        <strong><?php echo $u_nom; ?></strong>
                                                    </td>
                                                    <td style="color:#888; font-family:monospace;">
                                                        <?php echo $u_pass; ?>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a href="servcli.php?servicio=admin_usuarios&accion=editar&id=<?php echo $u_id; ?>" 
                                                           class="btn-action btn-edit" title="Editar">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        
                                                        <a href="servcli.php?servicio=admin_usuarios&accion=borrar&id=<?php echo $u_id; ?>" 
                                                           class="btn-action btn-delete" title="Borrar"
                                                           onclick="return confirm('¿Estás seguro de eliminar a <?php echo $u_nom; ?>? Esta acción no se puede deshacer.');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='3' style='padding:20px;'>No hay usuarios.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        break;  

                    // --- HOME ---
                    default:
                        ?>
                        <div style="text-align: center; padding: 50px 20px;">
                            <img src="img/logos/logo_sin_fondo.jpg" style="max-width: 150px; margin-bottom: 20px;" onerror="this.style.display='none'">
                            <h2 style="color: var(--azul-oscuro);">Bienvenido al Panel de Clientes</h2>
                            <p style="font-size: 1.1rem; color: #555;">
                                Seleccione una opción del menú de la izquierda para comenzar.
                            </p>
                            <div style="margin-top: 30px; padding: 15px; background: #e3f2fd; border-radius: 8px; display: inline-block;">
                                <i class="fas fa-check-circle" style="color: var(--azul-brillante);"></i> Su cuenta está <strong>Activa</strong> y lista para operar.
                            </div>
                        </div>
                        <?php
                        break;
                }
                ?>

            </main>
        </div>
    </div>
</section>

<?php 
include("pie.php"); 
?>