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
                    Empresas líderes que confían en Ultra Gestión, agrupadas por actividad.
                </p>
            </div>

            <div class="header-image-side">
                <img src="img/clientes_hero.png" alt="Clientes Satisfechos" class="clients-hero-img">
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