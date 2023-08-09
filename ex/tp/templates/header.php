<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <h1><a class="navbar-brand mb-0 h1" href="/">Association la belle affaire</a></h1>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="/" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="/info" class="nav-link">qui sommes nous ?</a></li>
                <?php
                require_once __DIR__ . '/../core/security.php';
                if (isConnected()) {
                    echo '<li class="nav-item"><a href="/users" class="nav-link">les membres</a></li>';
                }
                ?>
                <li class="nav-item"><a href="/connect" class="nav-link">connection</a></li>
            </ul>
        </div>

    </nav>
</header>