<?php 
$titulo = "Productos";
include("encabezado.php"); 
?>

<section class="products-section">
    <div class="container">
        
        <div class="products-intro">
            <h2 class="section-title">Sistema Ultra Gestión ®</h2>
            <p class="section-subtitle">
                Un conjunto de aplicaciones integradas sobre una misma base de datos, diseñado para gestionar su empresa en tiempo real con una filosofía orientada al usuario.
            </p>
            <p class="text-paragraph">
                Nuestro sistema se encuentra instalado en numerosas <strong>Editoriales, Distribuidoras y Librerías</strong> de todo el país. Su concepción modular le permite crecer con usted, incorporando módulos según su necesidad.
            </p>
        </div>

        <div class="modules-nav">
            <button class="module-btn active" onclick="showModule('general')">
                <i class="fas fa-cogs"></i> Generalidades
            </button>
            
            <button class="module-btn" onclick="showModule('minorista')">
                <i class="fas fa-store"></i> Librerías
            </button>

            <button class="module-btn" onclick="showModule('editoriales')">
                <i class="fas fa-book"></i> Editoriales
            </button>

            <button class="module-btn" onclick="showModule('distribuidoras')">
                <i class="fas fa-truck"></i> Distribuidoras
            </button>

            <button class="module-btn" onclick="showModule('contable')">
                <i class="fas fa-calculator"></i> Contable
            </button>
        </div>

        <div id="general" class="module-content active-content">
            <div class="content-grid">
                <div class="text-side">
                    <h3>Visión General del Producto</h3>
                    <p>Ultra Gestión es la solución integral para el mercado del libro. Permite un control total de stock, ventas y administración.</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Base de datos unificada.</li>
                        <li><i class="fas fa-check"></i> Trabajo en tiempo real.</li>
                        <li><i class="fas fa-check"></i> Interfaz intuitiva y fácil de usar.</li>
                        <li><i class="fas fa-check"></i> Multi-usuario y seguro.</li>
                    </ul>
                </div>
                <div class="img-side downloads-area">
                    <div class="downloads-area">
                		<a href="windemo.zip" class="download-cta demo" target="_blank">
                    		<i class="fas fa-film"></i> Ver Demostración (5Mb)
                		</a>
                		<a href="winultrademo.pdf" class="download-cta pdf" target="_blank">
                    		<i class="fas fa-file-pdf"></i> Descargar PDF (850kb)
                		</a>
            		</div>
                </div>
            </div>
        </div>

        <div id="minorista" class="module-content">
            <div class="content-grid">
                <div class="text-side">
                    <h3>Gestión Punto de Ventas Librerías</h3>
                    <p>Pensado por y para Libreros. Agilice la atención al público y controle su stock al instante.</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Facturación fiscal rápida.</li>
                        <li><i class="fas fa-check"></i> Control de consignaciones.</li>
                        <li><i class="fas fa-check"></i> Búsqueda avanzada de títulos.</li>
                        <li><i class="fas fa-check"></i> Cuentas corrientes de clientes.</li>
                    </ul>
                </div>
                <div class="img-side">
                    <img src="img/productos/minorista_screen.jpg" onerror="this.src='img/logos/bolsas.png'" alt="Pantalla Librería">
                </div>
            </div>
        </div>

        <div id="editoriales" class="module-content">
            <div class="content-grid">
                <div class="text-side">
                    <h3>Gestión para Editoriales</h3>
                    <p>Administre tiradas, derechos de autor y consignaciones de manera eficiente.</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Liquidación de Derechos de Autor.</li>
                        <li><i class="fas fa-check"></i> Seguimiento de producciones.</li>
                        <li><i class="fas fa-check"></i> Gestión de prensa y difusión.</li>
                    </ul>
                </div>
                <div class="img-side">
                    <img src="img/productos/editoriales_screen.jpg" onerror="this.src='img/logos/libros.png'" alt="Pantalla Editorial">
                </div>
            </div>
        </div>

        <div id="distribuidoras" class="module-content">
            <div class="content-grid">
                <div class="text-side">
                    <h3>Para Distribuidoras</h3>
                    <p>Logística y distribución optimizada para grandes volúmenes de libros.</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Hoja de ruta y logística.</li>
                        <li><i class="fas fa-check"></i> Control de devoluciones masivas.</li>
                        <li><i class="fas fa-check"></i> Stock en múltiples depósitos.</li>
                    </ul>
                </div>
                <div class="img-side">
                    <img src="img/productos/distribuidoras_screen.jpg" onerror="this.src='img/logos/camion.png'" alt="Pantalla Distribuidora">
                </div>
            </div>
        </div>

        <div id="contable" class="module-content">
            <div class="content-grid">
                <div class="text-side">
                    <h3>Administración Contable</h3>
                    <p>Módulo integrado para llevar la contabilidad de la empresa sin doble carga de datos.</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Libros IVA Compras y Ventas.</li>
                        <li><i class="fas fa-check"></i> Asientos automáticos.</li>
                        <li><i class="fas fa-check"></i> Balances y Mayores.</li>
                    </ul>
                </div>
                <div class="img-side">
                    <img src="img/productos/contable_screen.jpg" onerror="this.src='img/logos/contable.png'" alt="Pantalla Contable">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showModule(moduleId) {
        const contents = document.querySelectorAll('.module-content');
        contents.forEach(content => content.classList.remove('active-content'));

        const buttons = document.querySelectorAll('.module-btn');
        buttons.forEach(btn => btn.classList.remove('active'));

        const targetContent = document.getElementById(moduleId);
        
        if (targetContent) {
            targetContent.classList.add('active-content');
            
            buttons.forEach(btn => {
                if (btn.getAttribute('onclick').includes("'" + moduleId + "'")) {
                    btn.classList.add('active');
                }
            });
        }
    }

    function processHash() {
        const hash = window.location.hash.substring(1); 
        if (hash) {
            showModule(hash);
            const nav = document.querySelector('.modules-nav');
            if(nav) {
                setTimeout(() => {
                    nav.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
        }
    }

    document.addEventListener("DOMContentLoaded", processHash);
	
    window.addEventListener("hashchange", processHash);
</script>

<?php
include("pie.php");
?>