</main> <footer style="background-color: #125485; color: white; padding: 30px 0; margin-top: 50px; text-align: center;">
        <div class="container">
            <p style="font-size: 14px; opacity: 0.8; margin: 0;">
                © 2026 Cúspide Computación S.R.L. - Todos los derechos reservados.
            </p>
        </div>
    </footer>

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
</html>