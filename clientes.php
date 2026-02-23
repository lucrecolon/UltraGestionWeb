<?php 
$titulo = "Clientes";
include("encabezado.php"); 
?>

<section class="clients-section">
    <div class="container">
        
        <div class="clients-header">
    
            <div class="header-text-side">
                <h2 class="section-title">Clientes de Referencia</h2>
                <p class="section-subtitle">
                    Editoriales y librerías líderes que ya confían en Ultra Gestión.
                </p>
            </div>

            <div class="header-image-side">
                <img src="img/clientes_hero.png" alt="Clientes Satisfechos" class="clients-hero-img">
            </div>
        </div>
        
        <div class="historias-grid">
            
            <div class="historia-card">
                <div class="historia-media">
                    <div class="historia-img-bg" style="background-image: url('img/clientes/librerias/volcan.JPG');"></div>
                </div>
                
                <div class="historia-logo-flotante">
                    <img src="img/clientes/librerias/volcan_logo.png" alt="Logo Volcán Azul">
                </div>
                
                <div class="historia-text">
                    <h3>Volcán Azul Libros</h3>
                    <p>Con Ultra pudimos organizar y profesionalizar todo el proceso de facturación, control de stock y liquidación de ventas. Nos sismatizó todos los procesos y eso nos ayuda a evitar errores humanos que cometíamos antes con excels muy caseros y ahorrar mucho tiempo.</p>
                    <p>Con Ultra podemos buscar artículos, conocer su stock, precio actualizado, movimientos...</p>
                    <p>También llevamos control de los libros vendidos para poder informarlo a las editoriales y distribuidoras, entre otras cosas. Y algo muy importante, con la API, que contecta el sistema a nuesta tienda nube, todos los cambios en el sistema se traducen a nuestra tienda web, lo que nos permite tener ese canal de venta actualizado.</p>
                    
                    <div class="historia-cita">
                        "La atención de Hugo y su equipo es lo mejor de todo, cualquier duda o problema siempre están ahí para responderte con buena onda y predisposición."
                    </div>
                </div>
            </div>

            <div class="historia-card">
                <div class="historia-media">
                    <div class="historia-img-bg" style="background-image: url('img/clientes/librerias/labuenanoticia_local.jpg');"></div>
                </div>
                
                <div class="historia-logo-flotante">
                    <img src="img/clientes/librerias/labuenanoticia_logo.png" alt="Logo La Buena Noticia">
                </div>
                
                <div class="historia-text">
                    <h3>La Buena Noticia</h3>
                    <p>Acompañando nuestro negocio desde el año 2007, Ultra Gestión se convirtió en una herramienta fundamental y de uso amigable para nuestro día a día. Destacan especialmente por el servicio de actualización de precios y novedades, es un proceso rápido y eficiente que agiliza enormemente nuestras tareas diarias."</p>
                    
                    <div class="historia-cita">
                        "Una experiencia fantástica, muy amigable, trabajamos con Ultra desde el año 2007 ininterrumpidamente."
                    </div>
                </div>
            </div>
            
            <div class="historia-card">
                <div class="historia-media">
                    <div class="historia-img-bg" style="background-image: url('img/clientes/librerias/Los Confines 3.JPG');"></div>
                </div>
                
                <div class="historia-logo-flotante">
                    <img src="img/clientes/librerias/losconfines_logo.jpg" alt="Logo Los Confines">
                </div>
                
                <div class="historia-text">
                    <h3>Los Confines Libros</h3>
                    <p>Para nuestra librería, el sistema fue un antes y un después: nos permitió ordenar por completo el stock y la rendición de las ventas mes a mes. El servicio de actualización de precios y novedades es muy sencillo, intuitivo y rápido.</p>
                    <p>Si a futuro se pudiera agilizar aún más la carga de nuevos precios o unificar todo en un solo archivo sería excelente, aunque tal como funciona ahora está muy bien.</p>
                    
                    <div class="historia-cita">
                        "El gran valor de Ultra por sobre otros sistemas es la atención humana y cercana. Siempre tienen una respuesta rápida, con buena onda e intenciones de resolver lo que sea necesario."
                    </div>
                </div>
            </div>
            
            <div class="historia-card">
                
                <div class="historia-media">
                    <div class="historia-img-bg" style="background-image: url('img/clientes/librerias/vuelvoalsur_local.png');"></div>
                </div>
                
                <div class="historia-logo-flotante">
                    <img src="img/clientes/librerias/vuelvo_al_sur.png" alt="Logo Vuelvo al Sur">
                </div>
                
                <div class="historia-text" style="padding-bottom: 40px;">
                    <h3>Vuelvo al Sur</h3>
                    
                    <video class="historia-video-inline" src="img/clientes/librerias/WhatsApp Video 2026-02-19 at 15.41.31.mp4" controls preload="metadata"></video>
                
                    <div class="historia-cita" style="margin-top: 25px;">
                        "Gracias a Ultra, las tareas de todos los días, que son parte del oficio librero, son mucho más fáciles de realizar."
                    </div>
                </div>
            </div>
            
            
                
            
        </div>

        <div class="client-category-card">
            <div class="category-header toggle-trigger">
                <h3>
                    <span><i class="fas fa-book"></i> Editoriales</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </h3>
            </div>
            
            <div class="logos-wrapper accordion-content">
                <?php
                    $files = glob("img/clientes/editoriales/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                    if ($files) {
                        foreach($files as $file) {
                            echo '<div class="logo-item">';
                            echo '<img src="' . $file . '" alt="Cliente">';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No se encontraron logos.</p>";
                    }
                ?>
            </div>
        </div>

        <div class="client-category-card">
            <div class="category-header toggle-trigger">
                <h3>
                    <span><i class="fas fa-book"></i> Librerías</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </h3>
            </div>
            
            <div class="logos-wrapper accordion-content">
                <?php
                    $files = glob("img/clientes/librerias/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                    if ($files) {
                        foreach($files as $file) {
                            echo '<div class="logo-item">';
                            echo '<img src="' . $file . '" alt="Cliente">';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    const headers = document.querySelectorAll('.toggle-trigger');
    
    headers.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const arrow = header.querySelector('.arrow-icon');

            if (content) {
                content.classList.toggle('is-open');
            }
            if (arrow) {
                arrow.classList.toggle('rotate');
            }
        });
    });
</script>

<?php
include("pie.php");
?>