<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
AuthSession();
var_dump($_SESSION);

$this->layout("_theme", ["Title" => $Title]); ?>

<h1><a href="<?= url("logout"); ?>">SAIR</a></h1>
<?php

; ?>
