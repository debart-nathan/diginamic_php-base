<?php require_once __DIR__. '/core/router.php' ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once __DIR__ . '/templates/head.php';?>
<body class="min-vh-100 d-flex flex-column justify-content-stretch bg-light">
    <?php include_once __DIR__ . '/templates/header.php'; ?>
    <main class="container flex-grow-1 d-flex flex-column justify-content-stretch bg-white">
        <?php include_once $content ?>
    </main>
    <?php  include_once __DIR__ . '/templates/footer.php'; ?>

</body>

</html>