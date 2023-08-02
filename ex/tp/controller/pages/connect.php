<h2>Connection</h2>

<section class="d-flex flex-grow-1 align-items-center justify-content-center">
    <?php
    require_once __DIR__ . '/../../core/security.php';
    if (!isConnected()) {
        echo
'<form class="d-flex flex-column" action="/connect/api/connect" method="POST">
    <label class="d-flex justify-content-between m-2" >
        <span class="mx-2">e-mail :</span>
        <input name="user" type="mail" required>
    </label>
    <label class="d-flex justify-content-between m-2">
        <span class="mx-2">password : </span>
        <input  name="password" type="password" required>
    </label>

    <input type="submit">
    </form>';
    } else {
        echo
'<form class="d-flex flex-column" action="/connect/api/disconnect" method="POST">
    <input type="submit" value="déconnections">
</form>';
    }

    ?>
</section>