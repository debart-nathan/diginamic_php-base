<header class="container">
    <nav>
        <ul class="list-unstyled d-flex gap-3">
            <li><a href="/">Accueil</a></li>
            <li><a href="/info">qui sommes nous ?</a></li>
            <?php
            require_once __DIR__.'/../core/security.php';
            if (isConnected()) {
                echo '<li><a href="/users">les membres</a></li>';
            }
            ?>
            <li><a href="/connect">connection</a></li>
        </ul>
    </nav>
</header>