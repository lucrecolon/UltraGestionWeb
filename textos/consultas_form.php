<section class="contact-section">
    <div class="container">
        <div class="contact-header">
            <h2 class="section-title">Contáctenos</h2>
            <p class="section-subtitle">Complete el formulario y le responderemos a la brevedad.</p>
        </div>
        <div class="form-card">
            <form action="enviacons.php" method="post">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-input" placeholder="Su nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" id="empresa" class="form-input" placeholder="Nombre de su empresa">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-input" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-input" placeholder="+54 9 11 1234-5678">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="localidad">Localidad - Provincia</label>
                        <input type="text" name="localidad" id="localidad" class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="pais">País</label>
                        <input type="text" name="pais" id="pais" class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label 
                        for="consulta">Su Consulta
                    </label>
                    <textarea name="consulta" id="consulta" rows="5" class="form-input" placeholder="Escriba su consulta aquí..."></textarea>
                </div>

                <div class="form-footer">
                    <input type="submit" name="btnconsulta" value="Enviar Consulta" class="btn-submit">
                </div>
            </form>
        </div>
    </div>
</section>