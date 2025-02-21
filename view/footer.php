<?php

class ViewFooter  {
    public function displayView(): string{
        ob_start();
?>
    </main>
        <footer>
            <p>© 2024 - Gestion des joueurs</p>
        </footer>
    </body>
    </html>
<?php
        return ob_get_clean();
    }
}